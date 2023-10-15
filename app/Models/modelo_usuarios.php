<?php 

class modelo_usuarios {


    function conectar_tpo_db(){
        $db = new PDO('mysql:host=localhost;dbname=tpo_web2;charset=utf8','root', '');
        return $db;
     }

    function insertarDatos($mail, $nombre, $contraseña){
        $db= $this->conectar_tpo_db();
        $query=$db->prepare('INSERT INTO usuarios(Mail, Nombre, Contraseña) VALUES(?, ?, ?) ');
        $query->execute([$mail, $nombre, $contraseña]);
        
        return $db->lastInsertId();
        }

    function ObtenerUsuarios(){
  
    $db=conectar_tpo_db(); 
        $query = $db->prepare('SELECT * FROM usuarios');

        $query -> execute();
        $user = $query->fetchAll(PDO::FETCH_OBJ); 
        return $user;
     }     

     function ObtenerUsuarioPorMail($mail, $password){
        $db= $this->conectar_tpo_db();
        if (!empty($mail) && !empty($password)) {
            $registros = $db->prepare('SELECT Mail, Contraseña, Permisos FROM usuarios WHERE Mail = :Mail');
            $registros->bindParam(':Mail', $mail);
            $registros->execute();
            $resultados = $registros->fetch(PDO::FETCH_ASSOC);
            return $resultados;
     } 
}
}