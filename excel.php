<?php
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename= mascotas.xls");


?>

<table class="table">
                      <tr class="bg-file">
                        <th class="text-center atr">IdMascota</th>
						<th class="text-center atr">Nombre</th>
						<th class="text-center atr">Sexo</th>
						<th class="text-center atr">FechNac</th>
						<th class="text-center atr">Edad</th>
						<th class="text-center atr">Peso</th>
						<th class="text-center atr">Raza</th>
                        <th class="text-center atr">Tamano</th>
                        <th class="text-center atr">Foto</th>
                        <th class="text-center atr">IdAlergia</th>
                      </tr>
                      <?php

					            /*cadena para generar la consulta*/
					             $sql = "select * from mascota order by idmascota";
					        
                       /*invoca al archivo de conexion*/
                       require_once("conexion/conexion.php");

                      /*ejecutando la consulta*/
                      $rs = mysqli_query($cn,$sql);
                      while($fila = mysqli_fetch_row($rs)){
                        echo "<tr class='text-center'>";
                        for ($i=0; $i <=9 ; $i++){ 
                          if($i == 8){
                            echo "<td><img src=".$fila[$i]." width=60 height=70>";
                          }else{
                          echo "<td>".$fila[$i];
                          }
                        }
                        echo "</tr>";
                      }
                      mysqli_close($cn);
                      ?>
                  </table>