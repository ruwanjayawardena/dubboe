<?php include './access_control/pages_auth.php'; ?> 
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
            <div class="container wrapper">


                <div class="row justify-content-center mt-5 mb-1">
					<div class="col-lg-12 col-sm-12 text-center">
						<h4><i class="fa fa-cogs"></i> Profile Section</h4>		
					</div>
				</div>                
                <div class="row justify-content-center">								
                    <div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="profile-categories.php" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-users fa-lg"></i> Profile Category</h5>
                                    <p class="card-text"><small>Profile Category</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>
<!--                    <div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="relatecmb.php?MC=92" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-users fa-lg"></i> Profile Category</h5>
                                    <p class="card-text"><small>Profile Category</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>-->
                    <div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="relatecmb.php?MC=93" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-users fa-lg"></i> Profile Grading</h5>
                                    <p class="card-text"><small>Profile Grading</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="relatecmb-imgval.php?MC=94&foldername=admaincategory" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-th fa-lg fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-th fa-lg"></i> Product/Services Main Category</h5>
                                    <p class="card-text"><small>Manage Product/Services Main Category</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>
					<div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="relatesubcmb-imgval.php?MC=95&RC=94&RL=2&foldername=adsubcategory" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-th fa-lg fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-th fa-lg"></i> Product/Services Sub Category</h5>
                                    <p class="card-text"><small>Manage Product/Services Sub Category</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>
				</div>
				<div class="row justify-content-center mt-5 mb-1">
					<div class="col-lg-12 col-sm-12 text-center">
						<h4><i class="fa fa-cogs"></i> Location Filters</h4>		
					</div>
				</div>
				<div class="row justify-content-center">								
                    <div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="relatesubcmb.php?MC=27&RC=26&RL=2" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-users fa-lg"></i> State</h5>
                                    <p class="card-text"><small>Manage State</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="relatesubcmb.php?MC=30&RC=27&RL=3" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-users fa-lg"></i> City</h5>
                                    <p class="card-text"><small>Manage City</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>
				</div>
			</div>
        </section>
		<?php
		include './includes/end-block.php';
		include './includes/commonJS.php';
		?>       
    </body>
</html>