<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';
require '../twilioSMS/vendor/autoload.php';
require '../../API/sendgrid/vendor/autoload.php';

use Twilio\Rest\Client;

/**
 * @author Ruwan Jayawardena
 */
class User extends ConnectDB {

	const TBL_USER = 'df_user';
	const TBL_PROFILE = 'df_profile';

	private $flag = false;
	private $usr_id;
	private $usr_pass;
	private $usr_first_name;
	private $usr_last_name;
	private $usr_age;
	private $usr_email;
	private $usr_phone;
	private $usr_status;
	private $usr_cat_id;
	private $usr_username;
	private $usr_confirm_code;
	private $usr_create_date;
	private $usr_create_time;
	private $usr_notification_send;
	private $usr_notification_media;
	private $usr_verified;
	private $usr_verified_media;
	private $pro_id;
	private $pro_usr_id;
	private $pro_paypal_email;
	private $pro_dob;
	private $pro_address;
	private $pro_country;
	private $pro_city;
	private $pro_state;
	private $pro_zip;
	private $pro_map_status;
	private $pro_location;
	private $pro_lng;
	private $pro_lat;
	private $pro_business_address;
	private $pro_bizdesc_short;
	private $pro_bizdesc_long;
	private $pro_website_url;
	private $pro_profile_category;
	private $pro_grading;
	private $pro_business_name;
	private $pro_typeof_productservice;
	private $usr_ref_have;
	private $usr_ref_id;
	private $pro_instagram_link;
	private $pro_twitter_link;
	private $pro_fb_link;
	private $pro_youtube_link;
	private $pro_pinterest_link;
	
	function getPro_instagram_link() {
		return $this->pro_instagram_link;
	}

	function getPro_twitter_link() {
		return $this->pro_twitter_link;
	}

	function getPro_fb_link() {
		return $this->pro_fb_link;
	}

	function getPro_youtube_link() {
		return $this->pro_youtube_link;
	}

	function getPro_pinterest_link() {
		return $this->pro_pinterest_link;
	}

	function setPro_instagram_link($pro_instagram_link): void {
		$this->pro_instagram_link = $pro_instagram_link;
	}

	function setPro_twitter_link($pro_twitter_link): void {
		$this->pro_twitter_link = $pro_twitter_link;
	}

	function setPro_fb_link($pro_fb_link): void {
		$this->pro_fb_link = $pro_fb_link;
	}

	function setPro_youtube_link($pro_youtube_link): void {
		$this->pro_youtube_link = $pro_youtube_link;
	}

	function setPro_pinterest_link($pro_pinterest_link): void {
		$this->pro_pinterest_link = $pro_pinterest_link;
	}
	
	public function getUsr_ref_have() {
		return $this->usr_ref_have;
	}

	public function getUsr_ref_id() {
		return $this->usr_ref_id;
	}

	public function setUsr_ref_have($usr_ref_have) {
		$this->usr_ref_have = $usr_ref_have;
		return $this;
	}

	public function setUsr_ref_id($usr_ref_id) {
		$this->usr_ref_id = $usr_ref_id;
		return $this;
	}

	public function getPro_business_address() {
		return $this->pro_business_address;
	}

	public function getPro_bizdesc_short() {
		return $this->pro_bizdesc_short;
	}

	public function getPro_bizdesc_long() {
		return $this->pro_bizdesc_long;
	}

	public function getPro_website_url() {
		return $this->pro_website_url;
	}

	public function getPro_profile_category() {
		return $this->pro_profile_category;
	}

	public function getPro_grading() {
		return $this->pro_grading;
	}

	public function getPro_business_name() {
		return $this->pro_business_name;
	}

	public function getPro_typeof_productservice() {
		return $this->pro_typeof_productservice;
	}

	public function setPro_business_address($pro_business_address) {
		$this->pro_business_address = $pro_business_address;
		return $this;
	}

	public function setPro_bizdesc_short($pro_bizdesc_short) {
		$this->pro_bizdesc_short = $pro_bizdesc_short;
		return $this;
	}

	public function setPro_bizdesc_long($pro_bizdesc_long) {
		$this->pro_bizdesc_long = $pro_bizdesc_long;
		return $this;
	}

	public function setPro_website_url($pro_website_url) {
		$this->pro_website_url = $pro_website_url;
		return $this;
	}

	public function setPro_profile_category($pro_profile_category) {
		$this->pro_profile_category = $pro_profile_category;
		return $this;
	}

	public function setPro_grading($pro_grading) {
		$this->pro_grading = $pro_grading;
		return $this;
	}

	public function setPro_business_name($pro_business_name) {
		$this->pro_business_name = $pro_business_name;
		return $this;
	}

	public function setPro_typeof_productservice($pro_typeof_productservice) {
		$this->pro_typeof_productservice = $pro_typeof_productservice;
		return $this;
	}

	public function getPro_map_status() {
		return $this->pro_map_status;
	}

	public function getPro_location() {
		return $this->pro_location;
	}

	public function getPro_lng() {
		return $this->pro_lng;
	}

	public function getPro_lat() {
		return $this->pro_lat;
	}

	public function setPro_map_status($pro_map_status) {
		$this->pro_map_status = $pro_map_status;
		return $this;
	}

	public function setPro_location($pro_location) {
		$this->pro_location = $pro_location;
		return $this;
	}

	public function setPro_lng($pro_lng) {
		$this->pro_lng = $pro_lng;
		return $this;
	}

	public function setPro_lat($pro_lat) {
		$this->pro_lat = $pro_lat;
		return $this;
	}

	public function getUsr_pass() {
		return $this->usr_pass;
	}

	public function getUsr_username() {
		return $this->usr_username;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getUsr_id() {
		return $this->usr_id;
	}

	public function getUsr_first_name() {
		return $this->usr_first_name;
	}

	public function getUsr_last_name() {
		return $this->usr_last_name;
	}

	public function getUsr_age() {
		return $this->usr_age;
	}

	public function getUsr_email() {
		return $this->usr_email;
	}

	public function getUsr_phone() {
		return $this->usr_phone;
	}

	public function getUsr_status() {
		return $this->usr_status;
	}

	public function getUsr_cat_id() {
		return $this->usr_cat_id;
	}

	public function getUsr_confirm_code() {
		return $this->usr_confirm_code;
	}

	public function getUsr_notification_send() {
		return $this->usr_notification_send;
	}

	public function getUsr_notification_media() {
		return $this->usr_notification_media;
	}

	public function getUsr_verified() {
		return $this->usr_verified;
	}

	public function getUsr_verified_media() {
		return $this->usr_verified_media;
	}

	public function getPro_id() {
		return $this->pro_id;
	}

	public function getPro_usr_id() {
		return $this->pro_usr_id;
	}

	public function getPro_paypal_email() {
		return $this->pro_paypal_email;
	}

	public function getPro_dob() {
		return $this->pro_dob;
	}

	public function getPro_address() {
		return $this->pro_address;
	}

	public function getPro_country() {
		return $this->pro_country;
	}

	public function getPro_city() {
		return $this->pro_city;
	}

	public function getPro_state() {
		return $this->pro_state;
	}

	public function getPro_zip() {
		return $this->pro_zip;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setUsr_id($usr_id) {
		$this->usr_id = $usr_id;
		return $this;
	}

	public function setUsr_first_name($usr_first_name) {
		$this->usr_first_name = $usr_first_name;
		return $this;
	}

	public function setUsr_last_name($usr_last_name) {
		$this->usr_last_name = $usr_last_name;
		return $this;
	}

	public function setUsr_age($usr_age) {
		$this->usr_age = $usr_age;
		return $this;
	}

	public function setUsr_email($usr_email) {
		$this->usr_email = $usr_email;
		return $this;
	}

	public function setUsr_phone($usr_phone) {
		$this->usr_phone = $usr_phone;
		return $this;
	}

	public function setUsr_status($usr_status) {
		$this->usr_status = $usr_status;
		return $this;
	}

	public function setUsr_cat_id($usr_cat_id) {
		$this->usr_cat_id = $usr_cat_id;
		return $this;
	}

	public function setUsr_confirm_code($usr_confirm_code) {
		$this->usr_confirm_code = $usr_confirm_code;
		return $this;
	}

	public function setUsr_notification_send($usr_notification_send) {
		$this->usr_notification_send = $usr_notification_send;
		return $this;
	}

	public function setUsr_notification_media($usr_notification_media) {
		$this->usr_notification_media = $usr_notification_media;
		return $this;
	}

	public function setUsr_verified($usr_verified) {
		$this->usr_verified = $usr_verified;
		return $this;
	}

	public function setUsr_verified_media($usr_verified_media) {
		$this->usr_verified_media = $usr_verified_media;
		return $this;
	}

	public function setPro_id($pro_id) {
		$this->pro_id = $pro_id;
		return $this;
	}

	public function setPro_usr_id($pro_usr_id) {
		$this->pro_usr_id = $pro_usr_id;
		return $this;
	}

	public function setPro_paypal_email($pro_paypal_email) {
		$this->pro_paypal_email = $pro_paypal_email;
		return $this;
	}

	public function setPro_dob($pro_dob) {
		$this->pro_dob = $pro_dob;
		return $this;
	}

	public function setPro_address($pro_address) {
		$this->pro_address = $pro_address;
		return $this;
	}

	public function setPro_country($pro_country) {
		$this->pro_country = $pro_country;
		return $this;
	}

	public function setPro_city($pro_city) {
		$this->pro_city = $pro_city;
		return $this;
	}

	public function setPro_state($pro_state) {
		$this->pro_state = $pro_state;
		return $this;
	}

	public function setPro_zip($pro_zip) {
		$this->pro_zip = $pro_zip;
		return $this;
	}

	public function getUsr_create_date() {
		$this->usr_create_date = date("Y-m-d");
		return $this->usr_create_date;
	}

	public function getUsr_create_time() {
		$this->usr_create_time = date("H:i:s");
		return $this->usr_create_time;
	}

	public function setUsr_pass($usr_pass) {
//hash password
		$salt = 'ruwanj510*';
		$hashed = hash('sha256', $usr_pass . $salt);
		$this->usr_pass = $hashed;
	}

	public function setUsr_username($usr_username) {
		$this->usr_username = strtolower(preg_replace('/\s/', '', $usr_username));
	}

	public function getNextAutoIncrementUserID() {
		$nextid = 0;
		$sql = "SHOW TABLE STATUS LIKE 'df_user'";
		$readstmt = $this->con->prepare($sql);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$nextid = $row->Auto_increment;
		}
		$this->setUsr_id($nextid);
	}

	public function getRandomConfirmationCode() {
		$this->usr_confirm_code = rand(10000, 99999);
		return $this->usr_confirm_code;
	}

	public function getRefAffiliateUserLevelByID($usr_id) {
		$id = 0;
		$sql = "SELECT
df_affiliate_user_reference.uaf_level
FROM
df_user
INNER JOIN df_affiliate_user_reference ON df_affiliate_user_reference.uaf_user = df_user.usr_id
WHERE
df_user.usr_id = :usr_id";
		$readstmt = $this->con->prepare($sql);
		$readstmt->bindParam(':usr_id', $usr_id, PDO::PARAM_INT);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$id = $row->uaf_level;
		}
		return $id;
	}

