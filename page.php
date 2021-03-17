<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<input type="hidden" id="pg" value="<?php
				if (isset($_REQUEST['pg']) && !empty($_REQUEST['pg'])) {
					echo $_REQUEST['pg'];
				}
				?>">    
				<!-- Page content-->
				<div class="container">
					<div class="row justify-content-center mx-3"">
						<!-- Content-->
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="#"><span class="pgs_heading"></span></a>
								</ol>
							</nav>
							<h1><span class="pgs_heading"></span></h1>
							<!-- Post content-->
							<p class="py-3 pgs_content"></p>
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
			function loadThisPage() {
				var pgs_link_name = $('#pg').val();
				$.post('bkp/controllers/pageController.php', {action: 'getPageSectionByURLName', pgs_link_name: pgs_link_name}, function (e) {
					$.each(e, function (index, qdt) {
						$('.pgs_heading').html('').append(qdt.pgs_heading);
						$('.pgs_content').html('').append(qdt.pgs_content);
					});
				}, "json");
			}

			$(document).ready(function () {
				// Executes when the HTML document is loaded and the DOM is ready
				loadThisPage();
			});
        </script>
	</body>
</html>