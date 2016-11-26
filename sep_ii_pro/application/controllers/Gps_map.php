<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Sawan Eranga
 * @email sekandamby@gmail.com
 */

class Gps_map extends CI_Controller {

	/**
        * Constructor
        *
        * @access	public
        * @param	none
        * @return	none 
        */

        public function __construct() {
            parent::__construct();
//            $this->load->model('Gps_model');
        }



	public function index()
	{
            $data['js_to_load'] = array("sawan/js/s_gmap.js","sawan/js/HPNeo gmap/HPNeo_gmaps.js");
            $data['css_to_load'] = array("sawan/css/mystyle1.css");
            $this->load->view('includes/siteheadder',$data);
            $this->load->view('includes/navigationbar');
            $this->load->view('gps_map/index');  
            $this->load->view('includes/sitefooterscript',$data);
            $this->load->view('includes/sitefooter');
	}
        
//        public function load_cat(){
//            $lec_det = $this->Gmap_model->load_cat();
//            echo json_encode($lec_det);
//        }
        
        
}
