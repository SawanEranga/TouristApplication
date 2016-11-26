<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Sawan Eranga
 * @email sekandamby@gmail.com
 */

class Gps_map_tracking extends CI_Controller {

	/**
        * Constructor
        *
        * @access	public
        * @param	none
        * @return	none 
        */

        public function __construct() {
            parent::__construct();
            $this->load->model('Gmap_track_model');
        }

        /**
        * Load the gmap view
        *
        * @access	public
        * @param	none
        * @return	none
        */

	public function index()
	{
            $data['absolute_js_to_load'] = array("https://maps.googleapis.com/maps/api/js?key=AIzaSyCsAQASjLDim87C0ojgFxIY3rB2ZHMwq5M");
            $data['js_to_load'] = array("sawan/js/s_gmap_tracking.js");
            $data['css_to_load'] = array("sawan/css/mystyle1.css");
            $this->load->view('includes/siteheadder',$data);
            $this->load->view('includes/navigationbar');
            $this->load->view('gps_map_tracking/index');  
            $this->load->view('includes/sitefooterscript',$data);
	}
        
        
        public function index1()
	{
//            $data['js_to_load'] = array("sawan/js/s_gmap_tracking1.js","sawan/materialize/js/materialize.min.js","sawan/js/markerclusterer.js");
            $data['absolute_js_to_load'] = array("https://maps.googleapis.com/maps/api/js?key=AIzaSyCsAQASjLDim87C0ojgFxIY3rB2ZHMwq5M&libraries=geometry");
            $data['js_to_load'] = array("sawan/js/s_gmap_tracking1.js","sawan/materialize/js/materialize.js");
            $data['css_to_load'] = array("sawan/css/mystyle1.css");
//            $data['css_to_load'] = array("sawan/materialize/css/materialize.min.css");
            $this->load->view('includes/siteheadder',$data);
            $this->load->view('includes/navigationbar');
            $this->load->view('gps_map_tracking/index1');  
            $this->load->view('includes/sitefooterscript',$data);
	}
        
        
        /**
        * Load the places according to categories
        *
        * @access	public
        * @param	none
        * @return	place details
        */
        public function load_cords(){
            $cat_det = $this->Gmap_track_model->load_cords();
            echo json_encode($cat_det);
        }
        
        public function index2()
	{
            $data['absolute_js_to_load'] = array("https://maps.googleapis.com/maps/api/js?key=AIzaSyCsAQASjLDim87C0ojgFxIY3rB2ZHMwq5M&libraries=geometry");
            $data['js_to_load'] = array("sawan/js/s_gmap_trip_tracking.js");
            $data['css_to_load'] = array("sawan/css/mystyle1.css");
            $this->load->view('includes/siteheadder',$data);
            $this->load->view('includes/navigationbar');
            $this->load->view('gps_map_tracking/index2');  
            $this->load->view('includes/sitefooterscript',$data);
	}
        
        /**
        * Load the places according to trip created by user
        *
        * @access	public
        * @param	none
        * @return	place details
        */
        public function load_trip_loc(){
            $plc_det = $this->Gmap_track_model->load_trip_loc();
            echo json_encode($plc_det);
        }
}
