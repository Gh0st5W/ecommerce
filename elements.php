<div class="articulo">
    <input type="hidden" id="id" value="<?php echo $product['id'];  ?>">
    <div class="imagen"><img src="images/<?php echo $product['image'];  ?>" /></div>
    <div class="titulo"><?php echo $product['description'];  ?></div>
    <div class="precio"><?php echo $product['price'];  ?> EUROS</div>
    <div class="botones">
        <button>ADD TO CART</button>
    </div>
</div>