	public function getUserRefUserIDByEmail($email) {
		$usr_id = 0;
		$sql = "SELECT
df_user.usr_id
FROM
df_user
WHERE
df_user.usr_email = :usr_email";
		$readstmt = $this->con->prepare($sql);
		$readstmt->bindParam(':usr_email', $email, PDO::PARAM_STR);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$usr_id = $row->usr_id;
		}
		return $usr_id;
	}

	public function getBelowAffiliateUserID($uaf_user, $uaf_level) {
		$id = 0;
		$sql = "SELECT
df_affiliate_user_reference.uaf_ref_user
FROM
df_affiliate_user_reference
WHERE
df_affiliate_user_reference.uaf_user = :uaf_user AND
df_affiliate_user_reference.uaf_level = :uaf_level";
		$readstmt = $this->con->prepare($sql);
		$readstmt->bindParam(':uaf_user', $uaf_user, PDO::PARAM_INT);
		$readstmt->bindParam(':uaf_level', $uaf_level, PDO::PARAM_INT);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$id = $row->uaf_ref_user;
		}
		if ($id == 0) {
			return $uaf_user;
		} else {
			return $id;
		}
	}

	public function getBelowAffiliateUserEmail($usr_email, $uaf_level) {
		$id = 0;
		$sql = "SELECT
df_affiliate_user_reference.uaf_ref_user
FROM
df_user
INNER JOIN df_affiliate_user_reference ON df_affiliate_user_reference.uaf_user = df_user.usr_id
WHERE
df_user.usr_email = :usr_email AND
df_affiliate_user_reference.uaf_level = :uaf_level";
		$readstmt = $this->con->prepare($sql);
		$readstmt->bindParam(':usr_email', $usr_email, PDO::PARAM_STR);
		$readstmt->bindParam(':uaf_level', $uaf_level, PDO::PARAM_INT);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$id = $row->uaf_ref_user;
		}
		return $id;
	}

	public function getReleventCreditAmountByUsrID($cr_category) {
		$credit = 0;
		$sql = "SELECT
ub_credit_plans.cr_amount
FROM
ub_credit_plans
WHERE
ub_credit_plans.cr_category = :cr_category";
		$readstmt = $this->con->prepare($sql);
		$readstmt->bindParam(':cr_category', $cr_category, PDO::PARAM_INT);
		$readstmt->execute();
		while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			$credit = $row->cr_amount;
		}
		return $credit;
	}

