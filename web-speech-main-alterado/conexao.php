<?php

$hostname ='localhost';
$bancodedados = 'db_ihc';
$usuario = 'root';
$senha = '';

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if($mysqli->connect_errno){
    echo('Falha na conexão: (' . $mysqli->connect_errno . ")" . $mysqli->connect_error);
}


// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "db_ihc";

// // Cria a conexão com o banco de dados
// $con = mysqli_connect($servername, $username, $password, $dbname) or die("Falha na conexão: " . mysqli_connect_error());

