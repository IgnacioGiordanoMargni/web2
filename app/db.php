<?php

function ObtenerUsuarios(){
  
    $db=conectar_tpo_db(); 
        $query = $db->prepare('SELECT * FROM usuarios');

        $query -> execute();
        $user = $query->fetchAll(PDO::FETCH_OBJ); 
 return $user;
}


function conectar_tpo_db(){
   $db = new PDO('mysql:host=localhost;dbname=tpo_web2;charset=utf8','root', '');
   return $db;
}

function insertarDatos($mail, $nombre, $contraseña){
$db= conectar_tpo_db();
$query=$db->prepare('INSERT INTO usuarios(Mail, Nombre, Contraseña) VALUES(?, ?, ?) ');
$query->execute([$mail, $nombre, $contraseña]);

return $db->lastInsertId();
}

function insertarDatos_Productos($producto, $imagen, $precio){
$db= conectar_tpo_db();


$query=$db->prepare('INSERT INTO productos(Producto, Imagen, Precio) VALUES(?, ?, ?)');
$query->execute([$producto, $imagen, $precio]);

return $db->lastInsertId();
}

function insertar_Productos_Nombres($producto, $nombre){
    $db= conectar_tpo_db();
    
    
    $query=$db->prepare('INSERT INTO producto_usuario(Producto, nombre) VALUES(?, ?)');
    $query->execute([$producto, $nombre]);
    
    return $db->lastInsertId();
    }

function ObtenerProductos(){
  
   $db=conectar_tpo_db(); 
       $query = $db->prepare('SELECT * FROM productos');

       $query -> execute();
       $producto = $query->fetchAll(PDO::FETCH_OBJ); 
return $producto;
}










   



















 