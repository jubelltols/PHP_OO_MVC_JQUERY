<?php

   $path = $_SERVER['DOCUMENT_ROOT'] . "/website/";
   include ($path . "module/shop/model/DAOshop.php");
    
    switch($_GET['op']){

        case 'view';
            include("module/shop/view/shop.html");
            break;
        
        case 'list';
            try{
                $dao = new DAOShop();
                $rdo = $dao->select_all_products($_POST['items_page'],$_POST['total_prod']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
            }
            break;
           
        case 'details';
            try{
                $dao = new DAOShop();
                $rdo = $dao->select_details($_GET['id']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
            }
            break;

        case 'most_visit';
            try{
                $dao = new DAOShop();
                $rdo = $dao->update_view($_POST['id']);
            }catch (Exception $e){ 
                echo json_encode("error");
                exit;
            }
            break; 

        case 'filters';

            try{
                $dao = new DAOShop();
                $rdo = $dao->select_filters();
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
            break;

        case 'filters_search';    
            try{
                $dao = new DAOShop();
                $filters = json_decode($_GET['filters']);
                $query = $dao->sql_query($filters);
                $rdo = $dao->select_filters_search($query, $_POST['items_page'],$_POST['total_prod']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode($rdo);
                exit;
            }else{
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
            }
            break;  
        
        case 'count';    
            try{
                $dao = new DAOShop();
                $rdo = $dao->select_count();
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
            }
            break;
        
        case 'count_filters';    
            try{
                $dao = new DAOShop();
                $filters = json_decode($_GET['filters']);
                $query = $dao->sql_query($filters);
                $rdo = $dao->select_count_filters($query);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
            }
            break;
 
        default;
            include("view/inc/error404.php");
            break;
    }