<?php

function ObtenerUsuarios(){
  
    $db=conectar_tpo_db(); //abro conexion
        $query = $db->prepare('SELECT * FROM usuarios');

        $query -> execute();
        $user = $query->fetchAll(PDO::FETCH_OBJ); //fetch y fetchALl son casi lo msimo, pero fetch all da un arreglo de registros y fetch da un solo registro
 return $user;
}


function conect(){
   $db = new PDO('mysql:host=localhost;dbname=tareas;charset=utf8','root', '');
   return $db;
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

function insertarDatos_Productos(){
$db= conectar_tpo_db();
$query=$db->prepare('INSERT INTO productos(Producto, Imagen, Precio) VALUES(?, ?, ?) ');
$query->execute([$producto, $imagen, $precio]);

return $db->lastInsertId();
}

function ObtenerProductos(){
  
   $db=conectar_tpo_db(); //abro conexion
       $query = $db->prepare('SELECT * FROM productos');

       $query -> execute();
       $producto = $query->fetchAll(PDO::FETCH_OBJ); //fetch y fetchALl son casi lo msimo, pero fetch all da un arreglo de registros y fetch da un solo registro
return $producto;
}










   



















 