<?php

session_start();
if(!isset($_SESSION['Usuario'])){

    echo '
        <script>
            alert("Por Favor debe iniciar sesion");
            window.location= "../index.php";
        </script>
    ';
    session_destroy();
    die();
};

?>


<?php
require 'config/Db_conect.php';
$conect = conectar();

$contador = $conect->real_escape_string($_POST['contador']);
$NombreTitulo = $conect->real_escape_string($_POST['NombreFormulario']);

$sql1 = "SELECT COUNT(*) FROM formulario";
$resultado = $conect->query($sql1);
$row = $resultado->fetch_row();
$nuevo_valor = $row[0];

if($nuevo_valor ==0){
    $sql3 = "INSERT INTO formulario (nombre) VALUES ('$NombreTitulo')";
    $result = $conect->query($sql3);
    header('Location: agregar.php');
    $id=1;

}else {
    $sql3 = "INSERT INTO formulario (nombre) VALUES ('$NombreTitulo')";
    $result = $conect->query($sql3);
    header('Location: agregar.php');
    $id = $nuevo_valor +1;
}

for ($i = 1; $i <= $contador; $i++) {
    $pregunta = $conect->real_escape_string($_POST['pregunta' . $i]);
    $respuesta = $conect->real_escape_string($_POST['respuesta' . $i]);

    $sql = "INSERT INTO preguntas (pregunta, respuesta,id_formulario) VALUES ('$pregunta', '$respuesta','$id')";
   $result = $conect->query($sql);
}

//$sql += "INSERT INTO  preguntas( pregunta, respuesta) VALUES ( '$pregunta', '$respuesta1')";


//$result = $conect->query($sql);
?>