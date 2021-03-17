<?php

include '../models/kn_advModel.php';

$ctrl = new Kn_advModel();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "tblAdcategory") {
		$ctrl->tblAdcategory();
	} else if ($_POST['action'] == "tblAdcatPageFilter") {
		$ctrl->setCatfl_adcategory($_POST['catfl_adcategory']);
		$ctrl->tblAdcatPageFilter();
	}
	else if ($_POST['action'] == "tblFilterGroup") {
		$ctrl->setGrp_adcategory($_POST['grp_adcategory']);
		$ctrl->tblFilterGroup();
	}
	else if ($_POST['action'] == "getFilterGroupByCategoryName") {
		$ctrl->setAdcat_name($_POST['adcat_name']);
		$ctrl->getFilterGroupByCategoryName();
	}
	else if ($_POST['action'] == "getFilterByCategoryNameWithGroups") {
		$ctrl->setAdcat_name($_POST['adcat_name']);
		$ctrl->getFilterByCategoryNameWithGroups();
	}
	else if ($_POST['action'] == "tblgroupFilterInfo") {
		$ctrl->setGrinf_group($_POST['grinf_group']);
		$ctrl->tblgroupFilterInfo();
	}
	else if ($_POST['action'] == "getFilterGroupByID") {
		$ctrl->setGrp_id($_POST['grp_id']);
		$ctrl->getFilterGroupByID();
	} 	
	else if ($_POST['action'] == "getAllAdcategory") {
		$ctrl->getAllAdcategory();
	} else if ($_POST['action'] == "getAdcategoryByID") {
		$ctrl->setAdcat_id($_POST['adcat_id']);
		$ctrl->getAdcategoryByID();
	} else if ($_POST['action'] == "getAdcatPageFilterByID") {
		$ctrl->setCatfl_id($_POST['catfl_id']);
		$ctrl->getAdcatPageFilterByID();
	} else if ($_POST['action'] == "getAdcategoryByName") {
		$ctrl->setAdcat_name($_POST['adcat_name']);
		$ctrl->getAdcategoryByName();
	} else if ($_POST['action'] == "cmbAdcategory") {
		$ctrl->cmbAdcategory();
	} else if ($_POST['action'] == "loadAllAdCMBFilters") {
		$ctrl->loadAllAdCMBFilters();
	}
	else if ($_POST['action'] == "frontComboFilterLoader") {
		$ctrl->setAdcat_name($_POST['adcat_name']);
		$ctrl->frontComboFilterLoader();
	} 
	else if ($_POST['action'] == "textFilterBoxesByCategory") {
		$ctrl->setAdcat_name($_POST['adcat_name']);
		$ctrl->textFilterBoxesByCategory();
	} 
	else if ($_POST['action'] == "cmbCategoryFilterByCategoryID") {
		$ctrl->setAdcat_id($_POST['adcat_id']);
		$ctrl->cmbCategoryFilterByCategoryID();
	} 
	else if ($_POST['action'] == "cmbAllComboBoxFilter") {
		$ctrl->cmbAllComboBoxFilter();
	} else if ($_POST['action'] == "cmbAllTextBoxFilter") {
		$ctrl->cmbAllTextBoxFilter();
	}
	else if ($_POST['action'] == "saveAdcategory") {
		$ctrl->setAdcat_name($_POST['adcat_name']);
		$ctrl->saveAdcategory();
	}
	else if ($_POST['action'] == "loadAlladsByCategory") {
		$ctrl->setAdcat_name($_POST['adcat_name']);
		$ctrl->loadAlladsByCategory();
	}
	else if ($_POST['action'] == "loadLastTwentyAds") {		
		$ctrl->loadLastTwentyAds();
	}
	else if ($_POST['action'] == "saveAdcatPageFilter") {
		$ctrl->setCatfl_adcategory($_POST['catfl_adcategory']);
		$ctrl->setCatfl_filter($_POST['catfl_filter']);
		$ctrl->setCatfl_type($_POST['catfl_type']);
		$ctrl->saveAdcatPageFilter();
	} 
	else if ($_POST['action'] == "saveFilterGroup") {
		$ctrl->setGrp_name($_POST['grp_name']);
		$ctrl->setGrp_adcategory($_POST['grp_adcategory']);
		$ctrl->saveFilterGroup();
	} 
	else if ($_POST['action'] == "saveGroupFilterInfo") {
		$ctrl->setGrinf_group($_POST['grinf_group']);
		$ctrl->setGrinf_filter($_POST['grinf_filter']);
		$ctrl->saveGroupFilterInfo();
	} 
	else if ($_POST['action'] == "editAdcategory") {
		$ctrl->setAdcat_id($_POST['adcat_id']);
		$ctrl->setAdcat_name($_POST['adcat_name']);
		$ctrl->editAdcategory();
	}
	else if ($_POST['action'] == "editNameofAnyFilter") {
		$ctrl->setCatfl_filter($_POST['catfl_filter']);
		$ctrl->setCatfl_type($_POST['catfl_type']);
		$ctrl->editNameofAnyFilter($_POST['filter_name']);
	}
	else if ($_POST['action'] == "editFilterGroup") {
		$ctrl->setGrp_id($_POST['grp_id']);
		$ctrl->setGrp_name($_POST['grp_name']);
		$ctrl->setGrp_adcategory($_POST['grp_adcategory']);
		$ctrl->editFilterGroup();
	} else if ($_POST['action'] == "editAdcatPageFilter") {
		$ctrl->setCatfl_adcategory($_POST['catfl_adcategory']);
		$ctrl->setCatfl_filter($_POST['catfl_filter']);
		$ctrl->setCatfl_type($_POST['catfl_type']);
		$ctrl->setCatfl_id($_POST['catfl_id']);
		$ctrl->editAdcatPageFilter();
	} else if ($_POST['action'] == "deleteAdcategory") {
		$ctrl->setAdcat_id($_POST['adcat_id']);
		$ctrl->deleteAdcategory();
	}
	else if ($_POST['action'] == "deleteFilterGroup") {
		$ctrl->setGrp_id($_POST['grp_id']);
		$ctrl->deleteFilterGroup();
	} 
	else if ($_POST['action'] == "deleteGroupFilterInfo") {
		$ctrl->setGrinf_id($_POST['grinf_id']);
		$ctrl->deleteGroupFilterInfo();
	} 
	else if ($_POST['action'] == "deleteAd") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->deleteAd();
	}
	else if ($_POST['action'] == 'loadAdImages') {
		$directory = "../../asset_imageuploader/aphotoupload/" . $_POST['ad_id'] . "/";
		$files = scandir($directory);
		$files = array_diff($files, ['.', '..', 'thumbnail']);
		$files = array_values(array_filter($files));
		echo json_encode($files);
	}
	else if ($_POST['action'] == "deleteAdcatPageFilter") {
		$ctrl->setCatfl_id($_POST['catfl_id']);
		$ctrl->deleteAdcatPageFilter();
	}
	else if ($_POST['action'] == "tblAdByUser") {		
		$ctrl->tblAdByUser();
	}	
	else if ($_POST['action'] == "saveAdv") {
		$ctrl->setAd_category($_POST['ad_category']);
		$ctrl->setAd_title($_POST['ad_title']);
		$ctrl->setAd_phone($_POST['ad_phone']);
		$ctrl->setAd_email($_POST['ad_email']);		
		$ctrl->setAd_description($_POST['ad_description']);
		$ctrl->setAd_soc_fb($_POST['ad_soc_fb']);
		$ctrl->setAd_soc_ig($_POST['ad_soc_ig']);
		$ctrl->setAd_soc_twitter($_POST['ad_soc_twitter']);
		$ctrl->saveAdv($_POST['cmboxes'],$_POST['txboxes']);
	} 
	else if ($_POST['action'] == "getAdvByID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->getAdvByID();
	}
	else if ($_POST['action'] == "getAdvOptionByID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->getAdvOptionByID();
	}
	else if ($_POST['action'] == "loadComboBoxByAdID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->loadComboBoxByAdID();
	}
	else if ($_POST['action'] == "loadFrontAdByAdID") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->loadFrontAdByAdID();
	}
	else if ($_POST['action'] == "changeAdStatus") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->setAd_status($_POST['ad_status']);
		$ctrl->changeAdStatus();
	}
	else if ($_POST['action'] == "editAdv") {
		$ctrl->setAd_id($_POST['ad_id']);
		$ctrl->setAd_category($_POST['ad_category']);
		$ctrl->setAd_title($_POST['ad_title']);
		$ctrl->setAd_phone($_POST['ad_phone']);
		$ctrl->setAd_email($_POST['ad_email']);		
		$ctrl->setAd_description($_POST['ad_description']);
		$ctrl->setAd_soc_fb($_POST['ad_soc_fb']);
		$ctrl->setAd_soc_ig($_POST['ad_soc_ig']);
		$ctrl->setAd_soc_twitter($_POST['ad_soc_twitter']);
		$ctrl->editAdv($_POST['cmboxes'],$_POST['txboxes']);
	} 
	else if ($_POST['action'] == "tblAllPointsEarnedUsers") {		
		$ctrl->tblAllPointsEarnedUsers();
	}
	else if ($_POST['action'] == "tblAllUseresEarnedPoints") {		
		$ctrl->tblAllUseresEarnedPoints();
	}
	
}