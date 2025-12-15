<?php
$numero = isset($_GET['numero']) ? intval($_GET['numero']) : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase Python- DI-NAMO</title>
    <link rel="stylesheet" href="../stilos/global.css">
    <link rel="stylesheet" href="../stilos/clases_python.css">
</head>
<body onload="document.getElementById('respuesta').style.display='none';">

  <script>
window.onload = function() {
    // Ocultar todos los elementos con la clase 'lesson'container'
    var lecciones = document.getElementsByClassName('lesson-container');
    for (var i = 0; i < tests.length; i++) {
        lecciones[i].style.display = 'none';
    }
    // Mostrar solo el que coincide con el número recibido
    var seleccion = document.getElementById('<?= $numero ?>');
    if (seleccion) {
        seleccion.style.display = 'block';
    }
};
</script>
    <main>
        <div id = "1" class="lesson-container">
            <div class="instructions">
                <h2>Lección 1: Inicios en Python</h2>
                <p><strong>Objetivo:</strong> Aprender ¿Qué es Python? y realizar un Hola Mundo.</p>
            </div>

            <div class="Explicacion">
                <h2>Que es Python?</h2>
                <p>Java es un lenguaje de programación orientado a objetos lo que significa que todo el código se organiza en clases y objetos. Esta organización no es arbitraria; sigue reglas específicas que permiten que el código sea ordenado, mantenible y escalable.</p>
                <h2>¿Por qué se le llama lenguaje?</h2>
                <p>Porque la máquina, tu computadora es como una persona que interpreta un lenguaje, pero este es distinto al nuestro, por lo tanto es necesario un interprete que pueda ver que instrucciones queremos darle a la máquina y convertirlas a su idioma para que pueda realizarlas.
                    Pero antes se debe escribir las instrucciones en un lenguaje mixto, similar al nuestro pero también al de la máquina, para que a nuestro interprete no se le dificulte traducir las instrucciones para la máquina.</p>
                <h2>¿En qué se utiliza?</h2>
                <p>Este lenguaje se utiliza en varias cosas, desde las aplicaciones en tu celular hasta las de computadora. Como dato curioso: El videojuego Minecraft fue programado en Java.</p>
                <h2>Una vez ya sabemos que es Java, comencemos con nuestro primer programa!</h2>
                <p>Este es un ejemplo de código en Java. En el cual le pedimos al sistema imprimir en la terminal de salida un mensaje.</p>
            </div>
            <div class="code-editor">
                <div class="editor-header">
                </div>
                <textarea class="editor-area">print("Hola mundo!!");</textarea>
<button id="prueba" type="button" onclick="
  document.getElementById('respuesta').style.display='block';
">Ejecutar</button>

<p id="respuesta">Hola mundo!!</p>
<hr>
<p>Como resultado escribirá en la terminal el mensaje Hola mundo!!</p>
<h2>Toma en cuenta:</h2>
                <p>En python no es necesario que escribas un punto y coma (;) cada vez que terminas una instruccion del codigo.</p>                
            </div>
        </div>

<!--Leccion 2-->
<div id="2" class="container lesson-container">
            <div class="instructions">
                <h2>Lección 2: Variables</h2>
                <p><strong>Objetivo:</strong> Aprender a declarar las variables.</p>
            </div>

            <div class="Explicacion">
                <h2>Que es una variable?</h2>
                <p>Las variables son un espacio en la memoria de la computadora el cual guarda un valor, este puede ser un numero, un texto o cadena de caracteres, una letra o un valor de verdadero (true) o falso (false)</p>
                <h2>¿Cómo se declaran?</h2>
                <p>Para poder usar una variable es necesario declararla primero, esto para indicar que ese espacio existe, para ello se debe seguir la siguiente estructura: Tipo nombre = valor;</p>
                <h2>¿Qué tipos de variables hay?</h2>
                <p>Como ya se mencionó las variables tienen tipos, esto para indicar qe tipo de dato colocaremos. Los tipos son: int (para numeros enteros), float(numeros con punto decimal), string (cadenas de caracteres, tipo "Hola mundo"), 
                    char (únicamente una sola letra), boolean (valores boleanos, es decir verdadero y falso, como los interruptores de la luz que tienen encendido y apagado).</p>
                <h2>Ahora que sabemos como se declaran las variables, veamos un ejemplo.</h2>
                <p>En este ejemplo vemos como se declara una variable de tipo entero y como usarla.
            <div class="code-editor">
                <div class="editor-header">
                </div>
                <textarea class="editor-area">public class Main {
    public static void main(String[] args) {
        int numero = 1;
        System.out.println(numero);
    }
}</textarea>
<button id="prueba" type="button" onclick="
  document.getElementById('respuesta').style.display='block';
">Ejecutar</button>

<p id="respuesta">1</p>
<hr>
<p>Como resultado escribirá en la terminal el número que almacenamos dentro de la variable, en este caso 1.</p>
<h2>Toma en cuenta:</h2>
                <p>Las variables pueden tener cualquier nombre, pero siempre es recomendable darle un nombre según su función, para de esa forma identificarlo mejor, tomando en cuenta que al escribirlo se deben respetar las mayúsculas y minúsculas tal y como se escribió en 
                    un principio (Para Java, no es lo mismo Numero que numero).</p>                
            </div>
        </div>
    </main>
    <form action="../scripts/prueba_python.php?numero=<?= $numero ?>">
<button id="examen">Realizar prueba</button>
 </form>
    <footer class="main-footer">
        <p>&copy; 2024 DI-NAMO. Todos los derechos reservados.</p>
    </footer>

</body>
</html>