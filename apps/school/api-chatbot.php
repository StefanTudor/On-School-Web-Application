<?php
	
	function getData( $requestType, $requestUrl, $postVars = null ){
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,$requestUrl);
		
		if( $requestType == 'post' )
			curl_setopt($ch, CURLOPT_POST, 1);
		
		if( $postVars !== null )
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postVars));
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close ($ch);
		
		return $server_output;
		
	}
	
	// load config
	$config = require "../../configs/chatbot.php";
	// get user data
	$userAsk = strtolower(trim($_POST['ask']));
	// default response
	$returned = 'Robo nu stie sa raspunda la aceasta intrebare';
	switch( $config['method_type'] ){
		//versiunea locala
		case "program":
			$returned = exec('python '.$config['chatbot_path'].' "'.$userAsk.'"');
		break;
		//versiunea de pe server
		case "server":
			$requestUrl = $config['chatbot_server'] . '/ask';
			$returned = getData("post", $requestUrl, [
				'ask' => $userAsk
			]);
		break;
	}
	// show user response
	echo $returned;
	 