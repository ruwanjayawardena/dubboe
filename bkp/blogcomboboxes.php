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
                <div class="row justify-content-center">								
                    <div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="relatecmb.php?MC=90" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-th fa-lg"></i> Blog Main Category</h5>
                                    <p class="card-text"><small>Blog Main Category</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>							
                    <div class="col-lg-2 col-sm-3 col-xs-12 hvr-grow">
                        <a href="relatesubcmb.php?MC=91&RC=90&RL=2" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-users fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-th fa-lg"></i> Blog Sub Category</h5>
                                    <p class="card-text"><small>Blog Sub Category</small></p>
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