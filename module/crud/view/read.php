<section class="midd-w3 py-5" id="faq">
    <div class="container py-xl-5 py-lg-3">
        <div class="row">
            <div class="col-lg-6 about-right-faq">
                
                <h3 class="text-da">Informacion del Producto</h3>
                    
                <ul class="w3l-right-book mt-4">
                    <li>Codigo producto:
                    <?php
                        echo $producto['codigo_producto'];
                    ?>
                    </li>
                    <li>Nombre:
                    <?php
                        echo $producto['nombre'];
                    ?>
                    </li>
                    <li>Precio:
                    <?php
                        echo $producto['precio'];
                    ?>
                    </li>
                    <li>Talla:
                    <?php
                        echo $producto['talla'];
                    ?>
                    </li>
                    <li>Color:
                    <?php
                        echo $producto['color'];
                    ?>
                    </li>
                    <li>Descripcion:
                    <?php
                        echo $producto['descripcion'];
                    ?>
                    </li>
                </ul>
                <a href="index.php?page=controller_crud&op=list" class="btn button-style button-style-2 mt-sm-5 mt-4">Volver</a>
            </div>
            <div class="col-lg-6 left-wthree-img text-right">
                <img src='<?php echo $producto['images']; ?>' alt="" class="img-fluid mt-5" />
            </div>
        </div>
    </div>
</section>
