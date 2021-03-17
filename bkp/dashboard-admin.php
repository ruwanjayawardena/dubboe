<?php include './access_control/admin_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?> 
        <!--body content-->
        <section>
            <div class="container-fluid wrapper">
				<div class="row">
					<div class="col-lg-2 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 text-center">
								<h4><i class="fa fa-cogs"></i> Chat</h4>		
							</div>
						</div>
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-10 col-12 hvr-grow">
								<a href="messages.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-mail-bulk fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-mail-bulk fa-lg"></i> Messages <span class="badge badge-dark notify-msg">0</span></h5>
											<p class="card-text"><small> Messages</small></p>
										</div>                           
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 text-center">
								<h4><i class="fa fa-ad"></i> Ad Management</h4>	
							</div>
						</div>
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-5 col-12 hvr-grow">
								<a href="user-ad-management.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-ad fa-lg fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-ad fa-lg"></i> User Ad Management</h5>
											<p class="card-text"><small>User Ad Management</small></p>
										</div>                           
									</div>
								</a>
							</div>
							<div class="col-lg-5 col-12 hvr-grow">
								<a href="systemcategorycombo.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-th fa-lg fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-th fa-lg"></i> Ad Filter Select Boxes</h5>
											<p class="card-text"><small>Manage Ad Filter Select Boxes</small></p>
										</div>                           
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 col-12 text-center">
								<h4><i class="fa fa-blog"></i> Blog</h4>		
							</div>
						</div>
						<div class="row justify-content-center mt-5 mb-1">								
							<div class="col-lg-5 col-12 hvr-grow">
								<a href="post-blog.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-blog fa-lg fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-blog fa-lg"></i> Create Blog POST</h5>
											<p class="card-text"><small>Manage Blog POST</small></p>
										</div>                           
									</div>
								</a>
							</div>
							<div class="col-lg-5 col-12 hvr-grow">
								<a href="blogcomboboxes.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-blog fa-lg fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-blog fa-lg"></i> Blog Select Boxes</h5>
											<p class="card-text"><small>Manage Blog Select Boxes</small></p>
										</div>                           
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 col-12 text-center">
								<h4><i class="fa fa-cogs"></i> User Management</h4>		
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="addnewadmin.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-users fa-lg"></i> Admin</h5>
											<p class="card-text"><small>Manage System Admins</small></p>
										</div>                           
									</div>
								</a>
							</div>	
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="members.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-users fa-lg"></i> Members</h5>
											<p class="card-text">Manage Members</p>
										</div>                           
									</div>
								</a>
							</div>  
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="members-info-report.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-users fa-lg"></i> Members Information Report</h5>
											<p class="card-text">All Members Information Report</p>
										</div>                           
									</div>
								</a>
							</div>  
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="account-executives.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-users fa-lg"></i> Account Executive</h5>
											<p class="card-text">Manage Account Executive</p>
										</div>                           
									</div>
								</a>
							</div> 
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="relatecmb.php?MC=97" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-user-shield fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-user-shield fa-lg"></i> Users Verify Indicators</h5>
											<p class="card-text"><small>Users Verify Indicators</small></p>
										</div>                           
									</div>
								</a>
							</div>                 			
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="user-verification-request.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-user-shield fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-user-shield fa-lg"></i> Verification Requests</h5>
											<p class="card-text"><small> Users Verification Requests</small></p>
										</div>                           
									</div>
								</a>
							</div>
						</div>								
					</div>
					<div class="col-lg-5 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 col-12 text-center">
								<h4><i class="fa fa-cogs"></i> Credits & Membership Plans</h4>		
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-4 col-12 hvr-grow">
								<a href="credit-system.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file-alt fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-file fa-lg"></i> Referral Credit System & Membership Plans</h5>
											<p class="card-text"><small>Manage</small></p>
										</div>                           
									</div>
								</a>
							</div>                 			
							<div class="col-lg-4 col-12 hvr-grow">
								<a href="user_received_credit.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file-alt fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-file fa-lg"></i> Members Credit</h5>
											<p class="card-text"><small>View All Members Credits</small></p>
										</div>                           
									</div>
								</a>
							</div>                 			
							<div class="col-lg-4 col-12 hvr-grow">
								<a href="user_received_credit_accexe.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file-alt fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-file fa-lg"></i> Account Executives Credit</h5>
											<p class="card-text"><small>View All Executives Credits</small></p>
										</div>                           
									</div>
								</a>
							</div> 
						</div>							

					</div>
					<div class="col-lg-5 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 col-12 text-center">
								<h4><i class="fa fa-cogs"></i> Grants</h4>		
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-4 col-12 hvr-grow">
								<a href="user-grant-mgmt.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-trophy fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-trophy fa-lg"></i> User Grants Management</h5>
											<p class="card-text"><small>User Grants Management </small></p>
										</div>                           
									</div>
								</a>
							</div>                 			
							<div class="col-lg-4 col-12 hvr-grow">
								<a href="user-grant-invite.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-medal fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-medal fa-lg"></i> Grants Invitation</h5>
											<p class="card-text"><small>Grants Invitation </small></p>
										</div>                           
									</div>
								</a>
							</div>
						</div>

					</div>
					<div class="col-lg-5 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 col-12 text-center">
								<h4><i class="fa fa-cogs"></i> Affiliate Membership & Event Commission Payout</h4>		
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-4 col-12 hvr-grow">
								<a href="affiliate-membership-payout.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-sitemap fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-sitemap fa-lg"></i> Affiliate Membership Payout</h5>
											<p class="card-text"><small> Affiliate Membership Payout</small></p>
										</div>                           
									</div>
								</a>
							</div>                 			
							<div class="col-lg-4 col-12 hvr-grow">
								<a href="sale-item-commition-payout.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-percent fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-percent fa-lg"></i> Commission Payout</h5>
											<p class="card-text"><small> Account Executive Commission Payout</small></p>
										</div>                           
									</div>
								</a>
							</div> 
						</div>							
					</div>
					<div class="col-lg-4 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 col-12 text-center">
								<h4><i class="fa fa-cogs"></i> Event</h4>		
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-5 col-12 hvr-grow">
								<a href="selling-history.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-box-open fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-box-open fa-lg"></i> Selling History</h5>
											<p class="card-text"><small> Event Items Selling History</small></p>
										</div>                           
									</div>
								</a>
							</div> 
						</div>							
					</div>

					<div class="col-lg-6 col-12">
						<div class="row justify-content-center mt-5 mb-1">
							<div class="col-lg-12 col-sm-12 text-center">
								<h4><i class="fa fa-cogs"></i> Website Settings</h4>		
							</div>
						</div>
						<div class="row justify-content-center">								

							<div class="col-lg-3 col-12 hvr-grow">
								<a href="setting.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-cogs fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-cogs fa-lg"></i> Front-End</h5>
											<p class="card-text"><small>Configure Front-End Settings</small></p>
										</div>                           
									</div>
								</a>
							</div>
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="pages-and-sections.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file-alt fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-file fa-lg"></i> Pages & Sections</h5>
											<p class="card-text"><small>Manage Pages & home page sections</small></p>
										</div>                           
									</div>
								</a>
							</div>                  			

							<div class="col-lg-3 col-12 hvr-grow">
								<a href="payment-api-setup.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fab fa-cc-paypal fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fab fa-cc-paypal fa-lg"></i> PayPal Payment API Setup</h5>
											<p class="card-text"><small>Payment Adaptive API Setup</small></p>
										</div>                           
									</div>
								</a>
							</div>
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="sendgrid-api-setup.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-envelope fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-envelope fa-lg"></i> Sendgrid Email Web API Setup</h5>
											<p class="card-text"><small>Sendgrid Email Web API Setup</small></p>
										</div>                           
									</div>
								</a>
							</div>
							<div class="col-lg-3 col-12 hvr-grow">
								<a href="common-selectboxes.php" class="text-decoration-none">
									<div class="card text-white bg-primary">
										<div class="card-header text-center d-none d-sm-block"><i class="fas fa-th fa-lg fa-4x"></i></div>
										<div class="card-body text-center">
											<h5 class="card-title"><i class="fas fa-th fa-lg"></i> Common Select Boxes</h5>
											<p class="card-text"><small>Manage Common Select Boxes</small></p>
										</div>                           
									</div>
								</a>
							</div>	
						</div> 
					</div>
				</div>
				<!--                <div class="row justify-content-center mt-5 mb-1">
									<div class="col-lg-12 col-sm-12 text-center">
										<h4><i class="fa fa-cogs"></i> Administrative Configuration</h4>		
									</div>
								</div>
								<div class="row justify-content-center">								
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="addnewadmin.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-users fa-lg"></i> Admin</h5>
													<p class="card-text"><small>Manage System Admins</small></p>
												</div>                           
											</div>
										</a>
									</div>	
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="members.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-users fa-lg"></i> Members</h5>
													<p class="card-text">Manage Members</p>
												</div>                           
											</div>
										</a>
									</div>  
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="account-executives.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-users fa-lg"></i> Account Executive</h5>
													<p class="card-text">Manage Account Executive</p>
												</div>                           
											</div>
										</a>
									</div>  
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="setting.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-cogs fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-cogs fa-lg"></i> Front-End</h5>
													<p class="card-text"><small>Configure Front-End Settings</small></p>
												</div>                           
											</div>
										</a>
									</div>
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="pages-and-sections.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file-alt fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-file fa-lg"></i> Pages & Sections</h5>
													<p class="card-text"><small>Manage Pages & home page sections</small></p>
												</div>                           
											</div>
										</a>
									</div>                  			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="credit-system.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file-alt fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-file fa-lg"></i> Referral Credit System & Membership Plans</h5>
													<p class="card-text"><small>Manage</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="user_received_credit.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file-alt fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-file fa-lg"></i> Members Credit</h5>
													<p class="card-text"><small>View All Members Credits</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="user_received_credit_accexe.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-file-alt fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-file fa-lg"></i> Account Executives Credit</h5>
													<p class="card-text"><small>View All Executives Credits</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="payment-api-setup.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fab fa-paypal fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fab fa-paypal fa-lg"></i> PayPal Payment API Setup</h5>
													<p class="card-text"><small>Payment Adaptive API Setup</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
														<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
															<a href="relatecmb.php?MC=96" class="text-decoration-none">
																<div class="card text-white bg-primary">
																	<div class="card-header text-center d-none d-sm-block"><i class="fas fa-trophy fa-4x"></i></div>
																	<div class="card-body text-center">
																		<h5 class="card-title"><i class="fas fa-trophy fa-lg"></i> Users Grants Questionnaire</h5>
																		<p class="card-text"><small>Users Grants Questionnaire </small></p>
																	</div>                           
																</div>
															</a>
														</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="user-grant-mgmt.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-trophy fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-trophy fa-lg"></i> User Grants Management</h5>
													<p class="card-text"><small>User Grants Management </small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="user-grant-invite.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-medal fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-medal fa-lg"></i> Grants Invitation</h5>
													<p class="card-text"><small>Grants Invitation </small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="relatecmb.php?MC=97" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-user-shield fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-user-shield fa-lg"></i> Users Verify Indicators</h5>
													<p class="card-text"><small>Users Verify Indicators</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="user-verification-request.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-user-shield fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-user-shield fa-lg"></i> Verification Requests</h5>
													<p class="card-text"><small> Users Verification Requests</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="messages.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-mail-bulk fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-mail-bulk fa-lg"></i> Messages <span class="badge badge-dark notify-msg">0</span></h5>
													<p class="card-text"><small> Messages</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="affiliate-membership-payout.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-sitemap fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-sitemap fa-lg"></i> Affiliate Membership Payout</h5>
													<p class="card-text"><small> Affiliate Membership Payout</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="sale-item-commition-payout.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-percent fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-percent fa-lg"></i> Commission Payout</h5>
													<p class="card-text"><small> Account Executive Commission Payout</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
									<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
										<a href="selling-history.php" class="text-decoration-none">
											<div class="card text-white bg-primary">
												<div class="card-header text-center d-none d-sm-block"><i class="fas fa-box-open fa-4x"></i></div>
												<div class="card-body text-center">
													<h5 class="card-title"><i class="fas fa-box-open fa-lg"></i> Selling History</h5>
													<p class="card-text"><small> Event Items Selling History</small></p>
												</div>                           
											</div>
										</a>
									</div>                 			
				
								</div> -->



				<div class="row justify-content-center mt-5 mb-1">
					<div class="col-lg-12 col-sm-12 text-center">
						<h4><i class="fa fa-user-secret"></i> Developer Section <span class="badge badge-warning">This is Only for developing purpose</span>&nbsp;<span class="badge badge-danger">Don't use this section</span></h4>		
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
						<a href="df_adcategory_pagefilter.php" class="text-decoration-none">
							<div class="card text-white bg-warning">
								<div class="card-header text-center d-none d-sm-block"><i class="fas fa-plus-square fa-4x"></i></div>
								<div class="card-body text-center">
									<h5 class="card-title"><i class="fas fa-plus-square fa-lg"></i> Ad Category Filters</h5>
									<p class="card-text"><small>Developer Use Only</small></p>
								</div>                           
							</div>
						</a>
					</div>
					<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
						<a href="df_filtergroup.php" class="text-decoration-none">
							<div class="card text-white bg-warning">
								<div class="card-header text-center d-none d-sm-block"><i class="fas fa-plus-square fa-4x"></i></div>
								<div class="card-body text-center">
									<h5 class="card-title"><i class="fas fa-plus-square fa-lg"></i> Ad Category Filter Group</h5>
									<p class="card-text"><small>Developer Use Only</small></p>
								</div>                           
							</div>
						</a>
					</div>
					<!--					<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
											<a href="df_pagefitler_order.php" class="text-decoration-none">
												<div class="card text-white bg-warning">
													<div class="card-header text-center d-none d-sm-block"><i class="fas fa-plus-square fa-4x"></i></div>
													<div class="card-body text-center">
														<h5 class="card-title"><i class="fas fa-plus-square fa-lg"></i> Ad Category Filter Order</h5>
														<p class="card-text"><small>Developer Use Only</small></p>
													</div>                           
												</div>
											</a>
										</div>-->
				</div>


            </div>
        </section>
		<?php
		include './includes/end-block.php';
		include './includes/commonJS.php';
		?> 
		<script>
			$(document).ready(function () {
				frontNavbarMsgNotification();
				setInterval(function () {
					frontNavbarMsgNotification();
				}, 5000);
			});
		</script>

    </body>
</html>