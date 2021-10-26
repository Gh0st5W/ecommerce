

<?php

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
    $productsCarrito = json_decode($carrito->load(), 1);
    $fullproducts = [];
    $total = 0;
    $totalproducts = 0;
    foreach($productsCarrito as $productCarrito){
        $httpRequest = file_get_contents('http://localhost/website/api/productos/api-productos.php?get-product=' . $productCarrito['id']); 
        $productProducto = json_decode($httpRequest, 1)['product'];
        $productProducto['cantidad'] = $productCarrito['cantidad'];
        $productProducto['subtotal'] = $productProducto['cantidad'] * $productProducto['precio'];
        $total += $productProducto['subtotal'];
        $totalproducts += $productProducto['cantidad'];
        array_push($fullproducts, $productProducto);
    }
    $resArray = array('info' => ['count' => $totalproducts, 'total' => $total] ,'products' => $fullproducts);
    //array_push($fullproducts, ['count' => $totalproducts, 'total' => $total]);
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