<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="mainCategory" value="<?php
		if (isset($_REQUEST['mc'])) {
			echo $_REQUEST['mc'];
		} else {
			echo "";
		}
		?>"/>		
		<input type="hidden" id="subCategory" value="<?php
		if (isset($_REQUEST['sc'])) {
			echo $_REQUEST['sc'];
		} else {
			echo "";
		}
		?>"/>		
		<input type="hidden" id="country" value="<?php
		if (isset($_REQUEST['co'])) {
			echo $_REQUEST['co'];
		} else {
			echo "";
		}
		?>"/>		
		<input type="hidden" id="state" value="<?php
		if (isset($_REQUEST['st'])) {
			echo $_REQUEST['st'];
		} else {
			echo "";
		}
		?>"/>		
		<input type="hidden" id="city" value="<?php
		if (isset($_REQUEST['ct'])) {
			echo $_REQUEST['ct'];
		} else {
			echo "";
		}
		?>"/>
		<main class="main-wrapper">			
			<section class="cs-sidebar-enabled cs-sidebar-left">
				<div class="container">
					<div class="row justify-content-center">
						<input type="hidden" class="form-control" id="ad_filter_array_status">						
						<div class="col-xl-3 col-md-4 col-12 cs-sidebar pt-5 pl-lg-4 pb-md-2">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-12 loadAdFilters">

								</div>
							</div>							
						</div>
						<div class="col cs-content pt-5">
							<div class="row justify-content-center mb-4">
								<div class="col-12">
									<nav aria-label="breadcrumb">
										<ol class="py-1 breadcrumb">
											<li class="breadcrumb-item"><a href="index.php" ><i class="fas fa-home"></i>  Home</a></li>
											<li class="breadcrumb-item"><a href="#">All Ads</a></li>              
											<li class="breadcrumb-item"><a href="#"><span class="state"></span></a></li>                
											<li class="breadcrumb-item"><a href="#"><span class="city"></span></a></li>                
											<li class="breadcrumb-item"><a href="#"><span class="maincategory"></span></a></li>                
											<li class="breadcrumb-item"><a href="#"><span class="subcategory"></span></a></li>                
										</ol>
									</nav>
									<h1 class="text-capitalize subcategoryname"></h1>
								</div>
							</div>
							<input type="hidden" class="form-control" id="ad_filter_array_status">
							<div class="row justify-content-left loadads mb-5">
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
			function getFilterValues(callback) {
				var admaincategory = $('#mainCategory').val();
				var adsubcategory = $('#subCategory').val();
				var combovaluefilter = [];
				$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getMainCatSubCatIDsByText', maincategory: admaincategory, subcategory: adsubcategory}, function (mainsubcats) {
//					console.log(mainsubcats.subcat);
					$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getFilterGroupByOrder', grp_admaincategory: mainsubcats.maincat, grp_adsubcategory: mainsubcats.subcat}, function (group) {
						$.post('bkp/controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilterByOrder', catfl_admaincategory: mainsubcats.maincat, catfl_adsubcategory: mainsubcats.subcat}, function (AllFilters) {
							$.post('bkp/controllers/adFilterSettingsController.php', {action: 'categoryComboBoxFiltersByOrder', catfl_admaincategory: mainsubcats.maincat, catfl_adsubcategory: mainsubcats.subcat}, function (comboFilters) {
								$.post('bkp/controllers/adFilterSettingsController.php', {action: 'categoryTextBoxFiltersByOrder', catfl_admaincategory: mainsubcats.maincat, catfl_adsubcategory: mainsubcats.subcat}, function (textboxFilters) {
									$.each(group, function (grp_index, grp_qdt) {
										$.each(AllFilters, function (allflt_index, allflt_qdt) {
											if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
												if (parseInt(allflt_qdt.catfl_type) == 1) {
													$.each(comboFilters, function (cmbflt_index, cmbflt_qdt) {
														if ((parseInt(allflt_qdt.grp_id) == parseInt(cmbflt_qdt.grp_id)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(cmbflt_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(cmbflt_qdt.mcmb_id))) {
															if (parseInt(cmbflt_qdt.mcmb_relation) <= 3) {
																combovaluefilter[cmbflt_qdt.mcmb_id] = {filter_type: 1, filter_value: $('.' + cmbflt_qdt.mcmb_class).val()};
															}
														}
													});
												} else if (parseInt(allflt_qdt.catfl_type) == 2) {
													$.each(textboxFilters, function (txtflt_index, txtflt_qdt) {
														if ((parseInt(allflt_qdt.grp_id) == parseInt(txtflt_qdt.grp_id)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(txtflt_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(txtflt_qdt.txfl_id))) {
															combovaluefilter[txtflt_qdt.txfl_id] = {filter_type: 2, filter_value: $('#' + txtflt_qdt.txfl_id_name + '_from').val(), filter_value2: $('#' + txtflt_qdt.txfl_id_name + '_to').val()};
//															console.log(txtflt_qdt.txfl_id_name);
														}
													});
												}
											}
										});
									});
									if (callback !== undefined) {
										if (typeof callback === 'function') {
											callback(combovaluefilter);
										}
									}
								}, "json");
							}, "json");
						}, "json");
					}, "json");
				}, "json");
			}

			function loadAllAds() {
				var ad_maincategory = $('#mainCategory').val();
				var ad_subcategory = $('#subCategory').val();
				var ad_country = $('#country').val();
				var ad_state = $('#state').val();
				var ad_city = $('#city').val();
				var displayAds = "";
				$.post('bkp/controllers/advController.php', {action: 'getClassifiedAdPageIDsByName', ad_maincategory: ad_maincategory, ad_subcategory: ad_subcategory, ad_country: ad_country, ad_state: ad_state, ad_city: ad_city}, function (getIDvalByNams) {
					$.post('bkp/controllers/advController.php', {action: 'LoadAllAdsByCategories', ad_maincategory: getIDvalByNams.ad_maincategory, ad_subcategory: getIDvalByNams.ad_subcategory, ad_country: getIDvalByNams.ad_country, ad_state: getIDvalByNams.ad_state, ad_city: getIDvalByNams.ad_city}, function (allads) {
						$.post('bkp/controllers/advController.php', {action: 'LoadAllAdsfilters', ad_maincategory: getIDvalByNams.ad_maincategory, ad_subcategory: getIDvalByNams.ad_subcategory, ad_country: getIDvalByNams.ad_country, ad_state: getIDvalByNams.ad_state, ad_city: getIDvalByNams.ad_city}, function (LoadAllAdsfilters) {
							$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getFilterGroupByOrder', grp_admaincategory: getIDvalByNams.ad_maincategory, grp_adsubcategory: getIDvalByNams.ad_subcategory}, function (group) {
								$.post('bkp/controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilterByOrder', catfl_admaincategory: getIDvalByNams.ad_maincategory, catfl_adsubcategory: getIDvalByNams.ad_subcategory}, function (AllFilters) {
									$.each(allads, function (allads_index, allads_qdt) {
										displayAds += '<div class="col-xl-4 col-md-6 col-sm-6 col-6 mt-2 p-2">';
										displayAds += '<div class="card box-shadow card-hover box-shadow classifiedAd-card" id="' + allads_qdt.ad_id + '">';

										if (allads_qdt.ad_pricetag_status == 1) {
											displayAds += '<span class="badge badge-lg badge-floating badge-floating-right badge-success text-white price-tag">$' + allads_qdt.ad_price + '</span>';
										}
										displayAds += '<span class="badge badge-floating badge-pill badge-info btn-addtowishlist" id="' + allads_qdt.ad_id + '"><i class="far fa-heart fa-lg"></i></span>';
										displayAds += '<span class="btn-adclick" id="IMGDIV-' + allads_qdt.ad_id + '">';
										if (allads_qdt.ad_img === "#") {
											displayAds += '<img class="card-img-top" src="assets/img/noimage.png">';
										} else {
											displayAds += '<img class="card-img-top" src="asset_imageuploader/advcoverimage/' + allads_qdt.ad_id + '/' + allads_qdt.ad_img + '">';
										}
										displayAds += '</span>';
										displayAds += '<div class="card-body">';
										displayAds += '<div class="row">';
										displayAds += '<div class="col-xl-10 col-12">';
										displayAds += '<span class="btn-adclick" id="INFOADDIV-' + allads_qdt.ad_id + '">';
										displayAds += '<h5 class="card-title">' + allads_qdt.ad_title + ' </h5>';									
										displayAds += '<p class="card-text font-size-sm">' + allads_qdt.ad_shortdesc + '<br>';
										displayAds += '<span class="d-none d-sm-block d-md-block">';
										$.each(group, function (grp_index, grp_qdt) {
											displayAds += '<span class="badge badge-dark mb-1">';
											displayAds += '<strong class="bg-gradient px-2">' + grp_qdt.grp_name + '</strong> ';
											$.each(AllFilters, function (allflt_index, allflt_qdt) {
												if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
													if (parseInt(allflt_qdt.catfl_type) == 1) {
														$.each(LoadAllAdsfilters, function (filter_index, filter_qdt) {
															if ((parseInt(allflt_qdt.grp_id) == parseInt(filter_qdt.grinf_group)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(filter_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
																if ((parseInt(allads_qdt.ad_id) == parseInt(filter_qdt.ad_id)) && (parseInt(filter_qdt.adflt_type) == 1) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
																	displayAds += filter_qdt.valuename + " | ";
																}
															}
														});
													}
													if (parseInt(allflt_qdt.catfl_type) == 2) {
														$.each(LoadAllAdsfilters, function (filter_index, filter_qdt) {
															if ((parseInt(allads_qdt.ad_id) == parseInt(filter_qdt.ad_id)) && (parseInt(filter_qdt.adflt_type) == 2) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
																displayAds += filter_qdt.adflt_value + " | ";
															}

														});
													}
												}
											});
											displayAds += '</span>';
										});

										displayAds += '</span>';
										displayAds += '</p>';
										displayAds += '</span>';
										displayAds += '</div>';
//										displayAds += '<div class="col-xl-2 col-12 text-right pt-5">';
//										displayAds += '<button class="btn-addtowishlist btn btn-translucent-light btn-sm" value="' + allads_qdt.ad_id + '"><i class="far fa-heart fa-lg"></i></button>';
//										displayAds += '</div>';
										displayAds += '</div>';
										displayAds += '</div>';
										displayAds += '</div>';
										displayAds += '</div>';
									});

									if (displayAds !== "") {
										$('.loadads').html('').append(displayAds);
									} else {
										$('.loadads').html('').append('<div class="alert bg-info text-white font-size-xl w-100 text-center">No Ads Available</div>');
									}

									$('.btn-adclick').click(function (event) {
										event.preventDefault();
										var ad_id_str = $(this).prop('id');
										var ad_id_arr = ad_id_str.split('-');
										window.location.href = 'ad-info.php?ad_id=' + ad_id_arr[1];
									});

									$('.btn-addtowishlist').click(function (event) {
										event.preventDefault();
										var ad_id = $(this).prop('id');
										var postdata = {
											action: "saveWishlist",
											wish_object: ad_id,
											wish_type: 1,
										}
										$.post('bkp/controllers/ubWishlistController.php', postdata, function (e) {
											shoppingCartNotification();
											Swal.fire({
												position: 'top-left',
												html: e.msg,
												showConfirmButton: false,
												showCancelButton: false,
												timer: 1500,
											});
										}, "json");
									});
								}, "json");
							}, "json");
						}, "json");
					}, "json");
				}, "json");
			}


			function loadAdFilters() {
				var ad_maincategory = $('#mainCategory').val();
				var ad_subcategory = $('#subCategory').val();
				var ad_country = $('#country').val();
				var ad_state = $('#state').val();
				var ad_city = $('#city').val();
				var adfilterHTML = "";
				var combofilter = [];
				$.post('bkp/controllers/advController.php', {action: 'getClassifiedAdPageIDsByName', ad_maincategory: ad_maincategory, ad_subcategory: ad_subcategory, ad_country: ad_country, ad_state: ad_state, ad_city: ad_city}, function (getIDvalByNams) {
//					$.each(getIDvalByNams, function (getIDvalByNams_index, getIDvalByNams_qdt) {
					var admaincategory = getIDvalByNams.ad_maincategory;
					var adsubcategory = getIDvalByNams.ad_subcategory;
					$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getFilterGroupByOrder', grp_admaincategory: admaincategory, grp_adsubcategory: adsubcategory}, function (group) {
						$.post('bkp/controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilterByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (AllFilters) {
							$.post('bkp/controllers/adFilterSettingsController.php', {action: 'categoryComboBoxFiltersByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (comboFilters) {
								$.post('bkp/controllers/adFilterSettingsController.php', {action: 'categoryTextBoxFiltersByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (textboxFilters) {
									//LOAD All HTML
									if (AllFilters === undefined || AllFilters.length === 0 || AllFilters === null) {
										$('#ad_filter_array_status').val(0);
										$('.loadAdFilters').prop('hidden', true);
										$('.cs-sidebar').prop('hidden', true);
										$('.cs-sidebar-left').removeClass('cs-sidebar-enabled');
										$('.cs-sidebar-left').addClass('cs-sidebar-disable');
									} else {
										$('#ad_filter_array_status').val(1);
										$('.loadAdFilters').prop('hidden', false);
										$('.cs-sidebar').prop('hidden', false);
										$('.cs-sidebar-left').removeClass('cs-sidebar-disable');
										$('.cs-sidebar-left').addClass('cs-sidebar-enabled');
										adfilterHTML += '<div class="form-row mb-3">';
										adfilterHTML += '<div class="col-xl-12 col-12">';
										adfilterHTML += '<button class="btn btn-sm btn-primary btn-block btn-makefilter"><i class="fa fa-filter fa-lg"></i> Make Filter</button>';
										adfilterHTML += '<button class="btn btn-sm btn-light btn-block btn-makeRefresh"><i class="fas fa-retweet fa-lg"></i> Reload All</button>';
										adfilterHTML += '</div>';
										adfilterHTML += '</div>';
										$.each(group, function (grp_index, grp_qdt) {
											adfilterHTML += '<div class="form-row mb-3">';
											adfilterHTML += '<div class="col-xl-12 col-12">';
											adfilterHTML += '<label>' + grp_qdt.grp_name + '</label>';
											$.each(AllFilters, function (allflt_index, allflt_qdt) {
												if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
													if (parseInt(allflt_qdt.catfl_type) == 1) {
														//load Combo HTML
														$.each(comboFilters, function (cmbflt_index, cmbflt_qdt) {
															if ((parseInt(allflt_qdt.grp_id) == parseInt(cmbflt_qdt.grp_id)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(cmbflt_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(cmbflt_qdt.mcmb_id))) {
																adfilterHTML += '<div class="form-group">';
																;
																adfilterHTML += '<select class="col-12 form-control ' + cmbflt_qdt.mcmb_class + ' form-control-chosen" data-placeholder="Choose a ' + cmbflt_qdt.mcmb_name + '..." required>';
																adfilterHTML += '<option disabled selected>Loading...</option>';
																adfilterHTML += '</select>';
																adfilterHTML += '</div>';
															}
														});
													} else if (parseInt(allflt_qdt.catfl_type) == 2) {
														$.each(textboxFilters, function (txtflt_index, txtflt_qdt) {
															if ((parseInt(allflt_qdt.grp_id) == parseInt(txtflt_qdt.grp_id)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(txtflt_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(txtflt_qdt.txfl_id))) {
																adfilterHTML += '<div class="form-group">';
																adfilterHTML += '<div class="row">';
																adfilterHTML += '<div class="input-group">';
																adfilterHTML += '<input type="text" class="form-control" id="' + txtflt_qdt.txfl_id_name + '_from" placeholder="from" autocomplete="off">';
																adfilterHTML += '<input type="text" class="form-control" id="' + txtflt_qdt.txfl_id_name + '_to" placeholder="to" autocomplete="off">';
																adfilterHTML += '</div>';
																adfilterHTML += '</div>';



																adfilterHTML += '</div></div>';
															}

														});
													}
												}
											});
											adfilterHTML += '</div>';
											adfilterHTML += '</div>';
										});
										$('.loadAdFilters').html('').append(adfilterHTML);

										$('.btn-makefilter').click(function () {
											loadFilterAds();
										});
										$('.btn-makeRefresh').click(function () {
											loadAdFilters();
											loadAllAds();
										});
										//COMBO BOX DATA LOADING
										$.each(group, function (grp_index, grp_qdt) {
											$.each(AllFilters, function (allflt_index, allflt_qdt) {
												if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
													if (parseInt(allflt_qdt.catfl_type) == 1) {
														$.each(comboFilters, function (cmbflt_index, cmbflt_qdt) {
															if ((parseInt(allflt_qdt.grp_id) == parseInt(cmbflt_qdt.grp_id)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(cmbflt_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(cmbflt_qdt.mcmb_id))) {
																if (parseInt(cmbflt_qdt.mcmb_relation) == 1) {
																	//Main Combo
																	cmbRelateCombo(cmbflt_qdt.mcmb_id, '2', '.' + cmbflt_qdt.mcmb_class);
																}
																if (parseInt(cmbflt_qdt.mcmb_relation) == 2) {
																	//2nd sub combo
																	cmbRelateSubCombo(cmbflt_qdt.mcmb_id, cmbflt_qdt.firstcombofirstval, '.' + cmbflt_qdt.mcmb_class);
																	combofilter[cmbflt_qdt.mcmb_id] = cmbflt_qdt.secondcombofirstval;
																}
																if (parseInt(cmbflt_qdt.mcmb_relation) == 3) {
																	//2nd sub combo
																	cmbRelateSubCombo(cmbflt_qdt.mcmb_id, combofilter[cmbflt_qdt.mcmb_uplevelcmb_id], '.' + cmbflt_qdt.mcmb_class);
																}

															}
														});
													}
												}
											});
										});
										//COMBO BOX CHANGE EVENT
										$.each(group, function (grp_index, grp_qdt) {
											$.each(AllFilters, function (allflt_index, allflt_qdt) {
												if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
													if (parseInt(allflt_qdt.catfl_type) == 1) {
														$.each(comboFilters, function (cmbflt_index, cmbflt_qdt) {
															if ((parseInt(allflt_qdt.grp_id) == parseInt(cmbflt_qdt.grp_id)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(cmbflt_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(cmbflt_qdt.mcmb_id))) {
																if (parseInt(cmbflt_qdt.mcmb_relation) == 1) {
																	$(document).on("change", "." + cmbflt_qdt.mcmb_class, function () {
																		var combovalue = $(this).val();
																		$.each(comboFilters, function (cmbflt1_index, cmbflt1_qdt) {
																			if ((parseInt(cmbflt_qdt.grp_id) == parseInt(cmbflt1_qdt.grp_id)) && (parseInt(cmbflt_qdt.grp_disp_order) == parseInt(cmbflt1_qdt.grp_disp_order))) {
																				if (parseInt(cmbflt1_qdt.mcmb_relation) == 2) {

																					cmbRelateSubCombo(cmbflt1_qdt.mcmb_id, combovalue, '.' + cmbflt1_qdt.mcmb_class, false, function () {
																						var secoundcombovalue = $('.' + cmbflt1_qdt.mcmb_class).val();
																						$.each(comboFilters, function (cmbflt2_index, cmbflt2_qdt) {
																							if ((parseInt(cmbflt1_qdt.grp_id) == parseInt(cmbflt2_qdt.grp_id)) && (parseInt(cmbflt1_qdt.grp_disp_order) == parseInt(cmbflt2_qdt.grp_disp_order))) {
																								if (parseInt(cmbflt2_qdt.mcmb_relation) == 3) {
																									cmbRelateSubCombo(cmbflt2_qdt.mcmb_id, secoundcombovalue, '.' + cmbflt2_qdt.mcmb_class)
																								}
																							}
																						});
																					});
																				}
																			}
																		});
																	});
																} else if (parseInt(cmbflt_qdt.mcmb_relation) == 2) {
																	$(document).on("change", "." + cmbflt_qdt.mcmb_class, function () {
																		var combovalue = $(this).val();
																		$.each(comboFilters, function (cmbflt1_index, cmbflt1_qdt) {
																			if ((parseInt(cmbflt_qdt.grp_id) == parseInt(cmbflt1_qdt.grp_id)) && (parseInt(cmbflt_qdt.grp_disp_order) == parseInt(cmbflt1_qdt.grp_disp_order))) {
																				if (parseInt(cmbflt1_qdt.mcmb_relation) == 3) {
																					cmbRelateSubCombo(cmbflt1_qdt.mcmb_id, combovalue, '.' + cmbflt1_qdt.mcmb_class)
																				}
																			}
																		});
																	});
																}
															}
														});
													}
												}
											});
										});
										$('select').chosen({width: "100%"});
									}
								}, "json");
							}, "json");
						}, "json");
					}, "json");
				}, "json");
			}

			function loadAdStartInfo() {
				var maincategory = $('#mainCategory').val();
				var subcategory = $('#subCategory').val();
				var country = $('#country').val();
				var state = $('#state').val();
				var city = $('#city').val();
				$('.maincategory').html('').append(maincategory);
				$('.subcategory').html('').append(subcategory);
				$('.state').html('').append(state);
				$('.city').html('').append(city);
				$('.subcategoryname').html('').append(subcategory);
			}

			function loadFilterAds() {
				var adfilters;
				var ad_filter_array_status = $('#ad_filter_array_status').val();
				var ad_maincategory = $('#mainCategory').val();
				var ad_subcategory = $('#subCategory').val();
				var ad_country = $('#country').val();
				var ad_state = $('#state').val();
				var ad_city = $('#city').val();
				var displayAds = "";
				if (parseInt(ad_filter_array_status) != 0) {
					getFilterValues(function (filter_array) {
						$.post('bkp/controllers/advController.php', {action: 'getClassifiedAdPageIDsByName', ad_maincategory: ad_maincategory, ad_subcategory: ad_subcategory, ad_country: ad_country, ad_state: ad_state, ad_city: ad_city}, function (getIDvalByNams) {
							$.post('bkp/controllers/advController.php', {action: 'LoadAllAdsByCategories', ad_maincategory: getIDvalByNams.ad_maincategory, ad_subcategory: getIDvalByNams.ad_subcategory, ad_country: getIDvalByNams.ad_country, ad_state: getIDvalByNams.ad_state, ad_city: getIDvalByNams.ad_city}, function (allads) {
								$.post('bkp/controllers/advController.php', {action: 'madeAdFilter', ad_maincategory: getIDvalByNams.ad_maincategory, ad_subcategory: getIDvalByNams.ad_subcategory, ad_country: getIDvalByNams.ad_country, ad_state: getIDvalByNams.ad_state, ad_city: getIDvalByNams.ad_city, filter_array: filter_array}, function (madefilter) {
									$.post('bkp/controllers/advController.php', {action: 'LoadAllAdsfilters', ad_maincategory: getIDvalByNams.ad_maincategory, ad_subcategory: getIDvalByNams.ad_subcategory, ad_country: getIDvalByNams.ad_country, ad_state: getIDvalByNams.ad_state, ad_city: getIDvalByNams.ad_city}, function (LoadAllAdsfilters) {
										$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getFilterGroupByOrder', grp_admaincategory: getIDvalByNams.ad_maincategory, grp_adsubcategory: getIDvalByNams.ad_subcategory}, function (group) {
											$.post('bkp/controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilterByOrder', catfl_admaincategory: getIDvalByNams.ad_maincategory, catfl_adsubcategory: getIDvalByNams.ad_subcategory}, function (AllFilters) {
												console.log(filter_array)
												console.log(madefilter);
												console.log(allads);
												$.each(madefilter, function (madefilter_index, madefilter_qdt) {
													$.each(allads, function (allads_index, allads_qdt) {
														if (parseInt(madefilter_qdt.ad_id) == parseInt(allads_qdt.ad_id)) {
															//filternow
															displayAds += '<div class="col-xl-12 col-lg-12 col-12 mb-2">';
															displayAds += '<div class="card card-horizontal box-shadow card-hover classifiedAd-card" id="' + allads_qdt.ad_id + '">';

															if (allads_qdt.ad_pricetag_status == 1) {
																displayAds += '<span class="badge badge-lg badge-floating badge-floating-right text-white price-tag">$' + allads_qdt.ad_price + '</span>';
															}
															displayAds += '<span class="btn-adclick" id="IMGDIV-' + allads_qdt.ad_id + '">';
															if (allads_qdt.ad_img === "#") {
																displayAds += '<img class="card-img-top" src="assets/img/noimage.png">';
															} else {
																displayAds += '<img class="card-img-top" src="asset_imageuploader/advcoverimage/' + allads_qdt.ad_id + '/' + allads_qdt.ad_img + '">';
															}
															displayAds += '</span>';
															displayAds += '<div class="card-body">';
															displayAds += '<div class="row">';
															displayAds += '<div class="col-xl-10 col-12">';
															displayAds += '<span class="btn-adclick" id="INFOADDIV-' + allads_qdt.ad_id + '">';
															displayAds += '<h5 class="card-title">' + allads_qdt.ad_title + ' </h5>';
															displayAds += '<p class="card-text font-size-sm">' + allads_qdt.ad_shortdesc + '<br>';
															displayAds += '<span class="d-none d-sm-block d-md-block">';
															$.each(group, function (grp_index, grp_qdt) {
																displayAds += '<span class="badge badge-dark mb-1">';
																displayAds += '<strong class="bg-gradient px-2">' + grp_qdt.grp_name + '</strong> ';
																$.each(AllFilters, function (allflt_index, allflt_qdt) {
																	if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
																		if (parseInt(allflt_qdt.catfl_type) == 1) {
																			$.each(LoadAllAdsfilters, function (filter_index, filter_qdt) {
																				if ((parseInt(allflt_qdt.grp_id) == parseInt(filter_qdt.grinf_group)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(filter_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
																					if ((parseInt(allads_qdt.ad_id) == parseInt(filter_qdt.ad_id)) && (parseInt(filter_qdt.adflt_type) == 1) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
																						displayAds += filter_qdt.valuename + " | ";
																					}
																				}
																			});
																		}
																		if (parseInt(allflt_qdt.catfl_type) == 2) {
																			$.each(LoadAllAdsfilters, function (filter_index, filter_qdt) {
																				if ((parseInt(allads_qdt.ad_id) == parseInt(filter_qdt.ad_id)) && (parseInt(filter_qdt.adflt_type) == 2) && (parseInt(allflt_qdt.catfl_filter) == parseInt(filter_qdt.adflt_filter))) {
																					displayAds += filter_qdt.adflt_value + " | ";
																				}

																			});
																		}
																	}
																});
																displayAds += '</span>';
															});
															displayAds += '</span>';
															displayAds += '</p>';
															displayAds += '</span>';
															displayAds += '</div>';
															displayAds += '<div class="col-xl-2 col-12 text-right pt-5">';
															displayAds += '<button class="btn-addtowishlist btn btn-translucent-light btn-sm" value="' + allads_qdt.ad_id + '"><i class="far fa-heart fa-lg"></i></button>';
															displayAds += '</div>';
															displayAds += '</div>';
															displayAds += '</div>';
															displayAds += '</div>';
															displayAds += '</div>';
														}

													});
												});
												if (displayAds !== "") {
													$('.loadads').html('').append(displayAds);
												} else {
													$('.loadads').html('').append('<div class="alert bg-info text-white font-size-xl w-100 text-center">No Ads Available</div>');
												}

												$('.btn-adclick').click(function (event) {
													event.preventDefault();
													var ad_id_str = $(this).prop('id');
													var ad_id_arr = ad_id_str.split('-');
													window.location.href = 'ad-info.php?ad_id=' + ad_id_arr[1];
												});

												$('.btn-addtowishlist').click(function (event) {
													event.preventDefault();
													var ad_id = $(this).val();
													var postdata = {
														action: "saveWishlist",
														wish_object: ad_id,
														wish_type: 1,
													}
													$.post('bkp/controllers/ubWishlistController.php', postdata, function (e) {
														shoppingCartNotification();
														Swal.fire({
															position: 'top-left',
															html: e.msg,
															showConfirmButton: false,
															showCancelButton: false,
															timer: 1500,
														});
													}, "json");
												});
											}, "json");
										}, "json");
									}, "json");
								}, "json");
							}, "json");
						}, "json");
					});
				}
			}

			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				loadAdStartInfo();
				loadAdFilters();
				loadAllAds();

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

			});
        </script>
	</body>
</html>