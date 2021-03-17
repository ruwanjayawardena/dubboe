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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-envelope"></i> Sendgrid Email Web API Setup&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a>&nbsp;<button class="btn btn-outline-warning" id="btn_update"><i class="fas fa-edit fa-lg"></i> Update Info</button></h4>                       
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-sm-6">
                        <h4 class="mb-4"><i class="fas fa-envelope fa-3x"></i> Twilio SendGrid API Key</h4>
                        <div class="form-group">
                            <label for="sys_sendgrid_apikey">API Key</label>
                            <input type="text" class="form-control" id="sys_sendgrid_apikey">
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
					$('#sys_sendgrid_apikey').val(qdt.sys_sendgrid_apikey);					
				});
			}, "json");
		}

		function updateSendGridAPIKEY() {
			var sys_sendgrid_apikey = $('#sys_sendgrid_apikey').val();			
			var postdata = {
				action: "updateSendGridAPIKEY",
				sys_sendgrid_apikey: sys_sendgrid_apikey				
			}
			$.post('controllers/settingController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("API KEY PROCESS!", e.msg, "success");
					loadSystemInfo();
				} else {
					swal("API KEY PROCESS!", e.msg, "error");
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
				updateSendGridAPIKEY();
			})
		});
	</script>
</body>
</html>