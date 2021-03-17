<?php
include '../models/AdMainCategory.php';

$ctrl = new AdMainCategory();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "addAdMainCategory") {
		$ctrl->setAdmc_name($_POST['admc_name']);
		$ctrl->addAdMainCategory();
	} else if ($_POST['action'] == "editAdMainCategory") {
		$ctrl->setAdmc_name($_POST['admc_name']);
		$ctrl->setAdmc_id($_POST['admc_id']);
		$ctrl->editAdMainCategory();
	} else if ($_POST['action'] == "removeAdMainCategory") {
		$ctrl->setAdmc_id($_POST['admc_id']);
		$ctrl->removeAdMainCategory();
	} else if ($_POST['action'] == "allAdMainCategory") {
		$ctrl->allAdMainCategory();
	} else if ($_POST['action'] == "cmbAdMainCategory") {
		$ctrl->cmbAdMainCategory();
	} else if ($_POST['action'] == "tblAdMainCategory") {
		$ctrl->tblAdMainCategory();
	} else if ($_POST['action'] == "getAdMainCategoryByID") {
		$ctrl->setAdmc_id($_POST['admc_id']);
		$ctrl->getAdMainCategoryByID();
	} else if ($_POST['action'] == "getAdMainCategoryIDByName") {
		$ctrl->setAdmc_name($_POST['admc_name']);
		$ctrl->getAdMainCategoryIDByName();
	}
}
