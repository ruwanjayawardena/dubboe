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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-plus-square"></i> Ad Category Page Filters  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard();"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form id="pageform" novalidate>
                            <input type="hidden" class="form-control" id="catfl_id">
							<div class="form-group">
								<label for="cmbAdcategory">Choose Ad Category</label>
								<div class="col-xl-12 col-lg-12 col-6">
									<select class="col-12 form-control cmbAdMainCategory" data-placeholder="Choose main product/service category..." required>
										<option disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please select ad category
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-6 mt-2">
									<select class="col-12 form-control cmbAdSubCategory" data-placeholder="Choose sub product/service category..." required>
										<option disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please select ad category
									</div>
								</div>

							</div>
							<div class="form-group">
								<label for="catfl_type">Filter Type</label>
								<select class="form-control" id="catfl_type" required>
									<option value="1" selected>Dropdown Select Box Filter</option>
									<option value="2" >Text Box Filter</option>									
								</select>
								<div class="valid-feedback">
									<i class="fas fa-lg fa-check-circle"></i> Looks good! 
								</div>
								<div class="invalid-feedback">
									<i class="fas fa-lg fa-exclamation-circle"></i> Please select filter type
								</div>
							</div> 
							<div class="form-group cmbAllComboBoxFilterDiv" hidden>
								<label for="cmbAllComboBoxFilter">Dropdown Select Box Filters</label>
								<select class="form-control cmbAllComboBoxFilter" required></select>
								<div class="valid-feedback">
									<i class="fas fa-lg fa-check-circle"></i> Looks good! 
								</div>
								<div class="invalid-feedback">
									<i class="fas fa-lg fa-exclamation-circle"></i> Please select dropdown select box filter
								</div>
							</div> 
							<div class="form-group cmbAllTextBoxFilterDiv" hidden>
								<label for="cmbAllTextBoxFilter">Text Box Filter</label>
								<select class="form-control cmbAllTextBoxFilter" required></select>
								<div class="valid-feedback">
									<i class="fas fa-lg fa-check-circle"></i> Looks good! 
								</div>
								<div class="invalid-feedback">
									<i class="fas fa-lg fa-exclamation-circle"></i> Please select text box filter
								</div>
							</div> 

                            <br>
                            <div class="form-group">
                                <button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Add</button>
                                <button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Update</button>
                                <button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="table-responsive">
                            <table id="tblAdcatPageFilter" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>                                
                                        <th>Filters</th>                                        
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
		function tblAdcatPageFilter(catfl_admaincategory, catfl_adsubcategory, callback) {
			var tbldata = "";
			$.post('controllers/adFilterSettingsController.php', {action: 'tblAdcatPageFilter', catfl_admaincategory: catfl_admaincategory, catfl_adsubcategory: catfl_adsubcategory}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- page filters not available -- </td>';
					tbldata += '</tr>';
					$('#tblAdcatPageFilter tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.catfl_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.catfl_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.catfl_filter_name + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblAdcatPageFilter')) {
						//re initialize 
						$('#tblAdcatPageFilter').DataTable().destroy();
						$('#tblAdcatPageFilter tbody').empty();
						$('#tblAdcatPageFilter tbody').html('').append(tbldata);
						$('#tblAdcatPageFilter').DataTable({
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
						$('#tblAdcatPageFilter tbody').html('').append(tbldata);
						$('#tblAdcatPageFilter').DataTable({
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

				$('#tblAdcatPageFilter').on('draw.dt', function () {
					$('.btn_select').click(function () {
						$('#btn_save').prop('hidden', true);
						$('#btn_edit').prop('hidden', false);
						var catfl_id = $(this).val();
						$.post('controllers/adFilterSettingsController.php', {action: 'getAdcatPageFilterByID', catfl_id: catfl_id}, function (e) {
							$.each(e, function (index, qdt) {
								$('#catfl_id').val(qdt.catfl_id);
								cmbAdcategory(qdt.catfl_adcategory);
								$('#catfl_type option[value=' + qdt.catfl_type + ']').prop('selected', true);
								chosenRefresh();
								if (parseInt(qdt.catfl_type) == 1) {
									$('.cmbAllComboBoxFilterDiv').prop('hidden', false);
									$('.cmbAllTextBoxFilterDiv').prop('hidden', true);
									cmbAllComboBoxFilter(qdt.catfl_filter);
								} else {
									$('.cmbAllComboBoxFilterDiv').prop('hidden', true);
									$('.cmbAllTextBoxFilterDiv').prop('hidden', false);
									cmbAllTextBoxFilter(qdt.catfl_filter)
								}
							});
						}, "json");
					});

					$('.btn_delete').click(function () {
						var catfl_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to delete this filter ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, delete it!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/adFilterSettingsController.php', {action: 'deleteAdcatPageFilter', catfl_id: catfl_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Good Job!", e.msg, "success");
									clearAdcatPageFilter();
									tblAdcatPageFilter(catfl_admaincategory, catfl_adsubcategory);
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
					var catfl_id = $(this).val();
					$.post('controllers/adFilterSettingsController.php', {action: 'getAdcatPageFilterByID', catfl_id: catfl_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#catfl_id').val(qdt.catfl_id);
							cmbAdcategory(qdt.catfl_adcategory);
							$('#catfl_type option[value=' + qdt.catfl_type + ']').prop('selected', true);
							chosenRefresh();
							if (parseInt(qdt.catfl_type) == 1) {
								$('.cmbAllComboBoxFilterDiv').prop('hidden', false);
								$('.cmbAllTextBoxFilterDiv').prop('hidden', true);
								cmbAllComboBoxFilter(qdt.catfl_filter);
							} else {
								$('.cmbAllComboBoxFilterDiv').prop('hidden', true);
								$('.cmbAllTextBoxFilterDiv').prop('hidden', false);
								cmbAllTextBoxFilter(qdt.catfl_filter)
							}
						});
					}, "json");
				});


				$('.btn_delete').click(function () {
					var catfl_id = $(this).val();
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
						$.post('controllers/adFilterSettingsController.php', {action: 'deleteAdcatPageFilter', catfl_id: catfl_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearAdcatPageFilter();
								tblAdcatPageFilter(catfl_admaincategory, catfl_adsubcategory);
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

		function saveAdcatPageFilter() {
			var catfl_filter = 0;
			var catfl_admaincategory = $('.cmbAdMainCategory').val();
			var catfl_adsubcategory = $('.cmbAdSubCategory').val();
			var catfl_type = $('#catfl_type').val();
			if (parseInt(catfl_type) == 1) {
				catfl_filter = $('.cmbAllComboBoxFilter').val();
			} else {
				catfl_filter = $('.cmbAllTextBoxFilter').val();
			}
			var postdata = {
				action: "saveAdcatPageFilter",
				catfl_adsubcategory: catfl_adsubcategory,
				catfl_admaincategory: catfl_admaincategory,
				catfl_filter: catfl_filter,
				catfl_type: catfl_type
			}
			$.post('controllers/adFilterSettingsController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearAdcatPageFilter();
					tblAdcatPageFilter(catfl_admaincategory, catfl_adsubcategory);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editAdcatPageFilter() {
			var catfl_filter1 = 0;
			var catfl_id = $('#catfl_id').val();
			var catfl_admaincategory = $('.cmbAdMainCategory').val();
			var catfl_adsubcategory = $('.cmbAdSubCategory').val();
			var catfl_type = $('#catfl_type').val();
			if (parseInt(catfl_type) == 1) {
				catfl_filter1 = $('.cmbAllComboBoxFilter').val();
			} else {
				catfl_filter1 = $('.cmbAllTextBoxFilter').val();
			}
			var postdata = {
				action: "editAdcatPageFilter",
				catfl_id: catfl_id,
				catfl_adsubcategory: catfl_adsubcategory,
				catfl_admaincategory: catfl_admaincategory,
				catfl_filter: catfl_filter1,
				catfl_type: catfl_type
			}
			$.post('controllers/adFilterSettingsController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearAdcatPageFilter();
					tblAdcatPageFilter(catfl_admaincategory, catfl_adsubcategory);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearAdcatPageFilter() {
			$('#catfl_id').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#pageform').removeClass('was-validated');
		}




		$(document).ready(function () {
			cmbRelateCombo('94', '2', '.cmbAdMainCategory', false, function () {
				var cmbAdMainCategory = $('.cmbAdMainCategory').val();
				cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory', false, function () {
					var cmbAdSubCategory = $('.cmbAdSubCategory').val();
					tblAdcatPageFilter(cmbAdMainCategory, cmbAdSubCategory);
				});
			});

			$('.cmbAdMainCategory').change(function () {
				var cmbAdMainCategory = $(this).val();
				cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory', false, function () {
					var cmbAdSubCategory = $('.cmbAdSubCategory').val();
					tblAdcatPageFilter(cmbAdMainCategory, cmbAdSubCategory);
				});
			});
			$('.cmbAdSubCategory').change(function () {
				var cmbAdMainCategory = $('.cmbAdMainCategory').val();
				var cmbAdSubCategory = $(this).val();
				tblAdcatPageFilter(cmbAdMainCategory, cmbAdSubCategory);
			});


			cmbAllComboBoxFilter();
			cmbAllTextBoxFilter();

			var catfl_type = $('#catfl_type').val();

			if (parseInt(catfl_type) == 1) {
				$('.cmbAllComboBoxFilterDiv').prop('hidden', false);
				$('.cmbAllTextBoxFilterDiv').prop('hidden', true);
			} else {
				$('.cmbAllComboBoxFilterDiv').prop('hidden', true);
				$('.cmbAllTextBoxFilterDiv').prop('hidden', false);
			}

			const form = $('#pageform');

			$('#catfl_type').change(function () {
				var catfl_type = $(this).val();
				if (parseInt(catfl_type) == 1) {
					$('.cmbAllComboBoxFilterDiv').prop('hidden', false);
					$('.cmbAllTextBoxFilterDiv').prop('hidden', true);
				} else {
					$('.cmbAllComboBoxFilterDiv').prop('hidden', true);
					$('.cmbAllTextBoxFilterDiv').prop('hidden', false);
				}
			})

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveAdcatPageFilter();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editAdcatPageFilter();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearAdcatPageFilter();
			});


		});
    </script>
</body>
</html>