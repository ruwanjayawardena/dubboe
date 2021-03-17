<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
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
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center mb-4">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>  Home</a></li>
									<li class="breadcrumb-item"><a href="#">Profile</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><span class="usr_last_name"></span> <span class="usr_last_name"></span> <span class="float-right verified_status font-size-xl text-uppercase bg-light" hidden></span></h1>							
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-4 col-12">
							<div class="card border-0 box-shadow text-center">
								<div class="card-body">												
									<div class="row">
										<div class="col-xl-12 col-12 mb-2">
											<a class="profile-link" href="#"><img class="d-inline-block mb-3 rounded-lg ad_usr_profile_img img-fluid" src="#"></a>												
										</div>
										<div class="col-xl-6 col-12">
											<h3 class="h6 pt-1 mb-1"><a class="profile-link" href="#"><span class="usr_first_name"></span> <span class="usr_last_name"></span></a></h3>
											<button class="btn btn-outline-secondary btn-sm btn_sendMsg"><i class="far fa-envelope"></i> Send Message</button>
										</div>
										<div class="col-xl-6 col-12 text-left">

											<ul class="font-size-sm list-unstyled mb-4">
												<li>
													<i class="fe-phone mr-2"></i>
													<a class="nav-link-style usr_phone" href="tel:00331697720"></a>
												</li>
												<li class="mb-2">
													<i class="fe-mail mr-2"></i>
													<a class="nav-link-style usr_email font-size-xs" href="mailto:ben.miller@example.com"></a>
												</li>
												<li class="mb-0">
													<i class="fe-globe mr-2"></i>
													<a class="nav-link-style pro_website_url" href="mailto:ben.miller@example.com"></a>
												</li>
											</ul>
										</div>
										<div class="col-xl-12 col-12 mb-3">			
											<a class="pro_fb_link p-1" href="#" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
											<a class="pro_twitter_link p-1" href="#" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
											<a class="pro_instagram_link p-1" href="#" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
											<a class="pro_youtube_link p-1" href="#" target="_blank"><i class="fab fa-youtube fa-lg"></i></a>
											<a class="pro_pinterest_link p-1" href="#" target="_blank"><i class="fab fa-pinterest fa-lg"></i></a>
										</div>

									</div>

								</div>
							</div>
						</div>
						<div class="col-xl-8 col-12 py-3">
							<div class="box-shadow rounded bg-secondary px-4 py-3 border border-secondary mb-4">
								<dl class="row">
									<dt class="col-lg-5 col-12">Business Name</dt>
									<dd class="col-lg-7 col-12 pro_business_name"></dd>
									<dt class="col-lg-5 col-12">Product/Service Type</dt>
									<dd class="col-lg-7 col-12 pro_typeof_productservice"></dd>
									<dt class="col-lg-5 col-12">Profile Category</dt>
									<dd class="col-lg-7 col-12 pro_profile_category_name"></dd>
									<dt class="col-lg-5 col-12">Profile Grading</dt>
									<dd class="col-lg-7 col-12 pro_grading_name"></dd>
									<dt class="col-lg-5 col-12">State</dt>
									<dd class="col-lg-7 col-12 ad_state_name"></dd>
									<dt class="col-lg-5 col-12">City</dt>
									<dd class="col-lg-7 col-12 ad_city_name"></dd>
									<dt class="col-lg-5 col-12">Personal Address</dt>
									<dd class="col-lg-7 col-12 pro_address"></dd>
									<dt class="col-lg-5 col-12">Business Address</dt>
									<dd class="col-lg-7 col-12 pro_business_address"></dd>
								</dl>
							</div>
							<h5>About</h5>
							<p><span class="pro_bizdesc_long"></span></p>
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

			function userProfileInfo() {
				var usr_id = $('#usr_id').val();
				$.post('bkp/controllers/userController.php', {action: 'getUserProfileInfoByID', usr_id: usr_id}, function (e) {
					$.each(e, function (index, qdt) {
						if (qdt.profile_img === "#") {
							$('.ad_usr_profile_img').prop('src', 'assets/img/noimage.png');
						} else {
							$('.ad_usr_profile_img').prop('src', 'asset_imageuploader/userprofileimages/' + usr_id + '/' + qdt.profile_img);
						}
						$('.usr_first_name').html('').append(qdt.usr_first_name);
						$('.usr_last_name').html('').append(qdt.usr_last_name);
						$('.pro_business_name').html('').append(qdt.pro_business_name);
						$('.pro_typeof_productservice').html('').append(qdt.pro_typeof_productservice);
						$('.usr_phone').html('').append(qdt.usr_phone);
						$('.usr_email').html('').append(qdt.usr_email);
						$('.ad_state_name').html('').append(qdt.pro_state_name);
						$('.ad_city_name').html('').append(qdt.pro_city_name);
						$('.pro_profile_category_name').html('').append(qdt.pro_profile_category_name);
						$('.pro_grading_name').html('').append(qdt.pro_grading_name);
						$('.pro_address').html('').append(qdt.pro_address);
						$('.pro_business_address').html('').append(qdt.pro_business_address);
						$('.pro_bizdesc_long').html('').append(qdt.pro_bizdesc_long);
						$('.pro_website_url').html('').append(qdt.pro_website_url);
						$('.pro_instagram_link').prop('href', qdt.pro_instagram_link);
						$('.pro_youtube_link').prop('href', qdt.pro_youtube_link);
						$('.pro_fb_link').prop('href', qdt.pro_fb_link);
						$('.pro_twitter_link').prop('href', qdt.pro_twitter_link);
						$('.pro_pinterest_link').prop('href', qdt.pro_pinterest_link);
						if (parseInt(qdt.usr_verified_status) == 2) {
							$('.verified_status').prop('hidden', false);
							$('.verified_status').html('').append('<span class="badge badge-primary"> <i><i class="fas fa-user-shield"></i> Verified Member</span></i>');
						}
					});
				}, "json");
			}
			$(document).ready(function () {
				userProfileInfo();

				$('.btn_sendMsg').click(function () {
					var msg_receiver = $('#usr_id').val();
					;
					var msg_object_id = null;
					var msg_forwhat = 'BETWSUSER';
					sendMessageFRONTEND(msg_receiver, msg_object_id, msg_forwhat);
				});
			});
        </script>		
	</body>
</html>