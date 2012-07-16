<?php

/*
 * CREATE TABLE IF NOT EXISTS `product_tone` (
   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `product_id` int(10) unsigned NOT NULL,
   `title` varchar(255) NOT NULL,
   `file` varchar(255) NOT NULL,
   PRIMARY KEY (`id`),
   KEY `product_id` (`product_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 */


/**
 * class Product
 *
 */
class ProductTone
{
    /**
     * @var int
     */
    protected $_id;

    /**
     * @var string
     */
    protected $_title;

    /**
     * @var Image
     */
    protected $_img = null;

    /**
     * @var Product
     */
    protected $_product = null;

    /**
     * @var simo_db
     */
    private $_db;

    /**
     *
     *
     * @return \ProductTone
     */
    public function __construct()
    {
        global $__cfg;
        $this->_db = simo_db::getInstance();
        $this->_img = new Image($__cfg['file.upload.dir']);
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
     * @return int
     * @access public
     */
    public function getId()
    {
        return $this->_id;
    }

// end of member function getId

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getTitle()
    {
        return $this->_title;
    }

// end of member function getTitle

    /**
     *
     *
     * @return Image
     * @access public
     */
    public function getImg()
    {
        return $this->_img;
    }

    public function setId($value)
    {
        $this->_id = $value;
    }

    /**
     *
     *
     * @param string
     * @return void
     */
    public function setTitle($value)
    {
        $this->_title = $value;
    }

    public function setImg($value)
    {
        if (is_null($this->_img)) {
            global $__cfg;
            $this->_img = new Image($__cfg['file.upload.dir'], $value);
        } else {
            $this->_img->setName($value);
        }
    }

    /**
     * @param \Product $product
     */
    public function setProduct($product)
    {
        $this->_product = $product;
    }

    /**
     * @return \Product
     */
    public function getProduct()
    {
        return $this->_product;
    }

    public function insertToDb()
    {
        global $__cfg;
        try {
            $sql = 'INSERT INTO product_tone (product_id, title)
                    VALUES (' . $this->_product->getId() . ', "' . $this->_title . '")';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();

            $fileName = $this->_img->download('tone');
            if ($fileName !== false) {
                $this->_img->createPreview();
                $this->_db->query('UPDATE product_tone SET file="' . $fileName . '" WHERE id=' . $this->_id);
            }
        } catch (Exception $e) {
            simo_exception::registrMsg($e, true);
            return null;
        }
    }

//product_id, title, file

    public function updateToDb()
    {
        try {
            $sql = 'UPDATE product_tone
                    SET product_id=' . $this->_product->getId() . ', title="' . $this->_title . '",
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);

            $fileName = $this->_img->download('tone');
            if ($fileName !== false) {
                $this->_img->createPreview();
                $this->_db->query('UPDATE product_tone SET file="' . $fileName . '" WHERE id=' . $this->_id);
            }
        } catch (Exception $e) {
            simo_exception::registrMsg($e, true);
            return null;
        }
    }

    public function deleteFromDb()
    {
        try {
            $this->_img->delete();

            $sql = 'DELETE FROM product_tone WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, true);
        }
    }

    public function deleteImg()
    {
        try {
            $this->_img->delete();

            $sql = 'UPDATE product_tone SET file=NULL WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, true);
        }
    }

    /**
     * @static
     * @param $product Product
     * @return array
     */
    public static function getAllInstance($product)
    {
        try {
            $db = simo_db::getInstance();
            $result = $db->query('SELECT * FROM product_tone WHERE product_id=' . $product->getId(), simo_db::QUERY_MOD_ASSOC);
            $toneArray = array();

            if (isset($result[0])) {

                foreach ($result as $value) {
                    $toneArray[] = ProductTone::getInstanceByArray($value);

                }
                return $toneArray;
            } else {
                return false;
            }
        } catch (Exception $e) {
            simo_exception::registrMsg($e, true);
            return null;
        }
    }

    public static function getInstanceById($id)
    {
        try {
            $db = simo_db::getInstance();
            $result = $db->query('SELECT * FROM product_tone WHERE id=' . $id, simo_db::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $o = new ProductTone();
                $o->assignByHash($result[0]);
                return $o;
            }
        } catch (Exception $e) {
            simo_exception::registrMsg($e, true);
            return null;
        }
    }

    public static function getInstanceByArray(array $array)
    {
        $o = new ProductTone();
        $o->assignByHash($array);
        return $o;
    }

    protected function assignByHash(array $result)
    {
        $this->setId($result['id']);
        $this->setTitle($result['title']);

        $this->setProduct($result['product_id']);

        $this->setImg($result['file']);
    }


}
