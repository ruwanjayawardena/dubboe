<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>        
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>        

        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-file-alt"></i> Pages & Sections  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <form id="pageform" novalidate>
                            <input type="hidden" class="form-control" id="pgs_id">
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="cmbPagefilter1">Filter 1</label>
										<select class="form-control cmbPagefilter1"></select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please select page filter1
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="cmbPagefilter2">Filter 2</label>
										<select class="form-control cmbPagefilter2"></select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please select page filter1
										</div>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="cmbPagefilter2">Style</label>
										<select class="form-control cmbPageStyle"></select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please select style
										</div>
									</div>
								</div>
                            </div>
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="pgs_heading">Heading/ Menu Name</label>
										<input type="text" class="form-control" id="pgs_heading" placeholder="Heading" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter heading
										</div>
									</div>
								</div>
							</div>
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="pgs_link_name">URL Link Name</label>
										<input type="text" class="form-control" id="pgs_link_name" placeholder="Link/Menu Name" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Link/Menu Name
										</div>
									</div>
								</div>
							</div> 
                            <div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="pgs_content">Content</label>
										<textarea class="summernote control-label" id="pgs_content" required></textarea>								
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Content
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
                            <table id="tblPages" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>                                
                                        <th>Filter 1</th>                                        
                                        <th>Filter 2</th>                                        
                                        <th>Style</th>                                        
                                        <th>Pages/Section</th>                                        
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
		function tblPages(callback) {
			var tbldata = "";
			$.post('controllers/pageController.php', {action: 'allPageSection'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="6" class="bg-danger text-center"> -- Pages/Sections Not Available -- </td>';
					tbldata += '</tr>';
					$('#tblPages tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.pgs_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.pgs_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.flh_name + '</td>';
						tbldata += '<td>' + qdt.fls_name + '</td>';
						tbldata += '<td>' + qdt.sty_name + '</td>';
						tbldata += '<td>Heading/Menu Name: <strong>' + qdt.pgs_heading + '</strong><br>URL Link Name :<strong>' + qdt.pgs_link_name + '</strong></td>';
						tbldata += '</tr>';
					});

					if ($.fn.DataTable.isDataTable('#tblPages')) {
						//re initialize 
						$('#tblPages').DataTable().destroy();
						$('#tblPages tbody').empty();
						$('#tblPages tbody').html('').append(tbldata);
						$('#tblPages').DataTable({
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
						$('#tblPages tbody').html('').append(tbldata);
						$('#tblPages').DataTable({
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

				$('#tblPages').on('draw.dt', function () {
					$('.btn_select').click(function () {
						$('#btn_save').prop('hidden', true);
						$('#btn_edit').prop('hidden', false);
						var pgs_id = $(this).val();
						$.post('controllers/pageController.php', {action: 'getPageSectionByID', pgs_id: pgs_id}, function (e) {
							$.each(e, function (index, qdt) {
								$('#pgs_id').val(qdt.pgs_id);
								$('#pgs_link_name').val(qdt.pgs_link_name);
								$('#pgs_heading').val(qdt.pgs_heading);
								$('#pgs_content').summernote('reset');
								$('#pgs_content').summernote('code', qdt.pgs_content);
								cmbPagefilter1(qdt.pgs_filter_one);
								cmbPagefilter2(qdt.pgs_filter_one, qdt.pgs_filter_two);
								cmbPageStyle(qdt.pgs_style);
							});
						}, "json");
					});

					$('.btn_delete').click(function () {
						var pgs_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to delete this page/ section ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, delete it!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/pageController.php', {action: 'removePageSection', pgs_id: pgs_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Good Job!", e.msg, "success");
									clearPageSection();
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
					var pgs_id = $(this).val();
					$.post('controllers/pageController.php', {action: 'getPageSectionByID', pgs_id: pgs_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#pgs_id').val(qdt.pgs_id);
							$('#pgs_link_name').val(qdt.pgs_link_name);
							$('#pgs_heading').val(qdt.pgs_heading);
							$('#pgs_content').summernote('reset');
							$('#pgs_content').summernote('code', qdt.pgs_content);
							cmbPagefilter1(qdt.pgs_filter_one);
							cmbPagefilter2(qdt.pgs_filter_one, qdt.pgs_filter_two);
							cmbPageStyle(qdt.pgs_style);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var pgs_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this page/ section ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/pageController.php', {action: 'removePageSection', pgs_id: pgs_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearPageSection();
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

		function addPageSection() {
			var pgs_link_name = $('#pgs_link_name').val();
			var pgs_heading = $('#pgs_heading').val();
			var pgs_content = $('#pgs_content').val();
			var pgs_filter_one = $('.cmbPagefilter1').val();
			var pgs_filter_two = $('.cmbPagefilter2').val();
			var pgs_style = $('.cmbPageStyle').val();
			var postdata = {
				action: "addPageSection",
				pgs_link_name: pgs_link_name,
				pgs_heading: pgs_heading,
				pgs_content: pgs_content,
				pgs_filter_one: pgs_filter_one,
				pgs_filter_two: pgs_filter_two,
				pgs_style: pgs_style
			}
			$.post('controllers/pageController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearPageSection();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editPageSection() {
			var pgs_id = $('#pgs_id').val();
			var pgs_link_name = $('#pgs_link_name').val();
			var pgs_heading = $('#pgs_heading').val();
			var pgs_content = $('#pgs_content').val();
			var pgs_filter_one = $('.cmbPagefilter1').val();
			var pgs_filter_two = $('.cmbPagefilter2').val();
			var pgs_style = $('.cmbPageStyle').val();
			var postdata = {
				action: "editPageSection",
				pgs_link_name: pgs_link_name,
				pgs_heading: pgs_heading,
				pgs_content: pgs_content,
				pgs_filter_one: pgs_filter_one,
				pgs_filter_two: pgs_filter_two,
				pgs_style: pgs_style,
				pgs_id: pgs_id
			}
			$.post('controllers/pageController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearPageSection();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearPageSection() {
			$('#pgs_id').val('');
			$('#pgs_link_name').val('');
			$('#pgs_heading').val('');
			$('#pgs_content').summernote('reset');
			$('#pgs_content').summernote('code', '');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#pageform').removeClass('was-validated');
			tblPages();
		}




		$(document).ready(function () {

			$('.summernote').summernote({
				placeholder: 'Content Here',
				height: 250
			});

			cmbPageStyle();
			cmbPagefilter1(false, function () {
				var flh_id = $('.cmbPagefilter1').val();
				cmbPagefilter2(flh_id);
			});

			$('.cmbPagefilter1').change(function () {
				var flh_id = $(this).val();
				cmbPagefilter2(flh_id);
			});
			tblPages();
			const form = $('#pageform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					addPageSection();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editPageSection();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearPageSection();
			});


		});
    </script>
</body>
</html>