<?php
$host = "sql203.infinityfree.com"; // troque pelo seu
$user = "if0_39062099"; 
$pass = "22042008Vh";
$banco = "if0_39062099_usuarios";

$conn = new mysqli($host, $user, $pass, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
