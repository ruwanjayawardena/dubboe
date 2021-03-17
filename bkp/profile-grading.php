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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-th fa-lg"></i> Profile Grading  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form id="pageform" novalidate>
                            <input type="hidden" class="form-control" id="grd_id">                           
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="grd_name">Profile Grading</label>
										<input type="text" class="form-control" id="grd_name" placeholder="ProfileGrading" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter grading
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
                            <table id="tblProfileGrading" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
										<th></th>                                
                                        <th></th>
										<th>Profile Grading</th>                                        
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
		function tblProfileGrading(callback) {
			var tbldata = "";
			$.post('controllers/ubProfileGradingController.php', {action: 'tblProfileGrading'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- Data Not Available -- </td>';
					tbldata += '</tr>';
					$('#tblProfileGrading tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.grd_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.grd_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';						
						tbldata += '<td>' + qdt.grd_name + '</td>';
						tbldata += '</tr>';
					});

					if ($.fn.DataTable.isDataTable('#tblProfileGrading')) {
						//re initialize 
						$('#tblProfileGrading').DataTable().destroy();
						$('#tblProfileGrading tbody').empty();
						$('#tblProfileGrading tbody').html('').append(tbldata);
						$('#tblProfileGrading').DataTable({
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
						$('#tblProfileGrading tbody').html('').append(tbldata);
						$('#tblProfileGrading').DataTable({
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

				$('#tblProfileGrading').on('draw.dt', function () {					

					$('.btn_select').click(function () {
						$('#btn_save').prop('hidden', true);
						$('#btn_edit').prop('hidden', false);
						var grd_id = $(this).val();
						$.post('controllers/ubProfileGradingController.php', {action: 'getProfileGradingByID', grd_id: grd_id}, function (e) {
							$.each(e, function (index, qdt) {
								$('#grd_id').val(qdt.grd_id);
								$
								$('#grd_name').val(qdt.grd_name);
							});
						}, "json");
					});

					$('.btn_delete').click(function () {
						var grd_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to delete this grading ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, delete it!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/ubProfileGradingController.php', {action: 'removeProfileGrading', grd_id: grd_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Good Job!", e.msg, "success");
									clearProfileGrading();
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
					var grd_id = $(this).val();
					$.post('controllers/ubProfileGradingController.php', {action: 'getProfileGradingByID', grd_id: grd_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#grd_id').val(qdt.grd_id);
							$
							$('#grd_name').val(qdt.grd_name);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var grd_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this grading ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/ubProfileGradingController.php', {action: 'removeProfileGrading', grd_id: grd_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearProfileGrading();
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

		function addProfileGrading() {
			var grd_name = $('#grd_name').val();
			var postdata = {
				action: "addProfileGrading",
				grd_name: grd_name
			}
			$.post('controllers/ubProfileGradingController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearProfileGrading();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editProfileGrading() {
			var grd_id = $('#grd_id').val();
			var grd_name = $('#grd_name').val();
			var postdata = {
				action: "editProfileGrading",
				grd_name: grd_name,
				grd_id: grd_id
			}
			$.post('controllers/ubProfileGradingController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearProfileGrading();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearProfileGrading() {
			$('#grd_id').val('');
			$('#grd_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#pageform').removeClass('was-validated');
			tblProfileGrading();
		}




		$(document).ready(function () {
			tblProfileGrading();
			const form = $('#pageform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					addProfileGrading();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editProfileGrading();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearProfileGrading();
			});


		});
    </script>
</body>
</html>