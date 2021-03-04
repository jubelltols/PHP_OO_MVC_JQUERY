<?php

    $path = $_SERVER['DOCUMENT_ROOT'] . '/website/';
    include($path . "model/connect.php");
    
    class DAOContact{

        function select_maps(){
			$sql = "SELECT longitud, latitud, telefono FROM tiendas";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        
    }

?>