<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
/**
 * @author Ruwan Jayawardena
 */
include '../dbconfig/connectDB.php';

class adv extends ConnectDB {

	private $flag = false;
	private $ad_id;
	private $ad_title;
	private $ad_maincategory;
	private $ad_subcategory;
	private $ad_country;
	private $ad_state;
	private $ad_city;
	private $ad_shortdesc;
	private $ad_longdesc;
	private $ad_pricetag_status;
	private $ad_price;
	private $ad_status;
	private $ad_date_updated;
	private $ad_time_updated;
	private $ad_usr_id;
	private $adflt_id;
	private $adflt_ad_id;
	private $adflt_type;
	private $adflt_filter;
	private $adflt_value;
	private $tg_id;
	private $tg_tag;
	private $tg_ad_id;
	private $ad_filter_array_status;

	public function getAd_filter_array_status() {
		return $this->ad_filter_array_status;
	}

	public function setAd_filter_array_status($ad_filter_array_status) {
		$this->ad_filter_array_status = $ad_filter_array_status;
		return $this;
	}

	public function getTg_id() {
		return $this->tg_id;
	}

	public function getTg_tag() {
		return $this->tg_tag;
	}

	public function getTg_ad_id() {
		return $this->tg_ad_id;
	}

	public function setTg_id($tg_id) {
		$this->tg_id = $tg_id;
		return $this;
	}

	public function setTg_tag($tg_tag) {
		$this->tg_tag = $tg_tag;
		return $this;
	}

	public function setTg_ad_id($tg_ad_id) {
		$this->tg_ad_id = $tg_ad_id;
		return $this;
	}

	public function getAdflt_id() {
		return $this->adflt_id;
	}

	public function getAdflt_ad_id() {
		return $this->adflt_ad_id;
	}

	public function getAdflt_type() {
		return $this->adflt_type;
	}

	public function getAdflt_filter() {
		return $this->adflt_filter;
	}

	public function getAdflt_value() {
		return $this->adflt_value;
	}

	public function setAdflt_id($adflt_id) {
		$this->adflt_id = $adflt_id;
		return $this;
	}

	public function setAdflt_ad_id($adflt_ad_id) {
		$this->adflt_ad_id = $adflt_ad_id;
		return $this;
	}

	public function setAdflt_type($adflt_type) {
		$this->adflt_type = $adflt_type;
		return $this;
	}

	public function setAdflt_filter($adflt_filter) {
		$this->adflt_filter = $adflt_filter;
		return $this;
	}

	public function setAdflt_value($adflt_value) {
		$this->adflt_value = $adflt_value;
		return $this;
	}

	public function getAd_usr_id() {
		return $this->ad_usr_id;
	}

