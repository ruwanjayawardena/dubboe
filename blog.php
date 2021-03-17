<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<link rel="stylesheet" href="assets/plugins/jPages/css/jPages.css">		
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<main class="main-wrapper">
			<section class="cs-sidebar-enabled cs-sidebar-right">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 cs-content pt-5">
							<div class="row justify-content-center mb-4">
								<div class="col-12">
									<nav aria-label="breadcrumb">
										<ol class="py-1 breadcrumb">
											<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
											<li class="breadcrumb-item"><a href="#">Blog</a></li>
										</ol>
									</nav>
									<h1 class="text-capitalize">Blog</h1>
								</div>
							</div>
							<div class="row justify-content-center pb-5">
								<div class="col-xl-12 col-12">	
									<div class="row blogpostloader" id="blogpostloaderID">
									</div>
									<div class="row mt-3 justify-content-right">
										<div class="col-12">
											<!--<nav>-->
											<ul class="pagination standedad_holder"></ul>
											<!--</nav>-->											
										</div>	
									</div>	
								</div>
							</div>
						</div>
						<div class="col-lg-3 cs-sidebar bg-secondary pt-5 pl-lg-4 pb-md-2">
							<div class="row justify-content-center pb-5">
								<div class="col-xl-12 col-12">
									<div class="cs-widget cs-widget-categories">
										<h3 class="cs-widget-title btn-allcat">All Categories</h3>
										<ul id="categories" class="blogcategory">
										</ul>
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
		<script src="assets/plugins/jPages/js/jPages.js"></script>	
		<script>
												function loadAllBlogs(filter) {
													var searchResult = "";
													$.post('bkp/controllers/blogController.php', {action: 'getAllBlog'}, function (e) {
														if (e === undefined || e.length === 0) {
															searchResult += "<h2 class='alert alert-danger bg-danger text-center'>Blog Post Not Available...</h2>";
															$('.blogpostloader').html('').append(searchResult);
														} else {
															if (filter === "all") {
																$.each(e, function (index, qdt) {

																	searchResult += '<div class="col-xl-4 col-md-6 col-sm-6 col-6 px-2 py-2 m-0">';
																	searchResult += '<div class="card card-category box-shadow border blgDiv" id="' + qdt.blg_id + '">';
																	if (qdt.blg_img === "#") {
																		searchResult += '<img src="assets/img/noimage.png" class="card-img-top">';
																	} else {
																		searchResult += '<img src="asset_imageuploader/blog/' + qdt.blg_id + '/' + qdt.blg_img + '" class="card-img-top">';
																	}
																	searchResult += '<div class="card-body">';
																	searchResult += '<h5 class="card-title">' + qdt.blg_title + '</h5>';
																	searchResult += '<p class="font-size-xs card-text font-size-sm">' + qdt.blg_maincat_name + '/ ' + qdt.blg_subcat_name + '</p>';
																	searchResult += '<p class="text-muted font-size-sm">Published on ' + qdt.blg_date + '</p>';
																	searchResult += '</div>';
																	searchResult += '</div>';
																	searchResult += '</div>';

																});
															} else {
																$.each(e, function (index, qdt) {
																	if (parseInt(filter) == parseInt(qdt.blg_subcat)) {
																		searchResult += '<div class="col-xl-4 col-lg-4 col-md-6 col-12">';
																		searchResult += '<div class="card card-hover blgDiv" id="' + qdt.blg_id + '">';
																		if (qdt.blg_img === "#") {
																			searchResult += '<img src="assets/img/noimage.png" class="card-img-top">';
																		} else {
																			searchResult += '<img src="asset_imageuploader/blog/' + qdt.blg_id + '/' + qdt.blg_img + '" class="card-img-top">';
																		}
																		searchResult += '<div class="card-body">';
																		searchResult += '<h5 class="card-title">' + qdt.blg_title + '</h5>';
																		searchResult += '<p class="card-text font-size-sm">' + qdt.blg_maincat_name + '/ ' + qdt.blg_subcat_name + '</p>';
																		searchResult += '<p class="text-muted font-size-sm">Published on ' + qdt.blg_date + '</p>';
																		searchResult += '</div>';
																		searchResult += '</div>';
																		searchResult += '</div>';
																	}
																});
															}
															$('.blogpostloader').html('').append(searchResult);
															$('.blgDiv').click(function (e) {
																e.preventDefault();
																var blg_id = $(this).prop('id');
																window.location.href = 'blog-post.php?blg_id=' + blg_id;
															})
															$('.standedad_holder').jPages({
																containerID: 'blogpostloaderID',
																first: false,
																previous: 'Previous',
																next: 'Next',
																last: false,
																perPage: 8,
																startRange: 1,
																midRange: 5,
																endRange: 1,
																delay: 0,
																minHeight: false,
//							scrollBrowse: true,
																keyBrowse: true
															});


														}
													}, "json");
												}
												function cmbMainComboListWidget() {
													var cmbdata = "";
													$.post('bkp/controllers/subComboController.php', {action: 'cmbRelateCombo', mcmb_id: 90, scmb_relationship: 2}, function (e) {
														$.post('bkp/controllers/subComboController.php', {action: 'cmbRelateSubComboWidget', mcmb_id: 91}, function (e2) {

															if (e === undefined || e.length === 0 || e === null) {
//							cmbdata += '<option value="0"> Data not available! </option>';
															} else {
																$.each(e, function (index, qdt) {
																	cmbdata += '<li><a class="cs-widget-link collapsed" href="#mc-' + qdt.rlcmb_id + '" data-toggle="collapse">' + qdt.rlcmb_name + '</a>';
																	cmbdata += '<ul class="collapse" id="mc-' + qdt.rlcmb_id + '" data-parent="#categories">';
																	$.each(e2, function (index2, qdt2) {
																		if (qdt.rlcmb_id == qdt2.scmb_relatecmb) {
																			cmbdata += '<li><a class="cs-widget-link btn-subcategory" href="#" id="' + qdt2.scmb_id + '">' + qdt2.scmb_name + '</a></li>';
																		}
																	});
																	cmbdata += '</ul></li>';

																});
															}
															$('.blogcategory').html('').append(cmbdata);

															$('.btn-subcategory').click(function (event) {
																event.preventDefault();
																var subcmbid = $(this).prop('id');
																loadAllBlogs(subcmbid);
															})

														}, "json");
													}, "json");
												}

												$(document).ready(function () {
													$('select').chosen({width: "100%"});
													cmbMainComboListWidget();
													loadAllBlogs('all');

													$('.btn-allcat').click(function (e) {
														e.preventDefault();
														loadAllBlogs('all');
													})
												});
		</script>		
	</body>
</html>