
<!-- Tengo esta clase referenciada en product.php para mostrar la página individual de cada prodcuto -->

<body class="body">
    <input type="hidden" id="id" value="<?php echo $product['id'];  ?>"></div>
    <div class="content">
        <div class="parent">
            <div class="div1">
                <div class="imagen"><img src="images/<?php echo $product['image'];  ?>" /></div>
            </div>
            <div class="div2">
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit iaculis pretium conubia, 
                    parturient mollis posuere elementum per leo magna cubilia natoque sapien, nulla 
                    aliquet neque habitant bibendum senectus nisl viverra donec. Suscipit egestas sem 
                    non cras morbi quam sagittis ut imperdiet sapien porta nullam tellus erat primis, 
                    posuere risus auctor aptent tortor ullamcorper ac pulvinar maecenas sociosqu felis 
                    etiam dapibus phasellus. Inceptos auctor venenatis mollis consequat primis tellus 
                    tristique cras pulvinar, posuere fames fusce diam nostra vestibulum platea semper cum, 
                    ultricies ante sapien rhoncus varius ultrices vivamus mi.</p><p>Ut eu elementum 
                    mollis duis in sed senectus, est ullamcorper sociosqu orci litora montes, lacinia 
                    imperdiet magna nullam ac proin. Nunc pretium pellentesque ligula gravida placerat 
                    nostra aptent nam vehicula in, integer commodo purus proin ridiculus leo venenatis 
                    nullam scelerisque neque, tempus mus dignissim lobortis ac cursus blandit inceptos 
                    ullamcorper. Magna hendrerit curabitur condimentum nunc nam mattis a lobortis praesent 
                    donec cum, lacus integer egestas molestie neque taciti iaculis leo accumsan pretium mauris.</p>
            </div>
            <div class="div3">  
                <div class="titulo"><?php echo $product['description'];  ?></div>

            <div class="div4">
                <div class="precio"><?php echo $product['price'];  ?> EUROS</div>
            </div>
            <div class="div5">
                <div class="botones"><button class='btn-add'>ADD TO CART</button></div>
            </div>
        </div>
    </div>
</body>