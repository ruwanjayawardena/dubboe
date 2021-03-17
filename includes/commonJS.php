<script>
	function frontNavbarMsgNotification() {
		$.post('bkp/controllers/messageController.php', {action: 'getNotReadMsgCount'}, function (count) {
			$('.notify-msg').html('').append(count);
		}, "json");
	}

	function sendMessageFRONTEND(msg_receiver, msg_object_id, msg_forwhat) {
		var msgModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
				'<div class="modal-dialog modal-lg" role="document">' +
				'<div class="modal-content">' +
				'<div class="modal-header">' +
				'<h5 class="modal-title" id="exampleModalLabel"><i class="far fa-envelope"></i> Send Message</h5>' +
				'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
				'<span aria-hidden="true">&times;</span>' +
				'</button>' +
				'</div>' +
				'<div class="modal-body">' +
				//here is model body start                        
				'<div class="row">' +
				'<div class="col-lg-12">' +
				'<form id="form_modal" novalidate>' +
				'<div class="form-group">' +
				'<label for="msg_body">Message</label>' +
				'<textarea type="text" class="form-control" id="msg_body" rows="5" placeholder="Message Here" required></textarea>' +
				'<div class="valid-feedback">' +
				'<i class="fas fa-lg fa-check-circle"></i> Looks good!' +
				'</div>' +
				'<div class="invalid-feedback">' +
				'<i class="fas fa-lg fa-exclamation-circle"></i> Please enter messsage' +
				'</div>' +
				'</div>' +
				'</form>' +
				'</div>' +
				'</div>' +
				//here is model body end
				'</div>' +
				//start model footer
				'<div class="modal-footer">' +
				'<button type="button" class="btn btn-primary" id="btn_send"><i class="fas fa-envelope"></i> Send</button>' +
				'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
				'</div>' +
				//end modal footer
				'</div>' +
				'</div>' +
				'</div>';
		var msgModal = $(msgModalStr);
		msgModal.modal('show');

		const form = msgModal.find('#form_modal');
		form.submit(false);
		form.removeClass('was-validated');

//							msgModal.on('shown.bs.modal', function () {								
//							
//							});
//							
		msgModal.find('#btn_send').click(function (event) {
			var msg_body = msgModal.find('#msg_body').val();
			var msg_sender = 'LOGUSER';
			var postData = {
				msg_body: msg_body,
				msg_forwhat: msg_forwhat,
				msg_object_id: msg_object_id,
				msg_sender: msg_sender,
				msg_receiver: msg_receiver,
				action: "sendMessage"
			}
			form.addClass('was-validated');
			if (form[0].checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
			} else {
				$.post('bkp/controllers/messageController.php', postData, function (e) {
					if (parseInt(e.msgType) == 1) {
						swal("MESSAGE!", e.msg, "success");
						form.removeClass('was-validated');
						msgModal.modal('hide');
					} else {
						swal("MESSAGE!", e.msg, "warning");
					}
				}, "json");
			}
		});
	}
	function notificationPanel() {
		var msgDiv = "";
		var msgINVT = "";
		$.post('bkp/controllers/eventController.php', {action: 'loadLoggedUserEventInvitations'}, function (notifyEvent) {
			if (notifyEvent !== undefined || notifyEvent.length !== 0 || notifyEvent !== null) {
				$.each(notifyEvent, function (event_index, event_qdt) {
					if (parseInt(event_qdt.evtsh_read_status) === 0) {
						msgINVT += '<div class="alert alert-dark alert-dismissible fade show" role="alert">';
						msgINVT += '<i class="fas fa-gift font-size-xl mt-n1 mr-3"></i>';
						msgINVT += '<span class="font-weight-medium">Event Invitation! </span>You have received event invitation for ' + event_qdt.evt_name + '. Read More Info and Accpet <a class="btn btn-sm btn-outline-light btn-viewEvent ml-3" href="my-event-invitation.php"><i class="far fa-eye"></i> Read</a>';
						msgINVT += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
						msgINVT += '<span aria-hidden="true">&times;</span>';
						msgINVT += '</button>';
						msgINVT += '</div>';
					}
				});
				$('.msgDivEvntInvitation').html('').append(msgINVT);
			}
		}, "json");
		$.post('bkp/controllers/ubGrantController.php', {action: 'loadLoggedUserGrantInvitations'}, function (notifyGrant) {
			if (notifyGrant !== undefined || notifyGrant.length !== 0 || notifyGrant !== null) {
				//0-invited,1-userapplied,2-approve,3-reject,4-win
				$.each(notifyGrant, function (grant_index, grant_qdt) {

					if (grant_qdt.grinfo_notify_read_status == 0) {
						if (grant_qdt.grant_status == 1) {
							if (parseInt(grant_qdt.grinfo_received_status) == 0) {
								msgDiv += '<div class="alert alert-dark alert-dismissible fade show" role="alert">';
								msgDiv += '<i class="fas fa-trophy font-size-xl mt-n1 mr-3"></i>';
								msgDiv += '<span class="font-weight-medium">Grant Invitation! </span>You have received invitation for ' + grant_qdt.grant_title + '. Read More Info and Apply <a class="btn btn-sm btn-outline-light btn-viewGrant ml-3" href="my-grant-invitation.php"><i class="far fa-eye"></i> Read</a>';
								msgDiv += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
								msgDiv += '<span aria-hidden="true">&times;</span>';
								msgDiv += '</button>';
								msgDiv += '</div>';
							} else if (parseInt(grant_qdt.grinfo_received_status) == 2) {

							} else if (parseInt(grant_qdt.grinfo_received_status) == 4) {

							}
						}
					}
				});
				$('.msgDiv').html('').append(msgDiv);
			}
		}, "json");
	}

	function shoppingCartNotification() {
		var postdata = {
			action: "shoppingCartNotification"
		}
		$.post('bkp/controllers/shoppingcartController.php', postdata, function (e) {
			if (parseInt(e.msgType) == 1) {
				$('.primaryCartAcessBtn').prop('hidden', false);
				$('.primaryCartItmCount').html('').append(e.cartobjects);
			} else if (parseInt(e.msgType) == 2) {
				$('.primaryCartAcessBtn').prop('hidden', true);
			}
		}, "json");
		displayShoppingCart();
	}
	function shoppingCartClearAll() {
		var postdata = {
			action: "shoppingCartEmptyAll"
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
	}

	function displayShoppingCart() {
		var totalAmount = 0;
		var cartItemsDiv = "";
		$.post('bkp/controllers/shoppingcartController.php', {action: 'AllEventCategoryItemsCartCreate'}, function (AllItem) {
			$.post('bkp/controllers/shoppingcartController.php', {action: 'cartSessionArray'}, function (cartArray) {
				$.each(cartArray, function (indexcart, qdtcart) {
					$.each(AllItem, function (indexall, qdtall) {
						if (parseInt(qdtcart.eventItem) == parseInt(qdtall.evtem_id)) {
							totalAmount += (parseFloat(qdtall.evtem_price) * parseFloat(qdtcart.Qty));
							cartItemsDiv += '<div class="media align-items-center mb-3"><a class="d-block" href="event-item.php?id=' + qdtall.evtem_id + '">';
							if (qdtall.evt_img === "#") {
								cartItemsDiv += '<img class="rounded" width="60" src="assets/img/noimage.png" alt="empty-image"/>';
							} else {
								cartItemsDiv += '<img class="rounded" width="60" src="asset_imageuploader/eventitemprofilephoto/' + qdtall.evtem_id + '/medium/' + qdtall.evt_img + '" alt="' + qdtall.evtem_name + '"/>';
							}
							cartItemsDiv += '</a>';
							cartItemsDiv += '<div class="media-body pl-2 ml-1">';
							cartItemsDiv += '<div class="d-flex align-items-center justify-content-between">';
							cartItemsDiv += '<div class="mr-3">';
							cartItemsDiv += '<h4 class="nav-heading font-size-md mb-1"><a class="font-weight-medium" href="shop-single.html">' + qdtall.evtem_name + '</a></h4>';
							cartItemsDiv += '<div class="d-flex align-items-center font-size-sm"><span class="mr-2">$' + qdtall.evtem_price + '</span><span class="mr-2">x</span>';
							cartItemsDiv += '<input class="form-control form-control-sm px-2 itemQtyDiv" type="number" style="max-width: 3.5rem;" prev_amt="' + qdtcart.Qty + '" cart-array-index="' + indexcart + '" value="' + qdtcart.Qty + '" min="1" max="' + qdtall.evtem_qty + '" pattern="^[1-9]\d*$">';
							cartItemsDiv += '</div>';
							cartItemsDiv += '</div>';
							cartItemsDiv += '<div class="pl-3 border-left"><a class="d-block text-white text-decoration-none font-size-xl removeCartItem" href="#" data-toggle="tooltip" title="Remove" id="RM-' + indexcart + '"><i class="fe-x-circle"></i></a></div>';
							cartItemsDiv += '</div>';
							cartItemsDiv += '</div>';
							cartItemsDiv += '</div>';
						}
					});
				});

				$('.cartItemsDiv').html('').append(cartItemsDiv);
				$('.cartItemsTotal').html('').append('$' + Number(totalAmount).toFixed(2));

				$('.btnclearallcart').click(function (event) {
					event.preventDefault();
					shoppingCartClearAll();
				});



				$('.btn-payshoppingcart').click(function (event) {
					event.preventDefault();
					swal({
						title: "Checkout!",
						text: "Do you want to checkout your cart ?",
						type: "info",
						showCancelButton: true,
						showConfirmButton: true,
						confirmButtonClass: "btn-primary",
						cancelButtonClass: "btn-light",
						closeOnConfirm: false
					}, function () {
						swal({
							title: "Dubboe Checkout!",
							text: "Please wait for processing your request...",
							imageUrl: 'assets/img/gif/1.gif',
							showConfirmButton: false
						});
						$.post('bkp/controllers/shoppingcartController.php', {action: 'checkout'}, function (chkot) {
							if (chkot === "#") {
								swal("Dubboe Checkout!", "Sorry! Processing your order failed,Try again later..", "warning");
							} else {
//								shoppingCartClearAll();
								window.location.href = chkot;
							}
						});
					});
				});

				$('.itemQtyDiv').change(function (event) {
					var qty = $(this).val();
					var cartarrayindex = $(this).attr('cart-array-index');
					var pre_qty = $(this).attr('prev_amt');
					var qty_max = $(this).attr('max');
					var pattern = /^[1-9]\d*$/;
					var flag = pattern.test(qty);
					if (!flag) {
						$(this).val(pre_qty);
						Swal.fire({
							position: 'top-left',
							html: '<h5><i class="fas fa-shopping-cart"></i> Sorry! Invalid Qty',
							showConfirmButton: false,
							showCancelButton: false,
							timer: 1500
						});
					} else {
						if (parseInt(qty_max) >= parseInt(qty)) {
							//correct amt
							if (parseInt(qty) != parseInt(pre_qty)) {
								$(this).attr('prev_amt', qty);
								$.post('bkp/controllers/shoppingcartController.php', {action: 'updateCartItemQty', cartarrayindex: cartarrayindex, new_qty: qty}, function (qtyArr) {
									Swal.fire({
										position: 'top-left',
										html: qtyArr.msg,
										showConfirmButton: false,
										showCancelButton: false,
										timer: 1500
									});
									shoppingCartNotification();
								}, "json");
							}
						} else {
							$(this).val(pre_qty);
							Swal.fire({
								position: 'top-left',
								html: '<h5><i class="fas fa-shopping-cart"></i> Sorry! Max ' + qty_max + ' Qty available in this item',
								showConfirmButton: false,
								showCancelButton: false,
								timer: 1500,
							});
						}
					}
				});

				$('.removeCartItem').click(function (event) {
					event.preventDefault();
					var indexStr = $(this).prop('id');
					var indexStrAr = indexStr.split('-');
					var cartarrayindex = indexStrAr[1];
					$.post('bkp/controllers/shoppingcartController.php', {action: 'removeCartItem', cartarrayindex: cartarrayindex}, function (rmAr) {
						shoppingCartNotification();
						Swal.fire({
							position: 'top-left',
							html: rmAr.msg,
							showConfirmButton: false,
							showCancelButton: false,
							timer: 1500,
						});
					}, "json");
				});
			}, "json");
		}, "json");
	}

	function checkMembershipIsActive(redirect = 0, clearFire) {
		$.post('bkp/controllers/userController.php', {'action': 'checkMembershipIsActive'}, function (e) {
			if (parseInt(e) != 1) {
				if (parseInt(redirect) == 1) {
					swal({
						title: "Access Denited!",
						text: 'Sorry!. Please activate your membership plan for access and get benifits of your dubboe account", "warning',
						timer: 3500,
						showConfirmButton: false
					});
					setTimeout(function () {
						window.history.back(-1);
					}, 3600);
				} else {
					swal("Access Denited!", "Sorry!. Please activate your membership plan for access and get benifits of your dubboe account", "warning");
				}
			} else {
				if (clearFire !== undefined) {
					if (typeof clearFire === 'function') {
						clearFire();
					}
				}
			}
		}, "json");
	}

//	window.fbAsyncInit = function () {
//		FB.init({
//			appId: '221700855705123',
//			status: true,
//			xfbml: true,
//			cookie: true, // Enable cookies to allow the server to access the session.
//			version: 'v6.0'
//		});
//		FB.getLoginStatus(function (response) {
//			if (response.status === 'connected') {
//				console.log('we are connected');
//			} else if (response.status === 'not_authorized') {
//				console.log('we are not logged in.');
//			} else {
//				console.log('you are not logged in to Facebook');
//			}
//		});
//	};
//	(function (d, s, id) {
//		var js, fjs = d.getElementsByTagName(s)[0];
//		if (d.getElementById(id)) {
//			return;
//		}
//		js = d.createElement(s);
//		js.id = id;
//		js.src = "//connect.facebook.net/en_US/sdk.js";
//		fjs.parentNode.insertBefore(js, fjs);
//	}(document, 'script', 'facebook-jssdk'));
////			function login() {
////				FB.login(function (response) {
////					if (response.status === 'connected') {
////						document.getElementById('status').innerHTML = 'we are connected';
////					} else if (response.status === 'not_authorized') {
////						document.getElementById('status').innerHTML = 'we are not logged in.'
////					} else {
////						document.getElementById('status').innerHTML = 'you are not logged in to Facebook';
////					}
////
////				}, {scope: 'public_profile,email'});
////			}
////			;
//	// get user basic info
//
////			function getInfo() {
////				FB.api('/me?fields=email,first_name,last_name,name,id', function (response) {
////					//document.getElementById('status').innerHTML = response.name;
////					console.log(response.email);
////					console.log(response.name);
////				});
////			}
////
//	function fblogout() {
//		FB.logout(function (response) {
//			//no things to do
//		});
//	}
</script>
<script type="text/javascript">
	function reloadJS(src) {
		src = $('script[src$="' + src + '"]').attr("src");
		$('script[src$="' + src + '"]').remove();
		$('<script/>').attr('src', src).appendTo('head');
	}
	function chosenRefresh() {
		$('select').trigger("chosen:updated");
	}

	function madeCheckBoxString(chkClassName, stringStoreID) {
		var ar = [];
		var es;
		var v;
		if ($(this).is(':checked')) {
			es = $(chkClassName + ':checked');
			es.each(function (index) {
				ar.push($(this).val());
			});
		} else {
			es = $(chkClassName + ':checked');
			es.each(function (index) {
				ar.push($(this).val());
			});
		}
		v = ar.join(',');
		$(stringStoreID).val(v);
	}



	//NEED
	function navigateDashboard() {
		var postData = {
			action: "navigateDashboard"
		}
		$.post('bkp/controllers/userController.php', postData, function (e) {
			if (parseInt(e) == 2) {
				//admin
				window.location.href = 'bkp/dashboard-admin.php';
			} else if (parseInt(e) == 3) {
				//user category
				window.location.href = 'dashboard.php';
			} else if (parseInt(e) == 4) {
				//account excutive
				window.location.href = 'dashboard-executive.php';
			} else if (parseInt(e) == 1) {
				//super admin
				window.location.href = 'bkp/dashboard.php';
			}
		});
	}
	//END NEED

	//NEED
	function WebsiteCommonSettings() {
		$.post('bkp/controllers/settingController.php', {action: 'getAllSystemInfo'}, function (e) {
			$.each(e, function (index, qdt) {
				$('.sys_name').html('').append(qdt.sys_name);
				$('.sys_slider_text2').html('').append(qdt.sys_slider_text2);
				if (parseInt(qdt.sys_logo_type) == 1) {
					$('.logoDisplyModule').html('').append('<span class="logoText">' + qdt.sys_name + '</span>')
				} else if (parseInt(qdt.sys_logo_type) == 2) {
					$.post('bkp/controllers/settingController.php', {action: 'loadwebsitelogo'}, function (logo) {
						$('.logoDisplyModule').html('').append('<img class="website_logo d-inline-block img-logo" src="asset_imageuploader/websitelogo/images/' + logo + '">');
					});
				}
			});
		}, "json");
		$.post('bkp/controllers/userController.php', {action: 'getUsrProfileAvatar'}, function (e) {
			if (e.img === "#") {
				$('.usr-profile-avatar').prop('src', 'assets/img/main-sm.jpg');
			} else {
				$('.usr-profile-avatar').prop('src', 'asset_imageuploader/userprofileimages/' + e.usr_id + '/thumbnail/' + e.img);

			}
		}, "json");
		// $.post('bkp/controllers/settingController.php', {action: 'LoadSubPageUnderIMG'}, function (homeUnImg) {
		// 	var currentpage = document.location.href.match(/[^\/]+$/)[0];
		// 	if (currentpage !== 'index.php') {
		// 		if (homeUnImg === '#') {
		// 			$('.jarallax-img').css('background-image', 'url(assets/img/noimage.png)')
		// 		} else {
		// 			$('.jarallax-img').css('background-image', 'url(asset_imageuploader/subpageunderimage/images/' + homeUnImg + ')')

		// 		}
		// 	}
		// });
	}
	//END NEED

	//NEED
	function getLoggedUserStatus() {
		$.post('bkp/controllers/userController.php', {action: 'getLoggedUserStatus'}, function (e) {
			if (parseInt(e.usr_status) == 0) {
				//not activated
				$('.sysMessage').prop('hidden', false);
				$('.sysMessage').html('').append('<h5 class="p-2 text-white"><strong class="text-uppercase">Alert ! </strong>&nbsp;&nbsp; Please check your email (​' + e.usr_email + ') and activate your account in order to access your account</h5>');
			} else {
				$('.sysMessage').prop('hidden', true);
			}
		}, "json");
	}
	//END NEED

	//NEED
	function loadFrontEndPageSections() {
		var sections = "";
		var navbar = "";
		var footer_support = "";
		var footer_community = "";
		var footer_endline = "";
		$.post('bkp/controllers/pageController.php', {action: 'allPageSection'}, function (e) {
			$.each(e, function (index, qdt) {
				//home page sections
				if (parseInt(qdt.pgs_filter_one) == 4) {
					if (parseInt(qdt.pgs_style) == 2) {
						//style 1  -bg-offblack
						sections += '<section class="' + qdt.sty_class + ' py-6 mt-1 pt-3 pb-4">';
						sections += '<div class="container">';
						sections += '<div class="col-xl-12 col-lg-12 col-12">';
						sections += '<div class="row justify-content-center align-items-center">' + qdt.pgs_content + '</div>';
						sections += '</div>';
						sections += '</div>';
						sections += '</section>	';
					}
					if (parseInt(qdt.pgs_style) == 3) {
						//style 2 - bg-gradient
						sections += '<section class="' + qdt.sty_class + ' py-6 mt-1">';
						sections += '<div class="container">';
						sections += '<div class="row">';
						sections += '<div class="col-xl-12 col-lg-12 col-12 text-center">';
						sections += qdt.pgs_content
						sections += '</div>';
						sections += '</div></div>';
						sections += '</section>	';
					}
					if (parseInt(qdt.pgs_style) == 1) {
						//pre define - no style
						sections += '<section class="' + qdt.sty_class + ' container py-6 mt-1">';
						sections += '<h2 class="text-center mb-5">' + qdt.pgs_heading + '</h2>';
						sections += '<div class="row align-items-center">';
						sections += '<div class="col-xl-12 col-lg-12 col-12">';
						sections += qdt.pgs_content
						sections += '</div>';
						sections += '</div>';
						sections += '</section>	';
					}
					if (parseInt(qdt.pgs_style) == 4) {
						//user define - no style
						sections += '<section class="' + qdt.sty_class + ' container py-6 mt-1">';
						sections += '<div class="col-xl-12 col-lg-12 col-12">';
						sections += '<div class="row">' + qdt.pgs_content + '</div>';
						sections += '</div>';
						sections += '</section>	';
					}
				}
			});
			//header nav bar
			navbar += '<li class="nav-item">';
			navbar += '<a class="nav-link hvr-rectangle-out" href="index.php">Home</a>';
			navbar += '</li>';
			$.each(e, function (index, qdt) {
				if (parseInt(qdt.pgs_filter_one) == 1) {
					navbar += '<li class="nav-item">';
					navbar += '<a class="nav-link hvr-rectangle-out" href="page.php?pg=' + qdt.pgs_link_name + '">' + qdt.pgs_heading + '</a>';
					navbar += '</li>';
				}
			});
//			navbar += '<li class="nav-item">';
//			navbar += '<a class="nav-link" href="contact.php">Contact Us</a>';
//			navbar += '</li>';
			//footer section
			$.each(e, function (index, qdt) {
				if (parseInt(qdt.pgs_filter_one) == 2) {
					if (parseInt(qdt.pgs_filter_two) == 7) {
						//Community						
						footer_support += '<li><a class="cs-widget-link" href="page.php?pg=' + qdt.pgs_link_name + '">' + qdt.pgs_heading + '</a></li>';
					}
					if (parseInt(qdt.pgs_filter_two) == 2) {
						//Support
						footer_community += '<li><a class="cs-widget-link" href="page.php?pg=' + qdt.pgs_link_name + '">' + qdt.pgs_heading + '</a></li>';
					}
					if (parseInt(qdt.pgs_filter_two) == 8) {
						//footer End Line
						footer_endline += '<li class="list-inline-item"><a class="nav-link-style nav-link-light" href="page.php?pg=' + qdt.pgs_link_name + '">' + qdt.pgs_heading + '</a></li>';
					}
				}
			});

			footer_community += '<li><a class="cs-widget-link" href="blog.php">Blog</a></li>';
			navbar += '<li class="nav-item">';
			navbar += '<a class="nav-link hvr-rectangle-out" href="blog.php">Blog</a>';
			navbar += '</li>';
			navbar += '<li class="nav-item">';
			navbar += '<a class="nav-link hvr-rectangle-out" href="event.php">Events</a>';
			navbar += '</li>';
			$('.footer_support').html('').append(footer_support);
			$('.footer_community').html('').append(footer_community);
			$('.footer_endline').html('').append(footer_endline);
			$('.loadadwebsite').html('').append(navbar);
			$('.pageSections').html('').append(sections);
		}, "json");
	}

	function PopUpAllCategory() {
		var foldername = "admaincategory";
		var subcmb_foldername = "adsubcategory";
		$.post('bkp/controllers/subComboController.php', {action: 'getAllRelateCombo', mcmb_id: '94'}
		, function (maincmb) {
			if (maincmb !== undefined || maincmb.length !== 0 || maincmb !== null) {
				var mainCmbModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
						'<div class="modal-dialog modal-xl" role="document">' +
						'<div class="modal-content">' +
						'<div class="modal-header">' +
						'<h5 class="modal-title font-weight-light" id="exampleModalLabel">Choose the business categories what you are looking for</h5>' +
						'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
						'<span aria-hidden="true">&times;</span>' +
						'</button>' +
						'</div>' +
						'<div class="modal-body" style="background-image:url(assets/img/textures/popupbg.svg);min-height:400px"><div class="row justify-content-center">';

				$.each(maincmb, function (index, qdt) {
					mainCmbModalStr += '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mt-3">';
					mainCmbModalStr += '<div id="' + qdt.rlcmb_id + '" class="card card-flip btn-maincategory card-hover border-0 box-shadow shadow rounded-bottom card-flip-categories">';
					mainCmbModalStr += '<div class="card-flip-inner">';
					mainCmbModalStr += '<div class="card-flip-front">';
					if (qdt.rlcmb_img === "#") {
						mainCmbModalStr += '<img class="card-img-top" src="assets/img/noimage.png" alt="' + qdt.rlcmb_name + '">';
					} else {
						mainCmbModalStr += '<img class="card-img-top" src="asset_imageuploader/' + foldername + '/' + qdt.rlcmb_id + '/' + qdt.rlcmb_img + '" alt="' + qdt.rlcmb_name + '">';
					}
					mainCmbModalStr += '<div class="card-body text-center ">';
					mainCmbModalStr += '<h3 class="h5 mb-2">' + qdt.rlcmb_name + '</h3>';
					mainCmbModalStr += '</div>';
					mainCmbModalStr += '</div>'
					mainCmbModalStr += '<a class="card-flip-back" href="#">';
					mainCmbModalStr += '<div class="card-body-inner text-center align-content-center">';
					mainCmbModalStr += '<h3 class="h5 card-title mt-5 pt-5" id="' + qdt.rlcmb_id + '-maincatname">' + qdt.rlcmb_name + '</h3>';
					mainCmbModalStr += '</div>';
					mainCmbModalStr += '</a>';
					mainCmbModalStr += '</div>';
					mainCmbModalStr += '</div>';
					mainCmbModalStr += '</div>';
				});
				mainCmbModalStr += '</div>';
//here is model body end
				mainCmbModalStr += '</div>' +
						//start model footer
						'<div class="modal-footer">' +
						'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
						'</div>' +
						//end modal footer
						'</div>' +
						'</div>' +
						'</div>';
				var mainCmbModal = $(mainCmbModalStr);
				mainCmbModal.modal('show');


				mainCmbModal.find('.btn-maincategory').click(function (event) {
					event.preventDefault();
					mainCmbModal.hide();
					var maincatid = $(this).prop('id');
					var maincatname = $('#' + maincatid + '-maincatname').html();
					$.post('bkp/controllers/subComboController.php', {action: 'getAllSubCombo', scmb_relationship: 2, scmb_maincmb: '95', scmb_relatecmb: maincatid}, function (subcmb) {
						var subCmbModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
								'<div class="modal-dialog modal-xl" role="document">' +
								'<div class="modal-content">' +
								'<div class="modal-header">' +
								'<h5 class="modal-title" id="exampleModalLabel">Pick Location & Choose sub category</h5>' +
								'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
								'<span aria-hidden="true">&times;</span>' +
								'</button>' +
								'</div>' +
								'<div class="modal-body" style="background-image:url(assets/img/textures/popupbg.svg);min-height:400px">';
						subCmbModalStr += '<div class="row">';
						subCmbModalStr += '<div class="col-xl-3 col-lg-3 col-12">';
//								location
						subCmbModalStr += '<label>Location</label>';
						subCmbModalStr += '<div class="form-row"><div class="form-group col-lg-12 col-12">';
						subCmbModalStr += '<select class="col-12 form-control cmbState form-control-chosen" data-placeholder="Choose a State...">';
						subCmbModalStr += '<option disabled selected>Loading...</option>';
						subCmbModalStr += '</select>';
						subCmbModalStr += '</div></div>';
						subCmbModalStr += '<div class="form-row"><div class="form-group col-lg-12 col-12">';
						subCmbModalStr += '<select class="col-12 form-control cmbCity form-control-chosen mt-2" data-placeholder="Choose a city...">';
						subCmbModalStr += '<option disabled selected>Loading...</option>';
						subCmbModalStr += '</select>';
						subCmbModalStr += '</div></div>';
						subCmbModalStr += '<div class="form-row"><div class="form-group col-lg-12 col-12" hidden>';
						subCmbModalStr += '<select class="col-12 form-control cmbCountry form-control-chosen invisible" data-placeholder="Choose a Country..." hidden>'
						subCmbModalStr += '<option disabled selected>Loading...</option>';
						subCmbModalStr += '</select>';
						subCmbModalStr += '</div></div>';

						//end location
						subCmbModalStr += '</div>';
						subCmbModalStr += '<div class="col-xl-8 col-lg-8 col-12">';
						subCmbModalStr += '<div class="row">';
						$.each(subcmb, function (subcmb_index, subcmb_qdt) {
							subCmbModalStr += '<div class="col-xl-3 col-lg-4 col-md-6 col-12">';
							subCmbModalStr += '<a href="#" class="card card-hover border-0 box-shadow btn-subcategory" id="' + subcmb_qdt.scmb_id + '">';
							if (subcmb_qdt.scmb_img === "#") {
								subCmbModalStr += '<img src="assets/img/noimage.png" class="card-img-top" alt="' + subcmb_qdt.scmb_name + '">';
							} else {
								subCmbModalStr += '<img src="asset_imageuploader/' + subcmb_foldername + '/' + subcmb_qdt.scmb_id + '/' + subcmb_qdt.scmb_img + '" class="card-img-top" alt="' + subcmb_qdt.scmb_name + '">';
							}
							subCmbModalStr += '<div class="card-body text-center">';
							subCmbModalStr += '<h5 class="font-weight-light font-size-sm mb-2" id="' + subcmb_qdt.scmb_id + '-subcatname">' + subcmb_qdt.scmb_name + '</h5>';
							subCmbModalStr += '</div>';
							subCmbModalStr += '</a>';
							subCmbModalStr += '</div>';
						});
						subCmbModalStr += '</div>';
						subCmbModalStr += '</div>';
						subCmbModalStr += '</div>';
//here is model body end
						subCmbModalStr += '</div>' +
								//start model footer
								'<div class="modal-footer">' +
								'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
								'</div>' +
								//end modal footer
								'</div>' +
								'</div>' +
								'</div>';
						var subCmbModal = $(subCmbModalStr);
						subCmbModal.modal('show');

						subCmbModal.find('.cmbCountry').prop('hidden', true);
						subCmbModal.on('shown.bs.modal', function (e) {
							$('select').chosen({width: "100%"});

							cmbRelateCombo('26', '2', '.cmbCountry', '238', function () {
								var country = $('.cmbCountry').val();
								cmbRelateSubCombo('27', country, '.cmbState', false, function () {
									var state = $('.cmbState').val();
									cmbRelateSubCombo('30', state, '.cmbCity');
								});
							});

							$('.cmbState').change(function () {
								var state = $(this).val();
								cmbRelateSubCombo('30', state, '.cmbCity');
							});
						});

						subCmbModal.find('.btn-subcategory').click(function () {
							event.preventDefault();
							var ad_subcategory = $(this).prop('id');
							var subcatname = $('#' + ad_subcategory + '-subcatname').html();
							var ad_country = subCmbModal.find('.cmbCountry option:selected').text();
							var ad_state = subCmbModal.find('.cmbState option:selected').text();
							var ad_city = subCmbModal.find('.cmbCity option:selected').text();
							window.location.href = 'classified-info.php?mc=' + maincatname + '&sc=' + subcatname + '&co=' + ad_country + '&st=' + ad_state + '&ct=' + ad_city;
						});


					}, "json");
				});
			}
		}
		, "json");
	}
	//END NEED

	$(document).ready(function () {
		$('select').chosen({width: "100%"});
		WebsiteCommonSettings();
		loadFrontEndPageSections();
		shoppingCartNotification();
		displayShoppingCart();
		notificationPanel();
		frontNavbarMsgNotification();
		setInterval(function () {
			frontNavbarMsgNotification();
		}, 5000);
		cmbLoadHomeLocation();
		cmbLoadHomeCategory();

		$('.btn-popupallcategory').click(function (event) {
			event.preventDefault();
			PopUpAllCategory();
		});
		$('.btn-find').click(function (event) {
			event.preventDefault();
			var ad_city = $('.cmbLocations option:selected').val();
			var subcatname = $('.cmbCategories option:selected').val();
			var keyword = $('.search-keyword').val();
			var postData = {
				subcatname: subcatname,
				ad_city: ad_city,
				keyword: keyword,
				action: "generateFrontSearchValue"
			}
			$.post('bkp/controllers/advController.php', postData, function (e) {
				window.location.href = e;
			});
		});

		$('.logout').click(function () {
			Swal.fire({
				title: 'Sign Out!',
				text: "Are you sure want to sign out?",
				icon: 'info',
				showCancelButton: true,
				confirmButtonClass: "btn-info",
				confirmButtonText: 'Yes, Sign Out!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.post('bkp/controllers/userController.php', {action: 'logout'}, function (x) {
						if (parseInt(x.msgType) == 1) {
							if (x.logout_type === 'fb') {
								fblogout();
							}
							let timerInterval
							Swal.fire({
								title: 'Please Wait A Moment...',
								text: x.msg,
								timer: 1800,
								timerProgressBar: true,
								willOpen: () => {
									Swal.showLoading()
									timerInterval = setInterval(() => {
										const content = Swal.getContent()
										if (content) {
											const b = content.querySelector('b')
											if (b) {
												b.textContent = Swal.getTimerLeft()
											}
										}
									}, 100)
								},
								onClose: () => {
									clearInterval(timerInterval)
								}
							}).then((result) => {
								/* Read more about handling dismissals below */
								if (result.dismiss === Swal.DismissReason.timer) {
									window.location.href = "index.php";
								}
							});
						} else {
							swal("Alert !", x.msg, "warning");
							Swal.fire('Sign Out!', x.msg, 'warning');
						}
					}, "json");
				}
			});
		});
	});
</script>
