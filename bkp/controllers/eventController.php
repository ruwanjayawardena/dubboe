<?php

include '../models/event.php';

$ctrl = new Event();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "saveEvent") {
		$ctrl->setEvt_name($_POST['evt_name']);
		$ctrl->setEvt_subheadline($_POST['evt_subheadline']);
		$ctrl->setEvt_desc($_POST['evt_desc']);
		$ctrl->setEvt_date($_POST['evt_date']);
		$ctrl->setEvt_time($_POST['evt_time']);
		$ctrl->setEvt_country($_POST['evt_country']);
		$ctrl->setEvt_state($_POST['evt_state']);
		$ctrl->setEvt_city($_POST['evt_city']);
		$ctrl->setEvt_location($_POST['evt_location']);
		$ctrl->setEvt_type($_POST['evt_type']);
		$ctrl->saveEvent();
	} else if ($_POST['action'] == "editEvent") {
		$ctrl->setEvt_name($_POST['evt_name']);
		$ctrl->setEvt_subheadline($_POST['evt_subheadline']);
		$ctrl->setEvt_desc($_POST['evt_desc']);
		$ctrl->setEvt_date($_POST['evt_date']);
		$ctrl->setEvt_time($_POST['evt_time']);
		$ctrl->setEvt_country($_POST['evt_country']);
		$ctrl->setEvt_state($_POST['evt_state']);
		$ctrl->setEvt_city($_POST['evt_city']);
		$ctrl->setEvt_location($_POST['evt_location']);
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->setEvt_type($_POST['evt_type']);
		$ctrl->editEvent();
	} else if ($_POST['action'] == "sendInvitation") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->sendInvitation($_POST['usr_array']);
	} else if ($_POST['action'] == "removeInvitation") {
		$ctrl->removeInvitation($_POST['evtsh_id']);
	} else if ($_POST['action'] == "deleteEvent") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->deleteEvent();
	} 
	else if ($_POST['action'] == "acceptEventInvitation") {
		$ctrl->acceptEventInvitation($_POST['evtsh_id']);
	} 
	else if ($_POST['action'] == "eventInvitationsMarkAsReadByUser") {
		$ctrl->eventInvitationsMarkAsReadByUser();
	} 
	else if ($_POST['action'] == "tblEventByLoggedExecutive") {
		$ctrl->tblEventByLoggedExecutive();
	} else if ($_POST['action'] == "loadLoggedUserEventInvitations") {
		$ctrl->loadLoggedUserEventInvitations();
	} else if ($_POST['action'] == "frontAllEvent") {
		$ctrl->frontAllEvent();
	} else if ($_POST['action'] == "frontEventByID") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->frontEventByID();
	} else if ($_POST['action'] == "frontEventItemByID") {
		$ctrl->setEvtem_id($_POST['evtem_id']);
		$ctrl->frontEventItemByID();
	} else if ($_POST['action'] == "getEventByID") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->getEventByID();
	} else if ($_POST['action'] == "tblEventCategory") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->tblEventCategory();
	} else if ($_POST['action'] == "cmbEventCategory") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->cmbEventCategory();
	} else if ($_POST['action'] == "deleteEventCategory") {
		$ctrl->setEvtcat_id($_POST['evtcat_id']);
		$ctrl->deleteEventCategory();
	} else if ($_POST['action'] == "deleteEventCategoryItem") {
		$ctrl->setEvtem_id($_POST['evtem_id']);
		$ctrl->deleteEventCategoryItem();
	} else if ($_POST['action'] == "saveEventCategory") {
		$ctrl->setEvtcat_catname($_POST['evtcat_catname']);
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->setEvtcat_catname($_POST['evtcat_catname']);
		$ctrl->saveEventCategory();
	} else if ($_POST['action'] == "saveEventCategoryItem") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->setEvtem_category($_POST['evtem_category']);
		$ctrl->setEvtem_name($_POST['evtem_name']);
		$ctrl->setEvtem_desc($_POST['evtem_desc']);
		$ctrl->setEvtem_price($_POST['evtem_price']);
		$ctrl->setEvtem_qty($_POST['evtem_qty']);
		$ctrl->saveEventCategoryItem();
	} else if ($_POST['action'] == "editEventCategoryItem") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->setEvtem_category($_POST['evtem_category']);
		$ctrl->setEvtem_name($_POST['evtem_name']);
		$ctrl->setEvtem_desc($_POST['evtem_desc']);
		$ctrl->setEvtem_price($_POST['evtem_price']);
		$ctrl->setEvtem_qty($_POST['evtem_qty']);
		$ctrl->setEvtem_id($_POST['evtem_id']);
		$ctrl->editEventCategoryItem();
	} else if ($_POST['action'] == "tblEventCategoryItems") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->setEvtem_category($_POST['evtem_category']);
		$ctrl->tblEventCategoryItems();
	} else if ($_POST['action'] == "eventItemsByOrderID") {
		$ctrl->eventItemsByOrderID($_POST['or_id']);
	} else if ($_POST['action'] == "getEventCategoryItemByID") {
		$ctrl->setEvtem_id($_POST['evtem_id']);
		$ctrl->getEventCategoryItemByID();
	} else if ($_POST['action'] == "AllEventCategoryItems") {
		$ctrl->setEvt_id($_POST['evt_id']);
		$ctrl->AllEventCategoryItems();
	} else if ($_POST['action'] == "tblEventItemOrderHistoryByUser") {
		$ctrl->tblEventItemOrderHistoryByUser();
	}
}