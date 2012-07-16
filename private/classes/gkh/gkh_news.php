<?php

/*
  CREATE TABLE IF NOT EXISTS `news` (
    `id` int(10) unsigned NOT NULL auto_increment,
    `date` datetime NOT NULL,
    `title` varchar(255) NOT NULL,
    `short_text` text,
    `full_text` text,
    PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

 */

/**
 * Description of gkh_news
 *
 * @author Moris
 */
class gkh_news extends gkh {
    const NEWS_ON_FIRST_PAGE = 5;
    const NEWS_ON_PAGE = 20;

    public function __construct() {
        parent::__construct();
    }

    public function getAllNews($cur_page = -1) {
        try {
            $sql = 'SELECT * FROM news ';

            $sql .= ' ORDER BY date DESC ';

            if ($cur_page != -1) {
                $sql .= ' LIMIT ' . $cur_page * gkh_news::NEWS_ON_PAGE . ', ' . gkh_news::NEWS_ON_PAGE;
            }

            $result = $this->_db->query($sql, simo_db::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
                return $result;
            } else
                return false;
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function getNews($id) {
        try {
            $sql = 'SELECT * FROM news WHERE id=' . (int)$id;
            $result = $this->_db->query($sql, simo_db::QUERY_MOD_ASSOC);
            if (isset($result[0])) {
			    $result[0]['full_text'] = stripslashes(str_replace('&quot;', '"',  $result[0]['full_text']));
                return $result[0];
            } else
                return false;
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function addNews($data) {
        try {
            $data = $this->_db->prepareArray($data);
            $data['date'] = date('Y-m-d', strtotime($data['date']));

            $sql = 'INSERT INTO news(date, title, short_text, full_text)
                         VALUES("' . $data['date'] . '", "' . $data['title'] . '", "' . $data['short_text'] . '", "' . $data['full_text'] . '")';
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function updateNews($id, $data) {
        try {
            $data = $this->_db->prepareArray($data);
            $data['date'] = date('Y-m-d', strtotime($data['date']));

            $sql = 'UPDATE news
                    SET date="' . $data['date'] . '", title="' . $data['title'] . '",
                        short_text="' . $data['short_text'] . '", full_text="' . $data['full_text'] . '"
                    WHERE id=' . (int)$id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function deleteNews($id) {
        try {
            $sql = 'DELETE FROM news WHERE id=' . (int)$id;
            $this->_db->query($sql);
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
        }
    }

    public function getPageInfo($cur_page) {
        $retArray = array();
        $retArray['cur_page'] = $cur_page;
        $retArray['rec_on_page'] = gkh_news::NEWS_ON_PAGE;

        try {
            $sql = 'SELECT COUNT(id) FROM news ';

            $result = $this->_db->query($sql);
            $retArray['page_count'] = ceil(($result[0][0] / $retArray['rec_on_page']));
        } catch (Exception $e) {
            simo_exception::registrMsg($e, $this->_debug);
            $retArray['page_count'] = 0;
        }
        return $retArray;
    }

    public function __destruct() {
        parent::__destruct();
    }

}

?>
