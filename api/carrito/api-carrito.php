

<?php

/* Mapeo de las funciones de carrito.php en la interfaz */

include_once 'carrito.php';

if(isset($_GET['action'])){

    $accion = $_GET['action'];
    $carrito = new Carrito();
    switch($accion){
        case 'mostrar':
        mostrar($carrito);
        break;

        case 'add':
        add($carrito);
        break;

        case 'remove':
        remove($carrito);
        break;

        default:
    }
}else{
    echo json_encode(['statuscode' => 404, 
                        'response' => 'No se puede procesar la solicitud']);
}

function mostrar($carrito){
    /* Cargamos nuestro carrito en estado incial */
    $productsCarrito = json_decode($carrito->load(), 1);
    $fullproducts = [];
    $total = 0; /* Importe */
    $totalproducts = 0; /* Productos totales */


    foreach($productsCarrito as $productCarrito){
        $httpRequest = file_get_contents('http://localhost/website/api/productos/api-productos.php?get-product=' . $productCarrito['id']); 
        /* Mapeamos */
        /* Primero lo decodificamos y le asigno el objeto Product*/
        $productProducto = json_decode($httpRequest, 1)['products'];
        $productProducto['cantidad'] = $productCarrito['cantidad'];
        $productProducto['subtotal'] = $productProducto['cantidad'] * $productProducto['price'];
        $total += $productProducto['subtotal'];
        $totalproducts += $productProducto['cantidad'];
        /* Lo añadimo al array */
        array_push($fullproducts, $productProducto);
    }


    $resArray = array('info' => ['count' => $totalproducts, 'total' => $total] ,'products' => $fullproducts);
    /* Lo imprimimos */
    echo json_encode($resArray);
}

function add($carrito){
    if(isset($_GET['id'])){
        $res = $carrito->add($_GET['id']);
        echo $res;
    }else{
        // error
    }
}

function remove($carrito){
    if(isset($_GET['id'])){
        $res = $carrito->remove($_GET['id']);
        if($res){
            echo json_encode(['statuscode' => 200]);
        }else{
            echo json_encode(['statuscode' => 400]);
        }
    }else{
        // error

    }
}



?>