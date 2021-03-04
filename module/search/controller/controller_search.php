<?php

    $path = $_SERVER['DOCUMENT_ROOT'] . "/website/";
    include ($path . "module/search/model/DAOsearch.php");

        switch($_GET['op']){

            case 'sexo':
                // echo json_encode("error");
                // exit;

                try{
                    $dao = new DAOSearch();
                    $rdo = $dao->select_sexo();
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

            case 'categoria':

                try{
                    $dao = new DAOSearch();
                    if(empty($_POST['sexo'])){
                        $rdo = $dao->select_categoria();
                    }else{
                        $rdo = $dao->select_sexo_categoria($_POST['sexo']);
                    }
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

            case 'autocomplete':

                try{
                    $dao = new DAOSearch();
                    if (!empty($_POST['sexo']) && empty($_POST['categoria'])){
                        $rdo = $dao->select_auto_sexo($_POST['complete'], $_POST['sexo']);
                    }else if(!empty($_POST['sexo']) && !empty($_POST['categoria'])){
                        $rdo = $dao->select_auto_sexo_categoria($_POST['complete'], $_POST['sexo'], $_POST['categoria']);
                    }else if(empty($_POST['sexo']) && !empty($_POST['categoria'])){
                        $rdo = $dao->select_auto_categoria($_POST['categoria'], $_POST['complete']);
                    }else {
                        $rdo = $dao->select_auto($_POST['complete']);
                    }
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
            
            default:
                include("view/inc/error/error404.php");
                break;
        }

?>
                      