//	public function AffiliateSystemSignup() {
//		//SQL Datablse Queries
//		//1 = save user
//		$user_save = "INSERT INTO `df_user` (`usr_pass`, `usr_first_name`, `usr_last_name`,`usr_email`, `usr_phone`, `usr_status`, `usr_cat_id`, `usr_username`, `usr_confirm_code`, `usr_create_date`, `usr_create_time`, `usr_notification_send`, `usr_notification_media`, `usr_verified`, `usr_verified_media`) VALUES ( :usr_pass,:usr_first_name,:usr_last_name,:usr_email,:usr_phone,'0',:usr_cat_id,:usr_username,:usr_confirm_code,:usr_create_date,:usr_create_time,'1', '2', '0', '1');";
//
//
//		//2= save profile
//		$profile_save = "INSERT INTO `df_profile` (`pro_usr_id`) VALUES (:pro_usr_id);";
//
//		//3 = save affiliate user reference info
//		$sql_affiliate_user_reference = "INSERT INTO `df_affiliate_user_reference` (`uaf_user`, `uaf_level`, `uaf_ref_have`, `uaf_ref_user`) VALUES (:uaf_user, :uaf_level, :uaf_ref_have, :uaf_ref_user);";
//
//		//4 = save affiliate user point info 
//		$sql_affiliate_points_earn = "INSERT INTO `df_affiliate_points_earn` (`rec_user`, `rec_description`, `rec_points`, `rec_from`, `rec_relate_ref_user`) VALUES (:rec_user, :rec_description, :rec_points, :rec_from, :rec_relate_ref_user);";
//
//		//5= update user table points
//		$sql_totalpointupdate = "UPDATE `df_user` SET `usr_points`= `usr_points` + :usr_points  WHERE (`usr_id`=:usr_id);";
//
//		//variable initializations
//		$initial_reg_points = $this->getReleventCreditAmountByUsrID();
//		$usr_confirm_code = rand(10000, 99999);
//		$usr_name = $this->getUsr_first_name() . ' ' . $this->getUsr_last_name();
//		$this->getUsr_id() = $this->getNextAutoIncrementUserID();
//		$first_user_level = 1;
//		$zero_reference_userid = null;
//		$usr_refusr_email = $this->getUsr_ref_id();
//
//		try {
//			//1 - save user
//			$signup_process_flag = false;
//			$this->getCon()->beginTransaction();
//			$createSaveUser = $this->getCon()->prepare($user_save);
//			$createSaveUser->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
//			$createSaveUser->bindParam(':usr_first_name', $this->getUsr_first_name(), PDO::PARAM_STR);
//			$createSaveUser->bindParam(':usr_last_name', $this->getUsr_last_name(), PDO::PARAM_STR);
//			$createSaveUser->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
//			$createSaveUser->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
//			$createSaveUser->bindParam(':usr_cat_id', $this->getUsr_cat_id(), PDO::PARAM_INT);
//			$createSaveUser->bindParam(':usr_username', $this->getUsr_username(), PDO::PARAM_STR);
//			$createSaveUser->bindParam(':usr_confirm_code', $usr_confirm_code, PDO::PARAM_STR);
//			$createSaveUser->bindParam(':usr_create_date', $this->getUsr_create_date(), PDO::PARAM_STR);
//			$createSaveUser->bindParam(':usr_create_time', $this->getUsr_create_time(), PDO::PARAM_STR);
//			//STAGE 1 - SAVE USER
//			if ($createSaveUser->execute()) {
//				//STAGE 2 - SAVE PROFILE				
//				$createSaveProfile = $this->getCon()->prepare($profile_save);
//				$createSaveProfile = $this->getCon()->prepare($profile_save);
//				$createSaveProfile->bindParam(':pro_usr_id', $this->getUsr_id(), PDO::PARAM_INT);
//				if ($createSaveProfile->execute()) {
//					//STAGE 3 - SAVE CURRENT USER REFERENCE
//					if ($this->getUsr_ref_have() == 0) {
//						//NO REFERENCE - DIRECT SAVE						
//						$createSaveReference = $this->getCon()->prepare($sql_affiliate_user_reference);
//						$createSaveReference->bindParam(':uaf_user', $this->getUsr_id(), PDO::PARAM_INT);
//						$createSaveReference->bindParam(':uaf_level', $first_user_level, PDO::PARAM_INT);
//						$createSaveReference->bindParam(':uaf_ref_have', $this->getUsr_ref_have(), PDO::PARAM_INT);
//						$createSaveReference->bindParam(':uaf_ref_user', $zero_reference_userid, PDO::PARAM_NULL);
//						if ($createSaveReference->execute()) {
//							//STAGE 4 - SAVE EARN POINTS
//							$new_user_registration = 1;
//							$rec_description = "(Direct Signup)- User Signup (Without Referral Person)";
//							$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
//							$createUserPoints->bindParam(':rec_user', $this->getUsr_id(), PDO::PARAM_INT);
//							$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
//							$createUserPoints->bindParam(':rec_points', $initial_reg_points, PDO::PARAM_INT);
//							$createUserPoints->bindParam(':rec_from', $new_user_registration, PDO::PARAM_INT);
//							$createUserPoints->bindParam(':rec_relate_ref_user', $zero_reference_userid, PDO::PARAM_NULL);
//							if ($createUserPoints->execute()) {
//								//STAGE 5 - UPDATE TOTAL POINTS OF USER
////								$this->getCon()->commit();
//								$signup_process_flag = true;
////								echo "user saved,profile saved,save reference,save points,update total points -1,2,3,4,5 stage complete";
//								//No need to update total points.bez of user dont have reference							
//							} else {
//								//STAGE 4 - SAVE EARN POINTS
//								$this->getCon()->rollBack();
////								echo "can't save points - 4 stage";
//							}
//						} else {
//							//STAGE 3 - SAVE CURRENT USER REFERENCE
//							$this->getCon()->rollBack();
////							echo "can't save reference - 3 stage";
//						}
//					} else {
//						//HAVE REFERENCE
//						$ref_user_level = $this->getRefAffiliateUserLevelByID($usr_refusr_email);
//						$reg_current_user_level = $ref_user_level + 1;
//						$current_user_relate_ref_user = $this->getUsr_ref_id();
//						$createSaveReference = $this->getCon()->prepare($sql_affiliate_user_reference);
//						$createSaveReference->bindParam(':uaf_user', $this->getUsr_id(), PDO::PARAM_INT);
//						$createSaveReference->bindParam(':uaf_level', $reg_current_user_level, PDO::PARAM_INT);
//						$createSaveReference->bindParam(':uaf_ref_have', $this->getUsr_ref_have(), PDO::PARAM_INT);
//						$createSaveReference->bindParam(':uaf_ref_user', $current_user_relate_ref_user, PDO::PARAM_INT);
//						if ($createSaveReference->execute()) {
//							//STAGE 4 - SAVE EARN POINTS
//							$new_user_registration = 1;
//							$rec_description = "(Referral Signup)- User Signup (With Referral Person)";
////							need remove this part
//							$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
//							$createUserPoints->bindParam(':rec_user', $this->getUsr_id(), PDO::PARAM_INT);
//							$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
//							$createUserPoints->bindParam(':rec_points', $initial_reg_points, PDO::PARAM_INT);
//							$createUserPoints->bindParam(':rec_from', $new_user_registration, PDO::PARAM_INT);
//							$createUserPoints->bindParam(':rec_relate_ref_user', $zero_reference_userid, PDO::PARAM_NULL);
////							need remove this part
//							if ($createUserPoints->execute()) {
//								//FIND OTHER USERS POINT RELATED TO THIS USER
//								//GET POINTS LOOP BY REFERENCE USER LEVEL
//								$points_loop_level = $this->getRefAffiliateUserLevelByID($usr_refusr_email);
////										echo $current_user_relate_ref_user;
//								$loop_point_save_flag = false;
//								$temp_ref_user_points = 0;
//								$userid = 0;
//								$level = 0;
//								$total_update_point;
//								$total_update_user;
//								$array_total_update = array();
//								for ($x = 1; $x <= $points_loop_level; $x++) {
//									//SAVE ALL USER POINTS BY REFERENCE USER
//									//CAL POINTS OF EACH BY LOOP
//									$reference_user_commition = 2;
//									$rec_description = "Credits received from referral member signup";
//									if ($x == 1) {
//										//USER GIVEN REFERENCE USER POINT SAVE
//										$ref_user_earned_points = $initial_reg_points;
//										$temp_ref_user_points = $ref_user_earned_points;
//										$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
//										$createUserPoints->bindParam(':rec_user', $current_user_relate_ref_user, PDO::PARAM_INT);
//										$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
//										$createUserPoints->bindParam(':rec_points', $ref_user_earned_points, PDO::PARAM_INT);
//										$createUserPoints->bindParam(':rec_from', $reference_user_commition, PDO::PARAM_INT);
//										$createUserPoints->bindParam(':rec_relate_ref_user', $this->getUsr_id(), PDO::PARAM_INT);
//										$loop_point_save_flag = $createUserPoints->execute();
//										//GATHER TOTAL UPDATE USER INFO
//										$total_update_point = $ref_user_earned_points;
//										$total_update_user = $current_user_relate_ref_user;
//										$array_total_update[] = array("user" => $total_update_user, "point" => $total_update_point);
//									} else {
//										//OTHER USERS REFERENCE USER POINT SAVE
//										//FIND NEXT REF USER ID										
//										if ($x == 2) {
//											$level = $points_loop_level;
//											$userid = $this->getBelowAffiliateUserEmail($usr_refusr_email, $level);
//										} else {
//											$level = $level - 1;
//											$userid = $this->getBelowAffiliateUserID($userid, $level);
//										}
//										//FIND CURRENT EARNED POINT
//										$ref_user_earned_points = $temp_ref_user_points / 2;
//										$temp_ref_user_points = $ref_user_earned_points;
//										$earned_points = $ref_user_earned_points;
//
//										//SAVE EACH USER POINTS
////										echo $earned_points." | ";
//										$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
//										$createUserPoints->bindParam(':rec_user', $userid, PDO::PARAM_INT);
//										$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
//										$createUserPoints->bindParam(':rec_points', $earned_points, PDO::PARAM_STR);
//										$createUserPoints->bindParam(':rec_from', $reference_user_commition, PDO::PARAM_INT);
//										$createUserPoints->bindParam(':rec_relate_ref_user', $this->getUsr_id(), PDO::PARAM_INT);
//										$loop_point_save_flag = $createUserPoints->execute();
//										//GATHER TOTAL UPDATE USER INFO
//										$total_update_point = $earned_points;
//										$total_update_user = $userid;
//										$array_total_update[] = array("user" => $total_update_user, "point" => $total_update_point);
//									}
//								}
//								//STAGE 4.1 - SAVE EARN POINTS
//								if ($loop_point_save_flag) {
//									$total_update_flag = false;
//									foreach ($array_total_update as $key => $totalupdatevalue) {
//										$createUpdateTotalPoint = $this->getCon()->prepare($sql_totalpointupdate);
//										$createUpdateTotalPoint->bindParam(':usr_points', $totalupdatevalue['point'], PDO::PARAM_STR);
//										$createUpdateTotalPoint->bindParam(':usr_id', $totalupdatevalue['user'], PDO::PARAM_INT);
//										$total_update_flag = $createUpdateTotalPoint->execute();
//									}
//									//STAGE 5 - UPDATE TOTAL POINTS OF USER
//									if ($total_update_flag) {
////										$this->getCon()->commit();
//										$signup_process_flag = true;
////										echo "user saved,profile saved,save reference,save points,update total points -1,2,3,4,5 stage complete";
//									} else {
//										$this->getCon()->rollBack();
////										echo "can't update total points - 5 stage";
//									}
//								} else {
//									//STAGE 4,1 - SAVE EARN POINTS LOOP
//									$this->getCon()->rollBack();
////									echo "can't save points loop - 4 stage";
//								}
//							} else {
//								//STAGE 4 - SAVE EARN POINTS
//								$this->getCon()->rollBack();
////								echo "can't save points - 4 stage";
//							}
//						} else {
//							//STAGE 3 - SAVE CURRENT USER REFERENCE
//							$this->getCon()->rollBack();
////							echo "can't save reference - 3 stage";
//						}
//					}
//				} else {
//					//STAGE 2 - SAVE PROFILE	
//					$this->getCon()->rollBack();
////					echo "can't save profile - 2 stage";
//				}
//			} else {
//				//STAGE 1 - END OF SAVE USER
//				$this->getCon()->rollBack();
////				echo "can't save user - 1 stage";
//			}
//
//
//			//SEND EMAIL AND SAVF ALL
//			if ($signup_process_flag) {
//				//EMAIL
////				$to = $this->getUsr_email();
////				$from_name = "begezmot.ru";
////				$from_mail = "admin@begezmot.com";
////				$mail_subject = 'begezmot.ru Account Activation';
////				$encoding = "utf-8";
////				$subject_preferences = array(
////					"input-charset" => $encoding,
////					"output-charset" => $encoding,
////					"line-length" => 76,
////					"line-break-chars" => "\r\n"
////				);
////				$header = "Content-type: text/html; charset=" . $encoding . " \r\n";
////				$header .= "From: " . $from_name . " <" . $from_mail . "> \r\n";
////				$header .= "MIME-Version: 1.0 \r\n";
////				$header .= "Content-Transfer-Encoding: 8bit \r\n";
////				$header .= "Date: " . date("r (T)") . " \r\n";
////				$header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);
////				$message = '<html>';
////				$message .= '<body>';
////				$message .= '<h2>begezmot.ru Account Activation</h2><br>';
////				$message .= '<p>Please activate your account using this link : <a href="http://begezmot.ru/useractivation.php?usr_id=' . $this->getUsr_id() . '&usr_confirm_code=' . $usr_confirm_code . '">Activate Now</a></p>';
////				$message .= '</body>';
////				$message .= '</html>';
////				if (mail($to, $mail_subject, $message, $header)) {
////					$this->getCon()->commit();
////					echo json_encode(array("msgType" => 1, "msg" => "You have signed up successfully.Please check your email( " . $this->getUsr_email() . " ) and activate the account", "usr_id" => $usr_id));
////				} else {
////					$this->getCon()->rollBack();
//////					$this->getCon()->commit();
////					echo json_encode(array("msgType" => 2, "msg" => "Sorry Signed up Failed.Becasue of activation email sending failed.Please check your email whether correct or wrong"));
////				}
//				//SEND GRID
//				$to = $this->getUsr_email();
//				$this->setEmail_con();
//				$this->setSendgrid_client();
//
//				$email = $this->getEmail_con();
//				$email->setFrom("admin@begezmot.ru", "Begezmot");
//				$email->setSubject("begezmot.ru Account Activation");
//				$email->addTo($to);
//				$message = '<h3>begezmot.ru Account Activation</h3>';
//				$message .= '<p>Please activate your account using this link : <a href="http://begezmot.ru/useractivation.php?usr_id=' . $this->getUsr_id() . '&usr_confirm_code=' . $usr_confirm_code . '">Activate Now</a></p>';
//				$email->addContent("text/html", $message);
//				$sendgrid = $this->getSendgrid_client();
//				$response = $sendgrid->send($email);
//				if ($response->statusCode() == 202) {
//					$this->getCon()->commit();
//					echo json_encode(array("msgType" => 1, "msg" => "You have signed up successfully.Please check your email( " . $this->getUsr_email() . " ) and activate the account", "usr_id" => $usr_id));
//				} else {
//					$this->getCon()->rollBack();
//					echo json_encode(array("msgType" => 2, "msg" => "Sorry Signed up Failed.Becasue of activation email sending failed.Please check your email whether correct or wrong"));
//				}
//				//END OF EMAIL
//			} else {
//				echo json_encode(array("msgType" => 2, "msg" => "Sorry Signed up Failed.Try Again Later or Contact Us"));
//			}
//		} catch (Exception $exc) {
//			if ($exc->getCode() == "23000") {
//				echo json_encode(array("msgType" => 2, "msg" => "Duplicate Error ! This User already avalable on our system.Please try again with another email,phone or username"));
//			} else {
//				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
//			}
//		}
//	}

	public function frontSignup($usr_signup_method) {
		$first_user_level = 1;
		$signup_process_flag = false;
		$usr_confirm_code = rand(10000, 99999);
		$this->getNextAutoIncrementUserID();
		if ($usr_signup_method == 1) {
			//email
			$sql_usr_table = "INSERT INTO `df_user` (`usr_pass`, `usr_first_name`, `usr_last_name`,`usr_email`, `usr_phone`, `usr_status`, `usr_cat_id`, `usr_username`, `usr_confirm_code`, `usr_create_date`, `usr_create_time`, `usr_notification_send`, `usr_notification_media`, `usr_verified`, `usr_verified_media`,`usr_ref_have`,`usr_ref_id`) VALUES ( :usr_pass,:usr_first_name,:usr_last_name,:usr_email,:usr_phone,'0',:usr_cat_id,:usr_username,:usr_confirm_code,:usr_create_date,:usr_create_time,'1', '2', '0', '1',:usr_ref_have,:usr_ref_id);";
			$sql_profile_table = "INSERT INTO `df_profile` (`pro_usr_id`) VALUES (:pro_usr_id);";
			$sql_affiliate_user_reference = "INSERT INTO `df_affiliate_user_reference` (`uaf_user`, `uaf_level`, `uaf_ref_have`, `uaf_ref_user`) VALUES (:uaf_user, :uaf_level, :uaf_ref_have, :uaf_ref_user);";
			try {
				$this->getCon()->beginTransaction();
				$saveUser = $this->getCon()->prepare($sql_usr_table);
				$saveUser->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_first_name', $this->getUsr_first_name(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_last_name', $this->getUsr_last_name(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_cat_id', $this->getUsr_cat_id(), PDO::PARAM_INT);
				$saveUser->bindParam(':usr_username', $this->getUsr_username(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_confirm_code', $usr_confirm_code, PDO::PARAM_STR);
				$saveUser->bindParam(':usr_create_date', $this->getUsr_create_date(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_create_time', $this->getUsr_create_time(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_ref_have', $this->getUsr_ref_have(), PDO::PARAM_INT);
				$saveUser->bindParam(':usr_ref_id', $this->getUsr_ref_id(), PDO::PARAM_INT);
				if ($saveUser->execute()) {
					$profileUser = $this->getCon()->prepare($sql_profile_table);
					$profileUser->bindParam(':pro_usr_id', $this->getUsr_id(), PDO::PARAM_INT);
					if ($profileUser->execute()) {
						//save affiliate reference
						if ($this->getUsr_ref_have() == 0) {
							//no referral user
							$createSaveReference = $this->getCon()->prepare($sql_affiliate_user_reference);
							$createSaveReference->bindParam(':uaf_user', $this->getUsr_id(), PDO::PARAM_INT);
							$createSaveReference->bindParam(':uaf_level', $first_user_level, PDO::PARAM_INT);
							$createSaveReference->bindParam(':uaf_ref_have', $this->getUsr_ref_have(), PDO::PARAM_INT);
							$createSaveReference->bindParam(':uaf_ref_user', $this->getUsr_ref_id(), PDO::PARAM_INT);
						} else {
							//have referral user
							$ref_user_level = $this->getRefAffiliateUserLevelByID($this->getUsr_ref_id());
							$reg_current_user_level = $ref_user_level + 1;
							$createSaveReference = $this->getCon()->prepare($sql_affiliate_user_reference);
							$createSaveReference->bindParam(':uaf_user', $this->getUsr_id(), PDO::PARAM_INT);
							$createSaveReference->bindParam(':uaf_level', $reg_current_user_level, PDO::PARAM_INT);
							$createSaveReference->bindParam(':uaf_ref_have', $this->getUsr_ref_have(), PDO::PARAM_INT);
							$createSaveReference->bindParam(':uaf_ref_user', $this->getUsr_ref_id(), PDO::PARAM_INT);
						}
						$signup_process_flag = $createSaveReference->execute();
						if ($signup_process_flag) {
							//SENDGRID WEB API(FOR EMAIL SMTP)
							$to = $this->getUsr_email();
							$message = '<div style="background-color: #f7f7f7;width: 95%;border-radius: 0.75rem;border: 1px solid #ebf0f5;color: #000000;padding-bottom: 35px;box-shadow: 0.1rem 0.2rem #e4e4e4">';
							$message .= '<h2 style="background-color: #4285f405;color: #1d1d1d;padding: 15px 10px;text-align: center;margin: 0.3rem;font-size: 1.4rem;border: 0 solid">Complete Your Dubboe Registration</h2><br>';
							$message .= '<p style="font-size: 0.9rem;color: #212223;padding-left: 5%!important">Hi..,<br>Congratulations! You have almost completed registering on dubboe.<br><a style="color: #0f75fb" href="http://dubboe.com/useractivation.php?usr_id=' . $this->getUsr_id() . '&usr_confirm_code=' . $usr_confirm_code . '">Click here to confirm your email address.</a><br><br>Once confirmed, you can manage your profile feature & much more from your My dubboe account.<br><br><br>If the above link does not work, please click on this URL or copy and paste it into your browser.<br><a style="color: #0f75fb" href="http://dubboe.com/useractivation.php?usr_id=' . $this->getUsr_id() . '&usr_confirm_code=' . $usr_confirm_code . '">http://dubboe.com/useractivation.php?usr_id=' . $this->getUsr_id() . '&usr_confirm_code=' . $usr_confirm_code . '</a></p>';
							$message .= '</div>';
							$sys_sendgrid_apikey = $this->getSendGridAPIKEY();
							$email = new \SendGrid\Mail\Mail();
							$email->setFrom("info@dubboe.com", "dubboe.com");
							$email->setSubject("Complete Your Dubboe Registration");
							$email->addTo($to);
							$email->addContent(
									"text/html", $message
							);
							$sendgrid = new \SendGrid($sys_sendgrid_apikey);
							try {
								$response = $sendgrid->send($email);
								if ($response->statusCode() == 202) {
									$this->getCon()->commit();
									echo json_encode(array("msgType" => 1, "msg" => "An email has been sent to the address you provided. Please follow the instructions in the email(​" . $this->getUsr_email() . ") to activate your account.", "usr_id" => $this->getUsr_id(), "usr_cat_id" => $this->getUsr_cat_id()));
								} else {
									$this->getCon()->rollBack();
									echo json_encode(array("msgType" => 2, "msg" => "Sorry! Sign up failed.Please Try again later"));
								}
							} catch (Exception $e) {
								$this->getCon()->rollBack();
								echo json_encode(array("msgType" => 2, "msg" => "Sorry! Sign up failed.Please Try again later"));
							}
						} else {
							$this->getCon()->rollBack();
							echo json_encode(array("msgType" => 2, "msg" => "Sorry! Sign up failed.Please Try again later"));
						}
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! Sign up failed.Please Try again later"));
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! Sign up failed.Please Try again later"));
				}
			} catch (Exception $exc) {
				if ($exc->getCode() == "23000") {
					echo json_encode(array("msgType" => 2, "msg" => "Duplicate Error ! This User already avalable on our system.Please try again with another email,phone or username"));
				} else {
					echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
				}
			}
		} else if ($usr_signup_method == 2) {
			//facebook
			$sql_usr_table = "INSERT INTO `df_user` (`usr_pass`, `usr_first_name`, `usr_last_name`,`usr_email`, `usr_phone`, `usr_cat_id`, `usr_username`, `usr_create_date`, `usr_create_time`, `usr_notification_send`, `usr_notification_media`, `usr_verified`, `usr_verified_media`) VALUES ( :usr_pass,:usr_first_name,:usr_last_name,:usr_email,:usr_phone,:usr_cat_id,:usr_username,:usr_create_date,:usr_create_time,'1', '2', '1', '3');";
			$sql_profile_table = "INSERT INTO `df_profile` (`pro_usr_id`) VALUES (:pro_usr_id);";
			try {
				$this->getCon()->beginTransaction();
				$saveUser = $this->getCon()->prepare($sql_usr_table);
				$saveUser->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_first_name', $this->getUsr_first_name(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_last_name', $this->getUsr_last_name(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_cat_id', $this->getUsr_cat_id(), PDO::PARAM_INT);
				$saveUser->bindParam(':usr_username', $this->getUsr_username(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_create_date', $this->getUsr_create_date(), PDO::PARAM_STR);
				$saveUser->bindParam(':usr_create_time', $this->getUsr_create_time(), PDO::PARAM_STR);
				if ($saveUser->execute()) {
					$profileUser = $this->getCon()->prepare($sql_profile_table);
					$profileUser->bindParam(':pro_usr_id', $this->getUsr_id(), PDO::PARAM_INT);
					if ($profileUser->execute()) {
						$this->getCon()->commit();
//						$_SESSION['usr_id'] = $this->getUsr_id();
//						$_SESSION['usr_first_name'] = $this->getUsr_first_name();
//						$_SESSION['usr_username'] = $this->getUsr_username();
//						$_SESSION['usr_cat_id'] = $this->getUsr_cat_id();
						echo json_encode(array("msgType" => 1, "msg" => "Your account successfully activated.please wait...", "usr_id" => $this->getUsr_id(), "usr_cat_id" => $this->getUsr_cat_id()));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry!Sign up failed.Please Try again later"));
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry!Sign up failed.Please Try again later"));
				}
			} catch (Exception $exc) {
				if ($exc->getCode() == "23000") {
					echo json_encode(array("msgType" => 2, "msg" => "Duplicate Error!This User already avalable on our system.Please try again with another email, phone or username"));
				} else {
					echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
				}
			}
		}
	}

	public function activateUserAccount() {
		$usr_cat_id = 0;
		$data = array();
		$user_search_sql = "SELECT
df_user.usr_id,
df_user.usr_email,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_first_name
FROM
df_user
WHERE
df_user.usr_id = :usr_id AND
df_user.usr_confirm_code = :usr_confirm_code AND
df_user.usr_status = 0";
		$user_update_sql = "UPDATE `df_user` SET `usr_status`='1', `usr_verified` ='1', usr_confirm_code = '#' WHERE (`usr_id`=:usr_id);";
		try {
			$this->getCon()->beginTransaction();
			$readUserStmt = $this->getCon()->prepare($user_search_sql);
			$readUserStmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			$readUserStmt->bindParam(':usr_confirm_code', $this->getUsr_confirm_code(), PDO::PARAM_STR);
			$readUserStmt->execute();
			$count = $readUserStmt->rowCount();
			if ($count == 0) {
				echo json_encode(array("msgType" => 3, "msg" => "Failed Activation,Try Again"));
			} else {
				$createstmt = $this->getCon()->prepare($user_update_sql);
				$createstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
				if ($createstmt->execute()) {
					while ($row = $readUserStmt->fetch(PDO::FETCH_OBJ)) {
						$usr_cat_id = $row->usr_cat_id;
						$this->setFlag(true);
					}
					if ($this->getFlag()) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Successfully activated your Account.Please wait for navigate to dashboard...", "usr_cat_id" => $usr_cat_id));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Successfully activated your Account.Now you can access your account"));
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 3, "msg" => "Failed Activation,Try Again"));
				}
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 3, "msg" => $exc->getMessage()));
		}
	}

//NEED
	public function logout() {
		$sql = "SELECT
df_user.usr_verified_media
FROM
df_user
WHERE
df_user.usr_id = :usr_id";
		try {
			$readUserInfo = $this->getCon()->prepare($sql);
			$readUserInfo->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readUserInfo->execute();
			while ($row = $readUserInfo->fetch(PDO::FETCH_OBJ)) {
				//1 - Email, 2 - Mobile, 3 - Facebook, 4 - By System
				if (isset($_SESSION) && !empty($_SESSION)) {
					unset($_SESSION['usr_id']);
					unset($_SESSION['usr_first_name']);
					unset($_SESSION['usr_username']);
					unset($_SESSION['usr_cat_id']);
				}
				if (!isset($_SESSION['usr_id'])) {
					if ($row->usr_verified_media == 3) {
						echo json_encode(array("msgType" => 1, "msg" => "Successfully Logged Off", "logout_type" => 'fb'));
					} else {
						echo json_encode(array("msgType" => 1, "msg" => "Successfully Logged Off", "logout_type" => 'normal'));
					}
				} else {
					echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Sign out failed"));
				}
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 3, "msg" => $exc->getMessage()));
		}
	}

//END NEED

	public function setcookieagreement() {
		$cookie_name = "adult";
		$cookie_value = "agreed";
//		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		setcookie($cookie_name, $cookie_value, time() + (60 * 60), "/"); // 60 = 1 min
		echo 1;
	}

	public function checkcookieagreement() {
//		unset($_COOKIE['user']);
		$cookie_name = "adult";
		if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == "agreed") {
			echo 1;
		} else {
			echo 0;
		}
	}

	public function cmbUserCategory() {
		$data = array();
		$sql = "SELECT
df_usercategory.usr_cat_id,
df_usercategory.usr_cat_name
FROM
df_usercategory
WHERE
df_usercategory.usr_cat_id <> 1
ORDER BY
df_usercategory.usr_cat_name ASC";
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

	public function cmbUserByCategory() {
		$data = array();
		$sql = "SELECT
df_user.usr_name,
df_user.usr_id
FROM
df_user
WHERE
df_user.usr_cat_id = :usr_cat_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(":usr_cat_id", $this->getUsr_cat_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblIdentityVerificationReqUser() {
		$data = array();
		$sql = "SELECT
df_user.usr_verified_indicator,
df_relatecombo.rlcmb_name,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_id
FROM
df_user
INNER JOIN df_relatecombo ON df_user.usr_verified_indicator = df_relatecombo.rlcmb_id
WHERE
df_user.usr_verified_status = 1";
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

	public function userTable() {
		$data = array();
		$sql = "SELECT
df_usercategory.usr_cat_name,
df_user.usr_id,
df_user.usr_pass,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_name,
df_user.usr_create_date,
DATE_FORMAT(df_user.usr_create_time,'%h:%i %p') AS usr_create_time
FROM
df_user
INNER JOIN df_usercategory ON df_user.usr_cat_id = df_usercategory.usr_cat_id
WHERE
df_user.usr_status = 1 AND
df_user.usr_cat_id <> 1
ORDER BY
df_user.usr_id DESC";
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

//NEED
	public function userTableByCatID() {
		$data = array();
		$sql = "SELECT
df_user.usr_id,
df_user.usr_pass,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_age,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_confirm_code,
df_user.usr_create_date,
df_user.usr_create_time,
df_user.usr_notification_send,
df_user.usr_notification_media,
df_user.usr_verified,
df_user.usr_verified_media,
df_user.usr_points,
df_user.usr_ref_have,
df_user.usr_ref_id,
df_user.usr_membership_status,
df_user.usr_membership_activate_type,
df_user.usr_membership_valid_year,
df_user.usr_last_membership_renew_date,
df_user.usr_next_membership_renew_date,
df_user.usr_verified_status,
df_user.usr_verified_indicator,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_user.usr_verified_indicator) AS usr_verified_indicator_name,
df_profile.pro_paypal_email
FROM
df_user
INNER JOIN df_usercategory ON df_user.usr_cat_id = df_usercategory.usr_cat_id
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
WHERE
df_user.usr_cat_id = :usr_cat_id
ORDER BY
df_user.usr_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(":usr_cat_id", $this->getUsr_cat_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function AllDubboeMembersReport() {
		$data = array();
		$sql = "SELECT
df_profile.pro_id,
df_profile.pro_usr_id,
df_profile.pro_paypal_email,
df_profile.pro_dob,
df_profile.pro_address,
df_profile.pro_country,
df_profile.pro_city,
df_profile.pro_state,
df_profile.pro_zip,
df_profile.pro_lat,
df_profile.pro_lng,
df_profile.pro_location,
df_profile.pro_map_status,
df_profile.pro_gender,
df_profile.pro_business_address,
df_profile.pro_business_name,
df_profile.pro_typeof_productservice,
df_profile.pro_grading,
df_profile.pro_profile_category,
df_profile.pro_bizdesc_short,
df_profile.pro_bizdesc_long,
df_profile.pro_website_url,
df_user.usr_id,
df_user.usr_pass,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_age,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_confirm_code,
df_user.usr_create_date,
df_user.usr_create_time,
df_user.usr_notification_send,
df_user.usr_notification_media,
df_user.usr_verified,
df_user.usr_verified_media,
df_user.usr_verified_status,
df_user.usr_verified_indicator,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_profile.pro_profile_category) AS pro_profile_category_name,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_profile.pro_grading) AS pro_grading_name,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_profile.pro_country) AS pro_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = df_profile.pro_state) AS pro_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = df_profile.pro_city) AS pro_city_name,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_user.usr_verified_indicator) AS usr_verified_indicator_name
FROM
df_user
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
WHERE
df_user.usr_cat_id = 3";
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

//END NEED

	public function getUserByID() {
		$data = array();
		$sql = "SELECT
df_user.usr_id,
df_user.usr_pass,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_usercategory.usr_cat_name,
df_user.usr_username,
df_user.usr_create_date,
DATE_FORMAT(df_user.usr_create_time,'%h:%i %p') AS usr_create_time,
df_user.usr_create_time,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_age
FROM
df_user
INNER JOIN df_usercategory ON df_user.usr_cat_id = df_usercategory.usr_cat_id
WHERE
df_user.usr_id = :usr_id AND
df_user.usr_cat_id <> 1";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

//NEED
	public function getUserInfoBySessionID() {
		$data = array();
		$sql = "SELECT
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_phone,
df_user.usr_email,
df_profile.pro_lat,
df_profile.pro_lng,
df_profile.pro_location,
df_profile.pro_map_status
FROM
df_user
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
WHERE
df_user.usr_id = :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

//END NEED

	public function userPointDisplay() {
		$data = 0;
		$sql = "SELECT
df_user.usr_points
FROM
df_user
WHERE
df_user.usr_id = :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$data = $row->usr_points;
			}
			echo $data;
		} catch (Exception $exc) {
			echo $data;
		}
	}

//NEED
	public function getUserProfileInfo() {
		$data = array();
		$sql = "SELECT
df_profile.pro_id,
df_profile.pro_usr_id,
df_profile.pro_paypal_email,
df_profile.pro_dob,
df_profile.pro_address,
df_profile.pro_country,
df_profile.pro_city,
df_profile.pro_state,
df_profile.pro_zip,
df_profile.pro_lat,
df_profile.pro_lng,
df_profile.pro_location,
df_profile.pro_map_status,
df_profile.pro_gender,
df_profile.pro_business_address,
df_profile.pro_business_name,
df_profile.pro_typeof_productservice,
df_profile.pro_grading,
df_profile.pro_profile_category,
df_profile.pro_bizdesc_short,
df_profile.pro_bizdesc_long,
df_profile.pro_website_url,
df_user.usr_id,
df_user.usr_pass,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_age,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_confirm_code,
df_user.usr_create_date,
df_user.usr_create_time,
df_user.usr_notification_send,
df_user.usr_notification_media,
df_user.usr_verified,
df_user.usr_verified_media,
df_user.usr_verified_status,
df_user.usr_verified_indicator,
df_profile.pro_instagram_link,
df_profile.pro_youtube_link,
df_profile.pro_fb_link,
df_profile.pro_twitter_link,
df_profile.pro_pinterest_link
FROM
df_user
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
WHERE
df_user.usr_id = :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

//END NEED

	public function getUserProfileInfoByID() {
		$data = array();
		$sql = "SELECT
df_profile.pro_id,
df_profile.pro_usr_id,
df_profile.pro_paypal_email,
df_profile.pro_dob,
df_profile.pro_address,
df_profile.pro_country,
df_profile.pro_city,
df_profile.pro_state,
df_profile.pro_zip,
df_profile.pro_lat,
df_profile.pro_lng,
df_profile.pro_location,
df_profile.pro_map_status,
df_profile.pro_gender,
df_profile.pro_business_address,
df_profile.pro_business_name,
df_profile.pro_typeof_productservice,
df_profile.pro_grading,
df_profile.pro_profile_category,
df_profile.pro_bizdesc_short,
df_profile.pro_bizdesc_long,
df_profile.pro_website_url,
df_user.usr_id,
df_user.usr_pass,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_age,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_confirm_code,
df_user.usr_create_date,
df_user.usr_create_time,
df_user.usr_notification_send,
df_user.usr_notification_media,
df_user.usr_verified,
df_user.usr_verified_media,
df_user.usr_verified_status,
df_user.usr_verified_indicator,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_profile.pro_profile_category) AS pro_profile_category_name,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_profile.pro_grading) AS pro_grading_name,
(SELECT
df_relatecombo.rlcmb_name
FROM
df_relatecombo
WHERE
df_relatecombo.rlcmb_id = df_profile.pro_country) AS pro_country_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = df_profile.pro_state) AS pro_state_name,
(SELECT
df_subcombo.scmb_name
FROM
df_subcombo
WHERE
df_subcombo.scmb_id = df_profile.pro_city) AS pro_city_name,
df_profile.pro_instagram_link,
df_profile.pro_fb_link,
df_profile.pro_youtube_link,
df_profile.pro_twitter_link,
df_profile.pro_pinterest_link
FROM
df_user
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
WHERE
df_user.usr_id = :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$i = 0;
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[$i] = $row;
				$directory = "../../asset_imageuploader/userprofileimages/" . $row['usr_id'] . "/";
				$files = scandir($directory);
				$files = array_diff($files, ['.', '..', 'thumbnail']);
				$files = array_values(array_filter($files));
				if ($files[0] == NULL) {
					$data[$i]['profile_img'] = "#";
				} else {
					$data[$i]['profile_img'] = $files[0];
				}
				$i++;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblReceivedScorePointByUser() {
		$data = array();
		$sql = "SELECT
df_affiliate_points_earn.rec_id,
df_affiliate_points_earn.rec_user,
(SELECT
df_user.usr_name
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_points_earn.rec_user) AS point_received_to,
df_affiliate_points_earn.rec_description,
df_affiliate_points_earn.rec_points,
df_affiliate_points_earn.rec_from,
df_affiliate_points_earn.rec_relate_ref_user,
if(ISNULL(df_affiliate_points_earn.rec_relate_ref_user),'System',(SELECT
df_user.usr_name
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_points_earn.rec_relate_ref_user)) AS point_received_from,
if(ISNULL(df_affiliate_points_earn.rec_relate_ref_user),1,IF(ISNULL((SELECT
df_user.usr_name
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_points_earn.rec_relate_ref_user AND
df_user.usr_status = 1)),IFNULL((SELECT
df_user.usr_name
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_points_earn.rec_relate_ref_user AND
df_user.usr_status = 1),0),1)) AS point_received_from_usr_acc_active
FROM
df_affiliate_points_earn
WHERE
df_affiliate_points_earn.rec_user = :rec_user
ORDER BY
df_affiliate_points_earn.rec_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rec_user', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblLoadAllUsersByLocation($evtsh_event) {
		$data = array();
		$sql = "SELECT
df_user.usr_id,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_profile.pro_country,
df_profile.pro_city,
df_profile.pro_state
FROM
df_user
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
WHERE
df_user.usr_status = 1 AND
df_user.usr_cat_id = 3 AND
df_user.usr_id NOT IN (SELECT
ub_event_share.evtsh_user
FROM
ub_event_share
WHERE
ub_event_share.evtsh_event = :evtsh_event)";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':evtsh_event', $evtsh_event, PDO::PARAM_INT);
//			$readstmt->bindParam(':pro_city', $city, PDO::PARAM_INT);
//			$readstmt->bindParam(':pro_state', $state, PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblLoadAllInvitedUserByEvent($evt_id) {
		$data = array();
		$sql = "SELECT
ub_event_share.evtsh_user,
ub_event_share.evtsh_id,
ub_event_share.evtsh_event,
ub_event_share.evtsh_by_mail,
ub_event_share.evtsh_date,
ub_event_share.evtsh_time,
ub_event_share.evtsh_shared_by,
ub_event_share.evtsh_join_status,
df_profile.pro_address,
df_profile.pro_country,
df_profile.pro_city,
df_profile.pro_state,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone
FROM
ub_event_share
INNER JOIN df_user ON ub_event_share.evtsh_user = df_user.usr_id
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
WHERE
ub_event_share.evtsh_event = :evtsh_event
ORDER BY
ub_event_share.evtsh_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':evtsh_event', $evt_id, PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function checkMembershipIsActive() {
		$status = 0;
		$sql = "SELECT
df_user.usr_membership_status
FROM
df_user
WHERE
df_user.usr_id = :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$$status = $row->usr_membership_status;
			}
			echo $$status;
		} catch (Exception $exc) {
			echo $$status;
		}
	}

	public function tblReferenceUsersByUser() {
		$data = array();
		$sql = "SELECT
df_affiliate_points_earn.rec_relate_ref_user,
df_affiliate_points_earn.rec_payout_status,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_affiliate_level.alvl_name,
FORMAT(df_affiliate_points_earn.rec_points,2) AS rec_points,
df_affiliate_user_reference.uaf_ref_user
FROM
df_affiliate_points_earn
INNER JOIN df_user ON df_affiliate_points_earn.rec_relate_ref_user = df_user.usr_id
INNER JOIN df_affiliate_user_reference ON df_affiliate_user_reference.uaf_user = df_user.usr_id
INNER JOIN df_affiliate_level ON df_affiliate_user_reference.uaf_level = df_affiliate_level.alvl_id
WHERE
df_affiliate_points_earn.rec_user = :rec_user AND
df_affiliate_points_earn.rec_relate_ref_user IS NOT NULL AND
df_user.usr_status = 1
GROUP BY
df_affiliate_points_earn.rec_relate_ref_user
ORDER BY
df_affiliate_points_earn.rec_relate_ref_user ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rec_user', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function tblAdminPayoutNeedUsers() {
		$data = array();
		$sql = "SELECT
df_affiliate_points_earn.rec_relate_ref_user,
df_affiliate_points_earn.rec_payout_status,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_affiliate_level.alvl_name,
FORMAT(df_affiliate_points_earn.rec_points,2) AS rec_points,
df_affiliate_user_reference.uaf_ref_user,
df_affiliate_points_earn.rec_id,
df_affiliate_points_earn.rec_paypal_batch_id,
df_affiliate_points_earn.rec_paypal_trn_id,
(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_user_reference.uaf_ref_user) AS receiver_name
FROM
df_affiliate_points_earn
INNER JOIN df_user ON df_affiliate_points_earn.rec_relate_ref_user = df_user.usr_id
INNER JOIN df_affiliate_user_reference ON df_affiliate_user_reference.uaf_user = df_user.usr_id
INNER JOIN df_affiliate_level ON df_affiliate_user_reference.uaf_level = df_affiliate_level.alvl_id
WHERE
df_affiliate_points_earn.rec_relate_ref_user IS NOT NULL AND
df_user.usr_status = 1 AND
(df_affiliate_points_earn.rec_payout_status = 0 OR
df_affiliate_points_earn.rec_payout_status = 1)
GROUP BY
df_affiliate_points_earn.rec_relate_ref_user
ORDER BY
df_affiliate_points_earn.rec_relate_ref_user ASC";
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

	public function tblPayoutPendingBadgeGroup() {
		$data = array();
		$sql = "SELECT
df_affiliate_points_earn.rec_relate_ref_user,
df_affiliate_points_earn.rec_payout_status,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_affiliate_level.alvl_name,
FORMAT(df_affiliate_points_earn.rec_points,2) AS rec_points,
df_affiliate_user_reference.uaf_ref_user,
df_affiliate_points_earn.rec_id,
(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_user_reference.uaf_ref_user) AS receiver_name,
df_affiliate_points_earn.rec_paypal_batch_id,
df_affiliate_points_earn.rec_paypal_trn_id
FROM
df_affiliate_points_earn
INNER JOIN df_user ON df_affiliate_points_earn.rec_relate_ref_user = df_user.usr_id
INNER JOIN df_affiliate_user_reference ON df_affiliate_user_reference.uaf_user = df_user.usr_id
INNER JOIN df_affiliate_level ON df_affiliate_user_reference.uaf_level = df_affiliate_level.alvl_id
WHERE
df_affiliate_points_earn.rec_relate_ref_user IS NOT NULL AND
df_user.usr_status = 1 AND
df_affiliate_points_earn.rec_payout_status = 1
GROUP BY
df_affiliate_points_earn.rec_paypal_batch_id
ORDER BY
df_affiliate_points_earn.rec_relate_ref_user ASC";
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

	public function tblAllUsersNotGrants() {
		$data = array();
		$sql = "SELECT
df_affiliate_points_earn.rec_relate_ref_user,
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_affiliate_level.alvl_name,
FORMAT(df_affiliate_points_earn.rec_points,2) AS rec_points,
df_affiliate_user_reference.uaf_ref_user
FROM
df_affiliate_points_earn
INNER JOIN df_user ON df_affiliate_points_earn.rec_relate_ref_user = df_user.usr_id
INNER JOIN df_affiliate_user_reference ON df_affiliate_user_reference.uaf_user = df_user.usr_id
INNER JOIN df_affiliate_level ON df_affiliate_user_reference.uaf_level = df_affiliate_level.alvl_id
WHERE
df_affiliate_points_earn.rec_user = :rec_user AND
df_affiliate_points_earn.rec_relate_ref_user IS NOT NULL AND
df_user.usr_status = 1
GROUP BY
df_affiliate_points_earn.rec_relate_ref_user
ORDER BY
df_affiliate_points_earn.rec_relate_ref_user ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rec_user', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getLoggedUserStatus() {
		$data = array();
		$sql = "SELECT
df_user.usr_status,
df_user.usr_email,
df_user.usr_last_name,
df_user.usr_first_name,
df_user.usr_id,
df_user.usr_cat_id
FROM
df_user
WHERE
df_user.usr_id = :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$usr_email = $row->usr_email;
				$usr_status = $row->usr_status;
				if (isset($_SESSION['usr_status']) && isset($_SESSION['usr_email'])) {
					unset($_SESSION['usr_status']);
					unset($_SESSION['usr_email']);
				}
			}
			$_SESSION['usr_status'] = $usr_status;
			$_SESSION['usr_email'] = $usr_email;
			echo json_encode(array("usr_status" => $usr_status, "usr_email" => $usr_email));
		} catch (Exception $exc) {
			echo $exc->getMessage();
		}
	}

	public function deleteUserByID() {

		$sql = "DELETE FROM `df_user` WHERE (`usr_id`=:usr_id);";
		try {
			$delstmt = $this->con->prepare($sql);
			$delstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			if ($delstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "User delete success"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! User delete failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//NEED
	public function passwordChangeByRecovery() {
		$sql = "UPDATE `df_user` SET `usr_pass`= :usr_pass WHERE (`usr_id`=:usr_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Password changed success"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! password change failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//END NEED

	public function profilePasswordChange() {
		$sql = "UPDATE `df_user` SET `usr_pass`= :usr_pass WHERE (`usr_id`=:usr_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Password changed success"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! password change failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//NEED
	public function addUser() {
		$this->getNextAutoIncrementUserID();
		$sql = "INSERT INTO `df_user` (`usr_pass`, `usr_first_name`, `usr_last_name`, `usr_email`,`usr_phone`, `usr_cat_id`, `usr_username`, `usr_create_date`, `usr_create_time`) VALUES (:usr_pass, :usr_first_name, :usr_last_name, :usr_email,:usr_phone,:usr_cat_id,:usr_username,:usr_create_date,:usr_create_time);";
		$sql_profile = "INSERT INTO `df_profile` (`pro_usr_id`) VALUES (:pro_usr_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_first_name', $this->getUsr_first_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_last_name', $this->getUsr_last_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_cat_id', $this->getUsr_cat_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':usr_username', $this->getUsr_username(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_create_date', $this->getUsr_create_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_create_time', $this->getUsr_create_time(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				$createstmt2 = $this->getCon()->prepare($sql_profile);
				$createstmt2->bindParam(':pro_usr_id', $this->getUsr_id(), PDO::PARAM_INT);
				if ($createstmt2->execute()) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "User account was successfully created", "usr_id" => $this->getUsr_id()));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! User account creation failed, Try again later"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! User account creation failed, Try again later"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == "23000") {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Entered username or email already available on system.  Try again with another username or password"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! User account creation failed, Try again later"));
			}
		}
	}

	public function addUserWithRefActivated($original_pass) {
		$this->getNextAutoIncrementUserID();
		$sql = "INSERT INTO `df_user` (`usr_pass`, `usr_first_name`, `usr_last_name`, `usr_email`,`usr_phone`, `usr_cat_id`, `usr_username`, `usr_create_date`, `usr_create_time`) VALUES (:usr_pass, :usr_first_name, :usr_last_name, :usr_email,:usr_phone,:usr_cat_id,:usr_username,:usr_create_date,:usr_create_time);";
		$sql_profile = "INSERT INTO `df_profile` (`pro_usr_id`) VALUES (:pro_usr_id);";
		$sql_affiliate_user_reference = "INSERT INTO `df_affiliate_user_reference` (`uaf_user`, `uaf_level`, `uaf_ref_have`, `uaf_ref_user`) VALUES (:uaf_user,'1', '0', '0');";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_first_name', $this->getUsr_first_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_last_name', $this->getUsr_last_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_cat_id', $this->getUsr_cat_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':usr_username', $this->getUsr_username(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_create_date', $this->getUsr_create_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_create_time', $this->getUsr_create_time(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				$createstmt2 = $this->getCon()->prepare($sql_profile);
				$createstmt2->bindParam(':pro_usr_id', $this->getUsr_id(), PDO::PARAM_INT);
				if ($createstmt2->execute()) {
					$createSaveReference = $this->getCon()->prepare($sql_affiliate_user_reference);
					$createSaveReference->bindParam(':uaf_user', $this->getUsr_id(), PDO::PARAM_INT);
					if ($createSaveReference->execute()) {
						//SENDGRID WEB API(FOR EMAIL SMTP)
						$to = $this->getUsr_email();
						$message = '<div style="background-color: #f7f7f7;width: 95%;border-radius: 0.75rem;border: 1px solid #ebf0f5;color: #000000;padding-bottom: 35px;box-shadow: 0.1rem 0.2rem #e4e4e4">';
						$message .= '<h2 style="background-color: #4285f405;color: #1d1d1d;padding: 15px 10px;text-align: center;margin: 0.3rem;font-size: 1.4rem;border: 0 solid">Dubboe.com User Credentials For Sign in</h2><br>';
						$message .= '<p style="font-size: 0.9rem;color: #212223;padding-left: 5%!important">Hi..,<br>Congratulations! Your executive account already activated. Please use following user credentials for access your dubboe.com executive account<br><br> Sign in URL: <a style="color: #0f75fb" href="https://dubboe.com/login.php">Sign in.</a><br>Username: ' . $this->getUsr_username() . '<br>Password: ' . $original_pass . '<br><br>You can update your profile informations and password anytime using "forget Password" button on sign in page or profile page</p>';
						$message .= '</div>';
						$sys_sendgrid_apikey = $this->getSendGridAPIKEY();
						$email = new \SendGrid\Mail\Mail();
						$email->setFrom("info@dubboe.com", "dubboe.com");
						$email->setSubject("Dubboe.com (Account Executive) Account User Credentials");
						$email->addTo($to);
						$email->addContent(
								"text/html", $message
						);
						$sendgrid = new \SendGrid($sys_sendgrid_apikey);
						try {
							$response = $sendgrid->send($email);
							if ($response->statusCode() == 202) {
								$this->getCon()->commit();
								echo json_encode(array("msgType" => 1, "msg" => "Account was successfully created", "usr_id" => $this->getUsr_id()));
							} else {
								$this->getCon()->rollBack();
								echo json_encode(array("msgType" => 2, "msg" => "Sorry! Account creation failed.Email was not delivered"));
							}
						} catch (Exception $e) {
							$this->getCon()->rollBack();
							echo json_encode(array("msgType" => 2, "msg" => "Sorry! Account creation failed.Email was not delivered"));
						}
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! Account creation failed"));
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! Account creation failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Account creation failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == "23000") {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Entered username or email already available on system.  Try again with another username or password"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Account creation failed"));
			}
		}
	}

