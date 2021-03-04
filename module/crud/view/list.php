<div id="contenido">
    <div class="container">
        <br>
        <br>
        <br>
    	<div class="tittle text-center font-weight-bold">
            <h2 data-tr="LISTA DE PRODUCTOS"></h2>
        </div>
        <div class="row">
            <p>
                <a href="index.php?page=controller_crud&op=create" class="button" data-tr="Añadir producto"></a>
                <a class="button" href="index.php?page=controller_crud&op=delete_all&id='.$row['nombre'].'" data-tr="Eliminar todo"></a>
            </p> 
    	</div>
    	<div class="row">
    		<table id="table_crud">
                <thead>
                    <tr>
                        <td width=125><b data-tr="Nombre"></b></th>
                        <td width=125><b data-tr="Precio"></b></th>
                        <td width=125><b data-tr="Talla"></b></th>
                        <th width=350><b data-tr="Accion"></b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($rdo->num_rows === 0){
                            echo '<tr>';
                            echo '<td align="center"  colspan="3">NO HAY NINGUN USUARIO</td>';
                            echo '</tr>';
                        }else{
                            foreach ($rdo as $row) {
                                echo '<tr>';
                                echo '<td width=125>'. $row['nombre'] . '</td>';
                                echo '<td width=125>'. $row['precio'] . '</td>';
                                echo '<td width=125>'. $row['talla'] . '</td>';
                                echo '<td width=350>';

                                echo '<a class="button modaal" id="'.$row['codigo_producto'].'" data-tr="Leer"></a>';
                                echo '&nbsp;';
                                /* echo '<a class="btn button-style mt-md-5 mt-4" href="index.php?page=controller_crud&op=read&id='.$row['codigo_producto'].'" data-tr="Leer"></a>';
                                echo '&nbsp;'; */
                                echo '<a class="button" href="index.php?page=controller_crud&op=update&id='.$row['codigo_producto'].'" data-tr="Modificar"></a>';
                                echo '&nbsp;';
                                echo '<a class="button" href="index.php?page=controller_crud&op=delete&id='.$row['codigo_producto'].'" data-tr="Eliminar"></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>    
            </table>
    	</div>
    </div>
</div>

<!-- modal window -->
<div id="details_modal">
   
</div>