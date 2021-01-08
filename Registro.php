<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="Librerias/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Librerias/jquery-ui-1.12.1/jquery-ui.css">
	<script src="Librerias/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Css/style.css">
	
</head>
<body>
<div class="wrapper fadeInDown" style="background-image: url(img/fondo.gif);">
    <div id="formContent">

      <div class="fadeIn first">
        <br><h1>Registro de Usuarios</h1>
      </div>
      <!-- Login Form -->
        <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
            <label>Nombre</label>
            <input type="text" id="nombre" name="nombre" class="fadeIn second"  placeholder="Nombre (s)" required>
            <label>Fecha de Nacimiento</label>
            <input type="text" id="fechadeNacimiento" name="fechadeNacimiento" class="fadeIn second"  placeholder="dd/ss/aa" required="" readonly="">
            <label>Email o Correo Electrónico </label>
            <input type="email" id="email" name="email" class="fadeIn second"  placeholder="example@example.com" required>
            <label>Nombre de usuario</label>
            <input type="text" id="usuario" name="usuario" class="fadeIn second" placeholder="" required>
            <label>Contraseña</label>
            <input type="password" id="password" class="fadeIn second" name="password" placeholder="*********" required>
            <input type="submit" class="fadeIn fourth" value="Registrar ">
        </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="index.php">Iniciar Sesión</a>
      </div>

    </div>
  </div>
	<script src="Librerias/jquery-3.5.1.min.js"></script>
	<script src="Librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
		<script type="text/javascript">
			
			$(function(){
				var fechaA= new Date();
				var yyyy=fechaA.getFullYear();

				$('#fechadeNacimiento').datepicker({

					changeMonth: true,
					changeYear: true,
					yearRange: '1900:' + yyyy,
					dateFormat:"dd-mm-yy"
				});	
			});

		function agregarUsuarioNuevo(){
			$.ajax({
				method:"POST",
				data:$('#frmRegistro').serialize(),
				url:"Procesos/usuarios/registro/agregarUsuario.php",
				success:function(respuesta){
					console.log(respuesta);
					respuesta = respuesta.trim();
					if(respuesta ==1){
						$('#frmRegistro')[0].reset();
						swal(":D","agregado con exito","sucess");
					}else if(respuesta == 2){

						swal("Este usuario ya ha sido ingresado, ingrese otro usuario");
					} 
					else{

						swal(":(","Fallo al agregar","Error");
					
					}

				}
		
			});
			return false;
		}
	</script>
</body>
</html>