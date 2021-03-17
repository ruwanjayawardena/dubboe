<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
/**
 * @author Ruwan Jayawardena
 */
include '../dbconfig/connectDB.php';

class Grant extends ConnectDB {

	private $flag = false;
	private $grant_id;
	private $grant_title;
	private $grant_desc;
	private $grant_amount;
	private $grant_create_date;
	private $grant_create_tmie;
	private $grinfo_id;
	private $grinfo_user;
	private $grinfo_grant;
	private $grinfo_received_status;
	private $grinfo_user_uq_msg;
	private $grinfo_funding_received_amt;
	private $grinfo_update_date;
	private $grinfo_update_time;
	private $grq_id;
	private $grq_grant;
	private $grq_question;
	private $gruq_id;
	private $gruq_question;
	private $gruq_grantinfo;
	private $gruq_answer;

	public function getGruq_id() {
		return $this->gruq_id;
	}

	public function getGruq_question() {
		return $this->gruq_question;
	}

	public function getGruq_grantinfo() {
		return $this->gruq_grantinfo;
	}

	public function getGruq_answer() {
		return $this->gruq_answer;
	}

	public function setGruq_id($gruq_id) {
		$this->gruq_id = $gruq_id;
		return $this;
	}

	public function setGruq_question($gruq_question) {
		$this->gruq_question = $gruq_question;
		return $this;
	}

	public function setGruq_grantinfo($gruq_grantinfo) {
		$this->gruq_grantinfo = $gruq_grantinfo;
		return $this;
	}

	public function setGruq_answer($gruq_answer) {
		$this->gruq_answer = $gruq_answer;
		return $this;
	}

	public function getGrq_id() {
		return $this->grq_id;
	}

	public function getGrq_grant() {
		return $this->grq_grant;
	}

	public function getGrq_question() {
		return $this->grq_question;
	}

	public function setGrq_id($grq_id) {
		$this->grq_id = $grq_id;
		return $this;
	}

	public function setGrq_grant($grq_grant) {
		$this->grq_grant = $grq_grant;
		return $this;
	}

	public function setGrq_question($grq_question) {
		$this->grq_question = $grq_question;
		return $this;
	}

	public function getGrinfo_id() {
		return $this->grinfo_id;
	}

	public function getGrinfo_user() {
		return $this->grinfo_user;
	}

	public function getGrinfo_grant() {
		return $this->grinfo_grant;
	}

	public function getGrinfo_received_status() {
		return $this->grinfo_received_status;
	}

	public function getGrinfo_user_uq_msg() {
		return $this->grinfo_user_uq_msg;
	}

	public function getGrinfo_funding_received_amt() {
		return $this->grinfo_funding_received_amt;
	}

	public function getGrinfo_update_date() {
		return $this->grinfo_update_date;
	}

	public function getGrinfo_update_time() {
		return $this->grinfo_update_time;
	}

	public function setGrinfo_id($grinfo_id) {
		$this->grinfo_id = $grinfo_id;
		return $this;
	}

	public function setGrinfo_user($grinfo_user) {
		$this->grinfo_user = $grinfo_user;
		return $this;
	}

	public function setGrinfo_grant($grinfo_grant) {
		$this->grinfo_grant = $grinfo_grant;
		return $this;
	}

	public function setGrinfo_received_status($grinfo_received_status) {
		$this->grinfo_received_status = $grinfo_received_status;
		return $this;
	}

	public function setGrinfo_user_uq_msg($grinfo_user_uq_msg) {
		$this->grinfo_user_uq_msg = $grinfo_user_uq_msg;
		return $this;
	}

	public function setGrinfo_funding_received_amt($grinfo_funding_received_amt) {
		$this->grinfo_funding_received_amt = $grinfo_funding_received_amt;
		return $this;
	}

	public function setGrinfo_update_date($grinfo_update_date) {
		$this->grinfo_update_date = $grinfo_update_date;
		return $this;
	}

