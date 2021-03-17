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
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">My Referral Members</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-sitemap"></i> My Referral Members</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-12">
							<span class="badge badge-dark px-3 py-2 font-size-lg">Total Credits: <span id="total_credits">0</span></span>
							<span class="badge badge-primary px-3 py-2 font-size-lg">Total Received Credits: <span id="total_received">0</span></span>
							<span class="badge badge-primary px-3 py-2 font-size-lg">Total Pending Credits: <span id="total_pending">0</span></span>
							<div class="table-responsive font-size-sm  mt-3">
								<table id="tblReferenceUsersByUser"  class="table table-bordered" style="width:100%">
									<thead class="thead-light">
										<tr>                                                        
											<th></th>                           
											<th></th>                           
											<th>Member</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Credit Received</th>
											<th>Status</th>        
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
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
			function tblReferenceUsersByUser(callback) {
				var total_credits = 0;
				var total_received = 0;
				var total_pending = 0;
				var tbldata = "";
				$.post('bkp/controllers/userController.php', {action: 'tblReferenceUsersByUser'}, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="7" class="bg-danger text-white text-center">Referral members not available</td>';
						tbldata += '</tr>';
						$('#tblReferenceUsersByUser tbody').html('').append(tbldata);
					} else {
						$.each(e, function (index, qdt) {
							total_credits += parseFloat(qdt.rec_points);
							tbldata += '<tr>';
							tbldata += '<td><button class="btn btn-dark btn-sm btn_view" value="' + qdt.rec_relate_ref_user + '"><i class="fas fa-eye"></i> Profile</button></td>';
							tbldata += '<td></td>';
							tbldata += '<td><strong>' + qdt.usr_first_name + ' ' + qdt.usr_last_name + '</strong><br><h4 class="badge badge-primary text-white"></h4></td>';
							tbldata += '<td>' + qdt.usr_email + '</td>';
							tbldata += '<td>' + qdt.usr_phone + '</td>';
							tbldata += '<td>$' + qdt.rec_points + '</td>';
//							tbldata += '<td>' + qdt.alvl_name + '</td>';
							if (parseInt(qdt.rec_payout_status) == 0) {
								total_pending += parseFloat(qdt.rec_points);
								tbldata += '<td><span class="badge badge-info font-size-md p-2">Pending</span></td>';
							} else if (parseInt(qdt.rec_payout_status) == 1) {
								total_pending += parseFloat(qdt.rec_points);
								tbldata += '<td><span class="badge badge-primary font-size-md p-2">Processing</span></td>';
							} else if (parseInt(qdt.rec_payout_status) == 2) {
								total_received += parseFloat(qdt.rec_points);
								tbldata += '<td><span class="badge badge-success font-size-md p-2">Received</span></td>';
							}
							tbldata += '</tr>';
						});

						$('#total_received').html('').append('$' + total_received.toFixed(2) + ' USD');
						$('#total_pending').html('').append('$' + total_pending.toFixed(2) + ' USD');
						$('#total_credits').html('').append('$' + total_credits.toFixed(2) + ' USD');

						if ($.fn.DataTable.isDataTable('#tblReferenceUsersByUser')) {
							//re initialize 
							$('#tblReferenceUsersByUser').DataTable().destroy();
							$('#tblReferenceUsersByUser tbody').empty();
							$('#tblReferenceUsersByUser tbody').html('').append(tbldata);
							$('#tblReferenceUsersByUser').DataTable({
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
							$('#tblReferenceUsersByUser tbody').html('').append(tbldata);
							$('#tblReferenceUsersByUser').DataTable({
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

						$('#tblReferenceUsersByUser').on('draw.dt', function () {
							$('.btn_view').click(function () {
								var usr_id = $(this).val();
								window.location.href = 'public-profile.php?usr_id=' + usr_id;

							});
						});


						$('.btn_view').click(function () {
							var usr_id = $(this).val();
							window.location.href = 'public-profile.php?usr_id=' + usr_id;

						});


					}
				}, "json");
			}
			$(document).ready(function () {
				tblReferenceUsersByUser();
			});
        </script>
	</body>
</html>