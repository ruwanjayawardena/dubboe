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
        <input type="hidden" id="scmb_maincmb" value="<?php
		if (isset($_REQUEST) && !empty($_REQUEST['MC'])) {
			echo $_REQUEST['MC'];
		}
		?>">
        <input type="hidden" id="scmb_relatecmb" value="<?php
		if (isset($_REQUEST)) {
			echo $_REQUEST['RC'];
		}
		?>">
        <input type="hidden" id="scmb_relationship" value="<?php
		if (isset($_REQUEST) && !empty($_REQUEST['RL'])) {
			echo $_REQUEST['RL'];
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
                            <input type="hidden" class="form-control" id="scmb_id"> 
							<div class="form-group">
                                <label for="cmbRelateCombo">Choose <span class="rlcmb_name"></span></label>
                                <select class="col-12 form-control cmbRelateCombo form-control-chosen" required>
                                    <option value="" disabled selected>Loading...</option>
                                </select>
                                <div class="valid-feedback">
                                    <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                </div>
                                <div class="invalid-feedback">
                                    <i class="fas fa-lg fa-exclamation-circle"></i> Please choose one
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="scmb_name"><span class="mcmb_name"></span></label>
                                <input type="text" class="form-control" id="scmb_name" autocomplete="off" required>
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
                            <table id="tblRelateSubCombo" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>                                
                                        <th><span class="mcmb_name"></span></th>                                        
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
			var mcmb_id = $('#scmb_maincmb').val();
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

		function getRelateComboInfoByID() {
			var mcmb_id = $('#scmb_relatecmb').val();
			$.post('controllers/subComboController.php', {action: 'getMainComboInfoByID', mcmb_id: mcmb_id}, function (e) {
				$.each(e, function (index, qdt) {
					$('.rlcmb_name').html('').append(qdt.mcmb_name);
				});
			}, "json");
		}

		function cmbRelateCombo(selected, callback) {
			var cmbdata = "";
			var scmb_relationship = $('#scmb_relationship').val();
			var mcmb_id = $('#scmb_relatecmb').val();
			var dataAvailable = 0;
			$.post('controllers/subComboController.php', {action: 'cmbRelateCombo', mcmb_id: mcmb_id, scmb_relationship: scmb_relationship}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					cmbdata += '<option value="0"> Data not available! </option>';
				} else {
					dataAvailable = 1;
					$.each(e, function (index, qdt) {
						if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
							if (parseInt(selected) === parseInt(qdt.rlcmb_id)) {
								cmbdata += '<option value="' + qdt.rlcmb_id + '" selected>' + qdt.rlcmb_name + '</option>';
							} else {
								cmbdata += '<option value="' + qdt.rlcmb_id + '">' + qdt.rlcmb_name + '</option>';
							}
						} else {
							cmbdata += '<option value="' + qdt.rlcmb_id + '">' + qdt.rlcmb_name + '</option>';
						}
					});
				}
				$('.cmbRelateCombo').html('').append(cmbdata);
				chosenRefresh();

				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback(dataAvailable);
					}
				}
			}, "json");
		}

		function tblRelateSubCombo(scmb_relatecmb, mcmb_name, callback) {
			var scmb_maincmb = $('#scmb_maincmb').val();
			var scmb_relationship = $('#scmb_relationship').val();
			var foldername = $('#foldername').val();
			var tbldata = "";
			$.post('controllers/subComboController.php', {action: 'getAllSubCombo', scmb_relationship: scmb_relationship, scmb_maincmb: scmb_maincmb, scmb_relatecmb: scmb_relatecmb}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- data not available -- </td>';
					tbldata += '</tr>';
					$('#tblRelateSubCombo tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.scmb_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.scmb_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '<button class="btn btn-secondary btn_upload" value="' + qdt.scmb_id + '"><i class="fas fa-upload"></i> Upload</button>';
						tbldata += '</div>';
						tbldata += '</td>';
//						tbldata += '<td></td>';
						tbldata += '<td class="imgdiv">';
						if (qdt.scmb_img === "#") {
							tbldata += '<img src="../assets/img/noimage.png" class="img-thumbnail">';
						} else {
							tbldata += '<img src="../asset_imageuploader/' + foldername + '/' + qdt.scmb_id + '/' + qdt.scmb_img + '" class="img-thumbnail">';
						}
						tbldata += '</td>';
						tbldata += '<td>' + qdt.scmb_name + '</td>';
						tbldata += '</tr>';
					});

					$('#tblRelateSubCombo tbody').html('').append(tbldata);
//					if ($.fn.DataTable.isDataTable('#tblRelateSubCombo')) {
//						//re initialize 
//						$('#tblRelateSubCombo').DataTable().destroy();
//						$('#tblRelateSubCombo tbody').empty();
//						$('#tblRelateSubCombo tbody').html('').append(tbldata);
//						$('#tblRelateSubCombo').DataTable({
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
//							order: [2, 'asc']
//						});
//					} else {
//						//initilized                    
//						$('#tblRelateSubCombo tbody').html('').append(tbldata);
//						$('#tblRelateSubCombo').DataTable({
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
//							order: [2, 'asc']
//						});
//					}

					$('[data-toggle="tooltip"]').tooltip();
				}

