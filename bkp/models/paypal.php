<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';
require '../../API/Checkout-PHP-SDK-develop/vendor/autoload.php';
//payout
require '../../API/Payouts-PHP-SDK-master/vendor/autoload.php';

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
//payout
use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;
use PaypalPayoutsSDK\Payouts\PayoutsGetRequest;

class Paypal extends ConnectDB {

	private $environment;
	private $client;
	private $clientId;
	private $clientSecret;
//Membership token
	private $tok_id;
	private $tok_token_id;
	private $tok_payer_id;
	private $tok_usr_id;
	private $tok_plan_type;
	private $tok_info_annual_disc_rate;
	private $tok_info_subcription_disc_rate;
	private $tok_info_renew_days;
	private $tok_info_membership_amt;
	private $tok_status;
	private $tok_created_date;
	private $tok_created_time;
//event table
	private $evtem_id;

	public function getEvtem_id() {
		return $this->evtem_id;
	}

	public function setEvtem_id($evtem_id) {
		$this->evtem_id = $evtem_id;
		return $this;
	}

	public function getTok_payer_id() {
		return $this->tok_payer_id;
	}

	public function setTok_payer_id($tok_payer_id) {
		$this->tok_payer_id = $tok_payer_id;
		return $this;
	}

	public function getTok_id() {
		return $this->tok_id;
	}

	public function getTok_token_id() {
		return $this->tok_token_id;
	}

	public function getTok_usr_id() {
		return $this->tok_usr_id;
	}

	public function getTok_plan_type() {
		return $this->tok_plan_type;
	}

	public function getTok_info_annual_disc_rate() {
		return $this->tok_info_annual_disc_rate;
	}

	public function getTok_info_subcription_disc_rate() {
		return $this->tok_info_subcription_disc_rate;
	}

	public function getTok_info_renew_days() {
		return $this->tok_info_renew_days;
	}

	public function getTok_info_membership_amt() {
		return $this->tok_info_membership_amt;
	}

	public function getTok_status() {
		return $this->tok_status;
	}

	public function getTok_created_date() {
		return $this->tok_created_date;
	}

	public function getTok_created_time() {
		return $this->tok_created_time;
	}

	public function setTok_id($tok_id) {
		$this->tok_id = $tok_id;
		return $this;
	}

	public function setTok_token_id($tok_token_id) {
		$this->tok_token_id = $tok_token_id;
		return $this;
	}

	public function setTok_usr_id($tok_usr_id) {
		$this->tok_usr_id = $tok_usr_id;
		return $this;
	}

	public function setTok_plan_type($tok_plan_type) {
		$this->tok_plan_type = $tok_plan_type;
		return $this;
	}

	public function setTok_info_annual_disc_rate($tok_info_annual_disc_rate) {
		$this->tok_info_annual_disc_rate = $tok_info_annual_disc_rate;
		return $this;
	}

	public function setTok_info_subcription_disc_rate($tok_info_subcription_disc_rate) {
		$this->tok_info_subcription_disc_rate = $tok_info_subcription_disc_rate;
		return $this;
	}

	public function setTok_info_renew_days($tok_info_renew_days) {
		$this->tok_info_renew_days = $tok_info_renew_days;
		return $this;
	}

	public function setTok_info_membership_amt($tok_info_membership_amt) {
		$this->tok_info_membership_amt = $tok_info_membership_amt;
		return $this;
	}

	public function setTok_status($tok_status) {
		$this->tok_status = $tok_status;
		return $this;
	}

	public function setTok_created_date($tok_created_date) {
		$this->tok_created_date = $tok_created_date;
		return $this;
	}

	public function setTok_created_time($tok_created_time) {
		$this->tok_created_time = $tok_created_time;
		return $this;
	}

	public function getClient() {
		$this->getPayPalAccountCredentials();
		$this->environment = new SandboxEnvironment($this->getClientId(), $this->getClientSecret());
		$this->client = new PayPalHttpClient($this->environment);
		return $this->client;
	}

