<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Sawan Eranga
 * @email sekandamby@gmail.com
 */

class Register extends CI_Controller {

	/**
        * Constructor
        *
        * @access	public
        * @param	none
        * @return	none 
        */

        public function __construct() {
            parent::__construct();
//            $this->load->model('User_model');
        }



	public function index()
	{
            $this->load->view('includes/siteheadder');
            $this->load->view('includes/navigationbar');
            $this->load->view('catogery/display_one_catogery');
            $this->load->view('includes/sitefooter');
            $this->load->view('includes/sitefooterscript');
	}
        
        
}
