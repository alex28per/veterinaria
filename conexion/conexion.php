<?php
/*conexion a la base de datos veterinaria*/
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$basedatos = "veterinaria";

/*obtiene la conexion fisica a la bd */
$cn = mysqli_connect($servidor,$usuario,$contraseña);

/*selecciona la bd*/
mysqli_select_db($cn,$basedatos);

?>

