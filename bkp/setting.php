<?php include './access_control/pages_auth.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>
        <style>
			iframe {
				border: none;
				width: 100%;
				min-height: 300px;
				overflow: scroll;
			}
        </style>
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>        

        <!--body content-->
        <section class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-cogs"></i> Front-End Settings  &nbsp;&nbsp;<a class="btn btn-primary d-print-none" onclick="navigateDashboard()"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back</a>&nbsp;<button class="btn btn-outline-warning" id="btn_update"><i class="fas fa-edit fa-lg"></i> Update Info</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-12 text-uppercase">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-logo-tab" data-toggle="pill" href="#v-pills-logo" role="tab" aria-controls="v-pills-logo" aria-selected="true">Logo</a>
                                    <a class="nav-link" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false">Contact Information</a>
                                    <a class="nav-link" id="v-pills-smedia-tab" data-toggle="pill" href="#v-pills-smedia" role="tab" aria-controls="v-pills-smedia" aria-selected="false">Social Media</a>
                                    <a class="nav-link" id="v-pills-map-tab" data-toggle="pill" href="#v-pills-map" role="tab" aria-controls="v-pills-map" aria-selected="false">Google Map</a> 
									<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-slider" role="tab" aria-controls="v-pills-slider" aria-selected="false">Home Page Slider & Heading</a>
									<a class="nav-link" id="v-pills-sec2-tab" data-toggle="pill" href="#v-pills-sec2" role="tab" aria-controls="v-pills-sec2" aria-selected="false" hidden>Home Page Welcome Message</a>
									<a class="nav-link" id="v-pills-uploadhomepage-tab" data-toggle="pill" href="#v-pills-uploadhomepage" role="tab" aria-controls="v-pills-uploadhomepage" aria-selected="false" hidden>Home Page Header Under Image</a>
									<a class="nav-link" id="v-pills-uploadsubpage-tab" data-toggle="pill" href="#v-pills-uploadsubpage" role="tab" aria-controls="v-pills-uploadsubpage" aria-selected="false" hidden>Sub Pages Header Under Image Have</a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-logo" role="tabpanel" aria-labelledby="v-pills-logo-tab">
                                        <h4 class="mb-4"><i class="fas fa-clipboard-list"></i> Logo</h4>
										<div class="form-group">
                                            <label for="sys_name">Choose Logo Type</label>
                                            <div class="form-check">
												<input class="form-check-input sys_logo_type" type="radio" name="sys_logo_type" value="1" checked>
												<label class="form-check-label">
													Written Text
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input sys_logo_type" type="radio" name="sys_logo_type" value="2">
												<label class="form-check-label">
													Uploaded Image
												</label>
											</div>
                                        </div>
										<div class="form-group textlogodiv">
                                            <label for="sys_name">Logo Text</label>
                                            <input type="text" class="form-control" id="sys_name" placeholder="Logo Text Here">
                                        </div>
                                        <iframe  id="iframe_websitelogo" scrolling="no" hidden></iframe>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                                        <h4 class="mb-4"><i class="fas fa-clipboard-list"></i> Contact Information</h4>
                                        <div class="form-group">
                                            <label for="sys_address">Address</label>
                                            <textarea class="summernote-small form-control" id="sys_address" placeholder="Website Address"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="sys_mobile">Phone</label>
                                            <input type="text" class="form-control" id="sys_mobile" placeholder="Contact Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="sys_email">Email</label>
                                            <input type="email" class="form-control" id="sys_email" placeholder="Contact Email">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-smedia" role="tabpanel" aria-labelledby="v-pills-smedia-tab">
                                        <h4 class="mb-4"><i class="fas fa-clipboard-list"></i> Social Media</h4>
                                        <div class="form-group">
                                            <label for="sys_fb_link">Facebook</label>
                                            <input type="text" class="form-control" id="sys_fb_link" placeholder="Facebook Profile Link">
                                        </div>
                                        <div class="form-group">
                                            <label for="sys_twitter_link">Twitter</label>
                                            <input type="text" class="form-control" id="sys_twitter_link" placeholder="Twitter Profile Link">
                                        </div>
                                        <div class="form-group">
                                            <label for="sys_google_plus_link">Google+</label>
                                            <input type="text" class="form-control" id="sys_google_plus_link" placeholder="Google Plus Profile Link">
                                        </div>
                                        <div class="form-group">
                                            <label for="sys_instagram_link">Instagram</label>
                                            <input type="text" class="form-control" id="sys_instagram_link" placeholder="Instagram Profile Link">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-map" role="tabpanel" aria-labelledby="v-pills-map-tab">
                                        <h4 class="mb-4"><i class="fas fa-clipboard-list"></i> Google Map</h4>
                                        <div class="form-group">
                                            <label for="sys_map_embed">Google Map Embed Code</label>
                                            <textarea class="form-control" id="sys_map_embed"></textarea>
                                        </div>
                                    </div>                                


                                    <div class="tab-pane fade" id="v-pills-slider" role="tabpanel" aria-labelledby="v-pills-slider-tab">
                                        <h4 class="mb-4"><i class="fas fa-clipboard-list"></i> Home Page Slider</h4>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sys_slider_text1">Slider Heading</label>
                                                    <input type="text" class="form-control" id="sys_slider_text1" placeholder="Big Text Heading">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sys_slider_text2">Slider Content</label>
													<textarea class="summernote form-control" id="sys_slider_text2">
														
													</textarea>

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <iframe  id="iframe_slider"></iframe>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-uploadhomepage" role="tabpanel" aria-labelledby="v-pills-uploadhomepage-tab">
                                        <h4 class="mb-4"><i class="fas fa-clipboard-list"></i> Home Page Header Under Image Upload</h4>
                                        <div class="form-row justify-content-center">                                           
                                            <div class="col-lg-12 col-12">
                                                <iframe  id="iframe_uploadhomepage"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-uploadsubpage" role="tabpanel" aria-labelledby="v-pills-uploadsubpage-tab">
                                        <h4 class="mb-4"><i class="fas fa-clipboard-list"></i> Sub Pages Header Under Image Upload</h4>
                                        <div class="form-row justify-content-center">                                           
                                            <div class="col-lg-12 col-12">
                                                <iframe  id="iframe_uploadsubpage"></iframe>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-sec2" role="tabpanel" aria-labelledby="v-pills-sec2-tab">
                                        <h4 class="mb-4"><i class="fas fa-clipboard-list"></i> Home Page Welcome Message</h4>
                                        <div class="form-group">
                                            <label for="sys_welcome_msg">Content</label>
                                            <input type="text" class="form-control" id="sys_welcome_msg" placeholder="Center Text">
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
	<?php
	include './includes/end-block.php';
	include './includes/comboboxJS.php';
	include './includes/commonJS.php';
	?>  
    <script>

		function loadSystemInfo() {
			$.post('controllers/settingController.php', {action: 'getAllSystemInfo'}, function (e) {
				$.each(e, function (index, qdt) {
					$('#sys_name').val(qdt.sys_name);
					$('#sys_map_embed').val(qdt.sys_map_embed);
					$('#sys_fb_link').val(qdt.sys_fb_link);
					$('#sys_twitter_link').val(qdt.sys_twitter_link);
					$('#sys_youtube_link').val(qdt.sys_youtube_link);
					$('#sys_google_plus_link').val(qdt.sys_google_plus_link);
					$('#sys_instagram_link').val(qdt.sys_instagram_link);
					$('#sys_email').val(qdt.sys_email);
					$('#sys_slider_text1').val(qdt.sys_slider_text1);
					$('#sys_slider_text2').summernote('reset');
					$('#sys_slider_text2').summernote('code', qdt.sys_slider_text2);
					$('#sys_welcome_msg').val(qdt.sys_welcome_msg);
					$('#sys_mobile').val(qdt.sys_mobile);
					$('#sys_address').summernote('reset');
					$('#sys_address').summernote('code', qdt.sys_address);
					if (parseInt(qdt.sys_logo_type) == 1) {
						$('.sys_logo_type[value=1]').prop('checked', true);
						$('.textlogodiv').prop('hidden', false);
					} else if (parseInt(qdt.sys_logo_type) == 2) {
						$('.sys_logo_type[value=2]').prop('checked', true);
						$('.textlogodiv').prop('hidden', true);
						$('#iframe_websitelogo').prop('hidden', false);
					}

				});
			}, "json");
		}

		function updateFrontEndPage() {
			var sys_name = $('#sys_name').val();
			var sys_map_embed = $('#sys_map_embed').val();
			var sys_fb_link = $('#sys_fb_link').val();
			var sys_twitter_link = $('#sys_twitter_link').val();
			var sys_youtube_link = $('#sys_youtube_link').val();
			var sys_google_plus_link = $('#sys_google_plus_link').val();
			var sys_instagram_link = $('#sys_instagram_link').val();
			var sys_email = $('#sys_email').val();
			var sys_slider_text1 = $('#sys_slider_text1').val();
			var sys_slider_text2 = $('#sys_slider_text2').val();
			var sys_welcome_msg = $('#sys_welcome_msg').val();
			var sys_mobile = $('#sys_mobile').val();
			var sys_address = $('#sys_address').summernote('code');
			var sys_logo_type = $('.sys_logo_type:checked').val();

			var postdata = {
				action: "updateFrontEndPage",
				sys_name: sys_name,
				sys_map_embed: sys_map_embed,
				sys_fb_link: sys_fb_link,
				sys_twitter_link: sys_twitter_link,
				sys_youtube_link: sys_youtube_link,
				sys_google_plus_link: sys_google_plus_link,
				sys_instagram_link: sys_instagram_link,
				sys_email: sys_email,
				sys_slider_text1: sys_slider_text1,
				sys_slider_text2: sys_slider_text2,
				sys_welcome_msg: sys_welcome_msg,
				sys_mobile: sys_mobile,
				sys_address: sys_address,
				sys_logo_type: sys_logo_type
			}
			$.post('controllers/settingController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					loadSystemInfo();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}


		$(document).ready(function () {
			loadSystemInfo();
			$("#iframe_websitelogo").attr("src", "websitelogoupload.php");
			$("#iframe_slider").attr("src", "sliderupload.php");
			$("#iframe_uploadhomepage").attr("src", "homepageunderimage.php");
			$("#iframe_uploadsubpage").attr("src", "subpageunderimage.php");
			$('.summernote').summernote({
				height: 300
			});

			$('.sys_logo_type').click(function () {
				var sys_logo_type = $(this).val();
				if (parseInt(sys_logo_type) == 1) {
					$('.textlogodiv').prop('hidden', false);
					$('#iframe_websitelogo').prop('hidden', true);
				} else if (parseInt(sys_logo_type) == 2) {
					$('.textlogodiv').prop('hidden', true);
					$('#iframe_websitelogo').prop('hidden', false);
				}
			})
			$('.summernote-small').summernote();


			$('#btn_update').click(function () {
				updateFrontEndPage();
			})
		});
    </script>
</body>
</html>