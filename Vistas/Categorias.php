<?php
  session_start();
  if(isset($_SESSION['usuario'])){
      include "header.php";
?>

  <div class="jumbotron jumbotron-fluid">
  		<div class="container">
  			<h1 class="display-4">Categorías</h1>

              <div class="row">
  				<div class="col-sm-4">
  					<span class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  						<i class="fas fa-plus-circle"></i>Agregar categoria
  					</span>
  				</div>
  			</div>
          <hr>
          <div class="row">
              <div class="col-sm-12">
                  <div id="tablaCategorias">
                  
                  
                      </div>
                  </div>
              </div>
  		</div>
	</div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" id="frmCategorias" >
  		<label>Nombre de la categoría</label>
  		<input type="text" name="nombreCate" id="nombreCate" class="form-control input-sm">				
  		</div>
  		<div class="modal-footer">
  		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  		<button class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
  		</form>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar categoría</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="frmActualizaCategoria">
                <input type="text" id="idCategoria" name="idCategoria" hidden="">
                <Label>Categoría</Label>
                <input type="text" id="categoriaU" name="categoriaU" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
        </div>
      </div>
    </div>
  </div>

<?php
    include "footer.php";
?>
    <script src="../Js/Categorias.js"></script>
    <script type="text/javascript">
    		$(document).ready(function(){
    			$('#tablaCategorias').load("Categorias/TablaCatego.php");
    		
          $('#btnGuardarCategoria').click(function(){
            agregarCategoria();
           });
          $('#btnActualizaCategoria').click(function(){
            actualizaCategoria();
           });
      });
    </script>

<?php
    }else{
        header("location:../Index.php");
    }
?>
