<?php

    $path = $_SERVER['DOCUMENT_ROOT'] . "/PHP_OO_MVC_JQUERY/";
    include ($path . "module/home/model/DAOhome.php");

        switch($_GET['op']){

            case 'homepage':
                include("module/home/view/home.html");
            break;

            case 'carousel':
                // echo json_encode("error");
                // exit;

                try{
                    $dao = new DAOHome();
                    $rdo = $dao->select_carousel();
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

            case 'categorias':
                // echo json_encode("error");
                // exit;

                try{
                    $dao = new DAOHome();
                    $rdo = $dao->select_categorias();
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

            case 'brands':
                try{
                    $dao = new DAOHome();
                    $rdo = $dao->select_brands($_POST['items'],$_POST['loaded']);
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

            case 'count_brands':
                try{
                    $dao = new DAOHome();
                    $rdo = $dao->select_count_brands();
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

            default;
                include("view/inc/error404.php");
                break;
        }