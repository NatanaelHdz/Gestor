<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
    <link rel="stylesheet" type="text/css" href="Librerias/bootstrap/bootstrap.min.css">
    <script src="Librerias/sweetalert.min.js"></script>
    <script src="Librerias/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper fadeInDown" style="background-image: url(img/fondo.gif);">
      <div id="formContent">
          <!-- Tabs Titles -->
          <!-- Icon -->
          <div class="fadeIn first">
            <br><h1>Gestor de Archivos</h1>
            <img src="img/usuario.png" id="icon" alt="User Icon" />
          </div>

          <!-- Login Form -->
          <form method="POST" id="frmLogin" onsubmit="return logear()" autocomplete="off">
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="username">
            <input type="password" id="password" class="fadeIn third" name="login" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Entrar">
          </form>

          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="registro.php">Registrar</a>
          </div>

        </div>
    </div>

    <script type="text/javascript">
    function logear(){
     $.ajax({
       type:"POST",
       data:$('#frmLogin').serialize(),
       url:"Procesos/usuarios/Login/Login.php",
            success:function(respuesta){
              
              respuesta = respuesta.trim();
              if(respuesta == 1 ){
                window.location="Vistas/Inicio.php";
              }else{
                swal("No se pudo ingresar","Revisar datos","Error");
              }

            }
      });

     return false;

    }
    </script>

</body>
</html>