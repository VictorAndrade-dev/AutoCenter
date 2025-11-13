<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['first-name'];
    $sobrenome = $_POST['last-name'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $senha = $_POST['password'];
    $confirmar = $_POST['confirm-password'];

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar) {
        echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
        exit;
    }

    // Criptografa a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Verifica se o e-mail já existe
    $check = $conn->prepare("SELECT id FROM usuario WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('E-mail já cadastrado!'); window.history.back();</script>";
    } else {
        // Insere o novo usuário
        $stmt = $conn->prepare("INSERT INTO usuario (nome, sobrenome, email, telefone, senha) VALUES (?, ?, ?, ?, ?)");
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
