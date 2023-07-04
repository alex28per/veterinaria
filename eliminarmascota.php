<?php
$id = $_GET["id"];
  $sql = "delete from mascota where idmascota = '$id'";
  /*invoca al archivo de conexion*/

  require_once("conexion/conexion.php");

  /*ejecutando la consulta*/
  mysqli_query($cn,$sql);

  /*cerrar la conexion*/

  mysqli_close($cn);

  /*redireccionando a la pagina de contactos registrados*/

  header("Location: index.php");

  ?>