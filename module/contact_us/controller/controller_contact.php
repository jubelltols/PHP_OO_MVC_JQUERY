<?php
        $path = $_SERVER['DOCUMENT_ROOT'] . "/website/";
        include ($path . "module/contact_us/model/DAOcontact.php");

        switch($_GET['op']){
                case 'contact';
                        include("module/contact_us/view/contact_us.html");
                        break;
                        
                case 'google_maps';
                        try{
                                $dao = new DAOContact();
                                $rdo = $dao->select_maps();
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
    
?>
