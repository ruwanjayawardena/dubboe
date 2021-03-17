<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>		
		<style>
			.card-img, .card-img-top, .card-img-bottom {
				height: 230px!important;
			}
		</style>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="evt_id" value="<?php
		if (isset($_REQUEST['evt_id'])) {
			echo $_REQUEST['evt_id'];
		} else {
			echo "";
		}
		?>"/>
		<main class="main-wrapper">
			<section>	
				<div class="container">					
					<div class="row justify-content-center mb-4 pt-5">
						<div class="col-xl-12 col-12">
							<nav aria-label="breadcrumb">
								<ol class="py-1 breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" onclick="navigateDashboard();"><i class="fas fa-desktop"></i>  Dashboard</a></li>
									<li class="breadcrumb-item"><a href="#">All Events</a></li>          
									<li class="breadcrumb-item"><a href="#"><span class="state"></span></a></li>               
									<li class="breadcrumb-item"><a href="#"><span class="city"></span></a></li>             
									<li class="breadcrumb-item"><a href="#"><span class="eventidinfo"></span></a></li>
								</ol>
							</nav>
							<h1 class="text-capitalize"><span class="evt_name"></span></h1>
						</div>
					</div>
					<div class="row justify-content-center">					
						<div class="col-xl-12 col-lg-12 col-12">								
							<div class="container">
								<div class="row justify-content-center">
									<div class="col-xl-7 col-lg-7 col-md-7 col-12">
										<img class="mb-3 evt_img_div img-fluid rounded mb-3" src="#"/>
										<h5>Description</h5>
										<span class="evt_desc">

										</span>										
									</div>
									<div class="col-xl-5 col-lg-5 col-md-5 col-12">									
										<div class="row">
											<div class="col-lg-12 col-12">
												<div class="card box-shadow border-0">
													<div class="card-body">											
														<dl class="row">
															<dt class="col-sm-4">Location</dt>
															<dd class="col-sm-8 evt_location_div"></dd>
															<dt class="col-sm-4">Date & Time</dt>
															<dd class="col-sm-8 evt_date_time_div"></dd>
															<dt class="col-sm-4">Organizer</dt>
															<dd class="col-sm-8">
																<img class="d-inline-block rounded-circle mb-3 evt_usr_profile_img" width="96" src="#"/>

																<h3 class="h6 pt-1 mb-1"><span class="usr_first_name"></span> <span class="usr_last_name"></span></a></h3>
																<button class="btn btn-outline-light btn-sm btn_sendMsg"><i class="far fa-envelope"></i> Send Message</button>
																<ul class="font-size-sm list-unstyled mb-4 alight-left">
																	<li>
																		<i class="fe-phone mr-2"></i>
																		<a class="nav-link-style usr_phone" href="tel:00331697720"></a>
																	</li>
																	<li class="mb-3">
																		<i class="fe-mail mr-2"></i>
																		<a class="nav-link-style usr_email" href="mailto:ben.miller@example.com"></a>
																	</li>																
																</ul>
															</dd>
														</dl>
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
			<section class="container-fluid blue-lighten2 py-6 mt-1 pt-3 mt-4 pb-0 mb-0 text-center eventItemDispDiv border-top border-secondary">
				<h2>Event Related Products/Services</h2>
				<p>Buy any items you want</p>

				<div class="container">					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-12">
							<!-- Masonry grid with filters -->
							<div class="cs-masonry-filterable">
								<!-- Filters -->
								<ul class="cs-masonry-filters nav nav-tabs justify-content-center pb-4 eventcategory-masonry-filters">
								</ul>

								<!-- Grid -->
								<div class="cs-masonry-grid eventitem-masonry-grid" data-columns="4">								
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
		<script>

			function eventItemsComponent() {
				var evt_id = $('#evt_id').val();
				var eventcategorydiv = "";
				var eventcategoryitemdiv = "";
				$.post('bkp/controllers/eventController.php', {action: 'cmbEventCategory', evt_id: evt_id}, function (eventCategory) {
					$.post('bkp/controllers/eventController.php', {action: 'AllEventCategoryItems', evt_id: evt_id}, function (eventCategoryItems) {
						eventcategorydiv += '<li class="nav-item">';
						eventcategorydiv += '<a class="nav-link active shuffleselecter" href="#" data-group="all">All</a>';
						eventcategorydiv += '</li>';
						$.each(eventCategory, function (eventcat_index, eventcat_qdt) {
							eventcategorydiv += '<li class="nav-item">';
							eventcategorydiv += '<a class="nav-link shuffleselecter" href="#" data-group="' + eventcat_qdt.evtcat_id + '">' + eventcat_qdt.evtcat_catname + '</a>';
							eventcategorydiv += '</li>';
						});
						$.each(eventCategory, function (eventcat_index, eventcat_qdt) {
							$.each(eventCategoryItems, function (eventcatitm_index, eventcatitm_qdt) {
								if (parseInt(eventcat_qdt.evtcat_id) == parseInt(eventcatitm_qdt.evtem_category)) {
									eventcategoryitemdiv += '<div class="cs-grid-item btn-event-item-div" id="' + eventcatitm_qdt.evtem_id + '" data-groups=["' + eventcat_qdt.evtcat_id + '"]>';
									eventcategoryitemdiv += '<div class="card card-product card-hover eventItemDiv">';
									eventcategoryitemdiv += '<span class="badge badge-lg badge-floating badge-floating-right badge-success">$' + eventcatitm_qdt.evtem_price + '</span>';
									if (eventcatitm_qdt.evt_img === "#") {
										eventcategoryitemdiv += '<img src="assets/img/noimage.png" class="card-img-top btn-event-item" alt="empty-image"/>';
									} else {
										eventcategoryitemdiv += '<img src="asset_imageuploader/eventitemprofilephoto/' + eventcatitm_qdt.evtem_id + '/medium/' + eventcatitm_qdt.evt_img + '" class="card-img-top btn-event-item" alt="' + eventcatitm_qdt.evtem_name + '"/>';

									}

									eventcategoryitemdiv += '<div class="card-body">';
									eventcategoryitemdiv += ' <a class="meta-link font-size-xs mb-1 btn-event-item" href="#">' + eventcatitm_qdt.evtcat_catname + '</a>';
									eventcategoryitemdiv += '<h3 class="font-size-md font-weight-medium mb-2 btn-event-item">';
									eventcategoryitemdiv += '<a class="meta-link" href="#">' + eventcatitm_qdt.evtem_name + '</a>';
									eventcategoryitemdiv += '</h3>';
									//									eventcategoryitemdiv += '<span class="font-size-sm">' + eventcatitm_qdt.evtem_desc + '</span>';
									eventcategoryitemdiv += '</div>';
									eventcategoryitemdiv += '<div class="card-footer">';
									eventcategoryitemdiv += '<div class="star-rating">';
									eventcategoryitemdiv += '<span class="text-heading font-weight-semibold font-size-sm">' + eventcatitm_qdt.evtem_qty + ' Qty Available</span>';
									eventcategoryitemdiv += '</div>';
									eventcategoryitemdiv += '<div class="d-flex align-items-center">';
									eventcategoryitemdiv += '<a class="btn-wishlist" href="#" id="ITEMWISH-' + eventcatitm_qdt.evtem_id + '">';
									eventcategoryitemdiv += '<i class="fe-heart"></i>';
									eventcategoryitemdiv += '<span class="btn-tooltip">Wishlist</span>';
									eventcategoryitemdiv += '</a>';
									eventcategoryitemdiv += '<span class="btn-divider"></span>';
									eventcategoryitemdiv += '<a class="btn-addtocart" href="#" id="ITEM-' + eventcatitm_qdt.evtem_id + '">';
									eventcategoryitemdiv += '<i class="fe-shopping-cart"></i>';
									eventcategoryitemdiv += '<span class="btn-tooltip">To Cart</span>';
									eventcategoryitemdiv += '</a>';
									eventcategoryitemdiv += '</div>';
									eventcategoryitemdiv += '</div>';
									eventcategoryitemdiv += '</div>';
									eventcategoryitemdiv += '</div>';
								}
							});
						});
						if (eventcategoryitemdiv === "") {
							$('.eventItemDispDiv').prop('hidden', true);
							$('.cs-page-wrapper').addClass('pb-5');
						} else {
							$('.eventItemDispDiv').prop('hidden', false);
						}
						$('.eventcategory-masonry-filters').html('').append(eventcategorydiv);
						$('.eventitem-masonry-grid').html('').append(eventcategoryitemdiv);
						//						reloadJS("assets/js/theme.min.js");
						var element = document.querySelector('.cs-masonry-grid');

						shuffleInstance = new Shuffle(element, {
							itemSelector: '.cs-grid-item',
							sizer: '.cs-grid-item'
						});

						$('.btn-event-item').click(function (e) {
							e.preventDefault();
							var id = $(this).closest('.btn-event-item-div').prop('id');
							window.location.href = 'event-item.php?id=' + id
						});
						$('.btn-addtocart').click(function (e) {
							e.preventDefault();
							var str = $(this).prop('id');
							var str_array = str.split('-');
							var postdata = {
								action: "AddEventItemToCart",
								evtem_id: str_array[1]
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

						$('.btn-wishlist').click(function (e) {
							e.preventDefault();
							var str = $(this).prop('id');
							var str_array = str.split('-');
							var postdata = {
								action: "saveWishlist",
								wish_object: str_array[1],
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

						$('.shuffleselecter').click(function (e) {
							e.preventDefault();
							$('.shuffleselecter').removeClass('active');
							$(this).addClass('active');
							var id = $(this).attr('data-group');
							if (id === 'all') {
								shuffleInstance.filter(Shuffle.ALL_ITEMS);
							} else {
								shuffleInstance.filter(id);
							}
						});

					}, "json");
				}, "json");
			}

			function LoadEventInfoByID(callback) {
				var ad_maincategory = 0;
				var ad_subcategory = 0;
				var evt_id = $('#evt_id').val();
				var imgallery = [];
				$.post('bkp/controllers/eventController.php', {action: 'frontEventByID', evt_id: evt_id}, function (eventInfo) {
					$.each(eventInfo, function (event_index, event_qdt) {
						$('.state').html('').append(event_qdt.evt_state_name);
						$('.city').html('').append(event_qdt.evt_city_name);
						$('.eventidinfo').html('').append('Event ID ' + event_qdt.evt_id);
						$('.evt_name').html('').append(event_qdt.evt_name);
						$('.evt_desc').html('').append(event_qdt.evt_desc);
						$('.evt_location_div').html('').append(event_qdt.evt_location + '<br>' + event_qdt.evt_state_name + ', ' + event_qdt.evt_city_name);
						$('.evt_date_time_div').html('').append(event_qdt.evt_date + ' ' + event_qdt.evt_time);

						$('.usr_phone').html('').append(event_qdt.usr_phone);
						$('.usr_phone').prop('href', 'tel:' + event_qdt.usr_phone);
						$('.usr_email').html('').append(event_qdt.usr_email);
						$('.usr_email').prop('href', 'mailto:' + event_qdt.usr_email);
						$('.usr_first_name').html('').append(event_qdt.usr_first_name);
						$('.usr_last_name').html('').append(event_qdt.usr_last_name);
						$('.btn_sendMsg').val(event_qdt.evt_executive);

						if (event_qdt.evt_usr_profile_img === "#") {
							$('.evt_usr_profile_img').prop('src', 'url(assets/img/noimage.png');
						} else {
							$('.evt_usr_profile_img').prop('src', 'asset_imageuploader/userprofileimages/' + event_qdt.evt_executive + '/' + event_qdt.evt_usr_profile_img);
						}
						if (event_qdt.evt_img === "#") {
							$('.evt_img_div').removeClass('header_default_bg').css('background-image', 'url(assets/img/noimage.png)');
							//							$('.evt_img_div').prop('src', 'assets/img/noimage.png');
							$('img.evt_img_div').prop('hidden', true);
						} else {
							$('img.evt_img_div').prop('hidden', false);
							$('.evt_img_div').removeClass('header_default_bg').css('background-image', 'url(asset_imageuploader/eventcoverphoto/' + event_qdt.evt_id + '/medium/' + event_qdt.evt_img + ')');
							$('.evt_img_div').prop('src', 'asset_imageuploader/eventcoverphoto/' + event_qdt.evt_id + '/medium/' + event_qdt.evt_img);
						}
					});

					$('.btn_sendMsg').click(function () {
						var evt_executive = $(this).val();
						var msg_receiver = evt_executive;
						var msg_object_id = evt_id;
						var msg_forwhat = 'EVENT';
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
				LoadEventInfoByID();
				eventItemsComponent();
			});


        </script>		
	</body>
</html>