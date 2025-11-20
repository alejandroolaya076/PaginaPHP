<?php


require_once "conexion.php";

try{
    
    $db = Database::connection();
    $email = "admin@gmail.com";

   
    $consul = $db -> prepare("SELECT * FROM Usuario WHERE Correo_electronico = :Email");
    $consul -> execute([":Email" => $email]);

   
    if(!$consul -> fetch()){
        $pass = password_hash("admin",PASSWORD_BCRYPT);
        
        $sql = "INSERT INTO Usuario(Nombre,Apellido,Documento,Telefono,Correo_electronico,Contrasena,Tipo_usuario) VALUES('Admin','Principal','1023373319','3228518167',:Email,:Contrasena,'Administrador')";
        $consult = $db -> prepare($sql);
        $consult -> execute([":Email" => $email,":Contrasena" => $pass]);
        echo "Usuario Admin Creado";
    
    }else{
        echo "Administrador ya existe";
    }

}catch(PDOException $e){
    die("Error".$e -> getMessage());
}
?>