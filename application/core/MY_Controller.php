<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {
    protected $global = array ();

    protected $role = '';
    protected $vendorId = '';
    protected $name = '';
    protected $roleText = '';
    protected $lastLogin = '';

    function __construct() {
        parent::__construct();
    }

    /**
     * This function is used to check the access
     */
    function isAdmin() {
            if ($this->role == ROLE_ADMIN) {
                    return true;
            } else {
                    return false;
            }
    }

    /**
     * This function is used to check the access
     */
    function isManager() {
            if ($this->role == ROLE_MANAGER) {
                    return true;
            } else {
                    return false;
            }
    }

    /**
     * This function is used to check the access
     */
    function isAgent() {
            if ($this->role == ROLE_AGENT) {
                    return true;
            } else {
                    return false;
            }
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


    function loadThis()
    {
        $this->global ['pageTitle'] = 'CodeInsect : Access Denied';

        $this->load->view ( 'includes/header', $this->global );
        $this->load->view ( 'access' );
        $this->load->view ( 'includes/footer' );
    }

    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn() {
        $isLoggedIn = $this->session->userdata ( 'isLoggedIn' );

        if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
                redirect ( 'login' );
        } else {
            $this->role = $this->session->userdata ( 'role' );
            $this->vendorId = $this->session->userdata ( 'userId' );
            $this->name = $this->session->userdata ( 'name' );
            $this->roleText = $this->session->userdata ( 'roleText' );
            $this->lastLogin = $this->session->userdata ( 'lastLogin' );

            $this->global ['name'] = $this->name;
            $this->global ['role'] = $this->role;
            $this->global ['role_text'] = $this->roleText;
            $this->global ['last_login'] = $this->lastLogin;
        }
    }

    /**
     * This function used provide the pagination resources
     * @param {string} $link : This is page link
     * @param {number} $count : This is page count
     * @param {number} $perPage : This is records per page limit
     * @return {mixed} $result : This is array of records and pagination data
     */
    function paginationCompress($link, $count, $perPage = 10, $segment = SEGMENT) {
        $this->load->library ( 'pagination' );

        $config ['base_url'] = base_url () . $link;
        $config ['total_rows'] = $count;
        $config ['uri_segment'] = $segment;
        $config ['per_page'] = $perPage;
        $config ['num_links'] = 5;
        $config ['full_tag_open'] = '<nav><ul class="pagination">';
        $config ['full_tag_close'] = '</ul></nav>';
        $config ['first_tag_open'] = '<li class="arrow">';
        $config ['first_link'] = 'First';
        $config ['first_tag_close'] = '</li>';
        $config ['prev_link'] = 'Previous';
        $config ['prev_tag_open'] = '<li class="arrow">';
        $config ['prev_tag_close'] = '</li>';
        $config ['next_link'] = 'Next';
        $config ['next_tag_open'] = '<li class="arrow">';
        $config ['next_tag_close'] = '</li>';
        $config ['cur_tag_open'] = '<li class="active"><a href="#">';
        $config ['cur_tag_close'] = '</a></li>';
        $config ['num_tag_open'] = '<li>';
        $config ['num_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li class="arrow">';
        $config ['last_link'] = 'Last';
        $config ['last_tag_close'] = '</li>';

        $this->pagination->initialize ( $config );
        $page = $config ['per_page'];
        $segment = $this->uri->segment ( $segment );

        return array (
                        "page" => $page,
                        "segment" => $segment
        );
    }
}
