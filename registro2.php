<?php
   require_once("conexion/conexion.php");
   $sql = "SELECT max(IdMascota) from mascota";
   $rs = mysqli_query($cn,$sql);
	$fila = mysqli_fetch_row($rs);
	if($fila[0] == NULL){
    	$id = "0001";
	}else {
    	$id = str_pad($fila[0]+1,4,'0',STR_PAD_LEFT);
	}

    /*inserta nuevo mascota en la tabla de mascotas */
	$Nombre= $_POST['txtNom'];
	$Sexo= $_POST['cboSexo'];
	$FechNac= $_POST['FechNac'];
	$Edad= $_POST['txtEdad'];
    $Peso= $_POST['txtPeso'];
    $Raza= $_POST['cboRaza'];
    $Tamaño= $_POST['cboTamaño'];
    $Foto= "imgmascota/".$id.".jpg";
    $IdAlergia= $_POST['cboAlergia'];
    $IdPropietario= $_POST['cboPropietario'];
    $IdHistorial= $_POST['cboHistorial'];

	$sql = "insert into mascota values('".$id."','".$Nombre."','".$Sexo."','".$FechNac."',".$Edad.",".$Peso.",'".$Raza."','".$Tamaño."',
    '".$Foto."','".$IdAlergia."','$IdPropietario', '$IdHistorial')";
	$rs=mysqli_query($cn,$sql);

	/*subiendo imagen al servidor*/
	$archivo = $id.".jpg";
	$ruta = "imgmascota/";
	move_uploaded_file($_FILES['txtFoto']['tmp_name'],$ruta.$_FILES['txtFoto']['name']);
	rename($ruta.'/'.$_FILES['txtFoto']['name'],$ruta.'/'.$archivo); 


    header("Location: index.php");
?>