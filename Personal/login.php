<!doctype html>
<html lang="en">


<!-- Mirrored from wrraptheme.com/templates/lucid/hr/html/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Aug 2021 12:23:04 GMT -->
<head>
<title>:: Lucid HR :: Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.js"></script>
</head>

<body class="theme-orange">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="https://wrraptheme.com/templates/lucid/hr/html/assets/images/logo-white.svg" alt="Lucid">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="https://wrraptheme.com/templates/lucid/hr/html/light/index.html">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="text" id="login" name="login" class="form-control" id="signin-email"  placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control"  id="password" name="password"  placeholder="Password">
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>								
                                </div>
                                <button type="submit" id="btLogin" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
                                    <span>Don't have an account? <a href="page-register.html">Register</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
<script>
		$(document).ready
		(
			function()
			{
				$("#btLogin").click
				(
					function(e)
					{
						var login = $('#login').val();
						var password = $('#password').val();
						if(login === "")
						{
							$('#login').focus ();
                            alertify.error("You should enter your login !");
                            e.preventDefault();
						}
						else
						{
							if(password === "" )
							{
								$('#description').focus ();
								alertify.error("You should enter your password !");
								e.preventDefault();
							}
							else
							{
								$.ajax
								(
									{
										async: false, //if you want to change a global variable you should add this instruction
										type: 'POST',
										url: "../App/controller/User/authPer.php",
										data:
										{
											'login' : login,
											'password' : password
										},
										success: 
										function(result)
										{
											json = JSON.parse(result);
											if(json.code == 0)
											{
												alertify.error(json.response);
												e.preventDefault();
											}
											else
											{
												location.href = "index.php";
											}
										}
									}
								);
							}
						}
						e.preventDefault();
					}
				);
			}
		);
	</script>
<!-- Mirrored from wrraptheme.com/templates/lucid/hr/html/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Aug 2021 12:23:04 GMT -->
</html>
