<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sistema PHP Interactivo</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #0b1220;
        color: white;
        padding: 20px;
    }
    h1, h2 {
        color: #4fc3f7;
    }
    button {
        padding: 10px;
        margin: 5px 0;
        width: 100%;
        background: #1e88e5;
        color: white;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background: #1565c0;
    }
    input {
        padding: 8px;
        width: 100%;
        margin: 5px 0 15px;
    }
    .box {
        background: #111827;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
    }
    a {
        color: #4fc3f7;
        text-decoration: none;
    }
</style>
</head>
<body>

<h1>SISTEMA DE EJERCICIOS PHP</h1>

<form method="get">
    <button name="op" value="1">Mayoría de edad</button>
    <button name="op" value="2">Evaluación de notas</button>
    <button name="op" value="3">Clasificación del promedio</button>
    <button name="op" value="4">Día de la semana</button>
    <button name="op" value="5">Conteo ascendente</button>
    <button name="op" value="6">Conteo descendente</button>
    <button name="op" value="7">Tabla de multiplicar</button>
    <button name="op" value="8">Suma de números</button>
    <button name="op" value="9">Conteo de elementos</button>
    <button name="op" value="10">Validación de acceso</button>
</form>

<?php
if (isset($_GET['op'])) {
echo "<div class='box'>";

switch ($_GET['op']) {

/* 1. EDAD */
case 1:
?>
<h2>Mayoría de edad</h2>
<form method="post">
    <input type="number" name="edad" placeholder="Ingrese la edad" required>
    <button>Evaluar</button>
</form>
<?php
if (isset($_POST['edad'])) {
    echo ($_POST['edad'] >= 18) ? "Mayor de edad" : "Menor de edad";
}
break;

/* 2. NOTA */
case 2:
?>
<h2>Evaluación de notas</h2>
<form method="post">
    <input type="number" name="nota" placeholder="Ingrese la nota" required>
    <button>Evaluar</button>
</form>
<?php
if (isset($_POST['nota'])) {
    echo ($_POST['nota'] >= 11) ? "APRUEBA" : "DESAPRUEBA";
}
break;

/* 3. PROMEDIO */
case 3:
?>
<h2>Clasificación del promedio</h2>
<form method="post">
    <input type="number" name="promedio" placeholder="Ingrese el promedio" required>
    <button>Clasificar</button>
</form>
<?php
if (isset($_POST['promedio'])) {
    $p = $_POST['promedio'];
    if ($p >= 18) echo "Excelente";
    elseif ($p >= 14) echo "Bueno";
    elseif ($p >= 11) echo "Regular";
    else echo "Deficiente";
}
break;

/* 4. DIA */
case 4:
?>
<h2>Día de la semana</h2>
<form method="post">
    <input type="number" name="dia" placeholder="Número del 1 al 7" required>
    <button>Mostrar</button>
</form>
<?php
if (isset($_POST['dia'])) {
    $dias = [1=>"Lunes",2=>"Martes",3=>"Miércoles",4=>"Jueves",5=>"Viernes",6=>"Sábado",7=>"Domingo"];
    echo $dias[$_POST['dia']] ?? "Día inválido";
}
break;

/* 5. ASCENDENTE */
case 5:
?>
<h2>Conteo ascendente</h2>
<form method="post">
    <input type="number" name="limite" placeholder="Ingrese límite" required>
    <button>Contar</button>
</form>
<?php
if (isset($_POST['limite'])) {
    for ($i=1; $i<=$_POST['limite']; $i++) echo $i."<br>";
}
break;

/* 6. DESCENDENTE */
case 6:
?>
<h2>Conteo descendente</h2>
<form method="post">
    <input type="number" name="inicio" placeholder="Ingrese inicio" required>
    <button>Contar</button>
</form>
<?php
if (isset($_POST['inicio'])) {
    for ($i=$_POST['inicio']; $i>=1; $i--) echo $i."<br>";
}
break;

/* 7. TABLA */
case 7:
?>
<h2>Tabla de multiplicar</h2>
<form method="post">
    <input type="number" name="num" placeholder="Número base" required>
    <button>Generar</button>
</form>
<?php
if (isset($_POST['num'])) {
    for ($i=1; $i<=10; $i++)
        echo $_POST['num']." x $i = ".($_POST['num']*$i)."<br>";
}
break;

/* 8. SUMA */
case 8:
?>
<h2>Suma de números</h2>
<form method="post">
    <input type="number" name="lim" placeholder="Número límite" required>
    <button>Sumar</button>
</form>
<?php
if (isset($_POST['lim'])) {
    $s=0;
    for ($i=1;$i<=$_POST['lim'];$i++) $s+=$i;
    echo "Resultado: $s";
}
break;

/* 9. CONTAR ELEMENTOS */
case 9:
?>
<h2>Conteo de elementos</h2>
<?php
$datos = ["PHP","HTML","CSS","JS","MySQL"];
echo "Elementos: ".count($datos);
break;

/* 10. ACCESO */
case 10:
?>
<h2>Validación de acceso</h2>
<form method="post">
    <input type="text" name="rol" placeholder="Rol (admin/usuario)" required>
    <button>Validar</button>
</form>
<?php
if (isset($_POST['rol'])) {
    echo ($_POST['rol']=="admin") ? "Acceso autorizado" : "Acceso denegado";
}
break;
}

echo "<br><br><a href='index.php'>⬅ Volver al menú</a></div>";
}
?>

</body>
</html>


