<?php include './access_control/auth.php'; ?> 
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
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
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center mb-4">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Update Media</a></li> 
								</ol>
							</nav>
							<h1 class="text-capitalize"> <i class="fas fa-lg fa-ad"></i> Update Your Ad | <span class="badge badge-secondary">Upload Media</span></h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<form class="form-ad">
							<div class="row">
								<div class="col-xl-6 col-12 mb-3">
									<h5 class="font-weight-bolder">Ad Slider Images</h5>
									<p class="font-weight-light">Include pictures with different angles and details. You can upload a maximum of 5 photos, that are at least 300px wide or tall (we recommend at least 1000px).</p>
									<iframe class="iframe" id="iframe_advSliderImage" height="600px" scrolling="no"></iframe>
								</div>
								<div class="col-xl-6 col-12 col-12">
									<div class="mb-3">
										<h5 class="font-weight-bolder">Ad Cover Image</h5>
										<iframe id="iframe_advCoverImage" scrolling="no"></iframe>

									</div>
									<div class="mb-3 text-center">
										<label class="form-label">Increase your ad exposure. Enter up to 5 keywords someone could search to find your ad.</label>
										<div class="input-group">
											<input type="text" class="form-control" id="tg_tag" placeholder="Tags" autocomplete="off">
											<button class="btn btn-sm btn-outline-success text-right" id="btn-addtag">Add Tag</button>
										</div>
										<span class="displaytags mt-3"></span>										
									</div>
									<div class="mb-3 text-center">	
										<button class="btn btn-warning" id="btn-continue"><i class="fas fa-chevron-right"></i> Complete</button>											
										<button class="btn btn-outline-secondary" id="btn-backtostart"><i class="fas fa-chevron-left"></i> Back</button>							
									</div>
								</div>									
							</div>												
						</form>
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

			function updateAdvFinalStep() {
				var ad_id = $('#ad_id').val();
				var postdata = {
					action: "updateAdvFinalStep",
					ad_id: ad_id
				}
				$.post('bkp/controllers/advController.php', postdata, function (e) {
					if (parseInt(e.msgType) == 1) {
						swal({
							title: "Update your ad!",
							text: e.msg,
							type: "success",
							confirmButtonClass: "btn btn-light",
							confirmButtonText: "OK",
							closeOnConfirm: true
						}, function () {
							window.location.href = "dashboard.php";
						});
					} else {
						swal("Post your ad !", e.msg, "error");
					}
				}, "json");
			}

			function tagsByAdID() {
				var tg_ad_id = $('#ad_id').val();
				var tbldata = "";
				$.post('bkp/controllers/advController.php', {action: 'tagsByAdID', tg_ad_id: tg_ad_id}, function (e) {
					if (e !== undefined || e.length !== 0 || e !== null) {
						$.each(e, function (index, qdt) {
							index++;
							tbldata += '<span class="badge badge-dark m-1 pl-3 py-0">' + qdt.tg_tag + ' <button class="btn btn-sm btn-deleteTag" value="' + qdt.tg_id + '"><i class="fas fa-times"></i></button></span>';
						});

						$('.displaytags').html('').append(tbldata);

						$('.btn-deleteTag').click(function () {
							const form = $('.form-ad');
							form.submit(false);
							var tg_id = $(this).val();
							$.post('bkp/controllers/advController.php', {action: 'deleteTag', tg_id: tg_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									tagsByAdID();
								} else {
									swal("Error!", e.msg, "error");
								}
							}, "json");

						});
					}
				}, "json");
			}

			function saveTag() {
				var tg_tag = $('#tg_tag').val();
				var tg_ad_id = $('#ad_id').val();
				var postdata = {
					action: "saveTag",
					tg_ad_id: tg_ad_id,
					tg_tag: tg_tag
				}
				$.post('bkp/controllers/advController.php', postdata, function (e) {
					if (parseInt(e.msgType) == 1) {
						tagsByAdID();
						$('#tg_tag').val('');
					} else {
						swal("TAG", e.msg, "error");
					}
				}, "json");

			}


			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				$("#iframe_advCoverImage").attr("src", "adv-cover-image.php?ad_id=" + $('#ad_id').val());
				$("#iframe_advSliderImage").attr("src", "adv-slider-images.php?ad_id=" + $('#ad_id').val());
				tagsByAdID();


				const form = $('.form-ad');

				$('#btn-continue').click(function (event) {
					form.submit(false);
					updateAdvFinalStep();
				});

				$('#btn-addtag').click(function (event) {
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						saveTag();
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
			});
        </script>		
	</body>
</html>