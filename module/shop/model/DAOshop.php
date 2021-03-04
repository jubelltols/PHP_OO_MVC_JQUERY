<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/website/';
include($path . "model/connect.php");

class DAOShop{

    function select_all_products($items_page, $total_prod){
        $sql = "SELECT codigo_producto, nombre, precio, images FROM producto ORDER BY likes DESC LIMIT $total_prod, $items_page ";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function select_details($id){
        $sql = "SELECT codigo_producto, nombre, precio, talla, color, descripcion, images FROM `producto` WHERE codigo_producto = '$id'";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function update_view($id){
        $sql = "UPDATE producto SET likes = likes + 1 WHERE codigo_producto = '$id'";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function select_filters(){
        $array_filters = array('talla' , 'color', 'categoria');
        $array_return = array();
        foreach ($array_filters as $row) {
            $sql = 'SELECT DISTINCT ' . $row . ' FROM producto';
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            if (mysqli_num_rows($res) > 0) {
                while ($row_inner[] = mysqli_fetch_assoc($res)) {
                    $array_return[$row] = $row_inner;
                }// end_while
                unset($row_inner);
            }// end_if
        }//end_foreach
        return $array_return;
    }

    function sql_query($filters){
        $continue = "";
        $count = 0;
        $count1 = 0;
        $count3 = 0;
        $select = ' WHERE ';
        foreach ($filters as $key => $row) {
            foreach ( $row as $key => $row_inner) {
                if ($count == 0) {
                        foreach ( $row_inner as $value) {
                            if ($count1 == 0) {
                                $continue = $key . ' IN ("'. $value . '"';
                            }else {
                                $continue = $continue  . ', "' . $value . '"';
                            }
                            $count1++;
                        }
                        $continue = $continue . ')';
                }else {
                        foreach ($row_inner as $value)  {
                            if ($count2 == 0) {
                                $continue = ' AND ' . $key . ' IN ("' . $value . '"';
                            }else {
                                $continue = $continue . ', "' . $value . '"';
                            }
                            $count2++;
                        }
                        $continue = $continue . ')';
                    
                }
            }
            $count++;
            $count2 = 0;
            $select = $select . $continue;
        }
        return $select;
    }

    function select_filters_search($query, $total_prod, $items_page){
        $sql = "SELECT codigo_producto, nombre, precio, images FROM producto $query ORDER BY likes DESC LIMIT $total_prod, $items_page ";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function select_count(){
        $sql = "SELECT COUNT(*) AS n_prod FROM producto";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function select_count_filters($filters){
        $sql = "SELECT COUNT(*) AS n_prod FROM producto $filters";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

}

?>