<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container-fluid">
        <div class="container login-container">
            <div class="container">
                <div class="text-center">
                    <img src="img/brand-logo-2.png" class="login-logo">
                </div>           
                <div class="text-center">
                    <div style="font-size: 1.3em; font-weight: 600;margin-top: 10px;"><?php echo (isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Nombre Usuario')?></div>
                    <!--div style="font-size: 0.8em; font-weight: 600;margin-top: 10px;">Ir a Google Drive</div-->
                    <button type="button" class="btn btn-link" id="btn-users"><div class="user-img"><?php echo (isset($_SESSION['nombre']) ? substr($_SESSION['nombre'],0,1) : 'B')?></div><?php echo (isset($_SESSION['correo']) ? $_SESSION['correo'] : 'nombreUsuario@gmail.com')?> <i class="fas fa-angle-down"></i></button>
                </div>     
                
                <form action="" class="login-form">
                    <div class="field-border">
                        <p class="field-title">Introduce tu contraseña</p>
                        <input type="password" name="" id="txt-password" class="focus-field" placeholder="Introduce tu contraseña">
                        <button class="btn btn-link show-hide" id="sh-password"><i class="far fa-eye"></i></button>
                    </div>
                    <div class="invalid-feedback invalid-password">
                        <i class="fas fa-exclamation-circle"></i> Ingrese su contraseña
                    </div>
                    <div class="invalid-feedback wrong-password">
                        <i class="fas fa-exclamation-circle"></i> Contraseña incorrecta, intente de nuevo
                    </div>
                    <br>
                    <br>                    
                    <a href="#" id="forgot-email-link">¿Has olvidado tu contraseña?</a>                    
                    <button class="btn btn-primary login-form-link" style="float: right" id="btn-login2">Siguiente</button>
                </form>
            </div>            
        </div>
        <div class="lang-bar fixed-bottom">
            <select id="lang-select">
                <option value="EN">English</option>
                <option value="ES">Español</option>
                <option value="FR">Frances</option>
            </select>

            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Ayuda</a></li>
                <li class="list-inline-item"><a href="#">Privacidad</a></li>
                <li class="list-inline-item"><a href="#">Términos</a></li>
            </ul>
        </div>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>    
</body>
</html>