//END NEED

	public function addUserModel() {
		$this->getNextAutoIncrementUserID();
		$sql = "INSERT INTO `df_user` (`usr_pass`, `usr_name`, `usr_email`,`usr_phone`, `usr_cat_id`, `usr_username`, `usr_create_date`, `usr_create_time`) VALUES (:usr_pass, :usr_name, :usr_email,:usr_phone,:usr_cat_id,:usr_username,:usr_create_date,:usr_create_time);";
		$sql_profile = "INSERT INTO `df_profile` (`pro_usr_id`) VALUES (:pro_usr_id);";
		$sql_model = "INSERT INTO `ts_models` (`mo_usr_id`) VALUES (:mo_usr_id);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_name', $this->getUsr_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_cat_id', $this->getUsr_cat_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':usr_username', $this->getUsr_username(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_create_date', $this->getUsr_create_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_create_time', $this->getUsr_create_time(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				$createstmt2 = $this->getCon()->prepare($sql_profile);
				$createstmt2->bindParam(':pro_usr_id', $this->getUsr_id(), PDO::PARAM_INT);
				if ($createstmt2->execute()) {
					$createstmt3 = $this->getCon()->prepare($sql_model);
					$createstmt3->bindParam(':mo_usr_id', $this->getUsr_id(), PDO::PARAM_INT);
					if ($createstmt3->execute()) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "User saved success", "usr_id" => $this->getUsr_id()));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! User save failed"));
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! User save failed"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! User save failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//NEED
	public function updateUser() {
		$sql = "UPDATE `df_user` SET `usr_first_name`=:usr_first_name, `usr_last_name`= :usr_last_name, `usr_phone`=:usr_phone, `usr_email` =:usr_email, `usr_username`=:usr_username WHERE `usr_id`=:usr_id;";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			$createstmt->bindParam(':usr_first_name', $this->getUsr_first_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_last_name', $this->getUsr_last_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_username', $this->getUsr_username(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "User update success"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! User update failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function userIdentityVerifySubmitInfo($usr_verified_indicator) {
		$sql = "UPDATE `df_user` SET `usr_verified_status`='1', `usr_verified_indicator`=" . $usr_verified_indicator . " WHERE (`usr_id`=" . $_SESSION['usr_id'] . ");";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Thank you for submitting verification information"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Your application processing failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function userIdentityVerifyApprove($usr_id) {
		$sql = "UPDATE `df_user` SET `usr_verified_status`='2' WHERE (`usr_id`=" . $usr_id . ");";
		try {
			$createstmt = $this->getCon()->prepare($sql);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Process done"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! process failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//END NEED

	public function tblAllPointsEarnedUsers() {
		$data = array();
		$sql_combo = "SELECT
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_id
FROM
df_user
WHERE
df_user.usr_cat_id = 3 AND
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

	public function tblAllPointsEarnedExecutives() {
		$data = array();
		$sql_combo = "SELECT
df_user.usr_first_name,
df_user.usr_last_name,
df_user.usr_email,
df_user.usr_phone,
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
df_affiliate_points_earn.rec_id,
df_affiliate_points_earn.rec_user,
(SELECT
df_user.usr_first_name
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_points_earn.rec_user) AS point_received_to,
df_affiliate_points_earn.rec_description,
FORMAT(df_affiliate_points_earn.rec_points,2) AS rec_points,
df_affiliate_points_earn.rec_from,
df_affiliate_points_earn.rec_relate_ref_user,
if(ISNULL(df_affiliate_points_earn.rec_relate_ref_user),'System',(SELECT
df_user.usr_first_name
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_points_earn.rec_relate_ref_user)) AS point_received_from,
if(ISNULL(df_affiliate_points_earn.rec_relate_ref_user),1,IF(ISNULL((SELECT
df_user.usr_first_name
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_points_earn.rec_relate_ref_user AND
df_user.usr_status = 1)),IFNULL((SELECT
df_user.usr_first_name
FROM
df_user
WHERE
df_user.usr_id = df_affiliate_points_earn.rec_relate_ref_user AND
df_user.usr_status = 1),0),1)) AS point_received_from_usr_acc_active
FROM
df_affiliate_points_earn
ORDER BY
df_affiliate_points_earn.rec_id DESC";
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

	public function profileUpdate() {
		$profile_sql = "UPDATE `df_profile` SET `pro_fname`=:pro_fname, `pro_lname`=:pro_lname, `pro_gender`=:pro_gender, `pro_age`=:pro_age, `pro_paypal_email`=:pro_paypal_email, `pro_dob`=:pro_dob, `pro_address`=:pro_address, `pro_country`=:pro_country, `pro_city`=:pro_city, `pro_state`=:pro_state, `pro_zip`=:pro_zip, `pro_taxpayid`=:pro_taxpayid WHERE (`pro_usr_id`=:usr_id);
";
		try {
//update profile
			$this->getCon()->beginTransaction();
			$creatprofiletbl = $this->getCon()->prepare($profile_sql);
			$creatprofiletbl->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_fname', $this->getPro_fname(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_lname', $this->getPro_lname(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_gender', $this->getPro_gender(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_age', $this->getPro_age(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_paypal_email', $this->getPro_paypal_email(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_dob', $this->getPro_dob(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_address', $this->getPro_address(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_country', $this->getPro_country(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_city', $this->getPro_city(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_state', $this->getPro_state(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_zip', $this->getPro_zip(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_taxpayid', $this->getPro_taxpayid(), PDO::PARAM_STR);
			if ($creatprofiletbl->execute()) {
				$this->getCon()->commit();
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Edited"));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Model update failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function temporyMShipUpgradeForMonth() {
		$sql = "UPDATE `df_user` SET `usr_membership_status`=1, `usr_membership_activate_type`=1, `usr_membership_valid_year` = '" . date("Y") . "', `usr_last_membership_renew_date`='" . date("Y-m-d") . "', `usr_next_membership_renew_date` = DATE_ADD(CURDATE(), INTERVAL 30 DAY)  WHERE (`usr_id`=:usr_id);";
		try {
			$this->getCon()->beginTransaction();
			$creatprofiletbl = $this->getCon()->prepare($sql);
			$creatprofiletbl->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			if ($creatprofiletbl->execute()) {
				$this->getCon()->commit();
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Upgraded"));
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Upgrade Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//NEED
	public function profileUpdateFront() {
		$profile_sql = "UPDATE `df_profile` SET `pro_address`=:pro_address, `pro_country`=:pro_country, `pro_city`=:pro_city, `pro_state`=:pro_state, `pro_business_address`=:pro_business_address, `pro_business_name`=:pro_business_name, `pro_typeof_productservice`=:pro_typeof_productservice, `pro_grading`=:pro_grading, `pro_profile_category`=:pro_profile_category, `pro_bizdesc_short`=:pro_bizdesc_short, `pro_bizdesc_long`=:pro_bizdesc_long, `pro_website_url`=:pro_website_url, `pro_instagram_link`=:pro_instagram_link, `pro_twitter_link`=:pro_twitter_link, `pro_fb_link`=:pro_fb_link, `pro_youtube_link`=:pro_youtube_link, `pro_pinterest_link`=:pro_pinterest_link WHERE (`pro_usr_id`=:pro_usr_id);";
		$user_sql = "UPDATE `df_user` SET `usr_first_name`=:usr_first_name, `usr_last_name`=:usr_last_name, `usr_phone`=:usr_phone WHERE (`usr_id`=:usr_id);";
		try {
			$this->getCon()->beginTransaction();
			$creatprofiletbl = $this->getCon()->prepare($profile_sql);
			$creatprofiletbl->bindParam(':pro_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_business_name', $this->getPro_business_name(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_typeof_productservice', $this->getPro_typeof_productservice(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_country', $this->getPro_country(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_state', $this->getPro_state(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_city', $this->getPro_city(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_profile_category', $this->getPro_profile_category(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_grading', $this->getPro_grading(), PDO::PARAM_INT);
			$creatprofiletbl->bindParam(':pro_address', $this->getPro_address(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_business_address', $this->getPro_business_address(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_bizdesc_short', $this->getPro_bizdesc_short(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_bizdesc_long', $this->getPro_bizdesc_long(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_website_url', $this->getPro_website_url(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_instagram_link', $this->getPro_instagram_link(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_twitter_link', $this->getPro_twitter_link(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_fb_link', $this->getPro_fb_link(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_youtube_link', $this->getPro_youtube_link(), PDO::PARAM_STR);
			$creatprofiletbl->bindParam(':pro_pinterest_link', $this->getPro_pinterest_link(), PDO::PARAM_STR);
			if ($creatprofiletbl->execute()) {
				$creatuser = $this->getCon()->prepare($user_sql);
				$creatuser->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
				$creatuser->bindParam(':usr_first_name', $this->getUsr_first_name(), PDO::PARAM_STR);
				$creatuser->bindParam(':usr_last_name', $this->getUsr_last_name(), PDO::PARAM_STR);
				$creatuser->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
				if ($creatuser->execute()) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Successfully Profile Updated"));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Unable to update profile"));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Unable to update profile"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//END NEED

	public function ImageAvailability($dir) {
		$file_availability = false;
		$ar = glob("$dir/*");
		$i = 0;
		foreach ($ar as $arv) {
			if ("$dir/thumbnail" != $arv) {
				$i++;
			}
		}
		if ($i != 0) {
			$file_availability = true;
		}
		return $file_availability;
	}

	public function userProfileActivation() {
		$signup_process_flag = false;
		$usr_ref_have = 0;
		$usr_ref_id = 0;
		$credit = $this->getReleventCreditAmountByUsrID($this->getPro_profile_category());
		$data = array();
		$profile_sql = "UPDATE `df_profile` SET `pro_address`=:pro_address, `pro_country`=:pro_country, `pro_city`=:pro_city, `pro_state`=:pro_state, `pro_business_address`=:pro_business_address, `pro_business_name`=:pro_business_name, `pro_typeof_productservice`=:pro_typeof_productservice, `pro_grading`=:pro_grading, `pro_profile_category`=:pro_profile_category, `pro_bizdesc_short`=:pro_bizdesc_short, `pro_bizdesc_long`=:pro_bizdesc_long, `pro_website_url`=:pro_website_url WHERE (`pro_usr_id`=:pro_usr_id);";
		$user_sql = "UPDATE `df_user` SET `usr_first_name`=:usr_first_name, `usr_last_name`=:usr_last_name, `usr_phone`=:usr_phone, `usr_status`='1', `usr_confirm_code`='#', `usr_verified`='1' WHERE (`usr_id`=:usr_id);";
		//4 = save affiliate user point info 
		$sql_affiliate_points_earn = "INSERT INTO `df_affiliate_points_earn` (`rec_user`, `rec_description`, `rec_points`, `rec_from`, `rec_relate_ref_user`) VALUES (:rec_user, :rec_description, :rec_points, :rec_from, :rec_relate_ref_user);";

		//5= update user table points
		$sql_totalpointupdate = "UPDATE `df_user` SET `usr_points`= `usr_points` + :usr_points  WHERE (`usr_id`=:usr_id);";


		$user_search_sql = "SELECT
df_user.usr_id,
df_user.usr_email,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_first_name,
df_user.usr_ref_have,
df_user.usr_ref_id
FROM
df_user
WHERE
df_user.usr_id = :usr_id AND
df_user.usr_confirm_code = :usr_confirm_code AND
df_user.usr_status = 0";
		$user_search_sql_activated = "SELECT
df_user.usr_id,
df_user.usr_email,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_first_name,
df_user.usr_ref_have,
df_user.usr_ref_id
FROM
df_user
WHERE
df_user.usr_id = :usr_id AND
df_user.usr_status = 1";
		try {
			$this->getCon()->beginTransaction();
			$readUserStmt = $this->getCon()->prepare($user_search_sql);
			$readUserStmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			$readUserStmt->bindParam(':usr_confirm_code', $this->getUsr_confirm_code(), PDO::PARAM_STR);
			$readUserStmt->execute();
			$count = $readUserStmt->rowCount();
			while ($row = $readUserStmt->fetch(PDO::FETCH_OBJ)) {
				$usr_ref_have = $row->usr_ref_have;
				$usr_ref_id = $row->usr_ref_id;
			}
			if ($count == 0) {
				echo json_encode(array("msgType" => 2, "msg" => "Failed Activation,Try Again3"));
			} else {
				$creatprofiletbl = $this->getCon()->prepare($profile_sql);
				$creatprofiletbl->bindParam(':pro_usr_id', $this->getUsr_id(), PDO::PARAM_INT);
				$creatprofiletbl->bindParam(':pro_business_name', $this->getPro_business_name(), PDO::PARAM_STR);
				$creatprofiletbl->bindParam(':pro_typeof_productservice', $this->getPro_typeof_productservice(), PDO::PARAM_STR);
				$creatprofiletbl->bindParam(':pro_country', $this->getPro_country(), PDO::PARAM_INT);
				$creatprofiletbl->bindParam(':pro_state', $this->getPro_state(), PDO::PARAM_INT);
				$creatprofiletbl->bindParam(':pro_city', $this->getPro_city(), PDO::PARAM_INT);
				$creatprofiletbl->bindParam(':pro_profile_category', $this->getPro_profile_category(), PDO::PARAM_INT);
				$creatprofiletbl->bindParam(':pro_grading', $this->getPro_grading(), PDO::PARAM_INT);
				$creatprofiletbl->bindParam(':pro_address', $this->getPro_address(), PDO::PARAM_STR);
				$creatprofiletbl->bindParam(':pro_business_address', $this->getPro_business_address(), PDO::PARAM_STR);
				$creatprofiletbl->bindParam(':pro_bizdesc_short', $this->getPro_bizdesc_short(), PDO::PARAM_STR);
				$creatprofiletbl->bindParam(':pro_bizdesc_long', $this->getPro_bizdesc_long(), PDO::PARAM_STR);
				$creatprofiletbl->bindParam(':pro_website_url', $this->getPro_website_url(), PDO::PARAM_STR);
				if ($creatprofiletbl->execute()) {
					$creatuser = $this->getCon()->prepare($user_sql);
					$creatuser->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
					$creatuser->bindParam(':usr_first_name', $this->getUsr_first_name(), PDO::PARAM_STR);
					$creatuser->bindParam(':usr_last_name', $this->getUsr_last_name(), PDO::PARAM_STR);
					$creatuser->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
					if ($creatuser->execute()) {
						if ($usr_ref_have == 0) {
							$this->getCon()->commit();
							$readActiveUserStmt = $this->getCon()->prepare($user_search_sql_activated);
							$readActiveUserStmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
							$readActiveUserStmt->execute();
							while ($row = $readActiveUserStmt->fetch(PDO::FETCH_OBJ)) {
								$_SESSION['usr_id'] = $row->usr_id;
								$_SESSION['usr_first_name'] = $row->usr_first_name;
								$_SESSION['usr_username'] = $row->usr_username;
								$_SESSION['usr_email'] = $row->usr_email;
								$_SESSION['usr_cat_id'] = $row->usr_cat_id;
								$this->setFlag(true);
							}
							if ($this->getFlag()) {
								echo json_encode(array("msgType" => 1, "msg" => "Your account successfully activated."));
							} else {
								echo json_encode(array("msgType" => 2, "msg" => "Successfully activated your Account.Now you can access your account"));
							}
						} else {
							//FIND OTHER USERS POINT RELATED TO THIS USER
							//GET POINTS LOOP BY REFERENCE USER LEVEL
							$points_loop_level = $this->getRefAffiliateUserLevelByID($usr_ref_id);
							$loop_point_save_flag = false;
							$temp_ref_user_points = 0;
							$userid = 0;
							$level = 0;
							$total_update_point;
							$total_update_user;
							$array_total_update = array();
							for ($x = 1; $x <= $points_loop_level; $x++) {
								//SAVE ALL USER POINTS BY REFERENCE USER
								//CAL POINTS OF EACH BY LOOP
								$reference_user_commition = 2;
								$rec_description = "Reference User Registration Received Points";
								if ($x == 1) {
									//USER GIVEN REFERENCE USER POINT SAVE
									$ref_user_earned_points = $credit;
									$temp_ref_user_points = $ref_user_earned_points;
									$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
									$createUserPoints->bindParam(':rec_user', $usr_ref_id, PDO::PARAM_INT);
									$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
									$createUserPoints->bindParam(':rec_points', $ref_user_earned_points, PDO::PARAM_INT);
									$createUserPoints->bindParam(':rec_from', $reference_user_commition, PDO::PARAM_INT);
									$createUserPoints->bindParam(':rec_relate_ref_user', $this->getUsr_id(), PDO::PARAM_INT);
									$loop_point_save_flag = $createUserPoints->execute();
									//GATHER TOTAL UPDATE USER INFO
									$total_update_point = $ref_user_earned_points;
									$total_update_user = $usr_ref_id;
									$array_total_update[] = array("user" => $total_update_user, "point" => $total_update_point);
								} else {
									//OTHER USERS REFERENCE USER POINT SAVE
									//FIND NEXT REF USER ID										
									if ($x == 2) {
										$level = $points_loop_level;
										$userid = $this->getBelowAffiliateUserID($usr_ref_id, $level);
									} else {
										$level = $level - 1;
										$userid = $this->getBelowAffiliateUserID($userid, $level);
									}
									//FIND CURRENT EARNED POINT
									$ref_user_earned_points = $credit;
									$temp_ref_user_points = $ref_user_earned_points;
									$earned_points = $ref_user_earned_points;

									//SAVE EACH USER POINTS
									$createUserPoints = $this->getCon()->prepare($sql_affiliate_points_earn);
									$createUserPoints->bindParam(':rec_user', $userid, PDO::PARAM_INT);
									$createUserPoints->bindParam(':rec_description', $rec_description, PDO::PARAM_STR);
									$createUserPoints->bindParam(':rec_points', $earned_points, PDO::PARAM_STR);
									$createUserPoints->bindParam(':rec_from', $reference_user_commition, PDO::PARAM_INT);
									$createUserPoints->bindParam(':rec_relate_ref_user', $this->getUsr_id(), PDO::PARAM_INT);
									$loop_point_save_flag = $createUserPoints->execute();
									//GATHER TOTAL UPDATE USER INFO
									$total_update_point = $earned_points;
									$total_update_user = $userid;
									$array_total_update[] = array("user" => $total_update_user, "point" => $total_update_point);
								}
							}
							//STAGE 4.1 - SAVE EARN POINTS
							if ($loop_point_save_flag) {
								$total_update_flag = false;
								foreach ($array_total_update as $key => $totalupdatevalue) {
									$createUpdateTotalPoint = $this->getCon()->prepare($sql_totalpointupdate);
									$createUpdateTotalPoint->bindParam(':usr_points', $totalupdatevalue['point'], PDO::PARAM_STR);
									$createUpdateTotalPoint->bindParam(':usr_id', $totalupdatevalue['user'], PDO::PARAM_INT);
									$total_update_flag = $createUpdateTotalPoint->execute();
								}
								//STAGE 5 - UPDATE TOTAL POINTS OF USER
								if ($total_update_flag) {
									$signup_process_flag = true;
								} else {
									$this->getCon()->rollBack();
//										echo "can't update total points - 5 stage";
								}
							} else {
								//STAGE 4,1 - SAVE EARN POINTS LOOP
								$this->getCon()->rollBack();
//									echo "can't save points loop - 4 stage";
							}

							if ($signup_process_flag) {
								$this->getCon()->commit();
								$readActiveUserStmt = $this->getCon()->prepare($user_search_sql_activated);
								$readActiveUserStmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
								$readActiveUserStmt->execute();
								while ($row = $readActiveUserStmt->fetch(PDO::FETCH_OBJ)) {
									$_SESSION['usr_id'] = $row->usr_id;
									$_SESSION['usr_first_name'] = $row->usr_first_name;
									$_SESSION['usr_username'] = $row->usr_username;
									$_SESSION['usr_email'] = $row->usr_email;
									$_SESSION['usr_cat_id'] = $row->usr_cat_id;
									$this->setFlag(true);
								}
								if ($this->getFlag()) {
									echo json_encode(array("msgType" => 1, "msg" => "Your account successfully activated."));
								} else {
									echo json_encode(array("msgType" => 2, "msg" => "Successfully activated your Account.Now you can access your account"));
								}
							} else {
								echo json_encode(array("msgType" => 3, "msg" => "Failed Activation,Please Contact Us.."));
							}
						}
					}
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 3, "msg" => "Failed Activation,Please Contact Us.."));
				}
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 3, "msg" => $exc->getLine()));
		}
	}

	public function autopassowrdreset() {
		$count = 0;
		$sql = "SELECT
df_user.usr_id,
df_user.usr_pass,
df_user.usr_first_name,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_create_date,
df_user.usr_create_time
FROM
df_user
WHERE
df_user.usr_email = :usr_email";
		$passResetSql = "UPDATE `df_user` SET `usr_confirm_code`= :usr_autoresetpass, `usr_pass` = :usr_pass WHERE (`usr_id`= :usr_id);";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(":usr_email", $this->getUsr_email(), PDO::PARAM_STR);
			$readstmt->execute();
			$count = $readstmt->rowCount();
			if ($count == 0) {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry user not available.Please recheck your email address"));
			} else {
				while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
					$to = $row->usr_email;
					$pass = "reset" . $row->usr_id . "dot" . mt_rand(1000, 9999);
					$this->setUsr_pass($pass);
					$this->getCon()->beginTransaction();
					$resetStmt = $this->getCon()->prepare($passResetSql);
					$resetStmt->bindParam(":usr_id", $row->usr_id, PDO::PARAM_INT);
					$resetStmt->bindParam(":usr_autoresetpass", $pass, PDO::PARAM_STR);
					$resetStmt->bindParam(":usr_pass", $this->getUsr_pass(), PDO::PARAM_STR);
					if ($resetStmt->execute()) {
						//SENDGRID						
						$message = '<div style="background-color: #f7f7f7;width: 95%;border-radius: 0.75rem;border: 1px solid #ebf0f5;color: #000000;padding-bottom: 35px;box-shadow: 0.1rem 0.2rem #e4e4e4">';
						$message .= '<h2 style="background-color: #4285f405;color: #1d1d1d;padding: 15px 10px;text-align: center;margin: 0.3rem;font-size: 1.4rem;border: 0 solid">Reset Your Dubboe Account Password</h2><br>';
						$message .= '<p style="font-size: 0.9rem;color: #212223;padding-left: 5%!important">Hi..,<br>Click this link to reset your password of  Dubboe my account <br><a style="color: #0f75fb" href="http://dubboe.com/resetpass.php?usr_id=' . $row->usr_id . '&usr_autoresetpass=' . $pass . '">Reset Password Now</a>.</p>';
						$message .= '</div>';
						$sys_sendgrid_apikey = $this->getSendGridAPIKEY();
						$email = new \SendGrid\Mail\Mail();
						$email->setFrom("info@dubboe.com", "dubboe.com");
						$email->setSubject("Reset Dubboe Account Password");
						$email->addTo($to);
						$email->addContent(
								"text/html", $message
						);
						$sendgrid = new \SendGrid($sys_sendgrid_apikey);
						try {
							$response = $sendgrid->send($email);
							if ($response->statusCode() == 202) {
								$this->getCon()->commit();
								echo json_encode(array("msgType" => 1, "msg" => "An email has been sent to the address you registered with the dubboe account. Please follow the instructions in the email(​" . $to . ") to reset your account.", "usr_id" => $row->usr_id, "pass" => pass));
							} else {
								$this->getCon()->rollBack();
								echo json_encode(array("msgType" => 2, "msg" => "Sorry! Password reset failed.Please contact us direct via website customer support"));
							}
						} catch (Exception $e) {
							$this->getCon()->rollBack();
							echo json_encode(array("msgType" => 2, "msg" => "Sorry! Password reset failed.Please contact us direct via website customer support"));
						}
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! Password reset failed.Please contact us direct via website customer support"));
					}
				}
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//NEED
	public function facebookLogin() {
		try {
			$readstmt = $this->con->prepare("SELECT
df_user.usr_id,
df_user.usr_first_name,
df_user.usr_cat_id,
df_user.usr_username
FROM
df_user
WHERE
df_user.usr_status = 1 AND
df_user.usr_email = :usr_email");
			$readstmt->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				if ($this->getUsr_pass() == $row->usr_pass) {
					$_SESSION['usr_id'] = $row->usr_id;
					$_SESSION['usr_first_name'] = $row->usr_first_name;
					$_SESSION['usr_username'] = $row->usr_username;
					$_SESSION['usr_cat_id'] = $row->usr_cat_id;
					$this->setUsr_cat_id($row->usr_cat_id);
					$this->setFlag(true);
				}
			}
			if ($this->getFlag()) {
				echo json_encode(array("msgType" => 1, "msg" => "Welcome, Login Successfull!", "usr_cat_id" => $this->getUsr_cat_id()));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Inavalid login ! Please check your username/password"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function login() {
		try {
			$readstmt = $this->con->prepare("SELECT
df_user.usr_id,
df_user.usr_pass,
df_user.usr_first_name,
df_user.usr_username,
df_user.usr_cat_id
FROM
df_user
WHERE
(df_user.usr_username = :usr_username)");
			$readstmt->bindParam(':usr_username', $this->getUsr_username(), PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				if ($this->getUsr_pass() == $row->usr_pass) {
					$_SESSION['usr_id'] = $row->usr_id;
					$_SESSION['usr_first_name'] = $row->usr_first_name;
					$_SESSION['usr_username'] = $row->usr_username;
					$_SESSION['usr_cat_id'] = $row->usr_cat_id;
					$this->setUsr_cat_id($row->usr_cat_id);
					$this->setFlag(true);
				}
			}
			if ($this->getFlag()) {
				echo json_encode(array("msgType" => 1, "msg" => "Welcome, Login Successfull!", "usr_cat_id" => $this->getUsr_cat_id()));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Inavalid login ! Please check your username/password"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

//END NEED


	public function resetPassword() {
		$sql = "UPDATE `df_user` SET `usr_pass`= :usr_pass, `usr_confirm_code` = '#' WHERE (`usr_id`=:usr_id AND `usr_confirm_code` = :usr_autoresetpass);";
		try {
			$this->getCon()->beginTransaction();
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':usr_autoresetpass', $this->getUsr_confirm_code(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
			$createstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				try {
					$readstmt = $this->con->prepare("SELECT
df_user.usr_id,
df_user.usr_pass,
df_user.usr_first_name,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username
FROM
df_user
WHERE
df_user.usr_status = 1 AND df_user.usr_id = :usr_id");
					$readstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
					$readstmt->execute();
					while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
						$_SESSION['usr_id'] = $row->usr_id;
						$_SESSION['usr_first_name'] = $row->usr_first_name;
						$_SESSION['usr_username'] = $row->usr_username;
						$_SESSION['usr_cat_id'] = $row->usr_cat_id;
						$usr_cat_id = $row->usr_cat_id;
						$this->setFlag(true);
					}
					if ($this->getFlag()) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 1, "msg" => "Password successfully recovered", "usr_cat_id" => $usr_cat_id));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry, Password couldn't recover"));
					}
				} catch (Exception $exc) {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
				}
			} else {
				$this->getCon()->rollBack();
				echo json_encode(array("msgType" => 2, "msg" => "Sorry, Password recovery process failed."));
			}
		} catch (Exception $exc) {
			$this->getCon()->rollBack();
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function autosignin() {
		try {
			$readstmt = $this->con->prepare("SELECT
df_user.usr_id,
df_user.usr_pass,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_first_name,
df_user.usr_create_date,
df_user.usr_create_time
FROM
df_user
WHERE
df_user.usr_status = 1 AND df_user.usr_id = :usr_id");
			$readstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$_SESSION['usr_id'] = $row->usr_id;
				$_SESSION['usr_first_name'] = $row->usr_first_name;
				$_SESSION['usr_username'] = $row->usr_username;
				$_SESSION['usr_cat_id'] = $row->usr_cat_id;
				$this->setFlag(true);
			}
			if ($this->getFlag()) {
				echo "1";
			} else {
				echo "0";
			}
		} catch (Exception $exc) {
			echo "0";
		}
	}

	public function checkUserActivation() {
		try {
			$readstmt = $this->con->prepare("SELECT
df_user.usr_id,
df_user.usr_pass,
df_user.usr_email,
df_user.usr_phone,
df_user.usr_status,
df_user.usr_cat_id,
df_user.usr_username,
df_user.usr_first_name,
df_user.usr_create_date,
df_user.usr_create_time
FROM
df_user
WHERE df_user.usr_id = :usr_id");
			$readstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
			$readstmt->execute();
			$count = $readstmt->rowCount();
			if ($count) {
				while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
					if ($row->usr_status == 1) {
						echo json_encode(array("activeStatus" => 1, "usr_email" => $row->usr_email));
					} else if ($row->usr_status == 0) {
						echo json_encode(array("activeStatus" => 0, "usr_email" => $row->usr_email));
					}
				}
			} else {
				echo json_encode(array("activeStatus" => 99));
			}
		} catch (Exception $exc) {
			echo json_encode(array("activeStatus" => 99));
		}
	}

	public function phoneVerifiedChecker() {
		try {
			$sql = "SELECT
df_user.usr_phone,
df_user.usr_phone_verified
FROM
df_user
WHERE
df_user.usr_id = :usr_id";
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$usr_phone = $row->usr_phone;
				$usr_phone_verified = $row->usr_phone_verified;
			}
			echo json_encode(array("usr_phone_verified" => $usr_phone_verified, "usr_phone" => $usr_phone));
		} catch (Exception $exc) {
			echo $exc->getMessage();
		}
	}

	public function viewUserProfileVerifyID() {
		$directory = "../../asset_imageuploader/IDVerify/" . $_SESSION['usr_id'] . "/";
		$files = scandir($directory);
		$files = array_diff($files, ['.', '..', 'thumbnail']);
		$files = array_values(array_filter($files));
		if ($files[0] == NULL) {
			echo "#";
		} else {
			echo $files[0];			
		}
	}

	public function phoneVerificationCodeSend() {
		try {
			$usr_phone = $this->getUsr_phone();
			$usr_confirm_code = mt_rand(1000, 9999); //phone
			$sid = 'xxxx';
			$token = 'xx';
			$client = new Client($sid, $token);
			$twilio_number = "+xxxxxxxx";
			$response = $client->messages->create("'" . $usr_phone . "'", array('from' => $twilio_number, 'body' => 'tsxxxads.com.com - your phone verification code is ' . $usr_confirm_code));
//print_r($response);
			if ($response) {
				echo json_encode(array("msgType" => 1, "msg" => "Your Activation code Sent to " . $usr_phone . ".Please enter your verification code for verify phone number", "usr_confirm_code" => $usr_confirm_code));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Your Activation code sending failed.Please check your phone number and try again"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => "Your Activation code sending failed.Please check your phone number and try again"));
		}
	}

	public function verifyPhoneCode() {
		$sql = "UPDATE `df_user` SET `usr_phone`= :usr_phone, `usr_phone_verified`='1' WHERE (`usr_id`=:usr_id);";
		try {
			$creatstmt = $this->getCon()->prepare($sql);
			$creatstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$creatstmt->bindParam(':usr_phone', $this->getUsr_phone(), PDO::PARAM_STR);
			if ($creatstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Verified"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Verification Process Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
