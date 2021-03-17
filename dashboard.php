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
					<div class="row justify-content-center dashboardwidget g-2">
						<h1 class="mb-4 py-2 text-capitalize text-center"><i class="fas fa-desktop"></i> My Dubboe</h1>
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="profile.php" class="text-decoration-none">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-user-circle fa-3x text-info text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="fas fa-user-circle fa-lg text-dark"></i> My Profile</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-user-circle fa-lg text-dark"></i> My Profile</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="membership.php" class="text-decoration-none">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-id-badge fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="fas fa-id-badge fa-lg text-dark"></i> Membership</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-id-badge fa-lg text-dark"></i> Membership</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="post-ad-start.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-ad fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="fas fa-lg text-dark fa-ad"></i> Post Ad</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-lg text-dark fa-ad"></i> Post Ad</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-ads.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="far fa-file-alt fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="far fa-file-alt fa-lg text-dark"></i> My Ads</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="far fa-file-alt fa-lg text-dark"></i> My Ads</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="order-history.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-history fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="fas fa-history fa-lg text-dark"></i> Orders History</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-history fa-lg text-dark"></i> Orders History</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="wishlist.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="far fa-heart fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="far fa-heart fa-lg text-dark"></i> Wishlist</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="far fa-heart fa-lg text-dark"></i> Wishlist</h5>
									</div>                           
								</div>
							</a>
						</div>						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-referral-members.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-sitemap fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="fas fa-sitemap fa-lg text-dark"></i> My Referral Members</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-sitemap fa-lg text-dark"></i> My Referral Members</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-grant-invitation.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-trophy fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="fas fa-trophy fa-lg text-dark"></i> My Grant Invitations</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-trophy fa-lg text-dark"></i> My Grant Invitations</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-event-invitation.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-gift fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="fas fa-gift fa-lg text-dark"></i> My Event Invitations</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-gift fa-lg text-dark"></i> My Event Invitations</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-messages.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-mail-bulk fa-3x text-info"></i></div>
									<div class="card-header bg-gradient-blue text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title text-white"><i class="fas fa-mail-bulk fa-lg text-dark"></i> My Messages</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-mail-bulk fa-lg text-dark"></i> My Messages <span class="badge badge-dark notify-msg">0</span></h5>
									</div>                           
								</div>
							</a>
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

			$(document).ready(function () {

				$('.dashboard-link').click(function (event) {
					event.preventDefault();
					var link = $(this).prop('href');
					checkMembershipIsActive(false, function () {
						window.location.href = link;
					});
				});
			});


        </script>
	</body>
</html>