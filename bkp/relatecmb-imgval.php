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
        <input type="hidden" id="rlcmb_maincmb" value="<?php
		if (isset($_REQUEST) && !empty($_REQUEST['MC'])) {
			echo $_REQUEST['MC'];
		}
		?>">       
        <input type="hidden" id="foldername" value="<?php
		if (isset($_REQUEST) && !empty($_REQUEST['foldername'])) {
			echo $_REQUEST['foldername'];
		}
		?>">       
        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-map-marked-alt"></i> <span class="mcmb_name"></span>  &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1)"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 pb-4">
                        <form id="comboform" novalidate>
                            <input type="hidden" class="form-control" id="rlcmb_id">                           
                            <input type="hidden" class="form-control mcmb_name">                           
                            <div class="form-group">
                                <label for="rlcmb_name"><span class="mcmb_name"></span></label>
                                <input type="text" class="form-control" id="rlcmb_name" autocomplete="off" required>
                                <div class="valid-feedback">
                                    <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                </div>
                                <div class="invalid-feedback">
                                    <i class="fas fa-lg fa-exclamation-circle"></i> Please enter here
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
                            <table id="tblRelateCombo" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                               
                                        <th colspan="3" class="text-center"><span class="mcmb_name"></span></th>
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
		function getMainComboInfoByID(callback) {
			var mcmb_id = $('#rlcmb_maincmb').val();
			var mcmb_name = "";
			var mcmb_class = "";
			$.post('controllers/subComboController.php', {action: 'getMainComboInfoByID', mcmb_id: mcmb_id}, function (e) {
				$.each(e, function (index, qdt) {
					$('.mcmb_name').html('').append(qdt.mcmb_name);
					mcmb_name = qdt.mcmb_name;
					$('.mcmb_class').html('').append(qdt.mcmb_class);
					mcmb_class = qdt.mcmb_class;
				});

				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback(mcmb_name, mcmb_class);
					}
				}
			}, "json");
		}

		function tblRelateCombo(mcmb_name, callback) {
			var rlcmb_maincmb = $('#rlcmb_maincmb').val();
			var foldername = $('#foldername').val();
			var tbldata = "";
			$.post('controllers/subComboController.php', {action: 'getAllRelateCombo', mcmb_id: rlcmb_maincmb}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- data not available -- </td>';
					tbldata += '</tr>';
					$('#tblRelateCombo tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.rlcmb_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.rlcmb_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '<button class="btn btn-secondary btn_upload" value="' + qdt.rlcmb_id + '"><i class="fas fa-upload"></i> Upload</button>';
						tbldata += '</div>';
						tbldata += '</td>';
//						tbldata += '<td></td>';
						tbldata += '<td class="imgdiv">';
						if (qdt.rlcmb_img === "#") {
							tbldata += '<img src="../assets/img/noimage.png" class="img-thumbnail">';
						} else {
							tbldata += '<img src="../asset_imageuploader/' + foldername + '/' + qdt.rlcmb_id + '/' + qdt.rlcmb_img + '" class="img-thumbnail">';
						}
						tbldata += '</td>';
						tbldata += '<td>' + qdt.rlcmb_name + '</td>';
						tbldata += '</tr>';
					});

					$('#tblRelateCombo tbody').html('').append(tbldata);
//					if ($.fn.DataTable.isDataTable('#tblRelateCombo')) {
//						//re initialize 
//						$('#tblRelateCombo').DataTable().destroy();
//						$('#tblRelateCombo tbody').empty();
//						$('#tblRelateCombo tbody').html('').append(tbldata);
//						$('#tblRelateCombo').DataTable({
//							responsive: {
//								details: {
//									type: 'column',
//									target: 'tr'
//								}
//							},
//							columnDefs: [
//								{className: 'control text-right', orderable: false, targets: 1},
//								{orderable: false, targets: 0}
//							],
////							order: [2, 'asc']
//						});
//					} else {
//						//initilized                    
//						$('#tblRelateCombo tbody').html('').append(tbldata);
//						$('#tblRelateCombo').DataTable({
//							responsive: {
//								details: {
//									type: 'column',
//									target: 'tr'
//								}
//							},
//							columnDefs: [
//								{className: 'control text-right', orderable: false, targets: 1},
//								{orderable: false, targets: 0}
//							],
////							order: [2, 'asc']
//						});
//					}

					$('[data-toggle="tooltip"]').tooltip();
				}

