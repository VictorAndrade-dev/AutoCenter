<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['usuario'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmaSenha'];

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar) {
        echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
        exit;
    }

    // Criptografa a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Verifica se o e-mail já existe
    $check = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('E-mail já cadastrado!'); window.history.back();</script>";
    } else {
        // Insere o novo usuário
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, sobrenome, email, telefone, senha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $sobrenome, $email, $telefone, $senhaHash);

        if ($stmt->execute()) {
            echo "<script>alert('Cadastro realizado com sucesso! Faça login agora.'); window.location.href='Login.html';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar.'); window.history.back();</script>";
        }

        $stmt->close();
    }

    $check->close();
    $conn->close();
}
?>
