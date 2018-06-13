<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Cgminer extends CI_Controller {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('miner/Cgminer_model');
	}


	public function index() {

		function round_up($value, $precision=2) {
 return ceil($value * pow(10, $precision)) / pow(10, $precision);
}

		$logged_in = $this->session->userdata('logged_in');

		if($logged_in !== TRUE) redirect('/');

		$ip         = $this->input->post('miner_ip');
        $port       = $this->input->post('miner_port');


		$fahrenheit = false;

		$total_rate = 0;
		$Total_Device_Hardware = 0;
		$total_errors = 0;
		$total_accepted = 0;
		$total_rejected = 0;
		$total_discarded = 0;
		$total_stale = 0;
		$total_confirmed = "N/A";

		$rig_summary = $this->Cgminer_model->request("summary", $ip, $port);
		$rig_config = $this->Cgminer_model->request("config", $ip, $port);
		$rig_coin = $this->Cgminer_model->request("coin", $ip, $port);


	$miner_program = $rig_summary["STATUS"]["Description"];
	$asic_code = "ASC";
	if (substr($miner_program, 0, 8) == "bfgminer") {
		$asic_code = "PGA";
	}
	$asic_code_lower = strtolower($asic_code);

	$asic_count = $rig_config["CONFIG"][$asic_code . " Count"];
	$pool_count = $rig_config["CONFIG"]["Pool Count"];
	$coin = $rig_coin["COIN"]["Hash Method"];




	                $time_units = array(
						'w' => 604800,
						'd' => 86400,
						'h' => 3600,
						'm' => 60,
						's' => 1
					);

					$strs = array();
                    $seconds_elapsed = $rig_summary["SUMMARY"]["Elapsed"];

					foreach ($time_units as $name => $int) {
						if ($seconds_elapsed < $int)
							continue;
						$num = (int) ($seconds_elapsed / $int);
						$seconds_elapsed = $seconds_elapsed % $int;
						$strs[] = sprintf("%02d", $num) . $name;
					}

					$uptime_unit = implode(' ', $strs);








			$config = array(
		"Temperature" => array(80, 84),
		"Fan" => array(85, 90),
		"Rejects" => array(7, 10),
		"Discards" => array(7, 10),
		"Stales" => array(7, 10)
	);

						for ($i = 0; $i < $asic_count; $i++) {

						$asic_request = $this->Cgminer_model->request($asic_code_lower . "|" . $i, $ip, $port);

							$asic_info[$i] = $asic_request[$asic_code . $i];
							$device_name[$i] = $asic_info[$i]["Name"] . $asic_info[$i]["ID"];

							$cur_rate = 0;

							$Total_Device_Hardware += $asic_info[$i]["Device Hardware%"];

							isset($asic_info[$i]["MHS 5s"]) ? $cur_rate = $asic_info[$i]["MHS 5s"] : $cur_rate = $asic_info[$i]["MHS av"];

							if ($coin == "scrypt") {
								$hash_rate[$i] = $cur_rate * 1000;
								$hash_speed[$i] = "kh/s";
							} elseif ($coin == "sha256") {
								$hash_rate[$i] = round_up($cur_rate/1000000);
								$hash_speed[$i] = "Th/s";
							}

							$total_rate += $hash_rate[$i];
							$total_errors += $asic_info[$i]["Hardware Errors"];


							if ($asic_info[$i]["Temperature"] >= $config["Temperature"][1]) {
								$temperature_class = "error";
							} elseif ($asic_info[$i]["Temperature"] >= $config["Temperature"][0]) {
								$temperature_class = "warning";
							} else {
								$temperature_class = "";
							}


							if (isset($asic_info[$i]["Temperature"]))
					        {
					         if ($fahrenheit === true)
					         {
				              $asic_temperature[$i] = sprintf("%02.2f", (9/5) * $asic_info[$i]["Temperature"] + 32) . "°F";
					         }
					         else
					         {
				              $asic_temperature[$i] = $asic_info[$i]["Temperature"] . "°C";
					         }
					        }
					        else
					        {
				              $asic_temperature[$i] = "n/a";
					        }


						}



						for ($i = 0; $i < $pool_count; $i++) {
							$rig_pool[$i] = $this->Cgminer_model->request("pools", $ip, $port);

							$total_accepted += $rig_pool[$i]["POOL" . $i]["Accepted"];
							$total_rejected += $rig_pool[$i]["POOL" . $i]["Rejected"];
							$total_discarded += $rig_pool[$i]["POOL" . $i]["Discarded"];
							$total_stale += $rig_pool[$i]["POOL" . $i]["Stale"];

							if ($rig_pool[$i]["POOL" . $i]["Rejected"] > ((($config["Rejects"][1]) / 100) * $rig_pool[$i]["POOL" . $i]["Accepted"])) {
								$rejects_class = "error";
							} elseif ($rig_pool[$i]["POOL" . $i]["Rejected"] > ((($config["Rejects"][0]) / 100) * $rig_pool[$i]["POOL" . $i]["Accepted"])) {
								$rejects_class = "warning";
							} else {
								$rejects_class = "";
							}

							if ($rig_pool[$i]["POOL" . $i]["Discarded"] > ((($config["Discards"][1]) / 100) * $rig_pool[$i]["POOL" . $i]["Accepted"])) {
								$discards_class = "error";
							} elseif ($rig_pool[$i]["POOL" . $i]["Discarded"] > ((($config["Discards"][0]) / 100) * $rig_pool[$i]["POOL" . $i]["Accepted"])) {
								$discards_class = "warning";
							} else {
								$discards_class = "";
							}

							if ($rig_pool[$i]["POOL" . $i]["Stale"] > ((($config["Stales"][1]) / 100) * $rig_pool[$i]["POOL" . $i]["Accepted"])) {
								$stales_class = "error";
							} elseif ($rig_pool[$i]["POOL" . $i]["Stale"] > ((($config["Stales"][0]) / 100) * $rig_pool[$i]["POOL" . $i]["Accepted"])) {
								$stales_class = "warning";
							} else {
								$stales_class = "";
							}

							$confirmed_rewards[$i] = "N/A";
							$pool_data = parse_url($rig_pool[$i]["POOL" . $i]["URL"]);
							if (isset($apis[$pool_data["host"]])) {
								$api_data = json_decode(file_get_contents($apis[$pool_data["host"]]), true);

								$confirmed_indexes = array(
									@$api_data["confirmed_rewards"],
									@$api_data["confirmed_reward"],
									@$api_data["user"]["unpaid_rewards"],
									@$api_data["user"]["confirmed_rewards"],
									@$api_data["getuserstatus"]["balance"]
								);

								foreach ($confirmed_indexes as $conf_i) {
									if (!empty($conf_i)) {
										$confirmed_rewards[$i] = $conf_i;
										if ($total_confirmed == "N/A") {
											$total_confirmed = $confirmed_rewards[$i];
										} else {
											$total_confirmed += $confirmed_rewards[$i];
										}

										break;
									}
								}
							}
						}




	 $data['miner_program']         = $miner_program;
	 $data['uptime_unit']           = $uptime_unit;

	$data['fahrenheit']            = false;

	if($asic_count > 0){
	   $data['asic_info']          = $asic_info;
	   $data['hash_rate']          = $hash_rate;
	   $data['hash_speed']         = $hash_speed;
	   $data['device_name']        = $device_name;
	   $data['asic_temperature']   = $asic_temperature;
	}

	$data['asic_count']            = $asic_count;
	
	$data['total_rate']            = $total_rate;
	$data['total_errors']          = $total_errors;
	$data['Total_Device_Hardware'] = $Total_Device_Hardware;

	if($pool_count > 0){
	   $data['rig_pool']           = $rig_pool;
	   $data['confirmed_rewards']  = $confirmed_rewards;
	}

	$data['pool_count']            = $pool_count;

	$data['total_confirmed']       = $total_confirmed;
	$data['total_accepted']        = $total_accepted;
	$data['total_rejected']        = $total_rejected;
	$data['total_discarded']       = $total_discarded;
	$data['total_stale']           = $total_stale;
	$data['all_shares']            = $total_confirmed + $total_accepted + $total_rejected +
	                                 $total_discarded + $total_stale;

   $this->blade->render('content/ajax/cgminer', $data);
	}

}
