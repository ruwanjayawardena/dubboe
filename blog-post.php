<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="blg_id" value="<?php
		if (isset($_REQUEST['blg_id']) && !empty($_REQUEST['blg_id'])) {
			echo $_REQUEST['blg_id'];
		}
		?>">
		<main class="main-wrapper py-5">
			<section class="pb-2">	
				<div class="container">					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"> <span class="blg_title"></span></h1>
							<p class="blog-desc mb-0 pb-0"></p>
						</div>
					</div>
					<div class="row justify-content-center py-3">					
						<div class="col-xl-12 col-lg-12 col-12">	
							<div class="row singleblogpost_div">
								<h5 class="text-right text-secondary blg_date"></h5>
								<img src="#" id="blg_img" class="rounded img-fluid pb-3">
								<p class="blg_body"></p>
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
			function loadBlogsPostById() {
				var blg_id = $('#blg_id').val();
				var bgdata = "";
				$.post('bkp/controllers/blogController.php', {action: 'getBlogByID', blg_id: blg_id}, function (e) {
					$.each(e, function (index, qdt) {
						if (qdt.blg_img === "#") {
							$('#blg_img').prop('src', 'assets/img/noimage.png');
						} else {
							$('#blg_img').prop('src', 'asset_imageuploader/blog/' + qdt.blg_id + '/' + qdt.blg_img);

						}
						$('.blg_date').html('').append('Posted on ' + qdt.blg_date);
						$('.blg_body').html('').append(qdt.blg_body);
						$('.blg_title').html('').append(qdt.blg_title);
						$('.blog-desc').html('').append('Posted By ' + qdt.usr_first_name + ' on '+ qdt.blg_date);
					});
				}, "json");
			}


			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				loadBlogsPostById();
			});
		</script>
	</body>
</html>