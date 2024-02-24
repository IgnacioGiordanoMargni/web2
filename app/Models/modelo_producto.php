<?php
require_once "model.php";

class modelo_producto extends Model{

    function ObtenerProductos(){
  
            $query = $this->db->prepare('SELECT * FROM productos');
            $query -> execute();
            $producto = $query->fetchAll(PDO::FETCH_OBJ); 
         return $producto;
      }


 function BuscarProductos($Busqueda){
   $query = $this->db->prepare("SELECT * FROM productos WHERE Producto LIKE '%$Busqueda%'");
   $query-> execute();
   $productos=$query->fetchAll(PDO::FETCH_OBJ); 
   return $productos;
 }

    function insertarDatos_Productos($producto, $imagen, $precio, $Categoria, $descripcion){
    
        $db= $this->db;
        
        $query=$this->db->prepare('INSERT INTO productos(Producto, Imagen, Precio, Categoria, Descripcion) VALUES(?, ?, ?, ?, ?)');
        $query->execute([$producto, $imagen, $precio, $Categoria, $descripcion]);
        
        return $db->lastInsertId();
        }

    function insertar_Productos_Nombres($producto, $nombre){
           
            
            $db= $this->db;
            
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


    function QuitarProducto($id){ 

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
    function ObtenerCategoriasPorId($id){
      
      $query = $this->db->prepare('SELECT * FROM categorias WHERE id=?');
      $query -> execute([$id]);
      $categorias = $query->fetch(PDO::FETCH_OBJ); 
   return $categorias;
  }


   
    function ObtenerProductosCategoria($id){
     

        $sentencia = $this->db->prepare('SELECT * FROM productos WHERE Categoria=?');
        $sentencia->execute([$id]);
        $productos= $sentencia->fetchAll(PDO::FETCH_OBJ);
     return $productos; 
    }
    
    function verificar_existencia($categoria){

        $registros= $this->db->prepare('SELECT * FROM categorias WHERE Categorias = ?');

        $registros->execute([$categoria]);
        $resultados = $registros->fetch(PDO::FETCH_ASSOC);

       
       if(!empty($resultados['Categorias'])){
         if($resultados['Categorias']==$categoria){ 
            return 0;
         } else {
            return 1;
         }                
        } else {
            return 1;
        }
     }

     function InsertarCategoria($categoria){
    
        $db= $this->db;
        
        $query=$this->db->prepare('INSERT INTO categorias(Categorias) VALUES(?)');
        $query->execute([$categoria]);
        
        return $db->lastInsertId();
        }

     function modificar_producto($Producto, $imagen, $Precio, $Categoria, $Descripcion, $id){
        $query = $this->db->prepare('UPDATE productos SET Producto=? , Imagen=? , Precio=?, Categoria=?, Descripcion=? WHERE id= ?');
        $query->execute([$Producto, $imagen, $Precio, $Categoria, $Descripcion, $id]);
        header('Location: http://localhost/tpo_web2/a%C3%B1adiroquitar_producto');

     }
     
     
}