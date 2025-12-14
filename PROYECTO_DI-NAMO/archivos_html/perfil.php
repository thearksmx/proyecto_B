<?php
session_start();
include '../scripts/db.php';

if (!isset($_SESSION['usuario_email'])) {
    header("Location: sesion.html");
    exit();
}

$email_user = $_SESSION['usuario_email'];
$query = "SELECT * FROM Usuario WHERE email = '$email_user'";
$res = mysqli_query($conexion, $query);
$datos = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil | DI-NAMO</title>
    <link rel="stylesheet" href="../estilos/barra.css">
    <link rel="stylesheet" href="../estilos/perfil.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo">DI-NAMO</div>
        <nav>
            <ul>
                <li><a href="inicio.html">APRENDER</a></li>
                <li><a href="perfil.php" class="active">PERFIL</a></li>
                <li><a href="../scripts/logout.php">SALIR</a></li>
            </ul>
        </nav>
    </div>

    <main style="margin-left: 250px; padding: 100px 40px; color: white; display: flex; justify-content: center;">
        <div style="background: #1e1e1e; padding: 40px; border-radius: 15px; width: 100%; max-width: 500px; box-shadow: 0 4px 20px rgba(0,0,0,0.5);">
            <h2 style="color: #7fc5ff; text-align: center; margin-bottom: 20px;">Mi Perfil</h2>
            <hr style="border: 0.5px solid #444; margin-bottom: 20px;">
            
            <p style="font-size: 18px; margin: 10px 0;"><strong>Usuario:</strong> <?php echo htmlspecialchars($datos['nombre']); ?></p>
            <p style="font-size: 18px; margin: 10px 0;"><strong>Correo:</strong> <?php echo htmlspecialchars($datos['email']); ?></p>
            <p style="font-size: 18px; margin: 10px 0;"><strong>Edad:</strong> <?php echo $datos['edad']; ?> años</p>
            <p style="font-size: 18px; margin: 10px 0;"><strong>Nivel:</strong> <?php echo $datos['nivel']; ?></p>
            <p style="font-size: 18px; margin: 10px 0;"><strong>Racha:</strong> <?php echo $datos['racha']; ?> días</p>
        </div>
    </main>
</body>
</html>