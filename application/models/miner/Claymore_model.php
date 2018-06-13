<?php
class Claymore_model extends CI_Model {



		function __construct() {

		}



		function request($addr, $port) {
		//	$HtmlCod = file_get_contents("http://".$addr.":".$port."/", FILE_USE_INCLUDE_PATH);

$HtmlCod = file_get_contents("http://127.0.0.1/1.html", FILE_USE_INCLUDE_PATH);
      $Json = '{"result":'. explode(']}', explode('{"result":', $HtmlCod)[1])[0] .']}';

			return json_decode($Json, true);
		}

}
