<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class Wishlist extends ConnectDB {

	const TBL_EVENT = 'ub_wishlist';

	private $flag = false;
	//wishlist
	private $wish_id;
	private $wish_type;
	private $wish_object;
	private $wish_user;
	private $wish_created_date;
	private $wish_created_time;

	public function getFlag() {
		return $this->flag;
	}

	public function getWish_id() {
		return $this->wish_id;
	}

	public function getWish_type() {
		return $this->wish_type;
	}

	public function getWish_object() {
		return $this->wish_object;
	}

	public function getWish_user() {
		return $this->wish_user;
	}

	public function getWish_created_date() {
		return $this->wish_created_date;
	}

	public function getWish_created_time() {
		return $this->wish_created_time;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setWish_id($wish_id) {
		$this->wish_id = $wish_id;
		return $this;
	}

	public function setWish_type($wish_type) {
		$this->wish_type = $wish_type;
		return $this;
	}

	public function setWish_object($wish_object) {
		$this->wish_object = $wish_object;
		return $this;
	}

	public function setWish_user($wish_user) {
		$this->wish_user = $wish_user;
		return $this;
	}

	public function setWish_created_date($wish_created_date) {
		$this->wish_created_date = $wish_created_date;
		return $this;
	}

	public function setWish_created_time($wish_created_time) {
		$this->wish_created_time = $wish_created_time;
		return $this;
	}

	public function saveWishlist() {
		$sql = "INSERT INTO `ub_wishlist` (`wish_type`, `wish_object`, `wish_user`, `wish_created_date`, `wish_created_time`) VALUES (:wish_type, :wish_object, :wish_user, :wish_created_date, :wish_created_time);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':wish_type', $this->getWish_type(), PDO::PARAM_INT);
			$createstmt->bindParam(':wish_object', $this->getWish_object(), PDO::PARAM_INT);
			$createstmt->bindParam(':wish_user', $_SESSION['usr_id'], PDO::PARAM_INT);
			$createstmt->bindParam(':wish_created_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':wish_created_time', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => '<i class="far fa-heart"></i> Successfully added to wishlist'));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => '<i class="far fa-heart"></i> Sorry! adding failed'));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => '<i class="far fa-heart"></i> Sorry! You have already added'));
			}else{
				echo json_encode(array("msgType" => 2, "msg" => $exc->getCode()));
			}
		}
	}

	public function deleteWishlist() {
		$sql = "DELETE FROM `ub_wishlist` WHERE (`wish_id`=:wish_id);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':wish_id', $this->getWish_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => '<i class="far fa-heart"></i> Successfully Deleted'));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => '<i class="far fa-heart"></i> Sorry Deleting Failed'));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function tblWishlistByLoggedUser() {
		$data = array();
		$sql = "SELECT
ub_wishlist.wish_id,
ub_wishlist.wish_type,
ub_wishlist.wish_object,
(CASE
    WHEN ub_wishlist.wish_type = 1 THEN (SELECT
ub_adv.ad_title
FROM
ub_adv
WHERE
ub_adv.ad_id = ub_wishlist.wish_object)
    WHEN ub_wishlist.wish_type = 2 THEN (SELECT
ub_event.evt_name
FROM
ub_event
WHERE
ub_event.evt_id = ub_wishlist.wish_object)
WHEN ub_wishlist.wish_type = 3 THEN (SELECT
ub_event_items.evtem_name
FROM
ub_event_items
WHERE
ub_event_items.evtem_id = ub_wishlist.wish_object) 
    ELSE 'No Object Found'
END) AS object_name,
ub_wishlist.wish_user,
ub_wishlist.wish_created_date,
ub_wishlist.wish_created_time
FROM
ub_wishlist
WHERE
ub_wishlist.wish_user = :wish_user
ORDER BY
ub_wishlist.wish_id DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':wish_user', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				if ($row['wish_type'] == 1) {
					//product
					$directory = "../../asset_imageuploader/advcoverimage/" . $row['wish_object'] . "/";
				} else if ($row['wish_type'] == 2) {
					//event
					$directory = "../../asset_imageuploader/eventcoverphoto/" . $row['wish_object'] . "/";
				} else if ($row['wish_type'] == 3) {
					//eventitem
					$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['wish_object'] . "/";
				}
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['wish_img'] = "#";
				} else {
					$data[$i]['wish_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

}
