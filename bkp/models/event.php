<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class Event extends ConnectDB {

	const TBL_EVENT = 'ub_event';

	private $flag = false;
	//event
	private $evt_id;
	private $evt_executive;
	private $evt_name;
	private $evt_subheadline;
	private $evt_desc;
	private $evt_country;
	private $evt_state;
	private $evt_city;
	private $evt_location;
	private $evt_date;
	private $evt_time;
	private $evt_type;
	//event category
	private $evtcat_id;
	private $evtcat_event;
	private $evtcat_catname;
	//event category item
	private $evtem_id;
	private $evtem_event;
	private $evtem_category;
	private $evtem_name;
	private $evtem_desc;
	private $evtem_price;
	private $evtem_qty;
	private $evtem_created_date;
	private $evtem_created_time;
	
	public function getEvt_type() {
		return $this->evt_type;
	}

	public function setEvt_type($evt_type) {
		$this->evt_type = $evt_type;
		return $this;
	}
	
	public function getEvtem_id() {
		return $this->evtem_id;
	}

	public function getEvtem_event() {
		return $this->evtem_event;
	}

	public function getEvtem_category() {
		return $this->evtem_category;
	}

	public function getEvtem_name() {
		return $this->evtem_name;
	}

	public function getEvtem_desc() {
		return $this->evtem_desc;
	}

	public function getEvtem_price() {
		return $this->evtem_price;
	}

	public function getEvtem_qty() {
		return $this->evtem_qty;
	}

	public function getEvtem_created_date() {
		return $this->evtem_created_date;
	}

	public function getEvtem_created_time() {
		return $this->evtem_created_time;
	}

	public function setEvtem_id($evtem_id) {
		$this->evtem_id = $evtem_id;
		return $this;
	}

	public function setEvtem_event($evtem_event) {
		$this->evtem_event = $evtem_event;
		return $this;
	}

	public function setEvtem_category($evtem_category) {
		$this->evtem_category = $evtem_category;
		return $this;
	}

	public function setEvtem_name($evtem_name) {
		$this->evtem_name = $evtem_name;
		return $this;
	}

	public function setEvtem_desc($evtem_desc) {
		$this->evtem_desc = $evtem_desc;
		return $this;
	}

	public function setEvtem_price($evtem_price) {
		$this->evtem_price = $evtem_price;
		return $this;
	}

	public function setEvtem_qty($evtem_qty) {
		$this->evtem_qty = $evtem_qty;
		return $this;
	}

	public function setEvtem_created_date($evtem_created_date) {
		$this->evtem_created_date = $evtem_created_date;
		return $this;
	}

	public function setEvtem_created_time($evtem_created_time) {
		$this->evtem_created_time = $evtem_created_time;
		return $this;
	}

	public function getEvtcat_id() {
		return $this->evtcat_id;
	}

	public function getEvtcat_event() {
		return $this->evtcat_event;
	}

	public function setEvtcat_id($evtcat_id) {
		$this->evtcat_id = $evtcat_id;
		return $this;
	}

	public function setEvtcat_event($evtcat_event) {
		$this->evtcat_event = $evtcat_event;
		return $this;
	}

	public function getEvtcat_catname() {
		return $this->evtcat_catname;
	}

	public function setEvtcat_catname($evtcat_catname) {
		$this->evtcat_catname = $evtcat_catname;
		return $this;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getEvt_id() {
		return $this->evt_id;
	}

	public function getEvt_executive() {
		return $this->evt_executive;
	}

	public function getEvt_name() {
		return $this->evt_name;
	}

	public function getEvt_subheadline() {
		return $this->evt_subheadline;
	}

	public function getEvt_desc() {
		return $this->evt_desc;
	}

	public function getEvt_country() {
		return $this->evt_country;
	}

	public function getEvt_state() {
		return $this->evt_state;
	}

	public function getEvt_city() {
		return $this->evt_city;
	}

	public function getEvt_location() {
		return $this->evt_location;
	}

	public function getEvt_date() {
		return $this->evt_date;
	}

	public function getEvt_time() {
		return $this->evt_time;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setEvt_id($evt_id) {
		$this->evt_id = $evt_id;
		return $this;
	}

	public function setEvt_executive($evt_executive) {
		$this->evt_executive = $evt_executive;
		return $this;
	}

	public function setEvt_name($evt_name) {
		$this->evt_name = $evt_name;
		return $this;
	}

	public function setEvt_subheadline($evt_subheadline) {
		$this->evt_subheadline = $evt_subheadline;
		return $this;
	}

	public function setEvt_desc($evt_desc) {
		$this->evt_desc = $evt_desc;
		return $this;
	}

	public function setEvt_country($evt_country) {
		$this->evt_country = $evt_country;
		return $this;
	}

	public function setEvt_state($evt_state) {
		$this->evt_state = $evt_state;
		return $this;
	}

	public function setEvt_city($evt_city) {
		$this->evt_city = $evt_city;
		return $this;
	}

	public function setEvt_location($evt_location) {
		$this->evt_location = $evt_location;
		return $this;
	}

	public function setEvt_date($evt_date) {
		$this->evt_date = $evt_date;
		return $this;
	}

	public function setEvt_time($evt_time) {
		$this->evt_time = $evt_time;
		return $this;
	}

	public function saveEvent() {
		$sql = "INSERT INTO `ub_event` (`evt_executive`, `evt_name`, `evt_subheadline`, `evt_desc`, `evt_country`, `evt_state`, `evt_city`, `evt_location`, `evt_date`, `evt_time`,`evt_type`) VALUES (:evt_executive, :evt_name, :evt_subheadline, :evt_desc, :evt_country, :evt_state, :evt_city, :evt_location, :evt_date, :evt_time,:evt_type);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evt_executive', $_SESSION['usr_id'], PDO::PARAM_INT);
			$createstmt->bindParam(':evt_name', $this->getEvt_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_subheadline', $this->getEvt_subheadline(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_desc', $this->getEvt_desc(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_country', $this->getEvt_country(), PDO::PARAM_INT);
			$createstmt->bindParam(':evt_state', $this->getEvt_state(), PDO::PARAM_INT);
			$createstmt->bindParam(':evt_city', $this->getEvt_city(), PDO::PARAM_INT);
			$createstmt->bindParam(':evt_location', $this->getEvt_location(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_date', $this->getEvt_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_time', $this->getEvt_time(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_type', $this->getEvt_type(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function saveEventCategory() {
		$sql = "INSERT INTO `ub_eventcategory` (`evtcat_event`, `evtcat_catname`) VALUES (:evt_id, :evtcat_catname);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evt_id', $this->getEvt_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':evtcat_catname', $this->getEvtcat_catname(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function saveEventCategoryItem() {
		$sql = "INSERT INTO `ub_event_items` (`evtem_event`, `evtem_category`, `evtem_name`, `evtem_desc`, `evtem_price`, `evtem_qty`, `evtem_created_date`, `evtem_created_time`) VALUES (:evtem_event, :evtem_category, :evtem_name, :evtem_desc, :evtem_price, :evtem_qty, :evtem_created_date, :evtem_created_time);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evtem_event', $this->getEvt_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':evtem_category', $this->getEvtem_category(), PDO::PARAM_INT);
			$createstmt->bindParam(':evtem_name', $this->getEvtem_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':evtem_desc', $this->getEvtem_desc(), PDO::PARAM_STR);
			$createstmt->bindParam(':evtem_price', $this->getEvtem_price(), PDO::PARAM_STR);
			$createstmt->bindParam(':evtem_qty', $this->getEvtem_qty(), PDO::PARAM_INT);
			$createstmt->bindParam(':evtem_created_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':evtem_created_time', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry Saving Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editEventCategoryItem() {
		$sql = "UPDATE `ub_event_items` SET `evtem_category`=:evtem_category, `evtem_name`=:evtem_name, `evtem_desc`=:evtem_desc, `evtem_price`=:evtem_price, `evtem_qty`=:evtem_qty, `evtem_created_date`=:evtem_created_date, `evtem_created_time`=:evtem_created_time WHERE (`evtem_id` = :evtem_id);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evtem_id', $this->getEvtem_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':evtem_category', $this->getEvtem_category(), PDO::PARAM_INT);
			$createstmt->bindParam(':evtem_name', $this->getEvtem_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':evtem_desc', $this->getEvtem_desc(), PDO::PARAM_STR);
			$createstmt->bindParam(':evtem_price', $this->getEvtem_price(), PDO::PARAM_STR);
			$createstmt->bindParam(':evtem_qty', $this->getEvtem_qty(), PDO::PARAM_INT);
			$createstmt->bindParam(':evtem_created_date', date("Y-m-d"), PDO::PARAM_STR);
			$createstmt->bindParam(':evtem_created_time', date("H:i:s"), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editEvent() {
		$sql = "UPDATE `ub_event` SET `evt_name`=:evt_name, `evt_subheadline`=:evt_subheadline, `evt_desc`=:evt_desc, `evt_country`=:evt_country, `evt_state`=:evt_state, `evt_city`=:evt_city, `evt_location`=:evt_location, `evt_date`=:evt_date, `evt_time`=:evt_time, `evt_type`=:evt_type WHERE (`evt_id` = :evt_id);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evt_id', $this->getEvt_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':evt_name', $this->getEvt_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_subheadline', $this->getEvt_subheadline(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_desc', $this->getEvt_desc(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_country', $this->getEvt_country(), PDO::PARAM_INT);
			$createstmt->bindParam(':evt_state', $this->getEvt_state(), PDO::PARAM_INT);
			$createstmt->bindParam(':evt_city', $this->getEvt_city(), PDO::PARAM_INT);
			$createstmt->bindParam(':evt_location', $this->getEvt_location(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_date', $this->getEvt_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_time', $this->getEvt_time(), PDO::PARAM_STR);
			$createstmt->bindParam(':evt_type', $this->getEvt_type(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry Updating Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function sendInvitation($usr_array) {
		$flag = false;
		$explode_array = explode(',', $usr_array);
		$filter_usr_array = array_filter($explode_array);
		$sql = "INSERT INTO `ub_event_share` (`evtsh_event`, `evtsh_user`, `evtsh_date`, `evtsh_time`, `evtsh_shared_by`) VALUES (:evtsh_event, :evtsh_user, :evtsh_date, :evtsh_time, :evtsh_shared_by);";
		try {
			$this->getCon()->beginTransaction();
			foreach ($filter_usr_array as $evtsh_user) {
				$createstmt = $this->getCon()->prepare($sql);
				$createstmt->bindParam(':evtsh_event', $this->getEvt_id(), PDO::PARAM_INT);
				$createstmt->bindParam(':evtsh_user', $evtsh_user, PDO::PARAM_INT);
				$createstmt->bindParam(':evtsh_date', date("Y-m-d"), PDO::PARAM_STR);
				$createstmt->bindParam(':evtsh_time', date("H:i:s"), PDO::PARAM_STR);
				$createstmt->bindParam(':evtsh_shared_by', $_SESSION['usr_id'], PDO::PARAM_STR);
				$flag = $createstmt->execute();
			}
			if ($flag) {
				$this->getCon()->commit();
				echo json_encode(array("msgType" => 1, "msg" => "Invitation Sent Successfully."));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Failed Sending Invitation."));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function removeInvitation($evtsh_id_array) {
		$flag = false;
		$explode_array = explode(',', $evtsh_id_array);
		$filter_rm_array = array_filter($explode_array);
		$sql = "DELETE FROM `ub_event_share` WHERE (`evtsh_id` = :evtsh_id);";
		try {
			$this->getCon()->beginTransaction();
			foreach ($filter_rm_array as $evtsh_id) {
				$createstmt = $this->getCon()->prepare($sql);
				$createstmt->bindParam(':evtsh_id', $evtsh_id, PDO::PARAM_INT);
				$flag = $createstmt->execute();
			}
			if ($flag) {
				$this->getCon()->commit();
				echo json_encode(array("msgType" => 1, "msg" => "Invitation Removed Successfully."));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Failed remove Invitation."));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteEvent() {
		$folder = "../../asset_imageuploader/eventcoverphoto/" . $this->getEvt_id();
		$sql = "DELETE FROM `ub_event` WHERE (`evt_id`=:evt_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evt_id', $this->getEvt_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				if ($this->delete_folder($folder)) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry Deleting Failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function acceptEventInvitation($evtsh_id) {
		$sql = "UPDATE `ub_event_share` SET `evtsh_join_status`='1' WHERE (`evtsh_id`=:evtsh_id);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evtsh_id', $evtsh_id, PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Invitation Accepted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Failed Acceptance"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}
	
	public function eventInvitationsMarkAsReadByUser() {
		$sql = "UPDATE `ub_event_share` SET `evtsh_read_status`='1' WHERE (`evtsh_user`=:evtsh_user);";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evtsh_user', $_SESSION['usr_id'], PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteEventCategory() {
		$folder = "../../asset_imageuploader/eventcategoryphoto/" . $this->getEvt_id();
		$sql = "DELETE FROM `ub_eventcategory` WHERE (`evtcat_id`=:evtcat_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evtcat_id', $this->getEvtcat_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				if ($this->delete_folder($folder)) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry Deleting Failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteEventCategoryItem() {
		$flag = false;
		$flag_slider = false;
		$folder = "../../asset_imageuploader/eventitemprofilephoto/" . $this->getEvtem_id();
		$folder_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $this->getEvtem_id();
		$sql = "DELETE FROM `ub_event_items` WHERE (`evtem_id`=:evtem_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':evtem_id', $this->getEvtem_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				$flag = $this->delete_folder($folder);
				$flag_slider = $this->delete_folder($folder_slider);
				if ($flag && $flag_slider) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted"));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry Deleting Failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry Deleting Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function tblEventByLoggedExecutive() {
		$data = array();
		$sql = "SELECT
ub_event.evt_id,
ub_event.evt_executive,
ub_event.evt_name,
ub_event.evt_subheadline,
ub_event.evt_desc,
ub_event.evt_country,
ub_event.evt_state,
ub_event.evt_city,
ub_event.evt_type,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_event.evt_country) AS evt_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_state) AS evt_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_city) AS evt_city_name,
ub_event.evt_location,
ub_event.evt_date,
ub_event.evt_time
FROM
ub_event
WHERE
ub_event.evt_executive = :evt_executive
ORDER BY
ub_event.evt_id DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evt_executive', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventcoverphoto/" . $row['evt_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function loadLoggedUserEventInvitations() {
		$data = array();
		$sql = "SELECT
ub_event_share.evtsh_id,
ub_event_share.evtsh_event,
ub_event_share.evtsh_user,
ub_event_share.evtsh_by_mail,
ub_event_share.evtsh_date,
ub_event_share.evtsh_time,
ub_event_share.evtsh_shared_by,
ub_event_share.evtsh_join_status,
ub_event_share.evtsh_read_status,
ub_event.evt_name,
ub_event.evt_subheadline,
ub_event.evt_state,
ub_event.evt_country,
ub_event.evt_city,
ub_event.evt_type,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_event.evt_country) AS evt_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_state) AS evt_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_city) AS evt_city_name,
ub_event.evt_location,
ub_event.evt_date,
ub_event.evt_time
FROM
ub_event_share
INNER JOIN ub_event ON ub_event_share.evtsh_event = ub_event.evt_id
WHERE
ub_event_share.evtsh_user = :evtsh_user";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evtsh_user', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventcoverphoto/" . $row['evt_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function frontAllEvent() {
		$data = array();
		$sql = "SELECT
ub_event.evt_id,
ub_event.evt_executive,
ub_event.evt_name,
ub_event.evt_subheadline,
ub_event.evt_desc,
ub_event.evt_country,
ub_event.evt_state,
ub_event.evt_city,
ub_event.evt_type,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_event.evt_country) AS evt_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_state) AS evt_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_city) AS evt_city_name,
ub_event.evt_location,
ub_event.evt_date,
ub_event.evt_time,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone
FROM
ub_event
INNER JOIN df_user ON ub_event.evt_executive = df_user.usr_id
ORDER BY
ub_event.evt_date DESC,
ub_event.evt_time DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventcoverphoto/" . $row['evt_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function frontEventByID() {
		$data = array();
		$sql = "SELECT
ub_event.evt_id,
ub_event.evt_executive,
ub_event.evt_name,
ub_event.evt_subheadline,
ub_event.evt_desc,
ub_event.evt_country,
ub_event.evt_state,
ub_event.evt_city,
ub_event.evt_type,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_event.evt_country) AS evt_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_state) AS evt_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_city) AS evt_city_name,
ub_event.evt_location,
ub_event.evt_date,
ub_event.evt_time,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone
FROM
ub_event
INNER JOIN df_user ON ub_event.evt_executive = df_user.usr_id
WHERE
ub_event.evt_id = :evt_id";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evt_id', $this->getEvt_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventcoverphoto/" . $row['evt_id'] . "/";
				$directory_executive = "../../asset_imageuploader/userprofileimages/" . $row['evt_executive'] . "/";
				$files = scandir($directory);
				$files_executive = scandir($directory_executive);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_executive = array_diff($files_executive, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_executive = array_values(array_filter($files_executive));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				if ($files_executive[0] == NULL) {
					$data[$i]['evt_usr_profile_img'] = "#";
				} else {
					$data[$i]['evt_usr_profile_img'] = $files_executive[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getEventByID() {
		$data = array();
		$sql = "SELECT
ub_event.evt_id,
ub_event.evt_executive,
ub_event.evt_name,
ub_event.evt_subheadline,
ub_event.evt_desc,
ub_event.evt_country,
ub_event.evt_state,
ub_event.evt_city,
ub_event.evt_type,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_event.evt_country) AS evt_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_state) AS evt_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_city) AS evt_city_name,
ub_event.evt_location,
ub_event.evt_date,
ub_event.evt_time
FROM
ub_event
WHERE
ub_event.evt_id = :evt_id";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evt_id', $this->getEvt_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventcoverphoto/" . $row['evt_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblEventCategory() {
		$data = array();
		$sql = "SELECT
ub_eventcategory.evtcat_id,
ub_eventcategory.evtcat_event,
ub_eventcategory.evtcat_catname
FROM
ub_eventcategory
WHERE
ub_eventcategory.evtcat_event = :evt_id
ORDER BY
ub_eventcategory.evtcat_id DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evt_id', $this->getEvt_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventcategoryphoto/" . $row['evt_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbEventCategory() {
		$data = array();
		$sql = "SELECT
ub_eventcategory.evtcat_id,
ub_eventcategory.evtcat_event,
ub_eventcategory.evtcat_catname
FROM
ub_eventcategory
WHERE
ub_eventcategory.evtcat_event = :evt_id
ORDER BY
ub_eventcategory.evtcat_catname ASC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evt_id', $this->getEvt_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventcategoryphoto/" . $row['evtcat_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblEventCategoryItems() {
		$data = array();
		$sql = "SELECT
ub_event_items.evtem_id,
ub_event_items.evtem_event,
ub_event_items.evtem_category,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_price,
ub_event_items.evtem_qty,
ub_event_items.evtem_created_date,
ub_event_items.evtem_created_time
FROM
ub_event_items
WHERE
ub_event_items.evtem_event = :evt_id AND
ub_event_items.evtem_category = :evtem_category
ORDER BY
ub_event_items.evtem_created_date DESC,
ub_event_items.evtem_created_time DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evt_id', $this->getEvt_id(), PDO::PARAM_INT);
			$readstmt->bindParam(':evtem_category', $this->getEvtem_category(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['evtem_id'] . "/";
				$directory_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $row['evtem_id'] . "/";
				$files = scandir($directory);
				$files_slider = scandir($directory_slider);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				if (empty($files_slider)) {
					$data[$i]['evt_slider'] = "#";
				} else {
					$data[$i]['evt_slider'] = $files_slider;
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function eventItemsByOrderID($or_id) {
		$data = array();
		$sql = "SELECT
ub_eventorder_item.oritm_id,
ub_eventorder_item.oritm_item,
ub_eventorder_item.oritm_qty,
ub_event_items.evtem_id,
ub_event_items.evtem_event,
ub_event_items.evtem_category,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_price,
ub_event_items.evtem_qty,
ub_event_items.evtem_created_date,
ub_event_items.evtem_created_time,
ub_eventcategory.evtcat_catname,
ub_event.evt_name,
ub_event.evt_type,
ub_event.evt_subheadline,
ub_eventorder_item.oritm_qty_unit_price
FROM
ub_eventorder_item
INNER JOIN ub_event_items ON ub_eventorder_item.oritm_item = ub_event_items.evtem_id
INNER JOIN ub_eventcategory ON ub_event_items.evtem_category = ub_eventcategory.evtcat_id
INNER JOIN ub_event ON ub_event_items.evtem_event = ub_event.evt_id
WHERE
ub_eventorder_item.oritm_order = :oritm_order";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':oritm_order', $or_id, PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['evtem_id'] . "/";
				$directory_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $row['evtem_id'] . "/";
				$files = scandir($directory);
				$files_slider = scandir($directory_slider);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['evtem_img'] = "#";
				} else {
					$data[$i]['evtem_img'] = $files[0];
				}
				if (empty($files_slider)) {
					$data[$i]['evtem_slider'] = "#";
				} else {
					$data[$i]['evtem_slider'] = $files_slider;
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function AllEventCategoryItems() {
		$data = array();
		$sql = "SELECT
ub_event_items.evtem_id,
ub_event_items.evtem_event,
ub_event_items.evtem_category,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_price,
ub_event_items.evtem_qty,
ub_event_items.evtem_created_date,
ub_event_items.evtem_created_time,
ub_eventcategory.evtcat_catname
FROM
ub_event_items
INNER JOIN ub_eventcategory ON ub_event_items.evtem_category = ub_eventcategory.evtcat_id
WHERE
ub_event_items.evtem_event = :evtem_event
ORDER BY
ub_event_items.evtem_created_date DESC,
ub_event_items.evtem_created_time DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evtem_event', $this->getEvt_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['evtem_id'] . "/";
				$directory_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $row['evtem_id'] . "/";
				$files = scandir($directory);
				$files_slider = scandir($directory_slider);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				if (empty($files_slider)) {
					$data[$i]['evt_slider'] = "#";
				} else {
					$data[$i]['evt_slider'] = $files_slider;
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblEventItemOrderHistoryByUser() {
		$data = array();
		$sql = "SELECT
ub_event_items.evtem_id,
ub_event_items.evtem_event,
ub_event_items.evtem_category,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_price,
ub_event_items.evtem_qty,
ub_event_items.evtem_created_date,
ub_event_items.evtem_created_time,
ub_eventcategory.evtcat_catname
FROM
ub_event_items
INNER JOIN ub_eventcategory ON ub_event_items.evtem_category = ub_eventcategory.evtcat_id
WHERE
ub_event_items.evtem_event = :evtem_event
ORDER BY
ub_event_items.evtem_created_date DESC,
ub_event_items.evtem_created_time DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evtem_event', $this->getEvt_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['evtem_id'] . "/";
				$directory_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $row['evtem_id'] . "/";
				$files = scandir($directory);
				$files_slider = scandir($directory_slider);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				if (empty($files_slider)) {
					$data[$i]['evt_slider'] = "#";
				} else {
					$data[$i]['evt_slider'] = $files_slider;
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function AllEventCategoryItemsCartCreate() {
		$data = array();
		$sql = "SELECT
ub_event_items.evtem_id,
ub_event_items.evtem_event,
ub_event_items.evtem_category,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_price,
ub_event_items.evtem_qty,
ub_event_items.evtem_created_date,
ub_event_items.evtem_created_time,
ub_eventcategory.evtcat_catname
FROM
ub_event_items
INNER JOIN ub_eventcategory ON ub_event_items.evtem_category = ub_eventcategory.evtcat_id
ORDER BY
ub_event_items.evtem_id DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['evtem_id'] . "/";
				$directory_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $row['evtem_id'] . "/";
				$files = scandir($directory);
				$files_slider = scandir($directory_slider);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				if (empty($files_slider)) {
					$data[$i]['evt_slider'] = "#";
				} else {
					$data[$i]['evt_slider'] = $files_slider;
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getEventCategoryItemByID() {
		$data = array();
		$sql = "SELECT
ub_event_items.evtem_id,
ub_event_items.evtem_event,
ub_event_items.evtem_category,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_price,
ub_event_items.evtem_qty,
ub_event_items.evtem_created_date,
ub_event_items.evtem_created_time
FROM
ub_event_items
WHERE
ub_event_items.evtem_id = :evtem_id";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evtem_id', $this->getEvtem_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['evtem_id'] . "/";
				$directory_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $row['evtem_id'] . "/";
				$files = scandir($directory);
				$files_slider = scandir($directory_slider);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				if (empty($files_slider)) {
					$data[$i]['evt_slider'] = "#";
				} else {
					$data[$i]['evt_slider'] = $files_slider;
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getEventCategoryItemByIDReturnAR() {
		$data = array();
		$sql = "SELECT
ub_event_items.evtem_id,
ub_event_items.evtem_event,
ub_event_items.evtem_category,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_price,
ub_event_items.evtem_qty,
ub_event_items.evtem_created_date,
ub_event_items.evtem_created_time
FROM
ub_event_items
WHERE
ub_event_items.evtem_id = :evtem_id";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evtem_id', $this->getEvtem_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['evtem_id'] . "/";
				$directory_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $row['evtem_id'] . "/";
				$files = scandir($directory);
				$files_slider = scandir($directory_slider);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['evt_img'] = "#";
				} else {
					$data[$i]['evt_img'] = $files[0];
				}
				if (empty($files_slider)) {
					$data[$i]['evt_slider'] = "#";
				} else {
					$data[$i]['evt_slider'] = $files_slider;
				}
				$i++;
			}
			return $data;
		} catch (Exception $exc) {
			return $data;
		}
	}

	public function frontEventItemByID() {
		$data = array();
		$sql = "SELECT
ub_event_items.evtem_id,
ub_event_items.evtem_event,
ub_event_items.evtem_category,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_price,
ub_event_items.evtem_qty,
ub_event_items.evtem_created_date,
ub_event_items.evtem_created_time,
ub_eventcategory.evtcat_catname,
ub_event.evt_country,
ub_event.evt_state,
ub_event.evt_city,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = ub_event.evt_country) AS evt_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_state) AS evt_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = ub_event.evt_city) AS evt_city_name,
ub_event.evt_name,
ub_event.evt_subheadline,
ub_event.evt_location,
ub_event.evt_date,
ub_event.evt_time,
ub_event.evt_type,
ub_event.evt_executive
FROM
ub_event_items
INNER JOIN ub_eventcategory ON ub_event_items.evtem_category = ub_eventcategory.evtcat_id
INNER JOIN ub_event ON ub_event_items.evtem_event = ub_event.evt_id
WHERE
ub_event_items.evtem_id = :evtem_id";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evtem_id', $this->getEvtem_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/eventitemprofilephoto/" . $row['evtem_id'] . "/";
				$directory_slider = "../../asset_imageuploader/eventitemsliderphoto/" . $row['evtem_id'] . "/";
				$files = scandir($directory);
				$files_slider = scandir($directory_slider);
				$files = array_diff($files, ['.', '..', 'thumbnail', 'medium']);
				$files_slider = array_diff($files_slider, ['.', '..', 'thumbnail', 'medium']);
				$files = array_values(array_filter($files));
				$files_slider = array_values(array_filter($files_slider));
				if ($files[0] == NULL) {
					$data[$i]['evtem_img'] = "#";
				} else {
					$data[$i]['evtem_img'] = $files[0];
				}
				if (empty($files_slider)) {
					$data[$i]['evtem_slider'] = "#";
				} else {
					$data[$i]['evtem_slider'] = $files_slider;
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

}
