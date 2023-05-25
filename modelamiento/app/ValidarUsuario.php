<?php 
session_start();
require_once('config/Db_conect.php');
$conect = conectar();

$usuario = $_POST['email'];
$contrasena = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE BINARY Email = '$usuario' and  BINARY Contrasena = '$contrasena'";
$validar_login = $conect->query($sql);
$validar_usuario =mysqli_fetch_array($validar_login);

if(mysqli_num_rows($validar_login) >0){
    if($validar_usuario['rol']==1){
        $_SESSION['Usuario'] = $usuario;
        header('Location: agregar.php');  
        exit;
    }else{
        $_SESSION['Usuario'] = $usuario;
        header('Location: realizarFormulario.php');  
        exit;
    }
    
}else{
    echo '
    <script>
        alert("Usuario no encontadro, Por favor verifique si los datos ingresados son correctos");
        window.location = "../index.php";
    
    
    </script>
    
    
    ';
    exit;

}

?>