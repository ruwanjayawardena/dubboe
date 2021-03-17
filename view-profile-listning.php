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
		<main class="main-wrapper">
			<section class="cs-sidebar-enabled cs-sidebar-left">
				<div class="container">					
					<div class="row">
						<div class="col-xl-4 col-12 cs-sidebar bg-secondary py-3">
							<div class="row justify-content-center">
								<div class="col-xl-12 col-12">
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
															<a class="nav-link-style usr_email" href="mailto:ben.miller@example.com"></a>
														</li>
														<li class="mb-0">
															<i class="fe-globe mr-2"></i>
															<a class="nav-link-style pro_website_url" href="mailto:ben.miller@example.com"></a>
														</li>
													</ul>
												</div>

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-12 cs-content py-5">
							<div class="row justify-content-center mb-4">
								<div class="col-12">
									<nav aria-label="breadcrumb">
										<ol class="py-1 breadcrumb">
											<li class="breadcrumb-item"><a href="index.php" ><i class="fas fa-home"></i>  Home</a></li>
											<li class="breadcrumb-item"><a href="#">Listing</a>
										</ol>
									</nav>
									<h1 class="text-capitalize"> All listing of <span class="usr_first_name"></span> <span class="usr_last_name"></span></h1>
								</div>
							</div>
							<div class="row loadads">

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

			function loadUserProfileInfo() {
				var usr_id = $('#usr_id').val();
				$.post('bkp/controllers/userController.php', {action: 'getUserProfileInfoByID', usr_id: usr_id}, function (e) {
					$.each(e, function (index, adInfo_qdt) {

						$('.usr_phone').html('').append(adInfo_qdt.usr_phone);
						$('.usr_phone').prop('href', 'tel:' + adInfo_qdt.usr_phone);
						$('.usr_email').html('').append(adInfo_qdt.usr_email);
						$('.usr_email').prop('href', 'mailto:' + adInfo_qdt.usr_email);
						$('.pro_website_url').html('').append(adInfo_qdt.pro_website_url);
						$('.pro_website_url').prop('href', adInfo_qdt.pro_website_url);
						$('.usr_first_name').html('').append(adInfo_qdt.usr_first_name);
						$('.usr_last_name').html('').append(adInfo_qdt.usr_last_name);
						$('.profile-link').prop('href', 'public-profile.php?usr_id=' + usr_id);
						if (adInfo_qdt.profile_img === "#") {
							$('.ad_usr_profile_img').prop('src', 'url(assets/img/noimage.png');
						} else {
							$('.ad_usr_profile_img').prop('src', 'asset_imageuploader/userprofileimages/' + usr_id + '/' + adInfo_qdt.profile_img);
						}
					});
				}, "json");
			}

			function loadAllAds() {
				var usr_id = $('#usr_id').val();
				var displayAds = "";
				$.post('bkp/controllers/advController.php', {action: 'LoadAdInfoByUserID', usr_id: usr_id}, function (allads) {
					if (allads === undefined || allads.length === 0 || allads === null) {
						displayAds += '<div>Ads Not Available</div>';
					} else {
						$.each(allads, function (allads_index, allads_qdt) {
							displayAds += '<div class="col-xl-4 col-md-6 col-sm-6 col-6 px-2 py-2 m-0">';
							displayAds += '<div class="card card-category box-shadow border card-hover classifiedAd-card " id="' + allads_qdt.ad_id + '">';

							if (allads_qdt.ad_pricetag_status == 1) {
								displayAds += '<span class="badge badge-lg badge-floating badge-floating-right badge-info">$' + allads_qdt.ad_price + '</span>';
							}
							if (allads_qdt.ad_img === "#") {
								displayAds += '<img class="card-img-top" src="assets/img/noimage.png">';
							} else {
								displayAds += '<img class="card-img-top" src="asset_imageuploader/advcoverimage/' + allads_qdt.ad_id + '/' + allads_qdt.ad_img + '">';
							}
							displayAds += '<div class="card-body">';
							displayAds += '<h5 class="card-title">' + allads_qdt.ad_title + '</h5>';
							displayAds += '<p class="card-text font-size-sm">' + allads_qdt.ad_shortdesc + '</p>';
							displayAds += '</div>';
							displayAds += '</div>';
							displayAds += '</div>';
						});
					}

					$('.loadads').html('').append(displayAds);

					$('.classifiedAd-card').click(function (event) {
						event.preventDefault();
						var ad_id = $(this).prop('id');
						window.location.href = 'ad-info.php?ad_id=' + ad_id;
					})
				}, "json");
			}
			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				loadAllAds();
				loadUserProfileInfo();

				$('.btn_sendMsg').click(function () {
					var msg_receiver = $('#usr_id').val();;
					var msg_object_id = null;
					var msg_forwhat = 'BETWSUSER';
					sendMessageFRONTEND(msg_receiver, msg_object_id, msg_forwhat);
				});
			});
        </script>
	</body>
</html>