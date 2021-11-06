<?php

include_once 'productos.php';

/* Vemos si existe */
if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];

    /* Comprobamos si el string categoria esta vacio */ 
    if($categoria == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No existe la categor&iacute;a']);    
    }else{
        $productos = new Productos();
        $products = $productos->getProductsByCategory($categoria);
        echo json_encode(['statuscode' => 200, 
                        'products' => $products]);
    }
/* Necesito implementar este else if para el carrito */
}else if(isset($_GET['get-product'])){
$id = $_GET['get-product'];

if($id == ''){
    echo json_encode(['statuscode' => 400, 
                        'response' => 'No hay valor para id']);    
}else{
    $productos = new Productos();
    $products = $productos->get($id);
    /* Mandamos todo el objeto con formato json */
    echo json_encode(['statuscode' => 200, 
                    'products' => $products]);
}
}else{
echo json_encode(['statuscode' => 404, 
                    'response' => 'No se puede procesar la solicitud']);
}

?>