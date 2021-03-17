<?php

include '../models/user.php';

$ctrl = new User();
if (array_key_exists("action", $_POST)) {

	if ($_POST['action'] == 'signupUsers') {
		$ctrl->setUsr_username($_POST['usr_username']);
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->setUsr_pass($_POST['usr_pass']);
		$ctrl->setUsr_email($_POST['usr_email']);
		$ctrl->setUsr_cat_id($_POST['usr_cat_id']);
		$ctrl->setUsr_first_name($_POST['usr_first_name']);
		$ctrl->setUsr_last_name($_POST['usr_last_name']);
		$ctrl->setUsr_ref_have($_POST['usr_ref_have']);
		$ctrl->setUsr_ref_id($_POST['usr_ref_id']);
		$ctrl->frontSignup($_POST['usr_signup_method']);
	} else if ($_POST['action'] == "tblReceivedScorePointByUser") {
		$ctrl->tblReceivedScorePointByUser();
	} else if ($_POST['action'] == "tblLoadAllUsersByLocation") {
		$ctrl->tblLoadAllUsersByLocation($_POST['evtsh_event']);
	} else if ($_POST['action'] == "tblLoadAllInvitedUserByEvent") {
		$ctrl->tblLoadAllInvitedUserByEvent($_POST['evt_id']);
	}
	else if ($_POST['action'] == "checkMembershipIsActive") {
		$ctrl->checkMembershipIsActive();
	} 
	else if ($_POST['action'] == "temporyMShipUpgradeForMonth") {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->temporyMShipUpgradeForMonth();
	} 
	else if ($_POST['action'] == "getLoggedUserStatus") {
		$ctrl->getLoggedUserStatus();
	} else if ($_POST['action'] == "tblReferenceUsersByUser") {
		$ctrl->tblReferenceUsersByUser();
	} else if ($_POST['action'] == "tblAdminPayoutNeedUsers") {
		$ctrl->tblAdminPayoutNeedUsers();
	} else if ($_POST['action'] == "tblPayoutPendingBadgeGroup") {
		$ctrl->tblPayoutPendingBadgeGroup();
	} else if ($_POST['action'] == "tblAllUsersNotGrants") {
		$ctrl->tblAllUsersNotGrants();
	} else if ($_POST['action'] == 'profileUpdate') {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->setPro_country($_POST['pro_country']);
		$ctrl->setPro_state($_POST['pro_state']);
		$ctrl->setPro_gender($_POST['pro_gender']);
		$ctrl->setPro_fname($_POST['pro_fname']);
		$ctrl->setPro_lname($_POST['pro_lname']);
		$ctrl->setPro_city($_POST['pro_city']);
		$ctrl->setPro_age($_POST['pro_age']);
		$ctrl->setPro_dob($_POST['pro_dob']);
		$ctrl->setPro_paypal_email($_POST['pro_paypal_email']);
		$ctrl->setPro_address($_POST['pro_address']);
		$ctrl->setPro_zip($_POST['pro_zip']);
		$ctrl->setPro_taxpayid($_POST['pro_taxpayid']);
		$ctrl->profileUpdate();
	} else if ($_POST['action'] == "tblAllPointsEarnedUsers") {
		$ctrl->tblAllPointsEarnedUsers();
	} else if ($_POST['action'] == "tblAllPointsEarnedExecutives") {
		$ctrl->tblAllPointsEarnedExecutives();
	} else if ($_POST['action'] == "tblAllUseresEarnedPoints") {
		$ctrl->tblAllUseresEarnedPoints();
	}
	//NEED
	else if ($_POST['action'] == 'profileUpdateFront') {
		$ctrl->setUsr_first_name($_POST['usr_first_name']);
		$ctrl->setUsr_last_name($_POST['usr_last_name']);
		$ctrl->setUsr_last_name($_POST['usr_last_name']);
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->setPro_business_name($_POST['pro_business_name']);
		$ctrl->setPro_typeof_productservice($_POST['pro_typeof_productservice']);
		$ctrl->setPro_country($_POST['pro_country']);
		$ctrl->setPro_state($_POST['pro_state']);
		$ctrl->setPro_city($_POST['pro_city']);
		$ctrl->setPro_profile_category($_POST['pro_profile_category']);
		$ctrl->setPro_grading($_POST['pro_grading']);
		$ctrl->setPro_address($_POST['pro_address']);
		$ctrl->setPro_business_address($_POST['pro_business_address']);
		$ctrl->setPro_bizdesc_short($_POST['pro_bizdesc_short']);
		$ctrl->setPro_bizdesc_long($_POST['pro_bizdesc_long']);
		$ctrl->setPro_website_url($_POST['pro_website_url']);
		$ctrl->setUsr_confirm_code($_POST['usr_confirm_code']);
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->setPro_fb_link($_POST['pro_fb_link']);
		$ctrl->setPro_twitter_link($_POST['pro_twitter_link']);
		$ctrl->setPro_instagram_link($_POST['pro_instagram_link']);
		$ctrl->setPro_pinterest_link($_POST['pro_pinterest_link']);
		$ctrl->setPro_youtube_link($_POST['pro_youtube_link']);
		$ctrl->profileUpdateFront();
	}
	//END NEED
	else if ($_POST['action'] == 'userProfileActivation') {
		$ctrl->setUsr_first_name($_POST['usr_first_name']);
		$ctrl->setUsr_last_name($_POST['usr_last_name']);
		$ctrl->setUsr_last_name($_POST['usr_last_name']);
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->setPro_business_name($_POST['pro_business_name']);
		$ctrl->setPro_typeof_productservice($_POST['pro_typeof_productservice']);
		$ctrl->setPro_country($_POST['pro_country']);
		$ctrl->setPro_state($_POST['pro_state']);
		$ctrl->setPro_city($_POST['pro_city']);
		$ctrl->setPro_profile_category($_POST['pro_profile_category']);
		$ctrl->setPro_grading($_POST['pro_grading']);
		$ctrl->setPro_address($_POST['pro_address']);
		$ctrl->setPro_business_address($_POST['pro_business_address']);
		$ctrl->setPro_bizdesc_short($_POST['pro_bizdesc_short']);
		$ctrl->setPro_bizdesc_long($_POST['pro_bizdesc_long']);
		$ctrl->setPro_website_url($_POST['pro_website_url']);
		$ctrl->setUsr_confirm_code($_POST['usr_confirm_code']);
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->userProfileActivation();
	} else if ($_POST['action'] == 'activateUserAccount') {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->setUsr_confirm_code($_POST['usr_confirm_code']);
		$ctrl->activateUserAccount();
	} else if ($_POST['action'] == 'userIdentityVerifySubmitInfo') {
		$ctrl->userIdentityVerifySubmitInfo($_POST['usr_verified_indicator']);
	} else if ($_POST['action'] == 'userIdentityVerifyApprove') {
		$ctrl->userIdentityVerifyApprove($_POST['usr_id']);
	} else if ($_POST['action'] == 'tblIdentityVerificationReqUser') {
		$ctrl->tblIdentityVerificationReqUser();
	}
	//NEED
	else if ($_POST['action'] == "logout") {
		$ctrl->logout();
	}
	//END NEED
	//NEED
	else if ($_POST['action'] == "navigateDashboard") {
		echo $_SESSION['usr_cat_id'];
	}
	//END NEED
	else if ($_POST['action'] == "setcookieagreement") {
		$ctrl->setcookieagreement();
	} else if ($_POST['action'] == "checkcookieagreement") {
		$ctrl->checkcookieagreement();
	} else if ($_POST['action'] == "cmbUserCategory") {
		$ctrl->cmbUserCategory();
	} else if ($_POST['action'] == "cmbUserByCategory") {
		$ctrl->setUsr_cat_id($_POST['usr_cat_id']);
		$ctrl->cmbUserByCategory();
	} else if ($_POST['action'] == "userTable") {
		$ctrl->userTable();
	}
	//NEEED
	else if ($_POST['action'] == "userTableByCatID") {
		$ctrl->setUsr_cat_id($_POST['usr_cat_id']);
		$ctrl->userTableByCatID();
	}
	else if ($_POST['action'] == "AllDubboeMembersReport") {
		$ctrl->AllDubboeMembersReport();
	}
	//END NEED
	//NEED
	else if ($_POST['action'] == "getUserByID") {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->getUserByID();
	}
	//END NEED
	//NEED
	else if ($_POST['action'] == "getUserInfoBySessionID") {
		$ctrl->getUserInfoBySessionID();
	}
	//END NEED
	else if ($_POST['action'] == "userPointDisplay") {
		$ctrl->userPointDisplay();
	} else if ($_POST['action'] == "getUserProfileInfoByID") {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->getUserProfileInfoByID();
	}
	//NEED
	else if ($_POST['action'] == "getUserProfileInfo") {
		$ctrl->getUserProfileInfo();
	}
	//END NEED
	else if ($_POST['action'] == "deleteUserByID") {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->deleteUserByID();
	}
	//NEED
	else if ($_POST['action'] == "passwordChangeByRecovery") {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->setUsr_pass($_POST['usr_pass']);
		$ctrl->passwordChangeByRecovery();
	}
	//END NEED
	else if ($_POST['action'] == "profilePasswordChange") {
		$ctrl->setUsr_pass($_POST['usr_pass']);
		$ctrl->profilePasswordChange();
	}
	//NEEED
	else if ($_POST['action'] == "addUser") {
		$ctrl->setUsr_pass($_POST['usr_pass']);
		$ctrl->setUsr_first_name($_POST['usr_first_name']);
		$ctrl->setUsr_last_name($_POST['usr_last_name']);
		$ctrl->setUsr_email($_POST['usr_email']);
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->setUsr_cat_id($_POST['usr_cat_id']);
		$ctrl->setUsr_username($_POST['usr_username']);
		$ctrl->addUser();
	} else if ($_POST['action'] == "addUserWithRefActivated") {
		$ctrl->setUsr_pass($_POST['usr_pass']);
		$ctrl->setUsr_first_name($_POST['usr_first_name']);
		$ctrl->setUsr_last_name($_POST['usr_last_name']);
		$ctrl->setUsr_email($_POST['usr_email']);
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->setUsr_cat_id($_POST['usr_cat_id']);
		$ctrl->setUsr_username($_POST['usr_username']);
		$ctrl->addUserWithRefActivated($_POST['usr_pass']);
	}
	//END NEED
	else if ($_POST['action'] == "addUserModel") {
		$ctrl->setUsr_pass($_POST['usr_pass']);
		$ctrl->setUsr_name($_POST['usr_name']);
		$ctrl->setUsr_email($_POST['usr_email']);
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->setUsr_cat_id($_POST['usr_cat_id']);
		$ctrl->setUsr_username($_POST['usr_username']);
		$ctrl->addUserModel();
	}
	//NEED
	else if ($_POST['action'] == 'updateUser') {
		$ctrl->setUsr_first_name($_POST['usr_first_name']);
		$ctrl->setUsr_last_name($_POST['usr_last_name']);
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->setUsr_username($_POST['usr_username']);
		$ctrl->setUsr_email($_POST['usr_email']);
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->updateUser();
	}
	//END NEED
	else if ($_POST['action'] == "autopassowrdreset") {
		$ctrl->setUsr_email($_POST['usr_email']);
		$ctrl->autopassowrdreset();
	}

	//NEED
	else if ($_POST['action'] == 'login') {
		$ctrl->setUsr_pass($_POST['usr_pass']);
		$ctrl->setUsr_username($_POST['usr_username']);
		$ctrl->login();
	}
	//END NEED
	//NEED
	else if ($_POST['action'] == 'facebookLogin') {
		$ctrl->setUsr_email($_POST['usr_email']);
		$ctrl->facebookLogin();
	}
	//END NEED
	else if ($_POST['action'] == "resetPassword") {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->setUsr_pass($_POST['usr_pass']);
		$ctrl->setUsr_confirm_code($_POST['usr_autoresetpass']);
		$ctrl->resetPassword();
	} else if ($_POST['action'] == "autosignin") {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->autosignin();
	} else if ($_POST['action'] == "checkUserActivation") {
		$ctrl->setUsr_id($_POST['usr_id']);
		$ctrl->checkUserActivation();
	} else if ($_POST['action'] == 'userProfileImageByID') {
		$directory = "../../asset_imageuploader/userprofileimages/" . $_POST['usr_id'] . "/";
		$files = scandir($directory);
		$files = array_diff($files, ['.', '..', 'thumbnail']);
		$files = array_values(array_filter($files));
		echo $files[0];
	} else if ($_POST['action'] == 'getUsrProfileAvatar') {
		$directory = "../../asset_imageuploader/userprofileimages/" . $_SESSION['usr_id'] . "/";
		$files = scandir($directory);
		$files = array_diff($files, ['.', '..', 'thumbnail','medium']);
		$files = array_values(array_filter($files));
		if ($files[0] == NULL) {
			$img = "#";
		} else {
			$img = $files[0];
		}
		echo json_encode(array("usr_id" => $_SESSION['usr_id'], "img" => $img));
	} else if ($_POST['action'] == "phoneVerifiedChecker") {
		$ctrl->phoneVerifiedChecker();
	} else if ($_POST['action'] == "viewUserProfileVerifyID") {
		$ctrl->viewUserProfileVerifyID();
	} else if ($_POST['action'] == "phoneVerificationCodeSend") {
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->phoneVerificationCodeSend();
	} else if ($_POST['action'] == "verifyPhoneCode") {
		$ctrl->setUsr_phone($_POST['usr_phone']);
		$ctrl->verifyPhoneCode();
	}
}

