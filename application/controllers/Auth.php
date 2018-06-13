<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Auth extends CI_Controller {

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

	if($this->Cloud_model->CloudItem('install') == '') redirect('/install');

	 $logged_in     = $this->session->userdata('logged_in');
	 if($logged_in === TRUE) redirect('home');

     $data['content'] = 'content/auth/login';

     $this->blade->render('content/auth/login', $data);


	}

	public function login() {

	$username       = $this->input->post('username');
    $password       = $this->input->post('password');

	$users          = $this->Cloud_model->CloudGetUser($username);

	foreach ($users as $row)
    {
	 if($username == $row['login'] AND $password == $row['pass'])
	 {

      $newdata = array(
       'username'  => $row['login'],
       'email'     => '',
       'logged_in' => TRUE
      );

      $this->session->set_userdata($newdata);
	  redirect('home');
	 }
    }


    redirect('/');

	}

	public function logout() {

    $this->session->set_userdata('logged_in', FALSE);
     redirect('/');

	}

}
