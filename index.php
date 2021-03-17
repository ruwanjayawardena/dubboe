<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-homepage.php'; ?>
		<style>
			.modal .card-body {
				min-height: 100px!important;
			}
		</style>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper">
			<section class="grey-lighten2">
				<div class="container">					
					<div class="row justify-content-center carouselHomePage">					
					</div>
				</div>
			</section>
			<section class="pt-5">
				<div class="container">
					<h3 class="pb-2"><strong>Hi everyone</strong>, here's the business categories what you are looking for</h3>
					<div class="row justify-content-center loadAllAdIMGCategory">					
					</div>
				</div>
			</section>
<!--			<section class="pt-5">
				<div class="container">
					<h3 class="pb-2"><strong>Recently Listed</strong>.</h3>
					<div class="row justify-content-center recentlyListed">					
					</div>
				</div>
			</section>-->
			<span class="pageSections"></span>	
		</main>     
		<?php
		include './includes/frontend-footer.php';
		include './includes/end-block-homepage.php';
		include './includes/comboboxJS.php';
		include './includes/commonJS.php';
		?>
		<script>
//			function recentlyListed() {
//
//				var ad_maincategory = $('#mainCategory').val();
//				var ad_subcategory = $('#subCategory').val();
//				var ad_country = $('#country').val();
//				var ad_state = $('#state').val();
//				var ad_city = $('#city').val();
//				var displayAds = "";
//				$.post('bkp/controllers/advController.php', {action: 'getClassifiedAdPageIDsByName', ad_maincategory: ad_maincategory, ad_subcategory: ad_subcategory, ad_country: ad_country, ad_state: ad_state, ad_city: ad_city}, function (getIDvalByNams) {
//					$.post('bkp/controllers/advController.php', {action: 'LoadAllAdsByCategories', ad_maincategory: getIDvalByNams.ad_maincategory, ad_subcategory: getIDvalByNams.ad_subcategory, ad_country: getIDvalByNams.ad_country, ad_state: getIDvalByNams.ad_state, ad_city: getIDvalByNams.ad_city}, function (allads) {
//						$.post('bkp/controllers/advController.php', {action: 'LoadAllAdsfilters', ad_maincategory: getIDvalByNams.ad_maincategory, ad_subcategory: getIDvalByNams.ad_subcategory, ad_country: getIDvalByNams.ad_country, ad_state: getIDvalByNams.ad_state, ad_city: getIDvalByNams.ad_city}, function (LoadAllAdsfilters) {
//							$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getFilterGroupByOrder', grp_admaincategory: getIDvalByNams.ad_maincategory, grp_adsubcategory: getIDvalByNams.ad_subcategory}, function (group) {
//								$.post('bkp/controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilterByOrder', catfl_admaincategory: getIDvalByNams.ad_maincategory, catfl_adsubcategory: getIDvalByNams.ad_subcategory}, function (AllFilters) {
//									$.each(allads, function (allads_index, allads_qdt) {
//										displayAds += '<div class="col-xl-4 col-md-6 col-sm-6 col-6 mt-2 p-2">';
//										displayAds += '<div class="card box-shadow card-hover box-shadow classifiedAd-card" id="' + allads_qdt.ad_id + '">';
//
//										if (allads_qdt.ad_pricetag_status == 1) {
//											displayAds += '<span class="badge badge-lg badge-floating badge-floating-right badge-success text-white price-tag">$' + allads_qdt.ad_price + '</span>';
//										}
//										displayAds += '<span class="badge badge-floating badge-pill badge-info btn-addtowishlist" id="' + allads_qdt.ad_id + '"><i class="far fa-heart fa-lg"></i></span>';
//										displayAds += '<span class="btn-adclick" id="IMGDIV-' + allads_qdt.ad_id + '">';
//										if (allads_qdt.ad_img === "#") {
//											displayAds += '<img class="card-img-top" src="assets/img/noimage.png">';
//										} else {
//											displayAds += '<img class="card-img-top" src="asset_imageuploader/advcoverimage/' + allads_qdt.ad_id + '/' + allads_qdt.ad_img + '">';
//										}
//										displayAds += '</span>';
//										displayAds += '<div class="card-body">';
//										displayAds += '<div class="row">';
//										displayAds += '<div class="col-xl-10 col-12">';
//										displayAds += '<span class="btn-adclick" id="INFOADDIV-' + allads_qdt.ad_id + '">';
//										displayAds += '<h5 class="card-title">' + allads_qdt.ad_title + ' </h5>';
//										displayAds += '<p class="card-text font-size-sm">' + allads_qdt.ad_shortdesc + '<br>';
//										displayAds += '<span class="d-none d-sm-block d-md-block">';
//										$.each(group, function (grp_index, grp_qdt) {
//											displayAds += '<span class="badge badge-dark mb-1">';
//											displayAds += '<strong class="bg-gradient px-2">' + grp_qdt.grp_name + '</strong> ';
//											$.each(AllFilters, function (allflt_index, allflt_qdt) {
//												if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
//													if (parseInt(allflt_qdt.catfl_type) == 1) {
//														$.each(LoadAllAdsfilters, function (filter_index, filter_qdt) {
//															if ((parseInt(allflt_qdt.grp_id) == parseInt(filter_qdt.grinf_group)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(filter_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
//																if ((parseInt(allads_qdt.ad_id) == parseInt(filter_qdt.ad_id)) && (parseInt(filter_qdt.adflt_type) == 1) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
//																	displayAds += filter_qdt.valuename + " | ";
//																}
//															}
//														});
//													}
//													if (parseInt(allflt_qdt.catfl_type) == 2) {
//														$.each(LoadAllAdsfilters, function (filter_index, filter_qdt) {
//															if ((parseInt(allads_qdt.ad_id) == parseInt(filter_qdt.ad_id)) && (parseInt(filter_qdt.adflt_type) == 2) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
//																displayAds += filter_qdt.adflt_value + " | ";
//															}
//
//														});
//													}
//												}
//											});
//											displayAds += '</span>';
//										});
//
//										displayAds += '</span>';
//										displayAds += '</p>';
//										displayAds += '</span>';
//										displayAds += '</div>';
//										displayAds += '</div>';
//										displayAds += '</div>';
//										displayAds += '</div>';
//										displayAds += '</div>';
//									});
//
//									if (displayAds !== "") {
//										$('.recentlyListed').html('').append(displayAds);
//									} else {
//										$('.recentlyListed').html('').append('<div class="alert bg-info text-white font-size-xl w-100 text-center">No Ads Available</div>');
//									}
//
//									$('.btn-adclick').click(function (event) {
//										event.preventDefault();
//										var ad_id_str = $(this).prop('id');
//										var ad_id_arr = ad_id_str.split('-');
//										window.location.href = 'ad-info.php?ad_id=' + ad_id_arr[1];
//									});
//
//									$('.btn-addtowishlist').click(function (event) {
//										event.preventDefault();
//										var ad_id = $(this).prop('id');
//										var postdata = {
//											action: "saveWishlist",
//											wish_object: ad_id,
//											wish_type: 1,
//										}
//										$.post('bkp/controllers/ubWishlistController.php', postdata, function (e) {
//											shoppingCartNotification();
//											Swal.fire({
//												position: 'top-left',
//												html: e.msg,
//												showConfirmButton: false,
//												showCancelButton: false,
//												timer: 1500,
//											});
//										}, "json");
//									});
//								}, "json");
//							}, "json");
//						}, "json");
//					}, "json");
//				}, "json");
//			}

			function loadAllAdIMGCategory() {
				var foldername = "admaincategory";
				var subcmb_foldername = "adsubcategory";
				var card = "";
				$.post('bkp/controllers/subComboController.php', {action: 'getAllRelateCombo', mcmb_id: '94'}, function (maincmb) {
					if (maincmb !== undefined || maincmb.length !== 0 || maincmb !== null) {
						$.each(maincmb, function (index, qdt) {
							card += '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mt-3">';
							card += '<div id="' + qdt.rlcmb_id + '" class="card card-flip btn-maincategory card-hover border-0 box-shadow shadow rounded-bottom card-flip-categories">';
							card += '<div class="card-flip-inner">';
							card += '<div class="card-flip-front">';
							if (qdt.rlcmb_img === "#") {
								card += '<img class="card-img-top" src="assets/img/noimage.png" alt="' + qdt.rlcmb_name + '">';
							} else {
								card += '<img class="card-img-top" src="asset_imageuploader/' + foldername + '/' + qdt.rlcmb_id + '/' + qdt.rlcmb_img + '" alt="' + qdt.rlcmb_name + '">';
							}
							card += '<div class="card-body text-center ">';
							card += '<h3 class="h5 mb-2">' + qdt.rlcmb_name + '</h3>';
							card += '</div>';
							card += '</div>'
							card += '<a class="card-flip-back" href="#">';
							card += '<div class="card-body-inner text-center align-content-center">';
							card += '<h3 class="h5 card-title mt-5 pt-5" id="' + qdt.rlcmb_id + '-maincatname">' + qdt.rlcmb_name + '</h3>';
							card += '</div>';
							card += '</a>';
							card += '</div>';
							card += '</div>';
							card += '</div>';
						});
						$('.loadAllAdIMGCategory').html('').append(card);
						$('.btn-maincategory').click(function (event) {
							event.preventDefault();
							var maincatid = $(this).prop('id');
							var maincatname = $('#' + maincatid + '-maincatname').html();
							$.post('bkp/controllers/subComboController.php', {action: 'getAllSubCombo', scmb_relationship: 2, scmb_maincmb: '95', scmb_relatecmb: maincatid}, function (subcmb) {
								var subCmbModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
										'<div class="modal-dialog modal-xl" role="document">' +
										'<div class="modal-content">' +
										'<div class="modal-header">' +
										'<h5 class="modal-title" id="exampleModalLabel">Pick Location & Choose sub category</h5>' +
										'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
										'<span aria-hidden="true">&times;</span>' +
										'</button>' +
										'</div>' +
										'<div class="modal-body" style="background-image:url(assets/img/textures/popupbg.svg);min-height:400px">';
								subCmbModalStr += '<div class="row">';
								subCmbModalStr += '<div class="col-xl-3 col-lg-3 col-12">';
//								location
								subCmbModalStr += '<label>Location</label>';
								subCmbModalStr += '<div class="form-row"><div class="form-group col-lg-12 col-12">';
								subCmbModalStr += '<select class="col-12 form-control cmbState form-control-chosen" data-placeholder="Choose a State...">';
								subCmbModalStr += '<option disabled selected>Loading...</option>';
								subCmbModalStr += '</select>';
								subCmbModalStr += '</div></div>';
								subCmbModalStr += '<div class="form-row"><div class="form-group col-lg-12 col-12">';
								subCmbModalStr += '<select class="col-12 form-control cmbCity form-control-chosen mt-2" data-placeholder="Choose a city...">';
								subCmbModalStr += '<option disabled selected>Loading...</option>';
								subCmbModalStr += '</select>';
								subCmbModalStr += '</div></div>';
								subCmbModalStr += '<div class="form-row"><div class="form-group col-lg-12 col-12" hidden>';
								subCmbModalStr += '<select class="col-12 form-control cmbCountry form-control-chosen invisible" data-placeholder="Choose a Country..." hidden>'
								subCmbModalStr += '<option disabled selected>Loading...</option>';
								subCmbModalStr += '</select>';
								subCmbModalStr += '</div></div>';

								//end location
								subCmbModalStr += '</div>';
								subCmbModalStr += '<div class="col-xl-8 col-lg-8 col-12">';
								subCmbModalStr += '<div class="row">';
								$.each(subcmb, function (subcmb_index, subcmb_qdt) {
									subCmbModalStr += '<div class="col-xl-3 col-lg-4 col-md-6 col-12">';
									subCmbModalStr += '<a href="#" class="card card-hover border-0 box-shadow btn-subcategory" id="' + subcmb_qdt.scmb_id + '">';
									if (subcmb_qdt.scmb_img === "#") {
										subCmbModalStr += '<img src="assets/img/noimage.png" class="card-img-top" alt="' + subcmb_qdt.scmb_name + '">';
									} else {
										subCmbModalStr += '<img src="asset_imageuploader/' + subcmb_foldername + '/' + subcmb_qdt.scmb_id + '/' + subcmb_qdt.scmb_img + '" class="card-img-top" alt="' + subcmb_qdt.scmb_name + '">';
									}
									subCmbModalStr += '<div class="card-body text-center">';
									subCmbModalStr += '<h5 class="font-weight-light font-size-sm mb-2" id="' + subcmb_qdt.scmb_id + '-subcatname">' + subcmb_qdt.scmb_name + '</h5>';
									subCmbModalStr += '</div>';
									subCmbModalStr += '</a>';
									subCmbModalStr += '</div>';
								});
								subCmbModalStr += '</div>';
								subCmbModalStr += '</div>';
								subCmbModalStr += '</div>';
//here is model body end
								subCmbModalStr += '</div>' +
										//start model footer
										'<div class="modal-footer">' +
										'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
										'</div>' +
										//end modal footer
										'</div>' +
										'</div>' +
										'</div>';
								var subCmbModal = $(subCmbModalStr);
								subCmbModal.modal('show');

								subCmbModal.find('.cmbCountry').prop('hidden', true);
								subCmbModal.on('shown.bs.modal', function (e) {
									$('select').chosen({width: "100%"});

									cmbRelateCombo('26', '2', '.cmbCountry', '238', function () {
										var country = $('.cmbCountry').val();
										cmbRelateSubCombo('27', country, '.cmbState', false, function () {
											var state = $('.cmbState').val();
											cmbRelateSubCombo('30', state, '.cmbCity');
										});
									});

									$('.cmbState').change(function () {
										var state = $(this).val();
										cmbRelateSubCombo('30', state, '.cmbCity');
									});
								});

								subCmbModal.find('.btn-subcategory').click(function () {
									event.preventDefault();
									var ad_subcategory = $(this).prop('id');
									var subcatname = $('#' + ad_subcategory + '-subcatname').html();
									var ad_country = subCmbModal.find('.cmbCountry option:selected').text();
									var ad_state = subCmbModal.find('.cmbState option:selected').text();
									var ad_city = subCmbModal.find('.cmbCity option:selected').text();
									window.location.href = 'classified-info.php?mc=' + maincatname + '&sc=' + subcatname + '&co=' + ad_country + '&st=' + ad_state + '&ct=' + ad_city;
								});


							}, "json");
						});
					}
				}, "json");
			}

			function loadIndexPage() {
				$.post('bkp/controllers/settingController.php', {action: 'getAllSystemInfo'}, function (e) {
					$.each(e, function (index, qdt) {
						//section 2
						$('.sys_welcome_msg').html('').append(qdt.sys_welcome_msg);
						$('.sys_slider_text1').html('').append(qdt.sys_slider_text1);
						//slider                        
						$.post('bkp/controllers/settingController.php', {action: 'loadslider'}, function (sldr) {
							var slider = "";
							var indicators = "";
							slider += '<div id="carouseHomePage" class="carousel slide carousel-fade" data-ride="carousel">';
							slider += '<ol class="carousel-indicators">';
							$.each(sldr, function (index_indicator, slimg) {
								if (index_indicator === 0) {
									slider += '<li data-target="#carouseHomePage" data-slide-to="0" class="active"></li>';
								} else {
									slider += '<li data-target="#carouselExampleDark" data-slide-to="' + index_indicator + '"></li>';
								}
								index_indicator++;
							});
							slider += '</ol>';
							slider += '<div class="carousel-inner">';
							$.each(sldr, function (index, slimg) {
								index++
								if (index === 1) {
									slider += '<div class="carousel-item active">';
									slider += '<img src="asset_imageuploader/slider/images/' + slimg + '" class="d-block w-100" alt="' + slimg + '">';
									slider += '<div class="carousel-caption d-none d-md-block">';
									slider += '<h5>' + qdt.sys_slider_text1 + '</h5>';
									slider += '<p>' + qdt.sys_slider_text2 + '</p>';
									slider += '</div>';
									slider += '</div>';
								} else {
									slider += '<div class="carousel-item">';
									slider += '<img src="asset_imageuploader/slider/images/' + slimg + '" class="d-block w-100" alt="' + slimg + '">';
									slider += '<div class="carousel-caption d-none d-md-block">';
									slider += '<h5>' + qdt.sys_slider_text1 + '</h5>';
									slider += '<p>' + qdt.sys_slider_text2 + '</p>';
									slider += '</div>';
									slider += '</div>';
								}
							});
							slider += '<a class="carousel-control-prev" href="#carouseHomePage" role="button" data-slide="prev">';
							slider += '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
							slider += '<span class="visually-hidden">Previous</span>';
							slider += '</a>';
							slider += '<a class="carousel-control-next" href="#carouseHomePage" role="button" data-slide="next">';
							slider += '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
							slider += '<span class="visually-hidden">Next</span>';
							slider += '</a>';
							slider += '</div>';

							$('.carouselHomePage').html('').append(slider);
							var myCarousel = document.querySelector('.carouselHomePage')
							var carousel = new bootstrap.Carousel(myCarousel, {
								interval: 2000,
								wrap: false
							})
						}, "json");
//						$.post('bkp/controllers/settingController.php', {action: 'LoadHomePageUnderIMG'}, function (homeUnImg) {
//							if (homeUnImg === '#') {
//								$('.jarallax-img').css('background-image', 'url(assets/img/noimage.png)')
//							} else {
//								$('.jarallax-img').css('background-image', 'url(asset_imageuploader/homepageunderimage/images/' + homeUnImg + ')')
//
//							}
//						});
					});
				}, "json");
			}


			$(document).ready(function () {
				loadAllAdIMGCategory();
				loadIndexPage();
//				recentlyListed();
			});
		</script>
	</body>
</html>