	function agregarArchivosGestor() {
		var formData = new FormData(document.getElementById('frmArchivos'));
		$.ajax({
			url:"../Procesos/Gestor/GuardarArchivos.php",
			type:"POST",
			datatype: "html",
			data: formData,
			cache:false,
			contentType:false,
			processData:false,
			success:function(respuesta){
				console.log(respuesta);
				respuesta=respuesta.trim();

				if (respuesta == 1) {
					$('#frmArchivos')[0].reset();
					$('#tablaGestordeArchivos').load("Gestor/TablaGestor.php");
					swal(":)","Agreado con exito","success");
				} else{
					swal(":(","Fallo al agregar","error");
				}

			}					
		});
	}

	function eliminarArchivo(idArchivo){
		swal({
		  title: "Estas seguro de eliminar este archivo?",
		  text: "Una vez eliminado , no hay vuelta atras",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    $.ajax({
		    	type:"POST",
		    	data:"idArchivo="+ idArchivo,
		    	url:"../Procesos/Gestor/EliminarArchivo.php",
		    	success:function(respuesta){


		    		$('#frmArchivos')[0].reset();
		    		respuesta=respuesta.trim();
		    		if(respuesta==1){
		    			$('#tablaGestordeArchivos').load("Gestor/TablaGestor.php");
		    		swal("Eliminado con exito!", {
	      				icon: "success",
		    			});
		    		}else{
		    			swal("Error al eliminar!", {
	      				icon: "error",
		    		});
		  		}

		  		}  
			});
		}
	});

	}

	function obtenerArchivoPorId(idArchivo){
		$.ajax({
			type:"POST",
			data:"idArchivo=" + idArchivo,
			url:"../Procesos/Gestor/ObtenerArchivo.php",
			success:function(respuesta){
				$('#archivoObtenido').html(respuesta);
			}
		});
	}