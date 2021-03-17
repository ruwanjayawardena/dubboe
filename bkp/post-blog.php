<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>  
		<style>
			legend{
				font-size: 0.8rem;
				font-weight: bold;
				width: 30%;
				border: 1px solid #dddddd26;
				border-radius: 4px;
				padding: 5px 5px 5px 10px;
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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-blog"></i> Blog Post  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard();"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
					<div class="col-lg-8 col-12">
						<form id="blogform" novalidate>
							<div class="row">
								<div class="col-lg-3 col-12">
									<div class="form-row">
										<label>Select a category</label>
										<div class="form-group col-xl-12 col-12">
											<select class="col-12 form-control cmbBLOGMainCat form-control-chosen" required>
												<option disabled selected>Loading...</option>
											</select>											
										</div>								
										<div class="form-group col-xl-12 col-12">   

											<select class="col-12 form-control cmbBLOGSubCat form-control-chosen" required>
												<option disabled selected>Loading...</option>
											</select>												
										</div>								
									</div>
								</div>
								<div class="col-lg-9 col-12">
									<input type="hidden" class="form-control" id="blg_id">									
									<div class="form-group">
										<label for="blg_title">Heading</label>
										<input type="text" class="form-control" id="blg_title" placeholder="Heading" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter blog heading
										</div>
									</div>
									<div class="form-group">
										<label for="blg_body">Content</label>
										<textarea class="summernote control-label" id="blg_body" required></textarea>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter post content
										</div>
									</div>
									<br>
									<div class="form-group">
										<button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Save</button>
										<button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Update</button>
										<button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col">
						<div class="table-responsive">
							<table id="tblBlog" class="table table-bordered table-hover" style="width:100%">
								<thead class="thead-dark">
									<tr>                                                       

										<th></th>                                
										<th></th>                                
										<th>Post</th>                                        
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

		function tblBlog(callback) {
			var tbldata = "";
			$.post('controllers/blogController.php', {action: 'getAllBlog'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="4" class="bg-danger text-center"> -- Blogs not available -- </td>';
					tbldata += '</tr>';
					$('#tblBlog tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.blg_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.blg_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '<button class="btn btn-secondary btn_uploadimge" value="' + qdt.blg_id + '"><i class="fas fa-image"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td><strong><a href="../blog-post.php?blg_id=' + qdt.blg_id + '" target="_blank">' + qdt.blg_title + ' </a><br><small>' + qdt.blg_maincat_name + ' / '+qdt.blg_subcat_name+'</small></strong><p><small>Posted By ' + qdt.usr_first_name + ' on '+ qdt.blg_date + '</small></p></td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblBlog')) {
						//re initialize 
						$('#tblBlog').DataTable().destroy();
						$('#tblBlog tbody').empty();
						$('#tblBlog tbody').html('').append(tbldata);
						$('#tblBlog').DataTable({
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
						$('#tblBlog tbody').html('').append(tbldata);
						$('#tblBlog').DataTable({
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
					}

					$('[data-toggle="tooltip"]').tooltip();
				}

				$('#tblBlog').on('draw.dt', function () {
					$('.btn_select').click(function () {
						$('#btn_save').prop('hidden', true);
						$('#btn_edit').prop('hidden', false);
						var blg_id = $(this).val();
						$.post('controllers/blogController.php', {action: 'getBlogByID', blg_id: blg_id}, function (e) {
							$.each(e, function (index, qdt) {
								$('#blg_id').val(qdt.blg_id);
								$('#blg_title').val(qdt.blg_title);
								$('#blg_body').summernote('reset');
								$('#blg_body').summernote('code', qdt.blg_body);
								cmbRelateCombo('90', '2', '.cmbBLOGMainCat', qdt.blg_maincat, function () {
									cmbRelateSubCombo('91', qdt.blg_maincat, '.cmbBLOGSubCat', qdt.blg_subcat);
								});
							});
						}, "json");
					});

					$('.btn_delete').click(function () {
						var blg_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to delete this blog ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, delete it!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/blogController.php', {action: 'deleteBlog', blg_id: blg_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Good Job!", e.msg, "success");
									clearBlog();
								} else {
									swal("Error!", e.msg, "error");
								}
							}, "json");
						});
					});
					$('.btn_uploadimge').click(function () {
						var blg_id = $(this).val();
						var modelImgUploderStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog" role="document">' +
								'<div class="modal-content">' +
								'<div class="modal-header">' +
								'<h5 class="modal-title" id="exampleModalLabel">Blog Header Image Upload</h5>' +
								'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
								'<span aria-hidden="true">&times;</span>' +
								'</button>' +
								'</div>' +
								'<div class="modal-body">' +
								//here is model body start                        
								'<iframe  id="iframe_imageupload" src="blog_imageupload.php?blg_id=' + blg_id + '" width="100%"></iframe> ' +
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
				});



				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var blg_id = $(this).val();
					$.post('controllers/blogController.php', {action: 'getBlogByID', blg_id: blg_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#blg_id').val(qdt.blg_id);
							$('#blg_title').val(qdt.blg_title);
							$('#blg_body').summernote('reset');
							$('#blg_body').summernote('code', qdt.blg_body);
							cmbRelateCombo('90', '2', '.cmbBLOGMainCat', qdt.blg_maincat, function () {
								cmbRelateSubCombo('91', qdt.blg_maincat, '.cmbBLOGSubCat', qdt.blg_subcat);
							});
						});
					}, "json");
				});

				$('.btn_uploadimge').click(function () {
					var blg_id = $(this).val();
					var modelImgUploderStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Blog Header Image Upload</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">' +
							//here is model body start                        
							'<iframe  id="iframe_imageupload" src="blog_imageupload.php?blg_id=' + blg_id + '" width="100%"></iframe> ' +
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
					var blg_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this blog ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/blogController.php', {action: 'deleteBlog', blg_id: blg_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearBlog();
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

		function saveBlog() {
			var blg_maincat = $('.cmbBLOGMainCat').val();
			var blg_subcat = $('.cmbBLOGSubCat').val();
			var blg_title = $('#blg_title').val();
			var blg_body = $('#blg_body').summernote('code');
			var postdata = {
				action: "saveBlogByLoggedUser",
				blg_title: blg_title,
				blg_body: blg_body,
				blg_maincat: blg_maincat,
				blg_subcat: blg_subcat
			}
			$.post('controllers/blogController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearBlog();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editBlog() {
			var blg_maincat = $('.cmbBLOGMainCat').val();
			var blg_subcat = $('.cmbBLOGSubCat').val();
			var blg_id = $('#blg_id').val();
			var blg_title = $('#blg_title').val();
			var blg_body = $('#blg_body').summernote('code');
			var postdata = {
				action: "editBlog",
				blg_id: blg_id,
				blg_title: blg_title,
				blg_body: blg_body,
				blg_maincat: blg_maincat,
				blg_subcat: blg_subcat
			}
			$.post('controllers/blogController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearBlog();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearBlog() {
			$('#blg_id').val('');
			$('#blg_title').val('');
			$('#blg_body').summernote('reset');
			$('#blg_body').summernote('code', '');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#blogform').removeClass('was-validated');
			tblBlog();
		}



		$(window).on('load', function () {
			// Executes when complete page is fully loaded, including
			// all frames, objects and images
			$('.summernote').summernote({
				placeholder: 'Blog content here',
				height: 250

			});
		});

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			cmbRelateCombo('90', '2', '.cmbBLOGMainCat', false, function () {
				var cmbBLOGMainCat = $('.cmbBLOGMainCat').val();
				cmbRelateSubCombo('91', cmbBLOGMainCat, '.cmbBLOGSubCat');
			});

			$('.cmbBLOGMainCat').change(function () {
				var cmbBLOGMainCat = $(this).val();
				cmbRelateSubCombo('91', cmbBLOGMainCat, '.cmbBLOGSubCat');
			});

			tblBlog();
			const form = $('#blogform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveBlog();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editBlog();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearBlog();
			});


		});
	</script>
</body>
</html>