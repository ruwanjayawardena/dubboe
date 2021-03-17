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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-trophy fa-lg"></i> User Grants Management&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <form id="pageform" novalidate>
                            <input type="hidden" class="form-control" id="grant_id">
							<div class="form-group">
								<label for="grant_title">Grant Heading</label>
								<input type="text" class="form-control" id="grant_title" placeholder="Heading" required>
								<div class="valid-feedback">
									<i class="fas fa-lg fa-check-circle"></i> Looks good! 
								</div>
								<div class="invalid-feedback">
									<i class="fas fa-lg fa-exclamation-circle"></i> Please enter heading
								</div>
							</div>
							<div class="form-group">
								<label for="grant_desc">Grant Description</label>
								<textarea type="text" class="form-control" id="grant_desc" rows="3" placeholder="Description" required></textarea>
								<div class="valid-feedback">
									<i class="fas fa-lg fa-check-circle"></i> Looks good! 
								</div>
								<div class="invalid-feedback">
									<i class="fas fa-lg fa-exclamation-circle"></i> Please enter description
								</div>
							</div>
							<div class="form-group">
								<label for="grant_amount">Funding Amount</label>
								<input type="text" class="form-control" id="grant_amount" placeholder="Amount" required>
								<div class="valid-feedback">
									<i class="fas fa-lg fa-check-circle"></i> Looks good! 
								</div>
								<div class="invalid-feedback">
									<i class="fas fa-lg fa-exclamation-circle"></i> Please enter amount
								</div>
							</div>

                            <br>
                            <div class="form-row">
								<div class="col">
									<button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Add</button>
									<button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Edit</button>
									<button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
								</div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="table-responsive">
                            <table id="tblGrant" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
										<th></th>                            
                                        <th></th>
										<th class="text-center">Grant</th>                                        
										<th class="text-right">Funding Amount</th>
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
		function tblGrant(callback) {
			var tbldata = "";
			$.post('controllers/ubGrantController.php', {action: 'tblGrant'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="4" class="bg-danger text-center"> Grant Options Not Available </td>';
					tbldata += '</tr>';
					$('#tblGrant tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.grant_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.grant_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '<button class="btn btn-primary btn_addquestions" value="' + qdt.grant_id + '"><i class="fas fa-plus"></i> Add Questions</button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td><strong>' + qdt.grant_title + '</strong><br><p>' + qdt.grant_desc + '</p></td>';
						tbldata += '<td>' + qdt.grant_amount + '</td>';
						tbldata += '</tr>';
					});

					if ($.fn.DataTable.isDataTable('#tblGrant')) {
						//re initialize 
						$('#tblGrant').DataTable().destroy();
						$('#tblGrant tbody').empty();
						$('#tblGrant tbody').html('').append(tbldata);
						$('#tblGrant').DataTable({
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
						$('#tblGrant tbody').html('').append(tbldata);
						$('#tblGrant').DataTable({
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
					$('[data-toggle="tooltip"]').tooltip();
				}

				$('#tblGrant').on('draw.dt', function () {
					$('.btn_select').click(function () {
						$('#btn_save').prop('hidden', true);
						$('#btn_edit').prop('hidden', false);
						var grant_id = $(this).val();
						$.post('controllers/ubGrantController.php', {action: 'getGrantByID', grant_id: grant_id}, function (e) {
							$.each(e, function (index, qdt) {
								$('#grant_id').val(qdt.grant_id);
								$('#grant_title').val(qdt.grant_title);
								$('#grant_desc').val(qdt.grant_desc);
								$('#grant_amount').val(qdt.grant_amount);
							});
						}, "json");
					});

					$('.btn_delete').click(function () {
						var grant_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to delete this grant option ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, delete it!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/ubGrantController.php', {action: 'removeGrant', grant_id: grant_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Good Job!", e.msg, "success");
									clearGrant();
								} else {
									swal("Error!", e.msg, "error");
								}
							}, "json");
						});
					});
				});




				$('.btn_addquestions').click(function () {
					var grant_id = $(this).val();
					var eventItemModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Add Grant Questionaries</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">' +
							//here is model body start                        
							'<div class="row">' +
							'<div class="col-lg-7">' +
							'<form id="form_modal" novalidate>' +
							'<input type="hidden" id="grq_id">' +
							'<div class="form-group">' +
							'<label for="grq_question">Question</label>' +
							'<textarea class="form-control" id="grq_question" rows="5" required></textarea>' +
							'<div class="valid-feedback">' +
							'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
							'</div>' +
							'<div class="invalid-feedback">' +
							'<i class="fas fa-lg fa-exclamation-circle"></i> Please enter question' +
							'</div>' +
							'</div>' +
							'</form>' +
							'</div>' +
							'<div class="col-lg-5">' +
							'<div class="table-responsive">' +
							'<table id="tblGrantQuestions" class="table font-size-sm" style="width:100%">' +
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


					function tblGrantQuestions() {
						var tbldata = "";
						$.post('controllers/ubGrantController.php', {action: 'tblGrantQuestions', grant_id: grant_id}, function (e) {
							if (e === undefined || e.length === 0 || e === null) {
								tbldata += '<tr>';
								tbldata += '<td colspan="2" class="bg-danger text-white text-center">Questions not available</td>';
								tbldata += '</tr>';
							} else {
								$.each(e, function (index, qdt) {
									index++;
									tbldata += '<tr>';
									tbldata += '<td>';
									tbldata += '<div class="btn-group btn-group-sm">';
									tbldata += '<button class="btn btn-primary btn_selectItem" value="' + qdt.grq_id + '" data-toggle="tooltip" data-placement="top" title="Load data for update"><i class="fas fa-lg fa-edit"></i></button>';
									tbldata += '<button class="btn btn-danger btn_deleteItem" value="' + qdt.grq_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';

									tbldata += '</div>';
									tbldata += '</td>';
									tbldata += '<td>' + qdt.grq_question + '</td>';
									tbldata += '</tr>';
								});
							}
							eventItemModal.find('#tblGrantQuestions tbody').html('').append(tbldata);
							eventItemModal.find('[data-toggle="tooltip"]').tooltip();

							eventItemModal.find('.btn_selectItem').click(function () {
								var grq_id = $(this).val();
								eventItemModal.find('#btn_addItem').prop('hidden', true);
								eventItemModal.find('#btn_editItem').prop('hidden', false);
								$.post('controllers/ubGrantController.php', {action: 'getGrantQuestionsByID', grq_id: grq_id}, function (e) {
									$.each(e, function (index, qdt) {
										eventItemModal.find('#grq_question').val(qdt.grq_question);
										eventItemModal.find('#grq_id').val(qdt.grq_id);
									});
								}, "json");
							});

							eventItemModal.find('.btn_deleteItem').click(function () {
								var grq_id = $(this).val();
								swal({
									title: "Are you sure?",
									text: "Do you want to remove this question ?",
									type: "warning",
									showCancelButton: true,
									cancelButtonClass: "btn-light",									
									closeOnConfirm: false
								}, function () {
									$.post('controllers/ubGrantController.php', {action: 'deleteGrantQuestions', grq_id: grq_id}, function (e) {
										if (parseInt(e.msgType) == 1) {
											swal("GRANT QUESTIONS!", e.msg, "success");
											tblGrantQuestions();
										} else {
											swal("GRANT QUESTIONS!", e.msg, "warning");
										}
									}, "json");
								});
							});
						}, "json")
					}

					function clearFormData() {
						eventItemModal.find('#grq_id').val('');
						eventItemModal.find('#grq_question').val('');
						eventItemModal.find('#btn_addItem').prop('hidden', false);
						eventItemModal.find('#btn_editItem').prop('hidden', true);
					}

					eventItemModal.on('shown.bs.modal', function () {
						clearFormData();
						tblGrantQuestions();
					});

					eventItemModal.find('#btn_editItem').click(function (event) {
						var grq_question = eventItemModal.find('#grq_question').val();
						var grq_id = eventItemModal.find('#grq_id').val();
						var postData = {
							grq_question: grq_question,
							grq_id: grq_id,
							action: "editGrantQuestions"
						}
						form.addClass('was-validated');
						if (form[0].checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							$.post('controllers/ubGrantController.php', postData, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("GRANT QUESTIONS!", e.msg, "success");
									form.removeClass('was-validated');
									clearFormData();
									tblGrantQuestions();
								} else {
									swal("GRANT QUESTIONS!", e.msg, "warning");
								}
							}, "json");
						}
					});

					eventItemModal.find('#btn_addItem').click(function (event) {
						var grq_question = eventItemModal.find('#grq_question').val();
						var postData = {
							grq_question: grq_question,
							grant_id: grant_id,
							action: "saveGrantQuestions"
						}
						form.addClass('was-validated');
						if (form[0].checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							$.post('controllers/ubGrantController.php', postData, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("GRANT QUESTIONS!", e.msg, "success");
									form.removeClass('was-validated');
									clearFormData();
									tblGrantQuestions();
								} else {
									swal("GRANT QUESTIONS!", e.msg, "warning");
								}
							}, "json");
						}
					});


				});

				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var grant_id = $(this).val();
					$.post('controllers/ubGrantController.php', {action: 'getGrantByID', grant_id: grant_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#grant_id').val(qdt.grant_id);
							$('#grant_title').val(qdt.grant_title);
							$('#grant_desc').val(qdt.grant_desc);
							$('#grant_amount').val(qdt.grant_amount);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var grant_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this grant option ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/ubGrantController.php', {action: 'removeGrant', grant_id: grant_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearGrant();
							} else {
								swal("Error!", e.msg, "error");
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

		function addGrant() {
			var grant_title = $('#grant_title').val();
			var grant_desc = $('#grant_desc').val();
			var grant_amount = $('#grant_amount').val();
			var postdata = {
				action: "addGrant",
				grant_title: grant_title,
				grant_desc: grant_desc,
				grant_amount: grant_amount
			}
			$.post('controllers/ubGrantController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearGrant();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editGrant() {
			var grant_title = $('#grant_title').val();
			var grant_desc = $('#grant_desc').val();
			var grant_amount = $('#grant_amount').val();
			var grant_id = $('#grant_id').val();
			var postdata = {
				action: "editGrant",
				grant_title: grant_title,
				grant_desc: grant_desc,
				grant_amount: grant_amount,
				grant_id: grant_id
			}
			$.post('controllers/ubGrantController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearGrant();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearGrant() {
			$('#grant_id').val('');
			$('#grant_title').val('');
			$('#grant_desc').val('');
			$('#grant_amount').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#pageform').removeClass('was-validated');
			tblGrant();
		}




		$(document).ready(function () {
			tblGrant();
			const form = $('#pageform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					addGrant();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editGrant();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearGrant();
			});


		});
    </script>
</body>
</html>