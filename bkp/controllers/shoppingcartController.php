<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../models/paypal.php';
$eventModal = new Paypal();
if (!isset($_SESSION['shoppingcart'])) {
	$_SESSION['shoppingcart'] = array();
}

if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "AddEventItemToCart") {
		if (isset($_SESSION['shoppingcart'])) {
			$flag = false;
			//read array
			if (!empty($_SESSION['shoppingcart'])) {
				foreach ($_SESSION['shoppingcart'] as $key_session => $value_session) {
					if ($_SESSION['shoppingcart'][$key_session]['eventItem'] == $_POST['evtem_id']) {
						$new_qty = $_SESSION['shoppingcart'][$key_session]['Qty'] + 1;
						$_SESSION['shoppingcart'][$key_session]['Qty'] = $new_qty;
						$flag = true;
					}
				}
			}
			if ($flag) {
				echo json_encode(array("msgType" => 1, "msg" => '<h5><i class="fas fa-cart-plus"></i> New Qty added to already existing cart Item</h5>'));
			} else {
				$eventModal->setEvtem_id($_POST['evtem_id']);
				$eventItemArray = $eventModal->getEventCategoryItemByIDReturnAR();
				foreach ($eventItemArray as $key => $value) {
					if ($value['evtem_qty'] > 0) {

						$_SESSION['shoppingcart'][] = array("eventItem" => $value['evtem_id'], "Qty" => 1, "unitPrice" => $value['evtem_price']);

						echo json_encode(array("msgType" => 1, "msg" => '<h5><i class="fas fa-cart-plus"></i> Item added to your cart</h5>'));
					} else {
						echo json_encode(array("msgType" => 2, "msg" => '<h5><i class="fas fa-cart-plus"></i> Sorry! Sold out/h5>'));
					}
				}
			}
		} else {
			echo json_encode(array("msgType" => 2, "msg" => '<h5><i class="fas fa-shopping-cart"></i> Sorry! Your cart not available</h5>'));
		}
	} else if ($_POST['action'] == "shoppingCartNotification") {
		if (isset($_SESSION['shoppingcart'])) {
			$cartobjects = count($_SESSION['shoppingcart']);
			echo json_encode(array("msgType" => 1, "cartobjects" => $cartobjects));
		} else {
			echo json_encode(array("msgType" => 2, "cartobjects" => "empty"));
		}
	} else if ($_POST['action'] == "shoppingCartEmptyAll") {
		$_SESSION['shoppingcart'] = array();
		echo json_encode(array("msgType" => 2, "msg" => '<h5><i class="fas fa-shopping-cart"></i> Your cart Cleared</h5>'));
	} else if ($_POST['action'] == "AllEventCategoryItemsCartCreate") {
		$eventModal->AllEventCategoryItemsCartCreate();
	} else if ($_POST['action'] == "cartSessionArray") {
		echo json_encode($_SESSION['shoppingcart']);
	} else if ($_POST['action'] == "removeCartItem") {
		$index = $_POST['cartarrayindex'];
		unset($_SESSION['shoppingcart'][$index]);
		echo json_encode(array("msgType" => 2, "msg" => '<h5><i class="fas fa-shopping-cart"></i> Item Removed</h5>'));
	} else if ($_POST['action'] == "updateCartItemQty") {
		$index = $_POST['cartarrayindex'];
		$_SESSION['shoppingcart'][$index]['Qty'] = $_POST['new_qty'];
		echo json_encode(array("msgType" => 2, "msg" => '<h5><i class="fas fa-shopping-cart"></i> Item Qty Updated</h5>'));
	} else if ($_POST['action'] == "checkout") {
		$eventModal->checkoutEventItems($_SESSION['shoppingcart']);
	}
}
