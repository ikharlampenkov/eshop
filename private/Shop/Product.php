require_once 'FileManager/Image.php';require_once 'Shop/Rubric.php';/** * class Product *  */class Product{    /** Aggregations: */    /** Compositions: */     /*** Attributes: ***/    /**     *      * @access protected     */    protected $_id;    /**     *      * @access protected     */    protected $_title;    /**     *      * @access protected     */    protected $_img;    /**     *      * @access protected     */    protected $_shortText;    /**     *      * @access protected     */    protected $_fullText;    /**     *      * @access protected     */    protected $_rubric;    /**     *      *     * @return      * @access public     */    public function __construct( ) {    } // end of member function __construct    /**     *      *     * @return int     * @access public     */    public function getId( ) {    } // end of member function getId    /**     *      *     * @return string     * @access public     */    public function getTitle( ) {    } // end of member function getTitle    /**     *      *     * @return FileManager::Image     * @access public     */    public function getImg( ) {    } // end of member function getImg    /**     *      *     * @return string     * @access public     */    public function getShortText( ) {    } // end of member function getShortText    /**     *      *     * @return string     * @access public     */    public function getFullText( ) {    } // end of member function getFullText    /**     *      *     * @return Shop::Rubric     * @access public     */    public function getRubric( ) {    } // end of member function getRubric    /**     *      *     * @param string value      * @return      * @access public     */    public function setTitle( $value ) {    } // end of member function setTitle    /**     *      *     * @param string value      * @return      * @access public     */    public function setShortText( $value ) {    } // end of member function setShortText    /**     *      *     * @param string value      * @return      * @access public     */    public function setFullText( $value ) {    } // end of member function setFullText} // end of Product?>