<?php

/**
 * @author Ruwan Jayawardena
 */
include '../models/page.php';

$ctrl = new Page();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == 'cmbPagefilter1') {
		$ctrl->cmbPagefilter1();
	} else if ($_POST['action'] == "cmbPagefilter2") {
		$ctrl->setFlh_id($_POST['flh_id']);
		$ctrl->cmbPagefilter2();
	} else if ($_POST['action'] == "cmbPageStyle") {
		$ctrl->cmbPageStyle();
	} else if ($_POST['action'] == "addPageSection") {
		$ctrl->setPgs_link_name($_POST['pgs_link_name']);
		$ctrl->setPgs_heading($_POST['pgs_heading']);
		$ctrl->setPgs_content($_POST['pgs_content']);
		$ctrl->setPgs_filter_one($_POST['pgs_filter_one']);
		$ctrl->setPgs_filter_two($_POST['pgs_filter_two']);
		$ctrl->setPgs_style($_POST['pgs_style']);
		$ctrl->addPageSection();
	} else if ($_POST['action'] == "editPageSection") {
		$ctrl->setPgs_id($_POST['pgs_id']);
		$ctrl->setPgs_link_name($_POST['pgs_link_name']);
		$ctrl->setPgs_heading($_POST['pgs_heading']);
		$ctrl->setPgs_content($_POST['pgs_content']);
		$ctrl->setPgs_filter_one($_POST['pgs_filter_one']);
		$ctrl->setPgs_filter_two($_POST['pgs_filter_two']);
		$ctrl->setPgs_style($_POST['pgs_style']);
		$ctrl->editPageSection();
	} else if ($_POST['action'] == "removePageSection") {
		$ctrl->setPgs_id($_POST['pgs_id']);
		$ctrl->removePageSection();
	} else if ($_POST['action'] == "allPageSection") {
		$ctrl->allPageSection();
	} else if ($_POST['action'] == "getPageSectionByID") {
		$ctrl->setPgs_id($_POST['pgs_id']);
		$ctrl->getPageSectionByID();	
	} else if ($_POST['action'] == "getPageSectionByURLName") {
		$ctrl->setPgs_link_name($_POST['pgs_link_name']);
		$ctrl->getPageSectionByURLName();
	}
}
