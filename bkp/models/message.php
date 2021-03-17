<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
/**
 * @author Ruwan Jayawardena
 */
include '../dbconfig/connectDB.php';

class Message extends ConnectDB {

	private $flag = false;
	private $msg_id;
	private $msg_forwhat;
	private $msg_object_id;
	private $msg_sender;
	private $msg_receiver;
	private $msg_body;

	public function getFlag() {
		return $this->flag;
	}

	public function getMsg_id() {
		return $this->msg_id;
	}

	public function getMsg_forwhat() {
		return $this->msg_forwhat;
	}

	public function getMsg_object_id() {
		return $this->msg_object_id;
	}

	public function getMsg_sender() {
		return $this->msg_sender;
	}

	public function getMsg_receiver() {
		return $this->msg_receiver;
	}

	public function getMsg_body() {
		return $this->msg_body;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setMsg_id($msg_id) {
		$this->msg_id = $msg_id;
		return $this;
	}

	public function setMsg_forwhat($msg_forwhat) {
		$this->msg_forwhat = $msg_forwhat;
		return $this;
	}

	public function setMsg_object_id($msg_object_id) {
		$this->msg_object_id = $msg_object_id;
		return $this;
	}

	public function setMsg_sender($msg_sender) {
		$this->msg_sender = $msg_sender;
		return $this;
	}

	public function setMsg_receiver($msg_receiver) {
		$this->msg_receiver = $msg_receiver;
		return $this;
	}

	public function setMsg_body($msg_body) {
		$this->msg_body = $msg_body;
		return $this;
	}

	public function getMessageGroupByLoggedUser() {
		$data = array();
		$sql = "SELECT
df_messages.msg_id,
df_messages.msg_forwhat,
IF(df_messages.msg_sender IS NULL,IF(df_messages.msg_receiver = :usr_id,df_messages.msg_sender,df_messages.msg_receiver),IF(df_messages.msg_sender = :usr_id,df_messages.msg_receiver,df_messages.msg_sender)) AS you_messaged_with_id,
IFNULL((SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = IF(df_messages.msg_sender IS NULL,IF(df_messages.msg_receiver = :usr_id,df_messages.msg_sender,df_messages.msg_receiver),IF(df_messages.msg_sender = :usr_id,df_messages.msg_receiver,df_messages.msg_sender))),'Administrator') AS you_messaged_with,
df_messages.msg_object_id,
df_messages.msg_sender,
df_messages.msg_receiver,
IF(df_messages.msg_sender IS NOT NULL,(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_sender),'Administrator') AS msg_sender_name,
IF(df_messages.msg_receiver IS NOT NULL,(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_receiver),'Administrator') AS msg_receiver_name,
df_messages.msg_body,
df_messages.msg_create_date,
df_messages.msg_create_time
FROM
df_messages
WHERE
df_messages.msg_sender = :usr_id OR
df_messages.msg_receiver = :usr_id
GROUP BY
IF(df_messages.msg_sender IS NULL,IF(df_messages.msg_receiver = :usr_id,df_messages.msg_sender,df_messages.msg_receiver),IF(df_messages.msg_sender = :usr_id,df_messages.msg_receiver,df_messages.msg_sender))";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if (!is_null($row['you_messaged_with_id'])) {
					$directory_msg_with = "../../asset_imageuploader/userprofileimages/" . $row['you_messaged_with_id'] . "/";
					$files_msg_with = scandir($directory_msg_with);
					$files_msg_with = array_diff($files_msg_with, ['.', '..', 'thumbnail']);
					$files_msg_with = array_values(array_filter($files_msg_with));
					if ($files_msg_with[0] == NULL) {
						$data[$i]['msg_with_img'] = "#";
					} else {
						$data[$i]['msg_with_img'] = $files_msg_with[0];
					}
				} else {
					$data[$i]['msg_with_img'] = "#";
				}
				if ($row->msg_sender != null) {
					$directory_sender = "../../asset_imageuploader/userprofileimages/" . $row->msg_sender . "/";
					$files_sender = scandir($directory_sender);
					$files_sender = array_diff($files_sender, ['.', '..', 'thumbnail']);
					$files_sender = array_values(array_filter($files_sender));
					if ($files[0] == NULL) {
						$data[$i]['sender_img'] = "#";
					} else {
						$data[$i]['sender_img'] = $files[0];
					}
				} else {
					$data[$i]['sender_img'] = "#";
				}
				if ($row->msg_receiver != null) {
					$directory_receiver = "../../asset_imageuploader/userprofileimages/" . $row->msg_receiver . "/";
					$files_receiver = scandir($directory_receiver);
					$files_receiver = array_diff($files_receiver, ['.', '..', 'thumbnail']);
					$files_receiver = array_values(array_filter($files_receiver));
					if ($files[0] == NULL) {
						$data[$i]['receiver_img'] = "#";
					} else {
						$data[$i]['receiver_img'] = $files[0];
					}
				} else {
					$data[$i]['receiver_img'] = "#";
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getNotReadMsgCount() {
		$count = 0;
		$sql = "SELECT
df_messages.msg_id
FROM
df_messages
WHERE
df_messages.msg_read_status = 0 AND
df_messages.msg_receiver = :usr_id";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			$rowcount = $readstmt->rowCount();
			if ($rowcount > 0) {
				$count = $rowcount;
			}
			echo $count;
		} catch (Exception $exc) {
			echo $count;
		}
	}

	public function getNotReadMsgCountAdministrator() {
		$count = 0;
		$sql = "SELECT
df_messages.msg_id
FROM
df_messages
WHERE
df_messages.msg_read_status = 0 AND
df_messages.msg_receiver IS NULL";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->execute();
			$rowcount = $readstmt->rowCount();
			if ($rowcount > 0) {
				$count = $rowcount;
			}
			echo $count;
		} catch (Exception $exc) {
			echo $count;
		}
	}

