


<?php


//Validate ticket
if(isset($_POST['ticket'])) {
	
	$service = 'http://localhost:5009/service.php';
	$url = "https://sso.shld.net/shccas/serviceValidate?ticket={$_POST['ticket']}&service={$service}";
	
	curl_request($url);
	
	echo '<script>parent.update_header("hello, Beeyotch");</script>';
	
	
	
} else { //Got an Error!
	
	echo "there was an error!";
}




function curl_request($url, $post=null) {
	
		$options = array(
            CURLOPT_URL             => $url,
            CURLOPT_RETURNTRANSFER  => TRUE,
            CURLOPT_FOLLOWLOCATION	=> true,
            CURLOPT_HEADER          => true,
            CURLOPT_SSL_VERIFYHOST  => 0,
            CURLOPT_SSL_VERIFYPEER  => 0,
            CURLOPT_USERAGENT       => $_SERVER['HTTP_USER_AGENT'],
        );
	        
	        if($post !== null) {
	        	
	        	$options[CURLOPT_HTTPHEADER] = array('Content-type: application/x-www-form-urlencoded',
	        											'Content-length: ' . strlen($post));
	        	$options[CURLOPT_CUSTOMREQUEST] = 'POST';
	        	$options[CURLOPT_POSTFIELDS] = $post;
	        }
	        
        $ch = curl_init();

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);

        // Get the response information
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
      /*echo $code;
        exit;*/

        if ( ! $response) {
            $error = curl_error($ch);
        }

        curl_close($ch);
        
         if (isset($error)) {
         	
            throw new Exception('Error fetching remote '.$url.' [ status '.$code.' ] '.$error);
        }

        
        
        return $response;
}