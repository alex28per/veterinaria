<?php session_start(); 
if($_SESSION["tipousu"]==""){
    header("Location: login.html");
}?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<?php
    /*cadena para generar la consulta a la tabla de productos*/
    $id = $_GET["id"];
    $sql = "select * from mascota where idmascota ='$id'";

    /*invoca al archivo de conexión*/
    require_once("conexion/conexion.php");

    /*ejecutando la consulta*/
    $rs = mysqli_query($cn, $sql);

    /*obteniendo datos del resultset ($rs)*/
    $fila = mysqli_fetch_row($rs);
    $nomb = $fila[1];
    $sex = $fila[2];
    $fechnaci = $fila[3];
    $eda = $fila[4];
    $pes = $fila[5];
    $raz = $fila[6];
    $tam = $fila[7];
    $img = $fila[8];
    $ale = $fila[9];

?>

<div class="container">
		<div class="card border-info">
			<div class="card-header bg-info">
				<h1 class="text-warning">Editar Mascota</h1>
			</div>
			<div class="card-body">
				<div class="col-md-4 m-auto text-center">
					<form name="frmMascota" method="POST" action="editarmascota2.php" enctype="multipart/form-data">
                    <div class="form-group">
					<label for="IdMascota">ID Mascota:</label>
					<input type="text" name="txtId" class="form-control" readonly value="<?php echo $id;?>">
				</div>
				    <div class="form-group">
					    <label for="Nombre">Nombre:</label>
					    <input type="text" name="txtNom" class="form-control" required value="<?php echo $nomb;?>">
				    </div>
				    <div class="form-group">
					    <label for="Sexo">Sexo:</label>
					    <select name="cboSexo" class="form-select" value="<?php echo $sex;?>">
              <option <?= ($sex == "Macho") ? 'selected="selected"' : '' ?>>Macho</option>
                <option <?= ($sex == "Hembra") ? 'selected="selected"' : '' ?>>Hembra</option>
                        </select>
				    </div>
					<div class="form-group">
					    <label for="FechaNacimiento">Fecha de nacimiento:</label>
					    <input type="date" name="FechNac" class="form-control" id="dob" min="1990-01-01" required
                        value="<?php echo $fechnaci;?>">
				    </div>
                    <h1 class="edad"></h1>
                    <div class="form-group">
					    <label for="Edad">Edad</label>
					    <input type="text" name="txtEdad" readonly onmousemove="FindAge()" id="age" class="form-control" min="0" value="<?php echo $eda;?>">
				    </div>
                    <div class="form-group">
					    <label for="Peso">Peso (kg):</label>
					    <input type="number" name="txtPeso" class="form-control" required value="<?php echo $pes;?>">
				    </div>
                    <div class="form-group">
					    <label for="Raza">Raza:</label>
					    <select name="cboRaza" class="form-select" value="<?php echo $raz;?>">
              <option <?=($raz=="Chihuahua")?'selected="selected"':''?>>Perro Chihuahua</option>
                <option <?=($raz=="Boxer")?'selected="selected"':''?>>Perro Boxer</option>
                <option <?=($raz=="Dalmata")?'selected="selected"':''?>>Perro Dalmata</option>
                <option <?=($raz=="Rottweiler")?'selected="selected"':''?>>Perro Rottweiler</option>
                <option <?=($raz=="Pitbull")?'selected="selected"':''?>>Perro Pitbull</option>
                <option <?=($raz=="PastorAleman")?'selected="selected"':''?>>Perro Pastor Aleman</option>
                <option <?=($raz=="Labrador")?'selected="selected"':''?>>Perro Labrador</option>
                <option <?=($raz=="Doberman")?'selected="selected"':''?>>Perro Doberman</option>
                <option <?=($raz=="Siberiano")?'selected="selected"':''?>>Perro Siberiano</option>
                <option <?=($raz=="Siames")?'selected="selected"':''?>>Gato Siames</option>
                <option <?=($raz=="Siberiano2")?'selected="selected"':''?>>Gato Siberiano</option>
                <option <?=($raz=="Persa")?'selected="selected"':''?>>Gato Persa</option>
                <option <?=($raz=="Himalayo")?'selected="selected"':''?>>Gato Himalayo</option>
                <option <?=($raz=="Bengali")?'selected="selected"':''?>>Gato Bengali</option>
                <option <?=($raz=="Angora")?'selected="selected"':''?>>Gato Angora</option>
                        </select>
				    </div>
                    <div class="form-group">
					    <label for="Tamaño">Tamaño:</label>
					    <select name="cboTamaño" class="form-select">
              <option <?=($tam=="Pequeño")?'selected="selected"':''?>>Pequeño</option>
                <option <?=($tam=="Mediano")?'selected="selected"':''?>>Mediano</option>
                <option <?=($tam=="Grande")?'selected="selected"':''?>>Grande</option>
                        </select>
				    </div>
                    <div class="form-group">
					<input type="checkbox" name="chkImg" id="chkImg" 
					value="1"><label for="chkImg">Cambiar imagen</label>
				</div>
                    <div class="form-group">
					    <label for="Foto">Foto:</label>
					    <input type="file" name="txtFoto" id="txtFoto" class="form-control" value="<?php echo $img;?>">
				    </div>
                    <div class="form-group">
					    <label for="Alergia">Alergia:</label>
                        <select name="cboAlergia" class="form-select" required value="<?php echo $ale;?>">
                        <?php
                         require_once("conexion/conexion.php");
                         $sql="select * from alergia";
                         $rs=mysqli_query($cn,$sql);
                          while($fila = mysqli_fetch_row($rs)){
                           echo '<option value="'.$fila[0].'" selected>'.$fila[1].'</option>';
                      }
                      ?>
                        </select>
				            </div>
                    <div class="form-group">
					    <label for="Alergia">Propietario:</label>
                        <select name="cboPropietario" class="form-select" required value="<?php echo $ale;?>">
                        <?php
                         require_once("conexion/conexion.php");
                         $sql="select * from propietario";
                         $rs=mysqli_query($cn,$sql);
                          while($fila = mysqli_fetch_row($rs)){
                           echo '<option value="'.$fila[0].'" selected="selected">'.$fila[3].' '.$fila[2].'</option>';
                      }
                      ?>
                        </select>
				            </div>
                    <div class="form-group">
					    <label for="Alergia">Vacuna:</label>
                        <select name="cboHistorial" class="form-select" required value="<?php echo $ale;?>">
                        <?php
                         require_once("conexion/conexion.php");
                         $sql="select * from historial";
                         $rs=mysqli_query($cn,$sql);
                          while($fila = mysqli_fetch_row($rs)){
                           echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';
                      }
                      ?>
                        </select>
				            </div>
                    <div class="form-group mt-2">
					            <input type="submit" value="Actualizar mascota" class="btn btn-primary">
                      <a href="index.php" class="btn btn-danger text-white">Regresar</a>
				           </div>
                    </form>
                </div>
            </div>
        </div>
</div>






  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script>
     var datePickerId=document.getElementById('fecha_nacimiento');
    datePickerId.max=new Date().toISOString().split("T")[0];
  </script>
    <script>
      function FindAge(){
        var day = document.getElementById("dob").value;
        var DOB = new Date(day);
        var today = new Date();
        var Age = today.getTime() - DOB.getTime();
        Age = Math.floor(Age / (1000*60*60*24*365.25));
        document.getElementById("age").value= Age;
      }
  </script>
   <script>
    var datePickerId=document.getElementById('dob');
    datePickerId.max=new Date().toISOString().split("T")[0];
  </script>
</body>

</html>