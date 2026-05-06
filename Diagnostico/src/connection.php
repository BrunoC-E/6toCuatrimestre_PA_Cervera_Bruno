<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "todo_app";

$conexion= new mysqli($server,$user,$password,$database);

if($conexion->connect_error){
    die("Connection error: " . $conexion->connect_error);
}