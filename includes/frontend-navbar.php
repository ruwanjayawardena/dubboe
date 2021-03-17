<header class="sticky-top">	
	<!-- Topbar -->
	<div class="topbar topbar-light bg-light">
		<div class="container px-0 px-sm-0">
			<div class="row pt-1">
				<div class="col-xl-4 col-md-5 col-5">
					<button class="btn btn-link btn-sm topbar-link" onclick="window.location.href = 'contact.php'"><i class="fas fa-headset"></i> Support</button>
				</div>
				<div class="col-xl-8 col-md-7 col-7 text-right">
					<?php if (isset($_SESSION['usr_cat_id']) && $_SESSION['usr_cat_id'] == 3) { ?>
						<button class="btn btn-link btn-sm topbar-link d-none d-sm-inline-block" onclick="window.location.href = 'wishlist.php'"><i class="far fa-heart"></i> My Wishlist</button>
					<?php } else if (isset($_SESSION['usr_cat_id']) && $_SESSION['usr_cat_id'] == 4) { ?>
						<button class="btn btn-link btn-sm topbar-link d-none d-sm-inline-block"><i class="far fa-heart"></i> My Wishlist</button>
					<?php } ?>					
					<button class="btn btn-default btn-sm topbar-link pl-1 pr-1" data-toggle="offcanvas" data-offcanvas-id="shoppingCart" data-target="#shoppingCart"><i class="fas fa-shopping-cart fa-inverse"></i> <span class="badge badge-dark navbar-tool-badge primaryCartItmCount">0</span></button>
					<button class="btn btn-default btn-sm topbar-link" onclick="window.location.href = 'my-messages.php'"><i class="fas fa-envelope-open fa-inverse"></i> <span class="badge badge-dark navbar-tool-badge notify-msg">0</span></button>		
				</div>
			</div>
		</div>
	</div>
	<!-- main nav bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-light">
		<div class="container px-0 px-xl-3">
			<a class="navbar-brand order-lg-1 mr-0 pr-lg-2 mr-lg-4" href="index.php">
				<span class="logoDisplyModule"></span>
			</a>
			<div class="d-flex align-items-center order-lg-3">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse1">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php if (!isset($_SESSION['usr_id']) || empty($_SESSION['usr_id'])) { ?>
					<a class="nav-link-style font-size-sm text-nowrap" href="login.php"><i class="fas fa-user font-size-xl mr-2"></i>Sign in</a>
					<a class="btn btn-translucent-dark ml-grid-gutter navbar-btn" href="signup.php">Sign up</a>
				<?php } else { ?>
					<span class="d-block d-sm-none">
						<button class="btn btn-sm btn-default navbar-btn" onclick="navigateDashboard();"><i class="fas fa-desktop text-info"></i></button>
						<button class="btn btn-sm btn-default navbar-btn logout"><i class="fas fa-power-off text-danger"></i></button>
					</span>
					<?php if ($_SESSION['usr_cat_id'] == 3) { ?>
						<a class="btn btn-info btn-sm navbar-btn mr-2" href="post-ad-start.php">Post ad</a>
					<?php } ?>
					<div class="navbar-tool dropdown">
						<a class="navbar-tool-icon-box" href="#">
							<img class="navbar-tool-icon-box-img usr-profile-avatar" src="assets/img/main-sm.jpg" alt="Avatar"/>
						</a>						
						<a class="navbar-tool-label dropdown-toggle" href="#"><small>Hello,</small><?php echo $_SESSION['usr_first_name']; ?></a>
						<?php if (isset($_SESSION['usr_cat_id']) && $_SESSION['usr_cat_id'] == 3) { ?>
							<ul class="dropdown-menu dropdown-menu-right" style="width: 15rem;">
								<li>
									<a class="dropdown-item d-flex align-items-center" href="#" onclick="navigateDashboard();">										
										<i class="fas fa-desktop font-size-base opacity-60 mr-2"></i>
										Dashboard									
									</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="profile.php">
										<i class="fas fa-user-circle font-size-base opacity-60 mr-2"></i>
										Profile									
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="membership.php">
										<i class="fas fa-id-badge font-size-base opacity-60 mr-2"></i>
										Membership									
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="my-ads.php">
										<i class="far fa-file-alt  font-size-base opacity-60 mr-2"></i> 
										My Ads								
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="order-history.php">
										<i class="fas fa-history font-size-base opacity-60 mr-2"></i> 
										Orders History							
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="wishlist.php">
										<i class="far fa-heart font-size-base opacity-60 mr-2"></i> 
										Wishlist						
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="my-referral-members.php">
										<i class="fas fa-sitemap font-size-base opacity-60 mr-2"></i> 
										My Referral Members						
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="my-grant-invitation.php">
										<i class="fas fa-trophy font-size-base opacity-60 mr-2"></i> 
										My Grant Invitations					
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="my-event-invitation.php">
										<i class="fas fa-gift font-size-base opacity-60 mr-2"></i> 
										My Event Invitations					
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="my-messages.php">
										<i class="fas fa-mail-bulk font-size-base opacity-60 mr-2"></i>
										Messages
										<span class="nav-indicator"></span>
										<span class="ml-auto font-size-xs text-muted notify-msg">0</span>
									</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a class="dropdown-item d-flex align-items-center logout" href="#">
										<i class="fas fa-power-off font-size-base opacity-60 mr-2"></i>
										Sign out
									</a>
								</li>
							</ul>
						<?php } else if (isset($_SESSION['usr_cat_id']) && $_SESSION['usr_cat_id'] == 4) { ?>
							<!--account executive-->
							<ul class="dropdown-menu dropdown-menu-right" style="width: 15rem;">
								<li>
									<a class="dropdown-item d-flex align-items-center" href="#" onclick="navigateDashboard();">										
										<i class="fas fa-desktop font-size-base opacity-60 mr-2"></i>
										Dashboard									
									</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="profile-executive.php">
										<i class="fas fa-user-circle font-size-base opacity-60 mr-2"></i>
										Profile									
									</a>
								</li>								
								<li>
									<a class="dropdown-item d-flex align-items-center" href="my-referral-members-accex.php">
										<i class="fas fa-sitemap font-size-base opacity-60 mr-2"></i> 
										My Referral Members						
									</a>
								</li>								
								<li>
									<a class="dropdown-item d-flex align-items-center" href="my-selling-event-items.php">
										<i class="fas fa-box-open font-size-base opacity-60 mr-2"></i> 
										My Selling Event Items						
									</a>
								</li>								
								<li>
									<a class="dropdown-item d-flex align-items-center" href="events-accex.php">
										<i class="fas fa-calendar-day font-size-base opacity-60 mr-2"></i> 
										Events						
									</a>
								</li>								
								<li>
									<a class="dropdown-item d-flex align-items-center" href="my-messages-accex.php">
										<i class="fas fa-mail-bulk font-size-base opacity-60 mr-2"></i>
										Messages
										<span class="nav-indicator"></span>
										<span class="ml-auto font-size-xs text-muted notify-msg">0</span>
									</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a class="dropdown-item d-flex align-items-center logout" href="#">
										<i class="fas fa-power-off font-size-base opacity-60 mr-2"></i>
										Sign out
									</a>
								</li>
							</ul>
						<?php } else { ?>
							<ul class="dropdown-menu dropdown-menu-right" style="width: 15rem;">
								<li>
									<a class="dropdown-item d-flex align-items-center" href="#" onclick="navigateDashboard();">										
										<i class="fas fa-desktop font-size-base opacity-60 mr-2"></i>
										Dashboard									
									</a>
								</li>
								<li class="dropdown-divider"></li>								
								<li>
									<a class="dropdown-item d-flex align-items-center logout" href="#">
										<i class="fas fa-power-off font-size-base opacity-60 mr-2"></i>
										Sign out
									</a>
								</li>
							</ul>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<div class="collapse navbar-collapse order-lg-2" id="navbarCollapse1">						
				<ul class="navbar-nav mr-auto loadadwebsite"></ul>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light bg-light grey-lighten shadow border-bottom">      
		<div class="container">
			<button class="navbar-toggler btn btn-translucent-dark btn-sm rounded float-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-search"></i> Find Now </button>
			<button class="btn btn-outline-dark btn-sm mr-3 btn-popupallcategory">
				Categories
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="d-flex flex-row w-100 justify-content-center">
					<div class="row w-100">
						<div class="col-xl-3 col-12 p-1">
							<select class="cmbLocations form-control form-control-chosen shadow-sm">
								<option value="" disabled selected>Loading...</option>
							</select>
						</div>
						<div class="col-xl-3 col-12 p-1">
							<select class="cmbCategories form-control form-control-chosen shadow-sm">
								<option value="" disabled selected>Loading...</option>
							</select>
						</div>
						<div class="col-xl-5 col-12 p-1">
							<input type="text" class="form-control form-control-sm search-keyword" placeholder="Search for Anything...">

						</div>
						<div class="col-xl-1 col-12 p-1">
							<button class="btn btn-light btn-sm btn-block btn-find"><i class="fas fa-search"></i></button>
						</div>
					</div>


				</div>
			</div>

	</nav>

	<!--category search bar-->
	<section class="shadow-sm pt-2 grey-lighten border-bottom" hidden>
		<div class="container">
			<div class="row justify-content-center">	
				<div class="col-xl-2 col-md-2 col-sm-4 col-12 pt-1">
					<button class="btn btn-block btn-sm btn-outline-secondary mr-2">Categories</button>

				</div>
				<div class="col-xl-10 col-md-10 col-sm-8 col-12 px-0">						
					<div class="container">
						<div class="row">
							<div class="col-xl-3 p-1">
								<select class="cmbLocations form-control form-control-chosen shadow-sm">
									<option value="" disabled selected>Loading...</option>
								</select>
							</div>
							<div class="col-xl-3 p-1">
								<select class="cmbCategories form-control form-control-chosen shadow-sm">
									<option value="" disabled selected>Loading...</option>
								</select>
							</div>
							<div class="col-xl-6 p-1">
								<div class="row">
									<div class="col-xl-10 pr-1 pb-sm-2 px-sm-3 text-right">
										<input type="text" class="form-control form-control-sm search-keyword" placeholder="Search for Anything...">
									</div>
									<div class="col-xl-2 px-sm-3 px-xl-0">
										<button class="btn btn-light btn-sm btn-block btn-find"><i class="fas fa-search"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>						
				</div>
			</div>
		</div>	
	</section>


	<!-- Shopping cart off-canvas-->
	<div class="cs-offcanvas cs-offcanvas-collapse-always cs-offcanvas-right offcanvas" id="shoppingCart">
		<div class="cs-offcanvas-cap navbar-box-shadow px-4 mb-2">
			<h5 class="mt-1 mb-0">Your cart </h5>
			<button class="btn btn-sm btn-dark btnclearallcart"><i class="far fa-trash-alt"></i> Clear All</button>
			<button type="button" class="btn-close" aria-label="Close" data-toggle="offcanvas" data-offcanvas-id="shoppingCart" data-target="#shoppingCart" aria-expanded="false"></button>
		</div>
		<div class="cs-offcanvas-body p-4 cartItemsDiv" data-simplebar></div>
		<div class="cs-offcanvas-cap d-block border-top px-4 mb-2">
			<div class="d-flex justify-content-between mb-4"><span>Total:</span><span class="h6 mb-0 cartItemsTotal">$0.00</span></div><button class="btn btn-primary btn-sm btn-block btn-payshoppingcart"><i class="fas fa-credit-card font-size-base mr-2"></i>Checkout</button>
		</div>
	</div>
</header>