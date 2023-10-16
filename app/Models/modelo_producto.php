<?php
require_once "model.php";

class modelo_producto extends Model{

    function ObtenerProductos(){
  
            $query = $this->db->prepare('SELECT * FROM productos');
            $query -> execute();
            $producto = $query->fetchAll(PDO::FETCH_OBJ); 
         return $producto;
      }


    function insertarDatos_Productos($producto, $imagen, $precio){
    
        
        
        $query=$this->db->prepare('INSERT INTO productos(Producto, Imagen, Precio) VALUES(?, ?, ?)');
        $query->execute([$producto, $imagen, $precio]);
        
        return $db->lastInsertId();
        }

    function insertar_Productos_Nombres($producto, $nombre){
           
            
            
            $query=$this->db->prepare('INSERT INTO producto_usuario(Producto, nombre) VALUES(?, ?)');
            $query->execute([$producto, $nombre]);
            
            return $db->lastInsertId();
            }

    function obtenerProductoId($id){ 
       
        $sentencia = $this->db->prepare("SELECT * FROM productos WHERE id=?");
        $sentencia->execute([$id]);
        $producto = $sentencia->fetch(PDO::FETCH_OBJ); 
         return $producto;
    }


    function QuitarProducto($id){ //mejorar, ver filmina

        $sentencia = $this->db->prepare("DELETE FROM productos WHERE id=?");
        $sentencia->execute([$id]);
        header('Location: http://localhost/tpo_web2/añadiroquitar_producto');
      }

    function ObtenerCategorias(){
      
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query -> execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ); 
     return $categorias;
    }


   
    function ObtenerProductosCategoria($id){
     
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id=?');
        $query->execute([$id]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        $categoria= $resultado->Categorias;

        $sentencia = $this->db->prepare('SELECT * FROM productos WHERE Categoria=?');
        $sentencia->execute([$categoria]);
        $productos= $sentencia->fetchAll(PDO::FETCH_OBJ);
     return $productos; 
    }

}