<?php session_start();
if ($_SESSION["tipousu"] == "") {
  header("Location: login.html");
} ?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/cb51d63767.js" crossorigin="anonymous"></script>

</head>

<body>

  <div class="container">
    <div class="card border-info">
      <div class="card-header bg-info">
        <h1 class="text-warning">Nueva Mascota</h1>
      </div>
      <div class="card-body">
        <div class="col-md-4 m-auto text-center">
          <form name="frmMascota" method="POST" action="registro2.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="Nombre">Nombre:</label>
              <input type="text" name="txtNom" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Sexo">Sexo:</label>
              <select name="cboSexo" class="form-select">
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
              </select>
            </div>
            <div class="form-group">
              <label for="FechaNacimiento">Fecha de nacimiento:</label>
              <input type="date" name="FechNac" name="dob" class="form-control" id="dob" min="1990-01-01" required>
            </div>
            <h1 class="edad"></h1>
            <div class="form-group">
              <label for="Edad">Edad:</label>
              <input type="text" name="txtEdad" readonly onmousemove="FindAge()" id="age" class="form-control" min="0" >
            </div>
            <div class="form-group">
              <label for="Peso">Peso (kg):</label>
              <input type="number" name="txtPeso" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Raza">Raza:</label>
              <select name="cboRaza" class="form-select">
                <option value="Chihuahua">Perro Chihuahua</option>
                <option value="Boxer">Perro Boxer</option>
                <option value="Dalmata">Perro Dalmata</option>
                <option value="Rottweiler">Perro Rottweiler</option>
                <option value="Pitbull">Perro Pitbull</option>
                <option value="PastorAleman">Perro Pastor Aleman</option>
                <option value="Labrador">Perro Labrador</option>
                <option value="Doberman">Perro Doberman</option>
                <option value="Siberiano">Perro Siberiano</option>
                <option value="Siames">Gato Siames</option>
                <option value="Siberiano2">Gato Siberiano</option>
                <option value="Persa">Gato Persa</option>
                <option value="Himalayo">Gato Himalayo</option>
                <option value="Bengali">Gato Bengali</option>
                <option value="Angora">Gato Angora</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Tamaño">Tamaño:</label>
              <select name="cboTamaño" class="form-select">
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Foto">Foto:</label>
              <input type="file" name="txtFoto" id="txtFoto" class="form-control">
            </div>
            <div class="form-group">
              <label for="Alergia">Alergia:</label>
              <select name="cboAlergia" class="form-select" required>
                <?php
                require_once("conexion/conexion.php");
                $sql = "select * from alergia";
                $rs = mysqli_query($cn, $sql);
                while ($fila = mysqli_fetch_row($rs)) {
                  echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Propietario:</label>
              <select name="cboPropietario" class="form-select" required>
                <?php
                require_once("conexion/conexion.php");
                $sql = "select * from propietario";
                $rs = mysqli_query($cn, $sql);
                while ($fila = mysqli_fetch_row($rs)) {
                  echo '<option value="' . $fila[0] . '">' . $fila[3] . ' ' . $fila[2]  . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Vacuna:</label>
              <select name="cboHistorial" class="form-select" required>
                <?php
                require_once("conexion/conexion.php");
                $sql = "select * from historial";
                $rs = mysqli_query($cn, $sql);
                while ($fila = mysqli_fetch_row($rs)) {
                  echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group mt-2">
              <input type="submit" value="Registrar" class="btn btn-primary">
              <a href="index.php" class="btn btn-danger">Regresar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    var datePickerId=document.getElementById('dob');
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
</body>

</html>