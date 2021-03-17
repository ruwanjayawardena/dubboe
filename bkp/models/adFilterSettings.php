<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

class AdFilterSettings extends ConnectDB {

	private $flag = false;
	private $grp_id;
	private $grp_name;
	private $grp_admaincategory;
	private $grp_adsubcategory;
	private $grp_disp_order;
	private $grinf_id;
	private $grinf_group;
	private $grinf_filter;
	private $grinf_filtertype;
	private $catfl_id;
	private $catfl_type;
	private $catfl_filter;
	private $catfl_admaincategory;
	private $catfl_adsubcategory;

	public function getGrp_disp_order() {
		return $this->grp_disp_order;
	}

	public function setGrp_disp_order($grp_disp_order) {
		$this->grp_disp_order = $grp_disp_order;
		return $this;
	}	
	
	public function getGrinf_filtertype() {
		return $this->grinf_filtertype;
	}

	public function setGrinf_filtertype($grinf_filtertype) {
		$this->grinf_filtertype = $grinf_filtertype;
		return $this;
	}		

	public function getFlag() {
		return $this->flag;
	}

	public function getGrp_id() {
		return $this->grp_id;
	}

	public function getGrp_name() {
		return $this->grp_name;
	}

	public function getGrp_admaincategory() {
		return $this->grp_admaincategory;
	}

	public function getGrp_adsubcategory() {
		return $this->grp_adsubcategory;
	}

	public function getGrinf_id() {
		return $this->grinf_id;
	}

	public function getGrinf_group() {
		return $this->grinf_group;
	}

	public function getGrinf_filter() {
		return $this->grinf_filter;
	}

	public function getCatfl_id() {
		return $this->catfl_id;
	}

	public function getCatfl_type() {
		return $this->catfl_type;
	}

	public function getCatfl_filter() {
		return $this->catfl_filter;
	}

	public function getCatfl_admaincategory() {
		return $this->catfl_admaincategory;
	}

