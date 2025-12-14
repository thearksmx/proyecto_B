<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $edad   = trim($_POST['edad'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    function alertar($msj) {
        echo "<script>alert('$msj'); window.history.back();</script>";
        exit;
    }

    if (empty($nombre)) alertar("El nombre es obligatorio");
    if (empty($email)) alertar("El correo es obligatorio");
    if (empty($edad)) alertar("La edad es obligatoria");
    if (empty($contrasena)) alertar("La contraseña es obligatoria");
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) alertar("Formato de correo inválido");
    if (!is_numeric($edad) || $edad < 10 || $edad > 99) alertar("Edad no válida (debe ser entre 10 y 99)");

    $stmt = $conexion->prepare("SELECT email FROM Usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) alertar("Este correo ya está registrado");

    $sql = "INSERT INTO Usuario (email, nombre, edad, contrasena) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conexion->prepare($sql);
    $stmt_insert->bind_param("ssis", $email, $nombre, $edad, $contrasena);

    if ($stmt_insert->execute()) {
        $_SESSION['usuario_email'] = $email;
        echo "<script>alert('¡Registro exitoso!'); window.location.href = '../archivos_html/perfil.php';</script>";
    } else {
        alertar("Error interno al registrar");
    }
}
?>