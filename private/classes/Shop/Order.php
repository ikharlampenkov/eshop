<?php

/*
  CREATE  TABLE IF NOT EXISTS `eshop`.`order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_login` VARCHAR(10) NOT NULL ,
  `date` DATETIME NOT NULL ,
  `discount` DECIMAL(12,2) NULL ,
  `is_complite` TINYINT(1)  NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_order_user1` (`user_login` ASC) ,
  CONSTRAINT `fk_order_user1`
  FOREIGN KEY (`user_login` )
  REFERENCES `eshop`.`user` (`login` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION)
  ENGINE = InnoDB
 */

/**
 * class Order
 *
 */
class Order
{

    const NEW_ORDER = 1;

    protected $_id;
    protected $_user;
    protected $_date;
    protected $_discount = 0;
    protected $_isComplite = 0;
    protected $_productList = array();
    protected $_status = null;
    protected $_guestInfo = '';

    /**
     * @var simo_db
     */
    private $_db;

    public function __construct()
    {
        $this->_db = simo_db::getInstance();
        $this->setStatus(Order::NEW_ORDER);
    }

    public function __get($name)
    {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getUser()
    {
        return $this->_user;
    }

    public function getDate()
    {
        return $this->_date;
    }

    public function getDiscount()
    {
        return $this->_discount;
    }

    public function getIsComplite()
    {
        return $this->_isComplite;
    }

    public function getProductList()
    {
        return $this->_productList;
    }

    public function getStatus()
    {
        return $this->_status;
    }

    public function setId($value)
    {
        $this->_id = $value;
        $this->_fillProductList();
    }

    public function setUser($value)
    {
        $this->_user = $value;
    }

    public function setDate($value)
    {
        $timestamp = strtotime($value);
        $this->_date = date('Y-m-d', $timestamp);
    }

    public function setDiscount($value)
    {
        $this->_discount = str_replace(',', '.', $value);
        ;
    }

    public function setIsComplite($value)
    {
        if ($value == 'on') {
            $this->_isComplite = 1;
        } elseif (empty($value)) {
            $this->_isComplite = 0;
        } else {
            $this->_isComplite = $value;
        }
    }

    public function setStatus($value)
    {
        if ($value instanceof Status) {
            $this->_status = $value;
        } else {
            $this->_status = Status::getInstanceById($value);
        }
    }

    public function setGuestInfo($guestInfo)
    {
        $this->_guestInfo = $guestInfo;
    }

    public function getGuestInfo()
    {
        return $this->_guestInfo;
    }

    public function insertToDb($data)
    {
        global $__cfg;

        $this->_sendToEmail($data);

        $guestInfo = '';
        if (!empty($data)) {
            $guestInfo .= 'Имя: ' . $data['name'] . "\r\n" .
                    'Телефон: ' . $data['tel'] . "\r\n" .
                    'E-mail: ' . $data['email'] . "\r\n";
            $this->setGuestInfo($guestInfo);
        }


        try {
            $sql = 'INSERT INTO `order` (user_login, date, discount, is_complite, status, guest_info)
                    VALUES ("' . $this->_user . '", "' . $this->_date . '", ' . $this->_discount . ', ' . $this->_isComplite . ',
                             ' . $this->_status->id . ', "' . $this->_guestInfo . '")';
            $this->_db->query($sql);

            $this->_id = $this->_db->getLastInsertId();

            $this->_saveProductListToDb();
        } catch (Exception $e) {
            simo_exception::registrMsg($e, false);
            return null;
        }
    }

    public function updateToDb()
    {
        try {
            $sql = 'UPDATE `order`
                    SET user_login="' . $this->_user . '", date="' . $this->_date . '",
                        discount=' . $this->_discount . ', is_complite="' . $this->_isComplite . '", 
                        status=' . $this->_status->id . ', guest_info="' . $this->_guestInfo . '"
                    WHERE id=' . $this->_id;
            $this->_db->query($sql);

            $this->_saveProductListToDb();
        } catch (Exception $e) {
            simo_exception::registrMsg($e, false);
            return null;
        }
    }

    public function deleteFromDb()
    {
        try {
            $this->_deleteproductListFromDb();

            $sql = 'DELETE FROM `order` WHERE id=' . $this->_id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, false);
        }
    }

    private function _saveProductListToDb()
    {
        if (!empty($this->_productList)) {
            foreach ($this->_productList as $item) {
                $sql = 'DELETE FROM order_product WHERE order_id=' . $this->_id . ' AND product_id=' . $item['product']->id;
                $this->_db->query($sql);

                if ($item['count'] > 0) {
                    if ($item['tone'] !== 0) {
                        $tone = $item['tone']->id;
                    } else {
                        $tone = 'NULL';
                    }

                    $sql = 'INSERT INTO order_product(order_id, product_id, count, tone_id) VALUES(' . $this->_id . ', ' . $item['product']->id . ', ' . $item['count'] . ', ' . $tone . ')';
                    $this->_db->query($sql);
                }
            }
        }
    }

    private function _deleteproductListFromDb()
    {
        if (!empty($this->_productList)) {
            $sql = 'DELETE FROM order_product WHERE order_id=' . $this->_id;
            $this->_db->query($sql);

            $this->_productList = array();
        }
    }

    public static function getInstanceById($id)
    {
        try {
            $db = simo_db::getInstance();
            $result = $db->query('SELECT * FROM `order` WHERE id=' . $id, simo_db::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $o = new Order();
                $o->assignByHash($result[0]);
                return $o;
            }
        } catch (Exception $e) {
            simo_exception::registrMsg($e, false);
            return null;
        }
    }

