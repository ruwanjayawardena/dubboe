<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class SubCombo extends ConnectDB {

	const TBL_SubCombo = 'df_subcombo';

	private $flag = false;
	//sub Combo box
	private $scmb_id;
	private $scmb_name;
	private $scmb_maincmb;
	private $scmb_relatecmb;
	private $scmb_relationship;
	//main combo box
	private $mcmb_id;
	private $mcmb_name;
	private $mcmb_class;
	private $mcmb_relatetsub;
	//relate combo box
	private $rlcmb_id;
	private $rlcmb_name;

	public function getMcmb_name() {
		return $this->mcmb_name;
	}

	public function getMcmb_class() {
		return $this->mcmb_class;
	}

	public function getMcmb_relatetsub() {
		return $this->mcmb_relatetsub;
	}

	public function setMcmb_name($mcmb_name) {
		$this->mcmb_name = $mcmb_name;
	}

	public function setMcmb_class($mcmb_class) {
		$this->mcmb_class = $mcmb_class;
	}

	public function setMcmb_relatetsub($mcmb_relatetsub) {
		$this->mcmb_relatetsub = $mcmb_relatetsub;
	}

	function getRlcmb_id() {
		return $this->rlcmb_id;
	}

	function getRlcmb_name() {
		return $this->rlcmb_name;
	}

	function setRlcmb_id($rlcmb_id) {
		$this->rlcmb_id = $rlcmb_id;
		return $this;
	}

	function setRlcmb_name($rlcmb_name) {
		$this->rlcmb_name = $rlcmb_name;
		return $this;
	}

	function getMcmb_id() {
		return $this->mcmb_id;
	}

	function setMcmb_id($mcmb_id) {
		$this->mcmb_id = $mcmb_id;
		return $this;
	}

	function getFlag() {
		return $this->flag;
	}

	function getScmb_id() {
		return $this->scmb_id;
	}

	function getScmb_name() {
		return $this->scmb_name;
	}

	function getScmb_maincmb() {
		return $this->scmb_maincmb;
	}

	function getScmb_relatecmb() {
		return $this->scmb_relatecmb;
	}

	function getScmb_relationship() {
		return $this->scmb_relationship;
	}

	function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	function setScmb_id($scmb_id) {
		$this->scmb_id = $scmb_id;
		return $this;
	}

	function setScmb_name($scmb_name) {
		$this->scmb_name = $scmb_name;
		return $this;
	}

	function setScmb_maincmb($scmb_maincmb) {
		$this->scmb_maincmb = $scmb_maincmb;
		return $this;
	}

	function setScmb_relatecmb($scmb_relatecmb) {
		$this->scmb_relatecmb = $scmb_relatecmb;
		return $this;
	}

	function setScmb_relationship($scmb_relationship) {
		$this->scmb_relationship = $scmb_relationship;
		return $this;
	}

	public function delete_folder($folder) {
		$flag = false;
		if (!is_dir($folder)) {
			$flag = true;
		} else {
			$subFolder = $folder . "/" . "thumbnail";
			if (!is_dir($subFolder)) {
				$flag = true;
			} else {
				$files = glob($subFolder . '/*');
				foreach ($files as $file) {
					//Make sure that this is a file and not a directory.
					if (is_file($file)) {
						//Use the unlink function to delete the file.
						unlink($file);
					}
				}
				rmdir($subFolder);
				$flag = true;
			}
			if ($flag) {
				$files2 = glob($folder . '/*');
				foreach ($files2 as $file) {
					//Make sure that this is a file and not a directory.
					if (is_file($file)) {
						//Use the unlink function to delete the file.
						unlink($file);
					}
				}
				rmdir($folder);
				$flag = true;
			}
		}
		return $flag;
	}

	public function getMainComboInfoByID() {
		$data = array();
		$sql = "SELECT
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_class,
df_maincombo.mcmb_relatetsub
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = :mcmb_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':mcmb_id', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

//	public function getNavbarSubFilterByID() {
//		$data = array();
//		$sql = "SELECT
//df_maincombo.mcmb_id,
//df_maincombo.mcmb_name,
//df_maincombo.mcmb_class,
//df_maincombo.mcmb_relatetsub
//FROM
//df_maincombo
//WHERE
//df_maincombo.mcmb_id = :mcmb_id";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->bindParam(':mcmb_id', $this->getMcmb_id(), PDO::PARAM_INT);
//			$readstmt->execute();
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[] = $row;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}

	public function getAllSubCombo() {
		$data = array();
		$sql = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name,
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_class,
df_maincombo.mcmb_img_folder_name,
df_maincombo.mcmb_img_values_have
FROM
df_subcombo
INNER JOIN df_maincombo ON df_subcombo.scmb_maincmb = df_maincombo.mcmb_id
WHERE
df_subcombo.scmb_maincmb = :scmb_maincmb AND";
		if (($this->getScmb_relationship() == 2) || ($this->getScmb_relationship() == 3)) {
			//1 - Main Combo, 2 - Relate Combo
			$sql .= " df_subcombo.scmb_relatecmb = :scmb_relatecmb AND";
		}
		$sql .= " df_subcombo.scmb_relationship = :scmb_relationship
ORDER BY
df_subcombo.scmb_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			if (($this->getScmb_relationship() == 2) || ($this->getScmb_relationship() == 3)) {
				//1 - Main Combo, 2 - Relate Combo
				$readstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			}
			$readstmt->bindParam(':scmb_relationship', $this->getScmb_relationship(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				if ($row['mcmb_img_values_have'] == 1) {
					$data[$i] = $row;
					$directory = "../../asset_imageuploader/" . $row['mcmb_img_folder_name'] . "/" . $row['scmb_id'] . "/";
					$files = scandir($directory);
					$files = array_diff($files, ['.', '..', 'thumbnail']);
					$files = array_values(array_filter($files));
					if ($files[0] == NULL) {
						$data[$i]['scmb_img'] = "#";
					} else {
						$data[$i]['scmb_img'] = $files[0];
					}
					$i++;
				} else {
					$data[] = $row;
				}
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllRelateCombo() {
		$data = array();
		$sql = "SELECT
df_relatecombo.rlcmb_id,
df_relatecombo.rlcmb_name,
df_relatecombo.rlcmb_maincmb,
df_maincombo.mcmb_img_folder_name,
df_maincombo.mcmb_img_values_have
FROM
df_relatecombo
INNER JOIN df_maincombo ON df_relatecombo.rlcmb_maincmb = df_maincombo.mcmb_id
WHERE
df_relatecombo.rlcmb_maincmb = :rlcmb_maincmb
ORDER BY
df_relatecombo.rlcmb_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				if ($row['mcmb_img_values_have'] == 1) {
					$data[$i] = $row;
					$directory = "../../asset_imageuploader/" . $row['mcmb_img_folder_name'] . "/" . $row['rlcmb_id'] . "/";
					$files = scandir($directory);
					$files = array_diff($files, ['.', '..', 'thumbnail']);
					$files = array_values(array_filter($files));
					if ($files[0] == NULL) {
						$data[$i]['rlcmb_img'] = "#";
					} else {
						$data[$i]['rlcmb_img'] = $files[0];
					}
					$i++;
				} else {
					$data[] = $row;
				}
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	function getAllRelateCMBFirstKeysFrom2ndRelateCMB($category, $sc_relate_cmb_id) {
		$first_sql = "SELECT
df_maincombo.mcmb_uplevelcmb_id AS first_cmb_fk
FROM
kn_adcategory_pagefilter
INNER JOIN kn_adcategory ON kn_adcategory_pagefilter.catfl_adcategory = kn_adcategory.adcat_id
INNER JOIN df_maincombo ON df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter
WHERE
kn_adcategory.adcat_name = '" . $category . "' AND
kn_adcategory_pagefilter.catfl_type = 1 AND
df_maincombo.mcmb_relation = 2 AND
kn_adcategory_pagefilter.catfl_filter = " . $sc_relate_cmb_id;

		$second_sql = "SELECT
df_relatecombo.rlcmb_id AS first_cmb_fk,
(SELECT
df_subcombo.scmb_id
FROM
df_subcombo
WHERE
df_subcombo.scmb_relatecmb = df_relatecombo.rlcmb_id
ORDER BY
df_subcombo.scmb_name ASC
LIMIT 1) AS second_cmb_fk,
(SELECT
df_subcombo.scmb_id
FROM
df_subcombo
WHERE
df_subcombo.scmb_relatecmb = second_cmb_fk
ORDER BY
df_subcombo.scmb_name ASC
LIMIT 1) AS third_cmb_fk
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_maincmb = :first_cmb_fk
ORDER BY
df_relatecombo.rlcmb_name ASC
LIMIT 1";
		try {
			$readstmt = $this->con->prepare($first_sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$readstmt_sc = $this->con->prepare($second_sql);
				$readstmt_sc->bindParam(':first_cmb_fk', $row->first_cmb_fk, PDO::PARAM_INT);
				$readstmt_sc->execute();
				while ($row_sc = $readstmt_sc->fetch(PDO::FETCH_ASSOC)) {
					$data[] = $row_sc;
				}
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbLoadHomeLocation() {
		$data = array();
		$selectBoxOptions = "";
		$sql_state_of_us = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = 27 AND
df_subcombo.scmb_relatecmb = 238";
		$sql_city_of_us = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name,
df_subcombo.scmb_relatecmb
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = 30 AND
df_subcombo.scmb_relatecmb = :state";
		try {
			$read_state = $this->getCon()->prepare($sql_state_of_us);
			$read_state->execute();
			while ($row_state = $read_state->fetch(PDO::FETCH_OBJ)) {
				$selectBoxOptions .= '<optgroup label="' . $row_state->scmb_name . '">';
				$read_city = $this->getCon()->prepare($sql_city_of_us);
				$read_city->bindParam(':state', $row_state->scmb_id, PDO::PARAM_INT);
				$read_city->execute();
				while ($row_city = $read_city->fetch(PDO::FETCH_OBJ)) {
					$selectBoxOptions .= '<option value="'.$row_city->scmb_id.'">'.$row_city->scmb_name.'</option>';
				}
				$selectBoxOptions .= '</optgroup>';
			}
			echo $selectBoxOptions;
		} catch (Exception $exc) {
			echo $selectBoxOptions;
		}
	}
	
	public function cmbLoadHomeCategory() {
		$data = array();
		$selectBoxOptions = "";
		$sql_maincat = "SELECT
df_relatecombo.rlcmb_id,
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_maincmb = 94";
		$sql_subcat = "SELECT
df_subcombo.scmb_name,
df_subcombo.scmb_id
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = 95 AND
df_subcombo.scmb_relatecmb = :subcat";
		try {
			$read_maincat = $this->getCon()->prepare($sql_maincat);
			$read_maincat->execute();
			while ($row_maincat = $read_maincat->fetch(PDO::FETCH_OBJ)) {
				$selectBoxOptions .= '<optgroup label="' . $row_maincat->rlcmb_name . '">';
				$read_subcat = $this->getCon()->prepare($sql_subcat);
				$read_subcat->bindParam(':subcat', $row_maincat->rlcmb_id, PDO::PARAM_INT);
				$read_subcat->execute();
				while ($row_subcat = $read_subcat->fetch(PDO::FETCH_OBJ)) {
					$selectBoxOptions .= '<option value="'.$row_subcat->scmb_id.'">'.$row_subcat->scmb_name.'</option>';
				}
				$selectBoxOptions .= '</optgroup>';
			}
			echo $selectBoxOptions;
		} catch (Exception $exc) {
			echo $selectBoxOptions;
		}
	}

	public function cmbRelateCombo() {
		$option = $this->getScmb_relationship();
		if ($option == 2) {
			$data = array();
			$sql = "SELECT
df_relatecombo.rlcmb_id,
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_maincmb = :rlcmb_maincmb
ORDER BY
df_relatecombo.rlcmb_name ASC";
			try {
				$readstmt = $this->con->prepare($sql);
				$readstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
				$readstmt->execute();
				while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
					$data[] = $row;
				}
				echo json_encode($data);
			} catch (Exception $exc) {
				echo json_encode($data);
			}
		} else if ($option == 3) {
			$data = array();
			$sql = "SELECT
df_subcombo.scmb_id AS rlcmb_id,
CONCAT_WS(' | ',df_relatecombo.rlcmb_name,df_subcombo.scmb_name) AS rlcmb_name
FROM
df_subcombo
INNER JOIN df_relatecombo ON df_subcombo.scmb_relatecmb = df_relatecombo.rlcmb_id
WHERE
df_subcombo.scmb_maincmb = :rlcmb_maincmb";
			try {
				$readstmt = $this->con->prepare($sql);
				$readstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
				$readstmt->execute();
				while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
					$data[] = $row;
				}
				echo json_encode($data);
			} catch (Exception $exc) {
				echo json_encode($data);
			}
		}
	}

	public function getCmbRelateComboFirstID() {
		$id = 0;
		$sql = "SELECT
df_relatecombo.rlcmb_id,
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_maincmb = :rlcmb_maincmb
ORDER BY
df_relatecombo.rlcmb_name ASC
LIMIT 1";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$id = $row->rlcmb_id;
			}
			echo $id;
		} catch (Exception $exc) {
			echo $id;
		}
	}

	public function getCmbRelateSubComboFirstID() {
		$id = 0;
		$sql = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = :scmb_maincmb AND
df_subcombo.scmb_relatecmb = :scmb_relatecmb AND
df_subcombo.scmb_relationship = 3
ORDER BY
df_subcombo.scmb_name ASC
LIMIT 1";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			$readstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$id = $row->rlcmb_id;
			}
			echo $id;
		} catch (Exception $exc) {
			echo $id;
		}
	}

	public function cmbRelateSubCombo() {
		$data = array();
		$sql = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = :scmb_maincmb AND
df_subcombo.scmb_relatecmb = :scmb_relatecmb
ORDER BY
df_subcombo.scmb_name ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->bindParam(':scmb_relatecmb', $this->getRlcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbRelateSubComboWidget() {
		$data = array();
		$sql = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name,
df_subcombo.scmb_maincmb,
df_subcombo.scmb_relatecmb,
df_subcombo.scmb_relationship
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = :scmb_maincmb";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getCmbByTOPRelateSubComboCheck() {
		$sqlcheck = "SELECT
df_maincombo.mcmb_relation
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = :mcmb_id AND
df_maincombo.mcmb_relation = :mcmb_relation";
		try {
			$readstmt_check = $this->con->prepare($sqlcheck);
			$readstmt_check->bindParam(':mcmb_id', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt_check->bindParam(':mcmb_relation', $this->getScmb_relationship(), PDO::PARAM_INT);
			$readstmt_check->execute();
			$check = $readstmt_check->rowCount();

			if ($check > 0) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (Exception $exc) {
			echo 0;
		}
	}

	public function getCmbByTOPRelateSubComboID() {
		$data = array();
		$sql = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_relationship = :scmb_relationship AND
df_subcombo.scmb_relatecmb = :scmb_relatecmb
ORDER BY
df_subcombo.scmb_name ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_relationship', $this->getScmb_relationship(), PDO::PARAM_INT);
			$readstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbRelateSubComboRelation() {
		$data = array();
		$sql = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = :scmb_maincmb AND
df_subcombo.scmb_relatecmb = :scmb_relatecmb AND
df_subcombo.scmb_relationship = :scmb_relationship
ORDER BY
df_subcombo.scmb_name ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			$readstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			$readstmt->bindParam(':scmb_relationship', $this->getScmb_relationship(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbRelateSubComboRelationSelected() {
		$data = array();
		$sql = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = :scmb_maincmb AND
df_subcombo.scmb_relatecmb = :scmb_relatecmb AND
df_subcombo.scmb_relationship = :scmb_relationship
ORDER BY
df_subcombo.scmb_name ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			$readstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			$readstmt->bindParam(':scmb_relationship', $this->getScmb_relationship(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbSubCombo() {
		$data = array();
		$sql = "SELECT
df_subcombo.scmb_id,
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = :scmb_maincmb";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getSubComboByID() {
		$data = array();
		$sql = "SELECT
df_subcombo.scmb_name,
df_subcombo.scmb_id,
df_subcombo.scmb_relatecmb
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = :scmb_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_id', $this->getScmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getRelateComboByID() {
		$data = array();
		$sql = "SELECT
df_relatecombo.rlcmb_id,
df_relatecombo.rlcmb_name,
df_relatecombo.rlcmb_maincmb
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = :rlcmb_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rlcmb_id', $this->getRlcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function saveSubCombo() {
		$sql = "INSERT INTO `df_subcombo` (`scmb_name`, `scmb_maincmb`, `scmb_relatecmb`, `scmb_relationship`) VALUES (:scmb_name, :scmb_maincmb, :scmb_relatecmb, :scmb_relationship);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':scmb_name', $this->getScmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			if ($this->getScmb_relatecmb() == 0) {
				$myNull = null;
				$createstmt->bindParam(':scmb_relatecmb', $myNull, PDO::PARAM_NULL);
			} else {
				$createstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			}
			$createstmt->bindParam(':scmb_relationship', $this->getScmb_relationship(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
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

	public function saveRelateCombo() {
		$sql = "INSERT INTO `df_relatecombo` (`rlcmb_name`, `rlcmb_maincmb`) VALUES (:rlcmb_name, :rlcmb_maincmb);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rlcmb_name', $this->getRlcmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
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

	public function deleteSubCombo($mcmb_img_values_have, $mcmb_img_folder_path) {
		$sql = "DELETE FROM `df_subcombo` WHERE (`scmb_id`=:scmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':scmb_id', $this->getScmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				if ($mcmb_img_values_have == 1) {
					$this->delete_folder($mcmb_img_folder_path);
				}
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteRelateCombo($mcmb_img_values_have, $mcmb_img_folder_path) {
		$sql = "DELETE FROM `df_relatecombo` WHERE (`rlcmb_id` = :rlcmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rlcmb_id', $this->getRlcmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				if ($mcmb_img_values_have == 1) {
					$this->delete_folder($mcmb_img_folder_path);
				}
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editSubCombo() {
		$sql = "UPDATE `df_subcombo` SET `scmb_name`=:scmb_name WHERE (`scmb_id` = :scmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':scmb_name', $this->getScmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':scmb_id', $this->getScmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editRelateSubCombo() {
		$sql = "UPDATE `df_subcombo` SET `scmb_name`=:scmb_name, `scmb_relatecmb` = :scmb_relatecmb WHERE (`scmb_id` = :scmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':scmb_name', $this->getScmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':scmb_id', $this->getScmb_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editRelateCombo() {
		$sql = "UPDATE `df_relatecombo` SET `rlcmb_name`=:rlcmb_name WHERE (`rlcmb_id` = :rlcmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rlcmb_name', $this->getRlcmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rlcmb_id', $this->getRlcmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

}
