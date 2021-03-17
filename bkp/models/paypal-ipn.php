<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';
$db = new ConnectDB;

if (isset($_REQUEST) && !empty($_REQUEST)) {
	$custom = $_REQUEST['custom'];
	$explodeArray = explode("-", $custom);
	$filterPayArray = array_filter($explodeArray);
	//exxcute function
	if ($filterPayArray[0] == "membership" && $_REQUEST['payment_status'] == "Completed") {
		$sqlGetLastCompleteTokenInfo = "SELECT
ub_membership_token.tok_token_id
FROM
ub_membership_token
WHERE
ub_membership_token.tok_status = 1 AND
ub_membership_token.tok_usr_id = :tok_usr_id
ORDER BY
ub_membership_token.tok_id DESC
LIMIT 1";
		$renewDays = 0;
		$m_token_id = 0;
		//membership ipn update
		$sqlPaypal = "INSERT INTO `ub_membership_paypal` (`m_payer_id`, `m_token_id`, `m_usr_id`, `m_plan_type`, `m_txn_id`, `m_paid_status`, `m_paid_date`, `m_paid_time`, `m_paid_year`, `m_paid_amount`,`m_player_pp_email`) VALUES (:m_payer_id, :m_token_id, :m_usr_id, :m_plan_type, :m_txn_id, :m_paid_status, :m_paid_date, :m_paid_time, :m_paid_year, :m_paid_amount,:m_player_pp_email);";
		$sqlUpUserPaypal = "UPDATE `df_profile` SET `pro_paypal_email`=:pro_paypal_email WHERE (`pro_usr_id`=:pro_usr_id);";
		$sqlUpUser = "UPDATE `df_user` SET `usr_membership_status`='1', `usr_membership_activate_type`=:usr_membership_activate_type, `usr_membership_valid_year`=:usr_membership_valid_year, `usr_last_membership_renew_date`=:usr_last_membership_renew_date, `usr_next_membership_renew_date`=:usr_next_membership_renew_date WHERE (`usr_id`=:usr_id);";
		$sqlUserMembershipInfo = "SELECT
df_user.usr_id,
df_profile.pro_profile_category,
ub_credit_plans.cr_amount,
ub_credit_plans.cr_membership,
ub_credit_plans.cr_month_subcription_discount_rt,
ub_credit_plans.cr_annual_discount_discount_rt,
ub_credit_plans.cr_membership_renew_days
FROM
df_user
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
INNER JOIN ub_credit_plans ON df_profile.pro_profile_category = ub_credit_plans.cr_category
WHERE
df_user.usr_id= :usr_id";
		try {
			$db->getCon()->beginTransaction();
			//getTockeninfo
			$readstmt = $db->getCon()->prepare($sqlGetLastCompleteTokenInfo);
			$readstmt->bindParam(':tok_usr_id', $filterPayArray[1], PDO::PARAM_INT);
			$readstmt->execute();
			while ($rowTok = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$m_token_id = $rowTok->tok_token_id;
			}
			$createstmt = $db->getCon()->prepare($sqlPaypal);
			$createstmt->bindParam(':m_payer_id', $_REQUEST['payer_id'], PDO::PARAM_STR);
			$createstmt->bindParam(':m_token_id', $m_token_id, PDO::PARAM_STR);
			$createstmt->bindParam(':m_usr_id', $filterPayArray[1], PDO::PARAM_INT);
			$createstmt->bindParam(':m_plan_type', $filterPayArray[2], PDO::PARAM_INT);
			$createstmt->bindParam(':m_txn_id', $_REQUEST['txn_id'], PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_status', $_REQUEST['payment_status'], PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_time', date("H:i:s"), PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_year', date("Y"), PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_amount', $_REQUEST['mc_gross'], PDO::PARAM_STR);
			$createstmt->bindParam(':m_player_pp_email', $_REQUEST['payer_email'], PDO::PARAM_STR);
			if ($createstmt->execute()) {
				//update user email
				$createstmt1 = $db->getCon()->prepare($sqlUpUserPaypal);
				$createstmt1->bindParam(':pro_paypal_email', $_REQUEST['payer_email'], PDO::PARAM_STR);
				$createstmt1->bindParam(':pro_usr_id', $filterPayArray[1], PDO::PARAM_INT);
				if ($createstmt1->execute()) {
					//update user table
					$readstmt = $db->getCon()->prepare($sqlUserMembershipInfo);
					$readstmt->bindParam(':usr_id', $filterPayArray[1], PDO::PARAM_INT);
					$readstmt->execute();
					while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
						$createstmt2 = $db->getCon()->prepare($sqlUpUser);
						$createstmt2->bindParam(':usr_id', $filterPayArray[1], PDO::PARAM_INT);

						if ($filterPayArray[2] == 3) {
							$renewDays = ($row->cr_membership_renew_days * 12);
							$usr_membership_activate_type = 2;						
						} else {
							$renewDays = $row->cr_membership_renew_days;
							$usr_membership_activate_type = 1;
						}
						$usr_next_membership_renew_date = date_create(date("Y-m-d"));
						date_add($usr_next_membership_renew_date, date_interval_create_from_date_string($renewDays . " days"));
						$nextRenewDate = date_format($usr_next_membership_renew_date, "Y-m-d");
						$createstmt2->bindParam(':usr_membership_activate_type', $usr_membership_activate_type, PDO::PARAM_INT);
						$createstmt2->bindParam(':usr_membership_valid_year', date("Y"), PDO::PARAM_STR);
						$createstmt2->bindParam(':usr_last_membership_renew_date', date("Y-m-d"), PDO::PARAM_STR);
						$createstmt2->bindParam(':usr_next_membership_renew_date', $nextRenewDate, PDO::PARAM_STR);
						if ($createstmt2->execute()) {
							$db->getCon()->commit();
							echo "sucess";
						} else {
							$db->getCon()->rollBack();
							echo "failed";
						}
					}
				} else {
					$db->getCon()->rollBack();
					echo "failed";
				}
			} else {
				$db->getCon()->rollBack();
				echo "failed";
			}
		} catch (Exception $exc) {
			$db->getCon()->rollBack();
			echo $exc->getMessage();
		}
	} else if ($filterPayArray[0] == "checkoutevents" && $_REQUEST['payment_status'] == "Completed") {
		$shoppingcart_flag = false;
		$sqlUpdateOrder = "UPDATE `ub_eventorder` SET `or_status`='2' WHERE (`or_id`=:or_id);";
		$sqlPaypal = "INSERT INTO `ub_eventorder_paypal` (`m_payer_id`, `m_usr_id`, `m_order_id`, `m_txn_id`, `m_paid_status`, `m_paid_date`, `m_paid_time`, `m_paid_year`, `m_paid_amount`,`m_player_pp_email`) VALUES (:m_payer_id, :m_usr_id, :m_order_id, :m_txn_id, :m_paid_status, :m_paid_date, :m_paid_time, :m_paid_year, :m_paid_amount,:m_player_pp_email);";
		$sql_qty_update = "UPDATE `ub_event_items` SET `evtem_qty`= `evtem_qty` - :evtem_qty WHERE (`evtem_id`=:evtem_id);";
		$sql_get_order_items = "SELECT
ub_eventorder_item.oritm_item,
ub_eventorder_item.oritm_qty
FROM
ub_eventorder_item
WHERE
ub_eventorder_item.oritm_order = :oritm_order";
		try {
			$db->getCon()->beginTransaction();
			$createstmt = $db->getCon()->prepare($sqlPaypal);
			$createstmt->bindParam(':m_payer_id', $_REQUEST['payer_id'], PDO::PARAM_STR);
			$createstmt->bindParam(':m_usr_id', $filterPayArray[1], PDO::PARAM_INT);
			$createstmt->bindParam(':m_order_id', $filterPayArray[2], PDO::PARAM_INT);
			$createstmt->bindParam(':m_txn_id', $_REQUEST['txn_id'], PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_status', $_REQUEST['payment_status'], PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_time', date("H:i:s"), PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_year', date("Y"), PDO::PARAM_STR);
			$createstmt->bindParam(':m_paid_amount', $_REQUEST['mc_gross'], PDO::PARAM_STR);
			$createstmt->bindParam(':m_player_pp_email', $_REQUEST['payer_email'], PDO::PARAM_STR);
			if ($createstmt->execute()) {
				//update order email
				$createstmt1 = $db->getCon()->prepare($sqlUpdateOrder);
				$createstmt1->bindParam(':or_id', $filterPayArray[2], PDO::PARAM_INT);
				if ($createstmt1->execute()) {
					$readstmt = $db->getCon()->prepare($sql_get_order_items);
					$readstmt->bindParam(':oritm_order', $filterPayArray[2], PDO::PARAM_INT);
					$readstmt->execute();
					while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
						$createstmt2 = $db->getCon()->prepare($sql_qty_update);
						$createstmt2->bindParam(':evtem_id', $row->oritm_item, PDO::PARAM_INT);
						$createstmt2->bindParam(':evtem_qty', $row->oritm_qty, PDO::PARAM_INT);
						$shoppingcart_flag = $createstmt2->execute();
					}
					if ($shoppingcart_flag) {
						$db->getCon()->commit();
						echo "sucess";
					} else {
						$db->getCon()->rollBack();
						echo "failed";
					}
				} else {
					$db->getCon()->rollBack();
					echo "failed";
				}
			} else {
				$db->getCon()->rollBack();
				echo "failed";
			}
		} catch (Exception $exc) {
			$db->getCon()->rollBack();
			echo "failed";
		}
	}
}
