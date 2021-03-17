<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
/**
 * @author Ruwan Jayawardena
 */
include '../dbconfig/connectDB.php';

class CaErrandOffer extends ConnectDB {

	private $flag = false;
	private $ofr_id;
	private $ofr_usr_id;
	private $ofr_errand_request;
	private $ofr_name;
	private $ofr_phone;
	private $ofr_miles_radius;
	private $ofr_location;
	private $ofr_lat;
	private $ofr_lng;
	private $ofr_map_status;
	private $ofr_receipt_amout;
	private $ofr_errand_run_fee;
	private $ofr_date;
	private $ofr_time;
	private $ofr_status;
	private $FileToUpload;
	private $rq_id;
	private $ofr_deliver_status;

	public function getOfr_deliver_status() {
		return $this->ofr_deliver_status;
	}

	public function setOfr_deliver_status($ofr_deliver_status) {
		$this->ofr_deliver_status = $ofr_deliver_status;
		return $this;
	}

	public function getRq_id() {
		return $this->rq_id;
	}

	public function setRq_id($rq_id) {
		$this->rq_id = $rq_id;
		return $this;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getOfr_id() {
		return $this->ofr_id;
	}

	public function getOfr_usr_id() {
		return $this->ofr_usr_id;
	}

	public function getOfr_errand_request() {
		return $this->ofr_errand_request;
	}

	public function getOfr_name() {
		return $this->ofr_name;
	}

	public function getOfr_phone() {
		return $this->ofr_phone;
	}

	public function getOfr_miles_radius() {
		return $this->ofr_miles_radius;
	}

	public function getOfr_location() {
		return $this->ofr_location;
	}

	public function getOfr_lat() {
		return $this->ofr_lat;
	}

	public function getOfr_lng() {
		return $this->ofr_lng;
	}

	public function getOfr_map_status() {
		return $this->ofr_map_status;
	}

	public function getOfr_receipt_amout() {
		return $this->ofr_receipt_amout;
	}

	public function getOfr_errand_run_fee() {
		return $this->ofr_errand_run_fee;
	}

	public function getOfr_date() {
		$this->ofr_date = date("Y-m-d");
		return $this->ofr_date;
	}

	public function getOfr_time() {
		$this->ofr_time = date("H:i:s");
		return $this->ofr_time;
	}

	public function getOfr_status() {
		return $this->ofr_status;
	}

	public function getFileToUpload() {
		return $this->FileToUpload;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setOfr_id($ofr_id) {
		$this->ofr_id = $ofr_id;
		return $this;
	}

	public function setOfr_usr_id($ofr_usr_id) {
		$this->ofr_usr_id = $ofr_usr_id;
		return $this;
	}

	public function setOfr_errand_request($ofr_errand_request) {
		$this->ofr_errand_request = $ofr_errand_request;
		return $this;
	}

	public function setOfr_name($ofr_name) {
		$this->ofr_name = $ofr_name;
		return $this;
	}

	public function setOfr_phone($ofr_phone) {
		$this->ofr_phone = $ofr_phone;
		return $this;
	}

	public function setOfr_miles_radius($ofr_miles_radius) {
		$this->ofr_miles_radius = $ofr_miles_radius;
		return $this;
	}

	public function setOfr_location($ofr_location) {
		$this->ofr_location = $ofr_location;
		return $this;
	}

	public function setOfr_lat($ofr_lat) {
		$this->ofr_lat = $ofr_lat;
		return $this;
	}

	public function setOfr_lng($ofr_lng) {
		$this->ofr_lng = $ofr_lng;
		return $this;
	}

	public function setOfr_map_status($ofr_map_status) {
		$this->ofr_map_status = $ofr_map_status;
		return $this;
	}

	public function setOfr_receipt_amout($ofr_receipt_amout) {
		$this->ofr_receipt_amout = $ofr_receipt_amout;
		return $this;
	}

	public function setOfr_errand_run_fee($ofr_errand_run_fee) {
		$this->ofr_errand_run_fee = $ofr_errand_run_fee;
		return $this;
	}

	public function setOfr_date($ofr_date) {
		$this->ofr_date = $ofr_date;
		return $this;
	}

	public function setOfr_time($ofr_time) {
		$this->ofr_time = $ofr_time;
		return $this;
	}

	public function setOfr_status($ofr_status) {
		$this->ofr_status = $ofr_status;
		return $this;
	}

	public function setFileToUpload($FileToUpload) {
		$this->FileToUpload = $FileToUpload;
		return $this;
	}

//	public function getOfr_date() {
//		$this->ofr_date = date("Y-m-d");
//		return $this->ofr_date;
//	}
//
//	public function getOfr_time() {
//		$this->ofr_time = date("H:i:s");
//		return $this->ofr_time;
//	}
//	public function tblErrandOffer() {
//		$data = array();
//		$sql = "SELECT
//cv_runner_offer.ofr_id,
//cv_runner_offer.ofr_usr_id,
//cv_runner_offer.ofr_errand_request,
//cv_runner_offer.ofr_name,
//cv_runner_offer.ofr_phone,
//cv_runner_offer.ofr_req_info_give_opt,
//cv_runner_offer.ofr_store_preference_opt,
//cv_runner_offer.ofr_store_preference_name,
//cv_runner_offer.ofr_info_notify,
//cv_runner_offer.ofr_location,
//cv_runner_offer.ofr_lat,
//cv_runner_offer.ofr_lng,
//cv_runner_offer.ofr_map_status,
//cv_runner_offer.ofr_how_pay_runner,
//cv_runner_offer.ofr_accept_toc,
//cv_runner_offer.ofr_status,
//cv_runner_offer.ofr_date,
//cv_runner_offer.ofr_time,
//df_user.usr_first_name,
//cv_errand_category.cat_name
//FROM
//cv_runner_offer
//INNER JOIN df_user ON cv_runner_offer.ofr_usr_id = df_user.usr_id
//INNER JOIN cv_errand_category ON cv_runner_offer.ofr_errand_request = cv_errand_category.cat_id
//ORDER BY
//cv_runner_offer.ofr_id DESC";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->execute();
//			$i = 0;
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[$i] = $row;
//				$directory = "../../asset_imageuploader/caErrandOffer/" . $row['ofr_id'] . "/";
//				$files = scandir($directory);
//				$files = array_diff($files, ['.', '..', 'thumbnail']);
//				$files = array_values(array_filter($files));
//				if ($files[0] == NULL) {
//					$data[$i]['ofr_img'] = "#";
//				} else {
//					$data[$i]['ofr_img'] = $files[0];
//				}
//				$i++;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}

	public function getErrandOfferByID() {
		$data = array();
		$sql = "SELECT
cv_runner_offer.ofr_id,
cv_runner_offer.ofr_usr_id,
cv_runner_offer.ofr_errand_request,
cv_runner_offer.ofr_name,
cv_runner_offer.ofr_phone,
cv_runner_offer.ofr_miles_radius,
cv_runner_offer.ofr_location,
cv_runner_offer.ofr_lat,
cv_runner_offer.ofr_lng,
cv_runner_offer.ofr_map_status,
cv_runner_offer.ofr_receipt_amout,
cv_runner_offer.ofr_errand_run_fee,
cv_runner_offer.ofr_date,
cv_runner_offer.ofr_time,
cv_runner_offer.ofr_status,
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
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_request.rq_status,
cv_errand_category.cat_name
FROM
cv_runner_offer
INNER JOIN cv_errand_request ON cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
WHERE
cv_runner_offer.ofr_id = :ofr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ofr_id', $this->getOfr_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/caErrandOffer/" . $row['ofr_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['ofr_img'] = "#";
				} else {
					$data[$i]['ofr_img'] = $files[0];
				}

				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getErrandOfferByRequest() {
		$data = array();
		$sql = "SELECT
cv_runner_offer.ofr_id,
cv_runner_offer.ofr_usr_id,
cv_runner_offer.ofr_errand_request,
cv_runner_offer.ofr_name,
cv_runner_offer.ofr_phone,
cv_runner_offer.ofr_miles_radius,
cv_runner_offer.ofr_location,
cv_runner_offer.ofr_lat,
cv_runner_offer.ofr_lng,
cv_runner_offer.ofr_map_status,
cv_runner_offer.ofr_receipt_amout,
cv_runner_offer.ofr_errand_run_fee,
cv_runner_offer.ofr_date,
cv_runner_offer.ofr_time,
cv_runner_offer.ofr_status,
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
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_request.rq_status,
cv_errand_category.cat_name
FROM
cv_runner_offer
INNER JOIN cv_errand_request ON cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
WHERE
cv_runner_offer.ofr_errand_request = :ofr_errand_request";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ofr_errand_request', $this->getOfr_errand_request(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/caErrandOffer/" . $row['ofr_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['ofr_img'] = "#";
				} else {
					$data[$i]['ofr_img'] = $files[0];
				}

				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblErrandOfferByUser() {
		$data = array();
		$sql = "SELECT
cv_runner_offer.ofr_id,
cv_runner_offer.ofr_usr_id,
cv_runner_offer.ofr_errand_request,
cv_runner_offer.ofr_name,
cv_runner_offer.ofr_phone,
cv_runner_offer.ofr_miles_radius,
cv_runner_offer.ofr_location,
cv_runner_offer.ofr_lat,
cv_runner_offer.ofr_lng,
cv_runner_offer.ofr_map_status,
cv_runner_offer.ofr_receipt_amout,
cv_runner_offer.ofr_errand_run_fee,
cv_runner_offer.ofr_date,
cv_runner_offer.ofr_time,
cv_runner_offer.ofr_status,
cv_runner_offer.ofr_deliver_status,
cv_runner_offer.ofr_requester_payment_confirmed,
cv_runner_offer.ofr_upload_receipt,
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
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_request.rq_status,
cv_errand_category.cat_name,
cv_errand_request.rq_paid_receipt_status,
cv_errand_request.rq_delivery_received_status
FROM
cv_runner_offer
INNER JOIN cv_errand_request ON cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
WHERE
cv_runner_offer.ofr_usr_id = :ofr_usr_id
ORDER BY
cv_runner_offer.ofr_id DESC";
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
	
	public function tblErrandOfferByUserLastOne() {
		$data = array();
		$sql = "SELECT
cv_runner_offer.ofr_id,
cv_runner_offer.ofr_usr_id,
cv_runner_offer.ofr_errand_request,
cv_runner_offer.ofr_name,
cv_runner_offer.ofr_phone,
cv_runner_offer.ofr_miles_radius,
cv_runner_offer.ofr_location,
cv_runner_offer.ofr_lat,
cv_runner_offer.ofr_lng,
cv_runner_offer.ofr_map_status,
cv_runner_offer.ofr_receipt_amout,
cv_runner_offer.ofr_errand_run_fee,
cv_runner_offer.ofr_date,
cv_runner_offer.ofr_time,
cv_runner_offer.ofr_status,
cv_runner_offer.ofr_deliver_status,
cv_runner_offer.ofr_requester_payment_confirmed,
cv_runner_offer.ofr_upload_receipt,
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
cv_errand_request.rq_date,
cv_errand_request.rq_time,
cv_errand_request.rq_status,
cv_errand_category.cat_name,
cv_errand_request.rq_paid_receipt_status,
cv_errand_request.rq_delivery_received_status
FROM
cv_runner_offer
INNER JOIN cv_errand_request ON cv_runner_offer.ofr_errand_request = cv_errand_request.rq_id
INNER JOIN cv_errand_category ON cv_errand_request.rq_errand_category = cv_errand_category.cat_id
WHERE
cv_runner_offer.ofr_usr_id = :ofr_usr_id AND
cv_runner_offer.ofr_status = 3
ORDER BY
cv_runner_offer.ofr_id DESC
LIMIT 1";
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

//	public function AllErrandOffer() {
//		$data = array();
//		$sql = "SELECT
//cv_runner_offer.ofr_id,
//cv_runner_offer.ofr_usr_id,
//cv_runner_offer.ofr_errand_request,
//cv_runner_offer.ofr_name,
//cv_runner_offer.ofr_phone,
//cv_runner_offer.ofr_req_info_give_opt,
//cv_runner_offer.ofr_store_preference_opt,
//cv_runner_offer.ofr_store_preference_name,
//cv_runner_offer.ofr_info_notify,
//cv_runner_offer.ofr_location,
//cv_runner_offer.ofr_lat,
//cv_runner_offer.ofr_lng,
//cv_runner_offer.ofr_map_status,
//cv_runner_offer.ofr_how_pay_runner,
//cv_runner_offer.ofr_accept_toc,
//cv_runner_offer.ofr_status,
//cv_runner_offer.ofr_date,
//cv_runner_offer.ofr_time,
//cv_errand_category.cat_name
//FROM
//cv_runner_offer
//INNER JOIN cv_errand_category ON cv_runner_offer.ofr_errand_request = cv_errand_category.cat_id";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->execute();
//			$i = 0;
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[$i] = $row;
//				if ($row['ofr_req_info_give_opt'] == 2) {
//					$directory = "../../asset_imageuploader/caErrandOffer/" . $row['ofr_id'] . "/";
//					$files = scandir($directory);
//					$files = array_diff($files, ['.', '..', 'thumbnail']);
//					$files = array_values(array_filter($files));
//					if ($files[0] == NULL) {
//						$data[$i]['ofr_img'] = "#";
//					} else {
//						$data[$i]['ofr_img'] = $files[0];
//					}
//				}
//				$i++;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}
//	public function tblErrandOfferByUser() {
//		$data = array();
//		$sql = "SELECT
//cv_runner_offer.ofr_id,
//cv_runner_offer.ofr_usr_id,
//cv_runner_offer.ofr_errand_request,
//cv_runner_offer.ofr_name,
//cv_runner_offer.ofr_phone,
//cv_runner_offer.ofr_req_info_give_opt,
//cv_runner_offer.ofr_store_preference_opt,
//cv_runner_offer.ofr_store_preference_name,
//cv_runner_offer.ofr_info_notify,
//cv_runner_offer.ofr_location,
//cv_runner_offer.ofr_lat,
//cv_runner_offer.ofr_lng,
//cv_runner_offer.ofr_map_status,
//cv_runner_offer.ofr_how_pay_runner,
//cv_runner_offer.ofr_accept_toc,
//cv_runner_offer.ofr_status,
//cv_runner_offer.ofr_date,
//cv_runner_offer.ofr_time,
//cv_errand_category.cat_name
//FROM
//cv_runner_offer
//INNER JOIN cv_errand_category ON cv_runner_offer.ofr_errand_request = cv_errand_category.cat_id
//WHERE
//cv_runner_offer.ofr_usr_id = :ofr_usr_id";
//		try {
//			$readstmt = $this->con->prepare($sql);
//			$readstmt->bindParam(':ofr_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
//			$readstmt->execute();
//			$i = 0;
//			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
//				$data[$i] = $row;
//				if ($row['ofr_req_info_give_opt'] == 2) {
//					$directory = "../../asset_imageuploader/caErrandOffer/" . $row['ofr_id'] . "/";
//					$files = scandir($directory);
//					$files = array_diff($files, ['.', '..', 'thumbnail']);
//					$files = array_values(array_filter($files));
//					if ($files[0] == NULL) {
//						$data[$i]['ofr_img'] = "#";
//					} else {
//						$data[$i]['ofr_img'] = $files[0];
//					}
//				}
//				$i++;
//			}
//			echo json_encode($data);
//		} catch (Exception $exc) {
//			echo json_encode($data);
//		}
//	}

	public function uploadImage($folder_Id, $file) {
//		$custom_name = rand() . "FILE";
		$uploadImageArr = $file;
		//create directory if not exists
		$target_main_dir = "../../asset_imageuploader/caErrandOffer/" . $folder_Id . "/";
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

	public function getNextErrandOfferID() {
		$nextid = 0;
		$sql = "SHOW TABLE STATUS LIKE 'cv_runner_offer'";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$nextid = $row->Auto_increment;
		}
		$this->setOfr_id($nextid);
	}

	public function addErrandOffer($uploadFILE, $is_img_upload) {
		$sql = "INSERT INTO `cv_runner_offer` (`ofr_usr_id`, `ofr_errand_request`, `ofr_name`, `ofr_phone`, `ofr_miles_radius`, `ofr_location`, `ofr_lat`, `ofr_lng`, `ofr_map_status`, `ofr_receipt_amout`, `ofr_errand_run_fee`, `ofr_date`, `ofr_time`) VALUES (:ofr_usr_id, :ofr_errand_request, :ofr_name, :ofr_phone, :ofr_miles_radius, :ofr_location, :ofr_lat, :ofr_lng, :ofr_map_status, :ofr_receipt_amout, :ofr_errand_run_fee, :ofr_date,:ofr_time);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ofr_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$createstmt->bindParam(':ofr_errand_request', $this->getOfr_errand_request(), PDO::PARAM_INT);
			$createstmt->bindParam(':ofr_name', $this->getOfr_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_phone', $this->getOfr_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_miles_radius', $this->getOfr_miles_radius(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_location', $this->getOfr_location(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_lat', $this->getOfr_lat(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_lng', $this->getOfr_lng(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_map_status', $this->getOfr_map_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':ofr_receipt_amout', $this->getOfr_receipt_amout(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_errand_run_fee', $this->getOfr_errand_run_fee(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_date', $this->getOfr_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':ofr_time', $this->getOfr_time(), PDO::PARAM_STR);
			$this->getNextErrandOfferID();
			if ($createstmt->execute()) {
				if ($is_img_upload == 1) {
					$uploadimage = $this->uploadImage($this->getOfr_id(), $uploadFILE);
					if ($uploadimage) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Your Offer Successfully Placed", "ofr_id" => $this->getOfr_id()));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! Offer could not be done"));
					}
				} else {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Your Offer Successfully Placed", "ofr_id" => $this->getOfr_id()));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Offer could not be done"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry System Error! Offer could not be done"));
		}
	}
	
	public function uploadOfferReceipt($uploadFILE, $is_img_upload) {
		$sql = "UPDATE `cv_runner_offer` SET `ofr_receipt_amout`=:ofr_receipt_amout, `ofr_upload_receipt`='1' WHERE (`ofr_id`=:ofr_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);			
			$createstmt->bindParam(':ofr_id', $this->getOfr_id(), PDO::PARAM_INT);			
			$createstmt->bindParam(':ofr_receipt_amout', $this->getOfr_receipt_amout(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				if ($is_img_upload == 1) {
					$uploadimage = $this->uploadImage($this->getOfr_id(), $uploadFILE);
					if ($uploadimage) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Your Offer Upgraded", "ofr_id" => $this->getOfr_id()));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! Offer could not be upgrade"));
					}
				} else {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Your Offer Upgraded", "ofr_id" => $this->getOfr_id()));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Offer could not be upgrade"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry System Error! Offer could not be upgrade"));
		}
	}

	public function acceptErrandOffer() {
		$sql_update_offer = "UPDATE `cv_runner_offer` SET `ofr_status`= '2' WHERE (`ofr_id`=:ofr_id);";
		$sql_update_request = "UPDATE `cv_errand_request` SET `rq_status`= '2' WHERE (`rq_id`=:rq_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql_update_offer);
			$createstmt->bindParam(':ofr_id', $this->getOfr_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$createstmt2 = $this->con->prepare($sql_update_request);
				$createstmt2->bindParam(':rq_id', $this->getRq_id(), PDO::PARAM_INT);
				if ($createstmt2->execute()) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Thank you for accepting this offer"));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! Offer can not be accpet at this moment"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Offer can not be accpet at this moment"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry System Error! Offer could not be done"));
		}
	}

	public function markAsDelivered() {
		$sql = "UPDATE `cv_runner_offer` SET `ofr_deliver_status`= '1' WHERE (`ofr_id`=:ofr_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ofr_id', $this->getOfr_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$this->getCon()->commit();
				echo json_encode(array("msgType" => 1, "msg" => "You have Successfully mark as delivered this errnad request"));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! You can not do it"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! You can not do it"));
		}
	}
	
