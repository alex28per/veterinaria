<?php
     session_start();

					/*cadena para generar la consulta*/
				   $usr = $_POST["txtId"];
                       $pwd = $_POST["txtPwd"];
                       $sql="select * from usuarios where dni ='$usr' and passwd = '$pwd'";


                    /*invoca al archivo de conexion*/
                    require_once("conexion/conexion.php");

                    /*ejecutando la consulta*/
                    $rs = mysqli_query($cn,$sql);

                    /*evaluando si el $rs contiene datos*/
                    if(mysqli_num_rows($rs) > 0){
                       $fila = mysqli_fetch_row($rs);
                       $_SESSION["nom"]=$fila[1];
                       $_SESSION["passwd"]=$fila[2];
                       $_SESSION["dni"]=$fila[3];
                       $_SESSION["tipousu"]=$fila[4];
                       header("Location: principal.php");
                    }else{
                       header("Location: login.html");
                    }

                    /*obteniendo datos del resultset ($rs)*/
                    $fila = mysqli_fetch_row($rs);
                    
                    mysqli_close($cn);
	?>