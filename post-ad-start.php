<?php include './access_control/auth.php'; ?> 
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="cmbAdMainCategory_bkv" value="<?php
		if (isset($_REQUEST['mc'])) {
			echo $_REQUEST['mc'];
		} else {
			echo "";
		}
		?>"/>
		<input type="hidden" id="cmbAdSubCategory_bkv" value="<?php
		if (isset($_REQUEST['sc'])) {
			echo $_REQUEST['sc'];
		} else {
			echo "";
		}
		?>"/>
		<input type="hidden" id="ad_title_bkv" value="<?php
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
									<li class="breadcrumb-item"><a href="#">Post ad</a>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-lg fa-ad"></i> Post your ad | <span class="badge badge-secondary">Start</span></h1>	
							<h1 class="ad_title"></h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-6 col-12">
							<form class="form-ad mb-3">

								<div class="col mb-3">    
									<label class="form-label">Ad title</label>
									<input type="text" class="form-control" id="ad_title" placeholder="Ad title" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter your ad title
									</div>
								</div>								


								<h5>List your ad under</h5>
								<div class="col mb-3">   
									<label class="form-label">Main Category</label>
									<select class="col-12 form-control cmbAdMainCategory form-control-chosen" data-placeholder="Choose main product/service category..." required>
										<option disabled selected>Loading...</option>
									</select>										
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please choose main product/service category...
									</div>
								</div>								
								<div class="col mb-3">   
									<label class="form-label">Sub Category</label>
									<select class="col-12 form-control cmbAdSubCategory form-control-chosen" data-placeholder="Choose sub product/service category..." required>
										<option disabled selected>Loading...</option>
									</select>										
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please choose sub product/service category...
									</div>
								</div>
								<div class="col text-center mb-3">									
									<button class="btn btn-translucent-dark" id="btn-continue"><i class="fas fa-chevron-right"></i> Next</button>											
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
			function ComboLoading() {
				var cmbAdMainCategory = $('#cmbAdMainCategory_bkv').val();
				var cmbAdSubCategory = $('#cmbAdSubCategory_bkv').val();
				var ad_title = $('#ad_title_bkv').val();
				if (ad_title !== "") {
					$('#ad_title').val(ad_title);
				}
				if (cmbAdMainCategory !== "" && cmbAdSubCategory !== "") {
					cmbRelateCombo('94', '2', '.cmbAdMainCategory', cmbAdMainCategory);
					cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory', cmbAdSubCategory);
				} else {
					cmbRelateCombo('94', '2', '.cmbAdMainCategory', false, function () {
						var cmbAdMainCategory = $('.cmbAdMainCategory').val();
						cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory');
					});
				}
			}

			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				checkMembershipIsActive(1);
				ComboLoading();

				$('.cmbAdMainCategory').change(function () {
					var cmbAdMainCategory = $(this).val();
					cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory');
				});

				const form = $('.form-ad');


				$('#btn-continue').click(function (event) {
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						var cmbAdMainCategory = $('.cmbAdMainCategory').val();
						var cmbAdMainCategoryText = $('.cmbAdMainCategory option:selected').text();
						var cmbAdSubCategory = $('.cmbAdSubCategory').val();
						var cmbAdSubCategoryText = $('.cmbAdSubCategory option:selected').text();
						var ad_title = $('#ad_title').val();
						var form_hiddensubmit = $('<form action="post-ad-mid.php" method="post">' +
								'<input type="text" name="tl" value="' + ad_title + '" />' +
								'<input type="text" name="mc" value="' + cmbAdMainCategory + '" />' +
								'<input type="text" name="mc_txt" value="' + cmbAdMainCategoryText + '" />' +
								'<input type="text" name="sc" value="' + cmbAdSubCategory + '" />' +
								'<input type="text" name="sc_txt" value="' + cmbAdSubCategoryText + '" />' +
								'</form>');
						$('body').append(form_hiddensubmit);
						form_hiddensubmit.submit();
						form.removeClass('was-validated');
					}
				});

			});
        </script>
	</body>
</html>

