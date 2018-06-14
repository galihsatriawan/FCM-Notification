<?php
  $title= "your_title";
  $body = "your_body";
  $dest_token = "your_token_destination"
define('API_ACCESS_KEY','your_server_key');
		$url = 'https://fcm.googleapis.com/fcm/send';
		
		$registrationIds =array($dest_token);
		// prepare the message
		$message = array( 
		  'title'     => $title,
		  'body'      => $body,
		  'vibrate'   => 1,
		  'sound'      => 1
		);
		$fields = array( 
		  'registration_ids' => $registrationIds, 
		  // 'data'             => $message  --> Wrong written
		  'notification'             => $message
		);
		$headers = array( 
		  'Authorization: key='.API_ACCESS_KEY, 
		  'Content-Type: application/json'
		);
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL,$url);
		curl_setopt( $ch,CURLOPT_POST,true);
		curl_setopt( $ch,CURLOPT_HTTPHEADER,$headers);
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt( $ch,CURLOPT_POSTFIELDS,json_encode($fields));
		$result = curl_exec($ch);
		curl_close($ch);
		echo $result;
	}

?>	
