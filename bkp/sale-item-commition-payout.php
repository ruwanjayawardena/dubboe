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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-percent fa-lg"></i> Account Executive Commission Payout&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a> 	<button class="btn btn-primary btnReleasePayment ml-2">Released Payment For All Selected</button><button class="btn btn-dark btnSellingHistory ml-2" onclick="window.location.href = 'selling-history.php'">View Selling History</button></h4>                       
                    </div>
                </div>
                <div class="row justify-content-center">  
					<div class="col-lg-2 col-12">
						<form id="pageform" novalidate>
							<div class="form-group">
								<label for="sys_account_executive_com_rate">Commission Rate</label>
								<input type="text" class="form-control" id="sys_account_executive_com_rate" placeholder="Category" required>
								<div class="valid-feedback">
									<i class="fas fa-lg fa-check-circle"></i> Looks good! 
								</div>
								<div class="invalid-feedback">
									<i class="fas fa-lg fa-exclamation-circle"></i> Please enter commission rate
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-sm btn-secondary" id="btn_updatecommission"><i class="fas fa-edit"></i> Update</button>
							</div>							
						</form>
					</div>
                    <div class="col-lg-6 col-12">					
						<input type="hidden" id="selectedUsers">
                        <div class="table-responsive">
                            <table id="tblPayoutAccountExecutives"  class="table table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                        
                                        <th>
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" id="selectAll">
												<label class="custom-control-label" for="selectAll">All</label>
											</div>
										</th>                          
                                        <th>Account Executive</th>                                        
                                        <th>Total Earned</th>                                        
                                        <th>Commission Rate</th>                                
                                        <th>Commission Total</th>                                
									</tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>		
					<div class="col-lg-4 col-12 payoutPendingDiv">
						<div class="table-responsive">
                            <table id="tblPayoutPendingCommission"  class="table table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                          
                                        <th></th>
                                        <th>Reference Account Executive</th>
                                        <th>Pending PayPal Commissions Badge ID</th>
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
		function loadSystemInfo() {
			$.post('controllers/settingController.php', {action: 'getAllSystemInfo'}, function (e) {
				$.each(e, function (index, qdt) {
					$('#sys_account_executive_com_rate').val(qdt.sys_account_executive_com_rate);
				});
			}, "json");
		}


		function tblPayoutPendingCommission(callback) {
			tbldata = "";
			$.post('controllers/paypalController.php', {action: 'tblPendingPayoutAccountExecutives'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					$('.payoutPendingDiv').prop('hidden', true);
				} else {
					$('.payoutPendingDiv').prop('hidden', false);
					$.each(e, function (index, qdt) {
						tbldata += '<tr>';
						tbldata += '<td><button class="btn btn-warning btn-processbadge" value="' + qdt.oritm_batch_id + '">Process</button></td>';
						tbldata += '<td>' + qdt.executive_name + '</td>';
						tbldata += '<td>' + qdt.oritm_batch_id + '</td>';
						tbldata += '</tr>';
					});
				}
				$('#tblPayoutPendingCommission tbody').html('').append(tbldata);

				$('.btn-processbadge').click(function () {
					var oritm_batch_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to manually re check of this users payment?",
						type: "info",
						showCancelButton: true,
						cancelButtonClass: "btn-light",
						closeOnConfirm: false
					}, function () {
						swal({
							title: "COMMISSION PAYOUT!",
							text: "Please wait for processing your payout...",
							imageUrl: '../assets/img/gif/1.gif',
							showConfirmButton: false
						});
						$.post('controllers/paypalController.php', {action: 'commissionBadgePayoutManually', oritm_batch_id: oritm_batch_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("COMMISSION PAYOUT!", e.msg, "success");
								loadSystemInfo();
								tblPayoutAccountExecutives();
								tblPayoutPendingCommission();
							} else {
								swal("COMMISSION PAYOUT!", e.msg, "warning");
								loadSystemInfo();
								tblPayoutAccountExecutives();
								tblPayoutPendingCommission();
							}
						}, "json");
					});

				})
			}, "json");
		}

		function tblPayoutAccountExecutives(callback) {
			var tbldata = "";
			$.post('controllers/paypalController.php', {action: 'tblPayoutAccountExecutives'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
//					$('.btnReleasePayment').prop('hidden',true);
					tbldata += '<tr>';
					tbldata += '<td colspan="5" class="bg-danger text-white text-center">Account Executives not available</td>';
					tbldata += '</tr>';
					$('#tblPayoutAccountExecutives tbody').html('').append(tbldata);
				} else {
//					$('.btnReleasePayment').prop('hidden',false);
					$.each(e, function (index, qdt) {
						if (parseInt(qdt.oritm_commission_release_status) == 0) {
							tbldata += '<tr>';
							tbldata += '<td>';
							tbldata += '<div class="custom-control custom-checkbox">';
							tbldata += '<input class="custom-control-input chkUser" type="checkbox" id="chk-' + qdt.evt_executive + '" value="' + qdt.evt_executive + '-' + qdt.sys_account_executive_com_rate + '-' + qdt.commission_total + '">';
							tbldata += '<label class="custom-control-label" for="chk-' + qdt.evt_executive + '"></label>';
							tbldata += '</div>'
							tbldata += '</td>';
						} else if (parseInt(qdt.oritm_commission_release_status) == 1) {
							tbldata += '<tr class="bg-dark text-dark font-weight-bold">';
							tbldata += '<td>';
							tbldata += 'BADGE ID: #' + qdt.oritm_batch_id;
							tbldata += '</td>';
						}

						tbldata += '<td><a target="_blank" href="../public-profile.php?usr_id=' + qdt.evt_executive + '"><strong>' + qdt.executive_name + '</strong><a><br><h4 class="badge badge-primary text-white"></h4></td>';
						tbldata += '<td>$' + qdt.oritm_item_total + ' USD</td>';
						tbldata += '<td>' + qdt.sys_account_executive_com_rate + '%</td>';
						tbldata += '<td>$' + qdt.commission_total + ' USD</td>';
						tbldata += '</tr>';
					});
					$('#tblPayoutAccountExecutives tbody').html('').append(tbldata);


					$('.chkUser').click(function () {
						$('#selectAll').prop('checked', false);
						var ar = [];
						var es = $('.chkUser' + ':checked');
						var v;
						if ($(this).is(':checked')) {
							es.each(function (index) {
								ar.push($(this).val());
							});
						} else {
							es.each(function (index) {
								ar.push($(this).val());
							});
						}
						v = ar.join(',');
						$('#selectedUsers').val(v);
					});

					$('#selectAll').click(function () {
						if ($(this).is(':checked')) {
							$('.chkUser').prop('checked', true);
						} else {
							$('.chkUser').prop('checked', false);
						}
						var ar = [];
						var es = $('.chkUser' + ':checked');
						var v;
						if ($(this).is(':checked')) {
							es.each(function (index) {
								ar.push($(this).val());
							});
						} else {
							es.each(function (index) {
								ar.push($(this).val());
							});
						}
						v = ar.join(',');
						$('#selectedUsers').val(v);
					});


				}
			}, "json");
		}


		$(document).ready(function () {
			loadSystemInfo();
			tblPayoutAccountExecutives();
			tblPayoutPendingCommission();
			const form = $('#pageform');


			$('#btn_updatecommission').click(function () {
				form.submit(false);
				form.addClass('was-validated');
				var sys_account_executive_com_rate = $('#sys_account_executive_com_rate').val();
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					swal({
						title: "Are you sure?",
						text: "Do you want to update commission rate ?",
						type: "info",
						showCancelButton: true,
						cancelButtonClass: "btn-light",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/settingController.php', {action: 'updateFrontEndPageCommissionRate', sys_account_executive_com_rate: sys_account_executive_com_rate}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("COMMISSION RATE!", e.msg, "success");
								loadSystemInfo();
								tblPayoutAccountExecutives();
								tblPayoutPendingCommission();
							} else {
								swal("COMMISSION RATE!", e.msg, "warning");
							}
						}, "json");
					});
				}
			});
			$('.btnReleasePayment').click(function () {
				var pay_array_object = $('#selectedUsers').val();
				if (pay_array_object === "") {
					swal("COMMISSION PAYOUT!", "Please select at least one user for make process", "warning");
				} else {
					swal({
						title: "Are you sure?",
						text: "Do you want to release payment for this selected payment receivers?",
						type: "info",
						showCancelButton: true,
						cancelButtonClass: "btn-light",
						closeOnConfirm: false
					}, function () {
						swal({
							title: "COMMISSION PAYOUT!",
							text: "Please wait for processing your payout...",
							imageUrl: '../assets/img/gif/1.gif',
							showConfirmButton: false
						});
						$.post('controllers/paypalController.php', {action: 'commissionPayout', pay_array_object: pay_array_object}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("COMMISSION PAYOUT!", e.msg, "success");
								loadSystemInfo();
								tblPayoutAccountExecutives();
								tblPayoutPendingCommission();
							} else {
								swal("COMMISSION PAYOUT!", e.msg, "warning");
								loadSystemInfo();
								tblPayoutAccountExecutives();
								tblPayoutPendingCommission();
							}
						}, "json");
					});
				}
			})

		});
    </script>
</body>
</html>