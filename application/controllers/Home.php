<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Home extends CI_Controller {

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

	   $data['content']    = 'content/index';
       $data['title']      = 'Home';

	   $data['InstallKey'] = $this->Cloud_model->CloudItem('InstallKey');

	   $data['miner_config']   = $this->Cloud_model->CloudItem('miner_config');

       $this->blade->render('Child', $data);

	}

}
