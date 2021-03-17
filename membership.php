<?php include './access_control/auth.php'; ?>
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center mb-4">
						<div class="col-xl-12 col-12">
							<input type="hidden" id="PayerID" value="<?php
							if (isset($_REQUEST['PayerID'])) {
								echo $_REQUEST['PayerID'];
							} else {
								echo "0";
							}
							?>"/>
							<input type="hidden" id="token" value="<?php
							if (isset($_REQUEST['token'])) {
								echo $_REQUEST['token'];
							} else {
								echo "0";
							}
							?>"/>								
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">Membership</a>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-id-badge"></i> Membership</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-6 col-lg-6 col-12">
							<div class="alert alert-secondary bg-gradient-blue">
								<strong class="h4 text-white">Try Membership</strong>
								<p>Get <span class="cr_month_subcription_discount_rt"></span>% off if you pay your membership fee with annual subscription</p>
								<p>Get <span class="cr_annual_discount_discount_rt"></span>% discount with annual payment.</p>

							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-12">
							<h4>Monthly Membership Free: <span class="badge badge-primary rounded">$<span class="cr_membership"></span></span></h4>
							<div class="table-responsive membershipinfodiv" hidden>
								<table class="table table-bordered table-sm font-size-sm table-light">								
									<tbody>
										<tr>
											<th scope="row">Membership Status</th>
											<td id="usr_membership_status"></td>										
										</tr>									
										<tr>
											<th scope="row">Current Membership Valid For</th>
											<td id="usr_membership_activate_type"></td>										
										</tr>									
										<tr>
											<th scope="row">Next Membership Renewal</th>
											<td id="usr_next_membership_renew_date"></td>										
										</tr>									
										<tr>
											<th scope="row">Last Membership Update On</th>
											<td id="usr_last_membership_renew_date"></td>										
										</tr>									
									</tbody>
								</table>
							</div>
							<div class="paymembershipbuttons mb-1">
								<button class="btn btn-primary" id="btn-pay1">Pay Per Month</button>
	<!--							<button class="btn btn-light" id="btn-pay2">Pay with Annual Subscription <span class="badge badge-primary badge-shadow">Get <span class="cr_month_subcription_discount_rt"></span>% off</span></button>-->
								<button class="btn btn-dark" id="btn-pay3">Pay Annual <span class="badge badge-primary badge-shadow">Get <span class="cr_annual_discount_discount_rt"></span>% off</span></button>
								<div id="paypal-button-container" class="mt-1 w-50"></div>

							</div>
						</div>
					</div>	
					<div class="row justify-content-left mt-5 text-left pt-3">
						<h3 class="font-size-lg font-weight-light text-center"><i class="fas fa-history"></i> Membership Update History</h3>
						<div class="table-responsive">
							<table id="tblMembershipHistory" class="table table-bordered font-size-sm" style="width:100%">
								<thead class="thead-dark">
									<tr>
										<th></th>
										<th>Year</th>
										<th>Date</th>
										<th>Transaction ID</th>
										<th>Paid Amount</th>
										<th>Status</th>
										<th>Payment Plan Type</th>                                      
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>							
		</main>     
		<?php
		include './includes/frontend-footer.php';
		include './includes/end-block-all.php';
		include './includes/comboboxJS.php';
		include './includes/commonJS.php';
		?>	
		<script>
			function membershipInfoByLoggedUser() {
				$.post('bkp/controllers/ubCreditController.php', {action: 'membershipInfoByLoggedUser'}, function (e) {
					if (e !== undefined || e.length !== 0 || e !== null) {
						$.each(e, function (index, qdt) {
							$('.cr_membership').html('').append(qdt.cr_membership);
							$('.cr_month_subcription_discount_rt').html('').append(qdt.cr_month_subcription_discount_rt);
							$('.cr_annual_discount_discount_rt').html('').append(qdt.cr_annual_discount_discount_rt);
							$('.cr_membership_renew_days').html('').append(qdt.cr_membership_renew_days);
						});

						$('#btn-pay1').click(function () {
							swal({
								title: "Dubboe Membership!",
								text: "Please wait for processing your request...",
								imageUrl: 'assets/img/gif/1.gif',
								showConfirmButton: false
							});
							$.post('bkp/controllers/paypalController.php', {action: 'creatMembershipPayPalOrder', tok_plan_type: 1}, function (e) {
								if (e === "#") {
									swal("Dubboe Membership!", "Sorry! Processing your membership failed,Try again later..", "warning");
								} else {
									window.location.href = e;
								}

							});
						});
						$('#btn-pay2').click(function () {
//							swal("Dubboe Membership!", "Subcription Process Under Contruction...", "warning");

							$.post('bkp/controllers/paypalController.php', {action: 'creatSubcriptionPayPalOrder', tok_plan_type: 2}, function (e) {
								console.log(e)
							});
						});
						$('#btn-pay3').click(function () {
							swal({
								title: "Dubboe Membership!",
								text: "Please wait for processing your request...",
								imageUrl: 'assets/img/gif/1.gif',
								showConfirmButton: false
							});
							$.post('bkp/controllers/paypalController.php', {action: 'creatMembershipPayPalOrder', tok_plan_type: 3}, function (e) {
								if (e === "#") {
									swal("Dubboe Membership!", "Sorry! Processing your membership failed,Try again later..", "warning");
								} else {
									window.location.href = e;
								}
							});
						});
					}
				}, "json");
			}


			function updateMembershipPayPalToken() {
				var PayerID = $('#PayerID').val();
				var token = $('#token').val();
				if (PayerID !== "0" && token !== "0") {
					swal({
						title: "Dubboe Membership!",
						text: "Please wait for processing your transaction...",
						imageUrl: 'assets/img/gif/1.gif',
						showConfirmButton: false
					});
					$.post('bkp/controllers/paypalController.php', {action: 'updateMembershipPayPalToken', token: token}, function (e) {
						if (parseInt(e.msgType) == 1) {
							swal({
								title: "Dubboe Membership!",
								text: e.msg,
								type: "success",
								showCancelButton: false,
								closeOnConfirm: true,
							}, function (isConfirm) {
								if (isConfirm) {
									window.location.href = 'membership.php';
								}
							});
						} else {
							swal("Dubboe Membership!", e.msg, "warning");
						}
					}, "json");
				}
			}


			function checkMembership() {
				$.post('bkp/controllers/paypalController.php', {action: 'checkMembership'}, function (e) {
					if (e !== undefined || e.length !== 0 || e !== null) {
						$.each(e, function (index, qdt) {
							if (parseInt(qdt.usr_membership_status) == 1) {
								$('.paymembershipbuttons').prop('hidden', true);
								$('.membershipinfodiv').prop('hidden', false);
								$('#usr_next_membership_renew_date').html('').append(qdt.usr_next_membership_renew_date);
								$('#usr_last_membership_renew_date').html('').append(qdt.usr_last_membership_renew_date);
								$('#usr_membership_status').html('').append("Active");
								if (parseInt(qdt.usr_membership_activate_type) == 1) {
									$('#usr_membership_activate_type').html('').append("A Month");
								} else {
									$('#usr_membership_activate_type').html('').append("A Year");
								}
							} else {
								$('.paymembershipbuttons').prop('hidden', false);
								$('.membershipinfodiv').prop('hidden', true);
							}
						});
					}
				}, "json");
			}


			function tblMembershipHistory(callback) {
				var tbldata = "";
				$.post('bkp/controllers/paypalController.php', {action: 'membershipHistory'}, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="7" class="text-center bg-info text-white"> History Info Not Available </td>';
						tbldata += '</tr>';
						$('#tblMembershipHistory tbody').html('').append(tbldata);
					} else {
						$.each(e, function (index, qdt) {
							index++;
							tbldata += '<tr>';
							tbldata += '<td></td>';
							tbldata += '<td>' + qdt.m_paid_year + '</td>';
							tbldata += '<td>' + qdt.m_paid_date + '</td>';
							tbldata += '<td>' + qdt.m_txn_id + '</td>';
							tbldata += '<td>' + qdt.m_paid_amount + '</td>';
							tbldata += '<td>' + qdt.m_paid_status + '</td>';
							if (parseInt(qdt.m_plan_type) == 1) {
								//1-paypermonth,2-paypermonth-subcription,3-payannualy
								tbldata += '<td> Per Month Renewal</td>';
							} else if (parseInt(qdt.m_plan_type) == 2) {
								tbldata += '<td> Per Month Subscription for annual</td>';
							} else if (parseInt(qdt.m_plan_type) == 3) {
								tbldata += '<td> Annual Payment</td>';
							}
							tbldata += '</tr>';
						});

						$('#tblMembershipHistory tbody').html('').append(tbldata);

						if ($.fn.DataTable.isDataTable('#tblMembershipHistory')) {
							//re initialize 
							$('#tblMembershipHistory').DataTable().destroy();
							$('#tblMembershipHistory tbody').empty();
							$('#tblMembershipHistory tbody').html('').append(tbldata);
							$('#tblMembershipHistory').DataTable({
								responsive: {
									details: {
										type: 'column',
										target: 'tr'
									}
								},
								columnDefs: [
									{className: 'control text-right', orderable: false, targets: 0},
									{orderable: false, targets: 0}
								]
							});
						} else {
							//initilized                    
							$('#tblMembershipHistory tbody').html('').append(tbldata);
							$('#tblMembershipHistory').DataTable({
								responsive: {
									details: {
										type: 'column',
										target: 'tr'
									}
								},
								columnDefs: [
									{className: 'control text-right', orderable: false, targets: 0},
									{orderable: false, targets: 0}
								]
							});
						}
						$('[data-toggle="tooltip"]').tooltip();
					}

					if (callback !== undefined) {
						if (typeof callback === 'function') {
							callback();
						}
					}
				}, "json");
			}


			$(document).ready(function () {
				updateMembershipPayPalToken();
				membershipInfoByLoggedUser();
				tblMembershipHistory();
				checkMembership();
				setInterval(function () {
					tblMembershipHistory();
					checkMembership();
				}, 5000);
			});
		</script>
		<script src="https://www.paypal.com/sdk/js?client-id=AaK8xknxVy-clqoB7H7QMObKygw4peNpHYGfBupEvL76CVS10aToVgmhePJ6wL4DJxXnY2e3nG3wZlea&vault=true" data-sdk-integration-source="button-factory"></script>
		<script>
			paypal.Buttons({
				style: {
					shape: 'pill',
					color: 'gold',
					layout: 'horizontal',
					label: 'subscribe'
				},
				createSubscription: function (data, actions) {
					return actions.subscription.create({
						'plan_id': 'P-7HU72772GN4019520L6DVAUQ'
					});
				},
				onApprove: function (data, actions) {
					alert(data.subscriptionID);
				}
			}).render('#paypal-button-container');
		</script>
	</body>
</html>