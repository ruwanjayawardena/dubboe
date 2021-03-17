<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
/**
 * @author Ruwan Jayawardena
 */
include '../dbconfig/connectDB.php';

class CaErrandRequest extends ConnectDB {

	private $flag = false;
	private $rq_id;
	private $rq_usr_id;
	private $rq_errand_category;
	private $rq_name;
	private $rq_phone;
	private $rq_req_info_give_opt;
	private $rq_store_preference_opt;
	private $rq_store_preference_name;
	private $rq_info_notify;
	private $rq_location;
	private $rq_lat;
	private $rq_lng;
	private $rq_map_status;
	private $rq_how_pay_runner;
	private $rq_accept_toc;
	private $rq_date;
	private $rq_time;
	private $FileToUpload;
	private $rq_status;
	private $ofr_id;

	public function getOfr_id() {
		return $this->ofr_id;
	}

	public function setOfr_id($ofr_id) {
		$this->ofr_id = $ofr_id;
		return $this;
	}

	public function getRq_status() {
		return $this->rq_status;
	}

	public function setRq_status($rq_status) {
		$this->rq_status = $rq_status;
		return $this;
	}

	public function getFileToUpload() {
		return $this->FileToUpload;
	}

	public function setFileToUpload($FileToUpload) {
		$this->FileToUpload = $FileToUpload;
		return $this;
	}

	public function getRq_lat() {
		return $this->rq_lat;
	}

	public function getRq_lng() {
		return $this->rq_lng;
	}

	public function getRq_map_status() {
		return $this->rq_map_status;
	}

	public function setRq_lat($rq_lat) {
		$this->rq_lat = $rq_lat;
		return $this;
	}

	public function setRq_lng($rq_lng) {
		$this->rq_lng = $rq_lng;
		return $this;
	}

