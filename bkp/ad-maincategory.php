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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-th fa-lg"></i> Product/Services Main Category&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form id="pageform" novalidate>
                            <input type="hidden" class="form-control" id="admc_id">                           
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="admc_name">Category</label>
										<input type="text" class="form-control" id="admc_name" placeholder="Category" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter category
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
                            <table id="tblAdMainCategory" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
<!--										<th></th>                                
                                        <th></th>                            -->
                                        <!--<th></th>-->
										<th colspan="3" class="text-center">Product/Services Main Category</th>                                        
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
		function tblAdMainCategory(callback) {
			var tbldata = "";
			$.post('controllers/ubAdMainCategoryController.php', {action: 'tblAdMainCategory'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="4" class="bg-danger text-center"> -- Data Not Available -- </td>';
					tbldata += '</tr>';
					$('#tblAdMainCategory tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.admc_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.admc_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '<button class="btn btn-secondary btn_upload" value="' + qdt.admc_id + '"><i class="fas fa-upload"></i> Upload</button>';
						tbldata += '</div>';
						tbldata += '</td>';
//						tbldata += '<td></td>';
						tbldata += '<td class="imgdiv">';
						if (qdt.admc_img === "#") {
							tbldata += '<img src="../assets/img/noimage.png" class="img-thumbnail">';
						} else {
							tbldata += '<img src="../asset_imageuploader/admaincategory/' + qdt.admc_id + '/' + qdt.admc_img + '" class="img-thumbnail">';
						}
						tbldata += '</td>';
						tbldata += '<td>' + qdt.admc_name + '</td>';
						tbldata += '</tr>';
					});
					
					$('#tblAdMainCategory tbody').html('').append(tbldata);

//					if ($.fn.DataTable.isDataTable('#tblAdMainCategory')) {
//						//re initialize 
//						$('#tblAdMainCategory').DataTable().destroy();
//						$('#tblAdMainCategory tbody').empty();
//						$('#tblAdMainCategory tbody').html('').append(tbldata);
//						$('#tblAdMainCategory').DataTable({
//							responsive: {
//								details: {
//									type: 'column',
//									target: 'tr'
//								}
//							},
//							columnDefs: [
//								{className: 'control text-right', orderable: false, targets: 1},
//								{orderable: false, targets: 0}
//							]
//						});
//					} else {
//						//initilized                    
//						$('#tblAdMainCategory tbody').html('').append(tbldata);
//						$('#tblAdMainCategory').DataTable({
//							responsive: {
//								details: {
//									type: 'column',
//									target: 'tr'
//								}
//							},
//							columnDefs: [
//								{className: 'control text-right', orderable: false, targets: 1},
//								{orderable: false, targets: 0}
//							]
//						});
//					}
					$('[data-toggle="tooltip"]').tooltip();
				}

//				$('#tblAdMainCategory').on('draw.dt', function () {
//					$('.btn_upload').click(function () {
//						var admc_id = $(this).val();
//						var confirmModalString = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
//								'<div class="modal-dialog" role="document">' +
//								'<div class="modal-content">' +
//								'<div class="modal-header">' +
//								'<h5 class="modal-title" id="exampleModalLabel">Upload Product/Services Main Category Image</h5>' +
//								'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
//								'<span aria-hidden="true">&times;</span>' +
//								'</button>' +
//								'</div>' +
//								'<div class="modal-body">';
//						//here is model body start
//						confirmModalString += '<iframe src="admaincategoryImage_upload.php?id=' + admc_id + '"  id="iframe_photos" width="100%"></iframe>';
//						//here is model body end
//						confirmModalString += '</div>' +
//								//start model footer
//								'<div class="modal-footer">' +
//								'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
//								'</div>' +
//								//end modal footer
//								'</div>' +
//								'</div>' +
//								'</div>';
//
//						var confirmModal = $(confirmModalString);
//						confirmModal.modal('show');
//
//						confirmModal.on('hide.bs.modal', function () {
//							tblAdMainCategory();
//						});
//					});
//
//					$('.btn_select').click(function () {
//						$('#btn_save').prop('hidden', true);
//						$('#btn_edit').prop('hidden', false);
//						var admc_id = $(this).val();
//						$.post('controllers/ubAdMainCategoryController.php', {action: 'getAdMainCategoryByID', admc_id: admc_id}, function (e) {
//							$.each(e, function (index, qdt) {
//								$('#admc_id').val(qdt.admc_id);
//								$
//								$('#admc_name').val(qdt.admc_name);
//							});
//						}, "json");
//					});
//
//					$('.btn_delete').click(function () {
//						var admc_id = $(this).val();
//						swal({
//							title: "Are you sure?",
//							text: "Do you want to delete this category ?",
//							type: "warning",
//							showCancelButton: true,
//							confirmButtonClass: "btn-danger",
//							cancelButtonClass: "btn-light",
//							confirmButtonText: "Yes, delete it!",
//							closeOnConfirm: false
//						}, function () {
//							$.post('controllers/ubAdMainCategoryController.php', {action: 'removeAdMainCategory', admc_id: admc_id}, function (e) {
//								if (parseInt(e.msgType) == 1) {
//									swal("Good Job!", e.msg, "success");
//									clearAdMainCategory();
//								} else {
//									swal("Error!", e.msg, "error");
//								}
//							}, "json");
//						});
//					});
//				});

				$('.btn_upload').click(function () {
					var admc_id = $(this).val();
					var confirmModalString = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Upload Product/Services Main Category Image</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">';
					//here is model body start
					confirmModalString += '<iframe src="admaincategoryImage_upload.php?id=' + admc_id + '"  id="iframe_photos" width="100%"></iframe>';
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
						tblAdMainCategory();
					});
				});




				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var admc_id = $(this).val();
					$.post('controllers/ubAdMainCategoryController.php', {action: 'getAdMainCategoryByID', admc_id: admc_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#admc_id').val(qdt.admc_id);
							$
							$('#admc_name').val(qdt.admc_name);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var admc_id = $(this).val();
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
						$.post('controllers/ubAdMainCategoryController.php', {action: 'removeAdMainCategory', admc_id: admc_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearAdMainCategory();
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

		function addAdMainCategory() {
			var admc_name = $('#admc_name').val();
			var postdata = {
				action: "AddEventItemToCart",
				admc_name: admc_name
			}
			$.post('controllers/ubAdMainCategoryController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearAdMainCategory();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editAdMainCategory() {
			var admc_id = $('#admc_id').val();
			var admc_name = $('#admc_name').val();
			var postdata = {
				action: "editAdMainCategory",
				admc_name: admc_name,
				admc_id: admc_id
			}
			$.post('controllers/ubAdMainCategoryController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearAdMainCategory();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearAdMainCategory() {
			$('#admc_id').val('');
			$('#admc_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#pageform').removeClass('was-validated');
			tblAdMainCategory();
		}




		$(document).ready(function () {
			tblAdMainCategory();
			const form = $('#pageform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					addAdMainCategory();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editAdMainCategory();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearAdMainCategory();
			});


		});
    </script>
</body>
</html>