<?php
/*include_once '../../database.php';*/
include_once '../../lib/db.php';

/* En la clase productos heredamos la clase BD */
class Productos extends DB{ 

    function __construct(){
        parent::__construct();
    }

/* Para obtener productos por id */
    public function get($id){
        
        /* Esta seria la consulta */
        $query = $this->connect()->prepare('SELECT * FROM products WHERE id = :id LIMIT 0,9');
        /* Ejecutamos la consulta */
        $query -> execute(['id'=> $id]);

        $row = $query->fetch();

        return [
            'id' => $row['id'],
            'description' => $row['description'],
            'price' => $row['price'],
            'image' => $row['image'],
            'categoria' => $row['categoria'],
        ];
    }   

/* Para obtener productos por categoria */
public function getProductsByCategory($categoria){

            /* Esta seria la consulta */
            $query = $this->connect()->prepare('SELECT * FROM products WHERE categoria = :cat LIMIT 0,9');
            /* Ejecutamos la consulta */
            $query -> execute(['cat'=> $categoria]);
            /* Creamos una array para meter todos los productos de la categoria */
            $products = [];

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
    
            $product = [
                'id'  => $row['id'],
                'description' => $row['description'],
                'price' => $row['price'],
                'image' => $row['image'],
                'categoria' => $row['categoria'],
            ];
            /* Vamos metiendo en el array cada uno de los items de la categoria que le pasamos */
            array_push($products, $product);
        }   
        return $products;
}



}

?>