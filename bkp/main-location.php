<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>    
		<style>
			table .img-thumbnail {
				width: 70px !important;
				height: 70px !important;
			}

			table .imgdiv{
				width: 70px
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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-th fa-lg"></i> Main Locations  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form id="pageform" novalidate>
                            <input type="hidden" class="form-control" id="pfc_id">                           
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="pfc_name">Location</label>
										<input type="text" class="form-control" id="pfc_name" placeholder="Location" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Location
										</div>
									</div>
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
                    <div class="col">
                        <div class="table-responsive">
                            <table id="tblProfileCategory" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
										<th></th>                                
                                        <th></th>
										<th>Profile Category</th>                                        
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
		function tblProfileCategory(callback) {
			var tbldata = "";
			$.post('controllers/ubProfileCategoryController.php', {action: 'tblProfileCategory'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- Data Not Available -- </td>';
					tbldata += '</tr>';
					$('#tblProfileCategory tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.pfc_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.pfc_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';						
						tbldata += '<td>' + qdt.pfc_name + '</td>';
						tbldata += '</tr>';
					});

					if ($.fn.DataTable.isDataTable('#tblProfileCategory')) {
						//re initialize 
						$('#tblProfileCategory').DataTable().destroy();
						$('#tblProfileCategory tbody').empty();
						$('#tblProfileCategory tbody').html('').append(tbldata);
						$('#tblProfileCategory').DataTable({
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
						$('#tblProfileCategory tbody').html('').append(tbldata);
						$('#tblProfileCategory').DataTable({
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

				$('#tblProfileCategory').on('draw.dt', function () {					

					$('.btn_select').click(function () {
						$('#btn_save').prop('hidden', true);
						$('#btn_edit').prop('hidden', false);
						var pfc_id = $(this).val();
						$.post('controllers/ubProfileCategoryController.php', {action: 'getProfileCategoryByID', pfc_id: pfc_id}, function (e) {
							$.each(e, function (index, qdt) {
								$('#pfc_id').val(qdt.pfc_id);
								$
								$('#pfc_name').val(qdt.pfc_name);
							});
						}, "json");
					});

					$('.btn_delete').click(function () {
						var pfc_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to delete this category ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, delete it!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/ubProfileCategoryController.php', {action: 'removeProfileCategory', pfc_id: pfc_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Good Job!", e.msg, "success");
									clearProfileCategory();
								} else {
									swal("Error!", e.msg, "error");
								}
							}, "json");
						});
					});
				});		




				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var pfc_id = $(this).val();
					$.post('controllers/ubProfileCategoryController.php', {action: 'getProfileCategoryByID', pfc_id: pfc_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#pfc_id').val(qdt.pfc_id);
							$
							$('#pfc_name').val(qdt.pfc_name);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var pfc_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this category ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/ubProfileCategoryController.php', {action: 'removeProfileCategory', pfc_id: pfc_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearProfileCategory();
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

		function addProfileCategory() {
			var pfc_name = $('#pfc_name').val();
			var postdata = {
				action: "addProfileCategory",
				pfc_name: pfc_name
			}
			$.post('controllers/ubProfileCategoryController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearProfileCategory();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editProfileCategory() {
			var pfc_id = $('#pfc_id').val();
			var pfc_name = $('#pfc_name').val();
			var postdata = {
				action: "editProfileCategory",
				pfc_name: pfc_name,
				pfc_id: pfc_id
			}
			$.post('controllers/ubProfileCategoryController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearProfileCategory();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearProfileCategory() {
			$('#pfc_id').val('');
			$('#pfc_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#pageform').removeClass('was-validated');
			tblProfileCategory();
		}




		$(document).ready(function () {
			tblProfileCategory();
			const form = $('#pageform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					addProfileCategory();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editProfileCategory();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearProfileCategory();
			});


		});
    </script>
</body>
</html>