	public function getMessageGroupByAdministrator() {
		$data = array();
		$sql = "SELECT
df_messages.msg_id,
df_messages.msg_forwhat,
IF(df_messages.msg_sender IS NULL,IF(df_messages.msg_receiver IS NOT NULL,df_messages.msg_receiver,'Administrator'),IF(df_messages.msg_sender IS NOT NULL,df_messages.msg_sender,'Administrator')) AS you_messaged_with_id,
IFNULL((SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = IF(df_messages.msg_sender IS NULL,df_messages.msg_receiver,df_messages.msg_sender)),'Administrator') AS you_messaged_with,
df_messages.msg_object_id,
df_messages.msg_sender,
df_messages.msg_receiver,
IF(df_messages.msg_sender IS NOT NULL,(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_sender),'Administrator') AS msg_sender_name,
IF(df_messages.msg_receiver IS NOT NULL,(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_receiver),'Administrator') AS msg_receiver_name,
df_messages.msg_body,
df_messages.msg_create_date,
df_messages.msg_create_time
FROM
df_messages
WHERE
df_messages.msg_sender IS NULL OR
df_messages.msg_receiver IS NULL
GROUP BY
you_messaged_with_id";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if (!is_null($row['you_messaged_with_id'])) {
					$directory_msg_with = "../../asset_imageuploader/userprofileimages/" . $row['you_messaged_with_id'] . "/";
					$files_msg_with = scandir($directory_msg_with);
					$files_msg_with = array_diff($files_msg_with, ['.', '..', 'thumbnail']);
					$files_msg_with = array_values(array_filter($files_msg_with));
					if ($files_msg_with[0] == NULL) {
						$data[$i]['msg_with_img'] = "#";
					} else {
						$data[$i]['msg_with_img'] = $files_msg_with[0];
					}
				} else {
					$data[$i]['msg_with_img'] = "#";
				}
				if (!is_null($row['msg_sender'])) {
					$directory_sender = "../../asset_imageuploader/userprofileimages/" . $row['msg_sender'] . "/";
					$files_sender = scandir($directory_sender);
					$files_sender = array_diff($files_sender, ['.', '..', 'thumbnail']);
					$files_sender = array_values(array_filter($files_sender));
					if ($files_sender[0] == NULL) {
						$data[$i]['sender_img'] = "#";
					} else {
						$data[$i]['sender_img'] = $files_sender[0];
					}
				} else {
					$data[$i]['sender_img'] = "#";
				}
				if (!is_null($row['msg_receiver'])) {
					$directory_receiver = "../../asset_imageuploader/userprofileimages/" . $row['msg_receiver'] . "/";
					$files_receiver = scandir($directory_receiver);
					$files_receiver = array_diff($files_receiver, ['.', '..', 'thumbnail']);
					$files_receiver = array_values(array_filter($files_receiver));
					if ($files_receiver[0] == NULL) {
						$data[$i]['receiver_img'] = "#";
					} else {
						$data[$i]['receiver_img'] = $files_receiver[0];
					}
				} else {
					$data[$i]['receiver_img'] = "#";
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getMessagesDoneWithSenderByLoggedUser($second) {
		$data = array();
		$sql = "SELECT
df_messages.msg_id,
df_messages.msg_forwhat,
df_messages.msg_object_id,
df_messages.msg_sender,
IF(df_messages.msg_sender = " . $_SESSION['usr_id'] . ",'You',IF(df_messages.msg_receiver IS NULL,'Administrator',(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_receiver))) AS msg_by,
IF(df_messages.msg_sender = " . $_SESSION['usr_id'] . ",1,0) AS msg_by_type,
df_messages.msg_receiver,
IF(df_messages.msg_sender IS NOT NULL,(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_sender),'Administrator') AS msg_sender_name,
IF(df_messages.msg_receiver IS NOT NULL,(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_receiver),'Administrator') AS msg_receiver_name,
df_messages.msg_body,
df_messages.msg_create_date,
df_messages.msg_create_time
FROM
df_messages
WHERE";
		if (is_null($second) || $second == "null") {
			$sql .= " (df_messages.msg_sender = " . $_SESSION['usr_id'] . " AND
df_messages.msg_receiver IS NULL) OR 
(df_messages.msg_sender IS NULL AND
df_messages.msg_receiver = " . $_SESSION['usr_id'] . ")";
		} else {
			$sql .= " (df_messages.msg_sender = " . $_SESSION['usr_id'] . " AND
df_messages.msg_receiver = " . $second . ") OR 
(df_messages.msg_sender = " . $second . " AND
df_messages.msg_receiver = " . $_SESSION['usr_id'] . ")";
		}
		$sql .= " ORDER BY
df_messages.msg_id DESC";
//		echo $sql;

		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if (is_null($row['msg_sender'])) {
					$data[$i]['sender_img'] = "#";
				} else {
					$directory_sender = "";
					$directory_sender = "../../asset_imageuploader/userprofileimages/" . $row['msg_sender'] . "/";
					$files_sender = scandir($directory_sender);
					$files_sender = array_diff($files_sender, ['.', '..', 'thumbnail']);
					$files_sender = array_values(array_filter($files_sender));
					if ($files_sender[0] == NULL) {
						$data[$i]['sender_img'] = "#";
					} else {
						$data[$i]['sender_img'] = $files_sender[0];
					}
				}
				if (is_null($row['msg_receiver'])) {
					$data[$i]['receiver_img'] = "#";
				} else {
					$directory_receiver = "";
					$directory_receiver = "../../asset_imageuploader/userprofileimages/" . $row['msg_receiver'] . "/";
					$files_receiver = scandir($directory_receiver);
					$files_receiver = array_diff($files_receiver, ['.', '..', 'thumbnail']);
					$files_receiver = array_values(array_filter($files_receiver));
//					echo "ok";
					if (is_null($files_receiver[0])) {
						$data[$i]['receiver_img'] = "#";
					} else {
						$data[$i]['receiver_img'] = $files_receiver[0];
					}
				}
				$i++;
			}
