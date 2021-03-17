<?php include './access_control/auth.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<style>
			iframe{
                height: 250px;
                border: none;
				overflow:hidden;
			}
        </style>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Profile</a>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-user-circle"></i> Profile</h1>
							<span class="common-msg"></span>
							<div class="row reflinkDiv">
								<div class="col">
									<div class="form-group">
										<div class="input-group mb-3">											
											<input class="form-control" id="referral_url" placeholder="Referral URL">
											<div class="input-group-append">
												<button class="btn btn-dark btn-sm btnreflink" data-clipboard-text="">Copy Referral Link</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-2 col-lg-2 col-12 dispVerifyINFO">
									<button class="btn btn-block btn-primary" id="btn-verify"> Verify Identity</button>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4 col-12">
									<div class="bg-secondary box-shadow-sm px-4 py-3 rounded border mb-3">
										<h4 class="font-weight-bolder text-center mt-5 mb-2">Upload Profile Picture</h4>
										<iframe  id="iframe_profileimage" width="100%" height="50px" scrolling="no" ></iframe>
									</div>
								</div>
								<div class="col-xl-8 col-12">
									<form class="form-profileupdate">
										<div class="row mb-3">
											<div class="col">  
												<label class="form-label">First Name</label>
												<input type="text" class="form-control" id="usr_first_name" placeholder="First Name" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter your first name
												</div>
											</div>
											<div class="col"> 
												<label class="form-label">Last Name</label>							
												<input type="text" class="form-control" id="usr_last_name" placeholder="Last Name" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter your last name
												</div>
											</div>
										</div>
										<div class="row mb-3">                                
											<div class="col">
												<label class="form-label">Business Name</label>
												<input type="text" id="pro_business_name" class="form-control" placeholder="Business Name">
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid profile name
												</div>
											</div>								
											<div class="col">
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

										<div class="row mb-3">
											<div class="col">
												<label class="form-label">Phone No</label>
												<input type="tel" class="form-control" id="usr_phone" placeholder="Phone No" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid phone no
												</div>												
											</div>
											<div class="col">
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
										<div class="row mb-3">
											<div class="col">
												<span hidden>
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
												</span>
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
												<div class="mb-0">
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
												<div class="mb-0">  
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
										<div class="row mb-3">
											<div class="col">
												<label class="form-label">Personal Address</label>
												<textarea class="form-control summernote" id="pro_address" placeholder="Personal Address"></textarea>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid Personal Address
												</div>
											</div>
											<div class="col">												
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
										<div class="row mb-3">
											<div class="col">
												<label class="form-label">What's your story (draft)</label>
												<textarea class="form-control summernote" id="pro_bizdesc_short" placeholder="What's your story (draft)"></textarea>	
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your story
												</div>
											</div>
											<div class="col">
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
										<div class="row mb-3">
											<div class="col">
												<label class="form-label">Website URL</label>
												<input class="form-control" id="pro_website_url" placeholder="Website URL">
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your Website URL
												</div>
											</div>								
										</div>																
										<h4>Social Media Profile Links</h4>
										<span class="text-muted">Ex : https://dubboe.com</span>
										<div class="row mt-3">
											<div class="col-6 mb-3">
												<label class="form-label">Facebook</label>
												<input class="form-control" id="pro_fb_link" placeholder="Facebook Profile URL">
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your facebook profile URL
												</div>
											</div>								
											<div class="col-6 mb-3">
												<label class="form-label">Instagram</label>
												<input class="form-control" id="pro_instagram_link" placeholder="Instagram Profile URL">
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your instagram profile URL
												</div>
											</div>								
											<div class="col-6 mb-3">
												<label class="form-label">Twitter</label>
												<input class="form-control" id="pro_twitter_link" placeholder="Twitter Profile URL">
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your twitter profile URL
												</div>
											</div>								
											<div class="col-6 mb-3">
												<label class="form-label">Youtube</label>
												<input class="form-control" id="pro_youtube_link" placeholder="Youtube Profile URL">
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your youtube profile URL
												</div>
											</div>								
											<div class="col-6 mb-3">
												<label class="form-label">Pinterest</label>
												<input class="form-control" id="pro_pinterest_link" placeholder="Pinterest Profile URL">
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide your pinterest profile URL
												</div>
											</div>								
										</div>																
										<div class="row">										
											<div class="offset-xl-6 col-xl-6 col-12 text-right">									
												<button class="btn btn-warning" id="btn-update"><i class="fas fa-edit"></i> Update</button>
												<button class="btn btn-secondary" id="btn_chngpass"><i class="fas fa-key"></i> Change Password</button>
											</div>
										</div>
									</form>						


								</div>


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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
		<script>
										function checkMembershipIsActiveMsg() {
											var html = "";
											$.post('bkp/controllers/userController.php', {'action': 'checkMembershipIsActive'}, function (e) {
												if (parseInt(e) != 1) {
													html += '<div class="py-3 px-2 bg-light text-goldblack m-1 text-center mb-3"><strong>Activate Refferal Link!</strong> Please activate your membership plan for activate your referral link.</div>';
													$('.common-msg').html('').append(html);
													$('.reflinkDiv').prop('hidden', true);
												} else {
													$('.reflinkDiv').prop('hidden', false);
												}
											}, "json");
										}

										function userProfileInfo() {
											$.post('bkp/controllers/userController.php', {action: 'getUserProfileInfo'}, function (e) {
												$.each(e, function (index, qdt) {
													$('#btn-verify').val(qdt.usr_id);
													if (parseInt(qdt.usr_verified_status) == 2) {
														$('#btn-verify').prop('hidden', true);
														$('.dispVerifyINFO').html('').append('<h1><span class="badge badge-success font-size-lg px-2 py-2 align-top"><i class="fas fa-user-shield fa-lg"></i> Identity Verified</span></h1>');
													} else if (parseInt(qdt.usr_verified_status) == 1) {
														$('#btn-verify').prop('hidden', true);
														$('.dispVerifyINFO').prop('hidden', true);
														$('.common-msg').append('<div class="py-3 px-2 bg-gradient text-goldblack m-1 text-center mb-3 rounded text-white border"><strong>Identity Verification!</strong> We are processing your identity verification..</div>');
													} else if (parseInt(qdt.usr_verified_status) == 0) {
														$('#btn-verify').prop('hidden', false);
													}
													$('#usr_id').val(qdt.usr_id);
													$('#referral_url').val("https://dubboe.com/signup.php?usr_id=" + qdt.usr_id);
													$('.btnreflink').attr('data-clipboard-text', "https://dubboe.com/signup.php?usr_id=" + qdt.usr_id);
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
													$('#pro_instagram_link').val(qdt.pro_instagram_link);
													$('#pro_youtube_link').val(qdt.pro_youtube_link);
													$('#pro_fb_link').val(qdt.pro_fb_link);
													$('#pro_twitter_link').val(qdt.pro_twitter_link);
													$('#pro_pinterest_link').val(qdt.pro_pinterest_link);
													chosenRefresh();

													var clipboard = new ClipboardJS('.btnreflink');
												});

												$('#btn-verify').click(function () {
													var usr_id = $(this).val();
													var eventItemModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
															'<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">' +
															'<div class="modal-content">' +
															'<div class="modal-header">' +
															'<h5 class="modal-title" id="exampleModalLabel">Identity Verification</h5>' +
															'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
															'<span aria-hidden="true">&times;</span>' +
															'</button>' +
															'</div>' +
															'<div class="modal-body">' +
															//here is model body start                        
															'<div class="row">' +
															'<div class="col-lg-12">' +
															'<form id="form_modal" novalidate>';
													eventItemModalStr += '<div class="form-group">' +
															'<label for="grq_question">Choose Verify type</label>' +
															'<select class="form-control cmbVerifyIndicators" required></select>'
													'</div>';
													eventItemModalStr += '<div class="form-group mt-3">' +
															'<label for="grq_question">Upload Document/File Related for choosen type</label>' +
															'<iframe frameborder="0" id="iframe_imageupload" src="userverify_fileupload.php?id=' + usr_id + '" width="100%"></iframe> ' +
															'</div>';
													eventItemModalStr += '</form>' +
															'</div>' +
															'</div>' +
															//here is model body end
															'</div>' +
															//start model footer
															'<div class="modal-footer">' +
															'<button type="button" class="btn btn-primary" id="btn_verifyMyIdentity">Verify My Identity</button>' +
															'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
															'</div>' +
															//end modal footer
															'</div>' +
															'</div>' +
															'</div>';
													var eventItemModal = $(eventItemModalStr);
													eventItemModal.modal('show');

													const form = eventItemModal.find('#form_modal');
													form.submit(false);
													form.removeClass('was-validated');

													eventItemModal.on('shown.bs.modal', function () {
														eventItemModal.find('select').chosen();
														cmbRelateCombo('97', '2', '.cmbVerifyIndicators')
													});

													eventItemModal.find('#btn_verifyMyIdentity').click(function (event) {
														var usr_verified_indicator = eventItemModal.find('.cmbVerifyIndicators').val();
														var postData = {
															usr_verified_indicator: usr_verified_indicator,
															action: "userIdentityVerifySubmitInfo"
														}
														form.addClass('was-validated');
														if (form[0].checkValidity() === false) {
															event.preventDefault();
															event.stopPropagation();
														} else {
															$.post('bkp/controllers/userController.php', postData, function (e) {
																if (parseInt(e.msgType) == 1) {
																	swal("Identity Verification!", e.msg, "success");
																	form.removeClass('was-validated');
																	userProfileInfo();
																	eventItemModal.modal('hide')
																} else {
																	swal("Identity Verification!", e.msg, "warning");
																}
															}, "json");
														}
													});
												});

												$('.btnreflink').click(function () {
													Swal.fire({
														position: 'top-left',
														html: "Referral Link Copied...",
														showConfirmButton: false,
														showCancelButton: false,
														timer: 1500,
													});
												});
											}, "json");
										}

										function profileUpdate() {
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
											var pro_instagram_link = $('#pro_instagram_link').val();
											var pro_twitter_link = $('#pro_twitter_link').val();
											var pro_fb_link = $('#pro_fb_link').val();
											var pro_youtube_link = $('#pro_youtube_link').val();
											var pro_pinterest_link = $('#pro_pinterest_link').val();
											var postdata = {
												action: "profileUpdateFront",
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
												usr_id: usr_id,
												pro_instagram_link:pro_instagram_link,
												pro_twitter_link:pro_twitter_link,
												pro_fb_link:pro_fb_link,
												pro_youtube_link:pro_youtube_link,
												pro_pinterest_link:pro_pinterest_link
											}
											$.post('bkp/controllers/userController.php', postdata, function (e) {
												if (parseInt(e.msgType) == 1) {
													swal("Good Job !", e.msg, "success");
													userProfileInfo();
												} else {
													swal("Alert !", e.msg, "warning");
												}
											}, "json");
										}

										$(document).ready(function () {
											checkMembershipIsActiveMsg();
											$('select').chosen({width: "100%"});
											$("#iframe_profileimage").attr("src", "user_profileimage.php");
											userProfileInfo();

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


											$('#btn-update').click(function (event) {
												form.submit(false);
												form.addClass('was-validated');
												if (form[0].checkValidity() === false) {
													event.preventDefault();
													event.stopPropagation();
												} else {
													profileUpdate();
													form.removeClass('was-validated');
												}
											});


											$('#btn_chngpass').click(function () {
												form.submit(false);
												var confirmModalString = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
														'<div class="modal-dialog" role="document">' +
														'<div class="modal-content">' +
														'<div class="modal-header">' +
														'<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>' +
														'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
														'<span aria-hidden="true">&times;</span>' +
														'</button>' +
														'</div>' +
														'<div class="modal-body">' +
														//here is model body start
														'<form id="password-form" novalidate>' +
														'<div class="form-group">' +
														'<label for="recipient-name" class="col-form-label">New password</label>' +
														'<input type="text" class="form-control" id="usr_pass_recover"  placeholder="New password" required>' +
														'</div>' +
														'<div class="form-group">' +
														'<label for="recipient-name" class="col-form-label">Confirm password</label>' +
														'<input type="text" class="form-control" id="usr_pass_confirm_recovery"  placeholder="New password" required>' +
														'</div>' +
														'</form>' +
														//here is model body end
														'</div>' +
														//start model footer
														'<div class="modal-footer">' +
														'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
														'<button type="button" class="btn btn-primary" id="btn_updatepass">Update</button>' +
														'</div>' +
														//end modal footer
														'</div>' +
														'</div>' +
														'</div>';

												var confirmModal = $(confirmModalString);
												confirmModal.modal('show');

												confirmModal.find('#btn_updatepass').click(function (event) {
													var form = confirmModal.find('#password-form');
													form.addClass('was-validated');
													if (form[0].checkValidity() === false) {
														event.preventDefault();
														event.stopPropagation();
													} else {
														var usr_pass = confirmModal.find('#usr_pass_recover').val();
														var usr_pass_confirm = confirmModal.find('#usr_pass_confirm_recovery').val();
														var postData = {
															usr_pass: usr_pass,
															action: "profilePasswordChange"
														}
														if (usr_pass_confirm === usr_pass) {
															$.post("bkp/controllers/userController.php", postData, function (e) {
																if (e !== undefined || e.lenght !== 0 || e !== null) {
																	if (parseInt(e.msgType) == 1) {
																		swal("Good job!", e.msg, "success");
																		confirmModal.modal('hide');
																	} else {
																		swal("Error !", e.msg, "error");
																	}
																} else {
																	swal("Alert !", e.msg, "warning");
																}
															}, "json");
														} else {
															swal("Password Not Matched", "Please Enter Correct Password", "warning");
														}
													}
												});

											});
										});
        </script>
	</body>
</html>