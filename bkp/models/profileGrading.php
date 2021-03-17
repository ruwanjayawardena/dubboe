<?php
include '../dbconfig/connectDB.php';

class ProfileGrading extends ConnectDB {

	private $flag = false;
	private $grd_id;
	private $grd_name;

	function getFlag() {
		return $this->flag;
	}

	function getGrd_id() {
		return $this->grd_id;
	}

	function getGrd_name() {
		return $this->grd_name;
	}

	function setFlag($flag): void {
		$this->flag = $flag;
	}

	function setGrd_id($grd_id): void {
		$this->grd_id = $grd_id;
	}

	function setGrd_name($grd_name): void {
		$this->grd_name = $grd_name;
	}
	
	public function allProfileGrading() {
		$data = array();
		$sql = "SELECT
ub_profilegrading.grd_id,
ub_profilegrading.grd_name
FROM
ub_profilegrading
ORDER BY
ub_profilegrading.grd_id DESC";
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

	public function tblProfileGrading() {
		$data = array();
		$sql = "SELECT
ub_profilegrading.grd_id,
ub_profilegrading.grd_name
FROM
ub_profilegrading
ORDER BY
ub_profilegrading.grd_id DESC";
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

	public function cmbProfileGrading() {
		$data = array();
		$sql = "SELECT
ub_profilegrading.grd_id,
ub_profilegrading.grd_name
FROM
ub_profilegrading
ORDER BY
ub_profilegrading.grd_name ASC";
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

	public function getProfileGradingByID() {
		$data = array();
		$sql = "SELECT
ub_profilegrading.grd_id,
ub_profilegrading.grd_name
FROM
ub_profilegrading
WHERE
ub_profilegrading.grd_id = :grd_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grd_id', $this->getGrd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function getProfileGradingIDByName() {
		$grd_id = 0;
		$sql = "SELECT
ub_profilegrading.grd_id
FROM
ub_profilegrading
WHERE
ub_profilegrading.grd_name = :grd_name";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grd_name', $this->getGrd_name(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$grd_id = $row->grd_id;
			}
			echo $grd_id;
		} catch (Exception $exc) {
			echo $grd_id;
		}
	}

	public function addProfileGrading() {
		$sql = "INSERT INTO `ub_profilegrading` (`grd_name`) VALUES (:grd_name);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grd_name', $this->getGrd_name(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editProfileGrading() {
		$sql = "UPDATE `ub_profilegrading` SET  `grd_name`=:grd_name WHERE (`grd_id` = :grd_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grd_name', $this->getGrd_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':grd_id', $this->getGrd_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function removeProfileGrading() {
		$sql = "DELETE FROM `ub_profilegrading` WHERE (`grd_id` = :grd_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grd_id', $this->getGrd_id(), PDO::PARAM_INT);
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
