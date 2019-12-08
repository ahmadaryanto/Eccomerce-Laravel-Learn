<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script src="{{URL::to('')}}/lib/jquery-3.1.1.min.js"></script>
	<script src="{{URL::to('')}}/lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{URL::to('')}}/lib/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('')}}/lib/BG/Background.css">
	<style type="text/css">
		body {
			background: #eee !important;
		}

		.wrapper {
			margin-top: 20px;
			margin-bottom: 80px;
		}

		.form-signin {
			max-width: 380px;
			padding: 15px 35px 45px;
			margin: 0 auto;
			background-color: #fff;
			border: 1px solid rgba(0, 0, 0, 0.1);
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 30px;
		}
		.form-signin .checkbox {
			font-weight: normal;
		}
		.form-signin .form-control {
			position: relative;
			font-size: 16px;
			height: auto;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="text"] {
			margin-bottom: -1px;
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 20px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}


	</style>
</head>
<body>
<h1><center><font color="light blue">CMS ADMIN</font></center></h1>
	<div class="hero-image">
		<div class="wrapper">
			<div class="pull-left">
				<p align="justify"><b><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REINVENTING CREATION</h1></p></b>
				<p align="justify"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Introducing AdminCMS and Smart Sync — </h3></p>
				<p align="justify"><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a simpler way to work together.</h3></p>
			</div>
			<form class="form-signin" id="loginform"> 
				{{csrf_field()}}
				<h2 class="form-signin-heading">Please login</h2>
				<input type="text" class="form-control" name="username" placeholder="username" required="" autofocus="" />
				<input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
			</form>
		</div>
	</div>


</body>
</html>
<script type="text/javascript">
	$('#loginform').submit(function(e){
		e.preventDefault();
		$.ajax({
			url:'{{URL::to('')}}/login',
			method:'POST',
			data:$('#loginform').serialize(),
			success:function(data,textStatus,XHR)

			{
				if (data == 1) {
					window.location = '{{URL::to("index")}}';
					
				} else {
					alert("username atau password salah.")
				}
			}
		});
	});
</script>