<?php

    $path = $_SERVER['DOCUMENT_ROOT'] . '/PHP_OO_MVC_JQUERY/';
    include($path . "model/connect.php");
    
    class DAOHome{

        function select_carousel(){
			$sql = "SELECT * FROM `images`";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_categorias(){
            $sql = "SELECT * FROM `categoria`";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_brands($items, $loaded){
            $sql = "SELECT * FROM `brands` LIMIT $loaded, $items";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_count_brands(){
            $sql = "SELECT COUNT(*) as 'count' FROM `brands`";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        
    }

?>