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
                    <div class="col-lg-6 col-sm-6">
                        <form id="pageform" novalidate>
                            <input type="hidden" class="form-control" id="grp_id">
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
                                <label for="grp_name">Group Name</label>
                                <input type="text" class="form-control" id="grp_name" autocomplete="off" placeholder="Group Name" required>
                                <div class="valid-feedback">
                                    <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                </div>
                                <div class="invalid-feedback">
                                    <i class="fas fa-lg fa-exclamation-circle"></i> Please enter group name
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
                    <div class="col">
                        <div class="table-responsive">
                            <table id="tblFilterGroup" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>                                
                                        <th>Groups</th>                                        
                                        <th>Display Order</th>                                        
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
		function tblFilterGroup(grp_admaincategory, grp_adsubcategory, callback) {
			var tbldata = "";
			$.post('controllers/adFilterSettingsController.php', {action: 'tblFilterGroup', grp_admaincategory: grp_admaincategory, grp_adsubcategory: grp_adsubcategory}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="4" class="bg-danger text-center"> -- Filter groups not available -- </td>';
					tbldata += '</tr>';
					$('#tblFilterGroup tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.grp_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.grp_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '<button class="btn btn-secondary btn_groupinfo" value="' + qdt.grp_id + '"><i class="fas fa-plus"></i></button>';
						tbldata += '</div>';
						tbldata += '<button class="ml-1 btn btn-sm btn-secondary btn_setorder" value="' + qdt.grp_id + '"><i class="fas fa-cog"></i> SET</button>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.grp_name + '</td>';
						if (parseInt(qdt.grp_disp_order) == 0) {
							tbldata += '<td> Not Assigned </td>';
						} else {
							tbldata += '<td>' + qdt.grp_disp_order + '</td>';
						}
						tbldata += '</tr>';
					});
					if ($.fn.DataTable.isDataTable('#tblFilterGroup')) {
						//re initialize 
						$('#tblFilterGroup').DataTable().destroy();
						$('#tblFilterGroup tbody').empty();
						$('#tblFilterGroup tbody').html('').append(tbldata);
						$('#tblFilterGroup').DataTable({
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
						$('#tblFilterGroup tbody').html('').append(tbldata);
						$('#tblFilterGroup').DataTable({
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

				$('#tblFilterGroup').on('draw.dt', function () {
					$('.btn_select').click(function () {
						$('#btn_save').prop('hidden', true);
						$('#btn_edit').prop('hidden', false);
						var grp_id = $(this).val();
						$.post('controllers/adFilterSettingsController.php', {action: 'getFilterGroupByID', grp_id: grp_id}, function (e) {
							$.each(e, function (index, qdt) {
								$('#grp_id').val(qdt.grp_id);
								$('#grp_name').val(qdt.grp_name);
							});
						}, "json");
					});
					$('.btn_delete').click(function () {
						var grp_id = $(this).val();
						swal({
							title: "Are you sure?",
							text: "Do you want to delete this filter group ?",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-danger",
							cancelButtonClass: "btn-light",
							confirmButtonText: "Yes, delete it!",
							closeOnConfirm: false
						}, function () {
							$.post('controllers/adFilterSettingsController.php', {action: 'deleteFilterGroup', grp_id: grp_id}, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("Good Job!", e.msg, "success");
									clearFilterGroup();
									tblFilterGroup(grp_admaincategory, grp_adsubcategory);
								} else {
									swal("Error!", e.msg, "error");
								}
							}, "json");
						});
					});
				});
				$('.btn_setorder').click(function () {
					var grp_id = $(this).val();
					var groupFilterModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog modal-sm" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Set Group Order</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">' +
							//here is model body start                        
							'<div class="row">' +
							'<div class="col-lg-12">' +
							'<form id="filter_form" novalidate>' +
							'<div class="form-group">' +
							'<label for="cmbAdcategory">Choose Display Order</label>' +
							'<select class="col-12 form-control cmbOrder form-control-chosen" data-placeholder="Choose Display Order..." required>' +
							'</select>' +
							'</div>' +
							'</form>' +
							'</div>' +
							'</div>' +
							//here is model body end
							'</div>' +
							//start model footer
							'<div class="modal-footer">' +
							'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
							'<button type="button" class="btn btn-primary" id="btn_setOrder">Set</button>' +
							'</div>' +
							//end modal footer
							'</div>' +
							'</div>' +
							'</div>';
					var groupFilterModal = $(groupFilterModalStr);
					groupFilterModal.modal('show');
					groupFilterModal.find('select').chosen();
					
					
					function cmbAssignOrder() {
						var count = 0;
						var addcount = 0;
						var primary = [];
						var added = []
						var selectbox = "";
						selectbox += '<option value="0">Not Assign</option>';
						$.each(e, function (index, qdt) {
							count++;
							primary.push(count);
							if (parseInt(qdt.grp_disp_order) != 0) {
								addcount++;
								added.push(qdt.grp_disp_order);
							}
						});
						console.log(primary);
						console.log(added);
						$.post('controllers/adFilterSettingsController.php', {action: 'arrayDifferent', ar1: primary, ar2: added}, function (comboarr) {
							console.log(comboarr);
							$.each(comboarr, function (cmb_index, cmb_qdt) {
								selectbox += '<option value="' + cmb_qdt + '">' + cmb_qdt + '</option>';
							});
							groupFilterModal.find('.cmbOrder').html('').append(selectbox);
							chosenRefresh();
						}, "json");

					}

					groupFilterModal.on('shown.bs.modal', function () {
						cmbAssignOrder();
					});

					groupFilterModal.find('#btn_setOrder').click(function (event) {
						var grp_disp_order = groupFilterModal.find('.cmbOrder').val();
						var postData = {
							grp_disp_order: grp_disp_order,
							grp_id: grp_id,
							action: "setGroupFilterOrder"
						}
						var form = groupFilterModal.find('#filter_form');
						form.submit(false);
						form.addClass('was-validated');
						if (form[0].checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							$.post('controllers/adFilterSettingsController.php', postData, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("GROUP ORDER !", e.msg, "success");
									tblFilterGroup(grp_admaincategory, grp_adsubcategory);
									groupFilterModal.modal('hide');
								} else {
									swal("GROUP ORDER  !", e.msg, "warning");
								}
							}, "json");
						}
					});

				});



				$('.btn_groupinfo').click(function () {
					var grp_id = $(this).val();
					var groupFilterModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog modal-lg" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Add Group Filters</h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">' +
							//here is model body start                        
							'<div class="row">' +
							'<div class="col-lg-5">' +
							'<form id="filter_form" novalidate>' +
							'<div class="form-group">' +
							'<label for="cmbAdcategory">Category Filters</label>' +
							'<select class="col-12 form-control cmbAdcategory form-control-chosen" data-placeholder="Choose a Category Filters..." required>' +
							'</select>' +
							'</div>' +
							'</form>' +
							'</div>' +
							'<div class="col-lg-7">' +
							'<div class="table-responsive">' +
							'<table id="tblGroupFilterInfo" class="table table-bordered table-hover" style="width:100%">' +
							'<thead class="thead-dark">' +
							'<tr>' +
							'<th></th>' +
							'<th>Filters</th>' +
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
							'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
							'<button type="button" class="btn btn-primary" id="btn_addfilters">Add</button>' +
							'</div>' +
							//end modal footer
							'</div>' +
							'</div>' +
							'</div>';
					var groupFilterModal = $(groupFilterModalStr);
					groupFilterModal.modal('show');
					groupFilterModal.find('select').chosen();
					function cmbCategoryFilterByCategory(groupFilterModal, catfl_admaincategory, catfl_adsubcategory, callback) {
						var selectbox = "";
						$.post('controllers/adFilterSettingsController.php', {action: 'cmbCategoryFilterByCategory', catfl_admaincategory: catfl_admaincategory, catfl_adsubcategory: catfl_adsubcategory}, function (e) {
							if (e === undefined || e.length === 0 || e === null) {
								selectbox += '<option value="0"> Data not available! </option>';
							} else {
								$.each(e, function (index, qdt) {
									selectbox += '<option value="' + qdt.catfl_filter + '-' + qdt.catfl_type + '">' + qdt.catfl_filter_name + '</option>';
								});
							}

							groupFilterModal.find('.cmbAdcategory').html('').append(selectbox);
							chosenRefresh();
							if (callback !== undefined) {
								if (typeof callback === 'function') {
									callback();
								}
							}

						}, "json");
					}



					function tblgroupFilterInfo(groupFilterModal) {
						var tbldata = "";
						$.post('controllers/adFilterSettingsController.php', {action: 'tblgroupFilterInfo', grinf_group: grp_id}, function (e) {
							if (e === undefined || e.length === 0 || e === null) {
								tbldata += '<tr>';
								tbldata += '<td colspan="2" class="bg-danger text-white text-center"> -- Filters Not Available -- </td>';
								tbldata += '</tr>';
							} else {
								$.each(e, function (index, qdt) {
									index++;
									tbldata += '<tr>';
									tbldata += '<td>';
									tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.grinf_id + '"><i class="fas fa-trash-alt"></i></button>';
									tbldata += '</td>';
									tbldata += '<td>' + qdt.grinf_filter_name + '</td>';
									tbldata += '</tr>';
								});
							}
							groupFilterModal.find('#tblGroupFilterInfo tbody').html('').append(tbldata);
							groupFilterModal.find('.btn_delete').click(function () {
								var grinf_id = $(this).val();
								swal({
									title: "Are you sure?",
									text: "Do you want to remove this filter ?",
									type: "warning",
									showCancelButton: true,
									confirmButtonClass: "btn-danger",
									cancelButtonClass: "btn-light",
									confirmButtonText: "Yes, delete it!",
									closeOnConfirm: false
								}, function () {
									$.post('controllers/adFilterSettingsController.php', {action: 'deleteGroupFilterInfo', grinf_id: grinf_id}, function (e) {
										if (parseInt(e.msgType) == 1) {
											swal("Good Job!", e.msg, "success");
											tblgroupFilterInfo(groupFilterModal);
										} else {
											swal("Error!", e.msg, "error");
										}
										cmbCategoryFilterByCategory(groupFilterModal, grp_admaincategory, grp_adsubcategory);
									}, "json");
								});
							});
						}, "json")
					}




					groupFilterModal.on('shown.bs.modal', function () {
						tblgroupFilterInfo(groupFilterModal);
						cmbCategoryFilterByCategory(groupFilterModal, grp_admaincategory, grp_adsubcategory);
					});
					groupFilterModal.find('#btn_addfilters').click(function (event) {
						var str = groupFilterModal.find('.cmbAdcategory').val();
						var ar = str.split("-");
						var grinf_filter = ar[0];
						var grinf_filtertype = ar[1];
						var postData = {
							grinf_filter: grinf_filter,
							grinf_filtertype: grinf_filtertype,
							grinf_group: grp_id,
							action: "saveGroupFilterInfo"
						}
						var form = groupFilterModal.find('#filter_form');
						form.submit(false);
						form.addClass('was-validated');
						if (form[0].checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							$.post('controllers/adFilterSettingsController.php', postData, function (e) {
								if (parseInt(e.msgType) == 1) {
									swal("GROUP FILTER !", e.msg, "success");
									tblgroupFilterInfo(groupFilterModal);
									cmbCategoryFilterByCategory(groupFilterModal, grp_admaincategory, grp_adsubcategory);
								} else {
									swal("GROUP FILTER !", e.msg, "warning");
								}
							}, "json");
						}
					});
				});
				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var grp_id = $(this).val();
					$.post('controllers/adFilterSettingsController.php', {action: 'getFilterGroupByID', grp_id: grp_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#grp_id').val(qdt.grp_id);
							$('#grp_name').val(qdt.grp_name);
						});
					}, "json");
				});
				$('.btn_delete').click(function () {
					var grp_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this filter group ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/adFilterSettingsController.php', {action: 'deleteFilterGroup', grp_id: grp_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearFilterGroup();
								tblFilterGroup(grp_admaincategory, grp_adsubcategory);
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

		function saveFilterGroup() {
			var grp_admaincategory = $('.cmbAdMainCategory').val();
			var grp_adsubcategory = $('.cmbAdSubCategory').val();
			var grp_name = $('#grp_name').val();
			var postdata = {
				action: "saveFilterGroup",
				grp_admaincategory: grp_admaincategory,
				grp_adsubcategory: grp_adsubcategory,
				grp_name: grp_name
			}
			$.post('controllers/adFilterSettingsController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearFilterGroup();
					tblFilterGroup(grp_admaincategory, grp_adsubcategory);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editFilterGroup() {
			var grp_admaincategory = $('.cmbAdMainCategory').val();
			var grp_adsubcategory = $('.cmbAdSubCategory').val();
			var grp_name = $('#grp_name').val();
			var grp_id = $('#grp_id').val();
			var postdata = {
				action: "editFilterGroup",
				grp_id: grp_id,
				grp_admaincategory: grp_admaincategory,
				grp_adsubcategory: grp_adsubcategory,
				grp_name: grp_name
			}
			$.post('controllers/adFilterSettingsController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearFilterGroup();
					tblFilterGroup(grp_admaincategory, grp_adsubcategory);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearFilterGroup() {
			$('#grp_id').val('');
			$('#grp_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#pageform').removeClass('was-validated');
		}




		$(document).ready(function () {

			cmbRelateCombo('94', '2', '.cmbAdMainCategory', false, function () {
				var cmbAdMainCategory = $('.cmbAdMainCategory').val();
				cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory', false, function () {
					var cmbAdSubCategory = $('.cmbAdSubCategory').val();
					tblFilterGroup(cmbAdMainCategory, cmbAdSubCategory);
				});
			});

			const form = $('#pageform');

			$('.cmbAdMainCategory').change(function () {
				var cmbAdMainCategory = $(this).val();
				cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory');
			});


			$('.cmbAdMainCategory').change(function () {
				var cmbAdMainCategory = $(this).val();
				cmbRelateSubCombo('95', cmbAdMainCategory, '.cmbAdSubCategory', false, function () {
					var cmbAdSubCategory = $('.cmbAdSubCategory').val();
					tblFilterGroup(cmbAdMainCategory, cmbAdSubCategory);
				});
			});
			$('.cmbAdSubCategory').change(function () {
				var cmbAdMainCategory = $('.cmbAdMainCategory').val();
				var cmbAdSubCategory = $(this).val();
				tblFilterGroup(cmbAdMainCategory, cmbAdSubCategory);
			});

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveFilterGroup();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editFilterGroup();
				}
			});

			$('#btn_clear').click(function () {
				form.submit(false);
				clearFilterGroup();
			});


		});
    </script>
</body>
</html>