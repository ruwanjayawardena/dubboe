<?php

include '../models/paypal.php';

$ctrl = new Paypal();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "creatMembershipPayPalOrder") {
		$ctrl->setTok_plan_type($_POST['tok_plan_type']);
		$ctrl->creatMembershipPayPalOrder();
	}
	else if ($_POST['action'] == "creatSubcriptionPayPalOrder") {
		$ctrl->setTok_plan_type($_POST['tok_plan_type']);
		$ctrl->creatSubcriptionPayPalOrder();
	}	
	else if ($_POST['action'] == "updateMembershipPayPalToken") {
		$ctrl->updateMembershipPayPalToken($_POST['token']);
	}	
	else if ($_POST['action'] == "updateOrderEventItemPayPalToken") {
		$ctrl->updateOrderEventItemPayPalToken($_POST['token']);
	}	
	else if ($_POST['action'] == "checkMembership") {
		$ctrl->checkMembership();
	}	
	else if ($_POST['action'] == "membershipPayout") {
		$ctrl->membershipPayout($_POST['pay_array_object']);
	}	
	else if ($_POST['action'] == "commissionPayout") {
		$ctrl->commissionPayout($_POST['pay_array_object']);
	}	
	else if ($_POST['action'] == "membershipBadgePayoutManually") {
		$ctrl->membershipBadgePayoutManually($_POST['rec_paypal_batch_id']);
	}	
	else if ($_POST['action'] == "commissionBadgePayoutManually") {
		$ctrl->commissionBadgePayoutManually($_POST['oritm_batch_id']);
	}	
	else if ($_POST['action'] == "membershipPayoutGetPayPalInfo") {		
		$ctrl->membershipPayoutGetPayPalInfo('WNBQWJR6W32RS');
//		$ctrl->membershipPayoutGetPayPalInfo($_POST['payout_batch_id']);
	}	
	else if ($_POST['action'] == "membershipHistory") {
		$ctrl->membershipHistory();
	}	
	else if ($_POST['action'] == "tblEventItemOrderHistory") {
		$ctrl->tblEventItemOrderHistory();
	}		
	else if ($_POST['action'] == "tblPayoutAccountExecutives") {
		$ctrl->tblPayoutAccountExecutives();
	}		
	else if ($_POST['action'] == "tblPendingPayoutAccountExecutives") {
		$ctrl->tblPendingPayoutAccountExecutives();
	}		
	else if ($_POST['action'] == "tblEventItemOrderHistoryAccExe") {
		$ctrl->tblEventItemOrderHistoryAccExe();
	}		
	else if ($_POST['action'] == "tblEventItemOrderHistoryAdmin") {
		$ctrl->tblEventItemOrderHistoryAdmin();
	}		
	else if ($_POST['action'] == "removeOrderEventItem") {
		$ctrl->removeOrderEventItem($_POST['token']);
	}	
}
