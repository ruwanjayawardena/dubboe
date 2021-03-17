<?php

include '../models/wishlist.php';

$ctrl = new Wishlist();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "saveWishlist") {
		$ctrl->setWish_type($_POST['wish_type']);
		$ctrl->setWish_object($_POST['wish_object']);
		$ctrl->saveWishlist();
	} else if ($_POST['action'] == "deleteWishlist") {
		$ctrl->setWish_id($_POST['wish_id']);
		$ctrl->deleteWishlist();
	} else if ($_POST['action'] == "tblWishlistByLoggedUser") {
		$ctrl->tblWishlistByLoggedUser();
	}
}