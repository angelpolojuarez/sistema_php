<?php
session_start();

/* REGISTRO SIMPLE (SIMULADO) */
if (isset($_POST['register'])) {
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['pass'] = $_POST['pass'];
    $msg = "Usuario registrado correctamente";
}

/* LOGIN */
if (isset($_POST['login'])) {
    if ($_POST['user'] == $_SESSION['user'] && $_POST['pass'] == $_SESSION['pass']) {
        $_SESSION['login'] = true;
    } else {
        $msg = "Credenciales incorrectas";
    }
}

/* LOGOUT */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sistema PHP Completo</title>
<style>
body {
    font-family: Arial;
    background: #0b1220;
    color: white;
    padding: 20px;
}
h1,h2 { color:#4fc3f7; }
input, button {
    width:100%;
    padding:10px;
    margin:5px 0;
}
button {
    background:#1e88e5;
    color:white;
    border:none;
}
.box {
    background:#111827;
    padding:20px;
    border-radius:8px;
    margin-top:20px;
}
a { color:#4fc3f7; text-decoration:none; }
</style>
</head>
<body>

<h1>SISTEMA PHP CON LOGIN</h1>

<?php if (!isset($_SESSION['login'])) { ?>

<!-- REGISTRO -->
<div class="box">
<h2>Registro</h2>
<form method="post">
    <input type="text" name="user" placeholder="Usuario" required>
    <input type="password" name="pass" placeholder="Contraseña" required>
    <button name="register">Registrarse</button>
</form>
</div>

<!-- LOGIN -->
<div class="box">
<h2>Login</h2>
<form method="post">
    <input type="text" name="user" placeholder="Usuario" required>
    <input type="password" name="pass" placeholder="Contraseña" required>
    <button name="login">Ingresar</button>
</form>
</div>

<p><?= $msg ?? "" ?></p>

<?php } else { ?>

<h2>Bienvenido, <?= $_SESSION['user'] ?></h2>
<a href="?logout=1">Cerrar sesión</a>

<div class="box">
<form method="get">
    <button name="op" value="1">Mayoría de edad</button>
    <button name="op" value="2">Evaluación de notas</button>
    <button name="op" value="3">Promedio</button>
    <button name="op" value="4">Día de la semana</button>
    <button name="op" value="5">Conteo ascendente</button>
    <button name="op" value="6">Conteo descendente</button>
    <button name="op" value="7">Tabla de multiplicar</button>
    <button name="op" value="8">Suma de números</button>
</form>
</div>

<?php
if (isset($_GET['op'])) {
echo "<div class='box'>";

switch ($_GET['op']) {

case 1:
?>
<h2>Mayoría de edad</h2>
<form method="post">
<input type="number" name="edad" required>
<button>Evaluar</button>
</form>
<?php
if (isset($_POST['edad']))
echo ($_POST['edad']>=18)?"Mayor de edad":"Menor de edad";
break;

case 2:
?>
<h2>Evaluación de notas</h2>
<form method="post">
<input type="number" name="nota" required>
<button>Evaluar</button>
</form>
<?php
if (isset($_POST['nota']))
echo ($_POST['nota']>=11)?"APRUEBA":"DESAPRUEBA";
break;

case 3:
?>
<h2>Promedio</h2>
<form method="post">
<input type="number" name="prom" required>
<button>Clasificar</button>
</form>
<?php
if (isset($_POST['prom'])) {
$p=$_POST['prom'];
echo ($p>=18)?"Excelente":(($p>=14)?"Bueno":(($p>=11)?"Regular":"Deficiente"));
}
break;

case 4:
?>
<h2>Día de la semana</h2>
<form method="post">
<input type="number" name="dia" required>
<button>Mostrar</button>
</form>
<?php
if (isset($_POST['dia'])) {
$dias=[1=>"Lunes",2=>"Martes",3=>"Miércoles",4=>"Jueves",5=>"Viernes",6=>"Sábado",7=>"Domingo"];
echo $dias[$_POST['dia']] ?? "Inválido";
}
break;

case 5:
?>
<h2>Conteo ascendente</h2>
<?php for($i=1;$i<=10;$i++) echo $i."<br>"; break;

case 6:
?>
<h2>Conteo descendente</h2>
<?php for($i=10;$i>=1;$i--) echo $i."<br>"; break;

case 7:
?>
<h2>Tabla de multiplicar</h2>
<form method="post">
<input type="number" name="num" required>
<button>Generar</button>
</form>
<?php
if(isset($_POST['num']))
for($i=1;$i<=10;$i++)
echo $_POST['num']." x $i = ".($_POST['num']*$i)."<br>";
break;

case 8:
?>
<h2>Suma de números</h2>
<form method="post">
<input type="number" name="lim" required>
<button>Sumar</button>
</form>
<?php
if(isset($_POST['lim'])){
$s=0;
for($i=1;$i<=$_POST['lim'];$i++) $s+=$i;
echo "Resultado: $s";
}
break;
}

echo "</div>";
}
?>

<?php } ?>

</body>
</html>



