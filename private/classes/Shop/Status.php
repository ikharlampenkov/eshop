<?

/**
 * class Status
 *
 */
class Status
{

    /** Aggregations: */

    /** Compositions: */

     /*** Attributes: ***/

    /**
     *
     * @access private
     */
    private $_id;

    /**
     *
     * @access private
     */
    private $_title;

    /**
     *
     * @access private
     */
    private $_prior = 0;

    /**
     *
     * @access private
     */
    private $_color = "ffffff";

    /**
     *
     * @access private
     */
    private $_db;


    /**
     *
     *
     * @return
     * @access public
     */
    public function __constuct( ) {
        $this->_db = simo_db::getInstance();
    } // end of member function __constuct

    /**
     *
     *
     * @param string name

     * @param string value

     * @return string
     * @access public
     */
    public function __get( $name,  $value ) {
    } // end of member function __get

    /**
     *
     *
     * @return int
     * @access public
     */
    public function getId( ) {
        return $this->_id;
    } // end of member function getId

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getTitle( ) {
        return $this->_title;
    } // end of member function getTitle

    /**
     *
     *
     * @return int
     * @access public
     */
    public function getPrior( ) {
        return $this->_prior;
    } // end of member function getPrior

    /**
     *
     *
     * @return string
     * @access public
     */
    public function getColor( ) {
        return $this->_color;
    } // end of member function getColor

    /**
     *
     *
     * @param int value

     * @return
     * @access public
     */
    public function setId( $value ) {
    } // end of member function setId

    /**
     *
     *
     * @param string value

     * @return
     * @access public
     */
    public function setTitle( $value ) {
    } // end of member function setTitle

    /**
     *
     *
     * @param int value

     * @return
     * @access public
     */
    public function setPrior( $value ) {
    } // end of member function setPrior

    /**
     *
     *
     * @param string value

     * @return
     * @access public
     */
    public function setColor( $value ) {
    } // end of member function setColor

    /**
     *
     *
     * @return
     * @access public
     */
    public function insertToDb( ) {
    } // end of member function insertToDb

    /**
     *
     *
     * @return
     * @access public
     */
    public function updateToDb( ) {
    } // end of member function updateToDb

    /**
     *
     *
     * @return
     * @access public
     */
    public function deleteFromDb( ) {
    } // end of member function deleteFromDb

    /**
     *
     *
     * @param array array

     * @return Shop::Status
     * @static
     * @access public
     */
    public static function getInstanceByArray( $array ) {
    } // end of member function getInstanceByArray

    /**
     *
     *
     * @param int id

     * @return Shop::Status
     * @static
     * @access public
     */
    public static function getInstanceById( $id ) {
    } // end of member function getInstanceById

    /**
     *
     *
     * @return
     * @static
     * @access public
     */
    public static function getAllInstance( ) {
    } // end of member function getAllInstance



    /**
     *
     *
     * @param array array

     * @return
     * @access private
     */
    private function _assignByHash( $array ) {
    } // end of member function _assignByHash



} // end of Status
?>