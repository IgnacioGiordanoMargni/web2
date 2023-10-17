<?php 
 require_once "model.php";
class modelo_usuarios extends Model {

    function insertarDatos($mail, $nombre, $contraseña){
        $db= $this->db;
        $query=$this->db->prepare('INSERT INTO usuarios(Mail, Nombre, Contraseña) VALUES(?, ?, ?) ');
        $query->execute([$mail, $nombre, $contraseña]);
        
        return $db->lastInsertId();
        }

    function ObtenerUsuarios(){
  
    
        $query = $this->db->prepare('SELECT * FROM usuarios');

        $query -> execute();
        $user = $query->fetchAll(PDO::FETCH_OBJ); 
        return $user;
     }     

     function ObtenerUsuarioPorMail($mail, $password){
     
        if (!empty($mail) && !empty($password)) {
            $registros = $this->db->prepare('SELECT Mail, Contraseña, Permisos FROM usuarios WHERE Mail =?');
           
            $registros->execute([$mail]);
            $resultados = $registros->fetch(PDO::FETCH_ASSOC);
            return $resultados;
     }
     }
     
     function verificar_existencia($mail){

        $registros= $this->db->prepare('SELECT Mail FROM usuarios WHERE Mail = ?');

        $registros->execute([$mail]);
        $resultados = $registros->fetch(PDO::FETCH_ASSOC);
        $mail_db=$resultados['Mail']; 
        if($mail_db==$mail){ 
            return 0;
        } else {
            return 1;
        }                
     }
}