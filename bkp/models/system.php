<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';
require '../../API/sendgrid/vendor/autoload.php';

/**
 * @author Ruwan Jayawardena
 */
class System extends ConnectDB {

	const TBL_SETTING = 'df_setting';

	private $flag = false;
	private $sys_logo_type;
	private $sys_id;
	private $sys_name;
	private $sys_address;
	private $sys_map_embed;
	private $sys_lat;
	private $sys_long;
	private $sys_fb_link;
	private $sys_twitter_link;
	private $sys_youtube_link;
	private $sys_google_plus_link;
	private $sys_instagram_link;
	private $sys_paypal_business_email;
	private $sys_email;
	private $sys_slider_text1;
	private $sys_slider_text2;
	private $sys_mobile;
	private $sys_paypal_form_url;
	private $sys_paypal_cancel_url;
	private $sys_paypal_return_url;
	private $sys_paypal_notify_url;
	private $sys_currency_code;
	private $sys_paypal_app_username;
	private $sys_paypal_app_id;
	private $sys_paypal_signature;
	private $sys_paypal_app_password;
	private $sys_twilio_account_sid;
	private $sys_twilio_api_key;
	private $sys_twilio_api_secret;
	private $sys_twilio_service_sid;
	private $sys_stripe_api_key;
	private $sys_welcome_msg;
	private $sys_account_executive_com_rate;
	private $sys_sendgrid_apikey;

	public function getSys_sendgrid_apikey() {
		return $this->sys_sendgrid_apikey;
	}

	public function setSys_sendgrid_apikey($sys_sendgrid_apikey) {
		$this->sys_sendgrid_apikey = $sys_sendgrid_apikey;
		return $this;
	}

	public function getSys_account_executive_com_rate() {
		return $this->sys_account_executive_com_rate;
	}

	public function setSys_account_executive_com_rate($sys_account_executive_com_rate) {
		$this->sys_account_executive_com_rate = $sys_account_executive_com_rate;
		return $this;
	}

	public function getSys_logo_type() {
		return $this->sys_logo_type;
	}

	public function setSys_logo_type($sys_logo_type) {
		$this->sys_logo_type = $sys_logo_type;
		return $this;
	}

	public function getFlag() {
		return $this->flag;
	}

	public function getSys_id() {
		return $this->sys_id;
	}

	public function getSys_name() {
		return $this->sys_name;
	}

	public function getSys_address() {
		return $this->sys_address;
	}

	public function getSys_map_embed() {
		return $this->sys_map_embed;
	}

	public function getSys_lat() {
		return $this->sys_lat;
	}

	public function getSys_long() {
		return $this->sys_long;
	}

	public function getSys_fb_link() {
		return $this->sys_fb_link;
	}

	public function getSys_twitter_link() {
		return $this->sys_twitter_link;
	}

	public function getSys_youtube_link() {
		return $this->sys_youtube_link;
	}

	public function getSys_google_plus_link() {
		return $this->sys_google_plus_link;
	}

	public function getSys_instagram_link() {
		return $this->sys_instagram_link;
	}

	public function getSys_paypal_business_email() {
		return $this->sys_paypal_business_email;
	}

	public function getSys_email() {
		return $this->sys_email;
	}

	public function getSys_slider_text1() {
		return $this->sys_slider_text1;
	}

	public function getSys_slider_text2() {
		return $this->sys_slider_text2;
	}

	public function getSys_mobile() {
		return $this->sys_mobile;
	}

	public function getSys_paypal_form_url() {
		return $this->sys_paypal_form_url;
	}

	public function getSys_paypal_cancel_url() {
		return $this->sys_paypal_cancel_url;
	}

	public function getSys_paypal_return_url() {
		return $this->sys_paypal_return_url;
	}

	public function getSys_paypal_notify_url() {
		return $this->sys_paypal_notify_url;
	}

	public function getSys_currency_code() {
		return $this->sys_currency_code;
	}

	public function getSys_paypal_app_username() {
		return $this->sys_paypal_app_username;
	}

	public function getSys_paypal_app_id() {
		return $this->sys_paypal_app_id;
	}

	public function getSys_paypal_signature() {
		return $this->sys_paypal_signature;
	}

	public function getSys_paypal_app_password() {
		return $this->sys_paypal_app_password;
	}

	public function getSys_twilio_account_sid() {
		return $this->sys_twilio_account_sid;
	}

	public function getSys_twilio_api_key() {
		return $this->sys_twilio_api_key;
	}

	public function getSys_twilio_api_secret() {
		return $this->sys_twilio_api_secret;
	}

	public function getSys_twilio_service_sid() {
		return $this->sys_twilio_service_sid;
	}

	public function getSys_stripe_api_key() {
		return $this->sys_stripe_api_key;
	}

