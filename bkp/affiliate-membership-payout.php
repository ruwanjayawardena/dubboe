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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-sitemap fa-lg"></i> Affiliate Membership Payout&nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a> 	<button class="btn btn-primary btnReleasePayment ml-2">Released Payment For All Selected</button></h4>                       
                    </div>
                </div>
                <div class="row justify-content-center">                  
                    <div class="col-lg-8 col-12">					
						<input type="hidden" id="selectedUsers">
                        <div class="table-responsive">
                            <table id="tblReferenceUsersByUser"  class="table table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                        
                                        <th>
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" id="selectAll">
												<label class="custom-control-label" for="selectAll">All</label>
											</div>
										</th>                           
                                        <!--<th></th>-->                           
                                        <th>Received To</th>
                                        <th>From</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Credit Received</th>                                    
                                        <!--<th>Hierarchical Level</th>-->                                    
									</tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<div class="col-lg-4 col-12 payoutPendingDiv">
						<div class="table-responsive">
                            <table id="tblPayoutPendingBadgeGroup"  class="table table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                          
                                        <th></th>
                                        <th>Pending PayPal Badge Group</th>
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
		function tblPayoutPendingBadgeGroup(callback) {
			tbldata = "";
			$.post('controllers/userController.php', {action: 'tblPayoutPendingBadgeGroup'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					$('.payoutPendingDiv').prop('hidden', true);
				} else {
					$('.payoutPendingDiv').prop('hidden', false);
					$.each(e, function (index, qdt) {
						tbldata += '<tr>';
						tbldata += '<td><button class="btn btn-warning btn-processbadge" value="' + qdt.rec_paypal_batch_id + '">Process</button></td>';
						tbldata += '<td>' + qdt.rec_paypal_batch_id + '</td>';
						tbldata += '</tr>';
					});
				}
				$('#tblPayoutPendingBadgeGroup tbody').html('').append(tbldata);

				$('.btn-processbadge').click(function () {
					var rec_paypal_batch_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to manually re check of this users payment?",
						type: "info",
						showCancelButton: true,
						cancelButtonClass: "btn-light",
						closeOnConfirm: false
					}, function () {
						swal({
							title: "MEMBERSHIP PAYOUT!",
							text: "Please wait for processing your payout...",
							imageUrl: '../assets/img/gif/1.gif',
							showConfirmButton: false
						});
						$.post('controllers/paypalController.php', {action: 'membershipBadgePayoutManually', rec_paypal_batch_id: rec_paypal_batch_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("MEMBERSHIP PAYOUT!", e.msg, "success");
								tblAdminPayoutNeedUsers();
								tblPayoutPendingBadgeGroup();
							} else {
								swal("MEMBERSHIP PAYOUT!", e.msg, "warning");
								tblAdminPayoutNeedUsers();
								tblPayoutPendingBadgeGroup();
							}
						}, "json");
					});

				})
			}, "json");
		}

		function tblAdminPayoutNeedUsers(callback) {
			var tbldata = "";
			$.post('controllers/userController.php', {action: 'tblAdminPayoutNeedUsers'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
//					$('.btnReleasePayment').prop('hidden',true);
					tbldata += '<tr>';
					tbldata += '<td colspan="7" class="bg-danger text-white text-center">Referral members not available</td>';
					tbldata += '</tr>';
					$('#tblReferenceUsersByUser tbody').html('').append(tbldata);
				} else {
//					$('.btnReleasePayment').prop('hidden',false);
					$.each(e, function (index, qdt) {
						if (parseInt(qdt.rec_payout_status) == 0) {
							tbldata += '<tr>';
							tbldata += '<td>';
							tbldata += '<div class="custom-control custom-checkbox">';
							tbldata += '<input class="custom-control-input chkUser" type="checkbox" id="chk-' + qdt.uaf_ref_user + '" value="' + qdt.rec_id + '-' + qdt.rec_points + '-' + qdt.uaf_ref_user + '">';
							tbldata += '<label class="custom-control-label" for="chk-' + qdt.uaf_ref_user + '"></label>';
							tbldata += '</div>'
							tbldata += '</td>';
						} else if (parseInt(qdt.rec_payout_status) == 1) {
							tbldata += '<tr class="bg-dark text-dark font-weight-bold">';
							tbldata += '<td>';
							tbldata += 'BADGE ID: #'+ qdt.rec_paypal_batch_id;
							tbldata += '</td>';
						}
//						tbldata += '<td></td>';
						tbldata += '<td><a target="_blank" href="../public-profile.php?usr_id=' + qdt.uaf_ref_user + '"><strong>' + qdt.receiver_name + '</strong><a><br><h4 class="badge badge-primary text-white"></h4></td>';
						tbldata += '<td><a target="_blank" href="../public-profile.php?usr_id=' + qdt.rec_relate_ref_user + '"><strong>' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</strong><a><br><h4 class="badge badge-primary text-white"></h4></td>';
						tbldata += '<td>' + qdt.usr_email + '</td>';
						tbldata += '<td>' + qdt.usr_phone + '</td>';
						tbldata += '<td>$' + qdt.rec_points + '</td>';
//							tbldata += '<td>' + qdt.alvl_name + '</td>';
						tbldata += '</tr>';
					});
					$('#tblReferenceUsersByUser tbody').html('').append(tbldata);


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

		function testGetBatchDAtaByID() {
			$.post('controllers/paypalController.php', {action: 'membershipPayoutGetPayPalInfo'}, function (e) {
				console.log(e);
			}, "json");
		}

		$(document).ready(function () {
			tblAdminPayoutNeedUsers();
			tblPayoutPendingBadgeGroup();

			$('.btnReleasePayment').click(function () {
				var pay_array_object = $('#selectedUsers').val();
				if (pay_array_object === "") {
					swal("MEMBERSHIP PAYOUT!", "Please select at least one user for make process", "warning");
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
							title: "MEMBERSHIP PAYOUT!",
							text: "Please wait for processing your payout...",
							imageUrl: '../assets/img/gif/1.gif',
							showConfirmButton: false
						});
						$.post('controllers/paypalController.php', {action: 'membershipPayout', pay_array_object: pay_array_object}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("MEMBERSHIP PAYOUT!", e.msg, "success");
								tblAdminPayoutNeedUsers();
								tblPayoutPendingBadgeGroup();
							} else {
								swal("MEMBERSHIP PAYOUT!", e.msg, "warning");
								tblAdminPayoutNeedUsers();
								tblPayoutPendingBadgeGroup();
							}
						}, "json");
					});
				}
			})

		});
    </script>
</body>
</html>