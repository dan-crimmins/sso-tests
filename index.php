<html>
<head>
<title>SSO Login</title>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 
 <script type="text/javascript">
  jQuery(document).ready( function(){
		
		jQuery('#login-button').bind('click', init_login);

	});


	function init_login(event) {

		event.preventDefault();

		//var target = "login.php";
		var loginId = jQuery('#loginId').val();
		var pwd = jQuery('#logonPassword').val();

		url = 'login.php?loginId=' + loginId + '&logonPassword=' + pwd;
		jQuery('<iframe src="' + url +'" frameborder="0" scrolling="no" id="myFrame" style="display:none;"></iframe>').appendTo('.main');

		
	}

	function dump(obj) {
	    var out = '';
	    for (var i in obj) {
	        out += i + ": " + obj[i] + "\n";
	    }

	    alert(out);

	}


	function say(txt) {

		alert(txt);
	}

	function update_header(uname) {

		jQuery('#header').replaceWith('<div id="header" style="float: right;">' + uname + '</div>');
	}


	
 
 </script>
</head>
<body class="main" style="margin: 0 125px 0 25px">
	<div id="header" style="float: right;">
		Login
	</div>
	<form id="login">
		<ul style="list-style:none;">
			<li>
			<dl>
				<dt>
					<label for="loginId">E-mail</label>
				</dt>
				<dd>
					<input type="text" name="loginId" id="loginId" />
				</dd>
			</dl>
			</li>
			<li>
			<dl>
				<dt>
					<label for="logonPassword">Password</label>
				</dt>
				<dd>
					<input type="password" name="logonPassword" id="logonPassword" />
				</dd>
			</dl>
			</li>
			<li>
				<input type="button" id="login-button" name="login-button" value="Login" />
			</li>
		</ul>
		<input type="hidden" name="service" value="http://localhost:5009/service.php" />
		<input type="hidden" name="sourceSiteid" value="41" />
	</form>
</body>
</html>
