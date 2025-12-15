<?php
include 'db.php';
// Obtener todos los registros
$sql = "SELECT * FROM cursos WHERE lenguaje = 'Python'";//Aquí pasa lo mismo que con el de java, pues jalan igual...
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos de Python</title>
    <link rel="stylesheet" href="../stilos/global.css">
    <link rel="stylesheet" href="../stilos/cursos_python.css">
</head>
<body>
    
    <main>
        <div class="container">
            <h1>Clases de Python:</h1>
            <hr>
            <dl>
            <div class="lessons-grid">
                <?php while($clases = $result->fetch_assoc()): ?>
                <a href="../scripts/clases_python.php?numero=<?= $clases['numero'] ?>" class="lesson-card">
                    <dt><h3><?= htmlspecialchars($clases['titulo'])?></h3></dt>
                    <dd><p><?= htmlspecialchars($clases['descripcion'])?></p></dd>
                    <dd><p><?= htmlspecialchars($clases['dificultad'])?></p></dd>
                    <dd><p><?= htmlspecialchars($clases['exp'])?></p></dd>
                </a>
                <?php endwhile; ?>
            </div>
            </dl>
        </div>
    </main>

</body>
</html>

<?php

?>