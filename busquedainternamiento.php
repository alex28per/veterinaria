<?php 
  session_start(); 
?>
<body>
	<?php
    include 'header.php';
?>
	<div class="container">
		<div class="col-md-12">
			<h3 class="text-danger">Búsqueda de Internamientos</h3>
			<form name="frmBuscar" method="POST" action="">
					<div class="form-group">
					<label for="Dato">Ingrese ID / Nombre del diagnostico:</label>
					<input type="text" name="txtDato" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="submit" value="Buscar" class="btn btn-primary">
                    <a href="internamiento.php" class="btn btn-danger">Regresar</a>
				</div>

			</form>
		</div>
		<?php 
		  if($_POST){
            echo "<div class='card border-info'>";
            echo "<div class='card-body'>";
              echo "<table class='table table-hover'>";
                 echo "<tr class='bg-info'>";
                    echo  "<th class='text-white text-center'>IdInternamiento</th>";
					echo  "<th class='text-white text-center'>Motivo</th>";
					echo  "<th class='text-white text-center'>FechIngreso</th>";
					echo  "<th class='text-white text-center'>FechSalida</th>";
					echo  "<th class='text-white text-center'>Peso (kg)</th>";
					echo  "<th class='text-white text-center'>Temperatura</th>";
					echo  "<th class='text-white text-center'>Diagnostico</th>";
                    echo  "<th class='text-white text-center'>Comentarios</th>";
					echo  "<th class='text-white text-center'>Mascota</th>";
                    echo  "<th class='text-white text-center'>Total a pagar</th>";
				echo "</tr>";
					/*cadena para generar la consulta*/
                       $sql="select idinternamiento, motivo, fechingreso, fechsalida, i.Peso,
					   temperatura, diagnostico, comentarios, m.nombre, totalpago from internamiento i
					   inner join mascota m 
					   on i.idmascota = m.idmascota
					   where idinternamiento='".$_POST['txtDato']."' Or motivo like '%".$_POST['txtDato'].
                       "' Or diagnostico like '%".$_POST['txtDato']."' Or m.nombre like '%" .$_POST['txtDato']."%'";
                    /*invoca al archivo de conexion*/
                    require_once("conexion/conexion.php");

                    /*ejecutando la consulta*/
                    $rs = mysqli_query($cn,$sql);

                    /*mostrando datos del resultset ($rs)*/
                    while($fila = mysqli_fetch_row($rs)){
                    	echo "<tr class=text-center>";
                    	   for($i = 0;$i <= 9; $i++){
                    	   	echo "<td>".$fila[$i];
                    	   }
                    	}

                      echo "</tr>";
                    
                    mysqli_close($cn);
                echo "</table>";
                echo "</div>";
                echo "</div>";
                    }
					?>
				</table>
			</div>
		</div>
	</div>