	public function setGrinfo_update_time($grinfo_update_time) {
		$this->grinfo_update_time = $grinfo_update_time;
		return $this;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getGrant_id() {
		return $this->grant_id;
	}

	public function getGrant_title() {
		return $this->grant_title;
	}

	public function getGrant_desc() {
		return $this->grant_desc;
	}

	public function getGrant_amount() {
		return $this->grant_amount;
	}

	public function getGrant_create_date() {
		return $this->grant_create_date;
	}

	public function getGrant_create_tmie() {
		return $this->grant_create_tmie;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setGrant_id($grant_id) {
		$this->grant_id = $grant_id;
		return $this;
	}

	public function setGrant_title($grant_title) {
		$this->grant_title = $grant_title;
		return $this;
	}

	public function setGrant_desc($grant_desc) {
		$this->grant_desc = $grant_desc;
		return $this;
	}

	public function setGrant_amount($grant_amount) {
		$this->grant_amount = $grant_amount;
		return $this;
	}

	public function setGrant_create_date($grant_create_date) {
		$this->grant_create_date = $grant_create_date;
		return $this;
	}

	public function setGrant_create_tmie($grant_create_tmie) {
		$this->grant_create_tmie = $grant_create_tmie;
		return $this;
	}

	public function allGrant() {
		$data = array();
		$sql = "SELECT
ub_admaincategory.admc_id,
ub_admaincategory.admc_name
FROM
ub_admaincategory
ORDER BY
ub_admaincategory.admc_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/admaincategory/" . $row['admc_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['admc_img'] = "#";
				} else {
					$data[$i]['admc_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblGrant() {
		$data = array();
		$sql = "SELECT
ub_grant.grant_id,
ub_grant.grant_title,
ub_grant.grant_desc,
ub_grant.grant_amount,
ub_grant.grant_create_date,
ub_grant.grant_create_tmie
FROM
ub_grant
ORDER BY
ub_grant.grant_id DESC";
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

	public function cmbGrant() {
		$data = array();
		$sql = "SELECT
ub_grant.grant_id,
ub_grant.grant_title,
ub_grant.grant_desc,
ub_grant.grant_amount,
ub_grant.grant_create_date,
ub_grant.grant_create_tmie
FROM
ub_grant
ORDER BY
ub_grant.grant_id DESC";
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

	public function getGrantByID() {
		$data = array();
		$sql = "SELECT
ub_grant.grant_id,
ub_grant.grant_title,
ub_grant.grant_desc,
ub_grant.grant_amount,
ub_grant.grant_create_date,
ub_grant.grant_create_tmie
FROM
ub_grant
WHERE
ub_grant.grant_id =:grant_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grant_id', $this->getGrant_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblGrantQuestions() {
		$data = array();
		$sql = "SELECT
ub_grant_questions.grq_id,
ub_grant_questions.grq_grant,
ub_grant_questions.grq_question
FROM
ub_grant_questions
WHERE
ub_grant_questions.grq_grant = :grant_id
ORDER BY
ub_grant_questions.grq_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grant_id', $this->getGrant_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function tblGrantQuestionsWithAnswers() {
		$data = array();
		$sql = "SELECT
ub_grant_user_answers.gruq_answer,
ub_grant_user_answers.gruq_grantinfo,
ub_grant_questions.grq_question,
ub_grant_questions.grq_grant,
ub_grant_user_answers.gruq_id,
ub_grant_questions.grq_id
FROM
ub_grant_user_answers
INNER JOIN ub_grant_questions ON ub_grant_user_answers.gruq_question = ub_grant_questions.grq_id
WHERE
ub_grant_user_answers.gruq_grantinfo = :grinfo_id AND
ub_grant_questions.grq_grant = :grant_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grant_id', $this->getGrant_id(), PDO::PARAM_INT);
			$readstmt->bindParam(':grinfo_id', $this->getGrinfo_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getGrantQuestionsByID() {
		$data = array();
		$sql = "SELECT
ub_grant_questions.grq_id,
ub_grant_questions.grq_grant,
ub_grant_questions.grq_question
FROM
ub_grant_questions
WHERE
ub_grant_questions.grq_id = :grq_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grq_id', $this->getGrq_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblAllUsersNotGrants() {
		$data = array();
		$sql = "SELECT
df_user.usr_id,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_membership_status,
df_user.usr_membership_activate_type,
df_user.usr_cat_id,
df_user.usr_status
FROM
df_user
WHERE
df_user.usr_status = 1 AND 
df_user.usr_cat_id = 3 AND
df_user.usr_id NOT IN (SELECT
ub_grant_users.grinfo_user
FROM
ub_grant_users
WHERE
ub_grant_users.grinfo_grant = :grinfo_grant)";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grinfo_grant', $this->getGrant_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblAllUsersGrantInvited() {
		$data = array();
		$sql = "SELECT
ub_grant_users.grinfo_user,
ub_grant_users.grinfo_update_time,
ub_grant_users.grinfo_update_date,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_membership_status,
ub_grant_users.grinfo_received_status,
ub_grant_users.grinfo_id,
df_user.usr_id,
df_user.usr_email,
df_user.usr_phone,
ub_grant_users.grinfo_grant
FROM
ub_grant_users
INNER JOIN df_user ON ub_grant_users.grinfo_user = df_user.usr_id
WHERE
ub_grant_users.grinfo_grant = :grinfo_grant";		
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grinfo_grant', $this->getGrant_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function loadLoggedUserGrantInvitations() {
		$data = array();
		$sql = "SELECT
uboaffiliateweb.ub_grant.grant_id,
uboaffiliateweb.ub_grant.grant_title,
uboaffiliateweb.ub_grant.grant_desc,
uboaffiliateweb.ub_grant.grant_amount,
uboaffiliateweb.ub_grant.grant_status,
uboaffiliateweb.ub_grant.grant_create_date,
uboaffiliateweb.ub_grant.grant_create_tmie,
uboaffiliateweb.ub_grant_users.grinfo_grant,
uboaffiliateweb.ub_grant_users.grinfo_received_status,
uboaffiliateweb.ub_grant_users.grinfo_user_uq_msg,
uboaffiliateweb.ub_grant_users.grinfo_funding_received_amt,
uboaffiliateweb.ub_grant_users.grinfo_update_date,
uboaffiliateweb.ub_grant_users.grinfo_update_time,
uboaffiliateweb.ub_grant_users.grinfo_id,
uboaffiliateweb.ub_grant_users.grinfo_user,
uboaffiliateweb.ub_grant_users.grinfo_notify_read_status
FROM
uboaffiliateweb.ub_grant_users
INNER JOIN uboaffiliateweb.ub_grant ON uboaffiliateweb.ub_grant_users.grinfo_grant = uboaffiliateweb.ub_grant.grant_id
WHERE
uboaffiliateweb.ub_grant_users.grinfo_user = :grinfo_user";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':grinfo_user', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode($data);
		}
	}

	public function getGrantIDByName() {
		$admc_id = 0;
		$sql = "SELECT
ub_admaincategory.admc_id
FROM
ub_admaincategory
WHERE
ub_admaincategory.admc_name = :admc_name";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':admc_name', $this->getAdmc_name(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$admc_id = $row->admc_id;
			}
			echo $admc_id;
		} catch (Exception $exc) {
			echo $admc_id;
		}
	}

	public function addGrant() {
		$sql = "INSERT INTO `ub_grant` (`grant_title`, `grant_desc`, `grant_amount`, `grant_create_date`, `grant_create_tmie`) VALUES (:grant_title, :grant_desc, :grant_amount, :grant_create_date, :grant_create_tmie);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':grant_title', $this->getGrant_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':grant_desc', $this->getGrant_desc(), PDO::PARAM_STR);
			$createstmt->bindParam(':grant_amount', $this->getGrant_amount(), PDO::PARAM_STR);
			$createstmt->bindParam(':grant_create_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':grant_create_tmie', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function InviteForGrant($usr_id) {
		$sql = "INSERT INTO `ub_grant_users` (`grinfo_user`, `grinfo_grant`, `grinfo_update_date`, `grinfo_update_time`) VALUES (:grinfo_user, :grinfo_grant, :grinfo_update_date, :grinfo_update_time);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':grinfo_user', $usr_id, PDO::PARAM_STR);
			$createstmt->bindParam(':grinfo_grant', $this->getGrant_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':grinfo_update_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':grinfo_update_time', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Invited"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Inviting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editGrant() {
		$sql = "UPDATE `ub_grant` SET `grant_title`=:grant_title, `grant_desc`=:grant_desc, `grant_amount`=:grant_amount WHERE (`grant_id` = :grant_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grant_title', $this->getGrant_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':grant_desc', $this->getGrant_desc(), PDO::PARAM_STR);
			$createstmt->bindParam(':grant_amount', $this->getGrant_amount(), PDO::PARAM_STR);
			$createstmt->bindParam(':grant_id', $this->getGrant_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}
	
	public function grantInvitationsMarkAsReadByUser() {
		$sql = "UPDATE `ub_grant_users` SET `grinfo_notify_read_status`='1' WHERE (`grinfo_user`=:grinfo_user);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grinfo_user', $_SESSION['usr_id'], PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (Exception $exc) {
			echo 0;
		}
	}

	public function editGrantQuestions() {
		$sql = "UPDATE `ub_grant_questions` SET `grq_question`=:grq_question WHERE (`grq_id`=:grq_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grq_question', $this->getGrq_question(), PDO::PARAM_STR);
			$createstmt->bindParam(':grq_id', $this->getGrq_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function saveGrantQuestions() {
		$sql = "INSERT INTO `ub_grant_questions` (`grq_grant`, `grq_question`) VALUES (:grq_grant, :grq_question);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grq_question', $this->getGrq_question(), PDO::PARAM_STR);
			$createstmt->bindParam(':grq_grant', $this->getGrq_grant(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function saveGrantAnswersAndApply($answers) {
		
		$flag = false;
		if (isset($answers) && !empty($answers)) {
			$answers_filter = array_filter($answers);
			$sql = "INSERT INTO `ub_grant_user_answers` (`gruq_question`, `gruq_grantinfo`, `gruq_answer`) VALUES (:gruq_question, :gruq_grantinfo, :gruq_answer);";
			$sql_accept = "UPDATE `ub_grant_users` SET `grinfo_received_status`=1 WHERE (`grinfo_id` = :grinfo_id);";
			try {
				$this->getCon()->beginTransaction();
				foreach ($answers_filter as $key => $answ) {
					$createstmt = $this->getCon()->prepare($sql);
					$createstmt->bindParam(':gruq_question', $key, PDO::PARAM_INT);
					$createstmt->bindParam(':gruq_grantinfo', $this->getGruq_grantinfo(), PDO::PARAM_INT);
					$createstmt->bindParam(':gruq_answer', $answ, PDO::PARAM_STR);
					$flag = $createstmt->execute();
				}
				if ($flag) {
					$createstmt2 = $this->getCon()->prepare($sql_accept);
					$createstmt2->bindParam(':grinfo_id', $this->getGruq_grantinfo(), PDO::PARAM_INT);
					if ($createstmt2->execute()) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Thank you for accept invitation"));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! processing failed,try again later"));
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! processing failed,try again later"));
				}
			} catch (Exception $exc) {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! processing failed,try again later"));
			}
		} else {
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! processing failed,try again later"));
		}
	}

	public function acceptGrant() {
		$sql = "UPDATE `ub_grant_users` SET `grinfo_received_status`=1 WHERE (`grinfo_id` = :grinfo_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grinfo_id', $this->getGrinfo_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Thank you for accept invitation"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! processing failed,try again later"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! processing failed,try again later"));
		}
	}

	public function changeGrantInvitationStatus() {
		$sql = "UPDATE `ub_grant_users` SET `grinfo_received_status`=:grinfo_received_status WHERE (`grinfo_id` = :grinfo_id)";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grinfo_id', $this->getGrinfo_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':grinfo_received_status', $this->getGrinfo_received_status(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Your Process Done"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Processing Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! Processing Failed"));
		}
	}

	public function removeGrant() {
		$sql = "DELETE FROM `ub_grant` WHERE (`grant_id` = :grant_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grant_id', $this->getGrant_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteGrantQuestions() {
		$sql = "DELETE FROM `ub_grant_questions` WHERE (`grq_id` = :grq_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grq_id', $this->getGrq_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function removeGrantedUser($usr_id) {
		$sql = "DELETE FROM `ub_grant_users` WHERE (`grinfo_user` = :grinfo_user);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grinfo_user', $usr_id, PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Removed"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Removing Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
