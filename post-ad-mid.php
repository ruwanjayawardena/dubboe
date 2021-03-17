<?php include './access_control/auth.php'; ?> 
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="cmbAdMainCategory" value="<?php
		if (isset($_REQUEST['mc'])) {
			echo $_REQUEST['mc'];
		} else {
			echo "";
		}
		?>"/>
		<input type="hidden" id="cmbAdMainCategoryText" value="<?php
		if (isset($_REQUEST['mc_txt'])) {
			echo $_REQUEST['mc_txt'];
		} else {
			echo "";
		}
		?>"/>
		<input type="hidden" id="cmbAdSubCategory" value="<?php
		if (isset($_REQUEST['sc'])) {
			echo $_REQUEST['sc'];
		} else {
			echo "";
		}
		?>"/>
		<input type="hidden" id="cmbAdSubCategoryText" value="<?php
		if (isset($_REQUEST['sc_txt'])) {
			echo $_REQUEST['sc_txt'];
		} else {
			echo "";
		}
		?>"/>
		<input type="hidden" id="ad_title" value="<?php
		if (isset($_REQUEST['tl'])) {
			echo $_REQUEST['tl'];
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
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Post Your Ad</a></li> 
									<li class="breadcrumb-item"><a href="#"><span class="cmbAdMainCategoryText"></span></a></li>                
									<li class="breadcrumb-item"><a href="#"><span class="cmbAdSubCategoryText"></span></a></li> 
									<li class="breadcrumb-item"><a href="#"><span class="ad_title"></span></a></li> 
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-lg fa-ad"></i> <span class="ad_title"></span> | <span class="badge badge-secondary">Ad Details</span></h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<input type="hidden" class="form-control" id="ad_filter_array_status">
						<div class="col-xl-12 col-lg-12 col-12">
							<form class="form-ad">
								<div class="row justify-content-center">
									<div class="col-xl-6 col-lg-6 col-12 defaultFormControllers">
										<div class="row">												
											<div class="col mb-2">  
												<label class="font-weight-bold pb-2">Choose Location</label>
												<div class="mb-3" hidden>  
													<label class="form-label">Country</label>
													<select class="form-control cmbCountry form-control-chosen" data-placeholder="Choose a Country..." required>
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
													<select class="form-control cmbState form-control-chosen" data-placeholder="Choose a State..." required>
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
													<select class="form-control cmbCity form-control-chosen" data-placeholder="Choose a city..." required>
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
										</div>
										<div class="row">
											<div class="col-12 mb-3">
												<label class="form-label">Short Description</label>
												<textarea class="form-control summernote" id="ad_shortdesc" placeholder="Short description about your Ad" required></textarea>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter short description about your Ad
												</div>
											</div>
											<div class="col-12 mb-3">
												<label class="form-label">Detail Description</label>
												<textarea rows="5" class="form-control summernote" id="ad_longdesc" placeholder="Detail description about your Ad" required></textarea>	
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter detail description about your Ad
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-5 mb-3">
												<label>Price Tag</label>
												<div class="form-check">
													<input class="form-check-input ad_pricetag_status" type="radio" name="ad_pricetag_status" value="0" checked>
													<label class="form-check-label">
														Hide
													</label>
												</div>
												<div class="form-check">
													<input class="form-check-input ad_pricetag_status" type="radio" name="ad_pricetag_status" value="1">
													<label class="form-check-label">
														Show
													</label>
												</div>															
											</div>
											<div class="col-7 mb-3 pricetxtbox invisible"> 
												<label class="form-label">Price</label>
												<input type="text" class="form-control" id="ad_price" placeholder="Price" autocomplete="off" value="0.00" required>													
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please choose price
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-12 loadAdFilters">

									</div>
								</div>
								<div class="row justify-content-center mt-2">
									<div class="col-xl-12 col-12 text-center">
										<button class="btn btn-translucent-dark" id="btn-continue"><i class="fas fa-chevron-right"></i> Save & Next</button>		
																		
										<button class="btn btn-outline-secondary" id="btn-backtostart"><i class="fas fa-chevron-left"></i> Back</button>									
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
			function getFilterValues(callback) {
				var admaincategory = $('#cmbAdMainCategory').val();
				var adsubcategory = $('#cmbAdSubCategory').val();
				var combovaluefilter = [];
				$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getFilterGroupByOrder', grp_admaincategory: admaincategory, grp_adsubcategory: adsubcategory}, function (group) {
					$.post('bkp/controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilterByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (AllFilters) {
						$.post('bkp/controllers/adFilterSettingsController.php', {action: 'categoryComboBoxFiltersByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (comboFilters) {
							$.post('bkp/controllers/adFilterSettingsController.php', {action: 'categoryTextBoxFiltersByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (textboxFilters) {
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
														combovaluefilter[txtflt_qdt.txfl_id] = {filter_type: 2, filter_value: $('#' + txtflt_qdt.txfl_id_name).val()};
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
			}


			function loadAdFilters() {
				var admaincategory = $('#cmbAdMainCategory').val();
				var adsubcategory = $('#cmbAdSubCategory').val();
				var adfilterHTML = "";
				var combofilter = [];
				$.post('bkp/controllers/adFilterSettingsController.php', {action: 'getFilterGroupByOrder', grp_admaincategory: admaincategory, grp_adsubcategory: adsubcategory}, function (group) {
					$.post('bkp/controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilterByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (AllFilters) {
						$.post('bkp/controllers/adFilterSettingsController.php', {action: 'categoryComboBoxFiltersByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (comboFilters) {
							$.post('bkp/controllers/adFilterSettingsController.php', {action: 'categoryTextBoxFiltersByOrder', catfl_admaincategory: admaincategory, catfl_adsubcategory: adsubcategory}, function (textboxFilters) {
								//LOAD All HTML
								if (AllFilters === undefined || AllFilters.length === 0 || AllFilters === null) {
									$('#ad_filter_array_status').val(0);
									$('.loadAdFilters').prop('hidden', true);
								} else {
									$('#ad_filter_array_status').val(1);
									$('.loadAdFilters').prop('hidden', false);
									$.each(group, function (grp_index, grp_qdt) {
										adfilterHTML += '<div class="row">';										
										adfilterHTML += '<div class="col mb-2">';
										adfilterHTML += '<label class="font-weight-bold pb-2">' + grp_qdt.grp_name + '</label>';
										$.each(AllFilters, function (allflt_index, allflt_qdt) {
											if ((parseInt(grp_qdt.grp_id) == parseInt(allflt_qdt.grp_id) && (parseInt(grp_qdt.grp_disp_order) == parseInt(allflt_qdt.grp_disp_order)))) {
												if (parseInt(allflt_qdt.catfl_type) == 1) {
													//load Combo HTML
													$.each(comboFilters, function (cmbflt_index, cmbflt_qdt) {
														if ((parseInt(allflt_qdt.grp_id) == parseInt(cmbflt_qdt.grp_id)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(cmbflt_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(cmbflt_qdt.mcmb_id))) {
															adfilterHTML += '<div class="mb-3">';
															adfilterHTML += '<label class="form-label">' + cmbflt_qdt.mcmb_name + '</label>';
															adfilterHTML += '<select class="col-12 form-control ' + cmbflt_qdt.mcmb_class + ' form-control-chosen" data-placeholder="Choose a ' + cmbflt_qdt.mcmb_name + '..." required>';
															adfilterHTML += '<option disabled selected>Loading...</option>';
															adfilterHTML += '</select>';
															adfilterHTML += '<div class="valid-feedback">';
															adfilterHTML += '<i class="fas fa-lg fa-check-circle"></i> Looks good!';
															adfilterHTML += '</div>';
															adfilterHTML += '<div class="invalid-feedback">';
															adfilterHTML += '<i class="fas fa-lg fa-exclamation-circle"></i> Please choose ' + cmbflt_qdt.mcmb_name;
															adfilterHTML += '</div>';
															adfilterHTML += '</div>';
														}
													});
												} else if (parseInt(allflt_qdt.catfl_type) == 2) {
													$.each(textboxFilters, function (txtflt_index, txtflt_qdt) {
														if ((parseInt(allflt_qdt.grp_id) == parseInt(txtflt_qdt.grp_id)) && (parseInt(allflt_qdt.grp_disp_order) == parseInt(txtflt_qdt.grp_disp_order)) && (parseInt(allflt_qdt.catfl_filter) == parseInt(txtflt_qdt.txfl_id))) {
															adfilterHTML += '<div class="mb-3">';
															adfilterHTML += '<label class="form-label">' + txtflt_qdt.txfl_name + '</label>';
															adfilterHTML += '<input type="text" class="form-control" id="' + txtflt_qdt.txfl_id_name + '" placeholder="' + txtflt_qdt.txfl_name + '" autocomplete="off" required>';
															adfilterHTML += '</div>';
															adfilterHTML += '<div class="valid-feedback">';
															adfilterHTML += '<i class="fas fa-lg fa-check-circle"></i> Looks good!';
															adfilterHTML += '</div>';
															adfilterHTML += '<div class="invalid-feedback">';
															adfilterHTML += '<i class="fas fa-lg fa-exclamation-circle"></i> Please choose ' + txtflt_qdt.txfl_name;
															adfilterHTML += '</div>';
															adfilterHTML += '</div>';
														}

													});
												}
											}
										});
										adfilterHTML += '</div>';
										adfilterHTML += '</div>';
									});
									$('.loadAdFilters').html('').append(adfilterHTML);
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
			}

			function loadAdStartInfo() {
				var cmbAdMainCategoryText = $('#cmbAdMainCategoryText').val();
				var cmbAdSubCategoryText = $('#cmbAdSubCategoryText').val();
				var ad_title = $('#ad_title').val();
				$('.cmbAdMainCategoryText').html('').append(cmbAdMainCategoryText);
				$('.cmbAdSubCategoryText').html('').append(cmbAdSubCategoryText);
				$('.ad_title').html('').append(ad_title);
			}

			function saveAdv() {
				var ad_filter_array_status = $('#ad_filter_array_status').val();
				if (parseInt(ad_filter_array_status) == 0) {
					var filter_array = [];
					var ad_title = $('#ad_title').val();
					var ad_maincategory = $('#cmbAdMainCategory').val();
					var ad_subcategory = $('#cmbAdSubCategory').val();
					var ad_country = $('.cmbCountry').val();
					var ad_state = $('.cmbState').val();
					var ad_city = $('.cmbCity').val();
					var ad_shortdesc = $('#ad_shortdesc').val();
					var ad_longdesc = $('#ad_longdesc').val();
					var ad_price = $('#ad_price').val();
					var ad_pricetag_status = $('.ad_pricetag_status:checked').val();
					var postdata = {
						action: "saveAdv",
						ad_title: ad_title,
						ad_maincategory: ad_maincategory,
						ad_subcategory: ad_subcategory,
						ad_country: ad_country,
						ad_state: ad_state,
						ad_city: ad_city,
						ad_shortdesc: ad_shortdesc,
						ad_longdesc: ad_longdesc,
						ad_price: ad_price,
						ad_pricetag_status: ad_pricetag_status,
						filter_array: filter_array,
						ad_filter_array_status: ad_filter_array_status
					}
					$.post('bkp/controllers/advController.php', postdata, function (e) {
						if (parseInt(e.msgType) == 1) {
							swal({
								title: "Post your ad!",
								text: e.msg,
								type: "success",
								confirmButtonText: "OK",
								closeOnConfirm: true
							}, function () {
								var cmbAdMainCategoryText = $('#cmbAdMainCategoryText').val();
								var cmbAdSubCategoryText = $('#cmbAdSubCategoryText').val();
								var ad_title = $('#ad_title').val();
								var form_hiddensubmit = $('<form action="post-ad-end.php" method="post">' +
										'<input type="text" name="ad_id" value="' + e.ad_id + '" />' +
										'<input type="text" name="tl" value="' + ad_title + '" />' +
										'<input type="text" name="mc_txt" value="' + cmbAdMainCategoryText + '" />' +
										'<input type="text" name="sc_txt" value="' + cmbAdSubCategoryText + '" />' +
										'</form>');
								$('body').append(form_hiddensubmit);
								form_hiddensubmit.submit();
							});
						} else {
							swal("Post your ad !", e.msg, "error");
						}
					}, "json");
				} else {
					getFilterValues(function (filter_array) {
						var ad_title = $('#ad_title').val();
						var ad_maincategory = $('#cmbAdMainCategory').val();
						var ad_subcategory = $('#cmbAdSubCategory').val();
						var ad_country = $('.cmbCountry').val();
						var ad_state = $('.cmbState').val();
						var ad_city = $('.cmbCity').val();
						var ad_shortdesc = $('#ad_shortdesc').val();
						var ad_longdesc = $('#ad_longdesc').val();
						var ad_price = $('#ad_price').val();
						var ad_pricetag_status = $('.ad_pricetag_status:checked').val();
						var postdata = {
							action: "saveAdv",
							ad_title: ad_title,
							ad_maincategory: ad_maincategory,
							ad_subcategory: ad_subcategory,
							ad_country: ad_country,
							ad_state: ad_state,
							ad_city: ad_city,
							ad_shortdesc: ad_shortdesc,
							ad_longdesc: ad_longdesc,
							ad_price: ad_price,
							ad_pricetag_status: ad_pricetag_status,
							filter_array: filter_array,
							ad_filter_array_status: ad_filter_array_status
						}
						$.post('bkp/controllers/advController.php', postdata, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal({
									title: "Post your ad!",
									text: e.msg,
									type: "success",
									confirmButtonClass: "btn btn-light",
									confirmButtonText: "OK",
									closeOnConfirm: true
								}, function () {
									var cmbAdMainCategoryText = $('#cmbAdMainCategoryText').val();
									var cmbAdSubCategoryText = $('#cmbAdSubCategoryText').val();
									var ad_title = $('#ad_title').val();
									var form_hiddensubmit = $('<form action="post-ad-end.php" method="post">' +
											'<input type="text" name="ad_id" value="' + e.ad_id + '" />' +
											'<input type="text" name="tl" value="' + ad_title + '" />' +
											'<input type="text" name="mc_txt" value="' + cmbAdMainCategoryText + '" />' +
											'<input type="text" name="sc_txt" value="' + cmbAdSubCategoryText + '" />' +
											'</form>');
									$('body').append(form_hiddensubmit);
									form_hiddensubmit.submit();
								});
							} else {
								swal("Post your ad !", e.msg, "error");
							}
						}, "json");
					});
				}
			}


			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				loadAdStartInfo();
				loadAdFilters();

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
				const form = $('.form-ad');

				$('.ad_pricetag_status').click(function () {
					var option = $(this).val();
					if (option == 1) {
						$('.pricetxtbox').removeClass('invisible');
						$('.pricetxtbox').addClass('visible');
					} else {
						$('.pricetxtbox').addClass('invisible');
						$('.pricetxtbox').removeClass('visible');
					}

				})

				$('#btn-continue').click(function (event) {
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						saveAdv();
						form.removeClass('was-validated');
					}
				});

				$('#btn-backtostart').click(function (event) {
					form.submit(false);
					var cmbAdMainCategory = $('#cmbAdMainCategory').val();
					var cmbAdSubCategory = $('#cmbAdSubCategory').val();
					var ad_title = $('#ad_title').val();
					var form_hiddensubmit = $('<form action="post-ad-start.php" method="post">' +
							'<input type="text" name="tl" value="' + ad_title + '" />' +
							'<input type="text" name="mc" value="' + cmbAdMainCategory + '" />' +
							'<input type="text" name="sc" value="' + cmbAdSubCategory + '" />' +
							'</form>');
					$('body').append(form_hiddensubmit);
					form_hiddensubmit.submit();
					form.removeClass('was-validated');
				});
			}
			);
        </script>		
	</body>
</html>