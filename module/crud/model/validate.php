<?php
    
    function validate($codigo_producto){

        if(DAOProducts::select_codigo_producto($codigo_producto)){
            $check=false;
        }else {
            $check=true;
        }
        return $check;

    }