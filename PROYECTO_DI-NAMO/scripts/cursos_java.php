<?php
include 'db.php';
// Obtener todos los registros
$sql = "SELECT * FROM cursos WHERE lenguaje = 'Java'";//Aqui ya depende de como esté escrito el valor para que funcione o no.
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos de Java</title>
    <link rel="stylesheet" href="../stilos/global.css">
    <link rel="stylesheet" href="../stilos/cursos_java.css">
</head>
<body>
    
    <main>
        <div class="container">
            <h1>Clases de Java:</h1>
            <hr>
            <dl>
            <div class="lessons-grid">
                <?php while($clases = $result->fetch_assoc()): ?>
        <a href="../scripts/clases_java.php?numero=<?= $clases['numero'] ?>" class="lesson-card">
            <dt><h3><?= htmlspecialchars($clases['titulo']) ?></h3></dt>
            <dd><p><?= htmlspecialchars($clases['descripcion']) ?></p></dd>
            <dd><p><?= htmlspecialchars($clases['dificultad']) ?></p></dd>
            <dd><p><?= htmlspecialchars($clases['exp']) ?></p></dd>
        </a>
    <?php endwhile; ?>         
        </div>
                </dl>
    </main>

</body>
</html>

<?php

?>