//				$('#tblRelateCombo').on('draw.dt', function () {
//					$('.btn_select').click(function () {
//						$('#btn_save').prop('hidden', true);
//						$('#btn_edit').prop('hidden', false);
//						var rlcmb_id = $(this).val();
//						$.post('controllers/subComboController.php', {action: 'getRelateComboByID', rlcmb_id: rlcmb_id}, function (e) {
//							$.each(e, function (index, qdt) {
//								$('#rlcmb_id').val(qdt.rlcmb_id);
//								$('#rlcmb_name').val(qdt.rlcmb_name);
//							});
//						}, "json");
//					});
//
//					$('.btn_delete').click(function () {
//						var rlcmb_id = $(this).val();
//						swal({
//							title: "Are you sure?",
//							text: "Do you want to delete this ?",
//							type: "warning",
//							showCancelButton: true,
//							confirmButtonClass: "btn-danger",
//							cancelButtonClass: "btn-light",
//							confirmButtonText: "Yes, delete it!",
//							closeOnConfirm: false
//						}, function () {
//							$.post('controllers/subComboController.php', {action: 'deleteRelateCombo', rlcmb_id: rlcmb_id}, function (e) {
//								if (parseInt(e.msgType) == 1) {
//									swal("Good Job!", e.msg, "success");
//									clearRelateCombo();
//									tblRelateCombo();
//								} else {
//									swal("Error!", e.msg, "error");
//								}
//							}, "json");
//						});
//					});
//				});

				$('.btn_upload').click(function () {
					var rlcmb_id = $(this).val();
					var confirmModalString = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Upload ' + mcmb_name + ' Image</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">';
					//here is model body start
					confirmModalString += '<iframe src="relatecmbImage_upload.php?id=' + rlcmb_id + '&foldername=' + foldername + '"  id="iframe_photos" width="100%"></iframe>';
					//here is model body end
					confirmModalString += '</div>' +
							//start model footer
							'<div class="modal-footer">' +
							'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
							'</div>' +
							//end modal footer
							'</div>' +
							'</div>' +
							'</div>';

					var confirmModal = $(confirmModalString);
					confirmModal.modal('show');

					confirmModal.on('hide.bs.modal', function () {
						tblRelateCombo(mcmb_name);
					});
				});


				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var rlcmb_id = $(this).val();
					$.post('controllers/subComboController.php', {action: 'getRelateComboByID', rlcmb_id: rlcmb_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#rlcmb_id').val(qdt.rlcmb_id);
							$('#rlcmb_name').val(qdt.rlcmb_name);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var rlcmb_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/subComboController.php', {action: 'deleteRelateCombo', rlcmb_id: rlcmb_id,mcmb_img_values_have:1,foldername:foldername}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearRelateCombo();
								tblRelateCombo(mcmb_name);
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

		function saveRelateCombo() {			
			var rlcmb_name = $('#rlcmb_name').val();
			var mcmb_id = $('#rlcmb_maincmb').val();
			var postdata = {
				action: "saveRelateCombo",
				rlcmb_name: rlcmb_name,
				mcmb_id: mcmb_id
			}
			$.post('controllers/subComboController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearRelateCombo();
					getMainComboInfoByID(function (mcmb_name) {
						tblRelateCombo(mcmb_name);
					});
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editRelateCombo() {			
			var rlcmb_id = $('#rlcmb_id').val();
			var rlcmb_name = $('#rlcmb_name').val();
			var postdata = {
				action: "editRelateCombo",
				rlcmb_id: rlcmb_id,
				rlcmb_name: rlcmb_name
			}
			$.post('controllers/subComboController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearRelateCombo();
					getMainComboInfoByID(function (mcmb_name) {
						tblRelateCombo(mcmb_name);
					});
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearRelateCombo() {
			$('#rlcmb_id').val('');
			$('#rlcmb_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#comboform').removeClass('was-validated');
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			getMainComboInfoByID(function (mcmb_name) {
				tblRelateCombo(mcmb_name);
			});


			const form = $('#comboform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveRelateCombo();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editRelateCombo();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearRelateCombo();
			});


		});
    </script>
</body>
</html>