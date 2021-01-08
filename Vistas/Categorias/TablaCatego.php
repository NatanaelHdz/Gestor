<?php
	session_start();
	require_once "../../Clases/Clases.php";
	$idUsuario= $_SESSION['idUsuario'];
	$conexion= new Conectar();
	$conexion = $conexion->conexion();
?>


	<div class="table-responsive">
		<table class="table table-hover table-dark" id="tablaCatego">
					<thead>
					<tr>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
					</thead>
					<tbody>


					<?php

					$sql="SELECT id_categoria,
					nombre,
					fechaInsert
					FROM t_categorias WHERE id_usuario = '$idUsuario'";

					$result = mysqli_query($conexion,$sql);
					while($mostrar = mysqli_fetch_array($result)){
						$idCategoria=$mostrar['id_categoria'];
					?>
						<tr>
							<td><?php echo $mostrar['nombre'];?></td>
							<td><?php echo $mostrar['fechaInsert'];?></td>
	                        <td>
							<span class="btn btn-warning btn-sm" onclick="ObtenerDatosCategoria('<?php echo $idCategoria ?>')
							"data-toggle="modal" data-target="#modalActualizarCategoria">
								<i class="far fa-edit"></i></span>
										</td>
							<td>
								<span  class="btn btn-danger btn-sm" onclick="EliminarCategorias('<?php echo $idCategoria ?>')">
									<i class="fas fa-eraser"></i>
								</span>
							</td>
						</tr>
						<?php
					}
						?>
				</tbody>
		</table>
	</div>

	

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaCatego').DataTable();
		})
	</script>