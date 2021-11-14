
<!-- Uso elements tanto para index.php como para product.php  -->

<div class="articulo">
    <input type="hidden" id="id" value="<?php echo $product['id'];  ?>">
    <div class="imagen" ><img src="images/<?php echo $product['image'];  ?>" /></div>
    <div class="titulo"><?php echo $product['description'];  ?></div>
    <div class="precio"><?php echo $product['price'];  ?> EUROS</div>
    <div class="botones">
        <!-- Tengo esta clase referenciada en main.js para agregar productos al carrito -->
        <button class='btn-add'>ADD TO CART</button>
    </div>

</div>


