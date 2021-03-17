<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class Kn_advModel extends ConnectDB {

	private $flag = false;
	//kn_adcategory
	private $adcat_id;
	private $adcat_name;
	//kn_adcategory_pagefilter
	private $catfl_id;
	private $catfl_adcategory;
	private $catfl_type;
	private $catfl_filter;
	//kn_filtergroup
	private $grp_id;
	private $grp_name;
	private $grp_adcategory;
	//kn_filtergroup_info
	private $grinf_id;
	private $grinf_group;
	private $grinf_filter;
	//kn_ad
	private $ad_id;
	private $ad_usr;
	private $ad_category;
	private $ad_title;
	private $ad_phone;
	private $ad_email;
	private $ad_description;
	private $ad_created_date;
	private $ad_created_time;
	private $ad_status;
	private $ad_soc_fb;
	private $ad_soc_ig;
	private $ad_soc_twitter;

	public function getAd_id() {
		return $this->ad_id;
	}

	public function getAd_usr() {
		return $this->ad_usr;
	}

	public function getAd_category() {
		return $this->ad_category;
	}

	public function getAd_title() {
		return $this->ad_title;
	}

	public function getAd_phone() {
		return $this->ad_phone;
	}

	public function getAd_email() {
		return $this->ad_email;
	}

	public function getAd_description() {
		return $this->ad_description;
	}

	public function getAd_created_date() {
		return $this->ad_created_date;
	}

	public function getAd_created_time() {
		return $this->ad_created_time;
	}

	public function getAd_status() {
		return $this->ad_status;
	}

	public function getAd_soc_fb() {
		return $this->ad_soc_fb;
	}

	public function getAd_soc_ig() {
		return $this->ad_soc_ig;
	}

	public function getAd_soc_twitter() {
		return $this->ad_soc_twitter;
	}

	public function setAd_id($ad_id) {
		$this->ad_id = $ad_id;
		return $this;
	}

	public function setAd_usr($ad_usr) {
		$this->ad_usr = $ad_usr;
		return $this;
	}

	public function setAd_category($ad_category) {
		$this->ad_category = $ad_category;
		return $this;
	}

	public function setAd_title($ad_title) {
		$this->ad_title = $ad_title;
		return $this;
	}

	public function setAd_phone($ad_phone) {
		$this->ad_phone = $ad_phone;
		return $this;
	}

	public function setAd_email($ad_email) {
		$this->ad_email = $ad_email;
		return $this;
	}

	public function setAd_description($ad_description) {
		$this->ad_description = $ad_description;
		return $this;
	}

	public function setAd_created_date($ad_created_date) {
		$this->ad_created_date = $ad_created_date;
		return $this;
	}

	public function setAd_created_time($ad_created_time) {
		$this->ad_created_time = $ad_created_time;
		return $this;
	}

	public function setAd_status($ad_status) {
		$this->ad_status = $ad_status;
		return $this;
	}

	public function setAd_soc_fb($ad_soc_fb) {
		$this->ad_soc_fb = $ad_soc_fb;
		return $this;
	}

	public function setAd_soc_ig($ad_soc_ig) {
		$this->ad_soc_ig = $ad_soc_ig;
		return $this;
	}

	public function setAd_soc_twitter($ad_soc_twitter) {
		$this->ad_soc_twitter = $ad_soc_twitter;
		return $this;
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

	public function getGrp_id() {
		return $this->grp_id;
	}

	public function getGrp_name() {
		return $this->grp_name;
	}

	public function getGrp_adcategory() {
		return $this->grp_adcategory;
	}

	public function setGrp_id($grp_id) {
		$this->grp_id = $grp_id;
		return $this;
	}

	public function setGrp_name($grp_name) {
		$this->grp_name = $grp_name;
		return $this;
	}

	public function setGrp_adcategory($grp_adcategory) {
		$this->grp_adcategory = $grp_adcategory;
		return $this;
	}

	function getFlag() {
		return $this->flag;
	}

	function getAdcat_id() {
		return $this->adcat_id;
	}

	function getAdcat_name() {
		return $this->adcat_name;
	}

	function setFlag($flag) {
		$this->flag = $flag;
	}

	function setAdcat_id($adcat_id) {
		$this->adcat_id = $adcat_id;
	}

	function setAdcat_name($adcat_name) {
		$this->adcat_name = $adcat_name;
	}

	public function getCatfl_id() {
		return $this->catfl_id;
	}

	public function getCatfl_adcategory() {
		return $this->catfl_adcategory;
	}

	public function getCatfl_type() {
		return $this->catfl_type;
	}

	public function getCatfl_filter() {
		return $this->catfl_filter;
	}

	public function setCatfl_id($catfl_id) {
		$this->catfl_id = $catfl_id;
		return $this;
	}

	public function setCatfl_adcategory($catfl_adcategory) {
		$this->catfl_adcategory = $catfl_adcategory;
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

	public function tblAdcategory() {
		$data = array();
		$sql = "SELECT
kn_adcategory.adcat_id,
kn_adcategory.adcat_name
FROM
kn_adcategory
ORDER BY
kn_adcategory.adcat_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/adcategory/" . $row['adcat_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['adcat_img'] = "#";
				} else {
					$data[$i]['adcat_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblAdcatPageFilter() {
		$data = array();
		$sql = "SELECT
kn_adcategory_pagefilter.catfl_id,
kn_adcategory_pagefilter.catfl_adcategory,
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
kn_adcategory_pagefilter.catfl_adcategory = :catfl_adcategory
ORDER BY
kn_adcategory_pagefilter.catfl_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':catfl_adcategory', $this->getCatfl_adcategory(), PDO::PARAM_INT);
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
kn_filtergroup.grp_adcategory
FROM
kn_filtergroup
WHERE
kn_filtergroup.grp_adcategory = :grp_adcategory
ORDER BY
kn_filtergroup.grp_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':grp_adcategory', $this->getGrp_adcategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getFilterGroupByCategoryName() {
		$data = array();
		$sql = "SELECT
kn_filtergroup.grp_id,
kn_filtergroup.grp_name
FROM
kn_filtergroup
INNER JOIN kn_adcategory ON kn_filtergroup.grp_adcategory = kn_adcategory.adcat_id
WHERE
kn_adcategory.adcat_name = :adcat_name
ORDER BY
kn_filtergroup.grp_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getFilterByCategoryNameWithGroups() {
		$data = array();
		$sql = "SELECT
df_maincombo.mcmb_name,
df_maincombo.mcmb_class,
df_maincombo.mcmb_id,
df_maincombo.mcmb_display_text,
df_maincombo.mcmb_relation,
df_maincombo.mcmb_uplevelcmb_id,
kn_filtergroup_info.grinf_group
FROM
kn_adcategory_pagefilter
INNER JOIN kn_adcategory ON kn_adcategory_pagefilter.catfl_adcategory = kn_adcategory.adcat_id
INNER JOIN df_maincombo ON df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter
INNER JOIN kn_filtergroup_info ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
WHERE
kn_adcategory.adcat_name = :adcat_name AND
kn_adcategory_pagefilter.catfl_type = 1
ORDER BY
df_maincombo.mcmb_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblgroupFilterInfo() {
		$data = array();
		$sql = "SELECT
kn_filtergroup_info.grinf_id,
df_maincombo.mcmb_uplevelcmb_id,
df_maincombo.mcmb_relation,
df_maincombo.mcmb_display_text,
df_maincombo.mcmb_class,
df_maincombo.mcmb_name,
df_maincombo.mcmb_id
FROM
kn_filtergroup_info
INNER JOIN df_maincombo ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
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

	public function getFilterGroupByID() {
		$data = array();
		$sql = "SELECT
kn_filtergroup.grp_id,
kn_filtergroup.grp_name,
kn_filtergroup.grp_adcategory
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

	public function getAllAdcategory() {
		$data = array();
		$sql = "SELECT
kn_adcategory.adcat_id,
kn_adcategory.adcat_name
FROM
kn_adcategory
ORDER BY
kn_adcategory.adcat_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/adcategory/" . $row['adcat_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['adcat_img'] = "#";
				} else {
					$data[$i]['adcat_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAdcategoryByID() {
		$data = array();
		$sql = "SELECT
kn_adcategory.adcat_id,
kn_adcategory.adcat_name
FROM
kn_adcategory
WHERE
kn_adcategory.adcat_id = :adcat_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adcat_id', $this->getAdcat_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/adcategory/" . $row['adcat_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['adcat_img'] = "#";
				} else {
					$data[$i]['adcat_img'] = $files[0];
				}
				$i++;
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
kn_adcategory_pagefilter.catfl_adcategory,
kn_adcategory_pagefilter.catfl_type,
IF(kn_adcategory_pagefilter.catfl_type = 1,(SELECT
df_maincombo.mcmb_name
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter),(SELECT
kn_textrange_filter.txfl_name
FROM
kn_textrange_filter
WHERE
kn_textrange_filter.txfl_id = kn_adcategory_pagefilter.catfl_filter)) AS filter_name,
kn_adcategory_pagefilter.catfl_filter
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

	public function getAdcategoryByName() {
		$data = array();
		$sql = "SELECT
kn_adcategory.adcat_id,
kn_adcategory.adcat_name
FROM
kn_adcategory
WHERE
kn_adcategory.adcat_name = :adcat_name";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/adcategory/" . $row['adcat_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['adcat_img'] = "#";
				} else {
					$data[$i]['adcat_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbAdcategory() {
		$data = array();
		$sql = "SELECT
kn_adcategory.adcat_id,
kn_adcategory.adcat_name
FROM
kn_adcategory
ORDER BY
kn_adcategory.adcat_name ASC";
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

	public function cmbAllComboBoxFilter() {
		$data = array();
		$sql = "SELECT
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_display_text,
df_maincombo.mcmb_relation,
df_maincombo.mcmb_uplevelcmb_id
FROM
df_maincombo
ORDER BY
df_maincombo.mcmb_name ASC";
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

	public function cmbAllTextBoxFilter() {
		$data = array();
		$sql = "SELECT
kn_textrange_filter.txfl_id,
kn_textrange_filter.txfl_name
FROM
kn_textrange_filter
ORDER BY
kn_textrange_filter.txfl_name ASC";
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

	public function loadAlladsByCategory() {
		$data = array();
		$data_opt = array();
//		$newarr = array();
		$sql = "SELECT
kn_ad.ad_id,
kn_ad.ad_usr,
kn_ad.ad_category,
kn_ad.ad_title,
kn_ad.ad_phone,
kn_ad.ad_email,
kn_ad.ad_description,
kn_ad.ad_created_date,
kn_ad.ad_created_time,
kn_ad.ad_status,
kn_ad.ad_soc_fb,
kn_ad.ad_soc_ig,
kn_ad.ad_soc_twitter
FROM
kn_ad
INNER JOIN kn_adcategory ON kn_ad.ad_category = kn_adcategory.adcat_id
WHERE
kn_adcategory.adcat_name = :adcat_name AND
kn_ad.ad_status = 1
ORDER BY
kn_ad.ad_created_date DESC,
kn_ad.ad_created_time DESC";
		$sql_options = "SELECT
kn_ad_option.opt_flbx_id,
kn_ad_option.opt_flbx_value,
kn_ad_option.opt_type,
kn_ad.ad_id
FROM
kn_ad_option
INNER JOIN kn_ad ON kn_ad_option.opt_ad_id = kn_ad.ad_id
INNER JOIN kn_adcategory ON kn_ad.ad_category = kn_adcategory.adcat_id
WHERE
kn_adcategory.adcat_name = :adcat_name AND
kn_ad.ad_status = 1";

		$sql_opt_combo_woutsc = "SELECT
kn_filtergroup.grp_name,
kn_filtergroup.grp_id,
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
kn_ad_option.opt_flbx_value,
kn_ad_option.opt_type,
GROUP_CONCAT((CASE
WHEN df_maincombo.mcmb_relation =0 THEN 
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value) 
WHEN df_maincombo.mcmb_relation =1 THEN
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =2 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =3 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
END) SEPARATOR ', ') AS cmb_values
FROM
kn_ad_option
INNER JOIN df_maincombo ON kn_ad_option.opt_flbx_id = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup_info ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN kn_ad ON kn_ad_option.opt_ad_id = kn_ad.ad_id AND kn_filtergroup.grp_adcategory = kn_ad.ad_category
WHERE
kn_ad_option.opt_ad_id = :ad_id AND
kn_ad_option.opt_type = 1 AND
df_maincombo.mcmb_relation <> 0
GROUP BY
kn_filtergroup.grp_id
ORDER BY
df_maincombo.mcmb_id ASC";

		$sql_opt_combo_onlysc = "SELECT
kn_filtergroup.grp_name,
kn_filtergroup.grp_id,
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
kn_ad_option.opt_type,
kn_ad_option.opt_flbx_value,
(CASE
WHEN df_maincombo.mcmb_relation =0 THEN 
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value) 
WHEN df_maincombo.mcmb_relation =1 THEN
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =2 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =3 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
END) AS cmb_values
FROM
kn_ad_option
INNER JOIN df_maincombo ON kn_ad_option.opt_flbx_id = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup_info ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN kn_ad ON kn_ad_option.opt_ad_id = kn_ad.ad_id AND kn_filtergroup.grp_adcategory = kn_ad.ad_category
WHERE
kn_ad_option.opt_ad_id = :ad_id AND
kn_ad_option.opt_type = 1 AND
df_maincombo.mcmb_relation = 0
ORDER BY
df_maincombo.mcmb_id ASC";

		$sql_opt_textbox = "SELECT
kn_ad_option.opt_flbx_value,
kn_textrange_filter.txfl_name,
kn_ad_option.opt_flbx_id,
kn_ad_option.opt_type
FROM
kn_ad_option
INNER JOIN kn_textrange_filter ON kn_ad_option.opt_flbx_id = kn_textrange_filter.txfl_id
WHERE
kn_ad_option.opt_type = 2 AND
kn_ad_option.opt_ad_id = :ad_id
ORDER BY
kn_textrange_filter.txfl_id ASC";
		try {


			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
			$readstmt->execute();

//			$readstmt_allopt = $this->con->prepare($sql_options);
//			$readstmt_allopt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
//			$readstmt_allopt->execute();
//			while ($row1 = $readstmt_allopt->fetch(PDO::FETCH_ASSOC)) {
//				$data_opt[] = $row1;
//			}

			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/athumbphotoupload/" . $row['ad_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['ad_img'] = "#";
				} else {
					$data[$i]['ad_img'] = $files[0];
				}
//				$newarr = array();
//				foreach ($data_opt as $dopt) {
//					if ($row['ad_id'] == $dopt['ad_id']) {
//						$newarr[] = array("option" => $dopt['opt_flbx_id'], "optionvalue" => $dopt['opt_flbx_value']);
//					}
//				}
//				$data[$i]['alloptions'] = $newarr;
				//EXP
				//get combo info
				$data_cmb1 = array();
				$readstmt_allcmb1 = $this->con->prepare($sql_opt_combo_woutsc);
				$readstmt_allcmb1->bindParam(':ad_id', $row['ad_id'], PDO::PARAM_INT);
				$readstmt_allcmb1->execute();
				while ($row1 = $readstmt_allcmb1->fetch(PDO::FETCH_OBJ)) {
					if ($row1->mcmb_relation == 1 || $row1->mcmb_relation == 2 || $row1->mcmb_relation == 3) {
						$data_cmb1[] = array("option" => $row1->grp_name, "optionvalue" => $row1->cmb_values, "real_id" => $row1->mcmb_id, "real_val" => $row1->opt_flbx_value, "type" => $row1->opt_type);
					}
				}

				$data_cmb2 = array();
				$readstmt_allcmb2 = $this->con->prepare($sql_opt_combo_onlysc);
				$readstmt_allcmb2->bindParam(':ad_id', $row['ad_id'], PDO::PARAM_INT);
				$readstmt_allcmb2->execute();
				while ($row2 = $readstmt_allcmb2->fetch(PDO::FETCH_OBJ)) {
					if ($row2->mcmb_relation == 0) {
						$data_cmb2[] = array("option" => $row2->mcmb_name, "optionvalue" => $row2->cmb_values, "real_id" => $row2->mcmb_id, "real_val" => $row2->opt_flbx_value, "type" => $row2->opt_type);
					}
				}
				//get textbox
				$data_txt = array();
				$readstmt_alltxt = $this->con->prepare($sql_opt_textbox);
				$readstmt_alltxt->bindParam(':ad_id', $row['ad_id'], PDO::PARAM_INT);
				$readstmt_alltxt->execute();
				while ($row3 = $readstmt_alltxt->fetch(PDO::FETCH_OBJ)) {
					$data_txt[] = array("option" => $row3->txfl_name, "optionvalue" => $row3->opt_flbx_value, "real_id" => $row3->opt_flbx_id, "real_val" => $row3->opt_flbx_value, "type" => $row3->opt_type);
				}
				$newoptarr = array_merge($data_cmb1, $data_cmb2, $data_txt);
				//END EXP
				$data[$i]['alloptions'] = $newoptarr;
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function loadLastTwentyAds() {
		$data = array();
		$data_opt = array();
//		$newarr = array();
		$sql = "SELECT
kn_ad.ad_id,
kn_ad.ad_usr,
kn_ad.ad_category,
kn_ad.ad_title,
kn_ad.ad_phone,
kn_ad.ad_email,
kn_ad.ad_description,
kn_ad.ad_created_date,
kn_ad.ad_created_time,
kn_ad.ad_status,
kn_ad.ad_soc_fb,
kn_ad.ad_soc_ig,
kn_ad.ad_soc_twitter,
kn_adcategory.adcat_name
FROM
kn_ad
INNER JOIN kn_adcategory ON kn_ad.ad_category = kn_adcategory.adcat_id
WHERE
kn_ad.ad_status = 1
ORDER BY
kn_ad.ad_created_date DESC,
kn_ad.ad_created_time DESC
LIMIT 20";
		$sql_options = "SELECT
kn_ad_option.opt_flbx_id,
kn_ad_option.opt_flbx_value,
kn_ad_option.opt_type,
kn_ad.ad_id,
kn_adcategory.adcat_name,
kn_adcategory.adcat_id
FROM
kn_ad_option
INNER JOIN kn_ad ON kn_ad_option.opt_ad_id = kn_ad.ad_id
INNER JOIN kn_adcategory ON kn_ad.ad_category = kn_adcategory.adcat_id
WHERE
kn_ad.ad_status = 1";

		$sql_opt_combo_woutsc = "SELECT
kn_filtergroup.grp_name,
kn_filtergroup.grp_id,
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
kn_ad_option.opt_flbx_value,
kn_ad_option.opt_type,
GROUP_CONCAT((CASE
WHEN df_maincombo.mcmb_relation =0 THEN 
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value) 
WHEN df_maincombo.mcmb_relation =1 THEN
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =2 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =3 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
END) SEPARATOR ', ') AS cmb_values
FROM
kn_ad_option
INNER JOIN df_maincombo ON kn_ad_option.opt_flbx_id = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup_info ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN kn_ad ON kn_ad_option.opt_ad_id = kn_ad.ad_id AND kn_filtergroup.grp_adcategory = kn_ad.ad_category
WHERE
kn_ad_option.opt_ad_id = :ad_id AND
kn_ad_option.opt_type = 1 AND
df_maincombo.mcmb_relation <> 0
GROUP BY
kn_filtergroup.grp_id
ORDER BY
df_maincombo.mcmb_id ASC";

		$sql_opt_combo_onlysc = "SELECT
kn_filtergroup.grp_name,
kn_filtergroup.grp_id,
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
kn_ad_option.opt_type,
kn_ad_option.opt_flbx_value,
(CASE
WHEN df_maincombo.mcmb_relation =0 THEN 
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value) 
WHEN df_maincombo.mcmb_relation =1 THEN
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =2 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =3 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
END) AS cmb_values
FROM
kn_ad_option
INNER JOIN df_maincombo ON kn_ad_option.opt_flbx_id = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup_info ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN kn_ad ON kn_ad_option.opt_ad_id = kn_ad.ad_id AND kn_filtergroup.grp_adcategory = kn_ad.ad_category
WHERE
kn_ad_option.opt_ad_id = :ad_id AND
kn_ad_option.opt_type = 1 AND
df_maincombo.mcmb_relation = 0
ORDER BY
df_maincombo.mcmb_id ASC";

		$sql_opt_textbox = "SELECT
kn_ad_option.opt_flbx_value,
kn_textrange_filter.txfl_name,
kn_ad_option.opt_flbx_id,
kn_ad_option.opt_type
FROM
kn_ad_option
INNER JOIN kn_textrange_filter ON kn_ad_option.opt_flbx_id = kn_textrange_filter.txfl_id
WHERE
kn_ad_option.opt_type = 2 AND
kn_ad_option.opt_ad_id = :ad_id
ORDER BY
kn_textrange_filter.txfl_id ASC";
		try {


			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/athumbphotoupload/" . $row['ad_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['ad_img'] = "#";
				} else {
					$data[$i]['ad_img'] = $files[0];
				}
				//EXP
				//get combo info
				$data_cmb1 = array();
				$readstmt_allcmb1 = $this->con->prepare($sql_opt_combo_woutsc);
				$readstmt_allcmb1->bindParam(':ad_id', $row['ad_id'], PDO::PARAM_INT);
				$readstmt_allcmb1->execute();
				while ($row1 = $readstmt_allcmb1->fetch(PDO::FETCH_OBJ)) {
					if ($row1->mcmb_relation == 1 || $row1->mcmb_relation == 2 || $row1->mcmb_relation == 3) {
						$data_cmb1[] = array("option" => $row1->grp_name, "optionvalue" => $row1->cmb_values, "real_id" => $row1->mcmb_id, "real_val" => $row1->opt_flbx_value, "type" => $row1->opt_type);
					}
				}

				$data_cmb2 = array();
				$readstmt_allcmb2 = $this->con->prepare($sql_opt_combo_onlysc);
				$readstmt_allcmb2->bindParam(':ad_id', $row['ad_id'], PDO::PARAM_INT);
				$readstmt_allcmb2->execute();
				while ($row2 = $readstmt_allcmb2->fetch(PDO::FETCH_OBJ)) {
					if ($row2->mcmb_relation == 0) {
						$data_cmb2[] = array("option" => $row2->mcmb_name, "optionvalue" => $row2->cmb_values, "real_id" => $row2->mcmb_id, "real_val" => $row2->opt_flbx_value, "type" => $row2->opt_type);
					}
				}
				//get textbox
				$data_txt = array();
				$readstmt_alltxt = $this->con->prepare($sql_opt_textbox);
				$readstmt_alltxt->bindParam(':ad_id', $row['ad_id'], PDO::PARAM_INT);
				$readstmt_alltxt->execute();
				while ($row3 = $readstmt_alltxt->fetch(PDO::FETCH_OBJ)) {
					$data_txt[] = array("option" => $row3->txfl_name, "optionvalue" => $row3->opt_flbx_value, "real_id" => $row3->opt_flbx_id, "real_val" => $row3->opt_flbx_value, "type" => $row3->opt_type);
				}
				$newoptarr = array_merge($data_cmb1, $data_cmb2, $data_txt);
				//END EXP
				$data[$i]['alloptions'] = $newoptarr;
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function saveAdcategory() {
		$sql = "INSERT INTO `kn_adcategory` (`adcat_name`) VALUES (:adcat_name);";

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry save failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function saveAdcatPageFilter() {
		$sql = "INSERT INTO `kn_adcategory_pagefilter` (`catfl_adcategory`, `catfl_type`, `catfl_filter`) VALUES (:catfl_adcategory, :catfl_type, :catfl_filter);";

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':catfl_adcategory', $this->getCatfl_adcategory(), PDO::PARAM_INT);
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

	public function saveFilterGroup() {
		$sql = "INSERT INTO `kn_filtergroup` (`grp_name`, `grp_adcategory`) VALUES (:grp_name, :grp_adcategory);";

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grp_adcategory', $this->getGrp_adcategory(), PDO::PARAM_INT);
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

	public function saveGroupFilterInfo() {
		$sql = "INSERT INTO `kn_filtergroup_info` (`grinf_group`, `grinf_filter`) VALUES (:grinf_group, :grinf_filter);";

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grinf_group', $this->getGrinf_group(), PDO::PARAM_INT);
			$createstmt->bindParam(':grinf_filter', $this->getGrinf_filter(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Added"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Adding Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function editFilterGroup() {
		$sql = "UPDATE `kn_filtergroup` SET `grp_name`=:grp_name, `grp_adcategory`=:grp_adcategory WHERE (`grp_id` = :grp_id);";

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':grp_id', $this->getGrp_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':grp_adcategory', $this->getGrp_adcategory(), PDO::PARAM_INT);
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

	public function editAdcategory() {
		$sql = "UPDATE `kn_adcategory` SET `adcat_name`=:adcat_name WHERE (`adcat_id` = :adcat_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':adcat_id', $this->getAdcat_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry update failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function editNameofAnyFilter($filter_name) {
		if ($this->getCatfl_type() == 1) {
			//combo update
			$sql = "UPDATE `df_maincombo` SET `mcmb_name`=:filter_name WHERE (`mcmb_id`=:catfl_filter);";
		} else {
			//text update
			$sql = "UPDATE `kn_textrange_filter` SET `txfl_name`= :filter_name WHERE (`txfl_id`=:catfl_filter);";
		}

		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':catfl_filter', $this->getCatfl_filter(), PDO::PARAM_INT);
			$createstmt->bindParam(':filter_name', $filter_name, PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry update failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function editAdcatPageFilter() {
		$sql = "UPDATE `kn_adcategory_pagefilter` SET `catfl_adcategory`=:catfl_adcategory, `catfl_type`=:catfl_type, `catfl_filter`=:catfl_filter WHERE (`catfl_id` = :catfl_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':catfl_adcategory', $this->getCatfl_adcategory(), PDO::PARAM_INT);
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

	public function deleteAdcategory() {
		$folder = "../../asset_imageuploader/adcategory/" . $this->getAdcat_id();
		$sql = "DELETE FROM `kn_adcategory` WHERE (`adcat_id`=:adcat_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':adcat_id', $this->getAdcat_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$this->delete_folder($folder);
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! delete failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
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

	public function deleteAd() {
		$folder_thumb = "../../asset_imageuploader/athumbphotoupload/" . $this->getAd_id();
		$folder_photos = "../../asset_imageuploader/aphotoupload/" . $this->getAd_id();
		$sql = "DELETE FROM `kn_ad` WHERE (`ad_id`=:ad_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$this->delete_folder($folder_thumb);
				$this->delete_folder($folder_photos);
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! could not be deleted"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
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

	public function loadAllAdCMBFilters() {
		$data = array();
		$sql = "SELECT
kn_adcategory.adcat_name,
kn_adcategory.adcat_id,
kn_adcategory_pagefilter.catfl_id,
kn_adcategory_pagefilter.catfl_filter,
df_maincombo.mcmb_name,
df_maincombo.mcmb_display_text,
df_maincombo.mcmb_relation,
df_maincombo.mcmb_uplevelcmb_id
FROM
kn_adcategory
INNER JOIN kn_adcategory_pagefilter ON kn_adcategory_pagefilter.catfl_adcategory = kn_adcategory.adcat_id
INNER JOIN df_maincombo ON df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter
WHERE
kn_adcategory_pagefilter.catfl_type = 1";
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

	public function frontComboFilterLoader() {
		$data = array();
		$sql = "SELECT
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
df_maincombo.mcmb_uplevelcmb_id,
df_maincombo.mcmb_id,
df_maincombo.mcmb_class
FROM
kn_adcategory
INNER JOIN kn_adcategory_pagefilter ON kn_adcategory_pagefilter.catfl_adcategory = kn_adcategory.adcat_id
INNER JOIN df_maincombo ON df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter
WHERE
kn_adcategory.adcat_name = :adcat_name AND
kn_adcategory_pagefilter.catfl_type = 1";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function textFilterBoxesByCategory() {
		$data = array();
		$sql = "SELECT
kn_textrange_filter.txfl_name,
kn_textrange_filter.txfl_id,
kn_textrange_filter.txfl_id_name
FROM
kn_adcategory_pagefilter
INNER JOIN kn_adcategory ON kn_adcategory_pagefilter.catfl_adcategory = kn_adcategory.adcat_id
INNER JOIN kn_textrange_filter ON kn_textrange_filter.txfl_id = kn_adcategory_pagefilter.catfl_filter
WHERE
kn_adcategory_pagefilter.catfl_type = 2 AND
kn_adcategory.adcat_name = :adcat_name";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adcat_name', $this->getAdcat_name(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbCategoryFilterByCategoryID() {
		$data = array();
		$sql = "SELECT
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
df_maincombo.mcmb_uplevelcmb_id,
df_maincombo.mcmb_id,
df_maincombo.mcmb_class
FROM
kn_adcategory
INNER JOIN kn_adcategory_pagefilter ON kn_adcategory_pagefilter.catfl_adcategory = kn_adcategory.adcat_id
INNER JOIN df_maincombo ON df_maincombo.mcmb_id = kn_adcategory_pagefilter.catfl_filter
WHERE
kn_adcategory.adcat_id = :adcat_id AND
kn_adcategory_pagefilter.catfl_type = 1";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adcat_id', $this->getAdcat_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
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

	public function getNextAutoAdID() {
		$nextid = 0;
		$sql = "SHOW TABLE STATUS LIKE 'kn_ad'";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$nextid = $row->Auto_increment;
		}
		$this->setAd_id($nextid);
	}

	public function getAdvByID() {
		$data = array();
		$sql = "SELECT
kn_ad.ad_id,
kn_ad.ad_usr,
kn_ad.ad_category,
kn_ad.ad_title,
kn_ad.ad_phone,
kn_ad.ad_email,
kn_ad.ad_description,
kn_ad.ad_created_date,
kn_ad.ad_created_time,
kn_ad.ad_status,
kn_ad.ad_soc_fb,
kn_ad.ad_soc_ig,
kn_ad.ad_soc_twitter,
kn_adcategory.adcat_name,
df_user.usr_name
FROM
kn_ad
INNER JOIN kn_adcategory ON kn_ad.ad_category = kn_adcategory.adcat_id
INNER JOIN df_user ON kn_ad.ad_usr = df_user.usr_id
WHERE
kn_ad.ad_id = :ad_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblAdByUser() {
		$data = array();
		$sql = "SELECT
kn_ad.ad_id,
kn_ad.ad_usr,
kn_ad.ad_category,
kn_ad.ad_title,
kn_ad.ad_phone,
kn_ad.ad_email,
kn_ad.ad_description,
kn_ad.ad_created_date,
kn_ad.ad_created_time,
kn_ad.ad_status,
kn_ad.ad_soc_fb,
kn_ad.ad_soc_ig,
kn_ad.ad_soc_twitter,
kn_adcategory.adcat_name
FROM
kn_ad
INNER JOIN kn_adcategory ON kn_ad.ad_category = kn_adcategory.adcat_id
WHERE
kn_ad.ad_usr = :ad_usr
ORDER BY
kn_ad.ad_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_usr', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAdvOptionByID() {
		$data = array();
		$data2 = array();
		$sql_combo = "SELECT
kn_ad_option.opt_flbx_value,
df_maincombo.mcmb_class
FROM
kn_ad_option
INNER JOIN df_maincombo ON df_maincombo.mcmb_id = kn_ad_option.opt_flbx_id
WHERE
kn_ad_option.opt_ad_id = :opt_ad_id AND
kn_ad_option.opt_type = 1";
		$sql_txt = "SELECT
kn_ad_option.opt_flbx_value,
kn_textrange_filter.txfl_id_name
FROM
kn_ad_option
INNER JOIN kn_textrange_filter ON kn_textrange_filter.txfl_id = kn_ad_option.opt_flbx_id
WHERE
kn_ad_option.opt_ad_id = :opt_ad_id AND
kn_ad_option.opt_type = 2";
		try {
			$readstmt = $this->con->prepare($sql_combo);
			$readstmt->bindParam(':opt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$readstmt2 = $this->con->prepare($sql_txt);
			$readstmt2->bindParam(':opt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt2->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$data[] = array("uqid" => $row->mcmb_class, "value" => $row->opt_flbx_value, "type" => 1);
			}
			while ($row2 = $readstmt2->fetch(PDO::FETCH_OBJ)) {
				$data2[] = array("uqid" => $row2->txfl_id_name, "value" => $row2->opt_flbx_value, "type" => 2);
			}
			$newarr = array_merge($data, $data2);
			echo json_encode($newarr);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function loadComboBoxByAdID() {
		$data = array();
		$data2 = array();
		$sql_combo = "SELECT
kn_ad_option.opt_flbx_value,
df_maincombo.mcmb_class,
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
df_maincombo.mcmb_uplevelcmb_id,
df_maincombo.mcmb_id
FROM
kn_ad_option
INNER JOIN df_maincombo ON df_maincombo.mcmb_id = kn_ad_option.opt_flbx_id
WHERE
kn_ad_option.opt_ad_id = :opt_ad_id AND
kn_ad_option.opt_type = 1
ORDER BY
df_maincombo.mcmb_id ASC
";
		try {
			$readstmt = $this->con->prepare($sql_combo);
			$readstmt->bindParam(':opt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}

			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblAllPointsEarnedUsers() {
		$data = array();
		$sql_combo = "SELECT
df_user.usr_name,
df_user.usr_id
FROM
df_user
WHERE
df_user.usr_cat_id = 4 AND
df_user.usr_status = 1";
		try {
			$readstmt = $this->con->prepare($sql_combo);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}

			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblAllUseresEarnedPoints() {
		$data = array();
		$sql_combo = "SELECT
kn_affiliate_points_earn.rec_id,
kn_affiliate_points_earn.rec_user,
(SELECT
df_user.usr_name
FROM
df_user
WHERE
df_user.usr_id = kn_affiliate_points_earn.rec_user) AS point_received_to,
kn_affiliate_points_earn.rec_description,
kn_affiliate_points_earn.rec_points,
kn_affiliate_points_earn.rec_from,
kn_affiliate_points_earn.rec_relate_ref_user,
if(ISNULL(kn_affiliate_points_earn.rec_relate_ref_user),'System',(SELECT
df_user.usr_name
FROM
df_user
WHERE
df_user.usr_id = kn_affiliate_points_earn.rec_relate_ref_user)) AS point_received_from,
if(ISNULL(kn_affiliate_points_earn.rec_relate_ref_user),1,IF(ISNULL((SELECT
df_user.usr_name
FROM
df_user
WHERE
df_user.usr_id = kn_affiliate_points_earn.rec_relate_ref_user AND
df_user.usr_status = 1)),IFNULL((SELECT
df_user.usr_name
FROM
df_user
WHERE
df_user.usr_id = kn_affiliate_points_earn.rec_relate_ref_user AND
df_user.usr_status = 1),0),1)) AS point_received_from_usr_acc_active
FROM
kn_affiliate_points_earn
ORDER BY
kn_affiliate_points_earn.rec_id DESC";
		try {
			$readstmt = $this->con->prepare($sql_combo);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}

			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function loadFrontAdByAdID() {
		$data = array();
		$data_cmb1 = array();
		$data_cmb2 = array();
		$data_txt = array();
		$sql_combo = "SELECT
kn_ad.ad_id,
kn_ad.ad_usr,
kn_ad.ad_category,
kn_ad.ad_title,
kn_ad.ad_phone,
kn_ad.ad_email,
kn_ad.ad_description,
kn_ad.ad_created_date,
kn_ad.ad_created_time,
kn_ad.ad_status,
kn_ad.ad_soc_fb,
kn_ad.ad_soc_ig,
kn_ad.ad_soc_twitter,
kn_adcategory.adcat_name,
df_user.usr_name
FROM
kn_ad
INNER JOIN kn_adcategory ON kn_ad.ad_category = kn_adcategory.adcat_id
INNER JOIN df_user ON kn_ad.ad_usr = df_user.usr_id
WHERE
kn_ad.ad_id = :ad_id";
		$sql_opt_combo_woutsc = "SELECT
kn_filtergroup.grp_name,
kn_filtergroup.grp_id,
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
GROUP_CONCAT((CASE
WHEN df_maincombo.mcmb_relation =0 THEN 
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value) 
WHEN df_maincombo.mcmb_relation =1 THEN
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =2 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =3 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
END) SEPARATOR ', ') AS cmb_values
FROM
kn_ad_option
INNER JOIN df_maincombo ON kn_ad_option.opt_flbx_id = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup_info ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN kn_ad ON kn_ad_option.opt_ad_id = kn_ad.ad_id AND kn_filtergroup.grp_adcategory = kn_ad.ad_category
WHERE
kn_ad_option.opt_ad_id = :ad_id AND
kn_ad_option.opt_type = 1 AND
df_maincombo.mcmb_relation <> 0
GROUP BY
kn_filtergroup.grp_id
ORDER BY
df_maincombo.mcmb_id ASC";

		$sql_opt_combo_onlysc = "SELECT
kn_filtergroup.grp_name,
kn_filtergroup.grp_id,
df_maincombo.mcmb_id,
df_maincombo.mcmb_name,
df_maincombo.mcmb_relation,
(CASE
WHEN df_maincombo.mcmb_relation =0 THEN 
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value) 
WHEN df_maincombo.mcmb_relation =1 THEN
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =2 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
WHEN df_maincombo.mcmb_relation =3 THEN
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = kn_ad_option.opt_flbx_value)
END) AS cmb_values
FROM
kn_ad_option
INNER JOIN df_maincombo ON kn_ad_option.opt_flbx_id = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup_info ON kn_filtergroup_info.grinf_filter = df_maincombo.mcmb_id
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN kn_ad ON kn_ad_option.opt_ad_id = kn_ad.ad_id AND kn_filtergroup.grp_adcategory = kn_ad.ad_category
WHERE
kn_ad_option.opt_ad_id = :ad_id AND
kn_ad_option.opt_type = 1 AND
df_maincombo.mcmb_relation = 0
ORDER BY
df_maincombo.mcmb_id ASC";

		$sql_opt_textbox = "SELECT
kn_ad_option.opt_flbx_value,
kn_textrange_filter.txfl_name
FROM
kn_ad_option
INNER JOIN kn_textrange_filter ON kn_ad_option.opt_flbx_id = kn_textrange_filter.txfl_id
WHERE
kn_ad_option.opt_type = 2 AND
kn_ad_option.opt_ad_id = :ad_id
ORDER BY
kn_textrange_filter.txfl_id ASC";

		try {
			//get combo info			
			$readstmt_allcmb1 = $this->con->prepare($sql_opt_combo_woutsc);
			$readstmt_allcmb1->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt_allcmb1->execute();
			while ($row1 = $readstmt_allcmb1->fetch(PDO::FETCH_OBJ)) {
				if ($row1->mcmb_relation == 1 || $row1->mcmb_relation == 2 || $row1->mcmb_relation == 3) {
					$data_cmb1[] = array("option" => $row1->grp_name, "optionval" => $row1->cmb_values);
				}
			}
			$readstmt_allcmb2 = $this->con->prepare($sql_opt_combo_onlysc);
			$readstmt_allcmb2->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt_allcmb2->execute();
			while ($row2 = $readstmt_allcmb2->fetch(PDO::FETCH_OBJ)) {
				if ($row2->mcmb_relation == 0) {
					$data_cmb2[] = array("option" => $row2->mcmb_name, "optionval" => $row2->cmb_values);
				}
			}
			//get textbox
			$readstmt_alltxt = $this->con->prepare($sql_opt_textbox);
			$readstmt_alltxt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt_alltxt->execute();
			while ($row3 = $readstmt_alltxt->fetch(PDO::FETCH_OBJ)) {
				$data_txt[] = array("option" => $row3->txfl_name, "optionval" => $row3->opt_flbx_value);
			}
			$newoptarr = array_merge($data_cmb1, $data_cmb2, $data_txt);
			//print_r($newoptarr);

			$readstmt = $this->con->prepare($sql_combo);
			$readstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/athumbphotoupload/" . $row['ad_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['ad_img'] = "#";
				} else {
					$data[$i]['ad_img'] = $files[0];
				}
				$data[$i]['alloptions'] = $newoptarr;
				$i++;
			}

			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function saveAdv($cmboxes, $txboxes) {
		$combobox_type = 1;
		$textbox_type = 2;
		$this->getNextAutoAdID();
		$sql = "INSERT INTO `kn_ad` (`ad_usr`, `ad_category`, `ad_title`, `ad_phone`, `ad_email`, `ad_description`, `ad_created_date`, `ad_created_time`, `ad_status`, `ad_soc_fb`, `ad_soc_ig`, `ad_soc_twitter`) VALUES (:ad_usr, :ad_category, :ad_title, :ad_phone, :ad_email,:ad_description, :ad_created_date, :ad_created_time, '0',:ad_soc_fb,:ad_soc_ig,:ad_soc_twitter);";
		$sql_opt = "INSERT INTO `kn_ad_option` (`opt_ad_id`, `opt_type`, `opt_flbx_id`, `opt_flbx_value`) VALUES (:opt_ad_id, :opt_type, :opt_flbx_id, :opt_flbx_value);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_usr', $_SESSION['usr_id'], PDO::PARAM_INT);
			$createstmt->bindParam(':ad_title', $this->getAd_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_phone', $this->getAd_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_email', $this->getAd_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_category', $this->getAd_category(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_description', $this->getAd_description(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_created_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_created_time', date("H:i:s"), PDO::PARAM_STR);
			//social media
			$createstmt->bindParam(':ad_soc_fb', $this->getAd_soc_fb(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_soc_ig', $this->getAd_soc_ig(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_soc_twitter', $this->getAd_soc_twitter(), PDO::PARAM_STR);

			if ($createstmt->execute()) {
				//run insert of combo box
				$cmboxes_new = array_filter($cmboxes);
				$txboxes_new = array_filter($txboxes);
				//print_r($txboxes_new);
				$combo_flag = false;
				foreach ($cmboxes_new as $combo_id => $combo_value) {
					$createstmt_opt = $this->con->prepare($sql_opt);
					$createstmt_opt->bindParam(':opt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
					$createstmt_opt->bindParam(':opt_type', $combobox_type, PDO::PARAM_INT);
					$createstmt_opt->bindParam(':opt_flbx_id', $combo_id, PDO::PARAM_INT);
					$createstmt_opt->bindParam(':opt_flbx_value', $combo_value, PDO::PARAM_STR);
					$combo_flag = $createstmt_opt->execute();
				}
				//run insert of text box
				$text_flag = false;
				foreach ($txboxes_new as $txt_id => $txt_value) {
					$createstmt_opt2 = $this->con->prepare($sql_opt);
					$createstmt_opt2->bindParam(':opt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
					$createstmt_opt2->bindParam(':opt_type', $textbox_type, PDO::PARAM_INT);
					$createstmt_opt2->bindParam(':opt_flbx_id', $txt_id, PDO::PARAM_INT);
					$createstmt_opt2->bindParam(':opt_flbx_value', $txt_value, PDO::PARAM_STR);
					$text_flag = $createstmt_opt2->execute();
				}
				if ($combo_flag && $text_flag) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Successfully saved", "ad_id" => $this->getAd_id()));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry save failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry save failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function getBelowAffiliateUserID($uaf_user, $uaf_level) {
		$id = 0;
		$sql = "SELECT
kn_affiliate_user_reference.uaf_ref_user
FROM
kn_affiliate_user_reference
WHERE
kn_affiliate_user_reference.uaf_user = :uaf_user AND
kn_affiliate_user_reference.uaf_level = :uaf_level";
		$readstmt = $this->getCon()->prepare($sql);
		$readstmt->bindParam(':uaf_user', $uaf_user, PDO::PARAM_INT);
		$readstmt->bindParam(':uaf_level', $uaf_level, PDO::PARAM_INT);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$id = $row->uaf_ref_user;
		}
		if ($id === 0) {
			return $uaf_user;
		} else {
			return $id;
		}
	}

	public function AffiliatePointAddProcess() {
		//DATA INITIALIZATION
		$fullpointadding_process_flag = false;
		$current_usr_id = $_SESSION['usr_id'];
		$initial_points = 0.1;
		$null_value = null;
		$rec_from = 4; //post blog
		$rec_description = "Publish Advertisement";

		$loop_point_save_flag = false;
		$temp_ref_user_points = 0;
		$userid = 0;
		$level = 0;
		$total_update_point;
		$total_update_user;
		$array_total_update = array();
		//SQL DATABASE QUARIES
		//1- save affiliate user point info 
		$sql_affiliate_points_earn = "INSERT INTO `kn_affiliate_points_earn` (`rec_user`, `rec_description`, `rec_points`, `rec_from`, `rec_relate_ref_user`) VALUES (:rec_user, :rec_description, :rec_points, :rec_from, :rec_relate_ref_user);";
		//update user table points
		$sql_totalpointupdate = "UPDATE `df_user` SET `usr_points`= `usr_points` + :usr_points  WHERE (`usr_id`=:usr_id);";
		//find current user referece table info
		$sql_reference_info = "SELECT
kn_affiliate_user_reference.uaf_level,
kn_affiliate_user_reference.uaf_ref_have,
kn_affiliate_user_reference.uaf_ref_user,
kn_affiliate_user_reference.uaf_id,
kn_affiliate_user_reference.uaf_user
FROM
kn_affiliate_user_reference
WHERE
kn_affiliate_user_reference.uaf_user = " . $_SESSION['usr_id'];
		try {
			//FIND CURRENT USER REFERENCE INFO
			$this->getCon()->beginTransaction();
			$readUserReferenceInfo = $this->getCon()->prepare($sql_reference_info);
			$readUserReferenceInfo->execute();
			while ($userReferenceInfoRow = $readUserReferenceInfo->fetch(PDO::FETCH_OBJ)) {
				if ($userReferenceInfoRow->uaf_ref_have == 0) {
					//NO REFERENCE USER FLOW
					$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
					$createUserPoints->bindParam(':rec_user', $current_usr_id, PDO::PARAM_INT);
					$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
					$createUserPoints->bindParam(':rec_points', $initial_points, PDO::PARAM_STR);
					$createUserPoints->bindParam(':rec_from', $rec_from, PDO::PARAM_INT);
					$createUserPoints->bindParam(':rec_relate_ref_user', $null_value, PDO::PARAM_NULL);
					//GATHER TOTAL UPDATE USER INFO
					$total_update_point = $initial_points;
					$total_update_user = $current_usr_id;
					if ($createUserPoints->execute()) {
						//UPDATE TOTAL POINTS OF USER TABLE
						$createUpdateTotalPoint = $this->getCon()->prepare($sql_totalpointupdate);
						$createUpdateTotalPoint->bindParam(':usr_points', $total_update_point, PDO::PARAM_STR);
						$createUpdateTotalPoint->bindParam(':usr_id', $total_update_user, PDO::PARAM_INT);
						if ($createUpdateTotalPoint->execute()) {
							$fullpointadding_process_flag = true;
						} else {
							$this->getCon()->rollBack();
						}
					} else {
						$this->getCon()->rollBack();
					}
				} else {
					//HAVE REFERENCE USER FLOW					
					$points_loop_level = $userReferenceInfoRow->uaf_level;
					for ($x = 1; $x <= $points_loop_level; $x++) {
						if ($x == 1) {
							//current owner initial point
							$ref_user_earned_points = $initial_points;
							$temp_ref_user_points = $ref_user_earned_points;
							$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
							$createUserPoints->bindParam(':rec_user', $current_usr_id, PDO::PARAM_INT);
							$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
							$createUserPoints->bindParam(':rec_points', $ref_user_earned_points, PDO::PARAM_STR);
							$createUserPoints->bindParam(':rec_from', $rec_from, PDO::PARAM_INT);
							$createUserPoints->bindParam(':rec_relate_ref_user', $null_value, PDO::PARAM_INT);
							$loop_point_save_flag = $createUserPoints->execute();
							//GATHER TOTAL UPDATE USER INFO
							$total_update_point = $ref_user_earned_points;
							$total_update_user = $current_usr_id;
							$array_total_update[] = array("user" => $total_update_user, "point" => $total_update_point);
							$level = $points_loop_level;
							$userid = $userReferenceInfoRow->uaf_ref_user;
						} else {
							//Below users points
							if ($x == 2) {
								
							} else {
								$level = $level - 1;
								$userid = $this->getBelowAffiliateUserID($userid, $level);
							}

							//FIND CURRENT EARNED POINT
							$ref_user_earned_points = $temp_ref_user_points / 2;
							$temp_ref_user_points = $ref_user_earned_points;

							//SAVE EACH USER POINTS
							$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
							$createUserPoints->bindParam(':rec_user', $userid, PDO::PARAM_INT);
							$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
							$createUserPoints->bindParam(':rec_points', $ref_user_earned_points, PDO::PARAM_STR);
							$createUserPoints->bindParam(':rec_from', $rec_from, PDO::PARAM_INT);
							$createUserPoints->bindParam(':rec_relate_ref_user', $current_usr_id, PDO::PARAM_INT);
							$loop_point_save_flag = $createUserPoints->execute();
							//GATHER TOTAL UPDATE USER INFO
							$total_update_point = $ref_user_earned_points;
							$total_update_user = $userid;
							$array_total_update[] = array("user" => $total_update_user, "point" => $total_update_point);
						}
					}

					if ($loop_point_save_flag) {
						$total_update_flag = false;
						foreach ($array_total_update as $key => $totalupdatevalue) {
							$createUpdateTotalPoint = $this->getCon()->prepare($sql_totalpointupdate);
							$createUpdateTotalPoint->bindParam(':usr_points', $totalupdatevalue['point'], PDO::PARAM_STR);
							$createUpdateTotalPoint->bindParam(':usr_id', $totalupdatevalue['user'], PDO::PARAM_INT);
							$total_update_flag = $createUpdateTotalPoint->execute();
						}
						if ($total_update_flag) {
							$fullpointadding_process_flag = true;
						} else {
							$this->getCon()->rollBack();
						}
					} else {
						$this->getCon()->rollBack();
					}
				}
			}

			if ($fullpointadding_process_flag) {
				$this->getCon()->commit();
				return 1;
			} else {
				$this->getCon()->rollBack();
				return 0;
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
		}
	}

	public function changeAdStatus() {
		$sql = "UPDATE `kn_ad` SET `ad_status`=:ad_status WHERE (`ad_id`=:ad_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_status', $this->getAd_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Your action processed"));
				if ($this->getAd_status() == 1) {
					//if published
					$this->AffiliatePointAddProcess();
				}
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry counldn't be processe your action"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getLine()));
		}
	}

	public function editAdv($cmboxes, $txboxes) {
		$combobox_type = 1;
		$textbox_type = 2;
		$sql = "UPDATE `kn_ad` SET `ad_category`=:ad_category, `ad_title`=:ad_title, `ad_phone`=:ad_phone, `ad_email`=:ad_email,`ad_description`=:ad_description, `ad_created_date`=:ad_created_date, `ad_created_time`=:ad_created_time,`ad_soc_fb`=:ad_soc_fb, `ad_soc_ig`=:ad_soc_ig, `ad_soc_twitter`=:ad_soc_twitter WHERE (`ad_id` = :ad_id);";
		$sql_opt = "INSERT INTO `kn_ad_option` (`opt_ad_id`, `opt_type`, `opt_flbx_id`, `opt_flbx_value`) VALUES (:opt_ad_id, :opt_type, :opt_flbx_id, :opt_flbx_value);";
		$sql_opt_delete = "DELETE FROM `kn_ad_option` WHERE (`opt_ad_id`=:opt_ad_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_title', $this->getAd_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_phone', $this->getAd_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_email', $this->getAd_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_category', $this->getAd_category(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_description', $this->getAd_description(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_created_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_created_time', date("H:i:s"), PDO::PARAM_STR);
			//social media
			$createstmt->bindParam(':ad_soc_fb', $this->getAd_soc_fb(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_soc_ig', $this->getAd_soc_ig(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_soc_twitter', $this->getAd_soc_twitter(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				//remove All options
				$createstmt_optdel = $this->con->prepare($sql_opt_delete);
				$createstmt_optdel->bindParam(':opt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
				if ($createstmt_optdel->execute()) {
					//run insert of combo box
					$cmboxes_new = array_filter($cmboxes);
					$txboxes_new = array_filter($txboxes);
					//print_r($txboxes_new);
					$combo_flag = false;
					foreach ($cmboxes_new as $combo_id => $combo_value) {
						$createstmt_opt = $this->con->prepare($sql_opt);
						$createstmt_opt->bindParam(':opt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
						$createstmt_opt->bindParam(':opt_type', $combobox_type, PDO::PARAM_INT);
						$createstmt_opt->bindParam(':opt_flbx_id', $combo_id, PDO::PARAM_INT);
						$createstmt_opt->bindParam(':opt_flbx_value', $combo_value, PDO::PARAM_STR);
						$combo_flag = $createstmt_opt->execute();
					}
					//run insert of text box
					$text_flag = false;
					foreach ($txboxes_new as $txt_id => $txt_value) {
						$createstmt_opt2 = $this->con->prepare($sql_opt);
						$createstmt_opt2->bindParam(':opt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
						$createstmt_opt2->bindParam(':opt_type', $textbox_type, PDO::PARAM_INT);
						$createstmt_opt2->bindParam(':opt_flbx_id', $txt_id, PDO::PARAM_INT);
						$createstmt_opt2->bindParam(':opt_flbx_value', $txt_value, PDO::PARAM_STR);
						$text_flag = $createstmt_opt2->execute();
					}
					if ($combo_flag && $text_flag) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Successfully updated", "ad_id" => $this->getAd_id()));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry updating failed"));
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry updating failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry updating failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
