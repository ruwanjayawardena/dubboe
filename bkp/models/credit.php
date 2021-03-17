<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

class Credit extends ConnectDB {

	private $flag = false;
	private $cr_id;
	private $cr_category;
	private $cr_amount;
	private $cr_membership;
	private $mcmb_id;
	private $rlcmb_name;
	private $cr_month_subcription_discount_rt;
	private $cr_annual_discount_discount_rt;
	private $cr_membership_renew_days;

	public function getCr_membership_renew_days() {
		return $this->cr_membership_renew_days;
	}

	public function setCr_membership_renew_days($cr_membership_renew_days) {
		$this->cr_membership_renew_days = $cr_membership_renew_days;
		return $this;
	}

	public function getCr_month_subcription_discount_rt() {
		return $this->cr_month_subcription_discount_rt;
	}

	public function getCr_annual_discount_discount_rt() {
		return $this->cr_annual_discount_discount_rt;
	}

	public function setCr_month_subcription_discount_rt($cr_month_subcription_discount_rt) {
		$this->cr_month_subcription_discount_rt = $cr_month_subcription_discount_rt;
		return $this;
	}

	public function setCr_annual_discount_discount_rt($cr_annual_discount_discount_rt) {
		$this->cr_annual_discount_discount_rt = $cr_annual_discount_discount_rt;
		return $this;
	}

	public function getMcmb_id() {
		return $this->mcmb_id;
	}

	public function getRlcmb_name() {
		return $this->rlcmb_name;
	}

	public function setMcmb_id($mcmb_id) {
		$this->mcmb_id = $mcmb_id;
		return $this;
	}

	public function setRlcmb_name($rlcmb_name) {
		$this->rlcmb_name = $rlcmb_name;
		return $this;
	}

	public function getCr_membership() {
		return $this->cr_membership;
	}

	public function setCr_membership($cr_membership) {
		$this->cr_membership = $cr_membership;
		return $this;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getCr_id() {
		return $this->cr_id;
	}

	public function getCr_category() {
		return $this->cr_category;
	}

	public function getCr_amount() {
		return $this->cr_amount;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setCr_id($cr_id) {
		$this->cr_id = $cr_id;
		return $this;
	}

	public function setCr_category($cr_category) {
		$this->cr_category = $cr_category;
		return $this;
	}

	public function setCr_amount($cr_amount) {
		$this->cr_amount = $cr_amount;
		return $this;
	}

	public function tblCredit() {
		$data = array();
		$sql = "SELECT
ub_credit_plans.cr_id,
ub_credit_plans.cr_category,
ub_credit_plans.cr_amount,
ub_credit_plans.cr_membership,
df_relatecombo.rlcmb_name,
ub_credit_plans.cr_month_subcription_discount_rt,
ub_credit_plans.cr_annual_discount_discount_rt,
ub_credit_plans.cr_membership_renew_days
FROM
ub_credit_plans
INNER JOIN df_relatecombo ON ub_credit_plans.cr_category = df_relatecombo.rlcmb_id
ORDER BY
ub_credit_plans.cr_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getCreditByID() {
		$data = array();
		$cr_amount = 0;
		$cr_membership = 0;
		$cr_month_subcription_discount_rt = 0;
		$cr_annual_discount_discount_rt = 0;
		$cr_membership_renew_days = 0;
		$sql = "SELECT
ub_credit_plans.cr_id,
ub_credit_plans.cr_category,
ub_credit_plans.cr_amount,
ub_credit_plans.cr_membership,
ub_credit_plans.cr_month_subcription_discount_rt,
ub_credit_plans.cr_annual_discount_discount_rt,
ub_credit_plans.cr_membership_renew_days
FROM
ub_credit_plans
WHERE
ub_credit_plans.cr_id = :cr_id
ORDER BY
ub_credit_plans.cr_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':cr_id', $this->getCr_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$cr_amount = $row->cr_amount;
				$cr_membership = $row->cr_membership;
				$cr_annual_discount_discount_rt = $row->cr_annual_discount_discount_rt;
				$cr_month_subcription_discount_rt = $row->cr_month_subcription_discount_rt;
				$cr_membership_renew_days = $row->cr_membership_renew_days;
			}
			echo json_encode(array("cr_amount" => $cr_amount, "cr_membership" => $cr_membership, "cr_month_subcription_discount_rt" => $cr_month_subcription_discount_rt, "cr_annual_discount_discount_rt" => $cr_annual_discount_discount_rt, "cr_membership_renew_days" => $cr_membership_renew_days));
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function membershipInfoByLoggedUser() {
		$data = array();
		$sql = "SELECT
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
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getNextAIIDOFRelateCmb() {
		$nextid = 0;
		$sql = "SHOW TABLE STATUS LIKE 'df_relatecombo'";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$nextid = $row->Auto_increment;
		}
		return $nextid;
	}

	public function saveRelateCombo() {
		$nextRelateCmbID = $this->getNextAIIDOFRelateCmb();
		$sql = "INSERT INTO `df_relatecombo` (`rlcmb_name`, `rlcmb_maincmb`) VALUES (:rlcmb_name, :rlcmb_maincmb);";
		$sql2 = "INSERT INTO `ub_credit_plans` (`cr_category`, `cr_amount`, `cr_membership`) VALUES (:cr_category, '0', '0');";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rlcmb_name', $this->getRlcmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$createstmt1 = $this->con->prepare($sql2);
				$createstmt1->bindParam(':cr_category', $nextRelateCmbID, PDO::PARAM_INT);
				if ($createstmt1->execute()) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editCredit() {
		$sql = "UPDATE `ub_credit_plans` SET `cr_amount`=:cr_amount, `cr_membership` =:cr_membership, `cr_month_subcription_discount_rt`=:cr_month_subcription_discount_rt, `cr_annual_discount_discount_rt`=:cr_annual_discount_discount_rt, `cr_membership_renew_days`=:cr_membership_renew_days WHERE (`cr_id` = :cr_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':cr_amount', $this->getCr_amount(), PDO::PARAM_STR);
			$createstmt->bindParam(':cr_membership', $this->getCr_membership(), PDO::PARAM_STR);
			$createstmt->bindParam(':cr_month_subcription_discount_rt', $this->getCr_month_subcription_discount_rt(), PDO::PARAM_INT);
			$createstmt->bindParam(':cr_annual_discount_discount_rt', $this->getCr_annual_discount_discount_rt(), PDO::PARAM_INT);
			$createstmt->bindParam(':cr_membership_renew_days', $this->getCr_membership_renew_days(), PDO::PARAM_INT);
			$createstmt->bindParam(':cr_id', $this->getCr_id(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
