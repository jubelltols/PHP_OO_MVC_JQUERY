<div id="delete__container bd-container bd-grid">
    <form autocomplete="on" method="post" name="delete" id="delete">
        <div class="delete__content">
            <div class="delete__data">
                <br>
                <br>
                <br>
                <h3 class="delete__title">¿Desea borrar el producto <?php echo $producto['nombre' ];?> &nbsp; <?php echo $producto['precio'];?> &nbsp; <?php echo $producto['talla'];?> &nbsp; <?php echo $producto['color'];?> ?</h3>
                <button type="submit" class="button" name="delete" id="delete" onclick = " location.href = 'index.php?page=controller_crud&op=delete&id=<?php echo $_GET['id']; ?>'">Aceptar</button>
                <a class="button" href="index.php?page=controller_crud&op=list">Cancelar</a>
            </div>
        </div>
    </form>
</div>