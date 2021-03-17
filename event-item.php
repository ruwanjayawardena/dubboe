<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="id" value="<?php
		if (isset($_REQUEST['id'])) {
			echo $_REQUEST['id'];
		} else {
			echo "";
		}
		?>"/>
		<main class="main-wrapper py-5">
			<section class="pb-3">	
				<div class="container">					
					<div class="row justify-content-center mb-4">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">All Events</a></li>          
									<li class="breadcrumb-item"><a href="#"><span class="state"></span></a></li>               
									<li class="breadcrumb-item"><a href="#"><span class="city"></span></a></li>             
									<li class="breadcrumb-item"><a href="#"><span class="eventidinfo"></span></a></li>
									<li class="breadcrumb-item"><a href="#"><span class="eventcategoryinfo"></span></a></li>
									<li class="breadcrumb-item"><a href="#"><span class="eventitemidinfo"></span></a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><span class="evtem_name"></span></h1>
						</div>
					</div>
					<div class="row justify-content-center">					
						<div class="col-xl-12 col-12">								
							<div class="container">
								<div class="row justify-content-center">
									<div class="col-xl-8 col-md-7 col-12">
										<div class="row slider-loader">
											<div class="col-lg-12 col-12">
												<div class="fotorama mb-4">

												</div>
											</div>
										</div>
										<div class="row py-3">
											<div class="col-lg-4 col-12">
												<img src="#" class="img-fluid rounded box-shadow evtem_img">
											</div>
											<div class="col-lg-8 col-12 mt-2">
												<h5>Description</h5>
												<span class="evtem_desc">

												</span>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-md-5 col-12">	
										<div class="row">
											<div class="col-lg-12 col-12">
												<div class="card cardinfobox-custom1 box-shadow">
													<div class="card-body text-center">												
														<dl class="row">
															<dt class="col-sm-3">Price</dt>
															<dd class="col-sm-9 evtem_price"></dd>
															<dt class="col-sm-3">Qty</dt>
															<dd class="col-sm-9 evtem_qty"></dd>														

														</dl>
														<button class="btn btn-primary btn_sendMsg btn-block"><i class="far fa-envelope"></i> Send Message</button>
														<a class="btn btn-translucent-dark btn-block btn-addwishlist" href="#">
															<i class="fe-heart"></i> Add Wishlist																
														</a>


														<button class="btn btn-secondary btn-block btn-addcart"  data-toggle="tooltip" data-placement="top" title="Add to cart">
															<i class="fe-shopping-cart"></i> Add Cart
														</button>
													</div>
												</div>
											</div>
										</div>																
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
		<script>
										function LoadEventItemInfoByID(callback) {
											var ad_maincategory = 0;
											var ad_subcategory = 0;
											var id = $('#id').val();
											var imgallery = [];
											$.post('bkp/controllers/eventController.php', {action: 'frontEventItemByID', evtem_id: id}, function (e) {
												$.each(e, function (index, qdt) {
													$('.state').html('').append(qdt.evt_state_name);
													$('.city').html('').append(qdt.evt_city_name);
													$('.eventidinfo').html('').append('Event ID ' + qdt.evtem_event);
													$('.eventcategoryinfo').html('').append(qdt.evtcat_catname);
													$('.eventitemidinfo').html('').append('Item ID ' + qdt.evtem_id);
													$('.evtem_name').html('').append(qdt.evtem_name);
													$('.evtem_desc').html('').append(qdt.evtem_desc);
													$('.evtem_price').html('').append('$' + qdt.evtem_price + ' USD');
													$('.evtem_qty').html('').append(qdt.evtem_qty);

													$('.btn_sendMsg').val(qdt.evt_executive);
													if (qdt.evtem_img === "#") {
														$('.evtem_img_div').removeClass('header_default_bg').css('background-image', 'url(assets/img/noimage.png)');
														$('.evtem_img').prop('src', 'assets/img/noimage.png');
													} else {
														$('.evtem_img_div').removeClass('header_default_bg').css('background-image', 'url(asset_imageuploader/eventitemprofilephoto/' + qdt.evtem_id + '/medium/' + qdt.evtem_img + ')');
														$('.evtem_img').prop('src', 'asset_imageuploader/eventitemprofilephoto/' + qdt.evtem_id + '/medium/' + qdt.evtem_img);

													}
													if (qdt.evtem_slider === "#") {
														$('.slider-loader').prop('hidden', true)
													} else {
														$.each(qdt.evtem_slider, function (index_slider, qdt_slider) {
															imgallery.push({img: 'asset_imageuploader/eventitemsliderphoto/' + qdt.evtem_id + '/' + qdt_slider, thumb: 'asset_imageuploader/eventitemsliderphoto/' + qdt.evtem_id + '/thumbnail/' + qdt_slider});
														});


														$('.fotorama').fotorama({
															data: imgallery,
															nav: 'thumbs',
															width: '100%',
															maxwidth: '100%',
															ratio: '16/9',
															allowfullscreen: true,
															autoplay: true,
															keyboard: true,
															thumbmargin: 6,
															fit: 'cover',
															thumbwidth: 100
														});
													}
												});

												$('.btn_sendMsg').click(function () {
													var evt_executive = $(this).val();
													var msg_receiver = evt_executive;
													var msg_object_id = id;
													var msg_forwhat = 'EVENTITEM';
													sendMessageFRONTEND(msg_receiver, msg_object_id, msg_forwhat);
												});


												if (callback !== undefined) {
													if (typeof callback === 'function') {
														callback(ad_maincategory, ad_subcategory);
													}
												}
											}, "json");
										}

										$(document).ready(function () {
											$('select').chosen({width: "100%"});
											LoadEventItemInfoByID();

											$('.btn-addcart').click(function (e) {
												e.preventDefault();
												var id = $('#id').val();
												var postdata = {
													action: "AddEventItemToCart",
													evtem_id: id
												}
												$.post('bkp/controllers/shoppingcartController.php', postdata, function (e) {
													shoppingCartNotification();
													Swal.fire({
														position: 'top-left',
														html: e.msg,
														showConfirmButton: false,
														showCancelButton: false,
														timer: 1500,
													});
												}, "json");
											});

											$('.btn-addwishlist').click(function (e) {
												e.preventDefault();
												var id = $('#id').val();
												var postdata = {
													action: "saveWishlist",
													wish_object: id,
													wish_type: 3,
												}
												$.post('bkp/controllers/ubWishlistController.php', postdata, function (e) {
													shoppingCartNotification();
													Swal.fire({
														position: 'top-left',
														html: e.msg,
														showConfirmButton: false,
														showCancelButton: false,
														timer: 1500,
													});
												}, "json");
											});
										});
        </script>
	</body>
</html>