<?php

include '../models/adFilterSettings.php';

$ctrl = new AdFilterSettings();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "saveFilterGroup") {
		$ctrl->setGrp_name($_POST['grp_name']);
		$ctrl->setGrp_admaincategory($_POST['grp_admaincategory']);
		$ctrl->setGrp_adsubcategory($_POST['grp_adsubcategory']);
		$ctrl->saveFilterGroup();
	} else if ($_POST['action'] == "editFilterGroup") {
		$ctrl->setGrp_id($_POST['grp_id']);
		$ctrl->setGrp_name($_POST['grp_name']);
		$ctrl->setGrp_admaincategory($_POST['grp_admaincategory']);
		$ctrl->setGrp_adsubcategory($_POST['grp_adsubcategory']);
		$ctrl->editFilterGroup();
	} else if ($_POST['action'] == "deleteFilterGroup") {
		$ctrl->setGrp_id($_POST['grp_id']);
		$ctrl->deleteFilterGroup();
	} else if ($_POST['action'] == "getFilterGroupByID") {
		$ctrl->setGrp_id($_POST['grp_id']);
		$ctrl->getFilterGroupByID();
	} 
	else if ($_POST['action'] == "tblFilterGroup") {
		$ctrl->setGrp_admaincategory($_POST['grp_admaincategory']);
		$ctrl->setGrp_adsubcategory($_POST['grp_adsubcategory']);
		$ctrl->tblFilterGroup();
	}
	else if ($_POST['action'] == "getMainCatSubCatIDsByText") {		
		$ctrl->getMainCatSubCatIDsByText($_POST['maincategory'],$_POST['subcategory']);
	}
	else if ($_POST['action'] == "getFilterGroupByOrder") {		
		$ctrl->setGrp_admaincategory($_POST['grp_admaincategory']);
		$ctrl->setGrp_adsubcategory($_POST['grp_adsubcategory']);
		$ctrl->getFilterGroupByOrder();
	}
	else if ($_POST['action'] == "tblPageAllFilterGroupsByCategory") {
		$ctrl->setGrp_admaincategory($_POST['grp_admaincategory']);
		$ctrl->setGrp_adsubcategory($_POST['grp_adsubcategory']);
		$ctrl->tblPageAllFilterGroupsByCategory();
	} else if ($_POST['action'] == "cmbCategoryFilterByCategory") {
		$ctrl->setCatfl_admaincategory($_POST['catfl_admaincategory']);
		$ctrl->setCatfl_adsubcategory($_POST['catfl_adsubcategory']);
		$ctrl->cmbCategoryFilterByCategory();
	} else if ($_POST['action'] == "tblgroupFilterInfo") {
		$ctrl->setGrinf_group($_POST['grinf_group']);
		$ctrl->tblgroupFilterInfo();
	} else if ($_POST['action'] == "deleteGroupFilterInfo") {
		$ctrl->setGrinf_id($_POST['grinf_id']);
		$ctrl->deleteGroupFilterInfo();
	} 
	else if ($_POST['action'] == "tblAdcatPageFilter") {
		$ctrl->setCatfl_adsubcategory($_POST['catfl_adsubcategory']);
		$ctrl->setCatfl_admaincategory($_POST['catfl_admaincategory']);
		$ctrl->tblAdcatPageFilter();
	}
	else if ($_POST['action'] == "tblAdcatPageFilterByOrder") {
		$ctrl->setCatfl_adsubcategory($_POST['catfl_adsubcategory']);
		$ctrl->setCatfl_admaincategory($_POST['catfl_admaincategory']);
		$ctrl->tblAdcatPageFilterByOrder();
	}
	else if ($_POST['action'] == "categoryComboBoxFiltersByOrder") {
		$ctrl->setCatfl_adsubcategory($_POST['catfl_adsubcategory']);
		$ctrl->setCatfl_admaincategory($_POST['catfl_admaincategory']);
		$ctrl->categoryComboBoxFiltersByOrder();
	}
	else if ($_POST['action'] == "categoryTextBoxFiltersByOrder") {
		$ctrl->setCatfl_adsubcategory($_POST['catfl_adsubcategory']);
		$ctrl->setCatfl_admaincategory($_POST['catfl_admaincategory']);
		$ctrl->categoryTextBoxFiltersByOrder();
	}
	else if ($_POST['action'] == "getAdcatPageFilterByID") {
		$ctrl->setCatfl_id($_POST['catfl_id']);
		$ctrl->getAdcatPageFilterByID();
	} else if ($_POST['action'] == "deleteAdcatPageFilter") {
		$ctrl->setCatfl_id($_POST['catfl_id']);
		$ctrl->deleteAdcatPageFilter();
	} else if ($_POST['action'] == "saveAdcatPageFilter") {
		$ctrl->setCatfl_admaincategory($_POST['catfl_admaincategory']);
		$ctrl->setCatfl_adsubcategory($_POST['catfl_adsubcategory']);
		$ctrl->setCatfl_filter($_POST['catfl_filter']);
		$ctrl->setCatfl_type($_POST['catfl_type']);
		$ctrl->saveAdcatPageFilter();
	} else if ($_POST['action'] == "editAdcatPageFilter") {
		$ctrl->setCatfl_adcategory($_POST['catfl_adcategory']);
		$ctrl->setCatfl_filter($_POST['catfl_filter']);
		$ctrl->setCatfl_type($_POST['catfl_type']);
		$ctrl->setCatfl_id($_POST['catfl_id']);
		$ctrl->editAdcatPageFilter();
	} else if ($_POST['action'] == "saveGroupFilterInfo") {
		$ctrl->setGrinf_group($_POST['grinf_group']);
		$ctrl->setGrinf_filter($_POST['grinf_filter']);
		$ctrl->setGrinf_filtertype($_POST['grinf_filtertype']);
		$ctrl->saveGroupFilterInfo();
	} else if ($_POST['action'] == "setGroupFilterOrder") {
		$ctrl->setGrp_id($_POST['grp_id']);
		$ctrl->setGrp_disp_order($_POST['grp_disp_order']);
		$ctrl->setGroupFilterOrder();
	} else if ($_POST['action'] == "arrayDifferent") {
		$array1 = $_POST['ar1'];
		$array2 = $_POST['ar2'];
		if (!empty($array2)) {
			$newArray = array_diff($array1, $array2);
		} else {
			$newArray = $array1;
		}
		echo json_encode($newArray);
	}
}
