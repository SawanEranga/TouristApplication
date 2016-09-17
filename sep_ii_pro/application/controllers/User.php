<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
        
        public function __construct() {
            parent::__construct();
            $this->load->model('User_model');
        }
    
    
	public function index()
	{
            $this->load->view('includes/siteheadder');
            $this->load->view('includes/navigationbar');
            $this->load->view('user/profile');
            $this->load->view('includes/sitefooter');
            $this->load->view('includes/sitefooterscript');
	}
        
        public function register()
        {
            $result["vv"]=$this->User_model->I_user_Registration();
            
            if(empty($result))
            {
                $this->load->view('includes/siteheadder');
                $this->load->view('includes/navigationbar');
                $this->load->view('user/profile',$result);
                $this->load->view('includes/sitefooter');
                $this->load->view('includes/sitefooterscript');
            }
            else 
            {
                $this->load->view('login/register.php',$result);
            }
        }
       
}
