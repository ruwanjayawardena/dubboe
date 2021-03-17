<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>        

        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-users"></i> Configure ad filters &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
				<section>
					<div class="row justify-content-center">
						<div class="col-lg-3 col-12">							
							<div class="form-group">
								<label for="cmbAdcategory">Choose Ad Category</label>
								<div class="col-xl-12 col-lg-12 col-6">
									<select class="col-12 form-control cmbAdMainCategory" data-placeholder="Choose main product/service category..." required>
										<option disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please select ad category
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-6 mt-2">
									<select class="col-12 form-control cmbAdSubCategory" data-placeholder="Choose sub product/service category..." required>
										<option disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please select ad category
									</div>
								</div>

							</div>
						</div>
						<div class="col-lg-9 col-12 tblAdcatPageFilter">

						</div>
					</div>
				</section>				
            </div>
        </div>
    </section>
	<?php
	include './includes/end-block.php';
	include './includes/comboboxJS.php';
	include './includes/commonJS.php';
	?> 
	<script>

		function tblAdcatPageFilter(catfl_admaincategory, catfl_adsubcategory, callback) {
			var tbldata = "";
			$.post('controllers/adFilterSettingsController.php', {action: 'categoryComboBoxFiltersByOrder', catfl_admaincategory: catfl_admaincategory, catfl_adsubcategory: catfl_adsubcategory}, function (allfilters) {

				if (allfilters === undefined || allfilters.length === 0 || allfilters === null) {
					tbldata += '<div class="bg-danger text-center p-4"> -- Page Filters not available -- </div>';
				} else {
					$.each(allfilters, function (index, qdt) {
						index++;
						tbldata += '<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">';
						if (parseInt(qdt.mcmb_relation) == 1) {
							//no relation
							tbldata += '<a target="_blank" href="relatecmb.php?MC=' + qdt.mcmb_id + '" class="text-decoration-none">';
						} 
						if (parseInt(qdt.mcmb_relation) == 0) {
							//no relation
							tbldata += '<a target="_blank" href="relatecmb.php?MC=' + qdt.mcmb_id + '" class="text-decoration-none">';
						} 
//						if (parseInt(qdt.mcmb_relation) == 1) {
//							//no relation
//							tbldata += '<a href="subcmb.php?MC=' + qdt.mcmb_id + '&RL=1" class="text-decoration-none">';
//						} 
//						if (parseInt(qdt.mcmb_relation) == 1) {
//							//1st relation
//							tbldata += '<a href="relatecmb.php?MC=' + qdt.catfl_filter + '" class="text-decoration-none">';
//						}
						if (parseInt(qdt.mcmb_relation) == 2) {
							//2st relation
							tbldata += '<a target="_blank" href="relatesubcmb.php?MC=' + qdt.mcmb_id + '&RC=' + qdt.mcmb_uplevelcmb_id + '&RL=2" class="text-decoration-none">';

						} 
						if (parseInt(qdt.mcmb_relation) == 3) {
							//3st relation
							tbldata += '<a target="_blank" href="relatesubcmb.php?MC=' + qdt.mcmb_id + '&RC=' + qdt.mcmb_uplevelcmb_id + '&RL=3" class="text-decoration-none">';
						}
						tbldata += '<div class="card text-white bg-primary">';
						tbldata += '<div class="card-header text-center d-none d-sm-block"><i class="fas fa-plus-square fa-4x"></i></div>';
						tbldata += '<div class="card-body text-center">';
						tbldata += '<h5 class="card-title"><i class="fas fa-plus-square fa-lg"></i> ' + qdt.mcmb_name + '</h5>';
						tbldata += '</div>';
						tbldata += '</div>';
						tbldata += '</a>';
						tbldata += '</div>';
					});
				}
				$('.tblAdcatPageFilter').html('').append(tbldata);
				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}, "json");

		}

		function AdComboLoader() {
			var data = "";
			$.post('controllers/kn_advController.php', {action: 'cmbAdcategory'}, function (e) {
				$.post('controllers/kn_advController.php', {action: 'loadAllAdCMBFilters'}, function (esub) {
					if (e !== undefined || e.length !== 0) {
						$.each(e, function (index, qdt) {
							data += '<div class="row justify-content-center mt-4">';
							data += '<div class="col">';
							data += '<h4>' + qdt.adcat_name + '</h4>';
							data += '</div>';
							data += '</div>';
							data += '<div class="row justify-content-center">';
							$.each(esub, function (index_esub, qdt_esub) {
								if (qdt_esub.adcat_id == qdt.adcat_id) {
									data += '<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">';
									if (parseInt(qdt_esub.mcmb_relation) == 0) {
										//no relation
										data += '<a target="_blank" href="subcmb.php?MC=' + qdt_esub.catfl_filter + '&RC=0&RL=1" class="text-decoration-none">';
									} else if (parseInt(qdt_esub.mcmb_relation) == 1) {
										//1st relation
										data += '<a target="_blank" href="relatecmb.php?MC=' + qdt_esub.catfl_filter + '" class="text-decoration-none">';
									} else if (parseInt(qdt_esub.mcmb_relation) == 2) {
										//2st relation
										data += '<a target="_blank" href="relatesubcmb.php?MC=' + qdt_esub.catfl_filter + '&RC=' + qdt_esub.mcmb_uplevelcmb_id + '&RL=2" class="text-decoration-none">';

									} else if (parseInt(qdt_esub.mcmb_relation) == 3) {
										//3st relation
										data += '<a href="relatesubcmb.php?MC=' + qdt_esub.catfl_filter + '&RC=' + qdt_esub.mcmb_uplevelcmb_id + '&RL=3" class="text-decoration-none">';
									}
									data += '<div class="card text-white bg-primary">';
									data += '<div class="card-header text-center d-none d-sm-block"><i class="fas fa-plus-square fa-4x"></i></div>';
									data += '<div class="card-body text-center">';
									data += '<h5 class="card-title"><i class="fas fa-plus-square fa-lg"></i> ' + qdt_esub.mcmb_name + '</h5>';
									data += '</div>';
									data += '</div>';
									data += '</a>';
									data += '</div>';
								}
							});
							data += '</div>';
						});
						$('.AdComboLoader').html('').append(data);
					} else {
						$('.AdComboLoader').html('').append('NO Filters Available');
					}
				}, "json");
			}, "json");
		}


		$(document).ready(function () {
			cmbRelateCombo('94', '2', '.cmbAdMainCategory', false, function () {
				var cmbAdMainCategory = $('.cmbAdMainCategory').val();
				cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory', false, function () {
					var cmbAdSubCategory = $('.cmbAdSubCategory').val();
					tblAdcatPageFilter(cmbAdMainCategory, cmbAdSubCategory);
				});
			});

			$('.cmbAdMainCategory').change(function () {
				var cmbAdMainCategory = $(this).val();
				cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory', false, function () {
					var cmbAdSubCategory = $('.cmbAdSubCategory').val();
					tblAdcatPageFilter(cmbAdMainCategory, cmbAdSubCategory);
				});
			});
			$('.cmbAdSubCategory').change(function () {
				var cmbAdMainCategory = $('.cmbAdMainCategory').val();
				var cmbAdSubCategory = $(this).val();
				tblAdcatPageFilter(cmbAdMainCategory, cmbAdSubCategory);
			});

//			AdComboLoader();

		});

	</script>	
</body>
</html>