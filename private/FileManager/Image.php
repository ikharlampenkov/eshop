<?phprequire_once 'FileManager/File.php';/** * class Image *  */class Image extends File{    /** Aggregations: */    /** Compositions: */     /*** Attributes: ***/    /**     *      *     * @param string field      * @return string     * @access public     */    public function download( $field ) {    } // end of member function download    /**     *      *     * @param int size      * @return      * @access public     */    public function createPreview( $size = 100 ) {        global $__cfg;    $ext = vl_functions::getFileExt($fname);    $image = self::_getImageByType($ext, $__cfg['site.dir'] . $fname);    list($oldxsize, $oldysize) = getimagesize($__cfg['site.dir'] . $fname);    $newxsize = $oldxsize;    $newysize = $oldysize;//    echo 'X=' . $newxsize . '   Y=' . $newysize. '<br>';    if ($newxsize > $size) {      $newysize = $newysize*$size/$newxsize;      $newxsize = $size ;    }     if ($newysize > $size) {      $newxsize = $newxsize*$size/$newysize;      $newysize = $size ;    }    $image_p = imagecreatetruecolor($newxsize , $newysize );    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $newxsize ,$newysize , $oldxsize, $oldysize);    self::_savePreviewFile($ext, $image_p, $__cfg['site.dir'] . str_replace('.', $prew_name, $fname));    chmod($__cfg['site.dir'] . str_replace('.', $prew_name, $fname), 0666);    } // end of member function createPreview    /**     *      *     * @return      * @access public     */    public function delete( ) {    } // end of member function delete    /**     *      *     * @return string     * @access public     */    public function getPreview( ) {    } // end of member function getPreview} // end of Image/* * static public function appendPrewField(&$data){    foreach ($data as &$img) {        $img['prew'] = str_replace('.', '_prew.', $img['img']);      }  }    static private function _savePreviewFile($ext, $image_p, $file){    switch ($ext){      case 'gif':  return imagegif($image_p, $file);      case 'png':  return imagepng($image_p, $file);      case 'jpg':  return imagejpeg($image_p, $file);      case 'jpeg': return imagejpeg($image_p, $file);    }    return false;  }  static private function _getImageByType($ext, $name){    global $__cfg;    switch ($ext){      case 'gif':        $image   = imagecreatefromgif($name);        break;      case 'jpeg':        $image   = imagecreatefromjpeg($name);        break;      case 'jpg':        $image   = imagecreatefromjpeg($name);        break;      case 'png':        $image   = imagecreatefrompng($name);        break;      default:        return false;    }    return $image;  } *  * static public function uploadPic_new($file, $field_name = 'pic', $path='') {    global $__cfg;    $_file=array();    $ext_list = array('gif', 'jpg', 'jepg',  'png', 'swf');    $ext = explode('.', strtolower($_FILES[$field_name]['name']));        if (count($ext) == 2 && in_array($ext[1], $ext_list) &&      file_exists($_FILES[$field_name]['tmp_name']) && $_FILES[$field_name]['size'] < 1000000) {        $_file['ext']=$ext[1];        $_file['filename'] = $file . '.' . $_file['ext'];        $_file['fullname'] = $path . $_file['filename'];        vl_functions::_delFile($_file['fullname']);                        $result = rename($_FILES[$field_name]['tmp_name'], $__cfg['site.dir'] . $_file['fullname']);        chmod($__cfg['site.dir'] . $_file['fullname'], 0666);                list($x, $y, $type)=getimagesize($__cfg['site.dir'] . $_file['fullname']);            $_file['x']=$x;            $_file['y']=$y;            $_file['type']=$type;                      vl_log::logToDB('Загружена картинка ' , vl_log::VL_LOG_INFO );        if ($result) return $_file;    }    return false;  } */?>