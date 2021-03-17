<?php include './access_control/auth.php'; ?> 
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<style>
			.img-thumbnail{
				width:80px!important;
				height: auto!important;
			}
		</style>
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
									<li class="breadcrumb-item"><a href="#">My Messages</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-mail-bulk"></i> My Messages</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-12">
							<div class="table-responsive font-size-sm">
								<table id="tblMessages"  class="table table-bordered">
									<thead class="thead-light">
										<tr>                                                        
											<th></th>                           
											<th></th>                           
											<th>#</th>                          
											<th>Messages With</th>
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
			function getMessageGroupByLoggedUser(callback) {
				var tbldata = "";
				$.post('bkp/controllers/messageController.php', {action: 'getMessageGroupByLoggedUser'}, function (e) {
					if (e === undefined || e.length === 0 || e === null) {
						tbldata += '<tr>';
						tbldata += '<td colspan="5" class="bg-danger text-white text-center">Messages not available</td>';
						tbldata += '</tr>';
						$('#tblMessages tbody').html('').append(tbldata);
					} else {
						//0-invited,1-userapplied,2-approve,3-reject,4-win
						$.each(e, function (index, qdt) {
							tbldata += '<tr>';
							tbldata += '<td><button class="btn btn-primary btn-sm btn_viewMsg" value="' + qdt.you_messaged_with_id + '"><i class="fas fa-eye"></i> View</button></td>';
							tbldata += '<td></td>';
							tbldata += '<td>';
							if (qdt.msg_with_img === "#") {

								tbldata += '<img src="assets/img/noimage.png" class="img-thumbnail">';
							} else {
								tbldata += '<img src="asset_imageuploader/userprofileimages/' + qdt.you_messaged_with_id + '/' + qdt.msg_with_img + '" class="img-thumbnail">';
							}
							tbldata += '</td>';
							tbldata += '<td>' + qdt.you_messaged_with + '</td>';
							tbldata += '</tr>';
						});

						if ($.fn.DataTable.isDataTable('#tblMessages')) {
							//re initialize 
							$('#tblMessages').DataTable().destroy();
							$('#tblMessages tbody').empty();
							$('#tblMessages tbody').html('').append(tbldata);
							$('#tblMessages').DataTable({
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
							$('#tblMessages tbody').html('').append(tbldata);
							$('#tblMessages').DataTable({
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

							$('#tblMessages').on('draw.dt', function () {
								$('.btn_viewMsg').click(function () {
									var msg_receiver = $(this).val();
									window.location.href = 'view-message-accex.php?msgof=' + msg_receiver;
								});
							});
						}

						$('.btn_viewMsg').click(function () {
							var msg_receiver = $(this).val();
							window.location.href = 'view-message-accex.php?msgof=' + msg_receiver;
						});
					}
				}, "json");
			}

			$(document).ready(function () {
				getMessageGroupByLoggedUser();
				setInterval(function () {
					getMessageGroupByLoggedUser();
				}, 5000);

			});
        </script>		
	</body>
</html>