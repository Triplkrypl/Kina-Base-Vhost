<?php
namespace Base\Ip;

/**
 * Class Local
 * @package Base\Ip
 * @author Vojta Brozek <triplkrypl@centrum.cz>
 */
class Local {
	/**
	 * @param \Server\Config $config
	 * @return string[]
	 */
	public function getAllInterfaces(\Server\Config $config){
		$ips = array();
		$output = array();
		\exec("ifconfig | grep inet | grep netmask",$output);
		foreach($output as $row){
			$matches = array();
			\preg_match("/inet (.*)  netmask/",$row,$matches);
			if(\array_key_exists(1,$matches))
			{
				$ports = $config->get("ports");
				foreach($ports as $port){
					if($port == 80){
						$ips[] = "http://".$matches[1];
					}else{
						$ips[] = "http://".$matches[1].":".$port;
					}
				}
			}
		}
		return $ips;
	}
} 