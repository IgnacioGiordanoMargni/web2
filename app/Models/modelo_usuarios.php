<?php 
 require_once "model.php";
class modelo_usuarios extends Model {

    function insertarDatos($mail, $nombre, $contraseña){
       
        $query=$this->db->prepare('INSERT INTO usuarios(Mail, Nombre, Contraseña) VALUES(?, ?, ?) ');
        $query->execute([$mail, $nombre, $contraseña]);
        
        return $db->lastInsertId();
        }

    function ObtenerUsuarios(){
  
    $db=$this->onectar_tpo_db(); 
        $query = $this->db->prepare('SELECT * FROM usuarios');

        $query -> execute();
        $user = $query->fetchAll(PDO::FETCH_OBJ); 
        return $user;
     }     

     function ObtenerUsuarioPorMail($mail, $password){
     
        if (!empty($mail) && !empty($password)) {
            $registros = $this->db->prepare('SELECT Mail, Contraseña, Permisos FROM usuarios WHERE Mail = :Mail');
            $registros->bindParam(':Mail', $mail);
            $registros->execute();
            $resultados = $registros->fetch(PDO::FETCH_ASSOC);
            return $resultados;
     } 
}
}