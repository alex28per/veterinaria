<?php session_start(); 
if($_SESSION["tipousu"]==""){
    header("Location: login.html");
}?>
<?php include 'header.php'  ?>
<link rel="stylesheet" type="text/css" href="css/estilos.php">
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-info">
               <div class="card-header bg-info">
                  <h1 class="text-warning">Historial de vacunas</h1>
                  <a href="principal.php" class="btn btn-danger">Volver</a>
               </div>
               <div class="card-body">
                  <table class="table">
                      <tr class="bg-file">
                                    <td class="text-center atr">IdHistorial</td>
						            <td class="text-center atr">Tipo</td>
						            <td class="text-center atr">Comentarios</td>
						      
                      </tr>
                      <?php

					            /*cadena para generar la consulta*/
					             $sql = "select * from historial order by idhistorial";
					        
                       /*invoca al archivo de conexion*/
                       require_once("conexion/conexion.php");

                      /*ejecutando la consulta*/
                      $rs = mysqli_query($cn,$sql);
                      while($fila = mysqli_fetch_row($rs)){
                        echo "<tr class='text-center'>";
                        for ($i=0; $i <=2 ; $i++){ 
                            echo "<td>".$fila[$i];
                        }
                        echo "</tr>";
                      }
                      mysqli_close($cn);
                      ?>
                  </table>
               </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>