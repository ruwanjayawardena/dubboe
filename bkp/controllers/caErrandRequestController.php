<?php

/**
 * @author Ruwan Jayawardena
 */
include '../models/caErrandRequest.php';

$ctrl = new CaErrandRequest();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "addErrandRequest") {
		$ctrl->setRq_errand_category($_POST['rq_errand_category']);
		$ctrl->setRq_name($_POST['rq_name']);
		$ctrl->setRq_phone($_POST['rq_phone']);
		$ctrl->setRq_req_info_give_opt($_POST['rq_req_info_give_opt']);
		$ctrl->setRq_store_preference_opt($_POST['rq_store_preference_opt']);
		$ctrl->setRq_store_preference_name($_POST['rq_store_preference_name']);
		$ctrl->setRq_info_notify($_POST['rq_info_notify']);
		$ctrl->setRq_location($_POST['rq_location']);
		$ctrl->setRq_lat($_POST['rq_lat']);
		$ctrl->setRq_lng($_POST['rq_lng']);
		$ctrl->setRq_map_status($_POST['rq_map_status']);
		$ctrl->setRq_how_pay_runner($_POST['rq_how_pay_runner']);
		$ctrl->setRq_accept_toc($_POST['rq_accept_toc']);
		$ctrl->addErrandRequest($_FILES['fileToUpload']);
	} else if ($_POST['action'] == "saveDraftErrandRequest") {
		$ctrl->setRq_errand_category($_POST['rq_errand_category']);
		$ctrl->setRq_name($_POST['rq_name']);
		$ctrl->setRq_phone($_POST['rq_phone']);
		$ctrl->setRq_req_info_give_opt($_POST['rq_req_info_give_opt']);
		$ctrl->setRq_store_preference_opt($_POST['rq_store_preference_opt']);
		$ctrl->setRq_store_preference_name($_POST['rq_store_preference_name']);
		$ctrl->setRq_info_notify($_POST['rq_info_notify']);
		$ctrl->setRq_location($_POST['rq_location']);
		$ctrl->setRq_lat($_POST['rq_lat']);
		$ctrl->setRq_lng($_POST['rq_lng']);
		$ctrl->setRq_map_status($_POST['rq_map_status']);
		$ctrl->setRq_how_pay_runner($_POST['rq_how_pay_runner']);
		$ctrl->setRq_accept_toc($_POST['rq_accept_toc']);
		$ctrl->saveDraftErrandRequest($_FILES['fileToUpload']);
	} else if ($_POST['action'] == "editErrandRequest") {
		$ctrl->setRq_name($_POST['rq_name']);
		$ctrl->setRq_phone($_POST['rq_phone']);
		$ctrl->setRq_req_info_give_opt($_POST['rq_req_info_give_opt']);
		$ctrl->setRq_store_preference_opt($_POST['rq_store_preference_opt']);
		$ctrl->setRq_store_preference_name($_POST['rq_store_preference_name']);
		$ctrl->setRq_info_notify($_POST['rq_info_notify']);
		$ctrl->setRq_location($_POST['rq_location']);
		$ctrl->setRq_lat($_POST['rq_lat']);
		$ctrl->setRq_lng($_POST['rq_lng']);
		$ctrl->setRq_map_status($_POST['rq_map_status']);
		$ctrl->setRq_how_pay_runner($_POST['rq_how_pay_runner']);
		$ctrl->setRq_accept_toc($_POST['rq_accept_toc']);
		$ctrl->setRq_id($_POST['rq_id']);
		$ctrl->editErrandRequest();
	} else if ($_POST['action'] == "removeErrandRequest") {
		$ctrl->setRq_id($_POST['rq_id']);
		$ctrl->removeErrandRequest();
	} 
	else if ($_POST['action'] == "tblErrandRequestByUser") {
		$ctrl->tblErrandRequestByUser();
	} 
	else if ($_POST['action'] == "tblErrandRequestByUserLastOne") {
		$ctrl->tblErrandRequestByUserLastOne();
	} 
	else if ($_POST['action'] == "tblErrandRequest") {
		$ctrl->tblErrandRequest();
	} else if ($_POST['action'] == "getErrandRequestByID") {
		$ctrl->setRq_id($_POST['rq_id']);
		$ctrl->getErrandRequestByID();
	} 
	else if ($_POST['action'] == "AllErrandRequest") {
		$ctrl->AllErrandRequest();	
	} 
	else if ($_POST['action'] == "clientErrandRequest") {
		$ctrl->clientErrandRequest();	
	} 
	else if ($_POST['action'] == "publishErrandRequest") {
		$ctrl->setRq_id($_POST['rq_id']);
		$ctrl->publishErrandRequest();
	} 
	else if ($_POST['action'] == "markCompletedErrandRequest") {
		$ctrl->setRq_id($_POST['rq_id']);
		$ctrl->markCompletedErrandRequest();
	} 
	else if ($_POST['action'] == "markRequestAsPaid") {
		$ctrl->setRq_id($_POST['rq_id']);
		$ctrl->markRequestAsPaid();
	} 
//	else if ($_POST['action'] == "getErrandRequestProcessStatus") {
//		$ctrl->setRq_id($_POST['rq_id']);
//		$ctrl->setOfr_id($_POST['ofr_id']);
//		$ctrl->getErrandRequestProcessStatus();
//	}
}