    public static function getInstanceByArray(array $array)
    {
        $o = new Order();
        $o->assignByHash($array);
        return $o;
    }

    protected function assignByHash(array $result)
    {
        $this->setId($result['id']);
        $this->setUser($result['user_login']);
        $this->setDate($result['date']);
        $this->setDiscount($result['discount']);
        $this->setIsComplite($result['is_complite']);
        $this->setStatus($result['status']);
        $this->setGuestInfo($result['guest_info']);
    }

    protected function _fillProductList()
    {
        try {
            $sql = 'SELECT * FROM order_product WHERE order_id=' . $this->_id;
            $result = $this->_db->query($sql, simo_db::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                foreach ($result as $res) {
                    if ($res['tone_id'] !== null) {
                        $tone = ProductTone::getInstanceById($res['tone_id']);
                    } else {
                        $tone = 0;
                    }

                    $this->_productList[] = array('product' => Product::getInstanceById($res['product_id']), 'count' => $res['count'], 'tone' => $tone);
                }
            }
        } catch (Exception $e) {
            simo_exception::registrMsg($e, false);
        }
    }

    public function restoreFromSession()
    {
        if (simo_session::existVar('date', 'order')) {
            $this->_date = simo_session::getVar('date', 'order');
            $this->_user = simo_session::getVar('user', 'order');

            foreach (simo_session::getVar('productList', 'order') as $item) {
                if ($item['tone'] !== 0) {
                    $tone = ProductTone::getInstanceById($item['tone']);
                } else {
                    $tone = 0;
                }

                $this->_productList[] = array('product' => Product::getInstanceById($item['product']), 'count' => $item['count'], 'tone' => $tone);
            }
        }
    }

    public function saveToSession()
    {
        if (simo_session::existVar('date', 'order')) {
            simo_session::clearVar('productList', 'order');
        } else {
            $this->_date = date('Y-m-d');
            simo_session::setVar('date', $this->_date, 'order');
            simo_session::setVar('user', $this->_user, 'order');
        }
        $temp_list = array();
        foreach ($this->_productList as $item) {
            if ($item['tone'] !== 0) {
                $tone = $item['tone']->id;
            } else {
                $tone = 0;
            }

            $temp_list[] = array('product' => $item['product']->id, 'count' => $item['count'], 'tone' => $tone);
        }
        simo_session::setVar('productList', $temp_list, 'order');
    }

    public function clearSession()
    {
        simo_session::clearVars('order');
        $this->_productList = array();
    }

    public function addProduct($product, $count, $tone)
    {
        $key = $this->_searchProduct($product);
        if ($key !== false) {
            $this->_productList[$key]['count'] += $count;
        } else {
            if ($tone !== 0) {
                $tone = ProductTone::getInstanceById($tone);
            } else {
                $tone = 0;
            }

            $this->_productList[] = array('product' => Product::getInstanceById($product), 'count' => $count, 'tone' => $tone);
        }
        $this->saveToSession();
    }

    public function changeProduct($product, $count)
    {
        $key = $this->_searchProduct($product);
        if ($key !== false) {
            if ($count > 0) {
                $this->_productList[$key]['count'] = $count;
            } else {
                unset($this->_productList[$key]);
            }
        }
        $this->saveToSession();
    }

    private function _searchProduct($product)
    {
        foreach ($this->_productList as $key => $prd) {
            if ($prd['product']->id == $product) {
                return $key;
            }
        }
        return false;
    }

    public function getSumm()
    {
        if (!empty($this->_productList)) {
            $summ = 0;
            foreach ($this->_productList as $item) {
                $summ += $item['product']->price * $item['count'];
            }
            return $summ;
        } else
            return 0;
    }

    public function getSummWithDiscount()
    {
        if (!empty($this->_productList)) {
            $summ = 0;
            foreach ($this->_productList as $item) {
                $summ += $item['product']->price * $item['count'];
            }
            return $summ - $this->_discount;
        } else
            return 0;
    }

    private function _sendToEmail($data)
    {

        $message = 'Заказ: ' . "\r\n";
        $message .= 'Дата: ' . date('d.m.Y', strtotime($this->_date)) . "\r\n" .
                'Имя: ' . $data['name'] . "\r\n" .
                'Телефон: ' . $data['tel'] . "\r\n" .
                'E-mail: ' . $data['email'] . "\r\n" . "\r\n";

        if (!empty($this->_productList)) {
            foreach ($this->_productList as $item) {
                if ($item['count'] > 0) {
                    $message .= 'Наименование: ' . $item['product']->title . ' кол-во: ' . $item['count'];

                    if ($item['tone'] != 0) {
                        $message .= ' тон: ' . $item['tone']->title;
                    }

                    $message .= "\r\n";
                }
            }
        }

        $email = $this->getEmail();

        $header = 'From: order@тиандемагазин.рф';
        if (!empty($email)) {
            mail($email, 'Новый заказ', mb_convert_encoding($message, 'windows-1251', 'UTF-8'), $header);
        }

    }


    public function getEmail()
    {
        try {
            $result = $this->_db->query('SELECT * FROM order_email WHERE id=1', simo_db::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                return $result[0]['email'];
            }
        } catch (Exception $e) {
            simo_exception::registrMsg($e, false);
            return null;
        }

    }

    public function saveEmail($email)
    {
        try {
            $sql = 'UPDATE order_email
                       SET email="' . $email . '"
                     WHERE id=1';
            $this->_db->query($sql);

            $this->_saveProductListToDb();
        } catch (Exception $e) {
            simo_exception::registrMsg($e, false);
            return null;
        }

    }

}
