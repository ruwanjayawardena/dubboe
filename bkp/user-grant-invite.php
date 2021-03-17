<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>    
		<style>
			table .img-thumbnail {
				width: 100px !important;
				height: 100px !important;
			}

			table.imgdiv{
				width: 100px !important;
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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-medal fa-lg"></i> Grant Invitation&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-lg-5 col-12">
						<div class="form-group">
							<label for="grant_amount">Grant Option</label>
							<select class="form-control cmbGrant" id="grant_amount"></select>
						</div>
					</div>
                    <div class="col-lg-7 col-12">						
						<div class="displayGrantInfoByID">

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="table-responsive">
							<h5>All System Users (Not Invited)</h5>
                            <table id="tblAllUsersNotGrants" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Membership</th>
										<th>User</th>
										<th>Contacts</th>
									</tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="table-responsive">
							<h5>Invited Users for Grants</h5>
                            <table id="tblAllUsersGrantInvited" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
									<tr>
                                        <th></th>
                                        <th></th>
                                        <th>Invitation Status</th>
                                        <th>Membership</th>
										<th>User</th>
										<th>Contacts</th>
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
		function cmbGrant(selected, callback) {
			var cmbdata = "";
			$.post('controllers/ubGrantController.php', {action: 'cmbGrant'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					cmbdata += '<option value="0"> Grants Not Available </option>';
				} else {
					$.each(e, function (index, qdt) {
						if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
							if (parseInt(selected) === parseInt(qdt.grant_id)) {
								cmbdata += '<option value="' + qdt.grant_id + '" selected>' + qdt.grant_title + '</option>';
							} else {
								cmbdata += '<option value="' + qdt.grant_id + '">' + qdt.grant_title + '</option>';
							}
						} else {
							cmbdata += '<option value="' + qdt.grant_id + '">' + qdt.grant_title + '</option>';
						}
					});
				}
				$('.cmbGrant').html('').append(cmbdata);
				chosenRefresh();
				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}, "json");
		}

		function displayGrantInfoByID(grant_id) {
			var disp = "";
			$.post('controllers/ubGrantController.php', {action: 'getGrantByID', grant_id: grant_id}, function (e) {

				$.each(e, function (index, qdt) {
					disp += '<h4>' + qdt.grant_title + '</h4>';
					disp += '<p>' + qdt.grant_desc + '</p>';
					disp += '<h5>$' + qdt.grant_amount + ' USD</h5>';
				});
				$('.displayGrantInfoByID').html('').append(disp);
			}, "json");
		}

		function tblAllUsersNotGrants(grant_id, callback) {
			var tbldata = "";
			$.post('controllers/ubGrantController.php', {action: 'tblAllUsersNotGrants', grant_id: grant_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="5" class="bg-danger text-center">Users Not Available </td>';
					tbldata += '</tr>';
					$('#tblAllUsersNotGrants tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm" role="group">';
						tbldata += '<button class="btn btn-info btn_invite" value="' + qdt.usr_id + '"><i class="fas fa-plus"></i> Invite</button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>';
						if (parseInt(qdt.usr_membership_status) == 1) {
							tbldata += '<strong class="text-success">Activated</strong>';
						} else {
							tbldata += '<strong class="text-warning">Not Activated</strong>';
						}
						tbldata += '</td>';
						tbldata += '<td><a target="_blank" href="../public-profile.php?usr_id=' + qdt.usr_id + '">' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</a></td>';
						tbldata += '<td>Email: ' + qdt.usr_email + '<br>Phone: ' + qdt.usr_phone + '</td>';
						tbldata += '</tr>';
					});
					if ($.fn.DataTable.isDataTable('#tblAllUsersNotGrants')) {
						//re initialize 
						$('#tblAllUsersNotGrants').DataTable().destroy();
						$('#tblAllUsersNotGrants tbody').empty();
						$('#tblAllUsersNotGrants tbody').html('').append(tbldata);
						$('#tblAllUsersNotGrants').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							]
						});
					} else {
						//initilized                    
						$('#tblAllUsersNotGrants tbody').html('').append(tbldata);
						$('#tblAllUsersNotGrants').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							]
						});
					}
				}

				$('.btn_invite').click(function () {
					var usr_id = $(this).val();
					var postdata = {
						action: "InviteForGrant",
						grant_id: grant_id,
						usr_id: usr_id
					}
					$.post('controllers/ubGrantController.php', postdata, function (e) {
						if (parseInt(e.msgType) == 1) {
							swal("INVITE FOR GRANT!", e.msg, "success");
							tblAllUsersNotGrants(grant_id);
							tblAllUsersGrantInvited(grant_id);
						} else {
							swal("INVITE FOR GRANT!", e.msg, "warning");
						}
					}, "json");
				});
				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}
			, "json");
		}

		function tblAllUsersGrantInvited(grant_id, callback) {
			var tbldata = "";
			$.post('controllers/ubGrantController.php', {action: 'tblAllUsersGrantInvited', grant_id: grant_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="6" class="bg-danger text-center">Users Not Available </td>';
					tbldata += '</tr>';
					$('#tblAllUsersGrantInvited tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm" role="group">';
						tbldata += '<button class="btn btn-danger btn_remove" value="' + qdt.usr_id + '"><i class="far fa-window-close"></i> Remove</button><button class="btn btn-dark btn_sendMsg" value="' + qdt.usr_id + '-GRANT-' + qdt.grinfo_id + '"><i class="far fa-envelope"></i> Send Message</button>';
						if (parseInt(qdt.grinfo_received_status) == 1) {
							tbldata += '<button class="btn btn-info btn_viewAnswers" value="' + qdt.grinfo_id + '-' + qdt.grinfo_grant + '">View Answers</button>';
							tbldata += '<button class="btn btn-primary btn_changeStatus" value="' + qdt.grinfo_id + '-2">Accept</button>';
							tbldata += '<button class="btn btn-warning btn_changeStatus" value="' + qdt.grinfo_id + '-3">Reject</button>';
						} else if (parseInt(qdt.grinfo_received_status) == 2) {
							tbldata += '<button class="btn btn-info btn_viewAnswers" value="' + qdt.grinfo_id + '-' + qdt.grinfo_grant + '">View Answers</button>';
							tbldata += '<button class="btn btn-light btn_changeStatus" value="' + qdt.grinfo_id + '-4">Award Grant</button>';
							tbldata += '<button class="btn btn-warning btn_changeStatus" value="' + qdt.grinfo_id + '-3"><i class="far fa-window-close"></i> Reject</button>';
						} else if (parseInt(qdt.grinfo_received_status) == 4) {
							tbldata += '<button class="btn btn-info btn_viewAnswers" value="' + qdt.grinfo_id + '-' + qdt.grinfo_grant + '">View Answers</button>';
							tbldata += '<button class="btn btn-warning btn_changeStatus" value="' + qdt.grinfo_id + '-3">Reject</button>';
						} else if (parseInt(qdt.grinfo_received_status) == 3) {
							tbldata += '<button class="btn btn-info btn_viewAnswers" value="' + qdt.grinfo_id + '-' + qdt.grinfo_grant + '">View Answers</button>';
							tbldata += '<button class="btn btn-primary btn_changeStatus" value="' + qdt.grinfo_id + '-2">Accept</button>';
						}
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						if (parseInt(qdt.grinfo_received_status) == 0) {
							tbldata += '<td>Awaiting User acceptance</td>';
						} else if (parseInt(qdt.grinfo_received_status) == 1) {
							tbldata += '<td>Accepted By User</td>';
						} else if (parseInt(qdt.grinfo_received_status) == 2) {
							tbldata += '<td>Awaiting Approval</td>';
						} else if (parseInt(qdt.grinfo_received_status) == 3) {
							tbldata += '<td>Rejected</td>';
						} else if (parseInt(qdt.grinfo_received_status) == 4) {
							tbldata += '<td>Grant Accepted</td>';
						}

						tbldata += '<td>';
						if (parseInt(qdt.usr_membership_status) == 1) {
							tbldata += '<strong class="text-success">Activated</strong>';
						} else {
							tbldata += '<strong class="text-warning">Not Activated</strong>';
						}
						tbldata += '</td>';
						tbldata += '<td><a target="_blank" href="../public-profile.php?usr_id=' + qdt.usr_id + '">' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</a></td>';
						tbldata += '<td>Email: ' + qdt.usr_email + '<br>Phone: ' + qdt.usr_phone + '</td>';
						tbldata += '</tr>';
					});
					if ($.fn.DataTable.isDataTable('#tblAllUsersGrantInvited')) {
						//re initialize 
						$('#tblAllUsersGrantInvited').DataTable().destroy();
						$('#tblAllUsersGrantInvited tbody').empty();
						$('#tblAllUsersGrantInvited tbody').html('').append(tbldata);
						$('#tblAllUsersGrantInvited').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							]
						});
					} else {
						//initilized                    
						$('#tblAllUsersGrantInvited tbody').html('').append(tbldata);
						$('#tblAllUsersGrantInvited').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							]
						});
					}
				}

				$('.btn_viewAnswers').click(function () {
					var str = $(this).val();
					var str_array = str.split('-');
					var grinfo_id = str_array[0];
					var grant_id = str_array[1];
					$.post('controllers/ubGrantController.php', {action: 'tblGrantQuestionsWithAnswers', grant_id: grant_id, grinfo_id: grinfo_id}, function (eans) {						
				
						if (eans === undefined || eans.length === 0 || eans === null) {
							//directly appy;
							swal("ALERT!", 'Questionaries/Answers not available', "warning");
						} else {
							var eventItemModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
									'<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">' +
									'<div class="modal-content">' +
									'<div class="modal-header">' +
									'<h5 class="modal-title" id="exampleModalLabel">Answers for Grant Questionaries</h5>' +
									'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
									'<span aria-hidden="true">&times;</span>' +
									'</button>' +
									'</div>' +
									'<div class="modal-body">' +
									//here is model body start                        
									'<div class="row">' +
									'<div class="col-lg-12">';
									$.each(eans, function (index_eans, qdt_eans) {
//										eventItemModalStr +=  qdt_eans.grq_question;
										eventItemModalStr += '<div class="form-group"><label for="grq_question">' + qdt_eans.grq_question + '</label><br>'+qdt_eans.gruq_answer + '</br></br></div>';
									});
							eventItemModalStr += '<input type="hidden" id="grq_id">' +
									'</div>' +
									'</div>' +
									//here is model body end
									'</div>' +
									//start model footer
									'<div class="modal-footer">' +								
									'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
									'</div>' +
									//end modal footer
									'</div>' +
									'</div>' +
									'</div>';
							var eventItemModal = $(eventItemModalStr);
							eventItemModal.modal('show');

						}
					}, "json");
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

//							msgModal.on('shown.bs.modal', function () {								
//							
//							});
//							
					msgModal.find('#btn_send').click(function (event) {
						var msg_body = msgModal.find('#msg_body').val();
						var msg_forwhat = str_array[1];
						var msg_object_id = str_array[2];
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

				$('.btn_remove').click(function () {
					var usr_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to remove this user ?",
						type: "info",
						showCancelButton: true,
						cancelButtonClass: "btn-light",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/ubGrantController.php', {action: 'removeGrantedUser', usr_id: usr_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("REMOVE GRANT!", e.msg, "success");
								tblAllUsersNotGrants(grant_id);
								tblAllUsersGrantInvited(grant_id);
							} else {
								swal("REMOVE GRANT!", x.msg, "error");
							}
						}, "json");
					});
				});

				$('.btn_changeStatus').click(function () {
					var str = $(this).val();
					var str_arr = str.split('-');
					var grinfo_id = str_arr[0];
					var grinfo_received_status = str_arr[1];
					var text = "";
					if (parseInt(grinfo_received_status) == 2) {
						text = "Do you want to accept this invitation ?";
					} else if (parseInt(grinfo_received_status) == 3) {
						text = "Do you want to reject this invitation ?";
					} else if (parseInt(grinfo_received_status) == 4) {
						text = "Do you want to approve this invitation ?";
					}
					swal({
						title: "PROCESS GRANT!",
						text: text,
						type: "info",
						showCancelButton: true,
						cancelButtonClass: "btn-light",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/ubGrantController.php', {action: 'changeGrantInvitationStatus', grinfo_id: grinfo_id, grinfo_received_status: grinfo_received_status}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("PROCESS GRANT!", e.msg, "success");
								tblAllUsersNotGrants(grant_id);
								tblAllUsersGrantInvited(grant_id);
							} else {
								swal("PROCESS GRANT!", x.msg, "error");
							}
						}, "json");
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

		$(document).ready(function () {
			cmbGrant(false, function () {
				var grant_id = $('.cmbGrant').val();
				displayGrantInfoByID(grant_id);
				tblAllUsersNotGrants(grant_id);
				tblAllUsersGrantInvited(grant_id);
			});
			$('.cmbGrant').change(function (event) {
				event.preventDefault();
				var grant_id = $(this).val();
				displayGrantInfoByID(grant_id);
				tblAllUsersNotGrants(grant_id);
				tblAllUsersGrantInvited(grant_id);
			});
		});
    </script>
</body>
</html>