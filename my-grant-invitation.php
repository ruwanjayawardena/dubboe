<?php include './access_control/auth.php'; ?>  
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center mb-4">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">My Grant Invitation</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-trophy"></i> My Grant Invitation</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-12">
							<div class="table-responsive table-sm font-size-sm">
								<table id="tblGrantInvitationByUser"  class="table table-bordered" style="width:100%">
									<thead class="thead-light">
										<tr>                                                        
											<th></th>                           
											<th></th>                           
											<th>Grant Status</th>
											<th>Application Status</th>
											<th>Invitation</th>
											<th>Received Date</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
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
			function tblGrantInvitationByUser(callback) {
				var tbldata = "";
				$.post('bkp/controllers/ubGrantController.php', {action: 'loadLoggedUserGrantInvitations'}, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="6" class="bg-danger text-white text-center">Grant invitations not available</td>';
						tbldata += '</tr>';
						$('#tblGrantInvitationByUser tbody').html('').append(tbldata);
					} else {
						//0-invited,1-userapplied,2-approve,3-reject,4-win
						$.each(e, function (index, qdt) {
							tbldata += '<tr>';
							tbldata += '<td>';
							tbldata += '<div class="btn-group">';
							if (parseInt(qdt.grinfo_received_status) == 0) {
								tbldata += '<button class="btn btn-primary btn-sm btn_sendMsg" value="' + qdt.grinfo_user + '-GRANT-' + qdt.grinfo_id + '"><i class="far fa-envelope"></i> Send Message</button><button class="btn btn-dark btn-sm btn_accept" value="' + qdt.grinfo_id + '-' + qdt.grinfo_grant + '"><i class="fas fa-trophy"></i> Accept</button></td>';
							} else if (parseInt(qdt.grinfo_received_status) == 1) {
								tbldata += '<button class="btn btn-primary btn-sm btn_sendMsg" value="' + qdt.grinfo_user + '-GRANT-' + qdt.grinfo_id + '"><i class="far fa-envelope"></i> Send Message</button></td>';
							} else if (parseInt(qdt.grinfo_received_status) == 2) {
								tbldata += '<button class="btn btn-primary btn-sm btn_sendMsg" value="' + qdt.grinfo_user + '-GRANT-' + qdt.grinfo_id + '"><i class="far fa-envelope"></i> Send Message</button></td>';
							} else if (parseInt(qdt.grinfo_received_status) == 3) {
								tbldata += '<button class="btn btn-primary btn-sm btn_sendMsg" value="' + qdt.grinfo_user + '-GRANT-' + qdt.grinfo_id + '"><i class="far fa-envelope"></i> Send Message</button></td>';
							} else if (parseInt(qdt.grinfo_received_status) == 4) {
								tbldata += '<button class="btn btn-primary btn-sm btn_sendMsg" value="' + qdt.grinfo_user + '-GRANT-' + qdt.grinfo_id + '"><i class="far fa-envelope"></i> Send Message</button></td>';
							}
							tbldata += '</div>';
							tbldata += '</td>';
							tbldata += '<td></td>';
							if (qdt.grant_status == 1) {
								tbldata += '<td>Active</td>';
							} else {
								tbldata += '<td>Expired</td>';
							}

							if (parseInt(qdt.grinfo_received_status) == 0) {
								tbldata += '<td>Awaiting acceptance</td>';
							} else if (parseInt(qdt.grinfo_received_status) == 1) {
								tbldata += '<td>Processing</td>';
							} else if (parseInt(qdt.grinfo_received_status) == 2) {
								tbldata += '<td>Processing</td>';
							} else if (parseInt(qdt.grinfo_received_status) == 3) {
								tbldata += '<td>Rejected</td>';
							} else if (parseInt(qdt.grinfo_received_status) == 4) {
								tbldata += '<td>Approved & you are elegible for Funding</td>';
							}
							tbldata += '<td><strong>' + qdt.grant_title + '</strong><br>' + qdt.grant_desc + '<h5 class="font-size-sm">Funding: $' + qdt.grant_amount + ' USD</h5></td>';
							tbldata += '<td>' + qdt.grinfo_update_date + ' ' + qdt.grinfo_update_time + '</td>';
							tbldata += '</tr>';
						});

						if ($.fn.DataTable.isDataTable('#tblGrantInvitationByUser')) {
							//re initialize 
							$('#tblGrantInvitationByUser').DataTable().destroy();
							$('#tblGrantInvitationByUser tbody').empty();
							$('#tblGrantInvitationByUser tbody').html('').append(tbldata);
							$('#tblGrantInvitationByUser').DataTable({
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
							$('#tblGrantInvitationByUser tbody').html('').append(tbldata);
							$('#tblGrantInvitationByUser').DataTable({
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

						$('#tblGrantInvitationByUser').on('draw.dt', function () {
							$('.btn_accept').click(function () {
								var grinfo_id = $(this).val();
								swal({
									title: "APPLY GRANT!",
									text: "Do you want to accept this invitation ?",
									type: "info",
									showCancelButton: true,
									cancelButtonClass: "btn-light",
									closeOnConfirm: false
								}, function () {
									$.post('bkp/controllers/ubGrantController.php', {action: 'acceptGrant', grinfo_id: grinfo_id}, function (e) {
										if (parseInt(e.msgType) == 1) {
											swal("APPLY GRANT!", e.msg, "success");
											tblGrantInvitationByUser();
										} else {
											swal("APPLY GRANT!", x.msg, "error");
										}
									}, "json");
								});
							});

						});

						$('.btn_sendMsg').click(function () {
							var str = $(this).val();
							var msg_array = str.split('-');
							var msgModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
									'<div class="modal-dialog modal-lg" role="document">' +
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
//							
							msgModal.find('#btn_send').click(function (event) {
								var msg_body = msgModal.find('#msg_body').val();
								var msg_forwhat = msg_array[1];
								var msg_object_id = msg_array[2];
								var msg_sender = 'LOGUSER';
								var msg_receiver = 'null';
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
									$.post('bkp/controllers/messageController.php', postData, function (e) {
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


						$('.btn_accept').click(function () {
							var str = $(this).val();
							var str_array = str.split('-');
							var grinfo_id = str_array[0];
							var grant_id = str_array[1];
							$.post('bkp/controllers/ubGrantController.php', {action: 'tblGrantQuestions', grant_id: grant_id}, function (e) {
								if (e === undefined || e.length === 0 || e === null) {
									//directly appy;
									swal({
										title: "APPLY GRANT!",
										text: "Do you want to accept this invitation ?",
										type: "info",
										showCancelButton: true,
										cancelButtonClass: "btn-light",
										closeOnConfirm: false
									}, function () {
										$.post('bkp/controllers/ubGrantController.php', {action: 'acceptGrant', grinfo_id: grinfo_id}, function (e) {
											if (parseInt(e.msgType) == 1) {
												swal("APPLY GRANT!", e.msg, "success");
												tblGrantInvitationByUser();
											} else {
												swal("APPLY GRANT!", x.msg, "error");
											}
										}, "json");
									});
								} else {
									var eventItemModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
											'<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">' +
											'<div class="modal-content">' +
											'<div class="modal-header">' +
											'<h5 class="modal-title" id="exampleModalLabel">Apply Invited Grant</h5>' +
											'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
											'<span aria-hidden="true">&times;</span>' +
											'</button>' +
											'</div>' +
											'<div class="modal-body">' +
											//here is model body start                        
											'<div class="row">' +
											'<div class="col-lg-12">' +
											'<form id="form_modal" novalidate>';
									$.each(e, function (index, qdt) {
										eventItemModalStr += '<div class="form-group">' +
												'<label for="grq_question">' + qdt.grq_question + '</label>' +
												'<textarea class="form-control" id="question-' + qdt.grq_id + '" rows="5" required></textarea>' +
												'<div class="valid-feedback">' +
												'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
												'</div>' +
												'<div class="invalid-feedback">' +
												'<i class="fas fa-lg fa-exclamation-circle"></i> Please fill the answer' +
												'</div>' +
												'</div>';
									});
									eventItemModalStr += '<input type="hidden" id="grq_id">' +
											'</form>' +
											'</div>' +
											'</div>' +
											//here is model body end
											'</div>' +
											//start model footer
											'<div class="modal-footer">' +
											'<button type="button" class="btn btn-primary" id="btn_addAnswer">Add</button>' +
											'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
											'</div>' +
											//end modal footer
											'</div>' +
											'</div>' +
											'</div>';
									var eventItemModal = $(eventItemModalStr);
									eventItemModal.modal('show');

									const form = eventItemModal.find('#form_modal');
									form.submit(false);
									form.removeClass('was-validated');

									eventItemModal.find('#btn_addAnswer').click(function (event) {
										var answers = [];
										$.each(e, function (index, qdt) {
											answers[qdt.grq_id] = eventItemModal.find('#question-' + qdt.grq_id).val();
										});
										var postData = {
											gruq_grantinfo: grinfo_id,
											answers: answers,
											action: "saveGrantAnswersAndApply"
										}
										form.addClass('was-validated');
										if (form[0].checkValidity() === false) {
											event.preventDefault();
											event.stopPropagation();
										} else {
											swal({
												title: "APPLY GRANT!",
												text: "Do you want to accept this invitation ?",
												type: "info",
												showCancelButton: true,
												cancelButtonClass: "btn-light",
												closeOnConfirm: false
											}, function () {
												$.post('bkp/controllers/ubGrantController.php', postData, function (e) {
													if (parseInt(e.msgType) == 1) {
														tblGrantInvitationByUser();
														eventItemModal.modal('hide');
														swal("APPLY GRANT!", e.msg, "success");
													} else {
														swal("APPLY GRANT!", x.msg, "error");
													}
												}, "json");
											});
										}
									});
								}

							}, "json");
						});
					}
				}, "json");
			}

			function grantInvitationsMarkAsReadByUser() {
				$.post('bkp/controllers/ubGrantController.php', {action: 'grantInvitationsMarkAsReadByUser'}, function (e) {

				});
			}

			$(document).ready(function () {
				checkMembershipIsActive(1);
				tblGrantInvitationByUser();
				grantInvitationsMarkAsReadByUser();
			});
        </script>
	</body>
</html>