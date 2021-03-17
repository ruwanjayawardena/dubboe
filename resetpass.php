<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="usr_id" value="<?php
		if (isset($_REQUEST)) {
			echo $_REQUEST['usr_id'];
		}
		?>"/>
		<input type="hidden" id="usr_autoresetpass" value="<?php
		if (isset($_REQUEST)) {
			echo $_REQUEST['usr_autoresetpass'];
		}
		?>"/>
		<div class="container">							

		</div>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center mb-4">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i>  Home</a></li>
									<li class="breadcrumb-item"><a href="#">Reset Password</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"> Reset Your Password</h1>
						</div>
					</div>
					<div class="row">                    
						<div class="col-6"> 
							<form class="form-signin">
								<div class="mb-3">
									<label class="form-label">New Password</label>
									<input type="text" class="form-control" id="usr_change_pass" placeholder="New Password" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please provide valid password
									</div>
								</div>
								<div class="mb-3">
									<label class="form-label">Confirm Password</label>
									<input type="password" class="form-control" id="usr_pass_confirm_recovery" placeholder="Confirm Password" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please provide valid confirm password
									</div>									
								</div>				

								<div class="mb-3">
									<button class="btn btn-secondary" id="btn-changePass">Reset Password</button>

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

			function resetPassword() {
				var usr_autoresetpass = $('#usr_autoresetpass').val();
				var usr_id = $('#usr_id').val();
				var usr_change_pass = $('#usr_change_pass').val();
				var usr_pass_confirm_recovery = $('#usr_pass_confirm_recovery').val();
				if (usr_change_pass === usr_pass_confirm_recovery) {
					var postdata = {
						action: "resetPassword",
						usr_id: usr_id,
						usr_autoresetpass: usr_autoresetpass,
						usr_pass: usr_change_pass
					}
					$.post('bkp/controllers/userController.php', postdata, function (e) {
						if (parseInt(e.msgType) == 1) {
							$.post('bkp/controllers/userController.php', {action: "autosignin", usr_id: usr_id}, function (ex) {
								if (parseInt(ex) == 1) {
									swal({
										title: "Congratulation !",
										text: e.msg,
										timer: 2600,
										showConfirmButton: false
									});
									setTimeout(function () {
										window.location.href = './index.php';
									}, 2800);
								} else {
									swal({
										title: "Congratulation !",
										text: e.msg + "<p> But auto log in failed !</p><p>Please log in manually</p>",
										type: "success",
										html: true
									});
								}
							});
						} else {
							swal("Error !", e.msg, "error");
						}
					}, "json");
				} else {
					swal("Alert !", "The password does not match. Please check your password", "warning");
				}
			}

			$(document).ready(function () {

				const form = $('.form-signin');

				$('#btn-changePass').click(function (event) {
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						resetPassword();
					}
				});

			});


        </script>
	</body>
</html>