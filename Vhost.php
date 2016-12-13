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
		$this->serverLog("Kina is ready and waiting for you here http://127.0.0.1","Info");
	}

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