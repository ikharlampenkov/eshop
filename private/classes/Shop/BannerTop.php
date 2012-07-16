<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 28.12.11
 * Time: 11:42
 * To change this template use File | Settings | File Templates.
 */

/*
 * CREATE  TABLE IF NOT EXISTS `ekonom_pro_db`.`banner_top` (
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
   `img` VARCHAR(255) NOT NULL ,
   `link` VARCHAR(255) NOT NULL ,
   `title` VARCHAR(255) NOT NULL ,
   PRIMARY KEY (`id`) )
 ENGINE = InnoDB
 */

class BannerTop
{
    /**
     *
     * @access protected
     */
    protected $_id;

    /**
     *
     * @access protected
     */
    protected $_title;

    /**
     * @var Image|null
     */
    protected $_img = null;

    /**
     * @var int
     */
    protected $_isFirstPage = 0;

    /**
     *
     * @var simo_db
     * @access protected
     */
    protected $_db;


    /**
     *
     *
     * @return int
     * @access public
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getTitle()
    {
        return $this->_db->prepareStringToOut($this->_title);
    }

    /**
     *
     *
     * @param int $value
     * @return void
     * @access protected
     */
    protected function setId($value)
    {
        $this->_id = (int)$value;
    } // end of member function setId

    /**
     *
     *
     * @param string $value
     * @return void
     * @access public
     */
    public function setTitle($value)
    {
        $this->_title = $this->_db->prepareString($value);
    } // end of member function setTitle

    public function setImg($file)
    {
        $this->_img = $file;
    }

    public function getImg()
    {
        return $this->_img;
    }


    public function __get($name)
    {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        } else {
            throw new Exception('Can not find method ' . $method . ' in class ' . __CLASS__);
        }
    }

    /**
     *
     *
     * @return BannerTop
     * @access public
     */
    public function __construct()
    {
        global $__cfg;
        $this->_db = simo_db::getInstance();
        $this->_img = new Image($__cfg['file.upload.dir']);
    }

    /**
     *
     *
     * @throws Exception
     * @return void
     */
    public function insertToDb()
    {
        try {
            $sql = 'INSERT INTO banner_top(title, is_first_page, img)
                        VALUES ("' . $this->_title . '", ' . $this->_isFirstPage . ', "")';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();

            $fName = $this->_img->download('img');
            if ($fName !== false) {
                $this->_img->createPreview(190, 110);
                $sql = 'UPDATE banner_top SET img="' . $fName . '" WHERE id=' . $this->_id;
                $this->_db->query($sql);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    //id, img, title, link

    /**
     *
     *
     * @throws Exception
     * @return void
     */
    public function updateToDb()
    {
        try {
            $sql = 'UPDATE banner_top
                        SET title="' . $this->_title . '", is_first_page=' . $this->_isFirstPage . '
                        WHERE id=' . $this->_id;
            $this->_db->query($sql);

            $fName = $this->_img->download('img');
            if ($fName !== false) {
                $this->_img->createPreview(190, 110);
                $sql = 'UPDATE banner_top SET img="' . $fName . '" WHERE id=' . $this->_id;
                $this->_db->query($sql);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     * @throws Exception
     * @return void
     */
    public function deleteFromDb()
    {
        try {
            $this->_img->delete();

            $sql = 'DELETE FROM banner_top
                        WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     *
     * @param int $id идентификатор задачи
     * @throws Exception
     * @return BannerTop
     * @static
     */
    public static function getInstanceById($id)
    {
        try {
            $db = simo_db::getInstance();
            $sql = 'SELECT * FROM banner_top WHERE id=' . (int)$id;
            $result = $db->query($sql, simo_db::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new BannerTop();
                $o->fillFromArray($result[0]);
                return $o;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     *
     * @param array $values
     * @throws Exception
     * @return BannerTop
     * @static
     */
    public static function getInstanceByArray($values)
    {
        try {
            $o = new BannerTop();
            $o->fillFromArray($values);
            return $o;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     *
     * @throws Exception
     * @return array
     * @static
     */
    public static function getAllInstance($isFirstPage = -1)
    {
        try {
            $db = simo_db::getInstance();

            $sql = 'SELECT * FROM banner_top ';
            if ($isFirstPage != -1) {
                $sql .= ' WHERE is_first_page=' . $isFirstPage;
            }
            $result = $db->query($sql, simo_db::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $retArray = array();
                foreach ($result as $res) {
                    $retArray[] = BannerTop::getInstanceByArray($res);
                }
                return $retArray;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     *
     *
     * @param $isFirstPage
     * @throws Exception
     * @return array
     * @static
     */
    public static function getPageInstance($isFirstPage)
    {
        try {
            $db = simo_db::getInstance();

            $sql = 'SELECT * FROM banner_top WHERE is_first_page=' . $isFirstPage . ' LIMIT 1';

            $result = $db->query($sql, simo_db::QUERY_MOD_ASSOC);

            if (isset($result[0])) {
                $o = new BannerTop();
                $o->fillFromArray($result[0]);
                return $o;
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     *
     *
     * @param array $values
     * @return void
     * @access public
     */
    public function fillFromArray($values)
    {
        $this->setId($values['id']);
        $this->setTitle($values['title']);
        $this->_img->setName($values['img']);
        $this->setIsFirstPage($values['is_first_page']);
    }

    /**
     * @param int $isFirstPage
     */
    public function setIsFirstPage($isFirstPage)
    {
        $this->_isFirstPage = $isFirstPage;
    }

    /**
     * @return int
     */
    public function getIsFirstPage()
    {
        return $this->_isFirstPage;
    }


}

?>
