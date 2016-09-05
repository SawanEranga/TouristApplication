<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<!-- <link rel="stylesheet" href="assets/css/main.css" /> -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/main/css/bootstrap.css" />


		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">




	        <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/temp/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?php echo base_url() ?>assets/login/temp/css/form-elements.css">
	        <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/temp/css/style.css">

		<script src="<?php echo base_url() ?>assets\main\js\jquery-1.9.0.min.js"></script>

		<script src="<?php echo base_url() ?>assets\main\js\bootstrap.js"></script>

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

<!-- pavithra's code -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets\pavithra\pavithrastyle.css" />


<style>
::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    black!important;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:    black!important;
   opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:    black!important;
   opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:    black!important;
}

.social-login-buttons a:hover{
	color: white !important;
}
</style>
	</head>
	<body class="P_body" style="overflow-y: hidden;">


									<!-- Top content -->
								        <div class="top-content">

								            <div class="inner-bg">
								                <div class="container">
								                    <div class="row">
								                        <div class="col-sm-8 col-sm-offset-2 text">
								                            <h1><strong>BEAUTIFUL SRI LANKA</strong> </h1>
								                            <div class="description">
								                            	<p>
																								Our pick of where to go in Sri lanaka in the next 12 month
								                            	</p>
								                            </div>
								                        </div>
								                    </div>
								                    <div class="row">
								                        <div class="col-sm-6 col-sm-offset-3 form-box">
								                        	<div class="form-top">
								                        		<div class="form-top-left">
								                        			<h3>Login to our site</h3>
								                            		<p>Enter your email and password to log on:</p>
								                        		</div>
								                        		<div class="form-top-right">
								                        			<i class="fa fa-lock"></i>
								                        		</div>
								                            </div>
								                            <div class="form-bottom">
											                    <form role="form" action="<?php echo base_url() ?>" method="post" class="login-form">
											                    	<div class="form-group">
											                    		<label class="sr-only" for="form-username">Username</label>
											                        	<input type="text" name="form-username" placeholder="Email..." class="form-username form-control" id="form-username">
											                        </div>
											                        <div class="form-group">
											                        	<label class="sr-only" for="form-password">Password</label>
											                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
											                        </div>
											                        <button type="submit"  class="btn">Sign in!</button>

<div class="text-center">
	<br>
	Forgot your password? &nbsp; <a href="#" > Click here to reset it. </a>
		<br>
		Don't you have an account? &nbsp; <a href="<?php echo base_url(); ?>index.php/register" > Sign up <a/>
</div>


											                    </form>
										                    </div>
								                        </div>
								                    </div>
																		<div class="row">
																				<div class="col-sm-6 col-sm-offset-3 social-login">
																					<h3>...or login with:</h3>
																					<div class="social-login-buttons">
																						<a class="btn btn-link-1 btn-link-1-facebook" href="#">
																							<i class="fa fa-facebook"></i> Facebook
																						</a>
																						<a class="btn btn-link-1 btn-link-1-twitter" href="#">
																							<i class="fa fa-twitter"></i> Twitter
																						</a>
																						<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
																							<i class="fa fa-google-plus"></i> Google Plus
																						</a>
																					</div>
																				</div>
																		</div>
								                </div>
								            </div>

								        </div>



		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="<?php echo base_url() ?>assets\login\js\main.js"></script>

	</body>
</html>