	public function getPayPalAccountCredentials() {
		$sql = "SELECT
df_setting.sys_paypal_signature AS client_id,
df_setting.sys_paypal_app_username AS business_email,
df_setting.sys_paypal_app_password AS secret_id
FROM
df_setting";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$this->setClientId($row->client_id);
				$this->setClientSecret($row->secret_id);
			}
		} catch (Exception $exc) {
			return $exc->getMessage();
		}
	}

	public function setClientId($clientId) {
		$this->clientId = $clientId;
		return $this;
	}

	public function getClientId() {
//		$this->clientId = "xx";		
		return $this->clientId;
	}

	public function setClientSecret($clientSecret) {
		$this->clientSecret = $clientSecret;
		return $this;
	}

	public function getClientSecret() {
//		$this->clientSecret = "xx";
		return $this->clientSecret;
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

	public function getEventItemUnitPriceByID($evtem_id) {
		$evtem_price = 0;
		$sql = "SELECT
ub_event_items.evtem_price
FROM
ub_event_items
WHERE
ub_event_items.evtem_id = :evtem_id
ORDER BY
ub_event_items.evtem_id DESC";
		try {
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->bindParam(':evtem_id', $evtem_id, PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$evtem_price = $row->evtem_price;
			}
			return $evtem_price;
		} catch (Exception $exc) {
			return $evtem_price;
		}
	}

	public function initialcheckoutEventItems($shopping_cart) {
		$order_process = false;
		$totalCost = 0;
		$or_id = $this->getNextAutoIncrementID('ub_eventorder');
		$sqlorder = "INSERT INTO `ub_eventorder` (`or_usr_id`, `or_totalamt`, `or_created_date`, `or_created_time`) VALUES (:or_usr_id, :or_totalamt, :or_created_date, :or_created_time);";
		$sqlorderitems = "INSERT INTO `ub_eventorder_item` (`oritm_order`, `oritm_item`, `oritm_qty`,`oritm_qty_unit_price`) VALUES (:oritm_order, :oritm_item, :oritm_qty,:oritm_qty_unit_price);";
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
			$this->getCon()->beginTransaction();
			$readstmt = $this->getCon()->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				foreach ($shopping_cart as $key_cart => $value_cart) {
					if ($row->evtem_id == $value_cart['eventItem']) {
						$ItemQtyTotal = $row->evtem_price * $value_cart['Qty'];
						$totalCost += $ItemQtyTotal;
					}
				}
			}
			$createorderstmt = $this->getCon()->prepare($sqlorder);
			$createorderstmt->bindParam(':or_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$createorderstmt->bindParam(':or_totalamt', $totalCost, PDO::PARAM_STR);
			$createorderstmt->bindParam(':or_created_date', date("Y-m-d"), PDO::PARAM_STR);
			$createorderstmt->bindParam(':or_created_time', date("H:i:s"), PDO::PARAM_STR);
			if ($createorderstmt->execute()) {
				$oritem_flag = false;
				foreach ($shopping_cart as $key_cart => $value_cart) {
					$createorderitmstmt = $this->getCon()->prepare($sqlorderitems);
					$createorderitmstmt->bindParam(':oritm_order', $or_id, PDO::PARAM_INT);
					$createorderitmstmt->bindParam(':oritm_item', $value_cart['eventItem'], PDO::PARAM_INT);
					$createorderitmstmt->bindParam(':oritm_qty', $value_cart['Qty'], PDO::PARAM_INT);
					$createorderitmstmt->bindParam(':oritm_qty_unit_price', $value_cart['unitPrice'], PDO::PARAM_STR);
					$oritem_flag = $createorderitmstmt->execute();
				}
				if ($oritem_flag) {
					$this->getCon()->commit();
					$order_process = true;
				} else {
					$this->getCon()->rollBack();
				}
			} else {
				$this->getCon()->rollBack();
			}
			return array("order_process" => $order_process, "or_id" => $or_id, "totalCost" => $totalCost);
		} catch (Exception $exc) {
			return array("order_process" => $order_process);
		}
	}

	public function checkoutEventItems($shopping_cart) {
		$random_value = rand(0, 9999);
		$order_pay_url = "#";
		$cancel_url = "http://localhost/UBOAffiliateWeb/order-history.php";
		$return_url = "http://localhost/UBOAffiliateWeb/order-history.php";
		$request = new OrdersCreateRequest();
		$request->prefer('return=representation');
		$payArray = "";
		$payArrayItems = array();
		$order_process_array = $this->initialcheckoutEventItems($shopping_cart);
		if ($order_process_array['order_process']) {
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
				while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
					foreach ($shopping_cart as $key_cart => $value_cart) {
						if ($row->evtem_id == $value_cart['eventItem']) {
							$ItemQtyTotal = $row->evtem_price * $value_cart['Qty'];
							$totalCost += $ItemQtyTotal;
							$payArrayItems[] = array(
								"name" => $row->evtem_name,
								"description" => $row->evtem_desc,
								"price" => $ItemQtyTotal,
								"unit_amount" => array(
									"currency_code" => "USD",
									"value" => $row->evtem_price
								),
								"quantity" => $value_cart['Qty'],
								"sku" => "ITEM-" . $row->evtem_id
							);
						}
					}
				}

				$payArray = array(
					"intent" => "CAPTURE",
					"application_context" => array(
						"cancel_url" => $cancel_url,
						"return_url" => $return_url
					),
					"purchase_units" => array(
						array(
							"reference_id" => $_SESSION['usr_id'] . "-" . $order_process_array['or_id'] . "-" . $random_value,
							"description" => "Checkout Event Items",
							"custom_id" => "checkoutevents-" . $_SESSION['usr_id'] . "-" . $order_process_array['or_id'],
							"amount" => array(
								"currency_code" => "USD",
								"value" => $order_process_array['totalCost'],
								"breakdown" => array(
									"item_total" => array(
										"currency_code" => "USD",
										"value" => $order_process_array['totalCost']
									)
								)
							),
							"items" => $payArrayItems
						)
					),
				);
				$request->body = $payArray;
// Call API with your client and get a response for your call
				$response = $this->getClient()->execute($request);
				if ($response->result->status == 'CREATED') {
//add paypal tocken
					$sqlToken = "INSERT INTO `ub_eventorder_token` (`tok_token_id`, `tok_usr_id`, `tok_order_id`, `tok_created_date`, `tok_created_time`) VALUES (:tok_token_id, :tok_usr_id, :tok_order_id,  :tok_created_date, :tok_created_time);";
					try {
						$createtockenstmt = $this->getCon()->prepare($sqlToken);
						$createtockenstmt->bindParam(':tok_token_id', $response->result->id, PDO::PARAM_STR);
						$createtockenstmt->bindParam(':tok_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
						$createtockenstmt->bindParam(':tok_order_id', $order_process_array['or_id'], PDO::PARAM_INT);
						$createtockenstmt->bindParam(':tok_created_date', date("Y-m-d"), PDO::PARAM_STR);
						$createtockenstmt->bindParam(':tok_created_time', date("H:i:s"), PDO::PARAM_STR);
						if ($createtockenstmt->execute()) {
							$order_pay_url = $response->result->links[1]->href;
							echo $order_pay_url;
						} else {
							echo $order_pay_url;
						}
					} catch (Exception $exc) {
						echo $order_pay_url;
					}
				} else {
					echo $order_pay_url;
				}
			} catch (Exception $exc2) {
				echo $order_pay_url;
			}
		} else {
			echo $order_pay_url;
		}
	}

	public function membershipPayoutGetPayPalInfo($payout_batch_id) {
		$request = new PayoutsGetRequest($payout_batch_id);
		$response = $this->getClient()->execute($request);
		return $response;
	}

	public function getUserPayPalEmail($usr_id) {
		$email = "";
		$sql = "SELECT
df_profile.pro_paypal_email
FROM
df_profile
WHERE
df_profile.pro_usr_id = " . $usr_id;
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$email = $row->pro_paypal_email;
			}
			return $email;
		} catch (Exception $exc) {
			return $email;
		}
	}

	public function getSystemCommissionRate() {
		$sys_account_executive_com_rate = "";
		$sql = "SELECT
df_setting.sys_account_executive_com_rate
FROM
df_setting";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$sys_account_executive_com_rate = $row->sys_account_executive_com_rate;
			}
			return $sys_account_executive_com_rate;
		} catch (Exception $exc) {
			return $sys_account_executive_com_rate;
		}
	}

	public function membershipBadgePayoutManually($rec_paypal_batch_id) {
		$request = new PayoutsGetRequest($rec_paypal_batch_id);
		$response = $this->getClient()->execute($request);
		$count = count($response->result->items);
		$i = 0;
		$flag = false;
		$update_sql = "UPDATE `df_affiliate_points_earn` SET `rec_payout_status`='2', `rec_paypal_batch_id`=:rec_paypal_batch_id, `rec_paypal_trn_id`=:rec_paypal_trn_id WHERE (`rec_id`=:rec_id);";
		$update2_sql = "UPDATE `df_affiliate_points_earn` SET `rec_payout_status`='0' WHERE (`rec_paypal_batch_id`=:rec_paypal_batch_id);";
		if ($response->result->batch_header->batch_status == 'SUCCESS') {
			while ($i < $count) {
				$createstmt = $this->getCon()->prepare($update_sql);
				$createstmt->bindParam(':rec_paypal_trn_id', $response->result->items[$i]->transaction_id, PDO::PARAM_STR);
				$createstmt->bindParam(':rec_paypal_batch_id', $response->result->batch_header->payout_batch_id, PDO::PARAM_STR);
				$createstmt->bindParam(':rec_id', $response->result->items[$i]->payout_item->sender_item_id, PDO::PARAM_INT);
				$flag = $createstmt->execute();
				$i++;
			}
			if ($flag) {
				echo json_encode(array("msgType" => 1, "msg" => "Affiliate membership previosly done payout process succeded.system payment information upgraded"));
			} else {
				//failed process
				echo json_encode(array("msgType" => 2, "msg" => "Affiliate membership previosly done payout process succeded.but system payment information upgration failed"));
			}
		} else {
			//failed process
			$createstmt = $this->getCon()->prepare($update2_sql);
			$createstmt->bindParam(':rec_paypal_batch_id', $rec_paypal_batch_id, PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 2, "msg" => "Affiliate membership previosly done payout process was failed."));
			} else {
				//failed process
				echo json_encode(array("msgType" => 2, "msg" => "Affiliate membership previosly done payout process was failed.Info Upgration failed"));
			}
		}
	}

	public function commissionBadgePayoutManually($oritm_batch_id) {
		$request = new PayoutsGetRequest($oritm_batch_id);
		$response = $this->getClient()->execute($request);
		$count = count($response->result->items);
		$i = 0;
		$flag = false;
		$update_sql = "UPDATE `ub_eventorder_item` SET `oritm_commission_release_status`='2', `oritm_paypal_trn_id`=:oritm_paypal_trn_id WHERE (`oritm_batch_id`=:oritm_batch_id)";
		$update2_sql = "UPDATE `ub_eventorder_item` SET `oritm_commission_release_status`='0' WHERE (`oritm_batch_id`=:oritm_batch_id)";
		if ($response->result->batch_header->batch_status == 'SUCCESS') {
			while ($i < $count) {
				$createstmt = $this->getCon()->prepare($update_sql);
				$createstmt->bindParam(':oritm_paypal_trn_id', $response->result->items[$i]->transaction_id, PDO::PARAM_STR);
				$createstmt->bindParam(':oritm_batch_id', $response->result->batch_header->payout_batch_id, PDO::PARAM_STR);
				$flag = $createstmt->execute();
				$i++;
			}
			if ($flag) {
				echo json_encode(array("msgType" => 1, "msg" => "Previosly done commission payout process succeded.system payment information upgraded"));
			} else {
				//failed process
				echo json_encode(array("msgType" => 2, "msg" => "Previosly done commission payout process succeded.but system payment information upgration failed"));
			}
		} else {
			//failed process
			$createstmt = $this->getCon()->prepare($update2_sql);
			$createstmt->bindParam(':oritm_batch_id', $oritm_batch_id, PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 2, "msg" => "Previosly done commission payout process was failed."));
			} else {
				//failed process
				echo json_encode(array("msgType" => 2, "msg" => "Previosly done commission payout process was failed.Info Upgration failed"));
			}
		}
	}

	public function membershipPayout($pay_array_object) {
		$request = new PayoutsPostRequest();
		$explode_mainArr = explode(",", $pay_array_object);
		$explode_mainArr_filtered = array_filter($explode_mainArr);
		$item_array = array();
		foreach ($explode_mainArr_filtered as $mainArr) {
			$explode_subArr = explode("-", $mainArr);
			$explode_subArr_filtered = array_filter($explode_subArr);
			$receiver = $this->getUserPayPalEmail($explode_subArr_filtered[2]);
			$sender_item_id = $explode_subArr_filtered[0];
			$value = $explode_subArr_filtered[1];
			if ($receiver != "") {
				$item_array[] = array(
					'recipient_type' => 'EMAIL',
					'receiver' => $receiver,
					'sender_item_id' => $sender_item_id,
					'amount' =>
					array(
						'currency' => 'USD',
						'value' => $value,
					),
				);
			}
		}
		$body = array(
			'sender_batch_header' =>
			array(
				'email_subject' => "Affiliate Membership Payment Received",
				'email_message' => 'You have received a affiliate membership payment.log into your dubboe account dashboard and view my refferal member section. Thanks for using our service!'
			),
			'items' => $item_array
		);
		$request->body = $body;
		$response = $this->getClient()->execute($request);
		if ($response->result->batch_header->batch_status == 'PENDING') {
			$PaypalInfo = $this->membershipPayoutGetPayPalInfo($response->result->batch_header->payout_batch_id);
			$count = count($PaypalInfo->result->items);
			$i = 0;
			$flag = false;
			$this->getCon()->beginTransaction();
			$update_sql = "UPDATE `df_affiliate_points_earn` SET `rec_payout_status`='2', `rec_paypal_batch_id`=:rec_paypal_batch_id, `rec_paypal_trn_id`=:rec_paypal_trn_id WHERE (`rec_id`=:rec_id);";
			$update2_sql = "UPDATE `df_affiliate_points_earn` SET `rec_payout_status`='1',`rec_paypal_batch_id`=:rec_paypal_batch_id WHERE (`rec_id`=:rec_id);";
			if ($PaypalInfo->result->batch_header->batch_status == 'SUCCESS') {

				while ($i < $count) {
					$createstmt = $this->getCon()->prepare($update_sql);
					$createstmt->bindParam(':rec_paypal_trn_id', $PaypalInfo->result->items[$i]->transaction_id, PDO::PARAM_STR);
					$createstmt->bindParam(':rec_paypal_batch_id', $response->result->batch_header->payout_batch_id, PDO::PARAM_STR);
					$createstmt->bindParam(':rec_id', $PaypalInfo->result->items[$i]->payout_item->sender_item_id, PDO::PARAM_INT);
					$flag = $createstmt->execute();
					$i++;
				}
				if ($flag) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Affiliate membership payout process successfully done"));
				} else {
					foreach ($explode_mainArr_filtered as $mainArr) {
						$explode_subArr = explode("-", $mainArr);
						$explode_subArr_filtered = array_filter($explode_subArr);
						$createstmt2 = $this->getCon()->prepare($update2_sql);
						$createstmt2->bindParam(':rec_paypal_batch_id', $response->result->batch_header->payout_batch_id, PDO::PARAM_STR);
						$createstmt2->bindParam(':rec_id', $explode_subArr_filtered[0], PDO::PARAM_INT);
						$flag = $createstmt2->execute();
					}
					if ($flag) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! System Paypal information update failed.Wait Few minutes and try again to manually process all of pending transactions "));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! System Paypal information update failed.Contact Developer"));
					}
				}
			} else {
				//failed process	
				foreach ($explode_mainArr_filtered as $mainArr) {
					$explode_subArr = explode("-", $mainArr);
					$explode_subArr_filtered = array_filter($explode_subArr);
					$createstmt2 = $this->getCon()->prepare($update2_sql);
					$createstmt2->bindParam(':rec_paypal_batch_id', $response->result->batch_header->payout_batch_id, PDO::PARAM_STR);
					$createstmt2->bindParam(':rec_id', $explode_subArr_filtered[0], PDO::PARAM_INT);
					$flag = $createstmt2->execute();
				}
				if ($flag) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! Transaction Status is still " . $PaypalInfo->result->batch_header->batch_status . ".Wait Few minutes and try again to manually process all of pending transactions "));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "2 Sorry! System Paypal information update failed.Contact Developer"));
				}
			}
		} else {
			//failed process
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! Processing failed"));
		}
	}

	public function commissionUpdateEventItemList() {
		$data = array();
		$sql = "SELECT
ub_eventorder.or_id,
ub_eventorder_item.oritm_item,
ub_event.evt_executive,
df_setting.sys_account_executive_com_rate,
ub_eventorder_item.oritm_commission_release_status,
ub_eventorder_item.oritm_commission_rate,
ub_eventorder_item.oritm_batch_id,
ub_eventorder_item.oritm_paypal_trn_id,
ub_eventorder_item.oritm_id
FROM
ub_eventorder
INNER JOIN ub_eventorder_item ON ub_eventorder_item.oritm_order = ub_eventorder.or_id
INNER JOIN ub_event_items ON ub_eventorder_item.oritm_item = ub_event_items.evtem_id
INNER JOIN ub_event ON ub_event_items.evtem_event = ub_event.evt_id ,
df_setting
WHERE
ub_eventorder.or_status = 2 AND
ub_eventorder_item.oritm_commission_release_status = 0
GROUP BY
ub_eventorder_item.oritm_id,
ub_eventorder_item.oritm_order";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;
		} catch (Exception $exc) {
			return $data;
		}
	}

	public function commissionPayout($pay_array_object) {
		$commissionUpdateItemList = $this->commissionUpdateEventItemList();
		$commission_rate = $this->getSystemCommissionRate();
		$request = new PayoutsPostRequest();
		$explode_mainArr = explode(",", $pay_array_object);
		$explode_mainArr_filtered = array_filter($explode_mainArr);
		$item_array = array();
		foreach ($explode_mainArr_filtered as $mainArr) {
			$explode_subArr = explode("-", $mainArr);
			$explode_subArr_filtered = array_filter($explode_subArr);
			$receiver = $this->getUserPayPalEmail($explode_subArr_filtered[0]);
			$sender_item_id = $explode_subArr_filtered[0];
			$value = $explode_subArr_filtered[2];
			if ($receiver != "") {
				$item_array[] = array(
					'recipient_type' => 'EMAIL',
					'receiver' => $receiver,
					'sender_item_id' => $sender_item_id,
					'amount' =>
					array(
						'currency' => 'USD',
						'value' => $value,
					),
				);
			}
		}
		$body = array(
			'sender_batch_header' =>
			array(
				'email_subject' => "Commission Payment Received",
				'email_message' => 'You have received a commission membership payment.log into your dubboe account dashboard and view event items commission. Thanks for using our service!'
			),
			'items' => $item_array
		);
		$request->body = $body;
		$response = $this->getClient()->execute($request);
		if ($response->result->batch_header->batch_status == 'PENDING') {
			$PaypalInfo = $this->membershipPayoutGetPayPalInfo($response->result->batch_header->payout_batch_id);
			$count = count($PaypalInfo->result->items);
			$i = 0;
			$flag = false;
			$this->getCon()->beginTransaction();
			$update_sql = "UPDATE `ub_eventorder_item` SET `oritm_commission_release_status`='2', `oritm_commission_rate`=:oritm_commission_rate, `oritm_batch_id`=:oritm_batch_id, `oritm_paypal_trn_id`=:oritm_paypal_trn_id WHERE (`oritm_id`=:oritm_id)";
			$update2_sql = "UPDATE `ub_eventorder_item` SET `oritm_commission_release_status`='1', `oritm_commission_rate`=:oritm_commission_rate, `oritm_batch_id`=:oritm_batch_id WHERE (`oritm_id`=:oritm_id)";
			if ($PaypalInfo->result->batch_header->batch_status == 'SUCCESS') {
				while ($i < $count) {
					foreach ($commissionUpdateItemList as $comUpList) {
						if ($PaypalInfo->result->items[$i]->payout_item->sender_item_id == $comUpList['evt_executive']) {
							$createstmt = $this->getCon()->prepare($update_sql);
							$createstmt->bindParam(':oritm_paypal_trn_id', $PaypalInfo->result->items[$i]->transaction_id, PDO::PARAM_STR);
							$createstmt->bindParam(':oritm_batch_id', $response->result->batch_header->payout_batch_id, PDO::PARAM_STR);
							$createstmt->bindParam(':oritm_commission_rate', $commission_rate, PDO::PARAM_INT);
							$createstmt->bindParam(':oritm_id', $comUpList['oritm_id'], PDO::PARAM_INT);
							$flag = $createstmt->execute();
						}
					}
					$i++;
				}
				if ($flag) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 1, "msg" => "Commission payout process successfully done"));
				} else {
					foreach ($explode_mainArr_filtered as $mainArr) {
						$explode_subArr = explode("-", $mainArr);
						$explode_subArr_filtered = array_filter($explode_subArr);
						foreach ($commissionUpdateItemList as $comUpList) {
							if ($explode_subArr_filtered[0] == $comUpList['evt_executive']) {
								$createstmt = $this->getCon()->prepare($update_sql);
								$createstmt->bindParam(':oritm_batch_id', $response->result->batch_header->payout_batch_id, PDO::PARAM_STR);
								$createstmt->bindParam(':oritm_commission_rate', $commission_rate, PDO::PARAM_INT);
								$createstmt->bindParam(':oritm_id', $comUpList['oritm_id'], PDO::PARAM_INT);
								$flag = $createstmt->execute();
							}
						}
					}
					if ($flag) {
						$this->getCon()->commit();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! System Paypal information update failed.Wait Few minutes and try again to manually process all of pending transactions "));
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Sorry! System Paypal information update failed.Contact Developer"));
					}
				}
			} else {
				//failed process	
				foreach ($explode_mainArr_filtered as $mainArr) {
					$explode_subArr = explode("-", $mainArr);
					$explode_subArr_filtered = array_filter($explode_subArr);
					$createstmt2 = $this->getCon()->prepare($update2_sql);
					foreach ($commissionUpdateItemList as $comUpList) {
						if ($explode_subArr_filtered[0] == $comUpList['evt_executive']) {
							$createstmt = $this->getCon()->prepare($update_sql);
							$createstmt->bindParam(':oritm_batch_id', $response->result->batch_header->payout_batch_id, PDO::PARAM_STR);
							$createstmt->bindParam(':oritm_commission_rate', $commission_rate, PDO::PARAM_INT);
							$createstmt->bindParam(':oritm_id', $comUpList['oritm_id'], PDO::PARAM_INT);
							$flag = $createstmt->execute();
						}
					}
				}
				if ($flag) {
					$this->getCon()->commit();
					echo json_encode(array("msgType" => 2, "msg" => "Sorry! Transaction Status is still " . $PaypalInfo->result->batch_header->batch_status . ".Wait Few minutes and try again to manually process all of pending transactions "));
				} else {
					$this->getCon()->rollBack();
					echo json_encode(array("msgType" => 2, "msg" => "2 Sorry! System Paypal information update failed.Contact Developer"));
				}
			}
		} else {
			//failed process
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! Processing failed"));
		}
	}

	public function creatMembershipPayPalOrder() {
		$cancel_url = "http://localhost/UBOAffiliateWeb/membership.php";
		$return_url = "http://localhost/UBOAffiliateWeb/membership.php";
		$order_pay_url = "#";
		$request = new OrdersCreateRequest();
		$request->prefer('return=representation');
		$payArray = "";
		$sql = "SELECT
df_user.usr_id,
df_profile.pro_profile_category,
ub_credit_plans.cr_amount,
ub_credit_plans.cr_membership,
ub_credit_plans.cr_month_subcription_discount_rt,
ub_credit_plans.cr_annual_discount_discount_rt,
ub_credit_plans.cr_membership_renew_days
FROM
df_user
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
INNER JOIN ub_credit_plans ON df_profile.pro_profile_category = ub_credit_plans.cr_category
WHERE
df_user.usr_id= :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$random_value = rand(10000, 99999);
				$perMonth = $row->cr_membership;
				$annualWithDiscount = (($row->cr_membership * 12) - ((($row->cr_membership * 12) * $row->cr_annual_discount_discount_rt) / 100));
				$annualDiscount = ((($row->cr_membership * 12) * $row->cr_annual_discount_discount_rt) / 100);
				$perAnnual = ($row->cr_membership * 12);
//				echo $perAnnual;
				$monthlyPayWithSubcription = $row->cr_membership - (($row->cr_membership * $row->cr_month_subcription_discount_rt) / 100);
				if ($this->getTok_plan_type() == 1) {
//per month plan
					$payArray = array(
						"intent" => "CAPTURE",
						"application_context" => array(
							"cancel_url" => $cancel_url,
							"return_url" => $return_url
						),
						"purchase_units" => array(
							array(
								"reference_id" => $_SESSION['usr_id'] . "-1-" . $random_value,
								"description" => "Membership Payment",
								"custom_id" => "membership-" . $_SESSION['usr_id'] . "-1",
								"amount" => array(
									"currency_code" => "USD",
									"value" => $perMonth,
									"breakdown" => array(
										"item_total" => array(
											"currency_code" => "USD",
											"value" => $perMonth
										)
									)
								),
								"items" => array(
									array(
										"name" => "Membership Payment Plan (Per Month)",
										"unit_amount" => array(
											"currency_code" => "USD",
											"value" => $perMonth
										),
										"quantity" => "1",
										"sku" => "MPLAN-" . $_SESSION['usr_id']
									)
								)
							)
						),
					);
				} else if ($this->getTok_plan_type() == 3) {
//annual plan
					$payArray = array(
						"intent" => "CAPTURE",
						"application_context" => array(
							"cancel_url" => $cancel_url,
							"return_url" => $return_url,
						),
						"purchase_units" => array(
							array(
								"reference_id" => $_SESSION['usr_id'] . "-3-" . $random_value,
								"description" => "Membership Payment",
								"custom_id" => "membership-" . $_SESSION['usr_id'] . "-3",
								"amount" => array(
									"currency_code" => "USD",
									"value" => $annualWithDiscount,
									"breakdown" => array(
										"item_total" => array(
											"currency_code" => "USD",
											"value" => $perAnnual
										),
										'shipping_discount' =>
										array(
											'currency_code' => 'USD',
											'value' => $annualDiscount,
										)
									)
								),
								"items" => array(
									array(
										"name" => "Membership Payment Plan (Annual)",
										"unit_amount" => array(
											"currency_code" => "USD",
											"value" => $perAnnual
										),
										"quantity" => "1",
										"sku" => "MPLAN-" . $_SESSION['usr_id']
									)
								)
							)
						),
					);
				}
			}


			$request->body = $payArray;
