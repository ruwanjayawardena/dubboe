<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>
        <style>
            body {
                position: relative;
            }

            iframe#iframe_websitelogo{
                height: 400px;
                border: 0;
                width: 50%;
                overflow: hidden;
            }

            iframe#iframe_slider{
                height: 400px;
                width: 100%;
                border: 0;
            }

            iframe.iframe_sec1{
                height: 200px;
                width: 100%;
                border: 0;
            }
        </style>
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>        

        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-funnel-dollar"></i> PayPal Payment API Setup  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a>&nbsp;<button class="btn btn-outline-warning" id="btn_update"><i class="fas fa-edit fa-lg"></i> Update Info</button></h4>                       
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-sm-6">
                        <h4 class="mb-4"><i class="fab fa-cc-paypal fa-3x"></i></h4>
                        <div class="form-group" hidden>
                            <label for="sys_paypal_business_email">Paypal Business Email</label>
                            <input type="text" class="form-control" id="sys_paypal_business_email" placeholder="Business Email">
                        </div>
                        <div class="form-group" hidden>
                            <label for="sys_paypal_business_email">Paypal App ID</label>
                            <input type="text" class="form-control" id="sys_paypal_app_id" placeholder="App ID">
                        </div> 
                        <div class="form-group">
                            <label for="sys_paypal_business_email">PayPal Business Email</label>
							<input type="text" class="form-control" id="sys_paypal_app_username" placeholder="Paypal App Username">
						</div>
                        <div class="form-group">
                            <label for="sys_paypal_business_email">PayPal Client ID</label>
							<input type="text" class="form-control" id="sys_paypal_signature" placeholder="Paypal App Signature">
						</div>
						<div class="form-group">
							<label for="sys_paypal_business_email">PayPal Secret ID</label>
							<input type="text" class="form-control" id="sys_paypal_app_password" placeholder="Paypal App Password">
						</div>
					</div>
				</div>
                <div class="row justify-content-center mt-4" hidden>
                    <div class="col-lg-5 col-sm-6">
                        <h4 class="mb-4"><i class="fab fa-stripe fa-3x"></i></h4>
                        <div class="form-group" hidden>
                            <label for="sys_stripe_api_key">Stripe Publishable API Key</label>
                            <input type="text" class="form-control" id="sys_stripe_api_key" placeholder="API Key">
                        </div>                       
					</div>
				</div>
			</div>
		</div>     
	</section>
	<?php
	include './includes/end-block.php';
	include './includes/comboboxJS.php';
	include './includes/commonJS.php';
	?>  
	<script>

		function loadSystemInfo() {
			$.post('controllers/settingController.php', {action: 'getAllSystemInfo'}, function (e) {
				$.each(e, function (index, qdt) {
					$('#sys_paypal_business_email').val(qdt.sys_paypal_business_email);
					$('#sys_paypal_app_id').val(qdt.sys_paypal_app_id);
					$('#sys_paypal_signature').val(qdt.sys_paypal_signature);
					$('#sys_paypal_app_password').val(qdt.sys_paypal_app_password);
					$('#sys_paypal_app_username').val(qdt.sys_paypal_app_username);
					$('#sys_stripe_api_key').val(qdt.sys_stripe_api_key);
				});
			}, "json");
		}

		function updatePayment() {
			var sys_paypal_business_email = $('#sys_paypal_business_email').val();
			var sys_paypal_app_id = $('#sys_paypal_app_id').val();
			var sys_paypal_signature = $('#sys_paypal_signature').val();
			var sys_paypal_app_password = $('#sys_paypal_app_password').val();
			var sys_paypal_app_username = $('#sys_paypal_app_username').val();
			var sys_stripe_api_key = $('#sys_stripe_api_key').val();
			var postdata = {
				action: "updatePaymentPage",
				sys_paypal_business_email: sys_paypal_business_email,
				sys_paypal_app_id: sys_paypal_app_id,
				sys_paypal_signature: sys_paypal_signature,
				sys_paypal_app_password: sys_paypal_app_password,
				sys_paypal_app_username: sys_paypal_app_username,
				sys_stripe_api_key: sys_stripe_api_key
			}
			$.post('controllers/settingController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					loadSystemInfo();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}




		$(window).on('load', function () {
			// Executes when complete page is fully loaded, including
			// all frames, objects and images           
			loadSystemInfo();
		});

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			$('#btn_update').click(function () {
				updatePayment();
			})
		});
	</script>
</body>
</html>