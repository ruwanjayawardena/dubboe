<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper py-5 grey-lighten2">
			<section class="pb-3">			
				<div class="container">
					<div class="row">
						<div class="col-xl-5 col-12">
							<div class="box-shadow rounded bg-light px-5 py-5 border-1 border-secondary mx-4">
								<h3 class="text-left h3">Sign in</h3>
								<p>Sign in to your account using email and password provided during registration.</p>
								<form class="form-signin text-left">
									<div class="mb-3">                               
										<input type="text" class="form-control" id="usr_username" placeholder="Username" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid username
										</div>
									</div>																		
									<div class="mb-2">
										<input type="password" class="form-control" id="usr_pass" placeholder="Password" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid password
										</div>
									</div> 							


									<div class="mb-4">
										<div class="d-flex justify-content-between align-items-center form-group">
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" id="keep-signed-2">
												<label class="custom-control-label" for="keep-signed-2">Keep me signed in</label>
											</div><a id="btn-forgetpass" class="nav-link-style font-size-ms" href="#">Forgot password?</a>
										</div>									
									</div>
									<div class="mb-1 pt-2">
										<button class="btn btn-primary btn-block mt-3" id="btn_login">Sign in</button>
										<p class="font-size-md pt-3 mb-0 text-left">Don't have an account? <a href="signup.php" class="font-weight-medium">Sign up</a></p>
									</div>
									<!--								<div class="col-xl-12 col-12 border-top border-sucess mt-3 pt-2">
																		<p class="font-size-sm">Or sign in with</p>
																		<button class="btn btn-primary mt-2" onclick="facebookLogin();"><i class="fab fa-facebook fa-lg"></i> Sign in with Facebook</button>								
																	</div>-->


								</form>
							</div>
						</div>
						<div class="col-xl-7 col-12 my-5 py-3 text-center">							
							<h2 class="text-capitalize h2 animate__animated animate__fadeInUp">Sign in to get awesome experience!</h2>
							<p>
								<strong>Not registered yet?</strong>
								Sign up now to post, edit, and manage listning. It’s quick, easy, and free!
							</p>
							<button class="btn btn-primary mb-4" onclick="window.location.href = 'signup.php'">Sign up Now</button>

							<div class="text-right">	
								<p class="alert alert-secondary bg-gradient-blue"><strong>Protect your account</strong><br>
									Ensure that whenever you sign in to Dubboe, the web address in your browser starts with https://www.dubboe.com/</p>
							</div>
						</div>
					</div>
				</div>
			</section>						
		</main>     
		<?php
		include './includes/frontend-footer.php';
		include './includes/end-block-all.php';
		include './includes/comboboxJS.php';
		include './includes/commonJS.php';
		?>	
		<script>
			function forgotPassword() {
				var modelForgotPasswordStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
						'<div class="modal-dialog" role="document">' +
						'<div class="modal-content">' +
						'<div class="modal-header">' +
						'<h5 class="modal-title" id="exampleModalLabel">Forgot Password <small>Have lost your password ? </small></h5>' +
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
						'<span aria-hidden="true">&times;</span>' +
						'</button>' +
						'</div>' +
						'<div class="modal-body">' +
						//here is model body start                        
						'<form id="password-form" novalidate>' +
						'<div class="form-group">' +
						'<label for="usr_email" class="col-form-label">Email</label>' +
						'<input type="text" class="form-control" id="usr_email" placeholder="Enter your email address" required>' +
						'</div>' +
						'</form>' +
						//here is model body end
						'</div>' +
						//start model footer
						'<div class="modal-footer">' +
						'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
						'<button type="button" class="btn btn-primary" id="btn_recover">Request Change</button>' +
						'</div>' +
						//end modal footer
						'</div>' +
						'</div>' +
						'</div>';

				var modelForgotPassword = $(modelForgotPasswordStr);
				modelForgotPassword.modal('show');


				modelForgotPassword.find('#btn_recover').click(function (event) {
					var usr_email = modelForgotPassword.find('#usr_email').val();
					var postData = {
						usr_email: usr_email,
						action: "autopassowrdreset"
					}
					var form = modelForgotPassword.find('#password-form');
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						$.post('bkp/controllers/userController.php', postData, function (e) {
							if (parseInt(e.msgType) == 1) {
								modelForgotPassword.modal('hide');
								swal({
									title: "Alert !",
									text: e.msg,
									type: "success",
									timer: 2500,
									showConfirmButton: false
								});
								setTimeout(function () {
									window.location.href = './index.php';
								}, 3000);
							} else {
								swal("Alert !", e.msg, "warning");
							}
						}, "json");
					}
				});
			}


			function facebookLogin() {
				FB.login(function (response) {
					if (response.status === 'connected') {
						FB.api('/me?fields=email,first_name,last_name,name,id', function (response) {
							var usr_email = response.email;
							var usr_username = response.email;
							var postData = {
								usr_email: usr_email,
								action: "facebookLogin"
							}
							$.post('bkp/controllers/userController.php', postData, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal({
										title: "Congratulations !",
										text: "Reload page please wait...",
										type: "success",
										timer: 2600,
										showConfirmButton: false
									});
									setTimeout(function () {
										if (parseInt(e.usr_cat_id) == 3) {
											//Request Errand
											window.location.href = 'dashboard-requester.php';
										} else if (parseInt(e.usr_cat_id) == 4) {
											//Run Errand
											window.location.href = 'dashboard-runner.php';
										}
									}, 2800);
								} else {
									swal("Alert !", e.msg, "warning");
								}
							}, "json");

						});
					} else if (response.status === 'not_authorized') {
						swal("Facebook Signup!", 'Sorry! Sign up failed,becasue of your facebook account not connected with us.Please Try again later', "warning");
					} else {
						swal("Facebook Signup!", 'Sorry! Sign up failed,becasue of your facebook account not connected with us.Please Try again later', "warning");
					}

				}, {scope: 'public_profile,email'});
			}


			function login() {
				var usr_username = $('#usr_username').val();
				var usr_pass = $('#usr_pass').val();
				var postData = {
					usr_username: usr_username,
					usr_pass: usr_pass,
					action: 'login'
				}
				$.post('bkp/controllers/userController.php', postData, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						swal("Alert !", "System Error", "warning");
					} else {
						if (parseInt(e.msgType) == 1) {
							swal({
								title: "Congratulations !",
								text: "Reload page please wait...",
								type: "success",
								timer: 2600,
								showConfirmButton: false
							});
							setTimeout(function () {
								if (parseInt(e.usr_cat_id) == 2) {
									//admin
									window.location.href = 'bkp/dashboard-admin.php';
								} else if (parseInt(e.usr_cat_id) == 3) {
									//user category
									window.location.href = 'dashboard.php';
								} else if (parseInt(e.usr_cat_id) == 4) {
									//Account Excutive
									window.location.href = 'dashboard-executive.php';
								} else if (parseInt(e.usr_cat_id) == 1) {
									//super admin
									window.location.href = 'bkp/dashboard.php';
								}
							}, 2800);
						} else {
							swal("Alert !", e.msg, "warning");
						}
					}
				}, "json");
			}


			$(document).ready(function () {

				const form = $('.form-signin');
				form.submit(false);

				$('#btn_login').click(function (event) {
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						login();
					}
				});

				$('#btn-forgetpass').click(function () {
					form.submit(false);
					forgotPassword();
				});

				$(document).on('keypress', function (event) {
					if (event.which == 13) {
						event.preventDefault();
						form.submit(false);
						form.addClass('was-validated');
						if (form[0].checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							login();
						}
					}
				});
			});


		</script>
	</body>

</html>
