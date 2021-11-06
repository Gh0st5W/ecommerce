<?php
include_once '../../lib/session.php';

class Carrito extends Session{

    function __construct(){
        parent::__construct('carrito');
    }

    public function load(){
        /* Si el valor session está vacío devuelvo un array vacio */
        if($this->getValue() == NULL){
            return '[]';
        }
        /* Sino, deveolvemos el valor de la sesion */
        return $this->getValue();
    }

    /* Añadimos el valor de la sesion al carrito */
    public function add($id){
        /* validamos que el carrito esta vacio */
        if($this->getValue() == NULL){
            $products = [];
        }else{
        /* Añadimos elementos al array */
        /* El valor de la sesion está codificado, lo decodificamos y lo volvemos a codificar */
            $products = json_decode($this->getValue(), 1);
            /* Usamos un bucle for para actualizar la cantidad por si añadimos más de un articulo */
            for($i=0; $i<sizeof($products); $i++){
                if($products[$i]['id'] == $id){
                    /* Si un articulo (id) ya existe, sumo la cantidad */
                    $products[$i]['cantidad']++;
                    $this->setValue(json_encode($products));
                    return $this->getValue();
                }
            }
        }
        
        /* Operaciones si el carrito tiene un nuevo elemento*/
        $product = ['id' => (int)$id, 'cantidad' => 1];
        
        array_push($products, $product);

        /* Lo guardamos */
        $this->setValue(json_encode($products));
        return $this->getValue();
    }

    /* Eliminamos productos del carrito */
    public function remove($id){
        if($this->getValue() == NULL){
            $products = [];
        }else{
            $products = json_decode($this->getValue(), 1);

            for($i=0; $i<sizeof($products); $i++){
                
                if($products[$i]['id'] == $id){
                    /* Restamos cantidades */
                    $products[$i]['cantidad']--;
                    /* Si la cantidad pasa a ser 0, lo eliminamos del carrito */
                    if($products[$i]['cantidad'] == 0){
                        unset($products[$i]);
                        $products = array_values($products);
                    }
                    /* Lo guardamos */
                    $this->setValue(json_encode($products));
                    return true;
                }
            }
        }
        
    }

}
?>