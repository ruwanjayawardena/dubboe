<?php include './access_control/auth.php'; ?>   
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">
					<div class="row justify-content-center dashboardwidget  g-2">
						<h1 class="mb-4 py-2 text-capitalize text-center"><i class="fas fa-desktop"></i> My Dubboe</h1>
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="profile-executive.php" class="text-decoration-none">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-user-circle fa-3x text-info"></i></div>
									<div class="card-header text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title"><i class="fas fa-user-circle fa-lg text-dark"></i> My Profile</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-user-circle fa-lg text-dark"></i> My Profile</h5>
									</div>                           
								</div>
							</a>
						</div>

						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="events-accex.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-calendar-day fa-3x text-info"></i></div>
									<div class="card-header text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title"><i class="fas fa-calendar-day fa-lg text-dark"></i> Events</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-calendar-day fa-lg text-dark"></i> Events</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-messages-accex.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-mail-bulk fa-3x text-info"></i></div>
									<div class="card-header text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title"><i class="fas fa-mail-bulk fa-lg text-dark"></i> Messages</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-mail-bulk fa-lg text-dark"></i> Messages <span class="badge badge-dark notify-msg">0</span></h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-referral-members-accex.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-sitemap fa-3x text-info"></i></div>
									<div class="card-header text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title"><i class="fas fa-sitemap fa-lg text-dark"></i> My Referral Members</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-sitemap fa-lg text-dark"></i> My Referral Members</h5>
									</div>                           
								</div>
							</a>
						</div>	
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-selling-event-items.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-box-open fa-3x text-info"></i></div>
									<div class="card-header text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title"><i class="fas fa-box-open fa-lg text-dark"></i> My Selling Event Items</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-box-open fa-lg text-dark"></i> My Selling Event Items</h5>
									</div>                           
								</div>
							</a>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12 hvr-grow px-2 mt-3">
							<a href="my-blog.php" class="text-decoration-none dashboard-link">
								<div class="card text-white bg-light box-shadow-sm">
									<div class="card-header text-center d-none d-sm-block"><i class="fas fa-blog fa-lg fa-3x text-info"></i></div>
									<div class="card-header text-center d-block d-sm-none py-1 pt-3 align-middle bg-darkgray"><h5 class="card-title"><i class="fas fa-blog fa-lg text-dark"></i> My Blog</h5></div>
									<div class="card-body text-center d-none d-sm-block mobile-card-body">
										<h5 class="card-title"><i class="fas fa-blog fa-lg text-dark"></i> My Blog</h5>
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
	</body>
</html>