<?php

/**
 * @author Ruwan Jayawardena
 */
include '../dbconfig/connectDB.php';

class AdMainCategory extends ConnectDB {

	private $flag = false;
	private $admc_id;
	private $admc_name;

	public function getFlag() {
		return $this->flag;
	}

	public function getAdmc_id() {
		return $this->admc_id;
	}

	public function getAdmc_name() {
		return $this->admc_name;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setAdmc_id($admc_id) {
		$this->admc_id = $admc_id;
		return $this;
	}

	public function setAdmc_name($admc_name) {
		$this->admc_name = $admc_name;
		return $this;
	}

	public function allAdMainCategory() {
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

	public function tblAdMainCategory() {
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

	public function cmbAdMainCategory() {
		$data = array();
		$sql = "SELECT
ub_admaincategory.admc_id,
ub_admaincategory.admc_name
FROM
ub_admaincategory
ORDER BY
ub_admaincategory.admc_name ASC";
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

	public function getAdMainCategoryByID() {
		$data = array();
		$sql = "SELECT
ub_admaincategory.admc_id,
ub_admaincategory.admc_name
FROM
ub_admaincategory
WHERE
ub_admaincategory.admc_id = :admc_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':admc_id', $this->getAdmc_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function getAdMainCategoryIDByName() {
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

	public function addAdMainCategory() {
		$sql = "INSERT INTO `ub_admaincategory` (`admc_name`) VALUES (:admc_name);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':admc_name', $this->getAdmc_name(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editAdMainCategory() {
		$sql = "UPDATE `ub_admaincategory` SET  `admc_name`=:admc_name WHERE (`admc_id` = :admc_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':admc_name', $this->getAdmc_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':admc_id', $this->getAdmc_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function removeAdMainCategory() {
		$sql = "DELETE FROM `ub_admaincategory` WHERE (`admc_id` = :admc_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':admc_id', $this->getAdmc_id(), PDO::PARAM_INT);
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