	public function setRq_map_status($rq_map_status) {
		$this->rq_map_status = $rq_map_status;
		return $this;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getRq_id() {
		return $this->rq_id;
	}

	public function getRq_usr_id() {
		return $this->rq_usr_id;
	}

	public function getRq_errand_category() {
		return $this->rq_errand_category;
	}

	public function getRq_name() {
		return $this->rq_name;
	}

	public function getRq_phone() {
		return $this->rq_phone;
	}

	public function getRq_req_info_give_opt() {
		return $this->rq_req_info_give_opt;
	}

	public function getRq_store_preference_opt() {
		return $this->rq_store_preference_opt;
	}

	public function getRq_store_preference_name() {
		return $this->rq_store_preference_name;
	}

	public function getRq_info_notify() {
		return $this->rq_info_notify;
	}

	public function getRq_location() {
		return $this->rq_location;
	}

	public function getRq_how_pay_runner() {
		return $this->rq_how_pay_runner;
	}

	public function getRq_accept_toc() {
		return $this->rq_accept_toc;
	}

	public function getRq_date() {
		$this->rq_date = date("Y-m-d");
		return $this->rq_date;
	}

	public function getRq_time() {
		$this->rq_time = date("H:i:s");
		return $this->rq_time;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setRq_id($rq_id) {
		$this->rq_id = $rq_id;
		return $this;
	}

	public function setRq_usr_id($rq_usr_id) {
		$this->rq_usr_id = $rq_usr_id;
		return $this;
	}

	public function setRq_errand_category($rq_errand_category) {
		$this->rq_errand_category = $rq_errand_category;
		return $this;
	}

	public function setRq_name($rq_name) {
		$this->rq_name = $rq_name;
		return $this;
	}

	public function setRq_phone($rq_phone) {
		$this->rq_phone = $rq_phone;
		return $this;
	}

	public function setRq_req_info_give_opt($rq_req_info_give_opt) {
		$this->rq_req_info_give_opt = $rq_req_info_give_opt;
		return $this;
	}

	public function setRq_store_preference_opt($rq_store_preference_opt) {
		$this->rq_store_preference_opt = $rq_store_preference_opt;
		return $this;
	}

	public function setRq_store_preference_name($rq_store_preference_name) {
		$this->rq_store_preference_name = $rq_store_preference_name;
		return $this;
	}

	public function setRq_info_notify($rq_info_notify) {
		$this->rq_info_notify = $rq_info_notify;
		return $this;
	}

	public function setRq_location($rq_location) {
		$this->rq_location = $rq_location;
		return $this;
	}

	public function setRq_how_pay_runner($rq_how_pay_runner) {
		$this->rq_how_pay_runner = $rq_how_pay_runner;
		return $this;
	}

	public function setRq_accept_toc($rq_accept_toc) {
		$this->rq_accept_toc = $rq_accept_toc;
		return $this;
	}

	public function setRq_date($rq_date) {
		$this->rq_date = $rq_date;
		return $this;
	}

	public function setRq_time($rq_time) {
		$this->rq_time = $rq_time;
		return $this;
	}

	public function tblErrandRequest() {
		$data = array();
		$sql = "SELECT
cv_errand_request.rq_id,
cv_errand_request.rq_usr_id,
cv_errand_request.rq_errand_category,
cv_errand_request.rq_name,
cv_errand_request.rq_phone,
cv_errand_request.rq_req_info_give_opt,
cv_errand_request.rq_store_preference_opt,
cv_errand_request.rq_store_preference_name,
cv_errand_request.rq_info_notify,
cv_errand_request.rq_location,
cv_errand_request.rq_lat,
cv_errand_request.rq_lng,
cv_errand_request.rq_map_status,
cv_errand_request.rq_how_pay_runner,
cv_errand_request.rq_accept_toc,
cv_errand_request.rq_status,
cv_errand_request.rq_date,
cv_errand_request.rq_time,
df_user.usr_first_name,
cv_errand_category.cat_name
FROM
cv_errand_request
INNER JOIN df_user ON cv_errand_request.rq_usr_id = df_user.usr_id
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
ORDER BY
cv_errand_request.rq_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/caErrandRequest/" . $row['rq_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['rq_img'] = "#";
				} else {
					$data[$i]['rq_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getErrandRequestByID() {
		$data = array();
		$sql = "SELECT
cv_errand_request.rq_id,
cv_errand_request.rq_usr_id,
cv_errand_request.rq_errand_category,
cv_errand_request.rq_name,
cv_errand_request.rq_phone,
cv_errand_request.rq_req_info_give_opt,
cv_errand_request.rq_store_preference_opt,
cv_errand_request.rq_store_preference_name,
cv_errand_request.rq_info_notify,
cv_errand_request.rq_location,
cv_errand_request.rq_lat,
cv_errand_request.rq_lng,
cv_errand_request.rq_map_status,
cv_errand_request.rq_how_pay_runner,
cv_errand_request.rq_accept_toc,
cv_errand_request.rq_status,
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_category.cat_name
FROM
cv_errand_request
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
WHERE
cv_errand_request.rq_id = :rq_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if ($row['rq_req_info_give_opt'] == 2) {
					$directory = "../../asset_imageuploader/caErrandRequest/" . $row['rq_id'] . "/";
					$files = scandir($directory);
					$files = array_diff($files, ['.', '..', 'thumbnail']);
					$files = array_values(array_filter($files));
					if ($files[0] == NULL) {
						$data[$i]['rq_img'] = "#";
					} else {
						$data[$i]['rq_img'] = $files[0];
					}
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

//	public function getErrandRequestProcessStatus() {
//		$data = array();
//		$sql = "SELECT
//cv_errand_request.rq_status
//FROM
//cv_errand_request
//WHERE
//cv_errand_request.rq_id = :rq_id";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
//			$readstmt->execute();
//			$i = 0;
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[$i] = $row;
//				if ($row['rq_req_info_give_opt'] == 2) {
//					$directory = "../../asset_imageuploader/caErrandRequest/" . $row['rq_id'] . "/";
//					$files = scandir($directory);
//					$files = array_diff($files, ['.', '..', 'thumbnail']);
//					$files = array_values(array_filter($files));
//					if ($files[0] == NULL) {
//						$data[$i]['rq_img'] = "#";
//					} else {
//						$data[$i]['rq_img'] = $files[0];
//					}
//				}
//				$i++;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}

	public function AllErrandRequest() {
		$data = array();
		$sql = "SELECT
cv_errand_request.rq_id,
cv_errand_request.rq_usr_id,
cv_errand_request.rq_errand_category,
cv_errand_request.rq_name,
cv_errand_request.rq_phone,
cv_errand_request.rq_req_info_give_opt,
cv_errand_request.rq_store_preference_opt,
cv_errand_request.rq_store_preference_name,
cv_errand_request.rq_info_notify,
cv_errand_request.rq_location,
cv_errand_request.rq_lat,
cv_errand_request.rq_lng,
cv_errand_request.rq_map_status,
cv_errand_request.rq_how_pay_runner,
cv_errand_request.rq_accept_toc,
cv_errand_request.rq_status,
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_category.cat_name
FROM
cv_errand_request
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if ($row['rq_req_info_give_opt'] == 2) {
					$directory = "../../asset_imageuploader/caErrandRequest/" . $row['rq_id'] . "/";
					$files = scandir($directory);
					$files = array_diff($files, ['.', '..', 'thumbnail']);
					$files = array_values(array_filter($files));
					if ($files[0] == NULL) {
						$data[$i]['rq_img'] = "#";
					} else {
						$data[$i]['rq_img'] = $files[0];
					}
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function clientErrandRequest() {
		$data = array();
		$sql = "SELECT
cv_errand_request.rq_id,
cv_errand_request.rq_usr_id,
cv_errand_request.rq_errand_category,
cv_errand_request.rq_name,
cv_errand_request.rq_phone,
cv_errand_request.rq_req_info_give_opt,
cv_errand_request.rq_store_preference_opt,
cv_errand_request.rq_store_preference_name,
cv_errand_request.rq_info_notify,
cv_errand_request.rq_location,
cv_errand_request.rq_lat,
cv_errand_request.rq_lng,
cv_errand_request.rq_map_status,
cv_errand_request.rq_how_pay_runner,
cv_errand_request.rq_accept_toc,
cv_errand_request.rq_status,
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_category.cat_name,
df_profile.pro_lat,
df_profile.pro_lng,
df_profile.pro_location,
df_profile.pro_map_status
FROM
cv_errand_request
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
INNER JOIN df_profile ON df_profile.pro_usr_id = cv_errand_request.rq_usr_id
WHERE
cv_errand_request.rq_id NOT IN (SELECT
cv_runner_offer.ofr_errand_request
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_usr_id = :ofr_usr_id AND
cv_runner_offer.ofr_status >= 1) AND
cv_errand_request.rq_status = 1
ORDER BY
cv_errand_request.rq_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ofr_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblErrandRequestByUser() {
		$data = array();
		$sql = "SELECT
cv_errand_request.rq_id,
cv_errand_request.rq_usr_id,
cv_errand_request.rq_errand_category,
cv_errand_request.rq_name,
cv_errand_request.rq_phone,
cv_errand_request.rq_req_info_give_opt,
cv_errand_request.rq_store_preference_opt,
cv_errand_request.rq_store_preference_name,
cv_errand_request.rq_info_notify,
cv_errand_request.rq_location,
cv_errand_request.rq_lat,
cv_errand_request.rq_lng,
cv_errand_request.rq_map_status,
cv_errand_request.rq_how_pay_runner,
cv_errand_request.rq_accept_toc,
cv_errand_request.rq_status,
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_category.cat_name,
(SELECT
cv_runner_offer.ofr_upload_receipt
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id) AS receipt_upload_status,
(SELECT
cv_runner_offer.ofr_requester_payment_confirmed
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id) AS ofr_requester_payment_confirmed,
(SELECT
cv_runner_offer.ofr_deliver_status
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id) AS ofr_deliver_status,
(SELECT
COUNT(*)
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id) AS number_of_offers,
(SELECT
IF(ISNULL(cv_runner_offer.ofr_name),'Not Selected',cv_runner_offer.ofr_name)
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id AND
cv_runner_offer.ofr_status >= 2) AS selected_runner,
(SELECT
IF(ISNULL(cv_runner_offer.ofr_name),0,1)
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id AND
cv_runner_offer.ofr_status >= 2) AS runner_selected_status,
(SELECT
IF(ISNULL(cv_runner_offer.ofr_id),0,cv_runner_offer.ofr_id)
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id AND
cv_runner_offer.ofr_status >= 2) AS runner_offer_id,
cv_errand_request.rq_paid_receipt_status,
cv_errand_request.rq_delivery_received_status
FROM
cv_errand_request
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
WHERE
cv_errand_request.rq_usr_id = :rq_usr_id
ORDER BY
cv_errand_request.rq_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rq_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if ($row['rq_req_info_give_opt'] == 2) {
					$directory = "../../asset_imageuploader/caErrandRequest/" . $row['rq_id'] . "/";
					$files = scandir($directory);
					$files = array_diff($files, ['.', '..', 'thumbnail']);
					$files = array_values(array_filter($files));
					if ($files[0] == NULL) {
						$data[$i]['rq_img'] = "#";
					} else {
						$data[$i]['rq_img'] = $files[0];
					}
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}
	
	public function tblErrandRequestByUserLastOne() {
		$data = array();
		$sql = "SELECT
cv_errand_request.rq_id,
cv_errand_request.rq_usr_id,
cv_errand_request.rq_errand_category,
cv_errand_request.rq_name,
cv_errand_request.rq_phone,
cv_errand_request.rq_req_info_give_opt,
cv_errand_request.rq_store_preference_opt,
cv_errand_request.rq_store_preference_name,
cv_errand_request.rq_info_notify,
cv_errand_request.rq_location,
cv_errand_request.rq_lat,
cv_errand_request.rq_lng,
cv_errand_request.rq_map_status,
cv_errand_request.rq_how_pay_runner,
cv_errand_request.rq_accept_toc,
cv_errand_request.rq_status,
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_category.cat_name,
(SELECT
cv_runner_offer.ofr_upload_receipt
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id) AS receipt_upload_status,
(SELECT
cv_runner_offer.ofr_requester_payment_confirmed
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id) AS ofr_requester_payment_confirmed,
(SELECT
cv_runner_offer.ofr_deliver_status
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id) AS ofr_deliver_status,
(SELECT
COUNT(*)
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id) AS number_of_offers,
(SELECT
IF(ISNULL(cv_runner_offer.ofr_name),'Not Selected',cv_runner_offer.ofr_name)
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id AND
cv_runner_offer.ofr_status >= 2) AS selected_runner,
(SELECT
IF(ISNULL(cv_runner_offer.ofr_name),0,1)
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id AND
cv_runner_offer.ofr_status >= 2) AS runner_selected_status,
(SELECT
IF(ISNULL(cv_runner_offer.ofr_id),0,cv_runner_offer.ofr_id)
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id AND
cv_runner_offer.ofr_status >= 2) AS runner_offer_id,
cv_errand_request.rq_paid_receipt_status,
cv_errand_request.rq_delivery_received_status
FROM
cv_errand_request
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
WHERE
cv_errand_request.rq_usr_id = :rq_usr_id AND
coronahelpapp.cv_errand_request.rq_status = 3
ORDER BY
cv_errand_request.rq_id DESC
LIMIT 1";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rq_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if ($row['rq_req_info_give_opt'] == 2) {
					$directory = "../../asset_imageuploader/caErrandRequest/" . $row['rq_id'] . "/";
					$files = scandir($directory);
					$files = array_diff($files, ['.', '..', 'thumbnail']);
					$files = array_values(array_filter($files));
					if ($files[0] == NULL) {
						$data[$i]['rq_img'] = "#";
					} else {
						$data[$i]['rq_img'] = $files[0];
					}
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function uploadImage($folder_Id, $file) {
//		$custom_name = rand() . "FILE";
		$uploadImageArr = $file;
		//create directory if not exists
		$target_main_dir = "../../asset_imageuploader/caErrandRequest/" . $folder_Id . "/";
		if (!file_exists($target_main_dir) && !file_exists($target_thumb_dir)) {
			mkdir($target_main_dir, 0777, true);
		}
		$target_file = $target_main_dir . basename($uploadImageArr["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
		$check = getimagesize($uploadImageArr["tmp_name"]);
		if ($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
// Check if file already exists
		if (file_exists($target_file)) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
// Allow certain file formats
		if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			return false;
// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($uploadImageArr["tmp_name"], $target_file)) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function getNextErrandRequestID() {
		$nextid = 0;
		$sql = "SHOW TABLE STATUS LIKE 'cv_errand_request'";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$nextid = $row->Auto_increment;
		}
		$this->setRq_id($nextid);
	}

	public function addErrandRequest($uploadFILE) {
		$sql = "INSERT INTO `cv_errand_request` (`rq_usr_id`, `rq_errand_category`, `rq_name`, `rq_phone`, `rq_req_info_give_opt`, `rq_store_preference_opt`, `rq_store_preference_name`, `rq_info_notify`, `rq_location`, `rq_lat`, `rq_lng`, `rq_map_status`, `rq_how_pay_runner`, `rq_accept_toc`, `rq_date`, `rq_time`) VALUES (:rq_usr_id, :rq_errand_category, :rq_name, :rq_phone, :rq_req_info_give_opt, :rq_store_preference_opt, :rq_store_preference_name, :rq_info_notify, :rq_location, :rq_lat, :rq_lng, :rq_map_status, :rq_how_pay_runner, :rq_accept_toc, :rq_date,:rq_time);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rq_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
//			echo "categroy: ".$this->getRq_errand_category()."||||||";
			$createstmt->bindParam(':rq_errand_category', $this->getRq_errand_category(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_name', $this->getRq_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_phone', $this->getRq_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_req_info_give_opt', $this->getRq_req_info_give_opt(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_store_preference_opt', $this->getRq_store_preference_opt(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_store_preference_name', $this->getRq_store_preference_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_info_notify', $this->getRq_info_notify(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_location', $this->getRq_location(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_lat', $this->getRq_lat(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_lng', $this->getRq_lng(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_map_status', $this->getRq_map_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_how_pay_runner', $this->getRq_how_pay_runner(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_accept_toc', $this->getRq_accept_toc(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_date', $this->getRq_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_time', $this->getRq_time(), PDO::PARAM_STR);
			$this->getNextErrandRequestID();
			if ($createstmt->execute()) {
				if ($this->getRq_req_info_give_opt() == 2) {
					$uploadimage = $this->uploadImage($this->getRq_id(), $uploadFILE);
					if ($uploadimage) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Your Request Successfully Placed", "rq_id" => $this->getRq_id()));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! Request could not be done"));
					}
				} else {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Your Request Successfully Placed", "rq_id" => $this->getRq_id()));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Request could not be done"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry System Error! Request could not be done"));
		}
	}

	public function publishErrandRequest() {
		$sql = "UPDATE `cv_errand_request` SET `rq_status`='1' WHERE (`rq_id`=:rq_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Your Request Successfully Published"));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Request can not be publish"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! Request can not be publish"));
		}
	}

	public function markCompletedErrandRequest() {
		$sql_search_offer = "SELECT
cv_runner_offer.ofr_id
FROM
cv_runner_offer
WHERE
cv_runner_offer.ofr_status = 2 AND
cv_runner_offer.ofr_errand_request = :rq_id";
		$sql_request = "UPDATE `cv_errand_request` SET `rq_status`='3', `rq_delivery_received_status`='1' WHERE (`rq_id`=:rq_id);";
		$sql_offer = "UPDATE `cv_runner_offer` SET `ofr_status`='3', `ofr_deliver_status`='1' WHERE (`ofr_id`=:ofr_id);";
		try {
			$this->getCon()->beginTransaction();
			$readstmt = $this->con->prepare($sql_search_offer);
			$readstmt->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$ofr_id = $row->ofr_id;
			}
			$createstmt = $this->con->prepare($sql_request);
			$createstmt->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$createstmt2 = $this->con->prepare($sql_offer);
				$createstmt2->bindParam(':ofr_id', $ofr_id, PDO::PARAM_INT);
				if ($createstmt2->execute()) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Thank you for confirmed as your request received.So we marked your request as completed"));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! Your Request can not perform"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Your Request can not perform"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! Your Request can not perform"));
		}
	}

	public function markRequestAsPaid() {
		$sql_request = "UPDATE `cv_errand_request` SET `rq_paid_receipt_status`='1' WHERE (`rq_id`=:rq_id);";
		try {
			$createstmt = $this->con->prepare($sql_request);
			$createstmt->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Your Request marked as paid"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Request can not be mark as paid"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! Request can not be mark as completed"));
		}
	}

	public function saveDraftErrandRequest($uploadFILE) {
		$sql = "INSERT INTO `cv_errand_request` (`rq_usr_id`, `rq_errand_category`, `rq_name`, `rq_phone`, `rq_req_info_give_opt`, `rq_store_preference_opt`, `rq_store_preference_name`, `rq_info_notify`, `rq_location`, `rq_lat`, `rq_lng`, `rq_map_status`, `rq_how_pay_runner`, `rq_accept_toc`, `rq_date`, `rq_time`, `rq_status`) VALUES (:rq_usr_id, :rq_errand_category, :rq_name, :rq_phone, :rq_req_info_give_opt, :rq_store_preference_opt, :rq_store_preference_name, :rq_info_notify, :rq_location, :rq_lat, :rq_lng, :rq_map_status, :rq_how_pay_runner, :rq_accept_toc, :rq_date,:rq_time, '0');";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rq_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
//			echo "categroy: ".$this->getRq_errand_category()."||||||";
			$createstmt->bindParam(':rq_errand_category', $this->getRq_errand_category(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_name', $this->getRq_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_phone', $this->getRq_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_req_info_give_opt', $this->getRq_req_info_give_opt(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_store_preference_opt', $this->getRq_store_preference_opt(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_store_preference_name', $this->getRq_store_preference_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_info_notify', $this->getRq_info_notify(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_location', $this->getRq_location(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_lat', $this->getRq_lat(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_lng', $this->getRq_lng(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_map_status', $this->getRq_map_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_how_pay_runner', $this->getRq_how_pay_runner(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_accept_toc', $this->getRq_accept_toc(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_date', $this->getRq_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_time', $this->getRq_time(), PDO::PARAM_STR);
			$this->getNextErrandRequestID();
			if ($createstmt->execute()) {
				if ($this->getRq_req_info_give_opt() == 2) {
					$uploadimage = $this->uploadImage($this->getRq_id(), $uploadFILE);
					if ($uploadimage) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Your Request Successfully Placed", "rq_id" => $this->getRq_id()));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! Request could not be done"));
					}
				} else {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Your Request Successfully Placed", "rq_id" => $this->getRq_id()));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Request could not be done"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry System Error! Request could not be done"));
		}
	}

	public function editErrandRequest() {
		$sql = "UPDATE `cv_errand_request` SET `rq_name`=:rq_name, `rq_phone`=:rq_phone, `rq_req_info_give_opt`=:rq_req_info_give_opt, `rq_store_preference_opt`=:rq_store_preference_opt, `rq_store_preference_name`=:rq_store_preference_name, `rq_info_notify`=:rq_info_notify, `rq_location`=:rq_location, `rq_lat`=:rq_lat, `rq_lng`=:rq_lng, `rq_map_status`,:rq_map_status, `rq_how_pay_runner`=:rq_how_pay_runner, `rq_accept_toc`=:rq_accept_toc WHERE (`rq_id` = :rq_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rq_name', $this->getRq_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_phone', $this->getRq_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_req_info_give_opt', $this->getRq_req_info_give_opt(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_store_preference_opt', $this->getRq_store_preference_opt(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_store_preference_name', $this->getRq_store_preference_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_info_notify', $this->getRq_info_notify(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_location', $this->getRq_location(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_lat', $this->getRq_lat(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_lng', $this->getRq_lng(), PDO::PARAM_STR);
			$createstmt->bindParam(':rq_map_status', $this->getRq_map_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_how_pay_runner', $this->getRq_how_pay_runner(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_accept_toc', $this->getRq_accept_toc(), PDO::PARAM_INT);
			$createstmt->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function removeErrandRequest() {
		$sql = "DELETE FROM `cv_errand_request` WHERE (`rq_id` = :rq_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
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
