<?php
class Cloud_model extends CI_Model {



		

		function CloudUser() {
      $config     = $this->session->userdata('config');
			echo $config;
		}

		function CloudMinerAdd($MinerName, $MinerPort, $MinerIP, $HashRand, $MinerType) {

      $miner_config_count   = count($this->Cloud_model->CloudItem('miner_config'));

			$data_config =  '$config["miner_config"]['. $miner_config_count .']["miner_name"] = "'. $MinerName .'";' . PHP_EOL;
			$data_config .= '$config["miner_config"]['. $miner_config_count .']["miner_port"] = "'. $MinerPort .'";' . PHP_EOL;
			$data_config .= '$config["miner_config"]['. $miner_config_count .']["miner_ip"]   = "'. $MinerIP .'";'   . PHP_EOL;
			$data_config .= '$config["miner_config"]['. $miner_config_count .']["miner_id"]   = "'. $HashRand .'";' . PHP_EOL;

			$data_config .= '$config["miner_config"]['. $miner_config_count .']["miner_type"] = "'. $MinerType .'";' . PHP_EOL;


			$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/application/config/config.php', 'a');
            fwrite($fp, PHP_EOL . $data_config . PHP_EOL);
            fclose($fp);
		}

		function CloudGetUser($login) {

			$data[0]['login'] = $this->config->item('login');
			$data[0]['pass'] = $this->config->item('password');

			return $data;
		}

		function CloudItem($Item) {
			return $this->config->item($Item);
		}

}