//				$('#tblRelateSubCombo').on('draw.dt', function () {
//					$('.btn_select').click(function () {
//						$('#btn_save').prop('hidden', true);
//						$('#btn_edit').prop('hidden', false);
//						var scmb_id = $(this).val();
//						$.post('controllers/subComboController.php', {action: 'getSubComboByID', scmb_id: scmb_id}, function (e) {
//							$.each(e, function (index, qdt) {
//								$('#scmb_id').val(qdt.scmb_id);
//								$('#scmb_name').val(qdt.scmb_name);
////							cmbRelateCombo(scmb_relatecmb);
//							});
//						}, "json");
//					});
//
//					$('.btn_delete').click(function () {
//						var scmb_id = $(this).val();
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
//							$.post('controllers/subComboController.php', {action: 'deleteSubCombo', scmb_id: scmb_id}, function (e) {
//								if (parseInt(e.msgType) == 1) {
//									swal("Good Job!", e.msg, "success");
//									clearRelateSubCombo();
//									tblRelateSubCombo(scmb_relatecmb);
//								} else {
//									swal("Error!", e.msg, "error");
//								}
//							}, "json");
//						});
//					});
//				});

				$('.btn_upload').click(function () {
					var scmb_id = $(this).val();
					var confirmModalString = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">';
					//here is model body start
					confirmModalString += '<iframe src="relatecmbImage_upload.php?id=' + scmb_id + '&foldername=' + foldername + '"  id="iframe_photos" width="100%"></iframe>';
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
						tblRelateSubCombo(scmb_relatecmb, mcmb_name);
					});
				});



				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var scmb_id = $(this).val();
					$.post('controllers/subComboController.php', {action: 'getSubComboByID', scmb_id: scmb_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#scmb_id').val(qdt.scmb_id);
							$('#scmb_name').val(qdt.scmb_name);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var scmb_id = $(this).val();
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
						$.post('controllers/subComboController.php', {action: 'deleteSubCombo', scmb_id: scmb_id, mcmb_img_values_have: 1, foldername: foldername}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearRelateSubCombo();
								tblRelateSubCombo(scmb_relatecmb, mcmb_name);
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

		function saveRelateSubCombo() {
			var scmb_name = $('#scmb_name').val();
			var scmb_maincmb = $('#scmb_maincmb').val();
			var scmb_relatecmb = $('.cmbRelateCombo').val();
			var scmb_relationship = $('#scmb_relationship').val();
			var postdata = {
				action: "saveSubCombo",
				scmb_name: scmb_name,
				scmb_maincmb: scmb_maincmb,
				scmb_relatecmb: scmb_relatecmb,
				scmb_relationship: scmb_relationship
			}
			$.post('controllers/subComboController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearRelateSubCombo();
					getMainComboInfoByID(function (mcmb_name) {
						tblRelateSubCombo(scmb_relatecmb, mcmb_name);
					});
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editRelateSubCombo() {
			var scmb_id = $('#scmb_id').val();
			var scmb_name = $('#scmb_name').val();
			var scmb_relatecmb = $('.cmbRelateCombo').val();
			var postdata = {
				action: "editRelateSubCombo",
				scmb_id: scmb_id,
				scmb_name: scmb_name,
				scmb_relatecmb: scmb_relatecmb
			}
			$.post('controllers/subComboController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearRelateSubCombo();
					getMainComboInfoByID(function (mcmb_name) {
						tblRelateSubCombo(scmb_relatecmb, mcmb_name);
					});
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearRelateSubCombo() {
			$('#scmb_id').val('');
			$('#scmb_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#comboform').removeClass('was-validated');
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			getMainComboInfoByID();

			cmbRelateCombo(false, function () {
				var scmb_relatecmb = $('.cmbRelateCombo').val();
				getMainComboInfoByID(function (mcmb_name) {
					tblRelateSubCombo(scmb_relatecmb, mcmb_name);
				});				
			});
			getRelateComboInfoByID();

			$('.cmbRelateCombo').change(function () {
				var scmb_relatecmb = $(this).val();
				var mcmb_name = $('#mcmb_name').val();
				tblRelateSubCombo(scmb_relatecmb,mcmb_name);
			});

			const form = $('#comboform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveRelateSubCombo();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editRelateSubCombo();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearRelateSubCombo();
			});


		});
    </script>
</body>
</html>