	public function getSys_welcome_msg() {
		return $this->sys_welcome_msg;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	public function setSys_id($sys_id) {
		$this->sys_id = $sys_id;
		return $this;
	}

	public function setSys_name($sys_name) {
		$this->sys_name = $sys_name;
		return $this;
	}

	public function setSys_address($sys_address) {
		$this->sys_address = $sys_address;
		return $this;
	}

	public function setSys_map_embed($sys_map_embed) {
		$this->sys_map_embed = $sys_map_embed;
		return $this;
	}

	public function setSys_lat($sys_lat) {
		$this->sys_lat = $sys_lat;
		return $this;
	}

	public function setSys_long($sys_long) {
		$this->sys_long = $sys_long;
		return $this;
	}

	public function setSys_fb_link($sys_fb_link) {
		$this->sys_fb_link = $sys_fb_link;
		return $this;
	}

	public function setSys_twitter_link($sys_twitter_link) {
		$this->sys_twitter_link = $sys_twitter_link;
		return $this;
	}

	public function setSys_youtube_link($sys_youtube_link) {
		$this->sys_youtube_link = $sys_youtube_link;
		return $this;
	}

	public function setSys_google_plus_link($sys_google_plus_link) {
		$this->sys_google_plus_link = $sys_google_plus_link;
		return $this;
	}

	public function setSys_instagram_link($sys_instagram_link) {
		$this->sys_instagram_link = $sys_instagram_link;
		return $this;
	}

	public function setSys_paypal_business_email($sys_paypal_business_email) {
		$this->sys_paypal_business_email = $sys_paypal_business_email;
		return $this;
	}

	public function setSys_email($sys_email) {
		$this->sys_email = $sys_email;
		return $this;
	}

	public function setSys_slider_text1($sys_slider_text1) {
		$this->sys_slider_text1 = $sys_slider_text1;
		return $this;
	}

	public function setSys_slider_text2($sys_slider_text2) {
		$this->sys_slider_text2 = $sys_slider_text2;
		return $this;
	}

	public function setSys_mobile($sys_mobile) {
		$this->sys_mobile = $sys_mobile;
		return $this;
	}

	public function setSys_paypal_form_url($sys_paypal_form_url) {
		$this->sys_paypal_form_url = $sys_paypal_form_url;
		return $this;
	}

	public function setSys_paypal_cancel_url($sys_paypal_cancel_url) {
		$this->sys_paypal_cancel_url = $sys_paypal_cancel_url;
		return $this;
	}

	public function setSys_paypal_return_url($sys_paypal_return_url) {
		$this->sys_paypal_return_url = $sys_paypal_return_url;
		return $this;
	}

	public function setSys_paypal_notify_url($sys_paypal_notify_url) {
		$this->sys_paypal_notify_url = $sys_paypal_notify_url;
		return $this;
	}

	public function setSys_currency_code($sys_currency_code) {
		$this->sys_currency_code = $sys_currency_code;
		return $this;
	}

	public function setSys_paypal_app_username($sys_paypal_app_username) {
		$this->sys_paypal_app_username = $sys_paypal_app_username;
		return $this;
	}

	public function setSys_paypal_app_id($sys_paypal_app_id) {
		$this->sys_paypal_app_id = $sys_paypal_app_id;
		return $this;
	}

	public function setSys_paypal_signature($sys_paypal_signature) {
		$this->sys_paypal_signature = $sys_paypal_signature;
		return $this;
	}

	public function setSys_paypal_app_password($sys_paypal_app_password) {
		$this->sys_paypal_app_password = $sys_paypal_app_password;
		return $this;
	}

	public function setSys_twilio_account_sid($sys_twilio_account_sid) {
		$this->sys_twilio_account_sid = $sys_twilio_account_sid;
		return $this;
	}

	public function setSys_twilio_api_key($sys_twilio_api_key) {
		$this->sys_twilio_api_key = $sys_twilio_api_key;
		return $this;
	}

	public function setSys_twilio_api_secret($sys_twilio_api_secret) {
		$this->sys_twilio_api_secret = $sys_twilio_api_secret;
		return $this;
	}

	public function setSys_twilio_service_sid($sys_twilio_service_sid) {
		$this->sys_twilio_service_sid = $sys_twilio_service_sid;
		return $this;
	}

	public function setSys_stripe_api_key($sys_stripe_api_key) {
		$this->sys_stripe_api_key = $sys_stripe_api_key;
		return $this;
	}

	public function setSys_welcome_msg($sys_welcome_msg) {
		$this->sys_welcome_msg = $sys_welcome_msg;
		return $this;
	}

	public function getAllSystemInfo() {
		$data = array();
		$sql = "SELECT *
FROM
df_setting
WHERE
df_setting.sys_id = 1";
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
	
	public function getSystemContactEmail() {		
		$sql = "SELECT
df_setting.sys_email
FROM
df_setting";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$sys_email = $row->sys_email;
			}
			$this->setSys_email($sys_email);		
		} catch (Exception $exc) {
			echo $exc->getMessage();
		}
	}
	

