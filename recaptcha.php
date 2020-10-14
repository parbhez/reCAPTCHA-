Source: https://www.youtube.com/watch?v=szhW3CU0jCc
key crate: 
1. https://www.google.com/recaptcha/admin/create
2. https://www.google.com/recaptcha/admin/site/433534760/setup
3. https://www.google.com/recaptcha/admin/site/433534760/settings

<?php 
	if(isset($this->input->post('g-recaptcha-response')) || $this->input->post('g-recaptcha-response'){
		$captcha = $this->input->post('g-recaptcha-response');
		$secretKey = "6Ld5J9cZAAAAAFluRGiHqcqzbyghypAwKchFWwmm";
		//$ip = $_SERVER['REMOTE_ADDR'];
		//    $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
		// var_dump($rsp);
		//$res = json_decode($response);
		$url ='https://www.google.com/recaptcha/api/siteverify?secret='.urldecode($secretKey).'&response='.urldecode($captcha).'';
		$response = file_get_contents($url);
		$responseKey = json_decode($response,TRUE);
			if($responseKey["success"]) {
			echo json_encode(array('success' => 'true'));
			} else {
			echo json_encode(array('success' => 'false'));
			}
		// echo "<pre>";
	   // print_r($responseKey);
	   // exit();
	}else{
	echo "Recaptcha Error";
	}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Recaptcha</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <div class="g-recaptcha" data-sitekey="6Ld5J9cZAAAAAJ07QqUKVEUT-dv3CZeUhXUHK9aD"></div>
</body>
</html>