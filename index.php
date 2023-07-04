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
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crosso rigin="anonymous">
  </script>
</body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-info">
               <div class="card-header bg-info">
                  <h1 class="text-warning">Lista de mascotas</h1>
                  <a href="registro.php" class="btn btn-primary">Nuevo Registro</a>
                  <a href="excel.php" class="btn btn-success">Exportar en Excel</a>
                  <a href="principal.php" class="btn btn-danger">Volver</a>
               </div>
               <div class="card-body">
                  <table class="table">
                      <tr class="bg-file">
                        <td class="text-center atr">IdMascota</td>
						            <td class="text-center atr">Nombre</td>
						            <td class="text-center atr">Sexo</td>
						            <td class="text-center atr">FechNac</td>
						            <td class="text-center atr">Edad</td>
						            <td class="text-center atr">Peso (kg)</td>
						            <td class="text-center atr">Raza</td>
                        <td class="text-center atr">Tamaño</td>
                        <td class="text-center atr">Foto</td>
                        <td class="text-center atr">Alergia</td>
                        <td class="text-center atr">Propietario</td>
                        <td class="text-center atr">Historial </td>
                        <td class="text-center atr">Acciones</td>
                      </tr>
                      <?php

					           
                      // $sql = "select * from mascota order by idmascota";
					            // $sql = "select IdMascota, Nombre, IdSexo, FechNac, Edad, Peso, IdRaza, IdTamaño, Foto, a.NomAlergia
                      //  from mascota m, alergia a
                      //  where m.IdAlergia=a.IdAlergia
                      //  order by idmascota";
					             $sql = "select IdMascota, Nombre, IdSexo, FechNac, Edad, Peso, IdRaza, IdTamaño, Foto, a.NomAlergia, concat(p.NomProp,' ', p.ApellProp), h.Tipo
                       from mascota m
                       inner join alergia a
                       on m.IdAlergia=a.IdAlergia
                       
                       inner join propietario p
                       on p.IdPropietario=m.IdPropietario
                       
                       inner join historial h
                       on h.IdHistorial=m.IdHistorial

                       order by idmascota";
                       
                       require_once("conexion/conexion.php");

                      
                      $rs = mysqli_query($cn,$sql);
                      while($fila = mysqli_fetch_row($rs)){
                        echo "<tr class='text-center'>";
                        for ($i=0; $i <=11 ; $i++){ 
                          if($i == 8){
                            echo "<td><img src=".$fila[$i]." width=60 height=70>";
                          }else{
                            echo "<td>".$fila[$i];
                          }
                        }
                        echo "<td><a href='editarmascota.php?id=".$fila[0]."' class='btn btn-warning'>Editar</a>
                        <a href= 'eliminarmascota.php?id=$fila[0]' class='btn btn-danger' onclick='return ConfirmDelete()'>Eliminar</a>";
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
<script type="text/javascript">
  function ConfirmDelete(){
    var respuesta = confirm("Está seguro que desea eliminar a la mascota?");

    if(respuesta == true){
      return true;
    }else{
      return false;
    }
  }
</script>

</html>