	public function setAd_usr_id($ad_usr_id) {
		$this->ad_usr_id = $ad_usr_id;
		return $this;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getAd_id() {
		return $this->ad_id;
	}

	public function getAd_title() {
		return $this->ad_title;
	}

	public function getAd_maincategory() {
		return $this->ad_maincategory;
	}

	public function getAd_subcategory() {
		return $this->ad_subcategory;
	}

	public function getAd_country() {
		return $this->ad_country;
	}

	public function getAd_state() {
		return $this->ad_state;
	}

	public function getAd_city() {
		return $this->ad_city;
	}

	public function getAd_shortdesc() {
		return $this->ad_shortdesc;
	}

	public function getAd_longdesc() {
		return $this->ad_longdesc;
	}

	public function getAd_pricetag_status() {
		return $this->ad_pricetag_status;
	}

	public function getAd_price() {
		return $this->ad_price;
	}

	public function getAd_status() {
		return $this->ad_status;
	}

	public function getAd_date_updated() {
		return $this->ad_date_updated;
	}

	public function getAd_time_updated() {
		return $this->ad_time_updated;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setAd_id($ad_id) {
		$this->ad_id = $ad_id;
		return $this;
	}

	public function setAd_title($ad_title) {
		$this->ad_title = $ad_title;
		return $this;
	}

	public function setAd_maincategory($ad_maincategory) {
		$this->ad_maincategory = $ad_maincategory;
		return $this;
	}

	public function setAd_subcategory($ad_subcategory) {
		$this->ad_subcategory = $ad_subcategory;
		return $this;
	}

	public function setAd_country($ad_country) {
		$this->ad_country = $ad_country;
		return $this;
	}

	public function setAd_state($ad_state) {
		$this->ad_state = $ad_state;
		return $this;
	}

	public function setAd_city($ad_city) {
		$this->ad_city = $ad_city;
		return $this;
	}

	public function setAd_shortdesc($ad_shortdesc) {
		$this->ad_shortdesc = $ad_shortdesc;
		return $this;
	}

	public function setAd_longdesc($ad_longdesc) {
		$this->ad_longdesc = $ad_longdesc;
		return $this;
	}

	public function setAd_pricetag_status($ad_pricetag_status) {
		$this->ad_pricetag_status = $ad_pricetag_status;
		return $this;
	}

	public function setAd_price($ad_price) {
		$this->ad_price = $ad_price;
		return $this;
	}

	public function setAd_status($ad_status) {
		$this->ad_status = $ad_status;
		return $this;
	}

	public function setAd_date_updated($ad_date_updated) {
		$this->ad_date_updated = $ad_date_updated;
		return $this;
	}

	public function setAd_time_updated($ad_time_updated) {
		$this->ad_time_updated = $ad_time_updated;
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

	public function tagsByAdID() {
		$data = array();
		$sql = "SELECT
ub_advtag.tg_id,
ub_advtag.tg_tag,
ub_advtag.tg_ad_id
FROM
ub_advtag
WHERE
ub_advtag.tg_ad_id = :tg_ad_id
ORDER BY
ub_advtag.tg_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':tg_ad_id', $this->getTg_ad_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function allAdvByLoggedUser() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_adv.ad_title,
ub_adv.ad_maincategory,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_maincategory) AS ad_maincategory_name,
ub_adv.ad_subcategory,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_subcategory) AS ad_subcategory_name,
ub_adv.ad_country,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_country) AS ad_country_name,
ub_adv.ad_state,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_state) AS ad_state_name,
ub_adv.ad_city,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_city) AS ad_city_name,
ub_adv.ad_usr_id,
ub_adv.ad_shortdesc,
ub_adv.ad_longdesc,
ub_adv.ad_pricetag_status,
ub_adv.ad_price,
ub_adv.ad_status,
ub_adv.ad_date_updated,
ub_adv.ad_time_updated
FROM
ub_adv
WHERE
ub_adv.ad_usr_id = :ad_usr_id
ORDER BY
ub_adv.ad_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function loadAdvUpdateInfoByAdID() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_adv.ad_title,
ub_adv.ad_maincategory,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_maincategory) AS ad_maincategory_name,
ub_adv.ad_subcategory,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_subcategory) AS ad_subcategory_name,
ub_adv.ad_country,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_country) AS ad_country_name,
ub_adv.ad_state,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_state) AS ad_state_name,
ub_adv.ad_city,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_city) AS ad_city_name,
ub_adv.ad_usr_id,
ub_adv.ad_shortdesc,
ub_adv.ad_longdesc,
ub_adv.ad_pricetag_status,
ub_adv.ad_price,
ub_adv.ad_status,
ub_adv.ad_date_updated,
ub_adv.ad_time_updated,
ub_adv.ad_filter_array_status
FROM
ub_adv
WHERE
ub_adv.ad_id = :ad_id
ORDER BY
ub_adv.ad_id DESC";
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

	public function getAdvComboFilterByAdID() {
		$data = array();
		$sql = "SELECT
ub_advfilter.adflt_id,
ub_advfilter.adflt_ad_id,
ub_advfilter.adflt_type,
ub_advfilter.adflt_filter,
ub_advfilter.adflt_value,
kn_filtergroup.grp_id,
kn_filtergroup.grp_admaincategory,
kn_filtergroup.grp_adsubcategory,
kn_filtergroup.grp_disp_order,
df_maincombo.mcmb_uplevelcmb_id,
df_maincombo.mcmb_relation
FROM
ub_advfilter
INNER JOIN kn_filtergroup_info ON ub_advfilter.adflt_type = kn_filtergroup_info.grinf_filtertype AND ub_advfilter.adflt_filter = kn_filtergroup_info.grinf_filter
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN df_maincombo ON df_maincombo.mcmb_id = ub_advfilter.adflt_filter
WHERE
ub_advfilter.adflt_ad_id = :adflt_ad_id AND
ub_advfilter.adflt_type = 1
ORDER BY
kn_filtergroup.grp_disp_order ASC,
df_maincombo.mcmb_relation ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adflt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function LoadAllAdsByCategories() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_adv.ad_title,
ub_adv.ad_maincategory,
ub_adv.ad_subcategory,
ub_adv.ad_country,
ub_adv.ad_state,
ub_adv.ad_city,
ub_adv.ad_usr_id,
ub_adv.ad_shortdesc,
ub_adv.ad_longdesc,
ub_adv.ad_pricetag_status,
ub_adv.ad_price,
ub_adv.ad_status,
ub_adv.ad_date_updated,
ub_adv.ad_time_updated,
ub_adv.ad_filter_array_status
FROM
ub_adv
WHERE
ub_adv.ad_country = :ad_country AND
ub_adv.ad_state = :ad_state AND
ub_adv.ad_city = :ad_city AND
ub_adv.ad_subcategory = :ad_subcategory AND
ub_adv.ad_maincategory = :ad_maincategory AND
ub_adv.ad_status = 1
ORDER BY
ub_adv.ad_date_updated DESC,
ub_adv.ad_time_updated DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_country', $this->getAd_country(), PDO::PARAM_INT);
			$readstmt->bindParam(':ad_state', $this->getAd_state(), PDO::PARAM_INT);
			$readstmt->bindParam(':ad_city', $this->getAd_city(), PDO::PARAM_INT);
			$readstmt->bindParam(':ad_subcategory', $this->getAd_subcategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':ad_maincategory', $this->getAd_maincategory(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/advcoverimage/" . $row['ad_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['ad_img'] = "#";
				} else {
					$data[$i]['ad_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function LoadAdInfoByUserID() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_adv.ad_title,
ub_adv.ad_maincategory,
ub_adv.ad_subcategory,
ub_adv.ad_country,
ub_adv.ad_state,
ub_adv.ad_city,
ub_adv.ad_usr_id,
ub_adv.ad_shortdesc,
ub_adv.ad_longdesc,
ub_adv.ad_pricetag_status,
ub_adv.ad_price,
ub_adv.ad_status,
ub_adv.ad_date_updated,
ub_adv.ad_time_updated,
ub_adv.ad_filter_array_status
FROM
ub_adv
WHERE
ub_adv.ad_usr_id = :ad_usr_id AND
ub_adv.ad_status = 1
ORDER BY
ub_adv.ad_date_updated DESC,
ub_adv.ad_time_updated DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_usr_id', $this->getAd_usr_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/advcoverimage/" . $row['ad_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['ad_img'] = "#";
				} else {
					$data[$i]['ad_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getNumOfAdCountByAdID() {
		$count = 0;
		$sql = "SELECT
ub_adv.ad_usr_id
FROM
ub_adv
WHERE
ub_adv.ad_id = :ad_id";
		$sql2 = "SELECT
COUNT(*) as count
FROM
ub_adv
WHERE
ub_adv.ad_usr_id = :ad_usr_id AND
ub_adv.ad_status = 1";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$readstmt2 = $this->con->prepare($sql2);
				$readstmt2->bindParam(':ad_usr_id', $row->ad_usr_id, PDO::PARAM_INT);
				$readstmt2->execute();
				while ($row2 = $readstmt2->fetch(PDO::FETCH_OBJ)) {
					$count = $row2->count;
				}
			}
			echo $count;
		} catch (Exception $exc) {
			echo $count;
		}
	}

	public function LoadAdInfoByID() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_adv.ad_title,
ub_adv.ad_maincategory,
ub_adv.ad_subcategory,
ub_adv.ad_country,
ub_adv.ad_state,
ub_adv.ad_city,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_maincategory) AS ad_maincategory_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_subcategory) AS ad_subcategory_name,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_country) AS ad_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_state) AS ad_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_city) AS ad_city_name,
ub_adv.ad_usr_id,
ub_adv.ad_shortdesc,
ub_adv.ad_longdesc,
ub_adv.ad_pricetag_status,
ub_adv.ad_price,
ub_adv.ad_status,
ub_adv.ad_date_updated,
ub_adv.ad_time_updated,
ub_adv.ad_filter_array_status,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_profile.pro_website_url,
(SELECT
COUNT(*)
FROM
ub_adv
WHERE
ub_adv.ad_usr_id = ub_adv.ad_usr_id AND
ub_adv.ad_status = 1) AS numofactiveadlistning,
(TIMESTAMPDIFF(DAY, ub_adv.ad_date_updated, CURDATE())) AS adpostedondays,
(TIMESTAMPDIFF(MONTH, ub_adv.ad_date_updated, CURDATE())) AS adpostedonmonth,
(TIMESTAMPDIFF(DAY, df_user.usr_create_date, CURDATE())) AS owneraccontscrondays,
(TIMESTAMPDIFF(MONTH, df_user.usr_create_date, CURDATE())) AS owneraccontscronmonth,
df_profile.pro_instagram_link,
df_profile.pro_youtube_link,
df_profile.pro_fb_link,
df_profile.pro_twitter_link,
df_profile.pro_pinterest_link
FROM
ub_adv
INNER JOIN df_user ON ub_adv.ad_usr_id = df_user.usr_id
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
WHERE
ub_adv.ad_id = :ad_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/userprofileimages/" . $row['ad_usr_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				$directory_ad = "../../asset_imageuploader/advcoverimage/" . $row['ad_id'] . "/";
				$files_ad = scandir($directory_ad);
				$files_ad = array_diff($files_ad, ['.', '..', 'thumbnail']);
				$files_ad = array_values(array_filter($files_ad));
				$directory_slider = "../../asset_imageuploader/advsliderimage/" . $row['ad_id'] . "/";
				$files_slider = scandir($directory_slider);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail']);
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['ad_usr_profile_img'] = "#";
				} else {
					$data[$i]['ad_usr_profile_img'] = $files[0];
				}
				if ($files_ad[0] == NULL) {
					$data[$i]['ad_img'] = "#";
				} else {
					$data[$i]['ad_img'] = $files_ad[0];
				}
				if ($files_slider[0] == NULL) {
					$data[$i]['ad_slider'] = "#";
				} else {
					$data[$i]['ad_slider'] = $files_slider;
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function LoadAllAdsfilters() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_advfilter.adflt_type,
ub_advfilter.adflt_filter,
ub_advfilter.adflt_value,
kn_filtergroup_info.grinf_group,
kn_filtergroup.grp_disp_order,
(SELECT
CASE
    WHEN df_maincombo.mcmb_relation = 1 THEN (SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_advfilter.adflt_value)
    WHEN df_maincombo.mcmb_relation = 2 THEN (SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_advfilter.adflt_value)
		WHEN df_maincombo.mcmb_relation = 3 THEN (SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_advfilter.adflt_value)
END AS valuename
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = ub_advfilter.adflt_filter) AS valuename
FROM
ub_adv
INNER JOIN ub_advfilter ON ub_advfilter.adflt_ad_id = ub_adv.ad_id
INNER JOIN kn_filtergroup_info ON ub_advfilter.adflt_filter = kn_filtergroup_info.grinf_filter AND ub_advfilter.adflt_type = kn_filtergroup_info.grinf_filtertype
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
WHERE
ub_adv.ad_country = :ad_country AND
ub_adv.ad_state = :ad_state AND
ub_adv.ad_city = :ad_city AND
ub_adv.ad_subcategory = :ad_subcategory AND
ub_adv.ad_maincategory = :ad_maincategory AND
ub_adv.ad_filter_array_status = 1
ORDER BY
kn_filtergroup.grp_disp_order ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_country', $this->getAd_country(), PDO::PARAM_INT);
			$readstmt->bindParam(':ad_state', $this->getAd_state(), PDO::PARAM_INT);
			$readstmt->bindParam(':ad_city', $this->getAd_city(), PDO::PARAM_INT);
			$readstmt->bindParam(':ad_subcategory', $this->getAd_subcategory(), PDO::PARAM_INT);
			$readstmt->bindParam(':ad_maincategory', $this->getAd_maincategory(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
//			echo $exc->getMessage();
			echo json_encode($data);
		}
	}

	public function LoadAllAdsfiltersByUserID() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_advfilter.adflt_type,
ub_advfilter.adflt_filter,
ub_advfilter.adflt_value,
kn_filtergroup_info.grinf_group,
kn_filtergroup.grp_disp_order,
(SELECT
CASE
    WHEN df_maincombo.mcmb_relation = 1 THEN (SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_advfilter.adflt_value)
    WHEN df_maincombo.mcmb_relation = 2 THEN (SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_advfilter.adflt_value)
		WHEN df_maincombo.mcmb_relation = 3 THEN (SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_advfilter.adflt_value)
END AS valuename
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = ub_advfilter.adflt_filter) AS valuename
FROM
ub_adv
INNER JOIN ub_advfilter ON ub_advfilter.adflt_ad_id = ub_adv.ad_id
INNER JOIN kn_filtergroup_info ON ub_advfilter.adflt_filter = kn_filtergroup_info.grinf_filter AND ub_advfilter.adflt_type = kn_filtergroup_info.grinf_filtertype
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
WHERE
ub_adv.ad_usr_id = :ad_usr_id AND
ub_adv.ad_filter_array_status = 1
ORDER BY
kn_filtergroup.grp_disp_order ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_usr_id', $this->getAd_usr_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
//			echo $exc->getMessage();
			echo json_encode($data);
		}
	}

	public function LoadAdfiltersByID() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_advfilter.adflt_type,
