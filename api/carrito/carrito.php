<?php
include_once '../../lib/session.php';

class Carrito extends Session{

    function __construct(){
        parent::__construct('carrito');
    }

    public function load(){
        if($this->getValue() == NULL){
            return '[]';
        }
        return $this->getValue();
    }

    public function add($id){
        if($this->getValue() == NULL){
            $products = [];
        }else{
            $products = json_decode($this->getValue(), 1);
            for($i=0; $i<sizeof($products); $i++){
                if($products[$i]['id'] == $id){
                    $products[$i]['cantidad']++;
                    $this->setValue(json_encode($products));
                    return $this->getValue();
                }
            }
        }
        
        $product = ['id' => (int)$id, 'cantidad' => 1];
        
        array_push($products, $product);
        $this->setValue(json_encode($products));
        return $this->getValue();
    }

    public function remove($id){
        if($this->getValue() == NULL){
            $products = [];
        }else{
            $products = json_decode($this->getValue(), 1);

            for($i=0; $i<sizeof($products); $i++){
                
                if($products[$i]['id'] == $id){
                    $products[$i]['cantidad']--;
                    if($products[$i]['cantidad'] == 0){
                        unset($products[$i]);
                        $products = array_values($products);
                    }
                    $this->setValue(json_encode($products));
                    return true;
                }
            }
        }
        
        //$product = ['id' => (int)$id, 'cantidad' => 1];
        
        //array_push($products, $product);
        //$this->setValue(json_encode($products));
        //return $this->getValue();
    }

}
?>