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
									<li class="breadcrumb-item"><a href="#">My Ads</a>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="far fa-file-alt"></i> My Ads</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-12 col-12 text-center">						
							<button type="button" class="btn btn-translucent-info" data-toggle="collapse" data-target="#active" aria-expanded="false" aria-controls="active">
								Active <span class="badge badge-pill badge-dark activeadcount">0</span>
							</button>
							<button type="button" class="btn btn-translucent-info ml-1" data-toggle="collapse" data-target="#inactive" aria-expanded="false" aria-controls="inactive">
								Inactive <span class="badge badge-pill badge-dark inactiveadcount">0</span>
							</button>
							<button type="button" class="btn btn-translucent-info ml-1" data-toggle="collapse" data-target="#pending" aria-expanded="false" aria-controls="pending">
								Pending <span class="badge badge-pill badge-dark pendingadcount">0</span>
							</button>
							<button type="button" class="btn btn-translucent-info ml-1" data-toggle="collapse" data-target="#rejected" aria-expanded="false" aria-controls="rejected">
								Rejected <span class="badge badge-pill badge-dark rejectedadcount">0</span>
							</button>
						</div>
					</div>
					<div class="row mt-3 justify-content-center text-center">
						<div class="col-xl-12 col-12">	
							<!-- Collapse -->
							<div class="collapse mt-2" id="active">
								<div class="card card-body border box-shadow border-0 activeAds">
									<h2>You have <span class="activeadcount">no</span> active ads at the moment.</h2>
									<p>Why not <a href="post-ad-start.php">post an ad</a> now?</p>
									<div class="table-responsive">
										<table id="tblAdActive" class="table table-light table-bordered table-bordered table-hover" style="width:100%">
											<thead>
												<tr>
													<th></th>
													<th>ID</th>                                  
													<th>Category</th>                            
													<th>Location</th>
													<th>Ad</th>
													<th>Posted Date</th>										
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="collapse mt-2" id="inactive">
								<div class="card card-body border box-shadow border-0 inactiveAds">
									<h2>You have <span class="inactiveadcount">no</span> inactive ads.</h2>
									<p>This is where you'd see any of your ads that aren't visible to buyers, such as recently expired ads.</p>
									<div class="table-responsive">
										<table id="tblAdInactive" class="table table-light table-bordered table-hover" style="width:100%">
											<thead>
												<tr>
													<th></th>                                
													<th>ID</th>                               
													<th>Category</th>                            
													<th>Location</th>
													<th>Ad</th>
													<th>Posted Date</th>										
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="collapse mt-2" id="pending">
								<div class="card card-body border box-shadow border-0 pendingAds">
									<h2>You have <span class="pendingadcount">no</span> pending ads.</h2>
									<p>This is where you'd see any of your ads that are under review by our support team.</p>
									<div class="table-responsive">
										<table id="tblAdPending" class="table table-light table-bordered table-hover" style="width:100%">
											<thead>
												<tr>
													<th></th>                               
													<th>ID</th>                                
													<th>Category</th>                            
													<th>Location</th>
													<th>Ad</th>
													<th>Posted Date</th>										
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="collapse mt-2" id="rejected">
								<div class="card card-body border box-shadow border-0 rejectedAds">
									<h2>You have <span class="rejectedadcount">no</span> rejected ads by administrator.</h2>
									<p>This is where you'd see any of your ads that are rejected by our support team due to our terms and condition.</p>
									<div class="table-responsive">
										<table id="tblAdRejected" class="table table-light table-bordered table-hover" style="width:100%">
											<thead>
												<tr>
													<th></th>                               
													<th>ID</th>                                 
													<th>Category</th>                            
													<th>Location</th>
													<th>Ad</th>
													<th>Posted Date</th>										
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
			function allAdvByLoggedUser() {
				$('#tblAdActive').prop('hidden', false);
				$('#tblAdInactive').prop('hidden', false);
				$('#tblAdPending').prop('hidden', false);
				$('#tblAdRejected').prop('hidden', false);
				$('.activeadcount').html('').append(0);
				$('.inactiveadcount').html('').append(0);
				$('.pendingadcount').html('').append(0);
				$('.rejectedadcount').html('').append(0);
				var active_count = 0;
				var inactive_count = 0;
				var pending_count = 0;
				var rejected_count = 0;
				var tbldata_active = "";
				var tbldata_pending = "";
				var tbldata_inactive = "";
				var tbldata_rejected = "";
				var tbldata = "";
				$.post('bkp/controllers/advController.php', {action: 'allAdvByLoggedUser'}, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="6" class="bg-dark text-center text-warning"> -- Ads Not Available -- </td>';
						tbldata += '</tr>';
						$('#tblAdActive tbody').html('').append(tbldata);
						$('#tblAdInactive tbody').html('').append(tbldata);
						$('#tblAdPending tbody').html('').append(tbldata);
						$('#tblAdRejected tbody').html('').append(tbldata);
					} else {
						$.each(e, function (index, qdt) {
							index++;
							if (parseInt(qdt.ad_status) == 1) {
								//active
								active_count++;
								tbldata_active += '<tr>';
								tbldata_active += '<td>';
								tbldata_active += '<div class="btn-group btn-group-sm">';
								tbldata_active += '<button class="btn btn-light btn_view" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Preview Ad"><i class="fas fa-eye"></i></button>';
								tbldata_active += '<button class="btn btn-warning btn_edit" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>';
								tbldata_active += '<button class="btn btn-danger btn_delete" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
								tbldata_active += '<button class="btn btn-primary btn_inactive" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Make Inactive"><i class="fas fa-pause-circle"></i></button>';
								tbldata_active += '</div>';
								tbldata_active += '</td>';
								tbldata_active += '<td>' + qdt.ad_id + '</td>';
								tbldata_active += '<td>' + qdt.ad_maincategory_name + '/ ' + qdt.ad_subcategory_name + '</td>';
								tbldata_active += '<td>' + qdt.ad_state_name + '/ ' + qdt.ad_city_name + '</td>';
								tbldata_active += '<td>' + qdt.ad_title + '</td>';
								tbldata_active += '<td>' + qdt.ad_date_updated + '</td>';
								tbldata_active += '</tr>';

							}
							if (parseInt(qdt.ad_status) == 2) {
								//pending
								pending_count++;
								tbldata_pending += '<tr>';
								tbldata_pending += '<td>';
								tbldata_pending += '<div class="btn-group btn-group-sm">';
								tbldata_pending += '<button class="btn btn-light btn_view" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Preview Ad"><i class="fas fa-eye"></i></button>';
								tbldata_pending += '<button class="btn btn-danger btn_delete" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
								tbldata_pending += '</div>';
								tbldata_pending += '</td>';
								tbldata_pending += '<td>' + qdt.ad_id + '</td>';
								tbldata_pending += '<td>' + qdt.ad_maincategory_name + '/ ' + qdt.ad_subcategory_name + '</td>';
								tbldata_pending += '<td>' + qdt.ad_state_name + '/ ' + qdt.ad_city_name + '</td>';
								tbldata_pending += '<td>' + qdt.ad_title + '</td>';
								tbldata_pending += '<td>' + qdt.ad_date_updated + '</td>';
								tbldata_pending += '</tr>';
							}
							if (parseInt(qdt.ad_status) == 0) {
								//inactive
								inactive_count++;
								tbldata_inactive += '<tr>';
								tbldata_inactive += '<td>';
								tbldata_inactive += '<div class="btn-group btn-group-sm">';
								tbldata_inactive += '<button class="btn btn-light btn_view" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Preview Ad"><i class="fas fa-eye"></i></button>';
								tbldata_inactive += '<button class="btn btn-warning btn_edit" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>';
								tbldata_inactive += '<button class="btn btn-danger btn_delete" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
								tbldata_inactive += '<button class="btn btn-primary btn_active" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Make Active"><i class="fas fa-play-circle"></i></button>';
								tbldata_inactive += '</div>';
								tbldata_inactive += '</td>';
								tbldata_inactive += '<td>' + qdt.ad_id + '</td>';
								tbldata_inactive += '<td>' + qdt.ad_maincategory_name + '/ ' + qdt.ad_subcategory_name + '</td>';
								tbldata_inactive += '<td>' + qdt.ad_state_name + '/ ' + qdt.ad_city_name + '</td>';
								tbldata_inactive += '<td>' + qdt.ad_title + '</td>';
								tbldata_inactive += '<td>' + qdt.ad_date_updated + '</td>';
								tbldata_inactive += '</tr>';
							}
							if (parseInt(qdt.ad_status) == 3) {
								//rejected
								rejected_count++;
								tbldata_rejected += '<tr>';
								tbldata_rejected += '<td>';
								tbldata_rejected += '<div class="btn-group btn-group-sm">';
								tbldata_rejected += '<button class="btn btn-light btn_view" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Preview Ad"><i class="fas fa-eye"></i></button>';
								tbldata_rejected += '<button class="btn btn-warning btn_edit" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>';
								tbldata_rejected += '<button class="btn btn-danger btn_delete" value="' + qdt.ad_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
								tbldata_rejected += '</div>';
								tbldata_rejected += '</td>';
								tbldata_rejected += '<td>' + qdt.ad_id + '</td>';
								tbldata_rejected += '<td>' + qdt.ad_maincategory_name + '/ ' + qdt.ad_subcategory_name + '</td>';
								tbldata_rejected += '<td>' + qdt.ad_state_name + '/ ' + qdt.ad_city_name + '</td>';
								tbldata_rejected += '<td>' + qdt.ad_title + '</td>';
								tbldata_rejected += '<td>' + qdt.ad_date_updated + '</td>';
								tbldata_rejected += '</tr>';
							}
						});
						$('#tblAdActive tbody').html('').append(tbldata_active);
						$('#tblAdInactive tbody').html('').append(tbldata_inactive);
						$('#tblAdPending tbody').html('').append(tbldata_pending);
						$('#tblAdRejected tbody').html('').append(tbldata_rejected);

						if (parseInt(active_count) == 0) {
							$('#tblAdActive').prop('hidden', true);
							tbldata_active += '<tr>';
							tbldata_active += '<td colspan="5" class="bg-dark text-center text-warning"> -- Ads Not Available -- </td>';
							tbldata_active += '</tr>';
							$('#tblAdActive tbody').html('').append(tbldata_active);
						} else {
							$('.activeadcount').html('').append(active_count);
						}
						if (parseInt(inactive_count) == 0) {
							$('#tblAdInactive').prop('hidden', true);
							tbldata_inactive += '<tr>';
							tbldata_inactive += '<td colspan="5" class="bg-dark text-center text-warning"> -- Ads Not Available -- </td>';
							tbldata_inactive += '</tr>';
							$('#tblAdInactive tbody').html('').append(tbldata_inactive);
						} else {
							$('.inactiveadcount').html('').append(inactive_count);
						}
						if (parseInt(pending_count) == 0) {
							$('#tblAdPending').prop('hidden', true);
							tbldata_pending += '<tr>';
							tbldata_pending += '<td colspan="5" class="bg-dark text-center text-warning"> -- Ads Not Available -- </td>';
							tbldata_pending += '</tr>';
							$('#tblAdPending tbody').html('').append(tbldata_pending);
						} else {
							$('.pendingadcount').html('').append(pending_count);
						}
						if (parseInt(rejected_count) == 0) {
							$('#tblAdRejected').prop('hidden', true);
							tbldata_rejected += '<tr>';
							tbldata_rejected += '<td colspan="5" class="bg-dark text-center text-warning"> -- Ads Not Available -- </td>';
							tbldata_rejected += '</tr>';
							$('#tblAdRejected tbody').html('').append(tbldata_rejected);
						} else {
							$('.rejectedadcount').html('').append(rejected_count);
						}


						$('[data-toggle="tooltip"]').tooltip();


						//table functions
						$('.btn_edit').click(function () {
							var ad_id = $(this).val();
							swal({
								title: "Are you sure?",
								text: "Do you want to update this Ad content ?",
								type: "warning",
								showCancelButton: true,
								confirmButtonClass: "btn-warning",
								cancelButtonClass: "btn-light",
								confirmButtonText: "Yes,I Need!",
								closeOnConfirm: false
							}, function () {
								window.location.href = 'post-ad-mid-update.php?ad_id=' + ad_id;
							});
						});

						$('.btn_view').click(function () {
							var ad_id = $(this).val();
							window.location.href = 'ad-info.php?ad_id=' + ad_id;

						});

						$('.btn_delete').click(function () {
							var ad_id = $(this).val();
							swal({
								title: "Are you sure?",
								text: "Do you want to delete this Ad ?",
								type: "warning",
								showCancelButton: true,
								confirmButtonClass: "btn-danger",
								cancelButtonClass: "btn-light",
								confirmButtonText: "Yes, delete it!",
								closeOnConfirm: false
							}, function () {
								$.post('bkp/controllers/advController.php', {action: 'deleteAdv', ad_id: ad_id}, function (e) {
									if (parseInt(e.msgType) == 1) {
										swal("Ad Delete!", e.msg, "success");
										allAdvByLoggedUser();
									} else {
										swal("Ad Delete!", e.msg, "error");
									}
								}, "json");
							});
						});

						$('.btn_inactive').click(function () {
							var ad_id = $(this).val();
							swal({
								title: "Are you sure?",
								text: "Do you want to hold this ad display?",
								type: "warning",
								showCancelButton: true,
								confirmButtonClass: "btn-danger",
								cancelButtonClass: "btn-light",
								confirmButtonText: "Yes, Hold!",
								closeOnConfirm: false
							}, function () {
								$.post('bkp/controllers/advController.php', {action: 'holdAdv', ad_id: ad_id}, function (e) {
									if (parseInt(e.msgType) == 1) {
										swal("Ad Hold!", e.msg, "success");
										allAdvByLoggedUser();
									} else {
										swal("Ad Hold!", e.msg, "error");
									}
								}, "json");
							});
						});

						$('.btn_active').click(function () {
							var ad_id = $(this).val();
							swal({
								title: "Are you sure?",
								text: "Do you want to active this ad for display?",
								type: "warning",
								showCancelButton: true,
								confirmButtonClass: "btn-success",
								cancelButtonClass: "btn-light",
								confirmButtonText: "Yes, Active!",
								closeOnConfirm: false
							}, function () {
								$.post('bkp/controllers/advController.php', {action: 'activeAdv', ad_id: ad_id}, function (e) {
									if (parseInt(e.msgType) == 1) {
										swal("Ad Activate!", e.msg, "success");
										allAdvByLoggedUser();
									} else {
										swal("Ad Activate!", e.msg, "error");
									}
								}, "json");
							});
						});

					}
				}, "json");
			}


			$(document).ready(function () {
				checkMembershipIsActive(1);
				allAdvByLoggedUser();
			});
        </script>		
	</body>
</html>