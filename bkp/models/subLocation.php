<?php
include '../dbconfig/connectDB.php';

class SubLocation extends ConnectDB {

	private $flag = false;
	private $mlc_id;
	private $pfc_name;

	function getFlag() {
		return $this->flag;
	}

	function getPfc_id() {
		return $this->pfc_id;
	}

	function getPfc_name() {
		return $this->pfc_name;
	}

	function setFlag($flag): void {
		$this->flag = $flag;
	}

	function setPfc_id($pfc_id): void {
		$this->pfc_id = $pfc_id;
	}

	function setPfc_name($pfc_name): void {
		$this->pfc_name = $pfc_name;
	}
	
	public function allProfileCategory() {
		$data = array();
		$sql = "SELECT
ub_profilecategory.pfc_id,
ub_profilecategory.pfc_name
FROM
ub_profilecategory
ORDER BY
ub_profilecategory.pfc_id DESC";
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

	public function tblProfileCategory() {
		$data = array();
		$sql = "SELECT
ub_profilecategory.pfc_id,
ub_profilecategory.pfc_name
FROM
ub_profilecategory
ORDER BY
ub_profilecategory.pfc_id DESC";
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

	public function cmbProfileCategory() {
		$data = array();
		$sql = "SELECT
ub_profilecategory.pfc_id,
ub_profilecategory.pfc_name
FROM
ub_profilecategory
ORDER BY
ub_profilecategory.pfc_name ASC";
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

	public function getProfileCategoryByID() {
		$data = array();
		$sql = "SELECT
ub_profilecategory.pfc_id,
ub_profilecategory.pfc_name
FROM
ub_profilecategory
WHERE
ub_profilecategory.pfc_id = :pfc_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':pfc_id', $this->getPfc_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function getProfileCategoryIDByName() {
		$pfc_id = 0;
		$sql = "SELECT
ub_profilecategory.pfc_id
FROM
ub_profilecategory
WHERE
ub_profilecategory.pfc_name = :pfc_name";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':pfc_name', $this->getPfc_name(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$pfc_id = $row->pfc_id;
			}
			echo $pfc_id;
		} catch (Exception $exc) {
			echo $pfc_id;
		}
	}

	public function addProfileCategory() {
		$sql = "INSERT INTO `ub_profilecategory` (`pfc_name`) VALUES (:pfc_name);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':pfc_name', $this->getPfc_name(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editProfileCategory() {
		$sql = "UPDATE `ub_profilecategory` SET  `pfc_name`=:pfc_name WHERE (`pfc_id` = :pfc_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':pfc_name', $this->getPfc_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':pfc_id', $this->getPfc_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function removeProfileCategory() {
		$sql = "DELETE FROM `ub_profilecategory` WHERE (`pfc_id` = :pfc_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':pfc_id', $this->getPfc_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
