<?php include './access_control/auth.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<style>
			.img-thumbnail{
				width:80px!important;
				height: auto!important;
			}
		</style>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="msgof" value="<?php
		if (isset($_REQUEST['msgof'])) {
			echo $_REQUEST['msgof'];
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
									<li class="breadcrumb-item"><a href="#">My Message</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="far fa-envelope-open"></i> My Message</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-12">
							<button class="btn btn-warning mb-3" id="compose_new_message"><i class="far fa-envelope"></i> Compose</button>
							<div class="table-responsive table-sm font-size-sm">
								<table id="tblMessages"  class="table table-bordered">
									<thead class="thead-light">
										<tr>                                                        
											<th></th>                           
											<th></th>                           
											<th>#</th>
											<th>Messaged By</th>
											<th>Message</th>
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
			function sendMessageModal(callback) {
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

				msgModal.on('shown.bs.modal', function () {
					if (callback !== undefined) {
						if (typeof callback === 'function') {
							callback(msgModal, form);
						}
					}
				});


			}


			function viewAllMessages() {
				var second = $('#msgof').val();
				var tbldata = "";
				$.post('bkp/controllers/messageController.php', {action: 'getMessagesDoneWithSenderByLoggedUser', second: second}, function (e) {
//					console.log(e);
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="5" class="bg-danger text-white text-center">Messages not available</td>';
						tbldata += '</tr>';
						$('#tblMessages tbody').html('').append(tbldata);
					} else {
						//0-invited,1-userapplied,2-approve,3-reject,4-win
						$.each(e, function (index, qdt) {
							tbldata += '<tr>';
							tbldata += '<td>';
							if (parseInt(qdt.msg_by_type) != 1) {
								tbldata += '<button class="btn btn-primary btn-sm btn_sendMsg" value="' + qdt.msg_sender + '-' + qdt.msg_forwhat + '-' + qdt.msg_object_id + '"> Reply</button>';
							}
							tbldata += '</td>';

							tbldata += '<td></td>';
							tbldata += '<td>';
							if (parseInt(qdt.msg_by_type) !== 1) {
								if (qdt.sender_img === "#") {
									tbldata += '<img src="assets/img/noimage.png" class="img-thumbnail">';
								} else {
									tbldata += '<img src="asset_imageuploader/userprofileimages/' + qdt.msg_sender + '/' + qdt.sender_img + '" class="img-thumbnail">';
								}
							} else {
								if (qdt.sender_img === "#") {
									tbldata += '<img src="assets/img/noimage.png" class="img-thumbnail">';
								} else {
									tbldata += '<img src="asset_imageuploader/userprofileimages/' + qdt.msg_sender + '/' + qdt.sender_img + '" class="img-thumbnail">';
								}
							}

							tbldata += '</td>';
							tbldata += '<td>' + qdt.msg_by + '</td>';
							tbldata += '<td>' + qdt.msg_body + '</td>';
							tbldata += '<td>' + qdt.msg_create_date + ' ' + qdt.msg_create_time + '</td>';
							tbldata += '</tr>';
						});


						if ($.fn.DataTable.isDataTable('#tblMessages')) {
							console.log("done");
							$('#tblMessages').DataTable().destroy();
						}
						$('#tblMessages tbody').html('').append(tbldata);
						$('#tblMessages').DataTable({
							ordering: false,
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
							drawCallback: function (settings) {
								//run all functions after draw
								$(this).off('click.rowClick').on('click.rowClick', '.btn_sendMsg', function () {
									var str = $(this).val();
									var strval = str.split('-');
									sendMessageModal(function (eventModal, form) {
										eventModal.find('#btn_send').click(function (event) {
											var msg_body = eventModal.find('#msg_body').val();
											var msg_forwhat = strval[1];
											var msg_object_id = strval[2];
											var msg_sender = 'LOGUSER';
											var msg_receiver = strval[0];
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
														eventModal.modal('hide');
														viewAllMessages();
													} else {
														swal("MESSAGE!", e.msg, "warning");
													}
												}, "json");
											}
										});
									});

								});
							}
						});
					}
				}, "json");
			}

			function msgNotificationClear() {
				$.post('bkp/controllers/messageController.php', {action: 'markRead'}, function (count) {
					frontNavbarMsgNotification();
				}, "json");
			}

			$(document).ready(function () {
				msgNotificationClear();
				viewAllMessages();
				setInterval(function () {
					viewAllMessages();
				}, 5000);

				$('#compose_new_message').click(function () {
					var msg_receiver = $('#msgof').val();
					if (msg_receiver === 'null') {
						var msg_forwhat = 'SYSTEM';
					} else {
						var msg_forwhat = 'BETWSUSER';
					}
					sendMessageModal(function (eventModal, form) {
						eventModal.find('#btn_send').click(function (event) {
							var msg_body = eventModal.find('#msg_body').val();
							var msg_object_id = 'null';
							var msg_sender = 'LOGUSER';
//							var msg_receiver = 'null';
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
										eventModal.modal('hide');
										viewAllMessages();
									} else {
										swal("MESSAGE!", e.msg, "warning");
									}
								}, "json");
							}
						});
					});
				});


			});
        </script>	
	</body>
</html>