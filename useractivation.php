<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<style>	
			iframe{
                height: 250px;
				/*width: 100%;*/
                border: none;
                overflow-x: hidden;
            }
		</style>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="usr_id" value="<?php
		if (isset($_REQUEST['usr_id'])) {
			echo $_REQUEST['usr_id'];
		} else {
			echo "";
		}
		?>"/>
		<input type="hidden" id="usr_confirm_code" value="<?php
		if (isset($_REQUEST['usr_confirm_code'])) {
			echo $_REQUEST['usr_confirm_code'];
		} else {
			echo "";
		}
		?>"/>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center mb-4">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>  Home</a></li>
									<li class="breadcrumb-item"><a href="#">Account Activation</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-user-plus"></i> Account Activation<br><span class="h2 d-inline-block bg-faded-primary font-size-sm px-3 py-2 rounded-lg ml-3">Activate your account with the profile update.</span></h1>
						</div>
					</div>
					<div class="row  justify-content-center">  
						<div class="col-12">
							<div class="msgDiv" hidden></div>
							<form class="form-profileupdate pt-auto mb-3 form-signin" id="activationFormDiv">	
								<div class="row">
									<div class="col mb-3">    
										<label class="form-label">First Name</label>
										<input type="text" class="form-control" id="usr_first_name" placeholder="First Name" autocomplete="off" required>										
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter your first name
										</div>
									</div>
									<div class="col mb-3"> 
										<label class="form-label">Last Name</label>
										<input type="text" class="form-control" id="usr_last_name" placeholder="Last Name" autocomplete="off" required>																		
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter your last name
										</div>
									</div>
								</div>
								<div class="row">                                
									<div class="col mb-3">
										<label class="form-label">Business Name</label>
										<input type="text" id="pro_business_name" class="form-control" placeholder="Business Name">
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid profile name
										</div>										
									</div>								
									<div class="col mb-3">
										<label class="form-label">Primary Product/Service Type</label>
										<input type="text" id="pro_typeof_productservice" class="form-control" placeholder="Primary Product/Service Type">
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid profile name
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col mb-3">
										<label class="form-label">Phone No</label>
										<input type="tel" class="form-control" id="usr_phone" placeholder="Phone No" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid phone no
										</div>
									</div>
									<div class="col mb-3">
										<label class="form-label">Email &nbsp;<i class="badge badge-success">Verified</i></label>
										<input type="email" class="form-control" id="usr_email" placeholder="Email" required readonly>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid email
										</div>										
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="mb-3" hidden>										  
											<label class="form-label">Country</label>
											<select class="col-12 form-control cmbCountry form-control-chosen" data-placeholder="Choose a Country..." required>
												<option value="" disabled selected>Loading...</option>
											</select>
											<div class="valid-feedback">
												<i class="fas fa-lg fa-check-circle"></i> Looks good! 
											</div>
											<div class="invalid-feedback">
												<i class="fas fa-lg fa-exclamation-circle"></i> Please choose country
											</div>
										</div>
										<div class="mb-3"> 
											<label class="form-label">State</label>
											<select class="col-12 form-control cmbState form-control-chosen" data-placeholder="Choose a State..." required>
												<option value="" disabled selected>Loading...</option>
											</select>											
											<div class="valid-feedback">
												<i class="fas fa-lg fa-check-circle"></i> Looks good! 
											</div>
											<div class="invalid-feedback">
												<i class="fas fa-lg fa-exclamation-circle"></i> Please choose state
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">City</label>
											<select class="col-12 form-control cmbCity form-control-chosen" data-placeholder="Choose a city..." required>
												<option value="" disabled selected>Loading...</option>
											</select>										
											<div class="valid-feedback">
												<i class="fas fa-lg fa-check-circle"></i> Looks good! 
											</div>
											<div class="invalid-feedback">
												<i class="fas fa-lg fa-exclamation-circle"></i> Please enter city
											</div>
										</div>
									</div>
									<div class="col">										
										<div class="mb-3">
											<label class="form-label">Your corporate structure</label>
											<select class="col-12 form-control cmbProfileCategory form-control-chosen" data-placeholder="Which best fits your corporate structure..." required>
												<option value="" disabled selected>Loading...</option>
											</select>
											<div class="valid-feedback">
												<i class="fas fa-lg fa-check-circle"></i> Looks good! 
											</div>
											<div class="invalid-feedback">
												<i class="fas fa-lg fa-exclamation-circle"></i> Please enter  Which best fits your corporate structure
											</div>
										</div>
										<div class="mb-3">  
											<label class="form-label">Your company make up</label>
											<select class="col-12 form-control cmbProfileGrading form-control-chosen" data-placeholder="Which best describes your company make up...." required>
												<option value="" disabled selected>Loading...</option>
											</select>											
											<div class="valid-feedback">
												<i class="fas fa-lg fa-check-circle"></i> Looks good! 
											</div>
											<div class="invalid-feedback">
												<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Which best describes your company make up
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col mb-3">
										<label class="form-label">Personal Address</label>
										<textarea class="form-control summernote" id="pro_address" placeholder="Personal Address"></textarea>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid Personal Address
										</div>
									</div>
									<div class="col mb-3">
										<label class="form-label">Business Address</label>
										<textarea class="form-control summernote" id="pro_business_address" placeholder="Business Address"></textarea>	
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid Business Address
										</div>								
									</div>
								</div>	
								<div class="row">
									<div class="col mb-3">
										<label class="form-label">What's your story (draft)</label>
										<textarea class="form-control summernote" id="pro_bizdesc_short" placeholder="What's your story (draft)"></textarea>	
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your story
										</div>								
									</div>
									<div class="col mb-3">
										<label class="form-label">What's your story (full)</label>
										<textarea class="form-control summernote" id="pro_bizdesc_long" placeholder="Business Address"></textarea>	
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your story
										</div>								
									</div>
								</div>	
								<div class="row">
									<div class="col-6 mb-3">
										<label class="form-label">Website URL</label>
										<input class="form-control" id="pro_website_url" placeholder="Website URL">								<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your Website URL
										</div>								
									</div>								
								</div>																
								<div class="row">
									<div class="col-lg-6 col-sm-12 text-center">
										<h4 class="font-weight-bolder text-center">Profile Picture</h4>
										<iframe id="iframe_profileimage" scrolling="no"></iframe>
									</div>
									<div class="col-lg-6 col-sm-12 text-right">
										<button class="btn btn-translucent-dark btn-block" id="btn_activate"><i class="fas fa-chevron-right"></i> Continue</button>	
									</div>
								</div>							
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
		<script>
			function userAccountActivationInfo() {
				var usr_id = $('#usr_id').val();
				$.post('bkp/controllers/userController.php', {action: 'getUserProfileInfoByID', usr_id: usr_id}, function (e) {
					$.each(e, function (index, qdt) {
						if (qdt.usr_status == 1) {
							$('#activationFormDiv').prop('hidden', true);
							$('.msgDiv').prop('hidden', false);
							$('.msgDiv').html('').append('<h1 class="bg-success text-white text-center"> Your account already activated.. </h1>')
						}
						$('#usr_first_name').val(qdt.usr_first_name);
						$('#usr_last_name').val(qdt.usr_last_name);
						$('#pro_business_name').val(qdt.pro_business_name);
						$('#pro_typeof_productservice').val(qdt.pro_typeof_productservice);
						$('#usr_phone').val(qdt.usr_phone);
						$('#usr_email').val(qdt.usr_email);
						if (qdt.pro_country !== null) {
							cmbRelateCombo('26', '2', '.cmbCountry', qdt.pro_country);
						}
						if (qdt.pro_state !== null) {
							cmbRelateSubCombo('27', qdt.pro_country, '.cmbState', qdt.pro_state);
						}
						if (qdt.pro_city !== null) {
							cmbRelateSubCombo('30', qdt.pro_state, '.cmbCity', qdt.pro_city);
						}
						if (qdt.pro_profile_category !== null) {
							cmbRelateCombo('92', '2', '.cmbProfileCategory', qdt.pro_profile_category);
						} else {
							cmbRelateCombo('92', '2', '.cmbProfileCategory');
						}
						if (qdt.pro_grading !== null) {
							cmbRelateCombo('93', '2', '.cmbProfileGrading', qdt.pro_grading);
						} else {
							cmbRelateCombo('93', '2', '.cmbProfileGrading');
						}
						$('#pro_address').val(qdt.pro_address);
						$('#pro_business_address').val(qdt.pro_business_address);
						$('#pro_bizdesc_short').val(qdt.pro_bizdesc_short);
						$('#pro_bizdesc_long').val(qdt.pro_bizdesc_long);
						$('#pro_website_url').val(qdt.pro_website_url);
						chosenRefresh();
					});
				}, "json");
			}

			function userProfileActivation() {
				var usr_first_name = $('#usr_first_name').val();
				var usr_last_name = $('#usr_last_name').val();
				var pro_business_name = $('#pro_business_name').val();
				var pro_typeof_productservice = $('#pro_typeof_productservice').val();
				var usr_phone = $('#usr_phone').val();
				var pro_country = $('.cmbCountry').val();
				var pro_state = $('.cmbState').val();
				var pro_city = $('.cmbCity').val();
				var pro_profile_category = $('.cmbProfileCategory').val();
				var pro_grading = $('.cmbProfileGrading').val();
				var pro_address = $('#pro_address').val();
				var pro_business_address = $('#pro_business_address').val();
				var pro_bizdesc_short = $('#pro_bizdesc_short').val();
				var pro_bizdesc_long = $('#pro_bizdesc_long').val();
				var pro_website_url = $('#pro_website_url').val();
				var usr_confirm_code = $('#usr_confirm_code').val();
				var usr_id = $('#usr_id').val();
				//run activation process
				var postdata = {
					action: "userProfileActivation",
					usr_first_name: usr_first_name,
					usr_last_name: usr_last_name,
					pro_business_name: pro_business_name,
					pro_typeof_productservice: pro_typeof_productservice,
					usr_phone: usr_phone,
					pro_country: pro_country,
					pro_state: pro_state,
					pro_city: pro_city,
					pro_profile_category: pro_profile_category,
					pro_grading: pro_grading,
					pro_address: pro_address,
					pro_business_address: pro_business_address,
					pro_bizdesc_short: pro_bizdesc_short,
					pro_bizdesc_long: pro_bizdesc_long,
					pro_website_url: pro_website_url,
					usr_confirm_code: usr_confirm_code,
					usr_id: usr_id
				}
				$.post('bkp/controllers/userController.php', postdata, function (e) {
					if (parseInt(e.msgType) == 1) {
						swal({
							title: "Welcome to dubboe.com! Please wait for a moment...",
							text: e.msg,
							timer: 2000,
							showConfirmButton: false
						});
						setTimeout(function () {
							window.location.href = "dashboard.php";
						}, 2500);
					} else if (parseInt(e.msgType) == 2) {
						swal({
							title: "Welcome to dubboe.com my account!",
							text: e.msg,
							timer: 1800,
							showConfirmButton: false
						});
						setTimeout(function () {
							window.location.href = "index.php";
						}, 2500);

					} else if (parseInt(e.msgType) == 3) {
						swal("Alert !", e.msg, "warning");
					}
				}, "json");
			}


			$(document).ready(function () {
				userAccountActivationInfo();
				const usr_id = $('#usr_id').val();
				$("#iframe_profileimage").attr("src", "user_profileimage.php?usr_id=" + usr_id);
				$('select').chosen({width: "100%"});

//				$(".datepicker").datetimepicker({
//					viewMode: 'days',
//					format: 'YYYY-MM-DD'
//				});

				cmbRelateCombo('26', '2', '.cmbCountry', '238', function () {
					var country = $('.cmbCountry').val();
					cmbRelateSubCombo('27', country, '.cmbState', false, function () {
						var state = $('.cmbState').val();
						cmbRelateSubCombo('30', state, '.cmbCity');
					});
				});

				$('.cmbCountry').change(function () {
					var country = $(this).val();
					cmbRelateSubCombo('27', country, '.cmbState', false, function () {
						var state = $('.cmbState').val();
						cmbRelateSubCombo('30', state, '.cmbCity');
					});
				});

				$('.cmbState').change(function () {
					var state = $(this).val();
					cmbRelateSubCombo('30', state, '.cmbCity');
				});

				const form = $('.form-profileupdate');


				$('#btn_activate').click(function (event) {
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						userProfileActivation();
						form.removeClass('was-validated');
					}
				});
			});


        </script>
	</body>
</html>