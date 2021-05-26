<?php

$path = $_SERVER['DOCUMENT_ROOT'] . "/PHP_OO_MVC_JQUERY/";
   include ($path . "module/crud/model/DAOproducts.php");
    
    switch($_GET['op']){

        case 'list';
            try{
                $dao = new DAOProducts();
                $rdo = $dao->select_all_producto();
            }
            catch (Excepusertion $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
    		       $callback = 'index.php?page=503';
			        die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                   include("module/crud/view/list.php");
    		}
        break;

        case 'create';

                include("module/crud/model/validate.php");
                $check = true;
               
                if ($_POST){

                    $check=validate($_POST['codigo_producto']);
                    
                    if ($check){
                        $_SESSION['codigo_producto']=$_POST;
                        try{
                            $dao = new DAOProducts();
                            $rdo = $dao->insert_producto($_POST);
                        }catch (Exception $e){
                            $callback = 'index.php?page=503';
                            die('<script>window.location.href="'.$callback .'";</script>'); 
                        }
                        
                        if($rdo){
                            echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
                            $callback = 'index.php?page=controller_crud&op=list';
                            die('<script>window.location.href="'.$callback .'";</script>');
                        }else{
                            $callback = 'index.php?page=503';
                            die('<script>window.location.href="'.$callback .'";</script>');
                        } 
                    }else{
                        $error_codigo_producto = "El codigo de producto ya esta en uso, prueba otro";
                    }

                }  
            
            include("module/crud/view/create.php");
        break;

        case 'read';
            try{
                $dao = new DAOProducts();
            	$rdo = $dao->select_producto($_GET['id']);
            	$producto = get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/crud/view/read.php");
    		}
        break;

        case 'update';

            include("module/crud/model/validate.php");
            $check = true;
            
            if ($_POST){

                try{
                    $dao = new DAOProducts();
                    $rdo = $dao->update_producto($_POST);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if($rdo){
                    echo '<script language="javascript">alert("Actualizado en la base de datos correctamente")</script>';
                    $callback = 'index.php?page=controller_crud&op=list';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
            }
            
            try{
                $dao = new DAOProducts();
                $rdo = $dao->select_producto($_GET['id']);
                $producto = get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                include("module/crud/view/update.php");
            }
        break;

        case 'delete';

            if (isset($_POST['delete'])){
                try{
                    $dao = new DAOProducts();
                    $rdo = $dao->delete_product($_GET['id']);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
    			    die('<script>window.location.href="'.$callback .'";</script>');
                }
            	if($rdo){
        			echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
        			$callback = 'index.php?page=controller_crud&op=list';
    			    die('<script>window.location.href="'.$callback .'";</script>');
        		}else{
        			$callback = 'index.php?page=503';
			        die('<script>window.location.href="'.$callback .'";</script>');
        		}
            }

            try{
                $dao = new DAOProducts();
            	$rdo = $dao->select_producto($_GET['id']);
            	$producto = get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
            if(!$rdo){
    			$callback = 'index.php?page=503';
    			die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
        	    include("module/crud/view/delete.php");
    		}
        break;

        case 'delete_all';
            try{
                $dao = new DAOProducts();
                $rdo = $dao->delete_all_producto();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }

            if(!$rdo){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                $callback = 'index.php?page=controller_crud&op=list';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
        break;

        case 'read_modal':
            try{
                $dao = new DAOProducts();
            	$rdo = $dao->select_producto($_GET['modal']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
    			echo json_encode("error");
                exit;
    		}else{
                $producto = get_object_vars($rdo);
                echo json_encode($producto);
                exit;
            }
        break;

        default;
        include("view/inc/error404.php");
        break;

    }