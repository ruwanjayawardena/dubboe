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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-th fa-lg"></i> Credit System & Membership Plan&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a></h4>                       
                    </div>
                </div>
                <div class="row">                  
                    <div class="col-lg-12 col-12">
                        <div class="table-responsive">
                            <table id="tblCredit" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
										<th></th>                                        
										<th class="text-center">Category</th>
										<th class="text-center">Referral Credits</th>
										<th class="text-center">Membership Amount(Per Month)</th>
										<th class="text-center">Monthly Subscription Discount Rate</th>
										<th class="text-center">Annual Discount Rate</th>
										<th class="text-center">Membership Renewal Days</th>
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
		function tblCredit(callback) {
			var tbldata = "";
			$.post('controllers/ubCreditController.php', {action: 'tblCredit'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- Data Not Available -- </td>';
					tbldata += '</tr>';
					$('#tblCredit tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="ml-1 btn btn-sm btn-secondary btn_edit" value="' + qdt.cr_id + '"><i class="fas fa-cog"></i> Edit</button>';
						tbldata += '</div>';
						tbldata += '<td>' + qdt.rlcmb_name + '</td>';
						tbldata += '<td class="text-center">$' + qdt.cr_amount + '</td>';
						tbldata += '<td class="text-center">$' + qdt.cr_membership + '</td>';
						tbldata += '<td class="text-center">' + qdt.cr_month_subcription_discount_rt + '%</td>';
						tbldata += '<td class="text-center">' + qdt.cr_annual_discount_discount_rt + '%</td>';
						tbldata += '<td class="text-center">' + qdt.cr_membership_renew_days + ' Days</td>';
						tbldata += '</tr>';
					});

					$('#tblCredit tbody').html('').append(tbldata);
					$('[data-toggle="tooltip"]').tooltip();
				}

				$('.btn_edit').click(function () {
					var cr_id = $(this).val();
					$.post('controllers/ubCreditController.php', {action: 'getCreditByID', cr_id: cr_id}, function (up) {
						var groupFilterModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog modal-sm" role="document">' +
								'<div class="modal-content">' +
								'<div class="modal-header">' +
								'<h5 class="modal-title" id="exampleModalLabel">Update Credit & Membership Info</h5>' +
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
								'<label for="cr_amount">Referral Credit Amount</label>' +
								'<input type="text" class="form-control" id="cr_amount" value="' + up.cr_amount + '">' +
								'</div>' +
								'<div class="form-group">' +
								'<label for="cr_membership">Membership Amount</label>' +
								'<input type="text" class="form-control" id="cr_membership" value="' + up.cr_membership + '">' +
								'</div>' +
								'<div class="form-group">' +
								'<label for="cr_month_subcription_discount_rt">Monthly Subcreption Discount Rate</label>' +
								'<input type="text" class="form-control" id="cr_month_subcription_discount_rt" value="' + up.cr_month_subcription_discount_rt + '">' +
								'</div>' +
								'<div class="form-group">' +
								'<label for="cr_annual_discount_discount_rt">Annual Discount Rate</label>' +
								'<input type="text" class="form-control" id="cr_annual_discount_discount_rt" value="' + up.cr_annual_discount_discount_rt + '">' +
								'</div>' +
								'<div class="form-group">' +
								'<label for="cr_membership_renew_days">Membership Renewal Days</label>' +
								'<input type="text" class="form-control" id="cr_membership_renew_days" value="' + up.cr_membership_renew_days + '">' +
								'</div>' +
								'</form>' +
								'</div>' +
								'</div>' +
								//here is model body end
								'</div>' +
								//start model footer
								'<div class="modal-footer">' +
								'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
								'<button type="button" class="btn btn-primary" id="btn_update">Update</button>' +
								'</div>' +
								//end modal footer
								'</div>' +
								'</div>' +
								'</div>';
						var groupFilterModal = $(groupFilterModalStr);
						groupFilterModal.modal('show');


						groupFilterModal.find('#btn_update').click(function (event) {
							var cr_amount = groupFilterModal.find('#cr_amount').val();
							var cr_membership = groupFilterModal.find('#cr_membership').val();
							var cr_month_subcription_discount_rt = groupFilterModal.find('#cr_month_subcription_discount_rt').val();
							var cr_annual_discount_discount_rt = groupFilterModal.find('#cr_annual_discount_discount_rt').val();
							var cr_membership_renew_days = groupFilterModal.find('#cr_membership_renew_days').val();
							var postData = {
								cr_amount: cr_amount,
								cr_membership: cr_membership,
								cr_month_subcription_discount_rt: cr_month_subcription_discount_rt,
								cr_annual_discount_discount_rt: cr_annual_discount_discount_rt,
								cr_membership_renew_days: cr_membership_renew_days,
								cr_id: cr_id,
								action: "editCredit"
							}
							var form = groupFilterModal.find('#filter_form');
							form.submit(false);
							form.addClass('was-validated');
							if (form[0].checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							} else {
								$.post('controllers/ubCreditController.php', postData, function (e) {
									if (parseInt(e.msgType) == 1) {
										swal("UPDATE CREDIT !", e.msg, "success");
										tblCredit();
										groupFilterModal.modal('hide');
									} else {
										swal("UPDATE CREDIT !", e.msg, "warning");
									}
								}, "json");
							}
						});
					}, "json");
				});


				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}, "json");
		}



		$(document).ready(function () {
			tblCredit();
		});
    </script>
</body>
</html>