<?php

$loginId =  $_GET['loginId'];
$logonPassword  = $_GET['logonPassword'];
$service = 'http://localhost:5009/service.php';
$sourceSiteid = '41';

$url = 'https://sso.shld.net/shccas/shcLogin';


?>

<html>
	<body onload="document.sso.submit();">
	
		<form name="sso" action="<?php echo $url;?>" method="post">
            <div style="display: none">
	            <textarea rows=10 cols=80 name="logonPassword"><?php echo $logonPassword;?></textarea>
				<textarea rows=10 cols=80 name="loginId"><?php echo $loginId;?></textarea>
             	<textarea rows=10 cols=80 name="service"><?php echo $service;?></textarea>
              	<textarea rows=10 cols=80 name="sourceSiteid"><?php echo $sourceSiteid;?></textarea>
            </div>
          </form>
	</body>
</html>

