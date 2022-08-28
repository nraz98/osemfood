<?php
$processed = FALSE;
$ERROR_MESSAGE = '';

// ************* Call API:
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://repocodes.s3.amazonaws.com/interview.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
//curl_close ($ch);

 if ($e = curl_error($ch)){
	 echo $e;
	 $decoded =null;
 }else{
	 $decoded = json_decode($json, true);

 }


?>