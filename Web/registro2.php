<?php session_start();
    include('class/class-gestor.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crea tu cuenta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container-fluid">
        <div class="container signin-container">
            <div class="container">
                <div class="text-left">
                    <img src="img/brand-logo-2.png" class="signin-logo">
                </div>           
                <div class="text-left">
                    <div style="font-size: 1.2em; font-weight: 600;margin-top: 10px;">Bienvenido a Google</div>
                    <div style="font-size: 0.9em; font-weight: 600;margin-top: 10px;"><i class="fas fa-user-circle" style="font-size: 2em;vertical-align: middle;margin-right: 5px"></i><?php echo (isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Nombre Usuario');?></div>
                </div>
                
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="container" style="padding: 30px 0px 0px 0px">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <i class="fas fa-flag"></i>
                                    <select name="" id="slc-country" class="focus-field">
                                        <option value="">Seleccione su país</option>
                                        <?php                                           
                                            $gestor = new Gestor();
                                            $stmt = $gestor->getConexion()->prepare('SELECT CODIGO_LUGAR,NOMBRE_LUGAR FROM TBL_LUGARES');
                                            $stmt->execute();
                                            
                                            while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
                                                echo '<option value="'.$result['CODIGO_LUGAR'].'">'.$result['NOMBRE_LUGAR'].'</option>';
                                            }                                            
                                        ?>
                                    </select>                                    
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="field-border">
                                        <p class="field-title">Número de Teléfono</p>
                                        <input type="text" name="" id="txt-telefono" class="focus-field" placeholder="Número de teléfono (opcional)">
                                    </div>
                                    
                                </div>
                                
                                <div class="container">
                                    <p class="landing-text signin-text">Usaremos tu número como medida de seguridad</p>
                                    <div class="field-border">
                                        <p class="field-title">Correo de Recuperación</p>
                                        <input type="text" name="" id="txt-correo-recuperacion" class="focus-field" placeholder="Dirección de correo de recuperación">
                                    </div>
                                    <p class="landing-text signin-text">Lo usaremos para proteger tu cuenta</p>                                    
                                </div>                                
                            </div><br>
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <select name="" id="slc-dia" class="signin-select">
                                        <option value="">Día</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>                                    
                                </div>
                                <div class="col-12 col-md-4">
                                    <select name="" id="slc-mes" class="signin-select">
                                        <option value="">Mes</option>
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-2">
                                    <select name="" id="slc-anio" class="signin-select">
                                        <option value="">Año</option>
                                        <?php
                                            $stmt = $gestor->getConexion()->prepare("SELECT TO_CHAR(sysdate,'YYYY') AS ANIO_ACTUAL FROM DUAL");
                                            $stmt->execute();
                                            $result=$stmt->fetch(PDO::FETCH_ASSOC);
                                            $anioActual = $result['ANIO_ACTUAL'];
                                                                                        
                                            for($i = $anioActual - 100; $i <= $anioActual - 18;$i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        ?>
                                    </select>                                    
                                </div>
                            </div>

                            <div class="invalid-fecha invalid-feedback" id="div-apellido">
                                <i class="fas fa-exclamation-circle"></i> Ingresa una fecha de nacimiento completa
                              </div>
                            <br><p class="landing-text signin-text">Tu fecha de nacimiento</p>                            
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                                                    
                    </div>
                </div>
                <select name="" id="slc-genero" class="signin-select">
                    <option value="">Género</option>
                    <?php                        
                        $stmt = $gestor->getConexion()->prepare('SELECT CODIGO_GENERO,GENERO FROM TBL_GENEROS');
                        $stmt->execute();
                                            
                        while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$result['CODIGO_GENERO'].'">'.$result['GENERO'].'</option>';
                        }                                            
                    ?>
                </select><br><br>   
                <div class="invalid-genero invalid-feedback" id="div-apellido">
                    <i class="fas fa-exclamation-circle"></i> Selecciona tu genero
                  </div>                             
                <a href="#" class="landing-text signin-text">Porqué solicitamos esta información</a>
                <button class="btn btn-primary login-form-link" id="btn-registro-2">Siguiente</button>
                <!--form action="" class="login-form">
                    <div class="field-border">
                        <p class="field-title">Correo electrónico o teléfono</p>
                        <input type="text" name="" id="txt-email" class="focus-field" placeholder="Correo electrónico o teléfono">
                    </div>
                    <a href="#" id="forgot-email-link">¿Has olvidado tu correo electrónico?</a><br><br>
                    <p style="font-size: 0.9em">¿No es tu ordenador? Usa el modo invitados para iniciar sesión de forma privada. <a href="#" class="login-form-link">Más información</a></p>
                    <br>
                    <a href="#" class="login-form-link">Crear cuenta</a>
                    <button class="btn btn-primary login-form-link" style="float: right">Siguiente</button>
                </form-->
            </div>            
        </div>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/controlador.js"></script>
    <!--script src="js/controlador_signin.js"></script-->

</body>
</html>