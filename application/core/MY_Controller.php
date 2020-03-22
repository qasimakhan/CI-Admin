<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {
    protected $global = array ();
    
    protected $role = -1;
    protected $userId = -1;
            
    function __construct() {
        parent::__construct();
    }
    
    /**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        $this->load->view('includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn() {
            $isLoggedIn = $this->session->userdata ( 'isLoggedIn' );

//            if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
//                    redirect ( 'login' );
//            } else {
                    $this->role = $this->session->userdata ( 'role' );
                    $this->userId = $this->session->userdata ( 'userId' );

                    $this->global ['userId'] = $this->userId;
                    $this->global ['role'] = $this->role;
//            }
    }
}