	public function getCatfl_adsubcategory() {
		return $this->catfl_adsubcategory;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setGrp_id($grp_id) {
		$this->grp_id = $grp_id;
		return $this;
	}

	public function setGrp_name($grp_name) {
		$this->grp_name = $grp_name;
		return $this;
	}

	public function setGrp_admaincategory($grp_admaincategory) {
		$this->grp_admaincategory = $grp_admaincategory;
		return $this;
	}

	public function setGrp_adsubcategory($grp_adsubcategory) {
		$this->grp_adsubcategory = $grp_adsubcategory;
		return $this;
	}

	public function setGrinf_id($grinf_id) {
		$this->grinf_id = $grinf_id;
		return $this;
	}

	public function setGrinf_group($grinf_group) {
		$this->grinf_group = $grinf_group;
		return $this;
	}

	public function setGrinf_filter($grinf_filter) {
		$this->grinf_filter = $grinf_filter;
		return $this;
	}

	public function setCatfl_id($catfl_id) {
		$this->catfl_id = $catfl_id;
		return $this;
	}

	public function setCatfl_type($catfl_type) {
		$this->catfl_type = $catfl_type;
		return $this;
	}

	public function setCatfl_filter($catfl_filter) {
		$this->catfl_filter = $catfl_filter;
		return $this;
	}

	public function setCatfl_admaincategory($catfl_admaincategory) {
		$this->catfl_admaincategory = $catfl_admaincategory;
		return $this;
	}

	public function setCatfl_adsubcategory($catfl_adsubcategory) {
		$this->catfl_adsubcategory = $catfl_adsubcategory;
		return $this;
	}

	public function tblAdcatPageFilter() {
		$data = array();
		$sql = "SELECT
kn_adcategory_pagefilter.catfl_id,
kn_adcategory_pagefilter.catfl_type,
kn_adcategory_pagefilter.catfl_filter,
kn_adcategory_pagefilter.catfl_admaincategory,
kn_adcategory_pagefilter.catfl_adsubcategory,
IF(kn_adcategory_pagefilter.catfl_type = 2,(SELECT
kn_textrange_filter.txfl_name
FROM
kn_textrange_filter
WHERE
kn_textrange_filter.txfl_id = kn_adcategory_pagefilter.catfl_filter),(SELECT
df_maincombo.mcmb_name
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter)) AS catfl_filter_name
FROM
kn_adcategory_pagefilter
WHERE
kn_adcategory_pagefilter.catfl_admaincategory = :catfl_admaincategory AND
kn_adcategory_pagefilter.catfl_adsubcategory = :catfl_adsubcategory
ORDER BY
kn_adcategory_pagefilter.catfl_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':catfl_admaincategory', $this->getCatfl_admaincategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':catfl_adsubcategory', $this->getCatfl_adsubcategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function tblAdcatPageFilterByOrder() {
		$data = array();
		$sql = "SELECT
kn_adcategory_pagefilter.catfl_id,
kn_adcategory_pagefilter.catfl_type,
kn_adcategory_pagefilter.catfl_filter,
IF(kn_adcategory_pagefilter.catfl_type = 2,(SELECT
kn_textrange_filter.txfl_name
FROM
kn_textrange_filter
WHERE
kn_textrange_filter.txfl_id = kn_adcategory_pagefilter.catfl_filter),(SELECT
df_maincombo.mcmb_name
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter)) AS catfl_filter_name,
kn_filtergroup.grp_disp_order,
kn_filtergroup.grp_id
FROM
kn_adcategory_pagefilter
INNER JOIN kn_filtergroup_info ON kn_adcategory_pagefilter.catfl_filter = kn_filtergroup_info.grinf_filter AND kn_adcategory_pagefilter.catfl_type = kn_filtergroup_info.grinf_filtertype
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
WHERE
kn_adcategory_pagefilter.catfl_admaincategory = :catfl_admaincategory AND
kn_adcategory_pagefilter.catfl_adsubcategory = :catfl_adsubcategory
ORDER BY
kn_adcategory_pagefilter.catfl_filter ASC,
kn_filtergroup.grp_disp_order ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':catfl_admaincategory', $this->getCatfl_admaincategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':catfl_adsubcategory', $this->getCatfl_adsubcategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function categoryComboBoxFiltersByOrder() {
		$data = array();
		$sql = "SELECT
df_maincombo.mcmb_name,
df_maincombo.mcmb_class,
df_maincombo.mcmb_relatetsub,
df_maincombo.mcmb_display_text,
df_maincombo.mcmb_relation,
df_maincombo.mcmb_uplevelcmb_id,
df_maincombo.mcmb_img_values_have,
df_maincombo.mcmb_img_folder_name,
df_maincombo.mcmb_id,
kn_filtergroup.grp_disp_order,
kn_filtergroup.grp_id,
IF(df_maincombo.mcmb_relation = 2,(SELECT
df_relatecombo.rlcmb_id
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_maincmb = df_maincombo.mcmb_uplevelcmb_id
ORDER BY
df_relatecombo.rlcmb_name ASC
LIMIT 1),0) AS firstcombofirstval,
IF(df_maincombo.mcmb_relation = 2,(SELECT
df_subcombo.scmb_id
FROM
df_subcombo
WHERE
df_subcombo.scmb_maincmb = df_maincombo.mcmb_id AND
df_subcombo.scmb_relatecmb = firstcombofirstval
ORDER BY
df_subcombo.scmb_name ASC
LIMIT 1),0) AS secondcombofirstval
FROM
kn_adcategory_pagefilter
INNER JOIN kn_filtergroup_info ON kn_adcategory_pagefilter.catfl_filter = kn_filtergroup_info.grinf_filter AND kn_adcategory_pagefilter.catfl_type = kn_filtergroup_info.grinf_filtertype
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN df_maincombo ON kn_adcategory_pagefilter.catfl_filter = df_maincombo.mcmb_id
WHERE
kn_adcategory_pagefilter.catfl_admaincategory = :catfl_admaincategory AND
kn_adcategory_pagefilter.catfl_adsubcategory = :catfl_adsubcategory AND
kn_adcategory_pagefilter.catfl_type = 1
GROUP BY
df_maincombo.mcmb_id
ORDER BY
df_maincombo.mcmb_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':catfl_admaincategory', $this->getCatfl_admaincategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':catfl_adsubcategory', $this->getCatfl_adsubcategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function categoryTextBoxFiltersByOrder() {
		$data = array();
		$sql = "SELECT
kn_textrange_filter.txfl_name,
kn_textrange_filter.txfl_id_name,
kn_textrange_filter.txfl_id,
kn_filtergroup.grp_disp_order,
kn_filtergroup.grp_id
FROM
kn_adcategory_pagefilter
INNER JOIN kn_filtergroup_info ON kn_adcategory_pagefilter.catfl_filter = kn_filtergroup_info.grinf_filter AND kn_adcategory_pagefilter.catfl_type = kn_filtergroup_info.grinf_filtertype
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN kn_textrange_filter ON kn_adcategory_pagefilter.catfl_filter = kn_textrange_filter.txfl_id
WHERE
kn_adcategory_pagefilter.catfl_admaincategory = :catfl_admaincategory AND
kn_adcategory_pagefilter.catfl_adsubcategory = :catfl_adsubcategory AND
kn_adcategory_pagefilter.catfl_type = 2
ORDER BY
kn_filtergroup.grp_disp_order ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':catfl_admaincategory', $this->getCatfl_admaincategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':catfl_adsubcategory', $this->getCatfl_adsubcategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAdcatPageFilterByID() {
		$data = array();
		$sql = "SELECT
kn_adcategory_pagefilter.catfl_id,
kn_adcategory_pagefilter.catfl_type,
kn_adcategory_pagefilter.catfl_filter,
kn_adcategory_pagefilter.catfl_admaincategory,
kn_adcategory_pagefilter.catfl_adsubcategory,
IF(kn_adcategory_pagefilter.catfl_type = 2,(SELECT
kn_textrange_filter.txfl_name
FROM
kn_textrange_filter
WHERE
kn_textrange_filter.txfl_id = kn_adcategory_pagefilter.catfl_filter),(SELECT
df_maincombo.mcmb_name
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter)) AS catfl_filter_name
FROM
kn_adcategory_pagefilter
WHERE
kn_adcategory_pagefilter.catfl_id = :catfl_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':catfl_id', $this->getCatfl_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function deleteAdcatPageFilter() {
		$sql = "DELETE FROM `kn_adcategory_pagefilter` WHERE (`catfl_id`=:catfl_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':catfl_id', $this->getCatfl_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! delete failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function saveAdcatPageFilter() {
		$sql = "INSERT INTO `kn_adcategory_pagefilter` (`catfl_admaincategory`, `catfl_adsubcategory`, `catfl_type`, `catfl_filter`) VALUES (:catfl_admaincategory, :catfl_adsubcategory, :catfl_type, :catfl_filter);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':catfl_admaincategory', $this->getCatfl_admaincategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':catfl_adsubcategory', $this->getCatfl_adsubcategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':catfl_type', $this->getCatfl_type(), PDO::PARAM_INT);
			$createstmt->bindParam(':catfl_filter', $this->getCatfl_filter(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Added"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry adding failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function editAdcatPageFilter() {
		$sql = "UPDATE `kn_adcategory_pagefilter` SET `catfl_adcategory`=:catfl_adcategory, `catfl_type`=:catfl_type, `catfl_filter`=:catfl_filter,`catfl_admaincategory`=:catfl_admaincategory ,  `catfl_adsubcategory`=:catfl_adsubcategory WHERE (`catfl_id` = :catfl_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':catfl_admaincategory', $this->getCatfl_admaincategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':catfl_adsubcategory', $this->getCatfl_adsubcategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':catfl_type', $this->getCatfl_type(), PDO::PARAM_INT);
			$createstmt->bindParam(':catfl_filter', $this->getCatfl_filter(), PDO::PARAM_INT);
			$createstmt->bindParam(':catfl_id', $this->getCatfl_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry update failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function saveFilterGroup() {
		$sql = "INSERT INTO `kn_filtergroup` (`grp_name`,`grp_admaincategory`,`grp_adsubcategory`) VALUES (:grp_name,:grp_admaincategory,:grp_adsubcategory);";

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grp_admaincategory', $this->getGrp_admaincategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':grp_adsubcategory', $this->getGrp_adsubcategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':grp_name', $this->getGrp_name(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Added"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry adding failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function editFilterGroup() {
		$sql = "UPDATE `kn_filtergroup` SET `grp_name`=:grp_name, `grp_admaincategory`=:grp_admaincategory, `grp_adsubcategory` =:grp_adsubcategory WHERE (`grp_id` = :grp_id);";

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grp_id', $this->getGrp_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':grp_adsubcategory', $this->getGrp_adsubcategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':grp_admaincategory', $this->getGrp_admaincategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':grp_name', $this->getGrp_name(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Edited"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Editing Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function deleteFilterGroup() {
		$sql = "DELETE FROM `kn_filtergroup` WHERE (`grp_id`=:grp_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grp_id', $this->getGrp_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! delete failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function getFilterGroupByID() {
		$data = array();
		$sql = "SELECT
kn_filtergroup.grp_id,
kn_filtergroup.grp_name,
kn_filtergroup.grp_admaincategory,
kn_filtergroup.grp_adsubcategory
FROM
kn_filtergroup
WHERE
kn_filtergroup.grp_id = :grp_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grp_id', $this->getGrp_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblFilterGroup() {
		$data = array();
		$sql = "SELECT
kn_filtergroup.grp_id,
kn_filtergroup.grp_name,
kn_filtergroup.grp_admaincategory,
kn_filtergroup.grp_adsubcategory,
kn_filtergroup.grp_disp_order
FROM
kn_filtergroup
WHERE
kn_filtergroup.grp_admaincategory = :grp_admaincategory AND
kn_filtergroup.grp_adsubcategory = :grp_adsubcategory
ORDER BY
kn_filtergroup.grp_id DESC
";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grp_admaincategory', $this->getGrp_admaincategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':grp_adsubcategory', $this->getGrp_adsubcategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function getMainCatSubCatIDsByText($maincategory,$subcategory) {
		$main = 0;
		$sub = 0;
		$sql = "SELECT
df_subcombo.scmb_id
FROM
df_subcombo
WHERE
df_subcombo.scmb_name = :scmb_name";
		$sql2 = "SELECT
df_relatecombo.rlcmb_id
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_name = :rlcmb_name
GROUP BY
df_relatecombo.rlcmb_name";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_name', $subcategory, PDO::PARAM_STR);			
			$readstmt->execute();
			$readstmt2 = $this->con->prepare($sql2);
			$readstmt2->bindParam(':rlcmb_name', $maincategory, PDO::PARAM_STR);			
			$readstmt2->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$sub = $row->scmb_id;
			}				
			while ($row2 = $readstmt2->fetch(PDO::FETCH_OBJ)) {
				$main = $row2->rlcmb_id;
			}
			
			echo json_encode(array("maincat" => $main, "subcat" => $sub));
		} catch (Exception $exc) {
			echo json_encode(array("maincat" => $main, "subcat" => $sub));
		}
	}
	
	public function getFilterGroupByOrder() {			
		$data = array();
		$sql = "SELECT
kn_filtergroup.grp_id,
kn_filtergroup.grp_name,
kn_filtergroup.grp_admaincategory,
kn_filtergroup.grp_adsubcategory,
kn_filtergroup.grp_disp_order
FROM
kn_filtergroup
WHERE
kn_filtergroup.grp_admaincategory = :grp_admaincategory AND
kn_filtergroup.grp_adsubcategory = :grp_adsubcategory
ORDER BY
kn_filtergroup.grp_disp_order ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grp_admaincategory', $this->getGrp_admaincategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':grp_adsubcategory', $this->getGrp_adsubcategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
//			echo "<pre>".$data."/<pre>";
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function tblPageAllFilterGroupsByCategory() {
		$data = array();
		$sql = "SELECT
kn_filtergroup.grp_id,
kn_filtergroup.grp_name,
kn_filtergroup.grp_admaincategory,
kn_filtergroup.grp_adsubcategory
FROM
kn_filtergroup
WHERE
kn_filtergroup.grp_admaincategory = :grp_admaincategory AND
kn_filtergroup.grp_adsubcategory = :grp_adsubcategory
ORDER BY
kn_filtergroup.grp_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grp_admaincategory', $this->getGrp_admaincategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':grp_adsubcategory', $this->getGrp_adsubcategory(), PDO::PARAM_INT);
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
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbCategoryFilterByCategory() {
		$data = array();
		$sql = "SELECT
kn_adcategory_pagefilter.catfl_type,
kn_adcategory_pagefilter.catfl_filter,
IF(kn_adcategory_pagefilter.catfl_type = 2,(SELECT
kn_textrange_filter.txfl_name
FROM
kn_textrange_filter
WHERE
kn_textrange_filter.txfl_id = kn_adcategory_pagefilter.catfl_filter),(SELECT
df_maincombo.mcmb_name
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter)) AS catfl_filter_name
FROM
kn_adcategory_pagefilter
WHERE
kn_adcategory_pagefilter.catfl_admaincategory = :catfl_admaincategory AND
kn_adcategory_pagefilter.catfl_adsubcategory = :catfl_adsubcategory
ORDER BY
kn_adcategory_pagefilter.catfl_id DESC";
//		$sql = "SELECT
//df_maincombo.mcmb_name,
//df_maincombo.mcmb_relation,
//df_maincombo.mcmb_uplevelcmb_id,
//df_maincombo.mcmb_id,
//df_maincombo.mcmb_class
//FROM
//kn_adcategory_pagefilter
//INNER JOIN df_maincombo ON df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter
//WHERE
//kn_adcategory_pagefilter.catfl_type = 1 AND
//kn_adcategory_pagefilter.catfl_admaincategory = :catfl_admaincategory AND
//kn_adcategory_pagefilter.catfl_adsubcategory = :catfl_adsubcategory AND
//df_maincombo.mcmb_id NOT IN (SELECT
//kn_filtergroup_info.grinf_filter
//FROM
//kn_filtergroup_info
//WHERE
//kn_filtergroup_info.grinf_filter)
//ORDER BY
//df_maincombo.mcmb_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':catfl_admaincategory', $this->getCatfl_admaincategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':catfl_adsubcategory', $this->getCatfl_adsubcategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function saveGroupFilterInfo() {
		$sql = "INSERT INTO `kn_filtergroup_info` (`grinf_group`, `grinf_filter`,`grinf_filtertype`) VALUES (:grinf_group, :grinf_filter,:grinf_filtertype);";

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grinf_group', $this->getGrinf_group(), PDO::PARAM_INT);
			$createstmt->bindParam(':grinf_filter', $this->getGrinf_filter(), PDO::PARAM_INT);
			$createstmt->bindParam(':grinf_filtertype', $this->getGrinf_filtertype(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Added"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Adding Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}
	
	public function setGroupFilterOrder() {
		$sql = "UPDATE `kn_filtergroup` SET `grp_disp_order`=:grp_disp_order WHERE (`grp_id`=:grp_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grp_id', $this->getGrp_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':grp_disp_order', $this->getGrp_disp_order(), PDO::PARAM_INT);			
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Assigning Done"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Assigning Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function tblgroupFilterInfo() {
		$data = array();
//		$sql = "SELECT
//kn_filtergroup_info.grinf_id,
//df_maincombo.mcmb_uplevelcmb_id,
//df_maincombo.mcmb_relation,
//df_maincombo.mcmb_display_text,
//df_maincombo.mcmb_class,
//df_maincombo.mcmb_name,
//df_maincombo.mcmb_id
//FROM
//kn_filtergroup_info
//INNER JOIN df_maincombo ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
//WHERE
//kn_filtergroup_info.grinf_group = :grinf_group
//ORDER BY
//kn_filtergroup_info.grinf_id ASC";
		$sql = "SELECT
kn_filtergroup_info.grinf_id,
kn_filtergroup_info.grinf_filter,
IF(kn_filtergroup_info.grinf_filtertype = 2,(SELECT
kn_textrange_filter.txfl_name
FROM
kn_textrange_filter
WHERE
kn_textrange_filter.txfl_id = kn_filtergroup_info.grinf_filter),(SELECT
df_maincombo.mcmb_name
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = kn_filtergroup_info.grinf_filter)) AS grinf_filter_name
FROM
kn_filtergroup_info
WHERE
kn_filtergroup_info.grinf_group = :grinf_group
ORDER BY
kn_filtergroup_info.grinf_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grinf_group', $this->getGrinf_group(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function deleteGroupFilterInfo() {
		$sql = "DELETE FROM `kn_filtergroup_info` WHERE (`grinf_id`=:grinf_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grinf_id', $this->getGrinf_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! delete failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