//			echo print_r($data);
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getMessagesDoneWithSenderByAdministrator($second) {
		$data = array();
		$sql = "SELECT
df_messages.msg_id,
df_messages.msg_forwhat,
df_messages.msg_object_id,
df_messages.msg_sender,
IF(df_messages.msg_sender IS NULL,'You',(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_sender)) AS msg_by,
if(df_messages.msg_sender IS NULL,1,0) AS msg_by_type,
df_messages.msg_receiver,
IF(df_messages.msg_sender IS NOT NULL,(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_sender),'Administrator') AS msg_sender_name,
IF(df_messages.msg_receiver IS NOT NULL,(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_messages.msg_receiver),'Administrator') AS msg_receiver_name,
df_messages.msg_body,
df_messages.msg_create_date,
df_messages.msg_create_time
FROM
df_messages
WHERE
(df_messages.msg_sender = " . $second . " AND
df_messages.msg_receiver IS NULL) OR 
(df_messages.msg_sender IS NULL AND
df_messages.msg_receiver = " . $second . ")
ORDER BY
df_messages.msg_id DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if (is_null($row['msg_sender'])) {
					$data[$i]['sender_img'] = "#";
				} else {
					$directory_sender = "../../asset_imageuploader/userprofileimages/" . $row['msg_sender'] . "/";
					$files_sender = scandir($directory_sender);
					$files_sender = array_diff($files_sender, ['.', '..', 'thumbnail']);
					$files_sender = array_values(array_filter($files_sender));
					if ($files_sender[0] == NULL) {
						$data[$i]['sender_img'] = "#";
					} else {
//				echo $files_sender[0];
						$data[$i]['sender_img'] = $files_sender[0];
					}
				}
				if (!is_null($row['msg_receiver'])) {
					$directory_receiver = "../../asset_imageuploader/userprofileimages/" . $row['msg_receiver'] . "/";
					$files_receiver = scandir($directory_receiver);
					$files_receiver = array_diff($files_receiver, ['.', '..', 'thumbnail']);
					$files_receiver = array_values(array_filter($files_receiver));
					if ($files_receiveriles[0] == NULL) {
						$data[$i]['receiver_img'] = "#";
					} else {
						$data[$i]['receiver_img'] = $files_receiver[0];
					}
				} else {
					$data[$i]['receiver_img'] = "#";
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
df_user.usr_id,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_membership_status,
df_user.usr_membership_activate_type,
df_user.usr_cat_id,
df_user.usr_status,
ub_grant_users.grinfo_id,
ub_grant_users.grinfo_user,
ub_grant_users.grinfo_grant,
ub_grant_users.grinfo_received_status,
ub_grant_users.grinfo_user_uq_msg,
ub_grant_users.grinfo_funding_received_amt,
ub_grant_users.grinfo_update_date,
ub_grant_users.grinfo_update_time
FROM
df_user
INNER JOIN ub_grant_users ON ub_grant_users.grinfo_user = df_user.usr_id
WHERE
df_user.usr_status = 1 AND 
df_user.usr_cat_id = 3 AND
df_user.usr_id IN (SELECT
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

	public function sendMessage() {
		$defult = null;
		$sql = "INSERT INTO `df_messages` (`msg_forwhat`, `msg_object_id`, `msg_sender`, `msg_receiver`, `msg_body`,`msg_create_date`,`msg_create_time`) VALUES (:msg_forwhat, :msg_object_id, :msg_sender, :msg_receiver,:msg_body,:msg_create_date,:msg_create_time);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);
			if ($this->getMsg_object_id() == "null") {
				$createstmt->bindParam(':msg_object_id', $defult, PDO::PARAM_NULL);
			} else {
				$createstmt->bindParam(':msg_object_id', $this->getMsg_object_id(), PDO::PARAM_INT);
			}

			if ($this->getMsg_receiver() == "null") {
				$createstmt->bindParam(':msg_receiver', $defult, PDO::PARAM_NULL);
			} else {
				$createstmt->bindParam(':msg_receiver', $this->getMsg_receiver(), PDO::PARAM_INT);
			}
			if ($this->getMsg_sender() == "LOGUSER") {
				$createstmt->bindParam(':msg_sender', $_SESSION['usr_id'], PDO::PARAM_INT);
			} else if ($this->getMsg_sender() == "ADMIN" || $this->getMsg_sender() == "null") {
				$createstmt->bindParam(':msg_sender', $defult, PDO::PARAM_NULL);
			} else {
				$createstmt->bindParam(':msg_sender', $this->getMsg_sender(), PDO::PARAM_INT);
			}
			$createstmt->bindParam(':msg_forwhat', $this->getMsg_forwhat(), PDO::PARAM_STR);
			$createstmt->bindParam(':msg_body', $this->getMsg_body(), PDO::PARAM_STR);
			$createstmt->bindParam(':msg_create_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':msg_create_time', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				$this->getCon()->commit();
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Sent"));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Sending Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function markRead() {
		$sql = "UPDATE `df_messages` SET `msg_read_status`='1' WHERE (`msg_receiver`=:usr_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$this->getCon()->commit();
				echo json_encode(array("msgType" => 1, "msg" => "Successfully donw"));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}
	public function markReadAdministrator() {
		$sql = "UPDATE `df_messages` SET `msg_read_status`='1' WHERE (`msg_receiver` IS NULL);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);			
			if ($createstmt->execute()) {
				$this->getCon()->commit();
				echo json_encode(array("msgType" => 1, "msg" => "Successfully donw"));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Failed"));
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
