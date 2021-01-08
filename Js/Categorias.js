  function agregarCategoria(){
      var categoria = $('#nombreCate').val();

      if(categoria == ""){
        swal ("debes agregar una categoria"); 
        return false;
          }else{
              $.ajax({
              type:"POST",
              data:"categoria=" + categoria,
              url:"../Procesos/Categorias/AgregarCategoria.php",
              success:function(respuesta){
              respuesta = respuesta.trim();
                  if(respuesta == 1){
                    $('#tablaCategorias').load("Categorias/TablaCatego.php");
                      $('#nombreCate').val("");
                          swal(":3","Agregado con exito","success");
                      }else{
                swal(">:3","Fallo al agregar","error");
            }
          }
      });
    }
  }

  function EliminarCategorias(idCategoria){
      idCategoria=parseInt(idCategoria);
      if(idCategoria < 1){
          swal("No tienes id  de Categoría");
          return false;
      }else{
          //**********************************************************************/
          swal({
              title: "¿Estas seguro de eliminar esta categoria?",
              text: "Una vez eliminada, no hay regreso",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    type:"POST",
                    data:"idCategoria=" + idCategoria,
                    url:"../Procesos/Categorias/EliminarCategoria.php",
                    success:function(respuesta){
                        respuesta= respuesta.trim();
                        if(respuesta == 1){
                          $('#tablaCategorias').load("Categorias/TablaCatego.php");
                          swal("Eliminado con exito!", {
                              icon:"success",
                          });
                               }else{
                            swal(":(","Error al eliminar","error");
                        }
                    }
                })
              }
            });
            //*************************************************************************/
      } 


  }


  function ObtenerDatosCategoria(idCategoria){
      $.ajax({
          type:"POST",
          data:"idCategoria=" + idCategoria,
          url:"../Procesos/Categorias/ObtenerCategoria.php",
          success:function(respuesta) {
              respuesta = jQuery.parseJSON(respuesta);

              $('#idCategoria').val(respuesta['idCategoria']);
              $('#categoriaU').val(respuesta['nombreCategoria']);
          }
      });
  }


  function actualizaCategoria(){
      if($('#categoriaU').val() == ""){
          swal("No hay categoría!!");
          return false;
      }else{
          $.ajax({
              type:"POST",
              data:$('#frmActualizaCategoria').serialize(),
              url:"../Procesos/Categorias/ActualizarCategoria.php",
              success:function(respuesta){
                  respuesta=respuesta.trim();

                  if (respuesta == 1){
                      $('#tablaCategorias').load("Categorias/TablaCatego.php");
                      swal(":)","Actualizado con exito","success");
                  } else  {
                      swal(":(","Fallo al actualizar!","error");
                  }
              }
          });
      }

  }