	public function updateFrontEndPage() {
		$sql = "UPDATE `df_setting` SET `sys_name`=:sys_name, `sys_address`=:sys_address, `sys_map_embed`=:sys_map_embed, `sys_fb_link`=:sys_fb_link, `sys_twitter_link`=:sys_twitter_link, `sys_youtube_link`=:sys_youtube_link, `sys_google_plus_link`=:sys_google_plus_link, `sys_instagram_link`=:sys_instagram_link, `sys_email`=:sys_email, `sys_slider_text1`=:sys_slider_text1, `sys_slider_text2`=:sys_slider_text2,`sys_mobile`=:sys_mobile, `sys_welcome_msg` = :sys_welcome_msg, `sys_logo_type` = :sys_logo_type WHERE (`sys_id` = 1);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sys_name', $this->getSys_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_address', $this->getSys_address(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_map_embed', $this->getSys_map_embed(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_fb_link', $this->getSys_fb_link(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_twitter_link', $this->getSys_twitter_link(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_youtube_link', $this->getSys_youtube_link(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_google_plus_link', $this->getSys_google_plus_link(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_instagram_link', $this->getSys_instagram_link(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_email', $this->getSys_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_slider_text1', $this->getSys_slider_text1(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_slider_text2', $this->getSys_slider_text2(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_mobile', $this->getSys_mobile(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_welcome_msg', $this->getSys_welcome_msg(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_logo_type', $this->getSys_logo_type(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry update failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function updateFrontEndPageCommissionRate() {
		$sql = "UPDATE `df_setting` SET `sys_account_executive_com_rate`=:sys_account_executive_com_rate WHERE (`sys_id` = 1);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sys_account_executive_com_rate', $this->getSys_account_executive_com_rate(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Done"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Upgrade Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function updateSendGridAPIKEY($sys_sendgrid_apikey) {
		$sql = "UPDATE `df_setting` SET `sys_sendgrid_apikey`=:sys_sendgrid_apikey WHERE (`sys_id` = 1);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sys_sendgrid_apikey', $sys_sendgrid_apikey, PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully Done"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! Upgrade Failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function sendContactUsPageEmail($em_name, $em_email, $em_msg) {
		$this->getSystemContactEmail();
		$to = $this->getSys_email();
		$message = '<div style="background-color:#212120;width:90%;border-radius:6px;color:white;padding-bottom:35px;">';
		$message .= '<h2 style="background-color:#ffdf30;color:#232220;padding:15px 10px;text-align:center;margin:0;font-size:1.4rem;">Contact Us Page Request</h2><br>';
		$message .= '<p style="font-size:0.9rem;color:#cac9c5;padding:5px 30px;"><strong>Requester Name: </strong>' . $em_name.' <strong>Contact Email: </strong>' . $em_email.'<br><strong>Message: </strong>' . $em_msg.'</p>';
		$message .= '</div>';
		$sys_sendgrid_apikey = $this->getSendGridAPIKEY();
		$email = new \SendGrid\Mail\Mail();
		$email->setFrom("info@dubboe.com", "dubboe.com");
		$email->setSubject("Dubboe.com Contact Us Request");
		$email->addTo($to);
		$email->addContent(
				"text/html", $message
		);
		$sendgrid = new \SendGrid($sys_sendgrid_apikey);
		try {
			$response = $sendgrid->send($email);
			if ($response->statusCode() == 202) {
				echo json_encode(array("msgType" => 1, "msg" => "Your request successfully received to us.Our Agent will respond to your request shortly via email..."));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Email sending failed at this moment.Please contact us later..."));
			}
		} catch (Exception $e) {
			echo json_encode(array("msgType" => 2, "msg" => "Email sending failed at this moment.Please contact us later..."));
		}
	}

	public function updatePaymentPage() {
		$sql = "UPDATE `df_setting` SET `sys_paypal_business_email`=:sys_paypal_business_email, `sys_paypal_app_username` =:sys_paypal_app_username, `sys_paypal_app_id`=:sys_paypal_app_id, `sys_paypal_signature`=:sys_paypal_signature, `sys_paypal_app_password`=:sys_paypal_app_password, `sys_stripe_api_key`=:sys_stripe_api_key  WHERE (`sys_id` = 1);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sys_paypal_business_email', $this->getSys_paypal_business_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_paypal_app_username', $this->getSys_paypal_app_username(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_paypal_app_id', $this->getSys_paypal_app_id(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_paypal_signature', $this->getSys_paypal_signature(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_paypal_app_password', $this->getSys_paypal_app_password(), PDO::PARAM_STR);
			$createstmt->bindParam(':sys_stripe_api_key', $this->getSys_stripe_api_key(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry update failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

}
