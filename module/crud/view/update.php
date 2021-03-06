<div class="form__container bd-container bd-grid">
<br>
        <form autocomplete="on" method="post" name="update" id="update" >
            <div class="form__content">

                <div class="form__input">
                    <label>Codigo producto:</label>
                    <input class="form-control" type="text" id="codigo_producto" name="codigo_producto" value="<?php echo $producto['codigo_producto'];?>" readonly>
                </div>

                <div class="form__input">
                    <label>Nombre:</label>
                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Vans Old Skool" value="<?php echo $producto['nombre'];?>">
                    <font color="red">
                        <span id="error_nombre" class="error"></span>
                    </font>
                </div>
            
                <div class="form__input">
                    <label>Precio:</label>
                    <input class="form-control" type="text" id="precio" name="precio" placeholder="90€" value="<?php echo $producto['precio'];?>">
                    <font color="red">
                        <span id="error_precio" class="error"></span>
                    </font>
                </div>

                <div class="form__input">
                    <label>Talla:</label>
                    <input class="form-control" input type="text" id= "talla" name="talla" placeholder="43" value="<?php echo $producto['talla'];?>">
                    <font color="red">
                        <span id="error_talla" class="error"></span>
                    </font>
                </div>
        
                <div class="form__input">
                    <label>Color:</label>
                    <br>
                    <input class="check" type="checkbox" id= "color[]" name="color[]" value="Azul"/><label for=color[] value="Azul">Azul</label>
                    <input class="check" type="checkbox" id= "color[]" name="color[]" value="Amarillo"/><label for=color[] value="Amarillo">Amarillo</label>
                    <input class="check" type="checkbox" id= "color[]" name="color[]" value="Rojo"/><label for=color[] value="Rojo">Rojo</label>
                    <input class="check" type="checkbox" id= "color[]" name="color[]" value="Verde"/><label for=color[] value="Verde">Verde</label>
                    <span class="checkmark"></span>
                    <font color="red">
                        <span id="error_color" class="error"></span>
                    </font>                            
                </div>

                <div class="form__input">
                    <label>Imagen:</label>
                    <input class="form-control" type="text" id="images" name="images" placeholder="view/images/zapatillas-adidas-campus-adv-negro.png" value="<?php echo $producto['images'];?>">
                    <font color="red">
                        <span id="error_images" class="error"></span>
                    </font>
                </div>
            
                <div class="form__input">
                    <label>Sexo:</label><br>
                    <input type="radio" id="sexo" name="sexo" placeholder="sexo" value="Hombre"/>Hombre
                    <input type="radio" id="sexo" name="sexo" placeholder="sexo" value="Mujer"/>Mujer
                    <input type="radio" id="sexo" name="sexo" placeholder="sexo" value="Niño"/>Niño
                    <font color="red">
                        <span id="error_sexo" class="error"></span>
                    </font>
                </div>

                <div class="form__input">
                    <label>Categoria:</label><br>
                    <select class="form__select" id="categoria" name="categoria" placeholder="Calzado">
                        <option value="Ropa">Ropa</option>
                        <option value="Calzado">Calzado</option>
                        <option value="Accesorio">Accesorio</option>
                    </select>
                    <font color="red">
                        <span id="error_categoria" class="error"></span>
                    </font>
                </div>
                
                <div class="form__input">
                    <label>Descripcion:</label>
                    <textarea class="textarea" placeholder="Add your Description here" id="descripcion" name="descripcion" value=""><?php echo $producto['descripcion'];?></textarea>
                    <font color="red">
                        <span id="error_descripcion" class="error"></span>
                    </font>
                </div>
                
            </div>
            <div class="form__input">
                <div class="col-md-12">
                    <input class="button" name="Submit" type="button" id="update" value="Modificar" onclick="validate_update()"/>
                    <a align="right" class="button" href="index.php?page=controller_crud&op=list">Volver</a>
                </div>
            </div>
        </form>
    </div>