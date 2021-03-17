<?php

include '../models/grant.php';

$ctrl = new Grant();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "addGrant") {
		$ctrl->setGrant_title($_POST['grant_title']);
		$ctrl->setGrant_desc($_POST['grant_desc']);
		$ctrl->setGrant_amount($_POST['grant_amount']);
		$ctrl->addGrant();
	}
	else if ($_POST['action'] == "editGrant") {
		$ctrl->setGrant_title($_POST['grant_title']);
		$ctrl->setGrant_desc($_POST['grant_desc']);
		$ctrl->setGrant_amount($_POST['grant_amount']);
		$ctrl->setGrant_id($_POST['grant_id']);
		$ctrl->editGrant();
	}
	else if ($_POST['action'] == "grantInvitationsMarkAsReadByUser") {		
		$ctrl->grantInvitationsMarkAsReadByUser();
	}
	else if ($_POST['action'] == "editGrantQuestions") {
		$ctrl->setGrq_question($_POST['grq_question']);
		$ctrl->setGrq_id($_POST['grq_id']);
		$ctrl->editGrantQuestions();
	}
	else if ($_POST['action'] == "saveGrantQuestions") {
		$ctrl->setGrq_question($_POST['grq_question']);
		$ctrl->setGrq_grant($_POST['grant_id']);
		$ctrl->saveGrantQuestions();
	}
	else if ($_POST['action'] == "saveGrantAnswersAndApply") {
		$ctrl->setGruq_grantinfo($_POST['gruq_grantinfo']);
		$ctrl->saveGrantAnswersAndApply($_POST['answers']);
	}
	else if ($_POST['action'] == "removeGrant") {
		$ctrl->setGrant_id($_POST['grant_id']);
		$ctrl->removeGrant();
	} 
	else if ($_POST['action'] == "deleteGrantQuestions") {
		$ctrl->setGrq_id($_POST['grq_id']);
		$ctrl->deleteGrantQuestions();
	} 
	else if ($_POST['action'] == "allGrant") {
		$ctrl->allGrant();
	} else if ($_POST['action'] == "cmbGrant") {
		$ctrl->cmbGrant();
	} else if ($_POST['action'] == "tblGrant") {
		$ctrl->tblGrant();
	} 
	else if ($_POST['action'] == "getGrantByID") {
		$ctrl->setGrant_id($_POST['grant_id']);
		$ctrl->getGrantByID();
	} 
	else if ($_POST['action'] == "tblGrantQuestions") {
		$ctrl->setGrant_id($_POST['grant_id']);
		$ctrl->tblGrantQuestions();
	} 
	else if ($_POST['action'] == "tblGrantQuestionsWithAnswers") {
		$ctrl->setGrant_id($_POST['grant_id']);
		$ctrl->setGrinfo_id($_POST['grinfo_id']);
		$ctrl->tblGrantQuestionsWithAnswers();
	} 
	else if ($_POST['action'] == "getGrantQuestionsByID") {
		$ctrl->setGrq_id($_POST['grq_id']);
		$ctrl->getGrantQuestionsByID();
	} 
	else if ($_POST['action'] == "tblAllUsersNotGrants") {
		$ctrl->setGrant_id($_POST['grant_id']);
		$ctrl->tblAllUsersNotGrants();
	} else if ($_POST['action'] == "tblAllUsersGrantInvited") {
		$ctrl->setGrant_id($_POST['grant_id']);
		$ctrl->tblAllUsersGrantInvited();
	}
	else if ($_POST['action'] == "InviteForGrant") {
		$ctrl->setGrant_id($_POST['grant_id']);
		$ctrl->InviteForGrant($_POST['usr_id']);
	}
	else if ($_POST['action'] == "removeGrantedUser") {
		$ctrl->removeGrantedUser($_POST['usr_id']);
	}
	else if ($_POST['action'] == "loadLoggedUserGrantInvitations") {
		$ctrl->loadLoggedUserGrantInvitations();
	}	
	else if ($_POST['action'] == "acceptGrant") {
		$ctrl->setGrinfo_id($_POST['grinfo_id']);
		$ctrl->acceptGrant();
	}	
	else if ($_POST['action'] == "changeGrantInvitationStatus") {
		$ctrl->setGrinfo_id($_POST['grinfo_id']);
		$ctrl->setGrinfo_received_status($_POST['grinfo_received_status']);
		$ctrl->changeGrantInvitationStatus();
	}	
}
