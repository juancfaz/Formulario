<?php
include('db.php');
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];
$sexo=$_POST['sexo'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
session_start();

$conexion=mysqli_connect("localhost","root","","Formulario");

$consulta="INSERT INTO registro VALUES(null, '$nombre','$apellido','$edad','$sexo','$correo','$telefono')";
$resultado=mysqli_query($conexion,$consulta);

if(!$resultado)
{
    ?>
    <h3 class="bad">¡Ups, ha ocurrido un error!</h3>
    <?php
}
else
{
    ?>
    <h3 class="good">¡Conexion exitosa!</h3>
    <div class="tabla">
			<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Edad</th>
					<th>Sexo</th>
					<th>Correo</th>
					<th>Telefono</th>
				</tr>
					<?php
						$consulta2 = "SELECT * FROM registro";
						$ejecutarConsulta = mysqli_query($conexion, $consulta2);
						$verFilas = mysqli_num_rows($ejecutarConsulta);
						$fila = mysqli_fetch_array($ejecutarConsulta);

						if(!$ejecutarConsulta){
							echo"Error en la consulta";
						}else{
							if($verFilas<1){
								echo"<tr><td>Sin registros</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									echo'
										<tr>
											<td>'.$fila[0]. '</td>
											<td>'.$fila[1]. '</td>
											<td>'.$fila[2]. '</td>
											<td>'.$fila[3]. '</td>
											<td>'.$fila[4]. '</td>
											<td>'.$fila[5]. '</td>
											<td>'.$fila[6]. '</td>
										</tr>
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);
								}

							}
						}
					?>
			</table>
		</div>
        <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>