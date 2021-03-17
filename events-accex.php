<?php include './access_control/auth.php'; ?> 
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<style>
			iframe{
                height: 250px;
                border: none;
			}
		</style>
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
									<li class="breadcrumb-item"><a href="#">My Events</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-calendar-day"></i> My Events</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-5 col-md-6 col-12">
							<form class="form_default pt-auto mb-3">
								<input type="hidden" class="form-control" id="evt_id">		
								<div class="row">
									<div class="col-12 mb-3">    
										<label class="form-label">Event Type</label>
										<select class="form-control cmbEventType">
											<option value="0">Public</option>
											<option value="1">Private</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter event type
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-12 mb-3">    
										<label class="form-label">Heading</label>
										<input type="text" class="form-control" id="evt_name" placeholder="Heading" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter heading
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-12 mb-3">    
										<label class="form-label">Sub Title</label>
										<textarea class="form-control" id="evt_subheadline" placeholder="Sub Heading" required></textarea>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter sub heading
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-12 mb-3">    
										<label class="form-label">Date</label>
										<input type="text" class="form-control datepicker-date" id="evt_date" value="<?php echo date("Y-m-d"); ?>" required>										
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please select event date
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-12 mb-3">    
										<label class="form-label">Time</label>
										<input type="text" class="form-control datepicker-time" value="<?php echo date("H:i:s"); ?>" id="evt_time" required>										
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please select event time
										</div>
									</div>								
								</div>
								<div class="row">												
									<div class="col mb-2">  
										<label class="font-weight-bold pb-2">Choose Location</label>
										<div class="mb-3" hidden>  
											<label class="form-label">Country</label>
											<select class="form-control cmbCountry form-control-chosen" data-placeholder="Choose a Country..." required>
												<option value="" disabled selected>Loading...</option>
											</select>
											<div class="valid-feedback">
												<i class="fas fa-lg fa-check-circle"></i> Looks good! 
											</div>
											<div class="invalid-feedback">
												<i class="fas fa-lg fa-exclamation-circle"></i> Please choose country
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">State</label>
											<select class="form-control cmbState form-control-chosen" data-placeholder="Choose a State..." required>
												<option value="" disabled selected>Loading...</option>
											</select>													
											<div class="valid-feedback">
												<i class="fas fa-lg fa-check-circle"></i> Looks good! 
											</div>
											<div class="invalid-feedback">
												<i class="fas fa-lg fa-exclamation-circle"></i> Please choose state
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">City</label>
											<select class="form-control cmbCity form-control-chosen" data-placeholder="Choose a city..." required>
												<option value="" disabled selected>Loading...</option>
											</select>
											<div class="valid-feedback">
												<i class="fas fa-lg fa-check-circle"></i> Looks good! 
											</div>
											<div class="invalid-feedback">
												<i class="fas fa-lg fa-exclamation-circle"></i> Please enter city
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 mb-3"> 
										<label class="form-label">Description</label>
										<textarea class="form-control summernote" id="evt_desc" rows="5" required></textarea>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter description
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-12">
										<button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Add</button>
										<button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Update</button>
										<button class="btn btn-secondary" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-xl-7 col-lg-7 col-md-6 col-12">
							<div class="table-responsive">
								<table id="tblEvent" class="table table-bordered table-hover table-sm font-size-sm" style="width:100%">
									<thead class="thead-dark">
										<tr>
											<th></th>                                
											<th></th>                                
											<th>Type</th>                                        
											<th>Event</th>                                        
											<th>Info</th>                                       
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
			function saveEvent() {
				var evt_type = $('.cmbEventType').val();
				var evt_name = $('#evt_name').val();
				var evt_subheadline = $('#evt_subheadline').val();
				var evt_desc = $('#evt_desc').summernote('code');
				var evt_country = $('.cmbCountry').val();
				var evt_state = $('.cmbState').val();
				var evt_city = $('.cmbCity').val();
				var evt_location = $('#evt_location').val();
				var evt_date = $("#evt_date").val();
				var evt_time = $("#evt_time").val();
				var postdata = {
					action: "saveEvent",
					evt_name: evt_name,
					evt_subheadline: evt_subheadline,
					evt_desc: evt_desc,
					evt_country: evt_country,
					evt_state: evt_state,
					evt_city: evt_city,
					evt_location: evt_location,
					evt_date: evt_date,
					evt_time: evt_time,
					evt_type: evt_type
				}
				$.post('bkp/controllers/eventController.php', postdata, function (e) {
					if (parseInt(e.msgType) == 1) {
						swal("Event Process!", e.msg, "success");
						clearEvent();
					} else {
						swal("Event Process!", e.msg, "warning");
					}
				}, "json");
			}

			function editEvent() {
				var evt_type = $('.cmbEventType').val();
				var evt_name = $('#evt_name').val();
				var evt_subheadline = $('#evt_subheadline').val();
				var evt_desc = $('#evt_desc').summernote('code');
				var evt_country = $('.cmbCountry').val();
				var evt_state = $('.cmbState').val();
				var evt_city = $('.cmbCity').val();
				var evt_location = $('#evt_location').val();
				var evt_date = $("#evt_date").val();
				var evt_time = $("#evt_time").val();
				var evt_id = $("#evt_id").val();
				var postdata = {
					action: "editEvent",
					evt_name: evt_name,
					evt_subheadline: evt_subheadline,
					evt_desc: evt_desc,
					evt_country: evt_country,
					evt_state: evt_state,
					evt_city: evt_city,
					evt_location: evt_location,
					evt_date: evt_date,
					evt_time: evt_time,
					evt_id: evt_id,
					evt_type: evt_type
				}
				$.post('bkp/controllers/eventController.php', postdata, function (e) {
					if (parseInt(e.msgType) == 1) {
						swal("Event Process!", e.msg, "success");
						clearEvent();
					} else {
						swal("Event Process!", e.msg, "error");
					}
				}, "json");
			}

			function clearEvent() {
				$('#evt_name').val('');
				$('#evt_subheadline').val('');
				$('#evt_desc').summernote('reset');
				$('#evt_desc').summernote('code', '');
				$('#evt_location').val('');
				$("#evt_id").val('');
				$('#btn_save').prop('hidden', false);
				$('#btn_edit').prop('hidden', true);
				$('.form_default').removeClass('was-validated');
				tblEvent();
			}

			function tblEvent(callback) {
				var tbldata = "";
				$.post('bkp/controllers/eventController.php', {action: 'tblEventByLoggedExecutive'}, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="4" class="bg-danger text-center text-white">Events not available</td>';
						tbldata += '</tr>';
						$('#tblEvent tbody').html('').append(tbldata);
					} else {
						$.each(e, function (index, qdt) {
							index++;
							tbldata += '<tr>';
							tbldata += '<td>';
							tbldata += '<div class="btn-group btn-group-sm">';
							tbldata += '<button class="btn btn-primary btn_select" value="' + qdt.evt_id + '" data-toggle="tooltip" data-placement="top" title="Load data for update"><i class="fas fa-edit"></i></button>';
							tbldata += '<button class="btn btn-primary btn_delete" value="' + qdt.evt_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
							tbldata += '<button class="btn btn-primary btn_uploadimge" value="' + qdt.evt_id + '" data-toggle="tooltip" data-placement="top" title="Upload Image"><i class="fas fa-image"></i></button>';
							tbldata += '<button class="btn btn-primary btn_createcategory" value="' + qdt.evt_id + '" data-toggle="tooltip" data-placement="top" title="Create selling item categories under the created event"><i class="fas fa-lg fa-list-alt"></i></button>';
							tbldata += '<button class="btn btn-primary btn_additems" value="' + qdt.evt_id + '" data-toggle="tooltip" data-placement="top" title="Add Items"><i class="fas fa-cart-plus"></i></button>';
							tbldata += '<button class="btn btn-primary btn_eventShare" value="' + qdt.evt_id + '" data-toggle="tooltip" data-placement="top" title="share Event"><i class="fas fa-share-alt"></i></button>';
							tbldata += '<button class="btn btn-primary btn_invitedUsers" value="' + qdt.evt_id + '" data-toggle="tooltip" data-placement="top" title="List of Invited Members"><i class="fas fa-gift"></i></button>';
							tbldata += '</div>';
							tbldata += '</td>';
							tbldata += '<td></td>';
							if (parseInt(qdt.evt_type) == 0) {
								tbldata += '<td>Public</td>';
							} else {
								tbldata += '<td>Private</td>';
							}
							tbldata += '<td><strong>' + qdt.evt_name + '</strong><br>' + qdt.evt_subheadline + '</td>';
							tbldata += '<td><strong>Location: </strong><br>' + qdt.evt_location + ', ' + qdt.evt_city_name + ', ' + qdt.evt_state_name + '<br><strong>Date & Time: </strong>' + qdt.evt_date + ' | ' + qdt.evt_time + '</td>';
							tbldata += '</tr>';
						});


						if ($.fn.DataTable.isDataTable('#tblEvent')) {
							//re initialize 
							$('#tblEvent').DataTable().destroy();
							$('#tblEvent tbody').empty();
							$('#tblEvent tbody').html('').append(tbldata);
							$('#tblEvent').DataTable({
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
								//							order: [2, 'asc']
							});
						} else {
							//initilized                    
							$('#tblEvent tbody').html('').append(tbldata);
							$('#tblEvent').DataTable({
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
							});
						}
						$('[data-toggle="tooltip"]').tooltip();
					}

					//					$('#tblEvent').on('draw.dt', function () {
					//						$('.btn_select').click(function () {
					//							$('#btn_save').prop('hidden', true);
					//							$('#btn_edit').prop('hidden', false);
					//							var evt_id = $(this).val();
					//							$.post('controllers/blogController.php', {action: 'getBlogByID', evt_id: evt_id}, function (e) {
					//								$.each(e, function (index, qdt) {
					//									$('#evt_id').val(qdt.evt_id);
					//									$('#blg_title').val(qdt.blg_title);
					//									$('#blg_body').summernote('reset');
					//									$('#blg_body').summernote('code', qdt.blg_body);
					//									cmbRelateCombo('90', '2', '.cmbBLOGMainCat', qdt.blg_maincat, function () {
					//										cmbRelateSubCombo('91', qdt.blg_maincat, '.cmbBLOGSubCat', qdt.blg_subcat);
					//									});
					//								});
					//							}, "json");
					//						});
					//
					//						$('.btn_delete').click(function () {
					//							var evt_id = $(this).val();
					//							swal({
					//								title: "Are you sure?",
					//								text: "Do you want to delete this blog ?",
					//								type: "warning",
					//								showCancelButton: true,
					//								confirmButtonClass: "btn-danger",
					//								cancelButtonClass: "btn-light",
					//								confirmButtonText: "Yes, delete it!",
					//								closeOnConfirm: false
					//							}, function () {
					//								$.post('controllers/blogController.php', {action: 'deleteBlog', evt_id: evt_id}, function (e) {
					//									if (parseInt(e.msgType) == 1) {
					//										swal("Good Job!", e.msg, "success");
					//										clearBlog();
					//									} else {
					//										swal("Error!", e.msg, "error");
					//									}
					//								}, "json");
					//							});
					//						});
					//						$('.btn_uploadimge').click(function () {
					//							var evt_id = $(this).val();
					//							var modelImgUploderStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
					//									'<div class="modal-dialog" role="document">' +
					//									'<div class="modal-content">' +
					//									'<div class="modal-header">' +
					//									'<h5 class="modal-title" id="exampleModalLabel">Blog Header Image Upload</h5>' +
					//									'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
					//									'<span aria-hidden="true">&times;</span>' +
					//									'</button>' +
					//									'</div>' +
					//									'<div class="modal-body">' +
					//									//here is model body start                        
					//									'<iframe  id="iframe_imageupload" src="blog_imageupload.php?evt_id=' + evt_id + '" width="100%"></iframe> ' +
					//									//here is model body end
					//									'</div>' +
					//									//start model footer
					//									'<div class="modal-footer">' +
					//									'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
					//									'</div>' +
					//									//end modal footer
					//									'</div>' +
					//									'</div>' +
					//									'</div>';
					//
					//							var modelImgUploder = $(modelImgUploderStr);
					//							modelImgUploder.modal('show');
					//						});
					//					});



					$('.btn_select').click(function () {
						$('#btn_save').prop('hidden', true);
						$('#btn_edit').prop('hidden', false);
						var evt_id = $(this).val();
						$.post('bkp/controllers/eventController.php', {action: 'getEventByID', evt_id: evt_id}, function (e) {
							$.each(e, function (index, qdt) {
								$('#evt_name').val(qdt.evt_name);
								$('#evt_subheadline').val(qdt.evt_subheadline);
								$('#evt_desc').summernote('reset');
								$('#evt_desc').summernote('code', qdt.evt_desc);
								$('#evt_location').val(qdt.evt_location);
								$("#evt_date").val(qdt.evt_date);
								$("#evt_time").val(qdt.evt_time);
								$('#evt_id').val(qdt.evt_id);
								$('.cmbEventType').val(qdt.evt_type);
								chosenRefresh();
								cmbRelateCombo('26', '2', '.cmbCountry', qdt.evt_country);
								cmbRelateSubCombo('27', qdt.evt_country, '.cmbState', qdt.evt_state);
								cmbRelateSubCombo('30', qdt.evt_state, '.cmbCity', qdt.evt_city);
							});
						}, "json");
					});

					$('.btn_invitedUsers').click(function () {
						var evt_id = $(this).val();
						var inviteModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">' +
								'<div class="modal-content">' +
								'<div class="modal-header">' +
								'<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-gift"></i> Invited Members</h5>' +
								'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
								'<span aria-hidden="true">&times;</span>' +
								'</button>' +
								'</div>' +
								'<div class="modal-body" style="min-height:450px">' +
								//here is model body start                        
								'<div class="row">' +
								'<input type="hidden" id="selectedUsers">' +
								'<div class="col-lg-12 col-12">' +
								'<button class="btn btn-primary btn-removeInvitation mt-3 mb-3">Remove Selected Invitation</button>' +
								'<br><span class="badge badge-dark px-3 py-2 font-size-lg">Total Invitation Sent: <span id="total_invitation">0</span></span>' +
								'	<span class="badge badge-primary px-3 py-2 font-size-lg">Total Accepted: <span id="total_accepted">0</span></span>' +
								'<div class="table-responsive mt-2">' +
								'<table id="tblUsers" class="table font-size-sm" style="width:100%">' +
								'<thead class="thead-dark">' +
								'<tr>' +
								'<th>' +
								'<div class="custom-control custom-checkbox">' +
								'<input class="custom-control-input" type="checkbox" id="selectAll">' +
								'<label class="custom-control-label" for="selectAll">All</label>' +
								'</div>' +
								'</th> ' +
								'<th></th>' +
								'<th>Member</th>' +
								'<th>Invited Date</th>' +
								'<th>Status</th>' +
								'</tr>' +
								'</thead>' +
								'<tbody>' +
								'</tbody>' +
								'</table>' +
								' </div>' +
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
						var inviteModal = $(inviteModalStr);
						inviteModal.modal('show');

						function tblLoadAllInvitedUserByEvent() {
							var tbldata = "";
							var total_invitation = 0;
							var total_accepted = 0;
							$.post('bkp/controllers/userController.php', {action: 'tblLoadAllInvitedUserByEvent', evt_id: evt_id}, function (e) {
								if (e === undefined || e.length === 0 || e === null) {
									tbldata += '<tr>';
									tbldata += '<td colspan="5" class="bg-danger text-white text-center">Members Not Available</td>';
									tbldata += '</tr>';

									inviteModal.find('#tblUsers tbody').html('').append(tbldata);
								} else {
									$.each(e, function (index, qdt) {
										index++;

										tbldata += '<tr>';
										tbldata += '<td>';
										tbldata += '<div class="custom-control custom-checkbox">';
										tbldata += '<input class="custom-control-input chkUser" type="checkbox" id="chk-' + qdt.evtsh_id + '" value="' + qdt.evtsh_id + '">';
										tbldata += '<label class="custom-control-label" for="chk-' + qdt.evtsh_id + '"></label>';
										tbldata += '</div>'
										tbldata += '</td>';
										tbldata += '<td></td>';
										tbldata += '<td><strong>' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</strong><br>Email: ' + qdt.usr_email + ' Phone: ' + qdt.usr_phone + '</td>';
										tbldata += '<td>' + qdt.evtsh_date + '</td>';

										total_invitation += 1;
										if (parseInt(qdt.evtsh_join_status) == 0) {
											tbldata += '<td><span class="badge badge-info font-size-md p-2">Awaiting Acceptance</span></td>';
										} else {
											total_accepted += 1;
											tbldata += '<td><span class="badge badge-success font-size-md p-2">Accepted</span></td>';
										}

										tbldata += '</tr>';

									});
									inviteModal.find('#total_invitation').html('').append(total_invitation);
									inviteModal.find('#total_accepted').html('').append(total_accepted);


									if ($.fn.DataTable.isDataTable(inviteModal.find('#tblUsers'))) {
										inviteModal.find('#tblUsers').DataTable().destroy();
									}
									inviteModal.find('#tblUsers tbody').html('').append(tbldata);
									inviteModal.find('[data-toggle="tooltip"]').tooltip();
									inviteModal.find('#tblUsers').DataTable({
										ordering: false,
										responsive: {
											details: {
												type: 'column',
												target: 'tr'
											}
										},
										columnDefs: [
											{'targets': 0, 'checkboxes': {'selectRow': true}},
											{className: 'control text-right', orderable: false, targets: 1},
											{orderable: false, targets: 0}
										],
										drawCallback: function (settings) {
											//run all functions after draw
											$(this).off('click.rowClick').on('click.rowClick', '.chkUser', function () {

												inviteModal.find('#selectAll').prop('checked', false);
												var ar = [];
												var es = inviteModal.find('.chkUser' + ':checked');
												var v;
												if ($(this).is(':checked')) {
													es.each(function (index) {
														ar.push($(this).val());
													});
												} else {
													es.each(function (index) {
														ar.push($(this).val());
													});
												}
												v = ar.join(',');
												inviteModal.find('#selectedUsers').val(v);
											});
										}
									});

									inviteModal.find('#selectAll').click(function () {
										if ($(this).is(':checked')) {
											inviteModal.find('.chkUser').prop('checked', true);
										} else {
											inviteModal.find('.chkUser').prop('checked', false);
										}
										var ar = [];
										var es = inviteModal.find('.chkUser' + ':checked');
										var v;
										if ($(this).is(':checked')) {
											es.each(function (index) {
												ar.push($(this).val());
											});
										} else {
											es.each(function (index) {
												ar.push($(this).val());
											});
										}
										v = ar.join(',');
										inviteModal.find('#selectedUsers').val(v);
									});

								}

							}, "json")
						}

						inviteModal.on('shown.bs.modal', function () {
							tblLoadAllInvitedUserByEvent();
						});
						inviteModal.find('.btn-removeInvitation').click(function () {
							var evtsh_id = inviteModal.find('#selectedUsers').val();
							if (evtsh_id === "") {
								swal("SHARE EVENT!", "Please select at least one user for remove invitation", "warning");
							} else {
								swal({
									title: "Are you sure?",
									text: "Do you want to remove selected invitations?",
									type: "warning",
									showCancelButton: true,
									cancelButtonClass: "btn-light",
									closeOnConfirm: false
								}, function () {
									swal({
										title: "SHARE EVENT!",
										text: "Please wait for remove selected invitations...",
										imageUrl: 'assets/img/gif/1.gif',
										showConfirmButton: false
									});
									$.post('bkp/controllers/eventController.php', {action: 'removeInvitation', evtsh_id: evtsh_id}, function (e) {
										if (parseInt(e.msgType) == 1) {
											swal("SHARE EVENT!", e.msg, "success");
											tblLoadAllInvitedUserByEvent();
										} else {
											swal("SHARE EVENT!", e.msg, "warning");
										}
									}, "json");
								});
							}
						});
					});

					$('.btn_eventShare').click(function () {
						var evt_id = $(this).val();
						var eventItemModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">' +
								'<div class="modal-content">' +
								'<div class="modal-header">' +
								'<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-share-alt"></i> Share Invitation</h5>' +
								'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
								'<span aria-hidden="true">&times;</span>' +
								'</button>' +
								'</div>' +
								'<div class="modal-body" style="min-height:450px">' +
								//here is model body start                        
								'<div class="row">' +
								'<input type="hidden" id="selectedUsers">' +
								'<div class="col-lg-4 col-12">' +
								'<label for="evtem_name">Find Members for Invite Filtering By</label>' +
								'<div class="form-row" hidden>' +
								'<div class="form-group col-xl-1 col-12">' +
								'<div class="custom-control custom-radio">' +
								'<input class="custom-control-input filter_by" type="radio" name="filter_by" id="radio_1" value="1" checked>' +
								'<label class="custom-control-label" for="radio_1"></label>' +
								'</div>' +
								'</div>' +
								'<div class="form-group col-xl-11 col-12">' +
								'<select class="col-12 form-control cmbCountry form-control-chosen" data-placeholder="Choose a Country..." required>' +
								'<option value="" disabled selected>Loading...</option>' +
								'</select>' +
								'</div>' +
								'</div>' +
								'<div class="row">' +
								'<div class="form-group col-xl-1 col-12">' +
								'<div class="custom-control custom-radio">' +
								'<input class="custom-control-input filter_by" type="radio" name="filter_by" id="radio_2" value="2">' +
								'<label class="custom-control-label" for="radio_2"></label>' +
								'</div>' +
								'</div>' +
								'<div class="form-group col-xl-11 col-12">' +
								'<select class="col-12 form-control cmbState form-control-chosen" data-placeholder="Choose a State..." required>' +
								'<option value="" disabled selected>Loading...</option>' +
								'</select>' +
								'</div>' +
								'</div>' +
								'<div class="row">' +
								'<div class="form-group col-xl-1 col-12">' +
								'<div class="custom-control custom-radio">' +
								'<input class="custom-control-input filter_by" type="radio" name="filter_by" id="radio_3" value="3">' +
								'<label class="custom-control-label" for="radio_3"></label>' +
								'</div>' +
								'</div>' +
								'<div class="form-group col-xl-11 col-12">' +
								'<select class="col-12 form-control cmbCity form-control-chosen" data-placeholder="Choose a city..." required>' +
								'<option value="" disabled selected>Loading...</option>' +
								'</select>' +
								'</div>' +
								'</div>' +
								'<button class="btn btn-primary btn-sendInvitation mt-3">Send Invitation</button>' +
								'</div>' +
								'<div class="col-lg-8 col-12">' +
								'<div class="table-responsive">' +
								'<table id="tblUsers" class="table font-size-sm" style="width:100%">' +
								'<thead class="thead-dark">' +
								'<tr>' +
								'<th>' +
								'<div class="custom-control custom-checkbox">' +
								'<input class="custom-control-input" type="checkbox" id="selectAll">' +
								'<label class="custom-control-label" for="selectAll">All</label>' +
								'</div>' +
								'</th> ' +
								'<th></th>' +
								'<th>Member</th>' +
								'</tr>' +
								'</thead>' +
								'<tbody>' +
								'</tbody>' +
								'</table>' +
								' </div>' +
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

						function tblLoadAllUsersByLocation(country, state, city, filter_by) {
							var tbldata = "";
							$.post('bkp/controllers/userController.php', {action: 'tblLoadAllUsersByLocation', evtsh_event: evt_id}, function (e) {
								if (e === undefined || e.length === 0 || e === null) {
									tbldata += '<tr>';
									tbldata += '<td colspan="3" class="bg-danger text-white text-center">Members Not Available</td>';
									tbldata += '</tr>';

									eventItemModal.find('#tblUsers tbody').html('').append(tbldata);
								} else {
									$.each(e, function (index, qdt) {
										index++;
										if (filter_by !== undefined || filter_by !== null) {
											if (parseInt(filter_by) == 3) {
												//bycity
												if (parseInt(city) == parseInt(qdt.pro_city)) {
													//run
													tbldata += '<tr>';
													tbldata += '<td>';
													tbldata += '<div class="custom-control custom-checkbox">';
													tbldata += '<input class="custom-control-input chkUser" type="checkbox" id="chk-' + qdt.usr_id + '" value="' + qdt.usr_id + '">';
													tbldata += '<label class="custom-control-label" for="chk-' + qdt.usr_id + '"></label>';
													tbldata += '</div>'
													tbldata += '</td>';
													tbldata += '<td></td>';
													tbldata += '<td><strong>' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</strong><br>Email: ' + qdt.usr_email + ' Phone: ' + qdt.usr_phone + '</td>';
													tbldata += '</tr>';
												}
											} else if (parseInt(filter_by) == 2) {
												//bystate
												if (parseInt(state) == parseInt(qdt.pro_state)) {
													//run
													tbldata += '<tr>';
													tbldata += '<td>';
													tbldata += '<div class="custom-control custom-checkbox">';
													tbldata += '<input class="custom-control-input chkUser" type="checkbox" id="chk-' + qdt.usr_id + '" value="' + qdt.usr_id + '">';
													tbldata += '<label class="custom-control-label" for="chk-' + qdt.usr_id + '"></label>';
													tbldata += '</div>'
													tbldata += '</td>';
													tbldata += '<td></td>';
													tbldata += '<td><strong>' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</strong><br>Email: ' + qdt.usr_email + ' Phone: ' + qdt.usr_phone + '</td>';
													tbldata += '</tr>';
												}
											} else if (parseInt(filter_by) == 1) {
												//bycountry
												if (parseInt(country) == parseInt(qdt.pro_country)) {
													//run
													tbldata += '<tr>';
													tbldata += '<td>';
													tbldata += '<div class="custom-control custom-checkbox">';
													tbldata += '<input class="custom-control-input chkUser" type="checkbox" id="chk-' + qdt.usr_id + '" value="' + qdt.usr_id + '">';
													tbldata += '<label class="custom-control-label" for="chk-' + qdt.usr_id + '"></label>';
													tbldata += '</div>'
													tbldata += '</td>';
													tbldata += '<td></td>';
													tbldata += '<td><strong>' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</strong><br>Email: ' + qdt.usr_email + ' Phone: ' + qdt.usr_phone + '</td>';
													tbldata += '</tr>';
												}
											}
											//										alert("ok");
										} else {
											tbldata += '<tr>';
											tbldata += '<td>';
											tbldata += '<div class="custom-control custom-checkbox">';
											tbldata += '<input class="custom-control-input chkUser" type="checkbox" id="chk-' + qdt.usr_id + '" value="' + qdt.usr_id + '">';
											tbldata += '<label class="custom-control-label" for="chk-' + qdt.usr_id + '"></label>';
											tbldata += '</div>'
											tbldata += '</td>';
											tbldata += '<td></td>';
											tbldata += '<td><strong>' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</strong><br>Email: ' + qdt.usr_email + ' Phone: ' + qdt.usr_phone + '</td>';
											tbldata += '</tr>';
										}

									});

									//									console.log(tbldata);
									if (tbldata === "") {
										tbldata += '<tr>';
										tbldata += '<td colspan="3" class="bg-danger text-white text-center">Members Not Available</td>';
										tbldata += '</tr>';

										eventItemModal.find('#tblUsers tbody').html('').append(tbldata);
									} else {
										if ($.fn.DataTable.isDataTable(eventItemModal.find('#tblUsers'))) {
											eventItemModal.find('#tblUsers').DataTable().destroy();
										}
										eventItemModal.find('#tblUsers tbody').html('').append(tbldata);
										eventItemModal.find('[data-toggle="tooltip"]').tooltip();
										eventItemModal.find('#tblUsers').DataTable({
											ordering: false,
											responsive: {
												details: {
													type: 'column',
													target: 'tr'
												}
											},
											columnDefs: [
												{'targets': 0, 'checkboxes': {'selectRow': true}},
												{className: 'control text-right', orderable: false, targets: 1},
												{orderable: false, targets: 0}
											],
											drawCallback: function (settings) {
												//run all functions after draw
												$(this).off('click.rowClick').on('click.rowClick', '.chkUser', function () {

													eventItemModal.find('#selectAll').prop('checked', false);
													var ar = [];
													var es = eventItemModal.find('.chkUser' + ':checked');
													var v;
													if ($(this).is(':checked')) {
														es.each(function (index) {
															ar.push($(this).val());
														});
													} else {
														es.each(function (index) {
															ar.push($(this).val());
														});
													}
													v = ar.join(',');
													eventItemModal.find('#selectedUsers').val(v);
												});
											}
										});

										eventItemModal.find('#selectAll').click(function () {
											if ($(this).is(':checked')) {
												eventItemModal.find('.chkUser').prop('checked', true);
											} else {
												eventItemModal.find('.chkUser').prop('checked', false);
											}
											var ar = [];
											var es = eventItemModal.find('.chkUser' + ':checked');
											var v;
											if ($(this).is(':checked')) {
												es.each(function (index) {
													ar.push($(this).val());
												});
											} else {
												es.each(function (index) {
													ar.push($(this).val());
												});
											}
											v = ar.join(',');
											eventItemModal.find('#selectedUsers').val(v);
										});

										eventItemModal.find('.btn_deleteItem').click(function () {
											var evtem_id = $(this).val();
											swal({
												title: "Are you sure?",
												text: "Do you want to remove this item ?",
												type: "warning",
												showCancelButton: true,
												confirmButtonClass: "btn-danger",
												cancelButtonClass: "btn-light",
												confirmButtonText: "Yes, Delete!",
												closeOnConfirm: false
											}, function () {
												$.post('bkp/controllers/eventController.php', {action: 'deleteEventCategoryItem', evtem_id: evtem_id}, function (e) {
													if (parseInt(e.msgType) == 1) {
														swal("Event Category Items Process!", e.msg, "success");
														tblEventCategoryItems(eventItemModal, evt_id, evtem_category);
													} else {
														swal("Event Category Items Process!", e.msg, "warning");
													}
												}, "json");
											});
										});
									}
								}

							}, "json")
						}

						eventItemModal.on('shown.bs.modal', function () {
							eventItemModal.find('select').chosen();
							cmbRelateCombo('26', '2', '.cmbCountry', '238', function () {
								var country = eventItemModal.find('.cmbCountry').val();
								cmbRelateSubCombo('27', country, '.cmbState', false, function () {
									var state = eventItemModal.find('.cmbState').val();
									cmbRelateSubCombo('30', state, '.cmbCity', false, function () {
										var city = eventItemModal.find('.cmbCity').val();
										tblLoadAllUsersByLocation(country, state, city, 1);
									});
								});
							});
						});

						eventItemModal.find('.btn-sendInvitation').click(function () {
							var usr_array = eventItemModal.find('#selectedUsers').val();
							if (usr_array === "") {
								swal("SHARE EVENT!", "Please select at least one user for send invitation", "warning");
							} else {
								swal({
									title: "Are you sure?",
									text: "Do you want to send invitation to selected usres?",
									type: "info",
									showCancelButton: true,
									cancelButtonClass: "btn-light",
									closeOnConfirm: false
								}, function () {
									swal({
										title: "SHARE EVENT!",
										text: "Please wait for send invitations to selected users...",
										imageUrl: 'assets/img/gif/1.gif',
										showConfirmButton: false
									});
									$.post('bkp/controllers/eventController.php', {action: 'sendInvitation', usr_array: usr_array, evt_id: evt_id}, function (e) {
										if (parseInt(e.msgType) == 1) {
											swal("SHARE EVENT!", e.msg, "success");
											var country = eventItemModal.find('.cmbCountry').val();
											var state = eventItemModal.find('.cmbState').val();
											var city = eventItemModal.find('.cmbCity').val();
											tblLoadAllUsersByLocation(country, state, city, 1);
										} else {
											swal("SHARE EVENT!", e.msg, "warning");
										}
									}, "json");
								});
							}
						});

						eventItemModal.find('.cmbCountry').change(function () {
							var country = eventItemModal.find(this).val();
							cmbRelateSubCombo('27', country, '.cmbState', false, function () {
								var state = eventItemModal.find('.cmbState').val();
								cmbRelateSubCombo('30', state, '.cmbCity', false, function () {
									var city = eventItemModal.find('.cmbCity').val();
									tblLoadAllUsersByLocation(country, state, city, 1);
								});
							});
						});
						eventItemModal.find('.cmbState').change(function () {
							var country = eventItemModal.find('.cmbCountry').val();
							var state = eventItemModal.find(this).val();
							cmbRelateSubCombo('30', state, '.cmbCity', false, function () {
								var city = eventItemModal.find('.cmbCity').val();
								tblLoadAllUsersByLocation(country, state, city, 2);
							});
						});

						eventItemModal.find('.filter_by').click(function () {
							var country = eventItemModal.find('.cmbCountry').val();
							var state = eventItemModal.find('.cmbState').val();
							var city = eventItemModal.find('.cmbCity').val();
							if ($(this).is(':checked')) {
								tblLoadAllUsersByLocation(country, state, city, $(this).val());
							}
						});

						eventItemModal.find('.cmbCity').change(function () {
							var country = eventItemModal.find('.cmbCountry').val();
							var state = eventItemModal.find('.cmbState').val();
							var city = eventItemModal.find(this).val();
							tblLoadAllUsersByLocation(country, state, city, 3);
						});
					});

					$('.btn_additems').click(function () {
						var evt_id = $(this).val();
						var eventItemModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">' +
								'<div class="modal-content">' +
								'<div class="modal-header">' +
								'<h5 class="modal-title" id="exampleModalLabel">Add Event Items</h5>' +
								'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
								'<span aria-hidden="true">&times;</span>' +
								'</button>' +
								'</div>' +
								'<div class="modal-body">' +
								//here is model body start                        
								'<div class="row">' +
								'<div class="col-lg-7">' +
								'<form id="form_modal" novalidate>' +
								'<input type="hidden" id="evtem_id">' +
								'<div class="form-group">' +
								'<label for="evtem_name">Category</label>' +
								'<select class="col-12 form-control cmbEventCategory form-control-chosen" data-placeholder="Choose a category..." required>' +
								'<option value="" disabled selected>Loading...</option>' +
								'</select>' +
								'</div>' +
								'<div class="form-group">' +
								'<label for="evtem_name">Item</label>' +
								'<input type="text" class="form-control" id="evtem_name" placeholder="Item" required>' +
								'<div class="valid-feedback">' +
								'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
								'</div>' +
								'<div class="invalid-feedback">' +
								'<i class="fas fa-lg fa-exclamation-circle"></i> Please enter item name' +
								'</div>' +
								'</div>' +
								'<div class="form-group">' +
								'<label for="evtem_price">Price</label>' +
								'<input type="text" class="form-control" id="evtem_price" value="0.00" placeholder="Price" required>' +
								'<div class="valid-feedback">' +
								'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
								'</div>' +
								'<div class="invalid-feedback">' +
								'<i class="fas fa-lg fa-exclamation-circle"></i> Please enter price' +
								'</div>' +
								'</div>' +
								'<div class="form-group">' +
								'<label for="evtem_name">Qty</label>' +
								'<input type="number" class="form-control" id="evtem_qty" value="0" min="0" required>' +
								'<div class="valid-feedback">' +
								'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
								'</div>' +
								'<div class="invalid-feedback">' +
								'<i class="fas fa-lg fa-exclamation-circle"></i> Please enter qty' +
								'</div>' +
								'</div>' +
								'<div class="form-group">' +
								'<label for="evtem_desc">Description</label>' +
								'<textarea class="form-control summernote" id="evtem_desc" rows="5" required></textarea>' +
								'<div class="valid-feedback">' +
								'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
								'</div>' +
								'<div class="invalid-feedback">' +
								'<i class="fas fa-lg fa-exclamation-circle"></i> Please enter description' +
								'</div>' +
								'</div>' +
								'</form>' +
								'</div>' +
								'<div class="col-lg-5">' +
								'<div class="table-responsive">' +
								'<table id="tblEventCategoryItems" class="table font-size-sm" style="width:100%">' +
								'<thead class="thead-dark">' +
								'<tr>' +
								'<th></th>' +
								'<th>Item</th>' +
								'</tr>' +
								'</thead>' +
								'<tbody>' +
								'</tbody>' +
								'</table>' +
								' </div>' +
								'</div>' +
								'</div>' +
								//here is model body end
								'</div>' +
								//start model footer
								'<div class="modal-footer">' +
								'<button type="button" class="btn btn-primary" id="btn_addItem">Add</button>' +
								'<button type="button" class="btn btn-primary" id="btn_editItem" hidden>Update</button>' +
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

						function cmbEventCategory(eventItemModal, callback) {
							var selectbox = "";
							$.post('bkp/controllers/eventController.php', {action: 'cmbEventCategory', evt_id: evt_id}, function (e) {
								if (e === undefined || e.length === 0 || e === null) {
									selectbox += '<option value="0">Category not available</option>';
								} else {
									$.each(e, function (index, qdt) {
										selectbox += '<option value="' + qdt.evtcat_id + '">' + qdt.evtcat_catname + '</option>';
									});
								}
								eventItemModal.find('.cmbEventCategory').html('').append(selectbox);
								chosenRefresh();
								if (callback !== undefined) {
									if (typeof callback === 'function') {
										callback();
									}
								}

							}, "json");
						}


						function tblEventCategoryItems(eventItemModal, evt_id, evtem_category) {
							var tbldata = "";
							$.post('bkp/controllers/eventController.php', {action: 'tblEventCategoryItems', evt_id: evt_id, evtem_category: evtem_category}, function (e) {
								if (e === undefined || e.length === 0 || e === null) {
									tbldata += '<tr>';
									tbldata += '<td colspan="2" class="bg-danger text-white text-center">Items not available</td>';
									tbldata += '</tr>';
								} else {
									$.each(e, function (index, qdt) {
										index++;
										tbldata += '<tr>';
										tbldata += '<td>';
										tbldata += '<div class="btn-group btn-group-sm">';
										tbldata += '<button class="btn btn-primary btn_selectItem" value="' + qdt.evtem_id + '" data-toggle="tooltip" data-placement="top" title="Load data for update"><i class="fas fa-lg fa-edit"></i></button>';
										tbldata += '<button class="btn btn-primary btn_deleteItem" value="' + qdt.evtem_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
										tbldata += '<button class="btn btn-primary btn_uploadItem" value="' + qdt.evtem_id + '" data-toggle="tooltip" data-placement="top" title="Upload Image"><i class="fas fa-lg fa-image"></i></button>';
										tbldata += '<button class="btn btn-primary btn_uploadItemSlider" value="' + qdt.evtem_id + '" data-toggle="tooltip" data-placement="top" title="Upload Image"><i class="fas fa-lg fa-images"></i></button>';
										tbldata += '</div>';
										tbldata += '</td>';
										tbldata += '<td><strong>' + qdt.evtem_name + '</strong><br>Price: ' + qdt.evtem_price + '<br>Qty: ' + qdt.evtem_qty + '</td>';
										tbldata += '</tr>';
									});
								}
								eventItemModal.find('#tblEventCategoryItems tbody').html('').append(tbldata);
								eventItemModal.find('[data-toggle="tooltip"]').tooltip();

								eventItemModal.find('.btn_selectItem').click(function () {
									var evtem_id = $(this).val();
									eventItemModal.find('#btn_addItem').prop('hidden', true);
									eventItemModal.find('#btn_editItem').prop('hidden', false);
									$.post('bkp/controllers/eventController.php', {action: 'getEventCategoryItemByID', evtem_id: evtem_id}, function (e) {
										$.each(e, function (index, qdt) {
											eventItemModal.find('#evtem_name').val(qdt.evtem_name);
											eventItemModal.find('#evtem_desc').summernote('reset');
											eventItemModal.find('#evtem_desc').summernote('code', qdt.evtem_desc);
											eventItemModal.find('#evtem_price').val(qdt.evtem_price);
											eventItemModal.find('#evtem_qty').val(qdt.evtem_qty);
											eventItemModal.find('#evtem_id').val(qdt.evtem_id);
										});
									}, "json");
								});

								eventItemModal.find('.btn_uploadItem').click(function () {
									var evtem_id = $(this).val();
									var modelImgUploderStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
											'<div class="modal-dialog modal-md" role="document">' +
											'<div class="modal-content">' +
											'<div class="modal-header">' +
											'<h5 class="modal-title" id="exampleModalLabel">Upload Item Photo (Max 1 Photo Allowed)</h5>' +
											'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
											'<span aria-hidden="true">&times;</span>' +
											'</button>' +
											'</div>' +
											'<div class="modal-body">' +
											//here is model body start                        
											'<iframe frameborder="0" scrolling="no" id="iframe_imageupload" src="eventItem_imageupload.php?id=' + evtem_id + '" width="100%"></iframe> ' +
											//here is model body end
											'</div>' +
											//start model footer
											'<div class="modal-footer">' +
											'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
											'</div>' +
											//end modal footer
											'</div>' +
											'</div>' +
											'</div>';

									var modelImgUploder = $(modelImgUploderStr);
									modelImgUploder.modal('show');
								});

								eventItemModal.find('.btn_uploadItemSlider').click(function () {
									var evtem_id = $(this).val();
									var modelImgUploderStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
											'<div class="modal-dialog modal-md" role="document">' +
											'<div class="modal-content">' +
											'<div class="modal-header">' +
											'<h5 class="modal-title" id="exampleModalLabel">Upload Item Slider Photos (Max 5 Photos Allowed)</h5>' +
											'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
											'<span aria-hidden="true">&times;</span>' +
											'</button>' +
											'</div>' +
											'<div class="modal-body">' +
											//here is model body start                        
											'<iframe frameborder="0" id="iframe_imageupload" src="eventitemslider_imageupload.php?id=' + evtem_id + '" width="100%"></iframe> ' +
											//here is model body end
											'</div>' +
											//start model footer
											'<div class="modal-footer">' +
											'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
											'</div>' +
											//end modal footer
											'</div>' +
											'</div>' +
											'</div>';

									var modelImgUploder = $(modelImgUploderStr);
									modelImgUploder.modal('show');
								});

								eventItemModal.find('.btn_deleteItem').click(function () {
									var evtem_id = $(this).val();
									swal({
										title: "Are you sure?",
										text: "Do you want to remove this item ?",
										type: "warning",
										showCancelButton: true,
										confirmButtonClass: "btn-danger",
										cancelButtonClass: "btn-light",
										confirmButtonText: "Yes, Delete!",
										closeOnConfirm: false
									}, function () {
										$.post('bkp/controllers/eventController.php', {action: 'deleteEventCategoryItem', evtem_id: evtem_id}, function (e) {
											if (parseInt(e.msgType) == 1) {
												swal("Event Category Items Process!", e.msg, "success");
												tblEventCategoryItems(eventItemModal, evt_id, evtem_category);
											} else {
												swal("Event Category Items Process!", e.msg, "warning");
											}
										}, "json");
									});
								});
							}, "json")
						}

						function clearFormData(eventItemModal) {
							eventItemModal.find('#evtem_id').val('');
							eventItemModal.find('#evtem_name').val('');
							eventItemModal.find('#evtem_desc').summernote('reset');
							eventItemModal.find('#evtem_desc').summernote('code', '');
							eventItemModal.find('#evtem_price').val('0.00');
							eventItemModal.find('#evtem_qty').val('0');
							eventItemModal.find('#btn_addItem').prop('hidden', false);
							eventItemModal.find('#btn_editItem').prop('hidden', true);
						}

						eventItemModal.on('shown.bs.modal', function () {
							eventItemModal.find('select').chosen();
							eventItemModal.find('.summernote').summernote({
								placeholder: 'Item Description Here',
								height: 200
							});
							clearFormData(eventItemModal);
							cmbEventCategory(eventItemModal, function () {
								var evtem_category = $('.cmbEventCategory').val();
								tblEventCategoryItems(eventItemModal, evt_id, evtem_category);
							});
						});

						eventItemModal.find('.cmbEventCategory').change(function () {
							var evtem_category = $(this).val();
							tblEventCategoryItems(eventItemModal, evt_id, evtem_category);
						});

						eventItemModal.find('#btn_editItem').click(function (event) {
							var evtem_category = eventItemModal.find('.cmbEventCategory').val();
							var evtem_name = eventItemModal.find('#evtem_name').val();
							var evtem_desc = eventItemModal.find('#evtem_desc').summernote('code');
							var evtem_price = eventItemModal.find('#evtem_price').val();
							var evtem_qty = eventItemModal.find('#evtem_qty').val();
							var evtem_id = eventItemModal.find('#evtem_id').val();
							var postData = {
								evt_id: evt_id,
								evtem_category: evtem_category,
								evtem_name: evtem_name,
								evtem_desc: evtem_desc,
								evtem_price: evtem_price,
								evtem_qty: evtem_qty,
								evtem_id: evtem_id,
								action: "editEventCategoryItem"
							}
							form.addClass('was-validated');
							if (form[0].checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							} else {
								$.post('bkp/controllers/eventController.php', postData, function (e) {
									if (parseInt(e.msgType) == 1) {
										swal("Event Category Items Process!", e.msg, "success");
										form.removeClass('was-validated');
										clearFormData(eventItemModal);
										tblEventCategoryItems(eventItemModal, evt_id, evtem_category);
									} else {
										swal("Event Category Items Process!", e.msg, "warning");
									}
								}, "json");
							}
						});

						eventItemModal.find('#btn_addItem').click(function (event) {
							var evtem_category = eventItemModal.find('.cmbEventCategory').val();
							var evtem_name = eventItemModal.find('#evtem_name').val();
							var evtem_desc = eventItemModal.find('#evtem_desc').summernote('code');
							var evtem_price = eventItemModal.find('#evtem_price').val();
							var evtem_qty = eventItemModal.find('#evtem_qty').val();
							var postData = {
								evt_id: evt_id,
								evtem_category: evtem_category,
								evtem_name: evtem_name,
								evtem_desc: evtem_desc,
								evtem_price: evtem_price,
								evtem_qty: evtem_qty,
								action: "saveEventCategoryItem"
							}
							form.addClass('was-validated');
							if (form[0].checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							} else {
								$.post('bkp/controllers/eventController.php', postData, function (e) {
									if (parseInt(e.msgType) == 1) {
										swal("Event Category Items Process!", e.msg, "success");
										form.removeClass('was-validated');
										clearFormData(eventItemModal);
										tblEventCategoryItems(eventItemModal, evt_id, evtem_category);
									} else {
										swal("Event Category Items Process!", e.msg, "warning");
									}
								}, "json");
							}
						});

					});

					$('.btn_createcategory').click(function () {
						var evt_id = $(this).val();
						var eventModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog modal-lg" role="document">' +
								'<div class="modal-content">' +
								'<div class="modal-header">' +
								'<h5 class="modal-title" id="exampleModalLabel">Add Event Categories</h5>' +
								'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
								'<span aria-hidden="true">&times;</span>' +
								'</button>' +
								'</div>' +
								'<div class="modal-body">' +
								//here is model body start                        
								'<div class="row">' +
								'<div class="col-lg-5">' +
								'<form id="form_modal" novalidate>' +
								'<div class="form-group">' +
								'<label for="evt_catname">Category Name</label>' +
								'<input type="text" class="form-control" id="evtcat_catname" placeholder="Category" required>' +
								'<div class="valid-feedback">' +
								'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
								'</div>' +
								'<div class="invalid-feedback">' +
								'<i class="fas fa-lg fa-exclamation-circle"></i> Please enter category' +
								'</div>' +
								'</div>' +
								'</form>' +
								'</div>' +
								'<div class="col-lg-7">' +
								'<div class="table-responsive">' +
								'<table id="tblEventCategory" class="table font-size-sm" style="width:100%">' +
								'<thead class="thead-dark">' +
								'<tr>' +
								'<th></th>' +
								'<th>Categories</th>' +
								'</tr>' +
								'</thead>' +
								'<tbody>' +
								'</tbody>' +
								'</table>' +
								' </div>' +
								'</div>' +
								'</div>' +
								//here is model body end
								'</div>' +
								//start model footer
								'<div class="modal-footer">' +
								'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
								'<button type="button" class="btn btn-primary" id="btn_add">Add</button>' +
								'</div>' +
								//end modal footer
								'</div>' +
								'</div>' +
								'</div>';
						var eventModal = $(eventModalStr);
						eventModal.modal('show');
						//eventModal.find('select').chosen();	

						function tblEventCategory(eventModal) {
							var tbldata = "";
							$.post('bkp/controllers/eventController.php', {action: 'tblEventCategory', evt_id: evt_id}, function (e) {
								if (e === undefined || e.length === 0 || e === null) {
									tbldata += '<tr>';
									tbldata += '<td colspan="2" class="bg-danger text-white text-center">Categories not available</td>';
									tbldata += '</tr>';
								} else {
									$.each(e, function (index, qdt) {
										index++;
										tbldata += '<tr>';
										tbldata += '<td>';
										tbldata += '<div class="btn-group btn-group-sm">';
										tbldata += '<button class="btn btn-primary btn_delete" value="' + qdt.evtcat_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
										tbldata += '<button class="btn btn-primary btn_uploadcategoryimg" value="' + qdt.evtcat_id + '" data-toggle="tooltip" data-placement="top" title="Upload Image"><i class="fas fa-lg fa-image"></i></button>';
										tbldata += '</div>';
										tbldata += '</td>';
										tbldata += '<td>' + qdt.evtcat_catname + '</td>';
										tbldata += '</tr>';
									});
								}
								eventModal.find('#tblEventCategory tbody').html('').append(tbldata);
								eventModal.find('[data-toggle="tooltip"]').tooltip();

								eventModal.find('.btn_uploadcategoryimg').click(function () {
									var evtcat_id = $(this).val();
									var modelImgUploderStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
											'<div class="modal-dialog modal-md" role="document">' +
											'<div class="modal-content">' +
											'<div class="modal-header">' +
											'<h5 class="modal-title" id="exampleModalLabel">Upload Event Category Photo</h5>' +
											'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
											'<span aria-hidden="true">&times;</span>' +
											'</button>' +
											'</div>' +
											'<div class="modal-body">' +
											//here is model body start                        
											'<iframe frameborder="0" scrolling="no" id="iframe_imageupload" src="evenycategory_imageupload.php?id=' + evtcat_id + '" width="100%"></iframe> ' +
											//here is model body end
											'</div>' +
											//start model footer
											'<div class="modal-footer">' +
											'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
											'</div>' +
											//end modal footer
											'</div>' +
											'</div>' +
											'</div>';

									var modelImgUploder = $(modelImgUploderStr);
									modelImgUploder.modal('show');
								});

								eventModal.find('.btn_delete').click(function () {
									var evtcat_id = $(this).val();
									swal({
										title: "Are you sure?",
										text: "Do you want to remove this category ?",
										type: "warning",
										showCancelButton: true,
										confirmButtonClass: "btn-danger",
										cancelButtonClass: "btn-light",
										confirmButtonText: "Yes, Delete!",
										closeOnConfirm: false
									}, function () {
										$.post('bkp/controllers/eventController.php', {action: 'deleteEventCategory', evtcat_id: evtcat_id}, function (e) {
											if (parseInt(e.msgType) == 1) {
												swal("Event Category Process!", e.msg, "success");
												tblEventCategory(eventModal);
											} else {
												swal("Event Category Process!", e.msg, "warning");
											}
										}, "json");
									});
								});
							}, "json")
						}

						eventModal.on('shown.bs.modal', function () {
							tblEventCategory(eventModal);
						});


						eventModal.find('#btn_add').click(function (event) {
							var evtcat_catname = eventModal.find('#evtcat_catname').val();
							var postData = {
								evt_id: evt_id,
								evtcat_catname: evtcat_catname,
								action: "saveEventCategory"
							}
							var form = eventModal.find('#form_modal');
							form.submit(false);
							form.addClass('was-validated');
							if (form[0].checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							} else {
								$.post('bkp/controllers/eventController.php', postData, function (e) {
									if (parseInt(e.msgType) == 1) {
										swal("Event Category Process!", e.msg, "success");
										tblEventCategory(eventModal);
										eventModal.find('#evtcat_catname').val('');
										form.removeClass('was-validated');
									} else {
										swal("Event Category Process!", e.msg, "warning");
									}
								}, "json");
							}
						});

					});

					$('.btn_uploadimge').click(function () {
						var evt_id = $(this).val();
						var modelImgUploderStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog modal-lg" role="document">' +
								'<div class="modal-content">' +
								'<div class="modal-header">' +
								'<h5 class="modal-title" id="exampleModalLabel">Upload Event Cover Photo</h5>' +
								'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
								'<span aria-hidden="true">&times;</span>' +
								'</button>' +
								'</div>' +
								'<div class="modal-body">' +
								//here is model body start                        
								'<iframe frameborder="0" scrolling="no" id="iframe_imageupload" src="eveny_imageupload.php?id=' + evt_id + '" width="100%"></iframe> ' +
								//here is model body end
								'</div>' +
								//start model footer
								'<div class="modal-footer">' +
								'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
								'</div>' +
								//end modal footer
								'</div>' +
								'</div>' +
								'</div>';

						var modelImgUploder = $(modelImgUploderStr);
						modelImgUploder.modal('show');
					});

					$('.btn_delete').click(function () {
						var evt_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to delete this event ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-warning",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, Delete!",
							closeOnConfirm: false
						}, function () {
							$.post('bkp/controllers/eventController.php', {action: 'deleteEvent', evt_id: evt_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Event Process!", e.msg, "success");
									clearEvent();
								} else {
									swal("Event Process!", e.msg, "error");
								}
							}, "json");
						});
					});

					if (callback !== undefined) {
						if (typeof callback === 'function') {
							callback();
						}
					}
				}, "json");
			}


			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				$('.summernote').summernote({
					placeholder: 'Event Description Here',
					height: 200
				});

				$(".datepicker-date").datetimepicker({
					viewMode: 'days',
					format: 'YYYY-MM-DD'
				});
				$(".datepicker-time").datetimepicker({
					format: 'LT'
				});

				cmbRelateCombo('26', '2', '.cmbCountry', '238', function () {
					var country = $('.cmbCountry').val();
					cmbRelateSubCombo('27', country, '.cmbState', false, function () {
						var state = $('.cmbState').val();
						cmbRelateSubCombo('30', state, '.cmbCity');
					});
				});
				$('.cmbCountry').change(function () {
					var country = $(this).val();
					cmbRelateSubCombo('27', country, '.cmbState', false, function () {
						var state = $('.cmbState').val();
						cmbRelateSubCombo('30', state, '.cmbCity');
					});
				});
				$('.cmbState').change(function () {
					var state = $(this).val();
					cmbRelateSubCombo('30', state, '.cmbCity');
				});

				tblEvent();

				const form = $('.form_default');


				$('#btn_save').click(function (event) {
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						saveEvent();
					}
				});

				$('#btn_edit').click(function (event) {
					form.submit(false);
					form.addClass('was-validated');
					if (form[0].checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					} else {
						editEvent();
					}
				});

				$('#btn_clear').click(function (event) {
					event.preventDefault();
					form.submit(false);
					clearEvent();
				});
			});
        </script>		
	</body>
</html>