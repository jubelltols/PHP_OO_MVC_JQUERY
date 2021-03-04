<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/website/';
    include($path . "model/connect.php");
    
	class DAOProducts{
		function insert_producto($datos){
			
				$codigo_producto=$datos[codigo_producto];
				$nombre=$datos[nombre];
				$precio=$datos[precio];
				$talla=$datos[talla];
				$color=$datos[color];
				$descripcion=$datos[descripcion];
				$images=$datos[images];
				$categoria=$datos[categoria];
				$sexo=$datos[sexo];

				$sql = "INSERT INTO `producto`(`codigo_producto`, `nombre`, `precio`, `talla`, `color`, `descripcion`, `images`, `categoria`, `sexo`, `likes`) 
									   VALUES ('$codigo_producto','$nombre','$precio','$talla', '$color','$descripcion','$images', '$categoria', '$sexo', '0')";
				$conexion = connect::con();
				$res = mysqli_query($conexion, $sql);
				connect::close($conexion);
				return $res;	
		}
		
		function select_all_producto(){
			$sql = "SELECT * FROM `producto` ORDER BY codigo_producto ASC";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
		
		function select_producto($codigo_producto){
			$sql = "SELECT * FROM `producto` WHERE  codigo_producto='$codigo_producto'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}
		
		function select_codigo_producto($codigo_producto){
			$sql = "SELECT * FROM producto WHERE codigo_producto='$codigo_producto'";
			
			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql)->fetch_object();
			connect::close($conexion);
			return $res;
		}

		function update_producto($datos){
			
			$codigo_producto=$datos[codigo_producto];
			$nombre=$datos[nombre];
			$precio=$datos[precio];
			$talla=$datos[talla];
			$color=$datos[color];
			$descripcion=$datos[descripcion];
			$images=$datos[images];
			$categoria=$datos[categoria];
			$sexo=$datos[sexo]; 
        	
        	$sql = "UPDATE `producto` SET `nombre`='$nombre',`precio`='$precio',`talla`='$talla',`color`='$color',`descripcion`= '$descripcion',`images`= '$images',`categoria`= '$categoria',`sexo` = '$sexo',`likes` = '$likes' WHERE codigo_producto = $codigo_producto";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
        
        function delete_product($id){
			$sql = "DELETE FROM `producto` WHERE codigo_producto = '$id'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}

		function delete_all_producto(){
			$sql = "DELETE FROM `producto` ";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}

	}