<?php
include '../models/profileGrading.php';

$ctrl = new ProfileGrading();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "addProfileGrading") {
		$ctrl->setGrd_name($_POST['grd_name']);
		$ctrl->addProfileGrading();
	} else if ($_POST['action'] == "editProfileGrading") {
		$ctrl->setGrd_name($_POST['grd_name']);
		$ctrl->setGrd_id($_POST['grd_id']);
		$ctrl->editProfileGrading();
	} else if ($_POST['action'] == "removeProfileGrading") {
		$ctrl->setGrd_id($_POST['grd_id']);
		$ctrl->removeProfileGrading();
	} else if ($_POST['action'] == "allProfileGrading") {
		$ctrl->allProfileGrading();
	} else if ($_POST['action'] == "cmbProfileGrading") {
		$ctrl->cmbProfileGrading();
	} else if ($_POST['action'] == "tblProfileGrading") {
		$ctrl->tblProfileGrading();
	} else if ($_POST['action'] == "getProfileGradingByID") {
		$ctrl->setGrd_id($_POST['grd_id']);
		$ctrl->getProfileGradingByID();
	} else if ($_POST['action'] == "getProfileGradingIDByName") {
		$ctrl->setGrd_name($_POST['grd_name']);
		$ctrl->getProfileGradingIDByName();
	}
}
