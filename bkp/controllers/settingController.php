<?php

include '../models/system.php';

$ctrl = new System();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "getAllSystemInfo") {
		$ctrl->getAllSystemInfo();
	} 
	else if ($_POST['action'] == "updateFrontEndPage") {
		$ctrl->setSys_name($_POST['sys_name']);
		$ctrl->setSys_address($_POST['sys_address']);
		$ctrl->setSys_map_embed($_POST['sys_map_embed']);
		$ctrl->setSys_fb_link($_POST['sys_fb_link']);
		$ctrl->setSys_twitter_link($_POST['sys_twitter_link']);
		$ctrl->setSys_youtube_link($_POST['sys_youtube_link']);
		$ctrl->setSys_google_plus_link($_POST['sys_google_plus_link']);
		$ctrl->setSys_instagram_link($_POST['sys_instagram_link']);
		$ctrl->setSys_email($_POST['sys_email']);
		$ctrl->setSys_slider_text1($_POST['sys_slider_text1']);
		$ctrl->setSys_slider_text2($_POST['sys_slider_text2']);
		$ctrl->setSys_welcome_msg($_POST['sys_welcome_msg']);
		$ctrl->setSys_mobile($_POST['sys_mobile']);
		$ctrl->setSys_logo_type($_POST['sys_logo_type']);
		$ctrl->updateFrontEndPage();
	} 
	else if ($_POST['action'] == "updateFrontEndPageCommissionRate") {
		$ctrl->setSys_account_executive_com_rate($_POST['sys_account_executive_com_rate']);
		$ctrl->updateFrontEndPageCommissionRate();
	} 
	else if ($_POST['action'] == "updateSendGridAPIKEY") {		
		$ctrl->updateSendGridAPIKEY($_POST['sys_sendgrid_apikey']);
	} 
	else if ($_POST['action'] == 'loadwebsitelogo') {
		$directory = "../../asset_imageuploader/websitelogo/images/";
		$files = scandir($directory);
		$files = array_diff($files, ['.', '..', 'thumbnail']);
		$files = array_values(array_filter($files));
		echo $files[0];
	} 
	else if ($_POST['action'] == 'LoadHomePageUnderIMG') {
		$directory = "../../asset_imageuploader/homepageunderimage/images/";
		$files = scandir($directory);
		$files = array_diff($files, ['.', '..', 'thumbnail']);
		$files = array_values(array_filter($files));
		if ($files[0] == NULL) {
			echo "#";
		} else {
			echo $files[0];
		}
	} 
	else if ($_POST['action'] == 'LoadSubPageUnderIMG') {
		$directory = "../../asset_imageuploader/subpageunderimage/images/";
		$files = scandir($directory);
		$files = array_diff($files, ['.', '..', 'thumbnail']);
		$files = array_values(array_filter($files));
		if ($files[0] == NULL) {
			echo "#";
		} else {
			echo $files[0];
		}
	} 
	else if ($_POST['action'] == 'loadslider') {
		$directory = "../../asset_imageuploader/slider/images/";
		$files = scandir($directory);
		$files = array_diff($files, ['.', '..', 'thumbnail']);
		$files = array_values(array_filter($files));
		echo json_encode($files);
	} else if ($_POST['action'] == 'sendContactUsPageEmail') {
		$ctrl->setSys_email($_POST['sys_email']);
		$ctrl->sendContactUsPageEmail($_POST['em_name'], $_POST['em_email'], $_POST['em_msg']);
	} else if ($_POST['action'] == 'checkLoginStatus') {
		if (isset($_SESSION['usr_id']) && !empty($_SESSION['usr_id'])) {
			echo json_encode(array("logged" => 1, "usr_cat_id" => $_SESSION['usr_cat_id']));
		} else {
			echo json_encode(array("logged" => 0, "usr_cat_id" => $_SESSION['usr_cat_id']));
		}
	}
	else if ($_POST['action'] == "updatePaymentPage") {
		$ctrl->setSys_paypal_business_email($_POST['sys_paypal_business_email']);
		$ctrl->setSys_paypal_app_id($_POST['sys_paypal_app_id']);
		$ctrl->setSys_paypal_signature($_POST['sys_paypal_signature']);
		$ctrl->setSys_paypal_app_password($_POST['sys_paypal_app_password']);
		$ctrl->setSys_paypal_app_username($_POST['sys_paypal_app_username']);
		$ctrl->setSys_stripe_api_key($_POST['sys_stripe_api_key']);
		$ctrl->updatePaymentPage();
	} 
}