	public function confirmReceivedPayment() {
		$sql = "UPDATE `cv_runner_offer` SET `ofr_requester_payment_confirmed`= '1' WHERE (`ofr_id`=:ofr_id);";
		try {			
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ofr_id', $this->getOfr_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {				
				echo json_encode(array("msgType" => 1, "msg" => "You have Successfully confirmed requester payment as received"));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! confirming failed"));
			}
		} catch (Exception $exc) {
			echo $exc->getMessage();
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! confirming failed"));
		}
	}

//	public function editErrandOffer() {
//		$sql = "UPDATE `cv_runner_offer` SET `ofr_name`=:ofr_name, `ofr_phone`=:ofr_phone, `ofr_miles_radius`=:ofr_miles_radius, `ofr_location`=:ofr_location, `ofr_lat`=:ofr_lat, `ofr_lng`=:ofr_lng, `ofr_map_status`,:ofr_map_status, `ofr_receipt_amout`=:ofr_receipt_amout, `ofr_errand_run_fee`=:ofr_errand_run_fee WHERE (`ofr_id` = :ofr_id);";
//		try {
//			$createstmt = $this->con->prepare($sql);
//			$createstmt->bindParam(':ofr_name', $this->getOfr_name(), PDO::PARAM_STR);
//			$createstmt->bindParam(':ofr_phone', $this->getOfr_phone(), PDO::PARAM_STR);
//			$createstmt->bindParam(':ofr_miles_radius', $this->getOfr_miles_radius(), PDO::PARAM_STR);
//			$createstmt->bindParam(':ofr_location', $this->getOfr_location(), PDO::PARAM_STR);
//			$createstmt->bindParam(':ofr_lat', $this->getOfr_lat(), PDO::PARAM_STR);
//			$createstmt->bindParam(':ofr_lng', $this->getOfr_lng(), PDO::PARAM_STR);
//			$createstmt->bindParam(':ofr_map_status', $this->getOfr_map_status(), PDO::PARAM_INT);
//			$createstmt->bindParam(':ofr_receipt_amout', $this->getOfr_receipt_amout(), PDO::PARAM_STR);
//			$createstmt->bindParam(':ofr_errand_run_fee', $this->getOfr_errand_run_fee(), PDO::PARAM_STR);
//			$createstmt->bindParam(':ofr_id', $this->getOfr_id(), PDO::PARAM_INT);
//			if ($createstmt->execute()) {
//				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
//			} else {
//				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Updating Failed"));
//			}
//		} catch (Exception $exc) {
//			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
//		}
//	}
//
	public function removeErrandOffer() {
		$sql = "DELETE FROM `cv_runner_offer` WHERE (`ofr_id` = :ofr_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ofr_id', $this->getOfr_id(), PDO::PARAM_INT);
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
