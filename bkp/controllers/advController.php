<?php

include '../models/adv.php';

$ctrl = new adv();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "saveAdv") {
		$ctrl->setAd_title($_POST['ad_title']);
		$ctrl->setAd_maincategory($_POST['ad_maincategory']);
		$ctrl->setAd_subcategory($_POST['ad_subcategory']);
		$ctrl->setAd_country($_POST['ad_country']);
		$ctrl->setAd_state($_POST['ad_state']);
		$ctrl->setAd_city($_POST['ad_city']);
		$ctrl->setAd_shortdesc($_POST['ad_shortdesc']);
		$ctrl->setAd_longdesc($_POST['ad_longdesc']);
		$ctrl->setAd_price($_POST['ad_price']);
		$ctrl->setAd_pricetag_status($_POST['ad_pricetag_status']);
		$ctrl->setAd_filter_array_status($_POST['ad_filter_array_status']);
		$ctrl->saveAdv($_POST['filter_array']);
	} else if ($_POST['action'] == "updateAdv") {
		$ctrl->setAd_title($_POST['ad_title']);
		$ctrl->setAd_maincategory($_POST['ad_maincategory']);
		$ctrl->setAd_subcategory($_POST['ad_subcategory']);
		$ctrl->setAd_country($_POST['ad_country']);
		$ctrl->setAd_state($_POST['ad_state']);
		$ctrl->setAd_city($_POST['ad_city']);
		$ctrl->setAd_shortdesc($_POST['ad_shortdesc']);
		$ctrl->setAd_longdesc($_POST['ad_longdesc']);
		$ctrl->setAd_price($_POST['ad_price']);
		$ctrl->setAd_pricetag_status($_POST['ad_pricetag_status']);
		$ctrl->setAd_filter_array_status($_POST['ad_filter_array_status']);
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->updateAdv($_POST['filter_array']);
	} else if ($_POST['action'] == "saveAdvFinalStep") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->saveAdvFinalStep();
	} else if ($_POST['action'] == "updateAdvFinalStep") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->updateAdvFinalStep();
	} else if ($_POST['action'] == "saveTag") {
		$ctrl->setTg_tag($_POST['tg_tag']);
		$ctrl->setTg_ad_id($_POST['tg_ad_id']);
		$ctrl->saveTag();
	} else if ($_POST['action'] == "deleteTag") {
		$ctrl->setTg_id($_POST['tg_id']);
		$ctrl->deleteTag();
	} else if ($_POST['action'] == "deleteAdv") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->deleteAdv();
	} else if ($_POST['action'] == "holdAdv") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->holdAdv();
	} else if ($_POST['action'] == "activeAdv") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->activeAdv();
	} else if ($_POST['action'] == "activeAdvByAdmin") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->activeAdvByAdmin();
	} else if ($_POST['action'] == "rejectAdv") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->rejectAdv();
	} else if ($_POST['action'] == "tagsByAdID") {
		$ctrl->setTg_ad_id($_POST['tg_ad_id']);
		$ctrl->tagsByAdID();
	} else if ($_POST['action'] == "allAdvByLoggedUser") {
		$ctrl->allAdvByLoggedUser();
	} else if ($_POST['action'] == "loadAdvUpdateInfoByAdID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->loadAdvUpdateInfoByAdID();
	} else if ($_POST['action'] == "getAdvComboFilterByAdID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->getAdvComboFilterByAdID();
	} else if ($_POST['action'] == "getAdvTextboxFilterByAdID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->getAdvTextboxFilterByAdID();
	} else if ($_POST['action'] == "getClassifiedAdPageIDsByName") {
		$ctrl->setAd_maincategory($_POST['ad_maincategory']);
		$ctrl->setAd_subcategory($_POST['ad_subcategory']);
		$ctrl->setAd_country($_POST['ad_country']);
		$ctrl->setAd_state($_POST['ad_state']);
		$ctrl->setAd_city($_POST['ad_city']);
		$ctrl->getClassifiedAdPageIDsByName();
	} else if ($_POST['action'] == "LoadAllAdsByCategories") {
		$ctrl->setAd_maincategory($_POST['ad_maincategory']);
		$ctrl->setAd_subcategory($_POST['ad_subcategory']);
		$ctrl->setAd_country($_POST['ad_country']);
		$ctrl->setAd_state($_POST['ad_state']);
		$ctrl->setAd_city($_POST['ad_city']);
		$ctrl->LoadAllAdsByCategories();
	} else if ($_POST['action'] == "LoadAllAdsfilters") {
		$ctrl->setAd_maincategory($_POST['ad_maincategory']);
		$ctrl->setAd_subcategory($_POST['ad_subcategory']);
		$ctrl->setAd_country($_POST['ad_country']);
		$ctrl->setAd_state($_POST['ad_state']);
		$ctrl->setAd_city($_POST['ad_city']);
		$ctrl->LoadAllAdsfilters();
	} else if ($_POST['action'] == "LoadAllAdsfiltersByUserID") {
		$ctrl->setAd_usr_id($_POST['usr_id']);
		$ctrl->LoadAllAdsfiltersByUserID();
	} else if ($_POST['action'] == "LoadAdfiltersByID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->LoadAdfiltersByID();
	} else if ($_POST['action'] == "LoadAdInfoByUserID") {
		$ctrl->setAd_usr_id($_POST['usr_id']);
		$ctrl->LoadAdInfoByUserID();
	} else if ($_POST['action'] == "LoadAdInfoByID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->LoadAdInfoByID();
	} else if ($_POST['action'] == "getNumOfAdCountByAdID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->getNumOfAdCountByAdID();
	} else if ($_POST['action'] == "allAdv") {
		$ctrl->allAdv();
	} else if ($_POST['action'] == "allAdvAdmin") {
		$ctrl->allAdvAdmin();
	}
	else if ($_POST['action'] == "madeAdFilter") {
		$ctrl->setAd_maincategory($_POST['ad_maincategory']);
		$ctrl->setAd_subcategory($_POST['ad_subcategory']);
		$ctrl->setAd_country($_POST['ad_country']);
		$ctrl->setAd_state($_POST['ad_state']);
		$ctrl->setAd_city($_POST['ad_city']);
		$ctrl->madeAdFilter($_POST['filter_array']);
	}
	else if ($_POST['action'] == "generateFrontSearchValue") {
		$ctrl->setAd_subcategory($_POST['subcatname']);
		$ctrl->setAd_city($_POST['ad_city']);
		$ctrl->generateFrontSearchValue($_POST['keyword']);
	}
}
