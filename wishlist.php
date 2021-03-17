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
									<li class="breadcrumb-item"><a href="#">Wishlist</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="far fa-heart"></i> My Wishlist</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-12 text-center">						
							<button type="button" class="btn btn-translucent-info" data-toggle="collapse" data-target="#productservices" aria-expanded="false" aria-controls="productservices">
								Product/Services <span class="badge badge-pill badge-dark productservicesCount">0</span>
							</button>
							<button type="button" class="btn btn-translucent-info ml-1" data-toggle="collapse" data-target="#event" aria-expanded="false" aria-controls="event">
								Events <span class="badge badge-pill badge-dark eventCount">0</span>
							</button>
							<button type="button" class="btn btn-translucent-info ml-1" data-toggle="collapse" data-target="#eventItems" aria-expanded="false" aria-controls="eventItems">
								Event Items <span class="badge badge-pill badge-dark eventItemCount">0</span>
							</button>					
						</div>
					</div>
					<div class="row mt-3 text-center">
						<div class="col-xl-12 col-12">	
							<!-- Collapse -->
							<div class="collapse mt-2" id="productservices">
								<div class="card card-body border box-shadow border-0 productservicesDiv">
									<h4>You have <span class="productservicesCount">no</span> products/services wishlist available at the moment.</h4>								
									<div class="table-responsive font-size-sm">
										<table id="tblProductservices" class="table table-light table-bordered" style="width:100%">
											<thead>
												<tr>
													<th>#</th>                                
													<th>Wishlist Item</th>                            
													<th>Created Date</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="collapse mt-2" id="event">
								<div class="card card-body border box-shadow border-0 eventDiv">
									<h4>You have <span class="eventCount">no</span> event wishlist available at the moment.</h4>
									<div class="table-responsive font-size-sm">
										<table id="tblEvent" class="table table-light table-bordered" style="width:100%">
											<thead>
												<tr>
													<th>#</th>                                
													<th>Wishlist Item</th>                            
													<th>Created Date</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="collapse mt-2" id="eventItems">
								<div class="card card-body border box-shadow border-0 eventItemsDiv">
									<h4>You have <span class="eventItemCount">no</span> event items wishlist available at the moment.</h4>
									<div class="table-responsive font-size-sm">
										<table id="tblEventItem" class="table table-light table-bordered" style="width:100%">
											<thead>
												<tr>
													<th>#</th>                                
													<th>Wishlist Item</th>                            
													<th>Created Date</th>
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
			function allWishlistByLoggedUser() {
				$('#tblProductservices').prop('hidden', false);
				$('#tblEvent').prop('hidden', false);
				$('#tblEventItem').prop('hidden', false);
				$('.eventItemCount').html('').append(0);
				$('.eventCount').html('').append(0);
				$('.productservicesCount').html('').append(0);
				var productservicesCount = 0;
				var eventCount = 0;
				var eventItemCount = 0;
				var tblProductservices = "";
				var tblEvent = "";
				var tblEventItem = "";
				var tbldata = "";
				$.post('bkp/controllers/ubWishlistController.php', {action: 'tblWishlistByLoggedUser'}, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="3" class="bg-dark text-center text-warning"> -- Wishlist Not Available -- </td>';
						tbldata += '</tr>';
						$('#tblProductservices tbody').html('').append(tbldata);
						$('#tblEvent tbody').html('').append(tbldata);
						$('#tblEventItem tbody').html('').append(tbldata);
					} else {
						$.each(e, function (index, qdt) {
							index++;
							if (parseInt(qdt.wish_type) == 1) {
								//productservice
								productservicesCount++;
								tblProductservices += '<tr>';
								tblProductservices += '<td>';
								tblProductservices += '<div class="btn-group btn-group-sm">';
								tblProductservices += '<button class="btn btn-info btn_view" value="AD-' + qdt.wish_type + '-' + qdt.wish_object + '" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button>';
								tblProductservices += '<button class="btn btn btn-translucent-dark btn_delete" value="' + qdt.wish_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
								tblProductservices += '</div>';
								tblProductservices += '</td>';
								tblProductservices += '<td>' + qdt.object_name + '</td>';
								tblProductservices += '<td>' + qdt.wish_created_date + '</td>';
								tblProductservices += '</tr>';

							}
							if (parseInt(qdt.wish_type) == 2) {
								//event
								eventCount++;
								tblEvent += '<tr>';
								tblEvent += '<td>';
								tblEvent += '<div class="btn-group btn-group-sm">';
								tblEvent += '<button class="btn btn-info btn_view" value="EVT-' + qdt.wish_type + '-' + qdt.wish_object + '" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button>';
								tblEvent += '<button class="btn btn btn-translucent-dark btn_delete" value="' + qdt.wish_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
								tblEvent += '</div>';
								tblEvent += '</td>';
								tblEvent += '<td>' + qdt.object_name + '</td>';
								tblEvent += '<td>' + qdt.wish_created_date + '</td>';
								tblEvent += '</tr>';
							}
							if (parseInt(qdt.wish_type) == 3) {
								//eventitem
								eventItemCount++;
								tblEventItem += '<tr>';
								tblEventItem += '<td>';
								tblEventItem += '<div class="btn-group btn-group-sm">';
								tblEventItem += '<button class="btn btn-info btn_view" value="EVTITM-' + qdt.wish_type + '-' + qdt.wish_object + '" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button>';
								tblEventItem += '<button class="btn btn btn-translucent-dark btn_delete" value="' + qdt.wish_id + '" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>';
								tblEventItem += '</div>';
								tblEventItem += '</td>';
								tblEventItem += '<td>' + qdt.object_name + '</td>';
								tblEventItem += '<td>' + qdt.wish_created_date + '</td>';
								tblEventItem += '</tr>';
							}

						});
						$('#tblProductservices tbody').html('').append(tblProductservices);
						$('#tblEvent tbody').html('').append(tblEvent);
						$('#tblEventItem tbody').html('').append(tblEventItem);

						if (parseInt(productservicesCount) == 0) {
							$('#tblProductservices').prop('hidden', true);
							tblProductservices += '<tr>';
							tblProductservices += '<td colspan="3" class="bg-dark text-center text-warning"> -- Product/Services Wishlist Not Available -- </td>';
							tblProductservices += '</tr>';
							$('#tblProductservices tbody').html('').append(tblProductservices);
						} else {
							$('.productservicesCount').html('').append(productservicesCount);
						}
						if (parseInt(eventCount) == 0) {
							$('#tblEvent').prop('hidden', true);
							tblEvent += '<tr>';
							tblEvent += '<td colspan="3" class="bg-dark text-center text-warning"> -- Event Wishlist Not Available -- </td>';
							tblEvent += '</tr>';
							$('#tblEvent tbody').html('').append(tblEvent);
						} else {
							$('.eventCount').html('').append(eventCount);
						}
						if (parseInt(eventItemCount) == 0) {
							$('#tblEventItem').prop('hidden', true);
							tblEventItem += '<tr>';
							tblEventItem += '<td colspan="3" class="bg-dark text-center text-warning"> -- Event Items Wishlist Not Available -- </td>';
							tblEventItem += '</tr>';
							$('#tblEventItem tbody').html('').append(tblEventItem);
						} else {
							$('.eventItemCount').html('').append(eventItemCount);
						}


						$('.btn_view').click(function () {
							var id_str = $(this).val();
							var id_arr = id_str.split('-');
							if (parseInt(id_arr[1]) == 1) {
								window.location.href = 'ad-info.php?ad_id=' + id_arr[2];
							} else if (parseInt(id_arr[1]) == 2) {
								window.location.href = 'event-info.php?evt_id=' + id_arr[2];
							} else if (parseInt(id_arr[1]) == 3) {
								window.location.href = 'event-item.php?id=' + id_arr[2];
							}

						});

						$('.btn_delete').click(function () {
							var wish_id = $(this).val();
							swal({
								title: "Are you sure?",
								text: "Do you want to delete you added wishlist item ?",
								type: "warning",
								showCancelButton: true,
								cancelButtonClass: "btn-light",
								closeOnConfirm: true
							}, function () {
								$.post('bkp/controllers/ubWishlistController.php', {action: 'deleteWishlist', wish_id: wish_id}, function (e) {
									allWishlistByLoggedUser();
									Swal.fire({
										position: 'top-left',
										html: e.msg,
										showConfirmButton: false,
										showCancelButton: false,
										timer: 1500,
									});
								}, "json");
							});
						});
					}
				}, "json");
			}


			$(document).ready(function () {
				checkMembershipIsActive(1);
				allWishlistByLoggedUser();
			});
		</script>
	</body>
</html>