<?php include './access_control/special_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>        
		<input type="hidden" id="usr_id" value="<?php
		if (isset($_REQUEST) && !empty($_REQUEST['usr_id'])) {
			echo $_REQUEST['usr_id'];
		}
		?>">
        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-female"></i> <span class="usr_name"></span> Profile  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="goDashboard();"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a>&nbsp;<button id="btn_profileimg" class="btn btn-primary">Add Profile Image</button></h4>                       
                    </div>
                </div>
				<form id="profileform" novalidate>
					<div class="row justify-content-center">
						<div class="col-lg-6 col-sm-6">
                            <input type="hidden" class="form-control" id="usr_name"> 
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pro_fname">First name</label>
                                        <input type="text" class="form-control" id="pro_fname" placeholder="First name" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter First name
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pro_lname">Last name</label>
                                        <input type="text" class="form-control" id="pro_lname" placeholder="Last name" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Last name
                                        </div>
                                    </div>
                                </div>
							</div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pro_address">Mailing Address</label>
                                        <input type="text" class="form-control" id="pro_address" placeholder="Mailing Address" autocomplete="off" required>                                        
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Mailing Address
                                        </div>
                                    </div>
                                    <div class="form-group">                                      

                                        <input type="text" class="form-control" id="pro_city" placeholder="City" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter city
                                        </div>
                                    </div>                                   
                                    <div class="form-group">                                      

                                        <select class="col-12 form-control cmbState form-control-chosen" data-placeholder="Choose a State..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose state
                                        </div>
                                    </div>
									<div class="form-group">                                        
                                        <input type="text" class="form-control" id="pro_zip" placeholder="Zip code" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter  Zip code
                                        </div>
                                    </div>
									<div class="form-group">                                      

										<select class="col-12 form-control cmbCountry form-control-chosen" data-placeholder="Choose a Country..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose country
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pro_dob">Date of Birth</label>
                                        <input type="text" class="form-control datepicker" id="pro_dob" placeholder="Date of Birth" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter  Date of Birth
                                        </div>
                                    </div>
									<div class="form-group">                                      

										<select class="col-12 form-control cmbGender form-control-chosen" data-placeholder="Choose a Gender..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose gender
										</div>
									</div>
									
                                    <div class="form-group">
                                        <label for="pro_age">Age</label>
                                        <input type="number" class="form-control" id="pro_age" placeholder="Age" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Age
                                        </div>
                                    </div>
                                

                                    <div class="form-group">
                                        <label for="pro_taxpayid">Taxpayer ID/SSN</label>
                                        <input type="text" class="form-control" id="pro_taxpayid" placeholder="Taxpayer ID/SSN" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter  Taxpayer ID/SSN
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pro_paypal_email">Paypal Email</label>
                                        <input type="text" class="form-control" id="pro_paypal_email" placeholder="Paypal Email" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter  Paypal Email
                                        </div>
                                    </div>

                                </div>
							</div>						
							

							<br>
							<div class="form-group">
								<button class="btn btn-warning" id="btn_edit"><i class="fas fa-edit"></i> Update</button>
								<button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
							</div>
						</div>					
						
					</div>
				</form>

            </div>
        </div>
    </section>
	<?php
	include './includes/end-block.php';
	include './includes/comboboxJS.php';
	include './includes/commonJS.php';
	?>  
    <script>
		function loadProfileByUsrID() {
			var usr_id = $('#usr_id').val();
			$.post('controllers/userController.php', {action: 'getUserProfileInfoByID', usr_id: usr_id}, function (e) {
				if (e !== undefined || e.length !== 0 || e !== null) {
					$.each(e, function (index, qdt) {
						cmbSubCombo('16', '.cmbGender', qdt.pro_gender);						
						cmbRelateCombo('26', '.cmbCountry', qdt.pro_country);
						cmbRelateSubCombo('27', qdt.pro_country, '.cmbState', qdt.pro_state);						
						$('#pro_fname').val(qdt.pro_fname);
						$('#pro_lname').val(qdt.pro_lname);
						$('#pro_city').val(qdt.pro_city);
						$('#pro_age').val(qdt.pro_age);
						$('#pro_dob').val(qdt.pro_dob);
						$('#pro_paypal_email').val(qdt.pro_paypal_email);
						$('#pro_address').val(qdt.pro_address);
						$('#pro_zip').val(qdt.pro_zip);
						$('#pro_taxpayid').val(qdt.pro_taxpayid);						
						$('#usr_name').val(qdt.usr_name);
						$('.usr_name').html('').append(qdt.usr_name);
					});
				}
			}, "json");
		}

		function editProfile() {			
			var usr_id = $('#usr_id').val();
			var pro_gender = $('.cmbGender').val();			
			var pro_country = $('.cmbCountry').val();
			var pro_state = $('.cmbState').val();			
			var pro_fname = $('#pro_fname').val();
			var pro_lname = $('#pro_lname').val();
			var pro_city = $('#pro_city').val();
			var pro_age = $('#pro_age').val();
			var pro_dob = $('#pro_dob').val();
			var pro_paypal_email = $('#pro_paypal_email').val();
			var pro_address = $('#pro_address').val();
			var pro_zip = $('#pro_zip').val();
			var pro_taxpayid = $('#pro_taxpayid').val();
			var postdata = {
				action: "profileUpdate",				
				usr_id: usr_id,
				pro_gender: pro_gender,			
				pro_country: pro_country,
				pro_state: pro_state,				
				pro_fname: pro_fname,
				pro_lname: pro_lname,
				pro_city: pro_city,
				pro_age: pro_age,
				pro_dob: pro_dob,
				pro_paypal_email: pro_paypal_email,
				pro_address: pro_address,
				pro_zip: pro_zip,
				pro_taxpayid: pro_taxpayid
			}
			$.post('controllers/userController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearModel();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearModel() {
			$('#profileform').removeClass('was-validated');
		}



		$(window).on('load', function () {
			// Executes when complete page is fully loaded, including
			// all frames, objects and images			

			cmbSubCombo('16', '.cmbGender');			
			cmbRelateCombo('26', '.cmbCountry', '238', function () {
				var scmb_id = $('.cmbCountry').val();
				cmbRelateSubCombo('27', scmb_id, '.cmbState');
			});
			loadProfileByUsrID();

			$('.cmbCountry').change(function () {
				var scmb_id = $(this).val();
				cmbRelateSubCombo('27', scmb_id, '.cmbState');
			});
		});

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready		

			const form = $('#profileform');


			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editProfile();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearModel();
			});	
			
			$('#btn_profileimg').click(function () {
				var usr_id = $('#usr_id').val();
				var usr_name = $('#usr_name').val();
				window.location.href = 'userprofileimgupload.php?usr_id=' + usr_id + '&usr_name=' + usr_name;
			});


		});
    </script>
</body>
</html>