<?php
$servidor = "sql203.infinityfree.com"; // troque pelo seu
$usuario = "if0_39062099"; 
$senha = "22042008Vh";
$banco = "if0_39062099_usuarios";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
