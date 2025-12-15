<?php
include 'db.php';

//Se verifica que el usuario tenga la sesion iniciada
if (!isset($_SESSION['usuario_email'])) {
    header("Location: sesion.html");
    exit();
}

//Se obtiene el numero de la leccion.
$numero = isset($_GET['numero']) ? intval($_GET['numero']) : 0;

// Obtener la experiencia de la leccion
$sql = "SELECT exp FROM cursos WHERE lenguaje = 'Python' AND numero = $numero";
$result = mysqli_query($conexion, $sql);
$dato_exp = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Python</title>
</head>
<body>
<script>
window.onload = function() {
    // Ocultar todos los elementos con la clase 'Examen'
    var tests = document.getElementsByClassName('Examen');
    for (var i = 0; i < tests.length; i++) {
        tests[i].style.display = 'none';
    }
    // Mostrar solo el que coincide con el número recibido
    var seleccion = document.getElementById('<?= $numero ?>');
    if (seleccion) {
        seleccion.style.display = 'block';
    }
};
</script>

    <form id="1" class="Examen" method="post">
    <h3>La siguiente sintaxis es correcta?</h3>
        <p>System.out.println(Hola mundo);</p>
        <input type="radio" id="R_si" name="Respuesta" value="V" required>Si <input type="radio" id="R_no" name="Respuesta" value="F">No<br><br>
        <h3>Que le falta a esta sintaxis?</h3>
        <p>System.out.println(numero)</p>
        <input type="radio" id="R2_v" name="Respuesta2" value="V" required>comillas ("") <input type="radio" id="R2_f" name="Respuesta2" value="F">punto y coma (;) <input type="radio" id="R2_vf" name="Respuesta2" value="VF">Ambos<br><br>
    <input type="submit" value="Comprobar">

    <?php
    if(isset($_POST['Respuesta'])&&$_POST['Respuesta']=="V"){
    echo "INCORRECTO, le faltan comillas dentro del parentesis <br>";
}else{
    echo "CORRECTO, le faltan comillas dentro del parentesis <br> ";
}

if(isset($_POST['Respuesta2'])&&$_POST['Respuesta2']=="VF"){
    echo "CORRECTO <br>";
}else{
    echo "INCORRECTO, le faltan comillas dentro del parentesis y el punto y coma del final. <br> ";
}
    ?>
</form>

<form id="2" class="Examen" method="post">
    <h3>La siguiente sintaxis es correcta?</h3>
        <p>int numero = 1;</p>
        <p>System.out.println(numero);</p>
        <input type="radio" id="R_x" name="Respuesta" value="V" required>Si <input type="radio" id="R_y" name="Respuesta" value="F">No<br><br>
        <h3>Que le falta a esta sintaxis?</h3>
        <p>numero = 87;</p>
        <p>System.out.println(numero);</p>
        <input type="radio" id="R2_x" name="Respuesta2" value="V" required>El tipo de variable (int) <input type="radio" id="R2_y" name="Respuesta2" value="F">Nada <input type="radio" id="R2_z" name="Respuesta2" value="VF">Comillas ("")<br><br>
    <input type="submit" value="Comprobar">
    
    <?php
    if(isset($_POST['Respuesta'])&&$_POST['Respuesta']=="V"){
    echo "CORRECTO <br>";
}else{
    echo "INCORRECTO, el código está bien <br> ";
}

if(isset($_POST['Respuesta2'])&&$_POST['Respuesta2']=="V"){
    echo "CORRECTO <br>";
}else{
    echo "INCORRECTO, le falta el tipo de variable (int) <br> ";
}
    ?>
</form>

<?php
//Se obtiene el correo del usuario
$email_user = $_SESSION['usuario_email'];

$query = "SELECT exp FROM Usuario WHERE email = '$email_user'";
$res = mysqli_query($conexion, $query);
$dato_usuario = mysqli_fetch_assoc($res);

$expTotal=$dato_usuario['exp']+$dato_exp['exp'];

    $consulta = "UPDATE Usuario SET exp = $expTotal WHERE email = '$email_user'";
    if (mysqli_query($conexion, $consulta) === FALSE) {
    echo "Error: " . mysqli_error($conexion);
}
?>
</body>
</html>