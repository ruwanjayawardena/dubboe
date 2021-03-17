<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="ad_id" value="<?php
		if (isset($_REQUEST['ad_id'])) {
			echo $_REQUEST['ad_id'];
		} else {
			echo "";
		}
		?>"/>
		<main class="main-wrapper pb-3">			
			<section class="cs-sidebar-enabled cs-sidebar-right border-bottom mb-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 cs-content pt-5">
							<div class="row justify-content-center mb-4">
								<div class="col-12">
									<nav aria-label="breadcrumb">
										<ol class="py-1 breadcrumb">
											<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>  Home</a></li>
											<li class="breadcrumb-item"><a href="#">All Ads</a></li>              
											<li class="breadcrumb-item"><a href="#"><span class="state"></span></a></li>
											<li class="breadcrumb-item"><a href="#"><span class="city"></span></a></li>
											<li class="breadcrumb-item"><a href="#"><span class="maincategory"></span></a></li>
											<li class="breadcrumb-item"><a href="#"><span class="subcategory"></span></a></li>
											<li class="breadcrumb-item"><a href="#"><span class="adidinfo"></span></a></li>
										</ol>
									</nav>
									<h1 class="text-capitalize"><span class="ad_title"></span></h1>
								</div>
							</div>
							<div class="row justify-content-center">
								<input type="hidden" class="form-control" id="ad_filter_array_status">
								<div class="col-12">
									<div class="row">
										<div class="col-lg-12 col-12 slider-loader">
											<div class="fotorama">

											</div>
										</div>
									</div>									
								</div>	
							</div>		
						</div>
						<div class="col-lg-4 cs-sidebar bg-secondary pt-5 pl-lg-4 pb-md-2">
							<h5 class="text-right text-dark font-size-sm adpostedago"></h5>
							<div class="row ad-filters-row">
								<div class="col-lg-12 col-12">
									<div class="card box-shadow">
										<div class="card-body">												
											<dl class="row ad-filters">


											</dl>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-lg-12 col-12">
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
												<div class="col-xl-12 col-12 mb-3">			
													<a class="pro_fb_link p-1" href="#" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
													<a class="pro_twitter_link p-1" href="#" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
													<a class="pro_instagram_link p-1" href="#" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
													<a class="pro_youtube_link p-1" href="#" target="_blank"><i class="fab fa-youtube fa-lg"></i></a>
													<a class="pro_pinterest_link p-1" href="#" target="_blank"><i class="fab fa-pinterest fa-lg"></i></a>
												</div>
												<div class="col-xl-12 col-12">													
													<h5 class="font-size-xs text-muted ownerregdesc"></h5>
													<a class="btn btn-secondary profileAllActiveAds" href="#">View 7 listings</a>

												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="pt-3 pb-5">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-8">
							<h5>Description</h5>
							<span class="ad_longdesc">

							</span>

						</div>
						<div class="col-4">
							<img class="ad_img rounded img-fluid" src="#">
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
		<script>


			function LoadAdInfoByID(callback) {
				var ad_maincategory = 0;
				var ad_subcategory = 0;
				var ad_id = $('#ad_id').val();
				var imgallery = [];
				$.post('bkp/controllers/advController.php', {action: 'LoadAdInfoByID', ad_id: ad_id}, function (adInfo) {
					$.post('bkp/controllers/advController.php', {action: 'getNumOfAdCountByAdID', ad_id: ad_id}, function (numofactiveadlistning) {
						$.each(adInfo, function (adInfo_index, adInfo_qdt) {
							$('.maincategory').html('').append(adInfo_qdt.ad_maincategory_name);
							ad_maincategory = adInfo_qdt.ad_maincategory;
							ad_subcategory = adInfo_qdt.ad_subcategory;
							$('.subcategory').html('').append(adInfo_qdt.ad_subcategory_name);
							$('.state').html('').append(adInfo_qdt.ad_state_name);
							$('.city').html('').append(adInfo_qdt.ad_city_name);
							$('.adidinfo').html('').append('Ad ID ' + adInfo_qdt.ad_id);
							if (parseInt(adInfo_qdt.ad_pricetag_status) == 1) {
								$('.ad_title').html('').append(adInfo_qdt.ad_title + ' | <span class="badge badge-secondary">$' + adInfo_qdt.ad_price + '</span>');
							} else {
								$('.ad_title').html('').append(adInfo_qdt.ad_title);
							}
							$('.ad_longdesc').html('').append(adInfo_qdt.ad_longdesc);
							$('.usr_phone').html('').append(adInfo_qdt.usr_phone);
							$('.usr_phone').prop('href', 'tel:' + adInfo_qdt.usr_phone);
							$('.usr_email').html('').append(adInfo_qdt.usr_email);
							$('.usr_email').prop('href', 'mailto:' + adInfo_qdt.usr_email);
							$('.pro_website_url').html('').append(adInfo_qdt.pro_website_url);
							$('.pro_website_url').prop('href', adInfo_qdt.pro_website_url);
							$('.pro_instagram_link').prop('href', adInfo_qdt.pro_instagram_link);
							$('.pro_youtube_link').prop('href', adInfo_qdt.pro_youtube_link);
							$('.pro_fb_link').prop('href', adInfo_qdt.pro_fb_link);
							$('.pro_twitter_link').prop('href', adInfo_qdt.pro_twitter_link);
							$('.pro_pinterest_link').prop('href', adInfo_qdt.pro_pinterest_link);
							$('.usr_first_name').html('').append(adInfo_qdt.usr_first_name);
							$('.usr_last_name').html('').append(adInfo_qdt.usr_last_name);
							$('.btn_sendMsg').val(adInfo_qdt.ad_usr_id);
							$('.profile-link').prop('href', 'public-profile.php?usr_id=' + adInfo_qdt.ad_usr_id);
							if (adInfo_qdt.ad_usr_profile_img === "#") {
								$('.ad_usr_profile_img').prop('src', 'assets/img/noimage.png');
							} else {
								$('.ad_usr_profile_img').prop('src', 'asset_imageuploader/userprofileimages/' + adInfo_qdt.ad_usr_id + '/' + adInfo_qdt.ad_usr_profile_img);
							}
							if (parseInt(adInfo_qdt.adpostedondays) == 0) {
								$('.adpostedago').html('').append('Recently Posted');
							} else if (parseInt(adInfo_qdt.adpostedondays) <= 30) {
								$('.adpostedago').html('').append('Posted ' + adInfo_qdt.adpostedondays + ' days ago');
							} else {
								$('.adpostedago').html('').append('Posted ' + adInfo_qdt.adpostedonmonth + ' month ago');
							}
							if (parseInt(adInfo_qdt.owneraccontscrondays) == 0) {
								$('.ownerregdesc').html('').append('New Member');
							} else if (parseInt(adInfo_qdt.owneraccontscrondays) <= 30) {
								$('.ownerregdesc').html('').append(adInfo_qdt.owneraccontscrondays + ' days on dubboe');
							} else {
								$('.ownerregdesc').html('').append(adInfo_qdt.owneraccontscronmonth + ' month on dubboe');
							}

							$('.profileAllActiveAds').html('').append('<i class="far fa-edit"></i> View ' + numofactiveadlistning + ' listings');
							$('.profileAllActiveAds').prop('href', 'view-profile-listning.php?usr_id=' + adInfo_qdt.ad_usr_id);

							if (adInfo_qdt.ad_img === "#") {
								$('.ad_img_div').removeClass('header_default_bg').css('background-image', 'url(assets/img/noimage.png)');
								$('.ad_img').prop('src', 'assets/img/noimage.png');
							} else {
								$('.ad_img_div').removeClass('header_default_bg').css('background-image', 'url(asset_imageuploader/advcoverimage/' + adInfo_qdt.ad_id + '/' + adInfo_qdt.ad_img + ')');
								$('.ad_img').prop('src', 'asset_imageuploader/advcoverimage/' + adInfo_qdt.ad_id + '/' + adInfo_qdt.ad_img);
							}
							if (adInfo_qdt.ad_slider === "#") {
								$('.slider-loader').prop('hidden', true)
							} else {
								$.each(adInfo_qdt.ad_slider, function (index_slider, qdt_slider) {
									imgallery.push({img: 'asset_imageuploader/advsliderimage/' + ad_id + '/' + qdt_slider, thumb: 'asset_imageuploader/advsliderimage/' + ad_id + '/' + qdt_slider});
								});

								$('.fotorama').fotorama({
									data: imgallery,
									nav: 'thumbs',
									width: '100%',
									maxwidth: '100%',
									ratio: '16/9',
									allowfullscreen: true,
									autoplay: true,
									keyboard: true,
									thumbmargin: 6,
									fit: 'cover',
									thumbwidth: 100
								});
							}
						});

						$('.btn_sendMsg').click(function () {
							var ad_usr_id = $(this).val();
							var msg_receiver = ad_usr_id;
							var msg_object_id = ad_id;
							var msg_forwhat = 'AD';
							sendMessageFRONTEND(msg_receiver, msg_object_id, msg_forwhat);
						});

						if (callback !== undefined) {
							if (typeof callback === 'function') {
								callback(ad_maincategory, ad_subcategory);
							}
						}
					});
				}, "json");
			}

			function loadAdFilters(ad_maincategory, ad_subcategory) {
				var ad_id = $('#ad_id').val();
				var displayFilters = "";
				$.post('bkp/controllers/advController.php', {action: 'LoadAdfiltersByID', ad_id: ad_id}, function (LoadAdfiltersByID) {
					$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getFilterGroupByOrder', grp_admaincategory: ad_maincategory, grp_adsubcategory: ad_subcategory}, function (group) {
						$.post('bkp/controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilterByOrder', catfl_admaincategory: ad_maincategory, catfl_adsubcategory: ad_subcategory}, function (AllFilters) {
							if (AllFilters === undefined || AllFilters.length === 0 || AllFilters === null) {
								$('.ad-filters-row').prop('hidden', true);
							} else {
								$.each(group, function (grp_index, grp_qdt) {
									displayFilters += '<dt class="col-xl-5 col-12">' + grp_qdt.grp_name + '</dt>';
									var filtervalues = "";
									$.each(AllFilters, function (allflt_index, allflt_qdt) {
										if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
											if (parseInt(allflt_qdt.catfl_type) == 1) {
												$.each(LoadAdfiltersByID, function (filter_index, filter_qdt) {
													if ((parseInt(allflt_qdt.grp_id) == parseInt(filter_qdt.grinf_group)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(filter_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
														if ((parseInt(ad_id) == parseInt(filter_qdt.ad_id)) && (parseInt(filter_qdt.adflt_type) == 1) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
															filtervalues += '<span class="font-size-sm badge badge-dark mr-1 cusm-1 py-1 px-1">' + filter_qdt.valuename + "</span>";
														}
													}
												});
											}
											if (parseInt(allflt_qdt.catfl_type) == 2) {
												$.each(LoadAdfiltersByID, function (filter_index, filter_qdt) {
													if ((parseInt(ad_id) == parseInt(filter_qdt.ad_id)) && (parseInt(filter_qdt.adflt_type) == 2) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
														filtervalues += '<span class="font-size-sm badge badge-dark mr-1 cusm-1 py-1 px-1">' + filter_qdt.adflt_value + "</span>";
													}

												});
											}
										}
									});
									displayFilters += '<dd class="col-xl-7 col-12">' + filtervalues + '</dd>';
								});
							}
							$('.ad-filters').html('').append(displayFilters);

						}, "json");
					}, "json");
				}, "json");

			}


			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				LoadAdInfoByID(function (ad_maincategory, ad_subcategory) {
					loadAdFilters(ad_maincategory, ad_subcategory);
				});

			});
        </script>

	</body>
</html>