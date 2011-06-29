<?php
/* 
 CREATE TABLE IF NOT EXISTS `content_page` (
  `id` int(11) NOT NULL,
  `page_title` varchar(40) NOT NULL DEFAULT 'английское название для системы',
  `title` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_title_UNIQUE` (`page_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 */

class gkh_content_page extends gkh {


    public function  __construct() {
        parent::__construct();
    }

    public function getAllContentPage() {
        try {
            $sql = 'SELECT * FROM content_page';
            $result = $this->_db->query($sql, simo_db::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                return $result;
            } else return false;
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function getContentPage($id) {
        try {
            $sql = 'SELECT * FROM content_page WHERE id=' . (int)$id . ' OR page_title="' . $id . '"';
            $result = $this->_db->query($sql, simo_db::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                $result[0]['content'] = stripslashes($result[0]['content']);
                return $result[0];
            } else return false;
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function addContentPage($data) {
        try {
            $data = $this->_db->prepareArray($data);
            $sql = 'INSERT INTO content_page(page_title, title, content) 
                    VALUES("' . $data['page_title'] . '", "' . $data['title'] . '", "' . $data['content'] . '")';
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function updateContentPage($id, $data) {
        try {
            $data = $this->_db->prepareArray($data);
            $sql = 'UPDATE content_page 
                    SET page_title="' . $data['page_title'] . '", title="' . $data['title'] . '", 
                        content="' . $data['content'] . '" 
                    WHERE id=' . (int)$id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function deleteContentPage($id) {
        try {
            $sql = 'DELETE FROM content_page WHERE id=' . (int)$id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function  __destruct() {
        parent::__destruct();
    }

}

?>
