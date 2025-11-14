<?php
//criar conexão

$servidor = "localhost";
$user = "root";
$password = "Victor22042008Vh#";
$bd = "bd_oficina";

$conn = new mysqli($servidor, $user, $password, $bd);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Recupera os valores

    $usuario = $_POST['usuario'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirmaSenha'];

    // Verifica se as senhas coincidem
    if ($senha === $confirmaSenha) {

        $sql = "SELECT * FROM tb_usuarios WHERE Nome = '$usuario'"; 
        $retorno = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($retorno);

        if($row){
            echo "<p style='color: red; text-align: center; font-size: 25px;'>Usuário já existe</p>";
        } else {

            $hashsenha = password_hash($senha, PASSWORD_BCRYPT);
            $sql = "INSERT INTO tb_usuarios (Nome, Sobrenome, Email, Telefone, Senha) values('$usuario', '$sobrenome', '$email', '$telefone', '$hashsenha')";
            $retorno = mysqli_query($conn, $sql);

            if($retorno ===true) {
                echo "<p style='color: green; text-align: center; font-size: 25px;'>Cadastro realizado</p>";
            } else {

                echo"Erro ao Cadastrar usuário:". $conn->error;
            }
        }        
    } else {
        echo "<p style='color: blue; text-align: center; font-size: 25px;'>As senhas não coicidem</p>";
    }
}

$conn -> close();

?>

