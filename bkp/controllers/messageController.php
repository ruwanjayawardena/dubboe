<?php

include '../models/message.php';

$ctrl = new Message();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "sendMessage") {
		$ctrl->setMsg_forwhat($_POST['msg_forwhat']);
		$ctrl->setMsg_object_id($_POST['msg_object_id']);
		$ctrl->setMsg_receiver($_POST['msg_receiver']);
		$ctrl->setMsg_sender($_POST['msg_sender']);
		$ctrl->setMsg_body($_POST['msg_body']);		
		$ctrl->sendMessage();
	} else if ($_POST['action'] == "removeMessage") {
		$ctrl->setMessage_id($_POST['grant_id']);
		$ctrl->removeMessage();
	}
	else if ($_POST['action'] == "getMessageGroupByLoggedUser") {
		$ctrl->getMessageGroupByLoggedUser();	
	}
	else if ($_POST['action'] == "getNotReadMsgCount") {
		$ctrl->getNotReadMsgCount();	
	}
	else if ($_POST['action'] == "getNotReadMsgCountAdministrator") {
		$ctrl->getNotReadMsgCountAdministrator();	
	}
	else if ($_POST['action'] == "markRead") {
		$ctrl->markRead();	
	}
	else if ($_POST['action'] == "markReadAdministrator") {
		$ctrl->markReadAdministrator();	
	}
	else if ($_POST['action'] == "getMessageGroupByAdministrator") {
		$ctrl->getMessageGroupByAdministrator();	
	}
	else if ($_POST['action'] == "getMessagesDoneWithSenderByLoggedUser") {
		$ctrl->getMessagesDoneWithSenderByLoggedUser($_POST['second']);
	} 
	else if ($_POST['action'] == "getMessagesDoneWithSenderByAdministrator") {
		$ctrl->getMessagesDoneWithSenderByAdministrator($_POST['second']);
	} 
	else if ($_POST['action'] == "cmbMessage") {
		$ctrl->cmbMessage();
	} else if ($_POST['action'] == "tblMessage") {
		$ctrl->tblMessage();
	} else if ($_POST['action'] == "getMessageByID") {
		$ctrl->setMessage_id($_POST['grant_id']);
		$ctrl->getMessageByID();
	} else if ($_POST['action'] == "tblAllUsersNotMessages") {
		$ctrl->setMessage_id($_POST['grant_id']);
		$ctrl->tblAllUsersNotMessages();
	} else if ($_POST['action'] == "tblAllUsersMessageInvited") {
		$ctrl->setMessage_id($_POST['grant_id']);
		$ctrl->tblAllUsersMessageInvited();
	} else if ($_POST['action'] == "InviteForMessage") {
		$ctrl->setMessage_id($_POST['grant_id']);
		$ctrl->InviteForMessage($_POST['usr_id']);
	} else if ($_POST['action'] == "removeMessageedUser") {
		$ctrl->removeMessageedUser($_POST['usr_id']);
	} 
}
