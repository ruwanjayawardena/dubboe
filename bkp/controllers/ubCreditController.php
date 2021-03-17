<?php

include '../models/credit.php';

$ctrl = new Credit();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "tblCredit") {
		$ctrl->tblCredit();
	} else if ($_POST['action'] == "getCreditByID") {
		$ctrl->setCr_id($_POST['cr_id']);
		$ctrl->getCreditByID();
	} else if ($_POST['action'] == "editCredit") {
		$ctrl->setCr_id($_POST['cr_id']);
		$ctrl->setCr_amount($_POST['cr_amount']);
		$ctrl->setCr_membership($_POST['cr_membership']);
		$ctrl->setCr_month_subcription_discount_rt($_POST['cr_month_subcription_discount_rt']);
		$ctrl->setCr_annual_discount_discount_rt($_POST['cr_annual_discount_discount_rt']);
		$ctrl->setCr_membership_renew_days($_POST['cr_membership_renew_days']);
		$ctrl->editCredit();
	}
	else if ($_POST['action'] == 'saveRelateCombo') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->setRlcmb_name($_POST['rlcmb_name']);
		$ctrl->saveRelateCombo();
	}
	else if ($_POST['action'] == 'membershipInfoByLoggedUser') {
		$ctrl->membershipInfoByLoggedUser();
	}
}
