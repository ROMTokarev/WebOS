<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Mineradd extends CI_Controller {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct();
		$this->load->helper(array('url'));
	}


	public function index() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in !== TRUE) redirect('/');

        $this->blade->render('content/ajax/MinerAdd');
	}

		public function GetMiner() {
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in !== TRUE) redirect('/');

		$MinerName = $this->input->post('MinerName');
    $MinerIP   = $this->input->post('MinerIP');
	  $MinerPort = $this->input->post('MinerPort');
		$MinerType = $this->input->post('MinerType');

		function HashRand() {return md5(md5(microtime() ." ". rand(5, 150)) . " ". rand(5, 150)); }

    	if($MinerName != "" OR $MinerIP != "" OR $MinerPort != "")
	    {
        $this->Cloud_model->CloudMinerAdd($MinerName, $MinerPort, $MinerIP, HashRand(), $MinerType);
	  	}

        redirect('/');
	}

}
