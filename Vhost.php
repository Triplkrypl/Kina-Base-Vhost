<?php
namespace Base;

/**
 * Class Vhost
 * @package Base
 * @author Vojta Brozek <triplkrypl@centrum.cz>
 */
class Vhost extends \Vhost{

	public function onLoad()
	{
		$ip_local = new Ip\Local($this->getServerConfig());
		$ips = $ip_local->getAllInterfaces();
		$hello_message = "Kina is ready";
		if(count($ips) > 0){
			$hello_message .= " and waiting for you here ".\implode(" or ",$ips);
		}
		$this->serverLog($hello_message,"Info");
	}

	/**
	 * @param \Server\Request $request
	 * @return bool
	 */
	public function onPhpRequestChoice(\Server\Request $request)
	{
		return false;
	}


	/**
	 * @param \Client\Client $client
	 * @param \Server\Request $request
	 * @return null|\Server\Response
	 */
	public function onNoPhpRequest(\Client\Client $client, \Server\Request $request)
	{
		$data = parent::onNoPhpRequest($client, $request);
		$this->clean();
		return $data;
	}

	protected function clean()
	{

	}
}