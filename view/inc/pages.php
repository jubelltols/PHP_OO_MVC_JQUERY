<?php
    if(!isset($_GET['page'])){
        include("module/home/view/home.html");
    }else{
        switch($_GET['page']){
            case "controller_home";
			    include("module/home/controller/".$_GET['page'].".php");
                break;
            case "controller_shop";
                include("module/shop/controller/".$_GET['page'].".php");
                break;
            case "controller_crud";
                include("module/crud/controller/".$_GET['page'].".php");
                break;
            case "controller_contact";
                include("module/contact_us/controller/".$_GET['page'].".php");
                break;
            case "404";
                include("view/inc/error".$_GET['page'].".html");
                break;
            case "503";
                include("view/inc/error".$_GET['page'].".html");
                break;
            default;
                include("module/home/view/home.html");
                break;
        }
    }
?>