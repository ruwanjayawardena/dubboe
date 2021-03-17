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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-users"></i>  Web Administrators  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard();"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row justify-content-center">
                       <div class="col-lg-9 col-12">
                        <form id="userform" novalidate>
                            <input type="hidden" class="form-control" id="usr_id">
                            <input type="hidden" class="form-control cmb_usercategory" value="3">
                            <div class="form-row">                                
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label for="usr_name">First Name/ Screen Name</label>
                                        <input type="text" class="form-control" id="usr_first_name" placeholder="First Name/ Screen Name" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid First Name/ Screen Name
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label for="usr_name">Last Name</label>
                                        <input type="text" class="form-control" id="usr_last_name" placeholder="Last Name" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid Last Name
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
										<label for="usr_email">Email</label>
										<input type="email" class="col-9 form-control" id="usr_email" placeholder="Email" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid email
										</div>
									</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label for="usr_phone">Phone No</label>
                                        <input type="tel" class="form-control" id="usr_phone" placeholder="Phone No" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid phone no
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label for="usr_username">Username</label>
                                        <input type="text" class="form-control" id="usr_username" placeholder="Username" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid username
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row password-div">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label for="usr_pass">Password</label>
                                        <input type="text" class="form-control" id="usr_pass" placeholder="Password" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid password
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label for="usr_pass_confirm_recovery">Confirm Password</label>
                                        <input type="text" class="form-control" id="usr_pass_confirm_recovery" placeholder="Confim Password" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please Provide valid confirm password
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Save</button>
                                <button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Update</button>
                                <button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">

                                    <tr>                                                        
                                        <th></th>                                    
                                        <th></th>                                  
                                        <th>Account Activation</th>                                  
                                        <th>Name</th>
                                        <th>Contact Info</th>
                                        <th>Username</th>                                      
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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
		function tblUser(callback) {
			var usr_cat_id = 2;
			var tbldata = "";
			$.post('controllers/userController.php', {action: 'userTableByCatID', usr_cat_id: usr_cat_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="6" class="bg-danger text-center"> -- Users not available -- </td>';
					tbldata += '</tr>';
					$('#userTable tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm" role="group">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.usr_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-light btn_chngpass" value="' + qdt.usr_id + '"><i class="fas fa-key"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.usr_id + '"><i class="fas fa-trash-alt"></i></button>';
//						tbldata += '<button class="btn btn-dark btn_sendMsg" value="' + qdt.usr_id + '-SYSTEM"><i class="far fa-envelope"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						if (parseInt(qdt.usr_status) == 1) {
							tbldata += '<td><span class="badge badge-success">Actived</span></td>';
						} else {
							tbldata += '<td><span class="badge badge-warning">Pending</span></td>';
						}
						tbldata += '<td>' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</td>';
						tbldata += '<td><strong>Email:</strong> ' + qdt.usr_email + ' <strong>Phone:</strong> ' + qdt.usr_phone + '</td>';
						tbldata += '<td>' + qdt.usr_username + '</td>';
//						if (parseInt(qdt.usr_membership_status) == 1) {
//							tbldata += '<td><span class="badge badge-success">Actived</span><br><strong>Recent Update Date:</strong> ' + qdt.usr_last_membership_renew_date + ' <strong>Next Renew Date:</strong> ' + qdt.usr_next_membership_renew_date + '</td>';
//						} else {
//							tbldata += '<td><span class="badge badge-warning">Not Activated/Renewed</span></td>';
//						}
//						if (parseInt(qdt.usr_verified_status) == 0) {
//							tbldata += '<td><span class="badge badge-dark">Not Verifiled</span></td>';
//						} else if (parseInt(qdt.usr_verified_status) == 1) {
//							tbldata += '<td><span class="badge badge-warning">Processing</span></td>';
//						} else if (parseInt(qdt.usr_verified_status) == 2) {
//							tbldata += '<td><span class="badge badge-success">Verified</span><br><strong>Verifid by:</strong> ' + qdt.usr_verified_indicator_name + '</td>';
//						}
//						if (qdt.pro_paypal_email === "") {
//							tbldata += '<td>Not Available</td>';
//						} else {
//							tbldata += '<td>' + qdt.pro_paypal_email + '</td>';
//						}
						tbldata += '</tr>';
					});

					if ($.fn.DataTable.isDataTable('#userTable')) {
						//re initialize 
						$('#userTable').DataTable().destroy();
						$('#userTable tbody').empty();
						$('#userTable tbody').html('').append(tbldata);
						$('#userTable').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							],
							order: [2, 'asc']
						});
					} else {
						//initilized                    
						$('#userTable tbody').html('').append(tbldata);
						$('#userTable').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							],
							order: [2, 'asc']
						});
					}
				}

				$('.btn_profile').click(function () {
					var usr_id = $(this).val();
					window.location.href = 'uqprofile.php?usr_id=' + usr_id;
				});

				$('.btn_sendMsg').click(function () {
					var str = $(this).val();
					var str_array = str.split('-');
					var msgModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel"><i class="far fa-envelope"></i> Send Message</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">' +
							//here is model body start                        
							'<div class="row">' +
							'<div class="col-lg-12">' +
							'<form id="form_modal" novalidate>' +
							'<div class="form-group">' +
							'<label for="msg_body">Message</label>' +
							'<textarea type="text" class="form-control" id="msg_body" rows="5" placeholder="Message Here" required></textarea>' +
							'<div class="valid-feedback">' +
							'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
							'</div>' +
							'<div class="invalid-feedback">' +
							'<i class="fas fa-lg fa-exclamation-circle"></i> Please enter messsage' +
							'</div>' +
							'</div>' +
							'</form>' +
							'</div>' +
							'</div>' +
							//here is model body end
							'</div>' +
							//start model footer
							'<div class="modal-footer">' +
							'<button type="button" class="btn btn-primary" id="btn_send"><i class="fas fa-envelope"></i> Send</button>' +
							'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
							'</div>' +
							//end modal footer
							'</div>' +
							'</div>' +
							'</div>';
					var msgModal = $(msgModalStr);
					msgModal.modal('show');

					const form = msgModal.find('#form_modal');
					form.submit(false);
					form.removeClass('was-validated');

					msgModal.find('#btn_send').click(function (event) {
						var msg_body = msgModal.find('#msg_body').val();
						var msg_forwhat = str_array[1];
						var msg_object_id = null;
						var msg_sender = 'ADMIN';
						var msg_receiver = str_array[0];
						var postData = {
							msg_body: msg_body,
							msg_forwhat: msg_forwhat,
							msg_object_id: msg_object_id,
							msg_sender: msg_sender,
							msg_receiver: msg_receiver,
							action: "sendMessage"
						}
						form.addClass('was-validated');
						if (form[0].checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							$.post('controllers/messageController.php', postData, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("MESSAGE!", e.msg, "success");
									form.removeClass('was-validated');
									msgModal.modal('hide');
								} else {
									swal("MESSAGE!", e.msg, "warning");
								}
							}, "json");
						}
					});
				});


				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var usr_id = $(this).val();
					$.post('controllers/userController.php', {action: 'getUserByID', usr_id: usr_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#usr_id').val(qdt.usr_id);
							$('.password-div').prop('hidden', true);
							$('#usr_email').val(qdt.usr_email);
							$('#usr_pass').val(qdt.usr_pass);
							$('#usr_first_name').val(qdt.usr_first_name);
							$('#usr_last_name').val(qdt.usr_last_name);
							$('#usr_username').val(qdt.usr_username);
							$('#usr_phone').val(qdt.usr_phone);
							$('#usr_pass').val('temp');
							$('#usr_pass_confirm_recovery').val('temp');
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var usr_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this user ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/userController.php', {action: 'deleteUserByID', usr_id: usr_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearUser();
							} else {
								swal("Error!", x.msg, "error");
							}
						}, "json");
					});
				});

				$('.btn_chngpass').click(function () {
					var usr_id = $(this).val();
					var confirmModalString = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">' +
							//here is model body start
							'<form id="password-form" novalidate>' +
							'<div class="form-group">' +
							'<label for="recipient-name" class="col-form-label">New password</label>' +
							'<input type="text" class="form-control" id="usr_pass_recover"  placeholder="New password" required>' +
							'</div>' +
							'<div class="form-group">' +
							'<label for="recipient-name" class="col-form-label">Confirm password</label>' +
							'<input type="text" class="form-control" id="usr_pass_confirm_recovery"  placeholder="New password" required>' +
							'</div>' +
							'</form>' +
							//here is model body end
							'</div>' +
							//start model footer
							'<div class="modal-footer">' +
							'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
							'<button type="button" class="btn btn-primary" id="btn_updatepass">Update</button>' +
							'</div>' +
							//end modal footer
							'</div>' +
							'</div>' +
							'</div>';

					var confirmModal = $(confirmModalString);
					confirmModal.modal('show');

					confirmModal.find('#btn_updatepass').click(function (event) {
						var form = confirmModal.find('#password-form');
						form.addClass('was-validated');
						if (form[0].checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							var usr_pass = confirmModal.find('#usr_pass_recover').val();
							var usr_pass_confirm = confirmModal.find('#usr_pass_confirm_recovery').val();
							var postData = {
								usr_id: usr_id,
								usr_pass: usr_pass,
								action: "passwordChangeByRecovery"
							}
							if (usr_pass_confirm === usr_pass) {
								$.post("controllers/userController.php", postData, function (e) {
									if (e !== undefined || e.lenght !== 0 || e !== null) {
										if (parseInt(e.msgType) == 1) {
											swal("Good job!", e.msg, "success");
											confirmModal.modal('hide');
										} else {
											swal("Error !", e.msg, "error");
										}
									} else {
										swal("Alert !", e.msg, "warning");
									}
								}, "json");
							} else {
								swal("Password Not Matched", "Please Enter Correct Password", "warning");
							}
						}
					});

				});

				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}
			, "json");
		}

		function clearUser() {
			$('#usr_id').val('');
			$('#usr_pass').val('');
			$('#usr_last_name').val('');
			$('#usr_first_name').val('');
			$('#usr_email').val('');
			$('#usr_phone').val('');
			$('#usr_username').val('');
			$('#usr_pass_confirm_recovery').val('');
			tblUser();
			$('.password-div').prop('hidden', false);
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#userform').removeClass('was-validated');
		}


		function saveUser() {
			var usr_pass = $('#usr_pass').val();
			var usr_first_name = $('#usr_first_name').val();
			var usr_last_name = $('#usr_last_name').val();
			var usr_email = $('#usr_email').val();
			var usr_phone = $('#usr_phone').val();
			var usr_username = $('#usr_username').val();
			var usr_pass_confirm = $('#usr_pass_confirm_recovery').val();
			var usr_cat_id = 2;
			var postData = {
				usr_username: usr_username,
				usr_pass: usr_pass,
				usr_first_name: usr_first_name,
				usr_last_name: usr_last_name,
				usr_email: usr_email,
				usr_cat_id: usr_cat_id,
				usr_phone: usr_phone,
				action: 'addUser'
			}
			if (usr_pass_confirm === usr_pass) {
				$.post('controllers/userController.php', postData, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						swal("Alert !", "System Failed.", "warning");
					} else {
						if (parseInt(e.msgType) == 1) {
							swal("Good job!", e.msg, "success");
							clearUser();
						} else {
							swal("Alert !", e.msg, "warning");
						}
					}
				}, "json");
			} else {
				swal("Password Invalid !", "Please Enter Correct Password", "warning");
			}
		}

		function updateUser() {
			var usr_id = $('#usr_id').val();
			var usr_first_name = $('#usr_first_name').val();
			var usr_last_name = $('#usr_last_name').val();
			var usr_phone = $('#usr_phone').val();
			var usr_email = $('#usr_email').val();
			var usr_username = $('#usr_username').val();

			var postData = {
				usr_id: usr_id,
				usr_first_name: usr_first_name,
				usr_last_name: usr_last_name,
				usr_phone: usr_phone,
				usr_email: usr_email,
				usr_username: usr_username,
				action: 'updateUser'
			}
			$.post('controllers/userController.php', postData, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					swal("Alert !", "System Failed.", "warning");
				} else {
					if (parseInt(e.msgType) == 1) {
						swal("Good job!", e.msg, "success");
						clearUser();
					} else {
						swal("Alert !", e.msg, "warning");
					}
				}
			}, "json");
		}

		$(window).on('load', function () {
			cmbUserCategory();
			tblUser();
		});


		$(document).ready(function () {

			const form = $('#userform');


			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveUser();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					updateUser();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearUser();
			});


		});
    </script>
</body>
</html>