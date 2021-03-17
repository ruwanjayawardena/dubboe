<?php

/**
 * @author Ruwan Jayawardena
 */
include '../models/caErrandOffer.php';

$ctrl = new CaErrandOffer();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "addErrandOffer") {		
		$ctrl->setOfr_errand_request($_POST['ofr_errand_request']);
		$ctrl->setOfr_name($_POST['ofr_name']);
		$ctrl->setOfr_phone($_POST['ofr_phone']);
		$ctrl->setOfr_miles_radius($_POST['ofr_miles_radius']);
		$ctrl->setOfr_location($_POST['ofr_location']);
		$ctrl->setOfr_lat($_POST['ofr_lat']);
		$ctrl->setOfr_lng($_POST['ofr_lng']);
		$ctrl->setOfr_map_status($_POST['ofr_map_status']);
		$ctrl->setOfr_receipt_amout($_POST['ofr_receipt_amout']);
		$ctrl->setOfr_errand_run_fee($_POST['ofr_errand_run_fee']);
		$ctrl->addErrandOffer($_FILES['fileToUpload'],$_POST['is_img_upload']);
	}
	else if ($_POST['action'] == "uploadOfferReceipt") {
		$ctrl->setOfr_id($_POST['ofr_id']);
		$ctrl->setOfr_receipt_amout($_POST['ofr_receipt_amout']);		
		$ctrl->uploadOfferReceipt($_FILES['fileToUpload'],$_POST['is_img_upload']);
	}
	 else if ($_POST['action'] == "removeErrandOffer") {
		$ctrl->setOfr_id($_POST['ofr_id']);
		$ctrl->removeErrandOffer();
	} 
	else if ($_POST['action'] == "tblErrandOfferByUser") {
		$ctrl->tblErrandOfferByUser();
	}
	else if ($_POST['action'] == "tblErrandOfferByUserLastOne") {
		$ctrl->tblErrandOfferByUserLastOne();
	}
	else if ($_POST['action'] == "confirmReceivedPayment") {
		$ctrl->setOfr_id($_POST['ofr_id']);
		$ctrl->confirmReceivedPayment();
	}
//	else if ($_POST['action'] == "tblErrandOffer") {
//		$ctrl->tblErrandOffer();
//	} 
	else if ($_POST['action'] == "getErrandOfferByID") {
		$ctrl->setOfr_id($_POST['ofr_id']);
		$ctrl->getErrandOfferByID();
	} else if ($_POST['action'] == "getErrandOfferByRequest") {
		$ctrl->setOfr_errand_request($_POST['ofr_errand_request']);
		$ctrl->getErrandOfferByRequest();	
	} 
	else if ($_POST['action'] == "acceptErrandOffer") {
		$ctrl->setOfr_id($_POST['ofr_id']);
		$ctrl->setRq_id($_POST['rq_id']);
		$ctrl->acceptErrandOffer();
	}
	else if ($_POST['action'] == "markAsDelivered") {
		$ctrl->setOfr_id($_POST['ofr_id']);		
		$ctrl->markAsDelivered();
	}
}