ub_advfilter.adflt_filter,
ub_advfilter.adflt_value,
kn_filtergroup_info.grinf_group,
kn_filtergroup.grp_disp_order,
ub_adv.ad_maincategory,
ub_adv.ad_subcategory,
(SELECT
CASE
    WHEN df_maincombo.mcmb_relation = 1 THEN (SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_advfilter.adflt_value)
    WHEN df_maincombo.mcmb_relation = 2 THEN (SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_advfilter.adflt_value)
		WHEN df_maincombo.mcmb_relation = 3 THEN (SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_advfilter.adflt_value)
END AS valuename
FROM
df_maincombo
WHERE
df_maincombo.mcmb_id = ub_advfilter.adflt_filter) AS valuename
FROM
ub_adv
INNER JOIN ub_advfilter ON ub_advfilter.adflt_ad_id = ub_adv.ad_id
INNER JOIN kn_filtergroup_info ON ub_advfilter.adflt_filter = kn_filtergroup_info.grinf_filter AND ub_advfilter.adflt_type = kn_filtergroup_info.grinf_filtertype
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
WHERE
ub_adv.ad_id = :ad_id
ORDER BY
kn_filtergroup.grp_disp_order ASC";
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

	public function getAdvTextboxFilterByAdID() {
		$data = array();
		$sql = "SELECT
ub_advfilter.adflt_id,
ub_advfilter.adflt_ad_id,
ub_advfilter.adflt_type,
ub_advfilter.adflt_filter,
ub_advfilter.adflt_value,
kn_filtergroup.grp_id,
kn_filtergroup.grp_admaincategory,
kn_filtergroup.grp_adsubcategory,
kn_filtergroup.grp_disp_order,
kn_textrange_filter.txfl_name,
kn_textrange_filter.txfl_id_name
FROM
ub_advfilter
INNER JOIN kn_filtergroup_info ON ub_advfilter.adflt_type = kn_filtergroup_info.grinf_filtertype AND ub_advfilter.adflt_filter = kn_filtergroup_info.grinf_filter
INNER JOIN kn_filtergroup ON kn_filtergroup_info.grinf_group = kn_filtergroup.grp_id
INNER JOIN kn_textrange_filter ON kn_textrange_filter.txfl_id = ub_advfilter.adflt_filter
WHERE
ub_advfilter.adflt_ad_id = :adflt_ad_id AND
ub_advfilter.adflt_type = 2
ORDER BY
kn_filtergroup.grp_disp_order ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':adflt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getClassifiedAdPageIDsByName() {
//		$ad_maincategory = "";
//		$ad_subcategory = "";
//		$ad_country = "";
//		$ad_state = "";
//		$ad_city = "";
		$data = array();
		$sql_maincmb = "SELECT
df_relatecombo.rlcmb_id
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_name = :ad_maincmbname";
		$ad_subcmb = "SELECT
df_subcombo.scmb_id
FROM
df_subcombo
WHERE
df_subcombo.scmb_name = :ad_subcmbname";
		try {
			$readstmt = $this->con->prepare($sql_maincmb);
			$readstmt->bindParam(':ad_maincmbname', $this->getAd_maincategory(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$data['ad_maincategory'] = $row->rlcmb_id;
			}
//			echo $this->getAd_maincategory();

			$readstmt1 = $this->con->prepare($ad_subcmb);
			$readstmt1->bindParam(':ad_subcmbname', $this->getAd_subcategory(), PDO::PARAM_STR);
			$readstmt1->execute();
			while ($row1 = $readstmt1->fetch(PDO::FETCH_OBJ)) {
				$data['ad_subcategory'] = $row1->scmb_id;
			}
			$readstmt2 = $this->con->prepare($sql_maincmb);
			$readstmt2->bindParam(':ad_maincmbname', $this->getAd_country(), PDO::PARAM_STR);
			$readstmt2->execute();
			while ($row2 = $readstmt2->fetch(PDO::FETCH_OBJ)) {
				$data['ad_country'] = $row2->rlcmb_id;
			}
			$readstmt3 = $this->con->prepare($ad_subcmb);
			$readstmt3->bindParam(':ad_subcmbname', $this->getAd_state(), PDO::PARAM_STR);
			$readstmt3->execute();
			while ($row3 = $readstmt3->fetch(PDO::FETCH_OBJ)) {
				$data['ad_state'] = $row3->scmb_id;
			}
			$readstmt4 = $this->con->prepare($ad_subcmb);
			$readstmt4->bindParam(':ad_subcmbname', $this->getAd_city(), PDO::PARAM_STR);
			$readstmt4->execute();
			while ($row4 = $readstmt4->fetch(PDO::FETCH_OBJ)) {
				$data['ad_city'] = $row4->scmb_id;
			}

			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function allAdv() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_adv.ad_title,
ub_adv.ad_maincategory,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_maincategory) AS ad_maincategory_name,
ub_adv.ad_subcategory,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_subcategory) AS ad_subcategory_name,
ub_adv.ad_country,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_country) AS ad_country_name,
ub_adv.ad_state,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_state) AS ad_state_name,
ub_adv.ad_city,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_city) AS ad_city_name,
ub_adv.ad_usr_id,
ub_adv.ad_shortdesc,
ub_adv.ad_longdesc,
ub_adv.ad_pricetag_status,
ub_adv.ad_price,
ub_adv.ad_status,
ub_adv.ad_date_updated,
ub_adv.ad_time_updated,
df_user.usr_first_name,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_last_name
FROM
ub_adv
INNER JOIN df_user ON ub_adv.ad_usr_id = df_user.usr_id
WHERE
ub_adv.ad_status = 1
ORDER BY
ub_adv.ad_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function allAdvAdmin() {
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_adv.ad_title,
ub_adv.ad_maincategory,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_maincategory) AS ad_maincategory_name,
ub_adv.ad_subcategory,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_subcategory) AS ad_subcategory_name,
ub_adv.ad_country,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_adv.ad_country) AS ad_country_name,
ub_adv.ad_state,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_state) AS ad_state_name,
ub_adv.ad_city,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_adv.ad_city) AS ad_city_name,
ub_adv.ad_usr_id,
ub_adv.ad_shortdesc,
ub_adv.ad_longdesc,
ub_adv.ad_pricetag_status,
ub_adv.ad_price,
ub_adv.ad_status,
ub_adv.ad_date_updated,
ub_adv.ad_time_updated,
df_user.usr_first_name,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_last_name
FROM
ub_adv
INNER JOIN df_user ON ub_adv.ad_usr_id = df_user.usr_id
ORDER BY
ub_adv.ad_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ad_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function madeAdFilter($filter_array) {
		$filter_array = array_filter($filter_array);
		$data = array();
		$sql = "SELECT
ub_adv.ad_id,
ub_adv.ad_country,
ub_adv.ad_state,
ub_adv.ad_city,
ub_adv.ad_subcategory,
ub_adv.ad_maincategory,
ub_advfilter.adflt_filter,
ub_advfilter.adflt_value,
ub_advfilter.adflt_type
FROM
ub_adv
INNER JOIN ub_advfilter ON ub_advfilter.adflt_ad_id = ub_adv.ad_id
WHERE
ub_adv.ad_status = 1 AND
(ub_adv.ad_maincategory = " . $this->getAd_maincategory() . " AND
ub_adv.ad_subcategory = " . $this->getAd_subcategory() . " AND
ub_adv.ad_country = " . $this->getAd_country() . " AND
ub_adv.ad_state = " . $this->getAd_state() . " AND
ub_adv.ad_city = " . $this->getAd_city() . ")";
		if (!empty($filter_array)) {
			$arrcount = count($filter_array);
			$sql_sub = "";
			foreach ($filter_array as $flt_key => $flt_value) {
				if ($flt_value['filter_type'] == 2) {
					if ($flt_value['filter_value'] != "" && $flt_value['filter_value2'] != "") {
						$sql_sub .= "(ub_advfilter.adflt_filter = " . $flt_key . " AND ";
						$sql_sub .= "ub_advfilter.adflt_type = " . $flt_value['filter_type'] . " AND ";
						$sql_sub .= "ub_advfilter.adflt_value BETWEEN '" . $flt_value['filter_value'] . "' AND '" . $flt_value['filter_value2'] . "')";
						if ($arrcount != 1) {
							$sql_sub .= " OR ";
						}
					}
				} else if ($flt_value['filter_type'] == 1) {
					$sql_sub .= "(ub_advfilter.adflt_filter = " . $flt_key . " AND ";
					$sql_sub .= "ub_advfilter.adflt_type = " . $flt_value['filter_type'] . " AND ";
					$sql_sub .= "ub_advfilter.adflt_value = " . $flt_value['filter_value'] . " )";
					if ($arrcount != 1) {
						$sql_sub .= " OR ";
					}
				}
				$arrcount--;
			}
			if ($sql_sub !== "") {
				$sql .= " AND (" . $sql_sub . ")";
			}
		}
		$sql .= " GROUP BY ub_adv.ad_id";
//		echo $sql;
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

	public function generateFrontSearchValue($keyword) {
		$link = "#";
		$data = array();
		$sql_subs = "SELECT
df_subcombo.scmb_name,
df_subcombo.scmb_relatecmb
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = :scmb_id";
		$sql_main = "SELECT
df_subcombo.scmb_name,
df_relatecombo.rlcmb_name
FROM
df_subcombo
INNER JOIN df_relatecombo ON df_subcombo.scmb_relatecmb = df_relatecombo.rlcmb_id
WHERE
df_subcombo.scmb_id  = :scmb_id";
		try {
			$readstmt = $this->con->prepare($sql_subs);
			$readstmt->bindParam(':scmb_id', $this->getAd_city(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$city = $row->scmb_name;
				$readstmt2 = $this->con->prepare($sql_main);
				$readstmt2->bindParam(':scmb_id', $row->scmb_relatecmb, PDO::PARAM_INT);
				$readstmt2->execute();
				while ($row2 = $readstmt2->fetch(PDO::FETCH_OBJ)) {
					$state = $row2->scmb_name;
					$country = $row2->rlcmb_name;
				}
			}

			$readstmt3 = $this->con->prepare($sql_main);
			$readstmt3->bindParam(':scmb_id', $this->getAd_subcategory(), PDO::PARAM_INT);
			$readstmt3->execute();
			while ($row3 = $readstmt3->fetch(PDO::FETCH_OBJ)) {
				$subcatname = $row3->scmb_name;
				$maincatname = $row3->rlcmb_name;
			}
			$link = "classified-info.php?mc=".$maincatname."&sc=".$subcatname."&co=".$country."&st=".$state."&ct=".$city."&keyword=".$keyword;
			echo $link;
		} catch (Exception $exc) {
			echo $link;
		}
	}

	public function tagsCountByAdID() {
		$count = 0;
		$sql = "SELECT
COUNT(*) as count
FROM
ub_advtag
WHERE
ub_advtag.tg_ad_id = :tg_ad_id
ORDER BY
ub_advtag.tg_id ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':tg_ad_id', $this->getTg_ad_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$count = $row->count;
			}
			return $count;
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getNextAutoIncrementAdID() {
		$nextid = 0;
		$sql = "SHOW TABLE STATUS LIKE 'ub_adv'";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$nextid = $row->Auto_increment;
		}
		$this->setAd_id($nextid);
	}

	public function getNextAutoIncrementTagID() {
		$nextid = 0;
		$sql = "SHOW TABLE STATUS LIKE 'ub_advtag'";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$nextid = $row->Auto_increment;
		}
		$this->setTg_id($nextid);
	}

	public function saveAdv($filter_array) {
		$flag = false;
		$filter_new_array = array_filter($filter_array);
		$this->getNextAutoIncrementAdID();
		//1-active,0-inactive,2-pending(review by admin)
		$sql = "INSERT INTO `ub_adv` (`ad_title`, `ad_maincategory`, `ad_subcategory`, `ad_country`, `ad_state`, `ad_city`, `ad_usr_id`, `ad_shortdesc`, `ad_longdesc`, `ad_pricetag_status`, `ad_price`, `ad_status`, `ad_date_updated`, `ad_time_updated`, `ad_filter_array_status`) VALUES (:ad_title, :ad_maincategory, :ad_subcategory, :ad_country, :ad_state, :ad_city, :ad_usr_id, :ad_shortdesc, :ad_longdesc, :ad_pricetag_status, :ad_price, 0, :ad_date_updated, :ad_time_updated, :ad_filter_array_status);
";
		$sql_filter = "INSERT INTO `ub_advfilter` (`adflt_ad_id`, `adflt_type`, `adflt_filter`, `adflt_value`) VALUES (:adflt_ad_id, :adflt_type, :adflt_filter, :adflt_value);
";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_title', $this->getAd_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_maincategory', $this->getAd_maincategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_subcategory', $this->getAd_subcategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_country', $this->getAd_country(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_state', $this->getAd_state(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_city', $this->getAd_city(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$createstmt->bindParam(':ad_shortdesc', $this->getAd_shortdesc(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_longdesc', $this->getAd_longdesc(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_pricetag_status', $this->getAd_pricetag_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_price', $this->getAd_price(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_date_updated', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_time_updated', date("H:i:s"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_filter_array_status', $this->getAd_filter_array_status(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				if ($this->getAd_filter_array_status() == 0) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Please wait a moment for upload media", "ad_id" => $this->getAd_id()));
				} else {
					if (!empty($filter_new_array) && isset($filter_new_array)) {
						foreach ($filter_new_array as $key_fltar => $value_fltar) {
							$createstmt2 = $this->getCon()->prepare($sql_filter);
							$createstmt2->bindParam(':adflt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
							$createstmt2->bindParam(':adflt_type', $value_fltar['filter_type'], PDO::PARAM_INT);
							$createstmt2->bindParam(':adflt_filter', $key_fltar, PDO::PARAM_INT);
							$createstmt2->bindParam(':adflt_value', $value_fltar['filter_value'], PDO::PARAM_STR);
							$flag = $createstmt2->execute();
						}
						if ($flag) {
							$this->getCon()->commit();
							echo json_encode(array("msgType" => 1, "msg" => "Please wait a moment for upload media", "ad_id" => $this->getAd_id()));
						} else {
							$this->getCon()->rollBack();
							echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
						}
					} else {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Please wait a moment for upload media", "ad_id" => $this->getAd_id()));
					}
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function updateAdv($filter_array) {
		$flag = false;
		$filter_new_array = array_filter($filter_array);
		//1-active,0-inactive,2-pending(review by admin)
		$sql = "UPDATE `ub_adv` SET `ad_title` = :ad_title, `ad_maincategory` = :ad_maincategory, `ad_subcategory` = :ad_subcategory, `ad_country` = :ad_country, `ad_state` = :ad_state, `ad_city` = :ad_city, `ad_shortdesc` = :ad_shortdesc, `ad_longdesc` = :ad_longdesc, `ad_pricetag_status` = :ad_pricetag_status, `ad_price` = :ad_price, `ad_status` = '2', `ad_date_updated` = :ad_date_updated, `ad_time_updated` = :ad_time_updated, `ad_filter_array_status` = :ad_filter_array_status WHERE (`ad_id` = :ad_id);
";
		$sql_filter = "INSERT INTO `ub_advfilter` (`adflt_ad_id`, `adflt_type`, `adflt_filter`, `adflt_value`) VALUES (:adflt_ad_id, :adflt_type, :adflt_filter, :adflt_value);
";
		$sql_delete_filters = "DELETE FROM `ub_advfilter` WHERE (`adflt_ad_id` = :adflt_ad_id);
";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_title', $this->getAd_title(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_maincategory', $this->getAd_maincategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_subcategory', $this->getAd_subcategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_country', $this->getAd_country(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_state', $this->getAd_state(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_city', $this->getAd_city(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_shortdesc', $this->getAd_shortdesc(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_longdesc', $this->getAd_longdesc(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_pricetag_status', $this->getAd_pricetag_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_price', $this->getAd_price(), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_date_updated', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_time_updated', date("H:i:s"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_filter_array_status', $this->getAd_filter_array_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$delstmt = $this->con->prepare($sql_delete_filters);
				$delstmt->bindParam(':adflt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
				if ($delstmt->execute()) {
					if ($this->getAd_filter_array_status() == 0) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Please wait a moment for upload media", "ad_id" => $this->getAd_id()));
					} else {
						if (!empty($filter_new_array) && isset($filter_new_array)) {
							foreach ($filter_new_array as $key_fltar => $value_fltar) {
								$createstmt2 = $this->getCon()->prepare($sql_filter);
								$createstmt2->bindParam(':adflt_ad_id', $this->getAd_id(), PDO::PARAM_INT);
								$createstmt2->bindParam(':adflt_type', $value_fltar['filter_type'], PDO::PARAM_INT);
								$createstmt2->bindParam(':adflt_filter', $key_fltar, PDO::PARAM_INT);
								$createstmt2->bindParam(':adflt_value', $value_fltar['filter_value'], PDO::PARAM_STR);
								$flag = $createstmt2->execute();
							}
							if ($flag) {
								$this->getCon()->commit();
								echo json_encode(array("msgType" => 1, "msg" => "Please wait a moment for upload media", "ad_id" => $this->getAd_id()));
							} else {
								$this->getCon()->rollBack();
								echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
							}
						} else {
							$this->getCon()->commit();
							echo json_encode(array("msgType" => 1, "msg" => "Please wait a moment for upload media", "ad_id" => $this->getAd_id()));
						}
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function saveAdvFinalStep() {
		//1-active,0-inactive,2-pending(review by admin)
		$sql = "UPDATE `ub_adv` SET `ad_status` = '2', `ad_date_updated` = :ad_date_updated, `ad_time_updated` = :ad_time_updated WHERE (`ad_id` = :ad_id);
";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_date_updated', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_time_updated', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Your Ad successfully submited.Please wait till we are reviewing your ad before listning.Thank you"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
		}
	}

	public function updateAdvFinalStep() {
		//1-active,0-inactive,2-pending(review by admin)
		$sql = "UPDATE `ub_adv` SET `ad_status` = '2', `ad_date_updated` = :ad_date_updated, `ad_time_updated` = :ad_time_updated WHERE (`ad_id` = :ad_id);
";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_date_updated', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_time_updated', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Your Ad successfully submited.Please wait till we are reviewing your ad again before listning.Thank you"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => "Sorry!ad process failed"));
		}
	}

	public function saveTag() {
		$count = $this->tagsCountByAdID();
		if (($count + 1) <= 5) {
			$sql = "INSERT INTO `ub_advtag` (`tg_tag`, `tg_ad_id`) VALUES (:tg_tag, :tg_ad_id);
";
			try {
				$createstmt = $this->con->prepare($sql);
				$createstmt->bindParam(':tg_tag', $this->getTg_tag(), PDO::PARAM_STR);
				$createstmt->bindParam(':tg_ad_id', $this->getTg_ad_id(), PDO::PARAM_INT);
				if ($createstmt->execute()) {
					echo json_encode(array("msgType" => 1, "msg" => "Successfully Tag Added"));
				} else {
					echo json_encode(array("msgType" => 2, "msg" => "Sorry!Tag Adding Failed"));
				}
			} catch (Exception $exc) {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!Tag Adding Failed"));
			}
		} else {
			echo json_encode(array("msgType" => 2, "msg" => "Max tag count exceeded"));
		}
	}

	public function deleteTag() {
		$sql = "DELETE FROM `ub_advtag` WHERE (`tg_id` = :tg_id);
";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':tg_id', $this->getTg_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteAdv() {
		$folderCoverImage = "../../asset_imageuploader/advcoverimage/" . $this->getAd_id();
		$folderSliderImages = "../../asset_imageuploader/advsliderimage/" . $this->getAd_id();
		$sql = "DELETE FROM `ub_adv` WHERE (`ad_id` = :ad_id);
";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$this->delete_folder($folderCoverImage);
				$this->delete_folder($folderSliderImages);
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function holdAdv() {
		$sql = "UPDATE `ub_adv` SET `ad_status` = '0', `ad_date_updated` = :ad_date_updated, `ad_time_updated` = :ad_date_updated WHERE (`ad_id` = :ad_id);
";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_date_updated', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_time_updated', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully holded your Ad"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!Ad holding failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function activeAdv() {
		$sql = "UPDATE `ub_adv` SET `ad_status` = '2', `ad_date_updated` = :ad_date_updated, `ad_time_updated` = :ad_date_updated WHERE (`ad_id` = :ad_id);
";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_date_updated', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_time_updated', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully your Ad reactivated.Please wait till we are reviewing again your ad before listning.Thank you"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!Ad reactivating failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function activeAdvByAdmin() {
		$sql = "UPDATE `ub_adv` SET `ad_status` = '1', `ad_date_updated` = :ad_date_updated, `ad_time_updated` = :ad_date_updated WHERE (`ad_id` = :ad_id);
";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_date_updated', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_time_updated', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully activated and published"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!Ad activating failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function rejectAdv() {
		$sql = "UPDATE `ub_adv` SET `ad_status` = '3', `ad_date_updated` = :ad_date_updated, `ad_time_updated` = :ad_date_updated WHERE (`ad_id` = :ad_id);
";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ad_id', $this->getAd_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ad_date_updated', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':ad_time_updated', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Rejected."));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry!Ad rejecting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
