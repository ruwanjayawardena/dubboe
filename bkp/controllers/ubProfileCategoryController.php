<?php
include '../models/profileCategory.php';

$ctrl = new ProfileCategory();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "addProfileCategory") {
		$ctrl->setPfc_name($_POST['pfc_name']);
		$ctrl->addProfileCategory();
	} else if ($_POST['action'] == "editProfileCategory") {
		$ctrl->setPfc_name($_POST['pfc_name']);
		$ctrl->setPfc_id($_POST['pfc_id']);
		$ctrl->editProfileCategory();
	} else if ($_POST['action'] == "removeProfileCategory") {
		$ctrl->setPfc_id($_POST['pfc_id']);
		$ctrl->removeProfileCategory();
	} else if ($_POST['action'] == "allProfileCategory") {
		$ctrl->allProfileCategory();
	} else if ($_POST['action'] == "cmbProfileCategory") {
		$ctrl->cmbProfileCategory();
	} else if ($_POST['action'] == "tblProfileCategory") {
		$ctrl->tblProfileCategory();
	} else if ($_POST['action'] == "getProfileCategoryByID") {
		$ctrl->setPfc_id($_POST['pfc_id']);
		$ctrl->getProfileCategoryByID();
	} else if ($_POST['action'] == "getProfileCategoryIDByName") {
		$ctrl->setPfc_name($_POST['pfc_name']);
		$ctrl->getProfileCategoryIDByName();
	}
}
