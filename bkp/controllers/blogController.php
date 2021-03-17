<?php

include '../models/blog.php';

$ctrl = new Blog();
if (array_key_exists("action", $_POST)) {
    if ($_POST['action'] == "getAllBlog") {
        $ctrl->getAllBlog();
    } 
    else if ($_POST['action'] == "getAllBlogByLoggedUser") {
		$ctrl->setBlg_usr($_POST['blg_usr']);
        $ctrl->getAllBlogByLoggedUser();		
    } 
//	else if ($_POST['action'] == "getAllGLTerms") {        
//        $ctrl->getAllGLTerms();
//    } 
//	else if ($_POST['action'] == "getAllGLTermsFront") {        
//        $ctrl->getAllGLTermsFront();
//    } 
	else if ($_POST['action'] == "getBlogByID") {
        $ctrl->setBlg_id($_POST['blg_id']);
        $ctrl->getBlogByID();
    } 
//	else if ($_POST['action'] == "getGLTermsByID") {
//        $ctrl->setGl_id($_POST['gl_id']);
//        $ctrl->getGLTermsByID();
//    } 
//	else if ($_POST['action'] == "getGLTermsByIDFront") {
//        $ctrl->setGl_id($_POST['gl_id']);
//        $ctrl->getGLTermsByIDFront();
//    } 
	else if ($_POST['action'] == "deleteBlog") {
        $ctrl->setBlg_id($_POST['blg_id']);
        $ctrl->deleteBlog();
    }
//	else if ($_POST['action'] == "deleteGLTerms") {
//        $ctrl->setGl_id($_POST['gl_id']);
//        $ctrl->deleteGLTerms();
//    }
	else if ($_POST['action'] == "saveBlog") {
        $ctrl->setBlg_title($_POST['blg_title']);
        $ctrl->setBlg_body($_POST['blg_body']);
        $ctrl->setBlg_maincat($_POST['blg_maincat']);
        $ctrl->setBlg_subcat($_POST['blg_subcat']);
        $ctrl->saveBlog();
    }
	else if ($_POST['action'] == "saveBlogByLoggedUser") {
        $ctrl->setBlg_title($_POST['blg_title']);
        $ctrl->setBlg_body($_POST['blg_body']);
        $ctrl->setBlg_maincat($_POST['blg_maincat']);
        $ctrl->setBlg_subcat($_POST['blg_subcat']);
        $ctrl->saveBlogByLoggedUser();
    }
//	else if ($_POST['action'] == "saveGLTerms") {
//        $ctrl->setGl_heading($_POST['gl_heading']);
//        $ctrl->setGl_long_desc($_POST['gl_long_desc']);
//        $ctrl->setGl_short_desc($_POST['gl_short_desc']);        
//        $ctrl->saveGLTerms();
//    }
	else if ($_POST['action'] == 'editBlog') {
        $ctrl->setBlg_id($_POST['blg_id']);
        $ctrl->setBlg_title($_POST['blg_title']);
        $ctrl->setBlg_body($_POST['blg_body']);
        $ctrl->setBlg_maincat($_POST['blg_maincat']);
        $ctrl->setBlg_subcat($_POST['blg_subcat']);
        $ctrl->editBlog();
    } 
//	else if ($_POST['action'] == 'editGLTerms') {
//        $ctrl->setGl_id($_POST['gl_id']);
//        $ctrl->setGl_heading($_POST['gl_heading']);
//        $ctrl->setGl_long_desc($_POST['gl_long_desc']);
//        $ctrl->setGl_short_desc($_POST['gl_short_desc']);      
//        $ctrl->editGLTerms();
//    } 
	else if ($_POST['action'] == 'getAllBlogYear') {
        $ctrl->getAllBlogYear();
    } else if ($_POST['action'] == 'getAllBlogMonth') {
        $ctrl->getAllBlogMonth();
    } else if ($_POST['action'] == 'getAllBlogDate') {
        $ctrl->getAllBlogDate();
    } else if ($_POST['action'] == 'getAllBlogByDate') {
        $ctrl->getAllBlogByDate($_POST['blg_date']);
    } else if ($_POST['action'] == 'getAllBlogByToday') {
        $ctrl->getAllBlogByToday();
    }
}