<?php include './access_control/session_controler.php'; ?>   
<!doctype html>
<html lang="en">
	<head>
		<?php include './includes/head-block-all.php'; ?>
		<style>
			.card-img-top {
				/*width: 100% !important;*/
				width: 350px !important;
				/*height: 230px !important;*/
				height: 100%!important;
			}
		</style>
	</head>
	<body>
		<?php include './includes/frontend-navbar.php'; ?>
		<input type="hidden" id="country" value="<?php
		if (isset($_REQUEST['co'])) {
			echo $_REQUEST['co'];
		} else {
			echo "";
		}
		?>"/>		
		<input type="hidden" id="state" value="<?php
		if (isset($_REQUEST['st'])) {
			echo $_REQUEST['st'];
		} else {
			echo "";
		}
		?>"/>		
		<input type="hidden" id="city" value="<?php
		if (isset($_REQUEST['ct'])) {
			echo $_REQUEST['ct'];
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
									<span class="locationFilterBreadcrumbDiv" hidden>
										<li class="breadcrumb-item"><a href="#"><span class="state"></span></a></li>                
										<li class="breadcrumb-item"><a href="#"><span class="city"></span></a></li> 
									</span>
								</ol>
							</nav>
							<h1 class="text-capitalize"><i class="fas fa-calendar-day"></i> Events</h1>
						</div>
					</div>
					<div class="row justify-content-center">					
						<div class="col-xl-3 col-lg-3 col-md-4 col-12">
							<button class="btn btn-sm btn-primary btn-block btn-makeRefresh"><i class="fas fa-retweet fa-lg"></i> Reload All</button>
							<label class="mt-2">Location</label>
							<div class="form-group" hidden>
								<select class="col-12 form-control  cmbCountry form-control-chosen" data-placeholder="Choose a Country..." hidden>
									<option value="" disabled selected>Loading...</option>
								</select>
							</div>
							<div class="form-group">
								<select class="col-12 form-control cmbState form-control-chosen" data-placeholder="Choose a State..." required>
									<option value="" disabled selected>Loading...</option>
								</select>
							</div>
							<div class="form-group">	
								<select class="col-12 form-control cmbCity form-control-chosen" data-placeholder="Choose a city..." required>
									<option value="" disabled selected>Loading...</option>
								</select>
							</div>
						</div>							

						<div class="col-xl-9 col-lg-9 col-md-8 col-12">
							<span class="row loadEvents">

							</span>
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

			function loadEvents() {
				var ad_country = $('#country').val();
				var ad_state = $('#state').val();
				var ad_city = $('#city').val();
				var displayEvent = "";
				$.post('bkp/controllers/eventController.php', {action: 'frontAllEvent'}, function (alleventarr) {

					$.each(alleventarr, function (allevent_index, allevent_qdt) {
						if (parseInt(allevent_qdt.evt_type) == 0) {
							displayEvent += '<div class="col-xl-12 col-12 mb-3 px-2">';
							displayEvent += '<div class="card card-horizontal box-shadow card-hover classifiedAd-card">';
							displayEvent += '<span class="event-card" id="IMGDIV-' + allevent_qdt.evt_id + '">';
							if (allevent_qdt.evt_img === "#") {
								displayEvent += '<img class="card-img-top" src="assets/img/noimage.png">';
							} else {
								displayEvent += '<img class="card-img-top" src="asset_imageuploader/eventcoverphoto/' + allevent_qdt.evt_id + '/medium/' + allevent_qdt.evt_img + '">';
							}
							displayEvent += '</span>';
							displayEvent += '<div class="card-body font-size-sm">';
							displayEvent += '<div class="row">';
							displayEvent += '<div class="col-xl-10 col-12">';
							displayEvent += '<span class="event-card" id="INFODIV-' + allevent_qdt.evt_id + '">';
							displayEvent += '<h4 class="card-title">' + allevent_qdt.evt_name + '</h4>';
							displayEvent += '<p class="card-text font-size-sm"><h5>' + allevent_qdt.evt_subheadline + '</h5>';
							displayEvent += '<strong>Location</strong> ' + allevent_qdt.evt_state_name + ', ' + allevent_qdt.evt_city_name + '<br>';
							displayEvent += '<strong>Date/Time</strong> ' + allevent_qdt.evt_date + ' ' + allevent_qdt.evt_time + '<br>';
							displayEvent += '</p>';
							displayEvent += '</span>';
							displayEvent += '</div>';

							displayEvent += '<div class="col-xl-2 col-12 text-right">';
							displayEvent += '<button class="btn-addtowishlist btn btn-secondary btn-sm" value="' + allevent_qdt.evt_id + '"><i class="far fa-heart fa-lg"></i></button>';
							displayEvent += '</div>';
							displayEvent += '</div>';


							displayEvent += '</div>';
							displayEvent += '</div>';
							displayEvent += '</div>';
						}

					});

					if (displayEvent !== "") {
						$('.loadEvents').html('').append(displayEvent);
					} else {
						$('.loadEvents').html('').append('<div class="alert bg-info text-white font-size-xl w-100 text-center">No Events Available</div>');
					}

					$('.btn-addtowishlist').click(function (event) {
						event.preventDefault();
						var evt_id = $(this).val();
						var postdata = {
							action: "saveWishlist",
							wish_object: evt_id,
							wish_type: 2,
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

					$('.event-card').click(function (event) {
						event.preventDefault();
						var evt_id_str = $(this).prop('id');
						var evt_id_arr = evt_id_str.split('-');
						window.location.href = 'event-info.php?evt_id=' + evt_id_arr[1];
					});

				}, "json");
			}

			function makeFilter(country, state, city, filter_by) {
				console.log(filter_by);
				var displayEvent = "";
				$.post('bkp/controllers/eventController.php', {action: 'frontAllEvent'}, function (alleventarr) {

					$.each(alleventarr, function (allevent_index, allevent_qdt) {
						if (filter_by !== undefined || filter_by !== null) {
							if (parseInt(filter_by) == 1) {
								//by country
								if (parseInt(allevent_qdt.evt_country) == country) {
									if (parseInt(allevent_qdt.evt_type) == 0) {
										displayEvent += '<div class="col-xl-12 col-lg-12 col-12 mb-2">';
										displayEvent += '<div class="card card-horizontal box-shadow card-hover classifiedAd-card">';
										displayEvent += '<span class="event-card" id="IMGDIV-' + allevent_qdt.evt_id + '">';
										if (allevent_qdt.evt_img === "#") {
											displayEvent += '<img class="card-img-top" src="assets/img/noimage.png">';
										} else {
											displayEvent += '<img class="card-img-top" src="asset_imageuploader/eventcoverphoto/' + allevent_qdt.evt_id + '/medium/' + allevent_qdt.evt_img + '">';
										}
										displayEvent += '</span>';
										displayEvent += '<div class="card-body font-size-sm">';
										displayEvent += '<div class="row">';
										displayEvent += '<div class="col-xl-10 col-12">';
										displayEvent += '<span class="event-card" id="INFODIV-' + allevent_qdt.evt_id + '">';
										displayEvent += '<h4 class="card-title">' + allevent_qdt.evt_name + '</h4>';
										displayEvent += '<p class="card-text font-size-sm"><h5>' + allevent_qdt.evt_subheadline + '</h5>';
										displayEvent += '<strong>Location</strong> ' + allevent_qdt.evt_state_name + ', ' + allevent_qdt.evt_city_name + '<br>';
										displayEvent += '<strong>Date/Time</strong> ' + allevent_qdt.evt_date + ' ' + allevent_qdt.evt_time + '<br>';
										displayEvent += '</p>';
										displayEvent += '</span>';
										displayEvent += '</div>';

										displayEvent += '<div class="col-xl-2 col-12 text-right">';
										displayEvent += '<button class="btn-addtowishlist btn btn-translucent-light btn-sm" value="' + allevent_qdt.evt_id + '"><i class="far fa-heart fa-lg"></i></button>';
										displayEvent += '</div>';
										displayEvent += '</div>';


										displayEvent += '</div>';
										displayEvent += '</div>';
										displayEvent += '</div>';
									}
								}
							} else if (parseInt(filter_by) == 2) {
								//state
								if (parseInt(allevent_qdt.evt_state) == state) {
									if (parseInt(allevent_qdt.evt_type) == 0) {
										displayEvent += '<div class="col-xl-12 col-lg-12 col-12 mb-2">';
										displayEvent += '<div class="card card-horizontal box-shadow card-hover classifiedAd-card">';
										displayEvent += '<span class="event-card" id="IMGDIV-' + allevent_qdt.evt_id + '">';
										if (allevent_qdt.evt_img === "#") {
											displayEvent += '<img class="card-img-top" src="assets/img/noimage.png">';
										} else {
											displayEvent += '<img class="card-img-top" src="asset_imageuploader/eventcoverphoto/' + allevent_qdt.evt_id + '/medium/' + allevent_qdt.evt_img + '">';
										}
										displayEvent += '</span>';
										displayEvent += '<div class="card-body font-size-sm">';
										displayEvent += '<div class="row">';
										displayEvent += '<div class="col-xl-10 col-12">';
										displayEvent += '<span class="event-card" id="INFODIV-' + allevent_qdt.evt_id + '">';
										displayEvent += '<h4 class="card-title">' + allevent_qdt.evt_name + '</h4>';
										displayEvent += '<p class="card-text font-size-sm"><h5>' + allevent_qdt.evt_subheadline + '</h5>';
										displayEvent += '<strong>Location</strong> ' + allevent_qdt.evt_state_name + ', ' + allevent_qdt.evt_city_name + '<br>';
										displayEvent += '<strong>Date/Time</strong> ' + allevent_qdt.evt_date + ' ' + allevent_qdt.evt_time + '<br>';
										displayEvent += '</p>';
										displayEvent += '</span>';
										displayEvent += '</div>';

										displayEvent += '<div class="col-xl-2 col-12 text-right">';
										displayEvent += '<button class="btn-addtowishlist btn btn-translucent-light btn-sm" value="' + allevent_qdt.evt_id + '"><i class="far fa-heart fa-lg"></i></button>';
										displayEvent += '</div>';
										displayEvent += '</div>';


										displayEvent += '</div>';
										displayEvent += '</div>';
										displayEvent += '</div>';
									}
								}
							} else if (parseInt(filter_by) == 3) {
								//city
								if (parseInt(allevent_qdt.evt_city) == city) {
									if (parseInt(allevent_qdt.evt_type) == 0) {
										displayEvent += '<div class="col-xl-12 col-lg-12 col-12 mb-2">';
										displayEvent += '<div class="card card-horizontal box-shadow card-hover classifiedAd-card">';
										displayEvent += '<span class="event-card" id="IMGDIV-' + allevent_qdt.evt_id + '">';
										if (allevent_qdt.evt_img === "#") {
											displayEvent += '<img class="card-img-top" src="assets/img/noimage.png">';
										} else {
											displayEvent += '<img class="card-img-top" src="asset_imageuploader/eventcoverphoto/' + allevent_qdt.evt_id + '/medium/' + allevent_qdt.evt_img + '">';
										}
										displayEvent += '</span>';
										displayEvent += '<div class="card-body font-size-sm">';
										displayEvent += '<div class="row">';
										displayEvent += '<div class="col-xl-10 col-12">';
										displayEvent += '<span class="event-card" id="INFODIV-' + allevent_qdt.evt_id + '">';
										displayEvent += '<h4 class="card-title">' + allevent_qdt.evt_name + '</h4>';
										displayEvent += '<p class="card-text font-size-sm"><h5>' + allevent_qdt.evt_subheadline + '</h5>';
										displayEvent += '<strong>Location</strong> ' + allevent_qdt.evt_state_name + ', ' + allevent_qdt.evt_city_name + '<br>';
										displayEvent += '<strong>Date/Time</strong> ' + allevent_qdt.evt_date + ' ' + allevent_qdt.evt_time + '<br>';
										displayEvent += '</p>';
										displayEvent += '</span>';
										displayEvent += '</div>';

										displayEvent += '<div class="col-xl-2 col-12 text-right">';
										displayEvent += '<button class="btn-addtowishlist btn btn-translucent-light btn-sm" value="' + allevent_qdt.evt_id + '"><i class="far fa-heart fa-lg"></i></button>';
										displayEvent += '</div>';
										displayEvent += '</div>';


										displayEvent += '</div>';
										displayEvent += '</div>';
										displayEvent += '</div>';
									}
								}
							}
						}


					});

					if (displayEvent !== "") {
						$('.loadEvents').html('').append(displayEvent);
					} else {
						$('.loadEvents').html('').append('<div class="alert bg-info text-white font-size-xl w-100 text-center">No Events Available</div>');
					}

					$('.btn-addtowishlist').click(function (event) {
						event.preventDefault();
						var evt_id = $(this).val();
						var postdata = {
							action: "saveWishlist",
							wish_object: evt_id,
							wish_type: 2,
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

					$('.event-card').click(function (event) {
						event.preventDefault();
						var evt_id_str = $(this).prop('id');
						var evt_id_arr = evt_id_str.split('-');
						window.location.href = 'event-info.php?evt_id=' + evt_id_arr[1];
					});

				}, "json");
			}

			$(document).ready(function () {
				$('select').chosen({width: "100%"});
				loadEvents();

				cmbRelateCombo('26', '2', '.cmbCountry', '238', function () {
					var country = $('.cmbCountry').val();
					cmbRelateSubCombo('27', country, '.cmbState', false, function () {
						var state = $('.cmbState').val();
						cmbRelateSubCombo('30', state, '.cmbCity');
					});
				});

				$('.cmbCountry').change(function () {
					var country = $(this).val();
					cmbRelateSubCombo('27', country, '.cmbState', false, function () {
						var state = $('.cmbState').val();
						cmbRelateSubCombo('30', state, '.cmbCity', false, function () {
							var city = $('.cmbCity').val();
						});
						makeFilter(country, state, city, 1)
					});
				});

				$('.cmbState').change(function () {
					var country = $('.cmbCountry').val();
					var state = $(this).val();
					cmbRelateSubCombo('30', state, '.cmbCity', false, function () {
						var city = $('.cmbCity').val();
						makeFilter(country, state, city, 2)
					});
				});

				$('.cmbCity').change(function () {
					var country = $('.cmbCountry').val();
					var state = $('.cmbState').val();
					var city = $(this).val();
					makeFilter(country, state, city, 3)
				});

				$('.btn-makeRefresh').click(function () {
					loadEvents();
				});
			});
        </script>		
	</body>
</html>