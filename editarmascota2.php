<?php

    /*inserta nuevo mascota en la tabla de mascotas */
    $id=$_POST['txtId'];
	$Nombre= $_POST['txtNom'];
	$Sexo= $_POST['cboSexo'];
	$FechNac= $_POST['FechNac'];
	$Edad= $_POST['txtEdad'];
    $Peso= $_POST['txtPeso'];
    $Raza= $_POST['cboRaza'];
    $Tamaño= $_POST['cboTamaño'];
    $Foto= "imgmascota/".$id.".jpg";
    $Imagen=$_POST['chkImg'];
    $IdAlergia= $_POST['cboAlergia'];
    $IdPropietario= $_POST['cboPropietario'];
    $IdHistorial= $_POST['cboHistorial'];

    require_once("conexion/conexion.php");

	$sql = "update mascota set nombre='".$Nombre."',idsexo='".$Sexo."',fechnac='".$FechNac."',edad=".$Edad.",peso=".$Peso.",
    idraza='".$Raza."',idtamaño='".$Tamaño."',foto='".$Foto."',idalergia='".$IdAlergia."', idpropietario='".$IdPropietario."',
    idhistorial ='".$IdHistorial."' where idmascota='".$id."'";
	$rs=mysqli_query($cn,$sql);

	/*subiendo imagen al servidor*/
    if($Imagen == 1){
	$archivo = $id.".jpg";
	$ruta = "imgmascota/";
    unlink($ruta.$archivo);


	move_uploaded_file($_FILES['txtFoto']['tmp_name'],$ruta.$_FILES['txtFoto']['name']);
	rename($ruta.'/'.$_FILES['txtFoto']['name'],$ruta.'/'.$archivo); 
    }

    header("Location: index.php");
?>