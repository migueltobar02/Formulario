<?php 
function conectar(){
    $localhost ="127.0.0.1";
    $username ="root";
    $password ="";
    $dbname ="quiz";
    // db connection
    $conectar = new mysqli ($localhost, $username, $password, $dbname);
    if ($conectar->connect_error){
        die("Eroor al conectar la base de datos".$conectar->connect_error);
    }else{
        return $conectar;
    }
}
?>