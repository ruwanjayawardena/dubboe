<?php

include '../models/subCombo.php';

/**
 * @author Ruwan Jayawardena
 */
$ctrl = new SubCombo();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "getAllSubCombo") {
		$ctrl->setScmb_maincmb($_POST['scmb_maincmb']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->getAllSubCombo();
	} else if ($_POST['action'] == "getSubComboByID") {
		$ctrl->setScmb_id($_POST['scmb_id']);
		$ctrl->getSubComboByID();
	} else if ($_POST['action'] == "cmbSubCombo") {
		$ctrl->setScmb_maincmb($_POST['mcmb_id']);
		$ctrl->cmbSubCombo();
	} else if ($_POST['action'] == "deleteSubCombo") {
		$ctrl->setScmb_id($_POST['scmb_id']);
		$mcmb_img_values_have = $_POST['mcmb_img_values_have'];
		if($mcmb_img_values_have == 1){
			$mcmb_img_folder_path = "../../asset_imageuploader/".$_POST['foldername']."/" . $_POST['scmb_id'];
		}	
		$ctrl->deleteSubCombo($mcmb_img_values_have,$mcmb_img_folder_path);
	} else if ($_POST['action'] == "saveSubCombo") {
		$ctrl->setScmb_name($_POST['scmb_name']);
		$ctrl->setScmb_maincmb($_POST['scmb_maincmb']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->saveSubCombo();
	} else if ($_POST['action'] == 'editSubCombo') {
		$ctrl->setScmb_id($_POST['scmb_id']);
		$ctrl->setScmb_name($_POST['scmb_name']);
		$ctrl->editSubCombo();
	}
	//main combo box
	else if ($_POST['action'] == 'getMainComboInfoByID') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->getMainComboInfoByID();
	} else if ($_POST['action'] == 'getNavbarSubFilterByID') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->setMcmb_relatetsub($_POST['mcmb_relatetsub']);
		$ctrl->getNavbarSubFilterByID();
	}
	//relate combo box
	else if ($_POST['action'] == 'saveRelateCombo') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->setRlcmb_name($_POST['rlcmb_name']);
		$ctrl->saveRelateCombo();
	} else if ($_POST['action'] == 'editRelateCombo') {
		$ctrl->setRlcmb_id($_POST['rlcmb_id']);
		$ctrl->setRlcmb_name($_POST['rlcmb_name']);
		$ctrl->editRelateCombo();
	} else if ($_POST['action'] == 'deleteRelateCombo') {
		$ctrl->setRlcmb_id($_POST['rlcmb_id']);	
		$mcmb_img_folder_path = "";
		$mcmb_img_values_have = $_POST['mcmb_img_values_have'];
		if($mcmb_img_values_have == 1){
			$mcmb_img_folder_path = "../../asset_imageuploader/".$_POST['foldername']."/" . $_POST['rlcmb_id'];
		}		
		$ctrl->deleteRelateCombo($mcmb_img_values_have,$mcmb_img_folder_path);
	} else if ($_POST['action'] == 'getAllRelateCombo') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->getAllRelateCombo();
	} else if ($_POST['action'] == 'getRelateComboByID') {
		$ctrl->setRlcmb_id($_POST['rlcmb_id']);
		$ctrl->getRelateComboByID();
	} 
	else if ($_POST['action'] == 'cmbRelateCombo') {
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->cmbRelateCombo();
	}
	else if ($_POST['action'] == 'cmbLoadHomeLocation') {		
		$ctrl->cmbLoadHomeLocation();
	}
	else if ($_POST['action'] == 'cmbLoadHomeCategory') {		
		$ctrl->cmbLoadHomeCategory();
	}
	else if ($_POST['action'] == 'getCmbRelateComboFirstID') {		
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->getCmbRelateComboFirstID();
	}
	else if ($_POST['action'] == 'getCmbRelateSubComboFirstID') {		
		$ctrl->setScmb_maincmb($_POST['scmb_maincmb']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->getCmbRelateSubComboFirstID();
	}
	else if ($_POST['action'] == 'cmbRelateSubCombo') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->setRlcmb_id($_POST['rlcmb_id']);
		$ctrl->cmbRelateSubCombo();
	}
	else if ($_POST['action'] == 'cmbRelateSubComboWidget') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->cmbRelateSubComboWidget();
	}
	else if ($_POST['action'] == 'cmbRelateSubComboRelation') {
		$ctrl->setScmb_maincmb($_POST['scmb_maincmb']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->cmbRelateSubComboRelation();
	}
	else if ($_POST['action'] == 'cmbRelateSubComboRelationSelected') {
		$ctrl->setScmb_maincmb($_POST['scmb_maincmb']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->cmbRelateSubComboRelationSelected($_POST['selected']);
	}
	
	else if ($_POST['action'] == 'getCmbByTOPRelateSubComboID') {		
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->getCmbByTOPRelateSubComboID();
	}
	else if ($_POST['action'] == 'getCmbByTOPRelateSubComboCheck') {		
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->getCmbByTOPRelateSubComboCheck();
	}
	else if ($_POST['action'] == 'getAllRelateCMBFirstKeysFrom2ndRelateCMB') {		
		$ctrl->getAllRelateCMBFirstKeysFrom2ndRelateCMB($_POST['category'], $_POST['sc_relate_cmb_id']);
	}
	//Relate Sub Combo
	else if ($_POST['action'] == 'editRelateSubCombo') {
		$ctrl->setScmb_id($_POST['scmb_id']);
		$ctrl->setScmb_name($_POST['scmb_name']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->editRelateSubCombo();
	}
}