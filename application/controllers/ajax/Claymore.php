<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Claymore extends CI_Controller {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('miner/Claymore_model');
	}


	public function index() {


 $ClaymoreJson = $this->Claymore_model->request("78.36.10.57", "9876");

$data['version'] = $ClaymoreJson['result'][0];
$data['uptime_unit'] = "";

$data['SSR'] = explode(";", $ClaymoreJson['result'][2]); // Speed; Shares; Rejected;
$data['SSRGPU'] = explode(";", $ClaymoreJson['result'][3]);
$data['SSR2'] = explode(";", $ClaymoreJson['result'][4]);
$SSRGPU = explode(";", $ClaymoreJson['result'][5]);
$data['SSR2GPU'] = $SSRGPU;
$data['SSR2GPUcount'] = count($SSRGPU)*2;
$data['GPUTempFun'] = explode(";", $ClaymoreJson['result'][6]);
$data['Pools'] = explode(";", $ClaymoreJson['result'][7]);



  $this->blade->render('content/ajax/claymore', $data);
	}

}
