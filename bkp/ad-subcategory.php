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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-th fa-lg"></i> Product/Services Sub Category&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <form id="pageform" novalidate>
                            <input type="hidden" class="form-control" id="adsc_id">                           
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="adsc_name" required>Main Category</label>
										<select class="form-control cmbAdMainCategory"></select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please select category
										</div>
									</div>
								</div>								
							</div>                                                  
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="adsc_name">Category</label>
										<input type="text" class="form-control" id="adsc_name" placeholder="Category" required>
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
                            <table id="tblAdSubCategory" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
<!--										<th></th>                                
                                        <th></th>                            -->
                                        <!--<th></th>-->
										<th colspan="3" class="text-center">Product/Services Sub Category</th>                                        
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
		function tblAdSubCategory(adsc_maincategory, callback) {
			var tbldata = "";
			$.post('controllers/ubAdSubCategoryController.php', {action: 'tblAdSubCategory', adsc_maincategory: adsc_maincategory}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="4" class="bg-danger text-center"> -- Data Not Available -- </td>';
					tbldata += '</tr>';
					$('#tblAdSubCategory tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.adsc_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.adsc_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '<button class="btn btn-secondary btn_upload" value="' + qdt.adsc_id + '"><i class="fas fa-upload"></i> Upload</button>';
						tbldata += '</div>';
						tbldata += '</td>';
//						tbldata += '<td></td>';
						tbldata += '<td class="imgdiv">';
						if (qdt.adsc_img === "#") {
							tbldata += '<img src="../assets/img/noimage.png" class="img-thumbnail">';
						} else {
							tbldata += '<img src="../asset_imageuploader/adsubcategory/' + qdt.adsc_id + '/' + qdt.adsc_img + '" class="img-thumbnail">';
						}
						tbldata += '</td>';
						tbldata += '<td>' + qdt.adsc_name + '</td>';
						tbldata += '</tr>';
					});

					$('#tblAdSubCategory tbody').html('').append(tbldata);

//					if ($.fn.DataTable.isDataTable('#tblAdSubCategory')) {
//						//re initialize 
//						$('#tblAdSubCategory').DataTable().destroy();
//						$('#tblAdSubCategory tbody').empty();
//						$('#tblAdSubCategory tbody').html('').append(tbldata);
//						$('#tblAdSubCategory').DataTable({
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
//						$('#tblAdSubCategory tbody').html('').append(tbldata);
//						$('#tblAdSubCategory').DataTable({
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

//				$('#tblAdSubCategory').on('draw.dt', function () {
//					$('.btn_upload').click(function () {
//						var adsc_id = $(this).val();
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
//						confirmModalString += '<iframe src="adsubcategoryImage_upload.php?id=' + adsc_id + '"  id="iframe_photos" width="100%"></iframe>';
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
//							tblAdSubCategory();
//						});
//					});
//
//					$('.btn_select').click(function () {
//						$('#btn_save').prop('hidden', true);
//						$('#btn_edit').prop('hidden', false);
//						var adsc_id = $(this).val();
//						$.post('controllers/ubAdSubCategoryController.php', {action: 'getAdSubCategoryByID', adsc_id: adsc_id}, function (e) {
//							$.each(e, function (index, qdt) {
//								$('#adsc_id').val(qdt.adsc_id);
//								$
//								$('#adsc_name').val(qdt.adsc_name);
//							});
//						}, "json");
//					});
//
//					$('.btn_delete').click(function () {
//						var adsc_id = $(this).val();
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
//							$.post('controllers/ubAdSubCategoryController.php', {action: 'removeAdSubCategory', adsc_id: adsc_id}, function (e) {
//								if (parseInt(e.msgType) == 1) {
//									swal("Good Job!", e.msg, "success");
//									clearAdSubCategory();
//								} else {
//									swal("Error!", e.msg, "error");
//								}
//							}, "json");
//						});
//					});
//				});

				$('.btn_upload').click(function () {
					var adsc_id = $(this).val();
					var confirmModalString = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Upload Product/Services Sub Category Image</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">';
					//here is model body start
					confirmModalString += '<iframe src="adsubcategoryImage_upload.php?id=' + adsc_id + '"  id="iframe_photos" width="100%"></iframe>';
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
						var adsc_maincategory = $('.cmbAdMainCategory').val();
						tblAdSubCategory(adsc_maincategory);
					});
				});




				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var adsc_id = $(this).val();
					$.post('controllers/ubAdSubCategoryController.php', {action: 'getAdSubCategoryByID', adsc_id: adsc_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#adsc_id').val(qdt.adsc_id);
							$
							$('#adsc_name').val(qdt.adsc_name);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var adsc_id = $(this).val();
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
						$.post('controllers/ubAdSubCategoryController.php', {action: 'removeAdSubCategory', adsc_id: adsc_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearAdSubCategory();
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

		function addAdSubCategory() {
			var adsc_name = $('#adsc_name').val();
			var adsc_maincategory = $('.cmbAdMainCategory').val();
			var postdata = {
				action: "addAdSubCategory",
				adsc_name: adsc_name,
				adsc_maincategory: adsc_maincategory
			}
			$.post('controllers/ubAdSubCategoryController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearAdSubCategory();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editAdSubCategory() {
			var adsc_id = $('#adsc_id').val();
			var adsc_name = $('#adsc_name').val();
			var adsc_maincategory = $('.cmbAdMainCategory').val();
			var postdata = {
				action: "editAdSubCategory",
				adsc_name: adsc_name,
				adsc_id: adsc_id,
				adsc_maincategory: adsc_maincategory
			}
			$.post('controllers/ubAdSubCategoryController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearAdSubCategory();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearAdSubCategory() {
			$('#adsc_id').val('');
			$('#adsc_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#pageform').removeClass('was-validated');
			var adsc_maincategory = $('.cmbAdMainCategory').val();
			tblAdSubCategory(adsc_maincategory);
		}




		$(document).ready(function () {
			cmbAdMainCategory(false, function () {
				var admc_id = $('.cmbAdMainCategory').val();
				tblAdSubCategory(admc_id);
			})
			const form = $('#pageform');
			
			$('.cmbAdMainCategory').change(function(){
				var admc_id = $(this).val();
				tblAdSubCategory(admc_id);
			})

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					addAdSubCategory();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editAdSubCategory();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearAdSubCategory();
			});


		});
    </script>
</body>
</html>