// Call API with your client and get a response for your call
			$response = $this->getClient()->execute($request);
			if ($response->result->status == 'CREATED') {
//save tocken info into database				
				$sqlToken = "INSERT INTO `ub_membership_token` (`tok_token_id`, `tok_usr_id`, `tok_plan_type`, `tok_info_annual_disc_rate`, `tok_info_subcription_disc_rate`, `tok_info_renew_days`, `tok_info_membership_amt`,`tok_created_date`, `tok_created_time`) VALUES (:tok_token_id, :tok_usr_id, :tok_plan_type, :tok_info_annual_disc_rate, :tok_info_subcription_disc_rate, :tok_info_renew_days, :tok_info_membership_amt, :tok_created_date, :tok_created_time);";
				try {
					$readstmt2 = $this->con->prepare($sql);
					$readstmt2->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
					$readstmt2->execute();
					while ($row2 = $readstmt2->fetch(PDO::FETCH_OBJ)) {
						$createstmt = $this->con->prepare($sqlToken);
						$createstmt->bindParam(':tok_token_id', $response->result->id, PDO::PARAM_STR);
						$createstmt->bindParam(':tok_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
						$createstmt->bindParam(':tok_plan_type', $this->getTok_plan_type(), PDO::PARAM_INT);
						$createstmt->bindParam(':tok_info_annual_disc_rate', $row2->cr_annual_discount_discount_rt, PDO::PARAM_INT);
						$createstmt->bindParam(':tok_info_subcription_disc_rate', $row2->cr_month_subcription_discount_rt, PDO::PARAM_INT);
						$createstmt->bindParam(':tok_info_renew_days', $row2->cr_membership_renew_days, PDO::PARAM_INT);
						$createstmt->bindParam(':tok_info_membership_amt', $row2->cr_membership, PDO::PARAM_INT);
						$createstmt->bindParam(':tok_created_date', date("Y-m-d"), PDO::PARAM_STR);
						$createstmt->bindParam(':tok_created_time', date("H:i:s"), PDO::PARAM_STR);
					}
					if ($createstmt->execute()) {
						$order_pay_url = $response->result->links[1]->href;
					} else {
						echo $order_pay_url;
					}
				} catch (Exception $exc) {
					echo $order_pay_url;
				}
			}
// If call returns body in response, you can get the deserialized version from the result attribute of the response
			echo $order_pay_url;
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function creatSubcriptionPayPalOrder() {
		$cancel_url = "http://localhost/UBOAffiliateWeb/membership.php";
		$return_url = "http://localhost/UBOAffiliateWeb/membership.php";
		$order_pay_url = "#";
		$request = new OrdersCreateRequest();
		$request->prefer('return=representation');
		$payArray = "";
		$sql = "SELECT
df_user.usr_id,
df_profile.pro_profile_category,
ub_credit_plans.cr_amount,
ub_credit_plans.cr_membership,
ub_credit_plans.cr_month_subcription_discount_rt,
ub_credit_plans.cr_annual_discount_discount_rt,
ub_credit_plans.cr_membership_renew_days
FROM
df_user
INNER JOIN df_profile ON df_profile.pro_usr_id = df_user.usr_id
INNER JOIN ub_credit_plans ON df_profile.pro_profile_category = ub_credit_plans.cr_category
WHERE
df_user.usr_id= :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$random_value = rand(10000, 99999);
				$perMonth = $row->cr_membership;
				$annualWithDiscount = (($row->cr_membership * 12) - ((($row->cr_membership * 12) * $row->cr_annual_discount_discount_rt) / 100));
				$annualDiscount = ((($row->cr_membership * 12) * $row->cr_annual_discount_discount_rt) / 100);
				$perAnnual = ($row->cr_membership * 12);
//				echo $perAnnual;
				$monthlyPayWithSubcription = $row->cr_membership - (($row->cr_membership * $row->cr_month_subcription_discount_rt) / 100);
//per month plan
				$payArray = array(
					"intent" => "CAPTURE",
					"application_context" => array(
						"cancel_url" => $cancel_url,
						"return_url" => $return_url
					),
					"purchase_units" => array(
						array(
							"reference_id" => $_SESSION['usr_id'] . "-1-" . $random_value,
							"description" => "Membership Payment",
							"custom_id" => "membership-" . $_SESSION['usr_id'] . "-1",
							"amount" => array(
								"currency_code" => "USD",
								"value" => $perMonth,
								"breakdown" => array(
									"item_total" => array(
										"currency_code" => "USD",
										"value" => $perMonth
									)
								)
							),
							"items" => array(
								array(
									"name" => "Membership Payment Plan (Per Month)",
									"unit_amount" => array(
										"currency_code" => "USD",
										"value" => $perMonth
									),
									"quantity" => "1",
									"sku" => "MPLAN-" . $_SESSION['usr_id']
								)
							)
						)
					),
				);
			}
			$request->body = $payArray;
// Call API with your client and get a response for your call
			$response = $this->getClient()->execute($request);
			if ($response->result->status == 'CREATED') {
//save tocken info into database				
				$sqlToken = "INSERT INTO `ub_membership_token` (`tok_token_id`, `tok_usr_id`, `tok_plan_type`, `tok_info_annual_disc_rate`, `tok_info_subcription_disc_rate`, `tok_info_renew_days`, `tok_info_membership_amt`,`tok_created_date`, `tok_created_time`) VALUES (:tok_token_id, :tok_usr_id, :tok_plan_type, :tok_info_annual_disc_rate, :tok_info_subcription_disc_rate, :tok_info_renew_days, :tok_info_membership_amt, :tok_created_date, :tok_created_time);";
				try {
					$readstmt2 = $this->con->prepare($sql);
					$readstmt2->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
					$readstmt2->execute();
					while ($row2 = $readstmt2->fetch(PDO::FETCH_OBJ)) {
						$createstmt = $this->con->prepare($sqlToken);
						$createstmt->bindParam(':tok_token_id', $response->result->id, PDO::PARAM_STR);
						$createstmt->bindParam(':tok_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
						$createstmt->bindParam(':tok_plan_type', $this->getTok_plan_type(), PDO::PARAM_INT);
						$createstmt->bindParam(':tok_info_annual_disc_rate', $row2->cr_annual_discount_discount_rt, PDO::PARAM_INT);
						$createstmt->bindParam(':tok_info_subcription_disc_rate', $row2->cr_month_subcription_discount_rt, PDO::PARAM_INT);
						$createstmt->bindParam(':tok_info_renew_days', $row2->cr_membership_renew_days, PDO::PARAM_INT);
						$createstmt->bindParam(':tok_info_membership_amt', $row2->cr_membership, PDO::PARAM_INT);
						$createstmt->bindParam(':tok_created_date', date("Y-m-d"), PDO::PARAM_STR);
						$createstmt->bindParam(':tok_created_time', date("H:i:s"), PDO::PARAM_STR);
					}
					if ($createstmt->execute()) {
						$order_pay_url = $response->result->links[1]->href;
					} else {
						echo $order_pay_url;
					}
				} catch (Exception $exc) {
					echo $order_pay_url;
				}
			}
// If call returns body in response, you can get the deserialized version from the result attribute of the response
			echo $order_pay_url;
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function payMembershipPerMonth() {
		$request = new OrdersCreateRequest();
		$request->prefer('return=representation');
		$sample_array = array(
			"intent" => "CAPTURE",
			'application_context' =>
			array(
				"cancel_url" => "http://localhost/UBOAffiliateWeb/membership.php",
				"return_url" => "http://localhost/UBOAffiliateWeb/membership.php"
			),
			"purchase_units" => array(
				array(
					"reference_id" => "TEST1",
					"description" => "TEST1 DESC",
					"custom_id" => "TEST1 Custom ID",
					"amount" => array(
						"currency_code" => "USD",
						"value" => "10",
						"breakdown" => array(
							"item_total" => array(
								"currency_code" => "USD",
								"value" => "10"
							)
						)
					),
					"items" => array(
						array(
							"name" => "TEST1_ITEM",
							"unit_amount" => array(
								"currency_code" => "USD",
								"value" => "8"
							),
							"quantity" => "1",
							"sku" => "TEST1_SKU"
						),
						array(
							"name" => "TEST1_ITEM2",
							"unit_amount" => array(
								"currency_code" => "USD",
								"value" => "1"
							),
							"quantity" => "2",
							"sku" => "TEST1_SKU2"
						)
					)
				)
			),
		);

		$request->body = $sample_array;

//		
//		$request->body = [
//			"intent" => "CAPTURE",
//			"purchase_units" => [[
//			"reference_id" => "702",
//			"amount" => [
//				"value" => "10",
//				"currency_code" => "USD"
//			]
//				]],
//			"application_context" => [
//				"cancel_url" => "http://localhost/UBOAffiliateWeb/membership.php",
//				"return_url" => "http://localhost/UBOAffiliateWeb/membership.php"
//			]
//		];
//		$request->body = [
//			"intent" => "CAPTURE",
//			"purchase_units" => [[
//			'reference_id' => 'PUHF',
//			'description' => 'Sporting Goods',
//			'custom_id' => 'CUST-HighFashions',
//			'soft_descriptor' => 'HighFashions',
//			"amount" => [
//				"value" => '7',
//				"currency_code" => 'USD',
//				"breakdown" => [
//					"item_total" => ["value" => '7', "currency_code" => 'USD']
//				]
//			],
//			"invoice_id" => 'muesli_invoice_id',
//			"items" => [[
//			"name" => 'Hafer',
//			"unit_amount" => ["value" => '3', "currency_code" => 'USD'],
//			"quantity" => '1',
//			"sku" => 'haf001'
//				], [
//					"name" => 'Discount',
//					"unit_amount" => ["value" => '4', "currency_code" => 'USD'],
//					"quantity" => '1',
//					"sku" => 'dsc002'
//				]],
//				]],
//			"application_context" => [
//				"cancel_url" => "http://localhost/UBOAffiliateWeb/membership.php",
//				"return_url" => "http://localhost/UBOAffiliateWeb/membership.php"
//			]
//		];

		try {
// Call API with your client and get a response for your call
			$response = $this->getClient()->execute($request);

// If call returns body in response, you can get the deserialized version from the result attribute of the response
			echo json_encode($response);
		} catch (HttpException $ex) {
			echo $ex->statusCode;
			print_r($ex->getMessage());
		}
	}

	public function updateMembershipPayPalToken($token) {
		$request = new OrdersCaptureRequest($token);
		$request->prefer('return=representation');
		try {
// Call API with your client and get a response for your call
			$response = $this->getClient()->execute($request);
			if ($response->result->status == 'COMPLETED') {
				$sql = "UPDATE `ub_membership_token` SET `tok_status`='1', `tok_payer_id`=:tok_payer_id WHERE(`tok_token_id`=:tok_token_id);";

				try {
					$createstmt = $this->con->prepare($sql);
					$createstmt->bindParam(':tok_payer_id', $response->result->payer->payer_id, PDO::PARAM_STR);
					$createstmt->bindParam(':tok_token_id', $response->result->id, PDO::PARAM_STR);
					if ($createstmt->execute()) {
						echo json_encode(array("msgType" => 1, "msg" => "Transaction successfully done.Thank you for membership upgrade."));
					} else {
						echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
					}
				} catch (Exception $exc) {
					echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
				}
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
			}
		} catch (HttpException $ex) {
			echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
		}
	}

	public function getOrderIDBytoken($token) {
		$or_id = 0;
		$sql = "SELECT
ub_eventorder_token.tok_order_id
FROM
ub_eventorder_token
WHERE
ub_eventorder_token.tok_token_id = :tok_token_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':tok_token_id', $token, PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
				$or_id = $row->tok_order_id;
			}
			return $or_id;
		} catch (Exception $exc) {
			return $or_id;
		}
	}

	public function updateOrderEventItemPayPalToken($token) {
		$or_id = $this->getOrderIDBytoken($token);
//		echo $or_id."    ok";
		$request = new OrdersCaptureRequest($token);
		$request->prefer('return=representation');
		try {
// Call API with your client and get a response for your call
			$response = $this->getClient()->execute($request);
			if ($response->result->status == 'COMPLETED') {
				$sqlUpdateOrder = "UPDATE `ub_eventorder` SET `or_status`='1' WHERE (`or_id`=:or_id);";
				$sql = "UPDATE `ub_eventorder_token` SET `tok_status`='1', `tok_payer_id`=:tok_payer_id WHERE(`tok_token_id`=:tok_token_id);";
				try {
					$this->getCon()->beginTransaction();
					$createstmt = $this->getCon()->prepare($sql);
					$createstmt->bindParam(':tok_payer_id', $response->result->payer->payer_id, PDO::PARAM_STR);
					$createstmt->bindParam(':tok_token_id', $response->result->id, PDO::PARAM_STR);
					if ($createstmt->execute()) {
						if ($or_id == 0) {
							$this->getCon()->rollBack();
							echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later." . $or_id));
						} else {
							$updateorderstmt = $this->getCon()->prepare($sqlUpdateOrder);
							$updateorderstmt->bindParam(':or_id', $or_id, PDO::PARAM_INT);
							if ($updateorderstmt->execute()) {
								$this->getCon()->commit();
								echo json_encode(array("msgType" => 1, "msg" => "Transaction successfully done.Thank you for the checkout."));
							} else {
								$this->getCon()->rollBack();
								echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
							}
						}
					} else {
						$this->getCon()->rollBack();
						echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
					}
				} catch (Exception $exc) {
					echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
				}
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
			}
		} catch (HttpException $ex) {
			echo json_encode(array("msgType" => 2, "msg" => "Transaction processing failed,Try again later."));
		}
	}

	public function removeOrderEventItem($token) {
		$or_id = $this->getOrderIDBytoken($token);
		$sqlUpdateOrder = "DELETE FROM `ub_eventorder` WHERE (`or_id`=:or_id);";
		$updateorderstmt = $this->getCon()->prepare($sqlUpdateOrder);
		$updateorderstmt->bindParam(':or_id', $or_id, PDO::PARAM_INT);
		if ($updateorderstmt->execute()) {
			echo json_encode(array("msgType" => 1, "msg" => "Failed to authtorize your transaction.So We rejected your order"));
		} else {
			echo json_encode(array("msgType" => 2, "msg" => "Failed to authtorize your transaction,Try again later."));
		}
	}

	public function membershipHistory() {
		$date = array();
		$sql = "SELECT
df_user.usr_id,
ub_membership_token.tok_token_id,
ub_membership_token.tok_payer_id,
ub_membership_paypal.m_id,
ub_membership_paypal.m_payer_id,
ub_membership_paypal.m_token_id,
ub_membership_paypal.m_usr_id,
ub_membership_paypal.m_plan_type,
ub_membership_paypal.m_txn_id,
ub_membership_paypal.m_paid_status,
ub_membership_paypal.m_paid_date,
ub_membership_paypal.m_paid_time,
ub_membership_paypal.m_paid_year,
ub_membership_paypal.m_paid_amount,
ub_membership_paypal.m_player_pp_email,
ub_membership_token.tok_id,
ub_membership_token.tok_usr_id,
ub_membership_token.tok_plan_type,
ub_membership_token.tok_info_annual_disc_rate,
ub_membership_token.tok_info_subcription_disc_rate,
ub_membership_token.tok_info_renew_days,
ub_membership_token.tok_info_membership_amt,
ub_membership_token.tok_status,
ub_membership_token.tok_created_date,
ub_membership_token.tok_created_time
FROM
df_user
INNER JOIN ub_membership_token ON ub_membership_token.tok_usr_id = df_user.usr_id
INNER JOIN ub_membership_paypal ON ub_membership_paypal.m_usr_id = df_user.usr_id AND ub_membership_paypal.m_token_id = ub_membership_token.tok_token_id
WHERE
df_user.usr_id = :usr_id AND
ub_membership_token.tok_status = 1
ORDER BY
ub_membership_token.tok_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$date[] = $row;
			}
			echo json_encode($date);
		} catch (Exception $exc) {
			echo json_encode($date);
		}
	}

	public function tblEventItemOrderHistory() {
		$date = array();
		$sql = "SELECT
ub_eventorder.or_id,
ub_eventorder.or_usr_id,
ub_eventorder.or_totalamt,
ub_eventorder.or_created_date,
ub_eventorder.or_created_time,
ub_eventorder.or_status,
ub_eventorder_token.tok_token_id,
ub_eventorder_paypal.m_id,
ub_eventorder_paypal.m_payer_id,
ub_eventorder_paypal.m_usr_id,
ub_eventorder_paypal.m_order_id,
ub_eventorder_paypal.m_txn_id,
ub_eventorder_paypal.m_paid_status,
ub_eventorder_paypal.m_paid_date,
ub_eventorder_paypal.m_paid_time,
ub_eventorder_paypal.m_paid_year,
ub_eventorder_paypal.m_paid_amount,
ub_eventorder_paypal.m_player_pp_email
FROM
ub_eventorder
INNER JOIN ub_eventorder_token ON ub_eventorder_token.tok_order_id = ub_eventorder.or_id
LEFT JOIN ub_eventorder_paypal ON ub_eventorder_paypal.m_order_id = ub_eventorder.or_id
WHERE
ub_eventorder.or_usr_id = :or_usr_id
ORDER BY
ub_eventorder.or_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':or_usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$date[] = $row;
			}
			echo json_encode($date);
		} catch (Exception $exc) {
			echo json_encode($date);
		}
	}

	public function tblPayoutAccountExecutives() {
		$date = array();
		$sql = "SELECT
FORMAT (Sum((ub_eventorder_item.oritm_qty * ub_eventorder_item.oritm_qty_unit_price)),2) AS oritm_item_total,
FORMAT (Sum((((ub_eventorder_item.oritm_qty * ub_eventorder_item.oritm_qty_unit_price) * df_setting.sys_account_executive_com_rate)/100)),2) AS commission_total,
ub_event.evt_executive,
df_setting.sys_account_executive_com_rate,
ub_eventorder_item.oritm_batch_id,
ub_eventorder_item.oritm_commission_release_status,
(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = ub_event.evt_executive) AS executive_name
FROM
ub_eventorder
INNER JOIN ub_eventorder_item ON ub_eventorder_item.oritm_order = ub_eventorder.or_id
INNER JOIN ub_event_items ON ub_eventorder_item.oritm_item = ub_event_items.evtem_id
INNER JOIN ub_event ON ub_event_items.evtem_event = ub_event.evt_id ,
df_setting
WHERE
ub_eventorder.or_status = 2 AND
(ub_eventorder_item.oritm_commission_release_status = 0 OR ub_eventorder_item.oritm_commission_release_status = 1)
GROUP BY
ub_event.evt_executive";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$date[] = $row;
			}
			echo json_encode($date);
		} catch (Exception $exc) {
			echo json_encode($date);
		}
	}

	public function tblPendingPayoutAccountExecutives() {
		$date = array();
		$sql = "SELECT
FORMAT (Sum((ub_eventorder_item.oritm_qty * ub_eventorder_item.oritm_qty_unit_price)),2) AS oritm_item_total,
FORMAT (Sum((((ub_eventorder_item.oritm_qty * ub_eventorder_item.oritm_qty_unit_price) * df_setting.sys_account_executive_com_rate)/100)),2) AS commission_total,
ub_event.evt_executive,
df_setting.sys_account_executive_com_rate,
(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id = ub_event.evt_executive) AS executive_name,
ub_eventorder_item.oritm_batch_id
FROM
ub_eventorder
INNER JOIN ub_eventorder_item ON ub_eventorder_item.oritm_order = ub_eventorder.or_id
INNER JOIN ub_event_items ON ub_eventorder_item.oritm_item = ub_event_items.evtem_id
INNER JOIN ub_event ON ub_event_items.evtem_event = ub_event.evt_id ,
df_setting
WHERE
ub_eventorder.or_status = 2 AND
ub_eventorder_item.oritm_commission_release_status = 1
GROUP BY
ub_event.evt_executive";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$date[] = $row;
			}
			echo json_encode($date);
		} catch (Exception $exc) {
			echo json_encode($date);
		}
	}

	public function tblEventItemOrderHistoryAccExe() {
		$data = array();
		$sql = "SELECT
ub_eventorder.or_id,
(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id =ub_eventorder.or_usr_id) AS buyer,
ub_eventorder.or_usr_id,
ub_eventorder.or_totalamt,
ub_eventorder.or_created_date,
ub_eventorder.or_created_time,
ub_eventorder.or_status,
ub_eventorder_token.tok_token_id,
ub_eventorder_paypal.m_id,
ub_eventorder_paypal.m_payer_id,
ub_eventorder_paypal.m_usr_id,
ub_eventorder_paypal.m_order_id,
ub_eventorder_paypal.m_txn_id,
ub_eventorder_paypal.m_paid_status,
ub_eventorder_paypal.m_paid_date,
ub_eventorder_paypal.m_paid_time,
ub_eventorder_paypal.m_paid_year,
ub_eventorder_paypal.m_paid_amount,
ub_eventorder_paypal.m_player_pp_email,
ub_event_items.evtem_id,
ub_event.evt_executive,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_qty,
ub_eventorder_item.oritm_qty,
ub_eventorder_item.oritm_qty_unit_price,
ub_eventorder_item.oritm_paypal_trn_id,
ub_eventorder_item.oritm_batch_id,
ub_eventorder_item.oritm_commission_rate,
ub_eventorder_item.oritm_commission_release_status,
ub_event_items.evtem_price,
ub_event.evt_name,
ub_event.evt_id,
ub_eventcategory.evtcat_event,
ub_event_items.evtem_category,
df_setting.sys_account_executive_com_rate
FROM
ub_eventorder
INNER JOIN ub_eventorder_token ON ub_eventorder_token.tok_order_id = ub_eventorder.or_id
LEFT JOIN ub_eventorder_paypal ON ub_eventorder_paypal.m_order_id = ub_eventorder.or_id
INNER JOIN ub_eventorder_item ON ub_eventorder_item.oritm_order = ub_eventorder.or_id
INNER JOIN ub_event_items ON ub_eventorder_item.oritm_item = ub_event_items.evtem_id
INNER JOIN ub_event ON ub_event_items.evtem_event = ub_event.evt_id
INNER JOIN ub_eventcategory ON ub_event_items.evtem_category = ub_eventcategory.evtcat_id ,
df_setting
WHERE
ub_event.evt_executive = :evt_executive
ORDER BY
ub_eventorder.or_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':evt_executive', $_SESSION['usr_id'], PDO::PARAM_INT);
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

	public function tblEventItemOrderHistoryAdmin() {
		$data = array();
		$sql = "SELECT
ub_eventorder.or_id,
(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id =ub_eventorder.or_usr_id) AS buyer,
ub_eventorder.or_usr_id,
ub_eventorder.or_totalamt,
ub_eventorder.or_created_date,
ub_eventorder.or_created_time,
ub_eventorder.or_status,
ub_eventorder_token.tok_token_id,
ub_eventorder_paypal.m_id,
ub_eventorder_paypal.m_payer_id,
ub_eventorder_paypal.m_usr_id,
ub_eventorder_paypal.m_order_id,
ub_eventorder_paypal.m_txn_id,
ub_eventorder_paypal.m_paid_status,
ub_eventorder_paypal.m_paid_date,
ub_eventorder_paypal.m_paid_time,
ub_eventorder_paypal.m_paid_year,
ub_eventorder_paypal.m_paid_amount,
ub_eventorder_paypal.m_player_pp_email,
ub_event_items.evtem_id,
ub_event.evt_executive,
(SELECT
CONCAT_WS(' ',df_user.usr_first_name,df_user.usr_last_name)
FROM
df_user
WHERE
df_user.usr_id =ub_event.evt_executive) AS evt_executive_name,
ub_event_items.evtem_name,
ub_event_items.evtem_desc,
ub_event_items.evtem_qty,
ub_eventorder_item.oritm_qty,
ub_eventorder_item.oritm_qty_unit_price,
ub_eventorder_item.oritm_paypal_trn_id,
ub_eventorder_item.oritm_batch_id,
ub_eventorder_item.oritm_commission_rate,
ub_eventorder_item.oritm_commission_release_status,
ub_event_items.evtem_price,
ub_event.evt_name,
ub_event.evt_id,
ub_eventcategory.evtcat_event,
ub_event_items.evtem_category
FROM
ub_eventorder
INNER JOIN ub_eventorder_token ON ub_eventorder_token.tok_order_id = ub_eventorder.or_id
LEFT JOIN ub_eventorder_paypal ON ub_eventorder_paypal.m_order_id = ub_eventorder.or_id
INNER JOIN ub_eventorder_item ON ub_eventorder_item.oritm_order = ub_eventorder.or_id
INNER JOIN ub_event_items ON ub_eventorder_item.oritm_item = ub_event_items.evtem_id
INNER JOIN ub_event ON ub_event_items.evtem_event = ub_event.evt_id
INNER JOIN ub_eventcategory ON ub_event_items.evtem_category = ub_eventcategory.evtcat_id
ORDER BY
ub_eventorder.or_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
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

	public function checkMembership() {
		$date = array();
		$sql = "SELECT
df_user.usr_next_membership_renew_date,
df_user.usr_last_membership_renew_date,
df_user.usr_membership_valid_year,
df_user.usr_membership_activate_type,
df_user.usr_membership_status
FROM
df_user
WHERE
df_user.usr_id = :usr_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':usr_id', $_SESSION['usr_id'], PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$date[] = $row;
			}
			echo json_encode($date);
		} catch (Exception $exc) {
			echo json_encode($date);
		}
	}

}
