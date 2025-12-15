<?php
include 'db.php';

$query = "SELECT * FROM Ranking ORDER BY exp DESC";
$result = mysqli_query($conexion, $query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking - DI-NAMO</title>
    <link rel="stylesheet" href="../stilos/global.css">
    <link rel="stylesheet" href="../stilos/ranking.css">
</head>
<body>

    <header class="main-header">
        <a href="inicio.html" class="logo">DI<span>-NAMO</span></a>
        <nav class="main-nav">
            <ul>
                <li><a href="inicio.html">APRENDER</a></li>
                <li><a href="perfil.html">PERFIL</a></li>
                <li><a href="ranking.html" class="active">RANKING</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Ranking Semanal</h1>
            <p>La tabla se reinicia cada lunes. ¡Sigue aprendiendo para llegar a la cima!</p>
            <table class="ranking-table">
                <thead>
                    <tr>
                        <th>Puesto</th>
                        <th>Usuario</th>
                        <th>Experiencia (XP)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="top-rank">
                        <?php while($datos = mysqli_fetch_assoc($result)): ?>
                        <td><?php echo $datos['puesto']; ?></td>
                        <td><?php echo htmlspecialchars($datos['nombre']); ?></td>
                        <td><?php echo $datos['exp']; ?></td>
                        <?php endwhile; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="main-footer">
        <p>&copy; 2024 DI-NAMO. Todos los derechos reservados.</p>
    </footer>

</body>
</html>