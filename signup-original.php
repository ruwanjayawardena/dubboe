<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<style>
			.rc-anchor-light.rc-anchor-normal {
				border: 1px solid #dcd8d8 !important;
			}
			.rc-anchor-light {
				background: #f3f3ea !important;
				color: #292929 !important;
			}			
			.progress {
				margin-top: 5px !important;
			}

			span.password-verdict {
				font-size: 0.8rem;
			}

			.g-recaptcha {
				display: inline-block;
			}
		</style>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper py-5 grey-lighten2">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center">

						<div class="col-xl-7 col-12 my-5 py-3 text-left">							
							<h2 class="text-capitalize h2 animate__animated animate__fadeInUp">Sign in to get awesome experience!</h2>
							<p><strong>Already Signed Up?</strong> Sign in to post your listning.</p>
							<button class="btn btn-primary mb-4" onclick="window.location.href = 'login.php'">Sign In </button>

							<div class="text-left mt-3">	
								<p class="alert alert-secondary bg-gradient-blue"><strong>Why Sign up?</strong><br>
									To enhance your Dubboe experience and help you stay safe and secure, you now need to register to get benefit to feel free.</p>
							</div>
						</div>
						<div class="col-xl-5 col-12">
							<div class="box-shadow rounded bg-light px-5 py-5 border-1 border-secondary mx-4">
								<h3 class="text-center h3">Sign up</h3>
								<p class="text-muted text-center">Registration takes less than a minute but gives you full control over your activities.</p>
								<form id="signup-form" class="form-signin pt-auto">
									<input type="hidden" class="form-control" id="usr_ref_have" value="<?php
									if (isset($_REQUEST['usr_id']) && !empty($_REQUEST['usr_id'])) {
										echo 1;
									} else {
										echo 0;
									}
									?>">
									<input type="hidden" class="form-control" id="usr_ref_id" value="<?php
									if (isset($_REQUEST['usr_id']) && !empty($_REQUEST['usr_id'])) {
										echo $_REQUEST['usr_id'];
									} else {
										echo 0;
									}
									?>">
									<div class="mb-2">                               
										<input type="text" class="form-control" id="usr_first_name" placeholder="First Name" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter your first name
										</div>
									</div>
									<div class="mb-2">                               
										<input type="text" class="form-control" id="usr_last_name" placeholder="Last Name" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter your last name
										</div>
									</div>
									<div class="mb-2">
										<input type="text" class="form-control" id="usr_email" placeholder="Email Address" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter valid email address
										</div>
									</div>  
									<div class="mb-2">
										<input type="text" class="form-control" id="usr_phone" placeholder="Phone Number"  autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter valid phone no
										</div>
									</div>
									<div class="mb-2">
										<input type="password" class="form-control" id="usr_pass" placeholder="Password" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please provide valid password
										</div>
									</div>
									<div class="mb-4">
										<input type="password" class="form-control" id="usr_passConfirm" placeholder="Confirm Password" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please provide valid confirm password
										</div>
									</div>
									<div class="mb-1 pt-2">	
										<button class="btn btn-primary btn-block mt-3 btn-signup" disabled="true"><i class="fas fa-user-alt"></i> Sign up</button>
										<br>
										<div class="g-recaptcha" data-sitekey="6LekStYZAAAAAAFjEPK4MhhKRDNlL3qVxPRyRjjg"></div>
									</div>
									<!--						<div class="col">
									
																<p class="font-size-sm font-weight-medium text-heading border-top text-center mt-4 pt-4 w-100"> -- Or signup with -- </p>
										<button class="btn btn-primary btn-block" onclick="facebookSignup();"><i class="fab fa-facebook fa-lg"></i> Continue with Facebook</button>
															</div>-->
								</form>	
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
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pwstrength-bootstrap/3.0.9/pwstrength-bootstrap.min.js"></script>
		<script>
								$(document).ready(function () {
									var options = {};
									options.common = {
										onLoad: function () {
											$('#usr_pass').text('Start typing password');
										},
										onKeyUp: function (evt, data) {
											$("#length-help-text").text("Current length: " + $(evt.target).val().length + " and score: " + data.score);
										},
										onScore: function (options, word, totalScoreCalculated) {
											// If my word meets a specific scenario, I want the min score to
											// be the level 1 score, for example.
											if (word.length === 20 && totalScoreCalculated < options.ui.scores[1]) {
												// Score doesn't meet the score[1]. So we will return the min
												// numbers of points to get that score instead.
												return options.ui.score[1]
											}
											// Fall back to the score that was calculated by the rules engine.
											// Must pass back the score to set the total score variable.
											if (parseFloat(totalScoreCalculated) > 25) {
												$('.btn-signup').prop('disabled', false);
											}
											return totalScoreCalculated;
										}
									};
									$('#usr_pass').pwstrength(options);

								});
        </script>
		<script>
			function signup() {
				const form = $('#signup-form');
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() !== false) {
					var usr_cat_id = 3;
					var usr_ref_have = $('#usr_ref_have').val();
					var usr_ref_id = $('#usr_ref_id').val();
					var usr_email = $('#usr_email').val();
					var usr_phone = $('#usr_phone').val();
					var usr_username = $('#usr_email').val();
					var usr_first_name = $('#usr_first_name').val();
					var usr_last_name = $('#usr_last_name').val();
					var usr_pass = $('#usr_pass').val();
					var usr_passConfirm = $('#usr_passConfirm').val();
					//1- by email, 2 by facebook
					var usr_signup_method = 1;
					var postData = {
						usr_ref_have: usr_ref_have,
						usr_ref_id: usr_ref_id,
						usr_email: usr_email,
						usr_phone: usr_phone,
						usr_username: usr_username,
						usr_first_name: usr_first_name,
						usr_last_name: usr_last_name,
						usr_cat_id: usr_cat_id,
						usr_pass: usr_pass,
						usr_signup_method: usr_signup_method,
						action: "signupUsers"
					}
					if (usr_pass === usr_passConfirm) {
						$.post('bkp/controllers/userController.php', postData, function (e) {
							if (parseInt(e.msgType) == 1) {
//								swal("Signup!", e.msg, "success");
								swal({
									title: "Signup!",
									text: e.msg,
									type: "success",
									confirmButtonClass: "btn btn-light",
									confirmButtonText: "OK",
									closeOnConfirm: true
								}, function () {
									window.location.href = 'index.php';
								});
							} else {
								swal("Signup !", e.msg, "warning");
							}
						}, "json");
					} else {
						swal("Signup !", "The password does not match. Please check your password", "warning");
					}
				}
			}

			function facebookSignup() {
				swal({
					title: "Facebook Signup!",
					text: "Please select what you would like to do ?",
					type: "info",
					showCancelButton: true,
					confirmButtonClass: "btn btn-light",
					cancelButtonClass: "btn btn-primary",
					confirmButtonText: "Request Errand",
					cancelButtonText: "Run Errand",
					closeOnConfirm: true,
					closeOnCancel: true

				}, function (event) {
					if (!event) {
//						Run Errand
						var usr_cat_id = 4
					} else {
//						Request Errand
						var usr_cat_id = 3
					}
					FB.login(function (response) {
						if (response.status === 'connected') {
							FB.api('/me?fields=email,first_name,last_name,name,id', function (response) {
								var usr_email = response.email;
								var usr_phone = '000000000000';
								var usr_username = response.email;
								var usr_first_name = response.first_name;
								var usr_last_name = response.last_name;
								var usr_pass = response.first_name + Math.floor((Math.random() * 1000) + 1);
								//1- by email, 2 by facebook
								var usr_signup_method = 2;
								var postData = {
									usr_email: usr_email,
									usr_phone: usr_phone,
									usr_username: usr_username,
									usr_first_name: usr_first_name,
									usr_last_name: usr_last_name,
									usr_cat_id: usr_cat_id,
									usr_pass: usr_pass,
									usr_signup_method: usr_signup_method,
									action: "signupUsers"
								}
								$.post('bkp/controllers/userController.php', postData, function (e) {
									if (parseInt(e.msgType) == 1) {
										swal({
											title: "Facebook Signup!",
											text: e.msg,
											type: "success",
											confirmButtonClass: "btn btn-light",
											confirmButtonText: "OK",
											closeOnConfirm: true
										}, function () {
											window.location.href = 'index.php';
										});
									} else {
										swal("Facebook Signup!", e.msg, "warning");
									}
								}, "json");

							});
						} else if (response.status === 'not_authorized') {
							swal("Facebook Signup!", 'Sorry! Sign up failed,becasue of your facebook account not connected with us.Please Try again later', "warning");
						} else {
							swal("Facebook Signup!", 'Sorry! Sign up failed,becasue of your facebook account not connected with us.Please Try again later', "warning");
						}

					}, {scope: 'public_profile,email'});
				});
			}

			$(document).ready(function () {
				$('.btn-signup').click(function (e) {
					e.preventDefault();
					var response = grecaptcha.getResponse();
					if (response.length == 0) {
						swal({
							title: "Warning",
							text: "<p>Captura verification Failed! Please fill the capture ...</p>",
							type: "info",
							html: true
						});
					} else {
						signup();
					}
				})
			});


        </script>
	</body>
</html>


