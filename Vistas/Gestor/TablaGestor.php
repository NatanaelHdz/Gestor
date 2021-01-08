<?php 

session_start();
require_once "../../Clases/Clases.php";
$c=new Conectar();
$conexion=$c->conexion();
$idUsuario = $_SESSION['idUsuario'];
$sql="SELECT archivos.id_archivo as idArchivo, 
				usuarios.nombre as nombreUsuario, 
				categorias.nombre as categoria, 
				archivos.nombre as nombreArchivo, 
				archivos.tipo as tipoArchivo, 
				archivos.ruta as rutaArchivo, 
				archivos.fecha fecha 
				FROM 
					t_archivos as archivos 
					INNER JOIN 
					t_usuarios as usuarios ON archivos.id_usuario = usuarios.id_usuario 
					INNER JOIN 
					t_categorias as categorias ON archivos.id_categoria=categorias.id_categoria 
					and archivos.id_usuario = '$idUsuario'";

		$result = mysqli_query($conexion, $sql);
 ?>


<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-dark" id="tablaGestorDataTable">
				<thead>
					<tr>
						<th>Categoria</th>
						<th>Nombre</th>
						<th>Extensión de archivo</th>
						<th>Descargar</th>
						<th>Visualizar</th>
						<th>Eliminar</th>
				</tr>
				</thead>
				<tbody>
					<?php  


					$extensionesValidad = array('png','jpg','mp3','jpeg','pdf','mp4');

					while($mostrar= mysqli_fetch_array($result)){
							$rutaDescargar ="../Archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
								$nombreArchivo = $mostrar['nombreArchivo'];
								$idArchivo = $mostrar['idArchivo'];
					?>
					<tr>
						<td><?php echo $mostrar ['categoria']; ?></td>
						<td><?php echo $mostrar ['nombreArchivo']; ?></td>
						<td><?php echo $mostrar ['tipoArchivo']; ?></td>
						<td>
								<a href="<?php  echo $rutaDescargar; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btm-sm">
									<span class="fas fa-file-download"> </span>

								</a>
						</td>
						<td>
						 	<?php 
						 	for ($i=0; $i <count($extensionesValidad) ; $i++) { 
						 		if($extensionesValidad[$i] ==$mostrar['tipoArchivo']){
                             
                            ?>
		                            <span class="btn btn-primary btn-sm" 
									 	data-toggle="modal" 
									 	data-target="#visualizarArchivo" 
									 	onclick="obtenerArchivoPorId(<?php echo $idArchivo ?>)">
								 		<span class="fas fa-eye"></span>
								 	</span>
                            
                            <?php 
							 		}
							 	}

						 	 ?>
						</td>
						<td>
							<span class="btn btn-danger btn-sm" 
							onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
								<span class="fas fa-eraser"></span>
							</span>
						</td>
					</tr>
					<?php 
						}
					 ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

	

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorDataTable').DataTable();
	})
</script>