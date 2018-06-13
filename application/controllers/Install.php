<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Install extends CI_Controller {

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

		if($this->Cloud_model->CloudItem('install') != '') redirect('/');
       $this->blade->render('content/install/page_one');

	}

	public function started() {

	$username         = $this->input->post('username');
    $password         = $this->input->post('password');
	$confirm_password = $this->input->post('confirm_password');
	$miner_ip         = $this->input->post('miner_ip');
    $miner_port       = $this->input->post('miner_port');

	function HashRand() {return md5(md5(microtime() ." ". rand(5, 150)) . " ". rand(5, 150)); }

	if($username != "" OR $password != "" OR $confirm_password != "" OR $miner_ip != "" OR $miner_port != "")
	{
		if($password == $confirm_password)
		{

			$data_config = '$config["login"] = "'. $username .'";' . PHP_EOL;
            $data_config .= '$config["password"] = "'. md5($password) .'";' . PHP_EOL;

			$data_config .= '$config["install"] = "1";' . PHP_EOL;

			$data_config .= '$config["version"] = "0.0.2a";' . PHP_EOL;

			$data_config .= '$config["InstallKey"] = "'. HashRand() .'";' . PHP_EOL;

			$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/application/config/config.php', 'a');
            fwrite($fp, PHP_EOL . $data_config . PHP_EOL);
            fclose($fp);

			redirect('/');
		}
	}


       redirect('/install');

	}

}
