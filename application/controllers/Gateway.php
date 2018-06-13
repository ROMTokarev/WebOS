<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Gateway extends CI_Controller {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct();

	}


	public function index() {

	function base64url_encode($data) {
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
     }

	$InstallKey = $this->Cloud_model->CloudItem("InstallKey");
	$version    = $this->Cloud_model->CloudItem("version");

	 $Gateway_Options = base64url_encode('{"InstallKey":"'.$InstallKey.'", "version":"'.$version.'"}');


	 $GatewayLine         = 'http://tab.bit-panel.com/api/gateway?key='.$Gateway_Options;
     $GatewayLine_headers = @get_headers($filename);
	 $GatewayLine_null    = '{ "width": "0", "height": "0", "title": "0", "content": "0", "Saves": "0", "close": "0", "show": "0"  }';

     if($GatewayLine_headers[0] == 'HTTP/1.0 404 Not Found'){
       echo "The file $GatewayLine does not exist";
     } else if ($GatewayLine_headers[0] == 'HTTP/1.0 302 Found' && $GatewayLine_headers[7] == 'HTTP/1.0 404 Not Found'){
       echo "The file $GatewayLine does not exist, and I got redirected to a custom 404 page..";
     } else {
       echo file_get_contents($GatewayLine, FILE_USE_INCLUDE_PATH);
     }




	}



}
