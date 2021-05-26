<?php

    $path = $_SERVER['DOCUMENT_ROOT'] . '/PHP_OO_MVC_JQUERY/';
    include($path . "model/connect.php");
    
    class DAOSearch{

        function select_sexo(){
            
			$sql = "SELECT DISTINCT color FROM producto";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_categoria(){
            
            $sql = "SELECT DISTINCT categoria FROM `producto`";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_sexo_categoria($sexo){
            
            $sql = "SELECT DISTINCT categoria FROM `producto` WHERE color='$sexo'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_auto_sexo($auto, $sexo){
            
            $sql = "SELECT nombre FROM `producto` WHERE color='$sexo' AND nombre LIKE '$auto%'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_auto_sexo_categoria($auto, $sexo, $categoria){
            
            $sql = "SELECT nombre FROM `producto` WHERE color='$sexo' AND categoria='$categoria' AND nombre LIKE '$auto%'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_auto_categoria($auto, $categoria){
            
            $sql = "SELECT nombre FROM `producto` WHERE categoria='$categoria' AND nombre LIKE '$auto%'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function select_auto($auto){
            
            $sql = "SELECT nombre FROM `producto` WHERE nombre LIKE '$auto%'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        
    }

?>