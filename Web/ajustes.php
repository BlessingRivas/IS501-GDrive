<?php include('class/class-gestor.php');
    session_start();
    $gestor = new Gestor();
    $conexion = $gestor->getConexion();

    $stmt=$conexion->prepare('SELECT NOMBRE,TELEFONO,CORREO_ALTERNO FROM TBL_USUARIOS WHERE CODIGO_USUARIO = ?');
    $stmt->bindParam(1,$_SESSION['codigo_usuario']);
    $stmt->execute();    

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombre = explode(' ',$result['NOMBRE']);       
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajustes de tu cuenta</title>
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
                    <div style="font-size: 1.2em; font-weight: 600;margin-top: 10px;">Modifica tu cuenta de Google</div>
                    
                </div>
                
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="container" style="padding: 30px 0px 0px 0px">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="field-border">
                                        <p class="field-title">Nombre</p>
                                        <input type="text" name="" id="txt-nombre" class="focus-field" placeholder="Nombre" value="<?php echo $nombre[0];?>">
                                    </div>
                                    <div class="invalid-nombre invalid-feedback" id="div-name">
                                        <i class="fas fa-exclamation-circle"></i> Ingresa tu nombre.
                                        <div>
                                                <p></p>
                                        </div>
                                    </div>
                                      
                                </div>
                          
                                <div class="col-12 col-md-6">
                                    <div class="field-border">
                                        <p class="field-title">Apellido</p>
                                        <input type="text" name="" id="txt-apellido" class="focus-field" placeholder="Apellido" value="<?php echo isset($nombre[1]) ? $nombre[1] : "";?>">
                                    </div>
                                    <div class="invalid-apellido invalid-feedback" id="div-apellido">
                                        <i class="fas fa-exclamation-circle"></i> Ingresa tu apellido.
                                        <div>
                                                <p></p>
                                        </div>
                                      </div>
                                </div>
                                
                        
                                <div class="container">
                                    <div class="field-border">
                                        <p class="field-title">Número de telefono</p>
                                        <input type="text" name="" id="txt-numero-telefono" class="focus-field" placeholder="Número de telefono(opcional)" style="width:80%" value="<?php echo $result['TELEFONO']?>"> 
                                    </div>
                                </div>   

                                <div class="container">
                                    <div class="field-border">
                                        <p class="field-title">Direccion de Correo de Recuperacion</p>
                                        <input type="text" name="" id="txt-correo-alterno" class="focus-field" placeholder="Direccion de Correo de Recuperacion" style="width:80%" value="<?php echo $result['CORREO_ALTERNO']?>"> 
                                    </div>
                                </div> 
                                
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <select name="" id="slc-dia" class="signin-select">
                                                <option value="">Día</option>                                                
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

                                        <div class="col-12 col-md-4">
                                            <select name="" id="slc-anio" class="signin-select">
                                                <option value="">Año</option>
                                                <?php                                                    
                                                    $stmt = $conexion->prepare("SELECT TO_CHAR(sysdate,'YYYY') AS ANIO_ACTUAL FROM DUAL");
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
                                    <p class="landing-text signin-text">Tu fecha de nacimiento</p>                         
                                </div>
                            </div>
                            <select name="" id="slc-genero" class="signin-select">
                                <option value="">Género</option>
                                <?php                        
                                    $stmt = $conexion->prepare('SELECT CODIGO_GENERO,GENERO FROM TBL_GENEROS');
                                    $stmt->execute();
                                                        
                                    while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo '<option value="'.$result['CODIGO_GENERO'].'">'.$result['GENERO'].'</option>';
                                    }                                            
                                ?>
                            </select>
                            <br>

                        </div>
                    </div>

                    <div class="col-12 col-md-5 text-center">
                        <img src="img/Google_Drive_logo.svg.png" width="244" height="244">                    
                    </div>

                </div>
            </div>
            <div class="text-center"><button class="btn btn-primary login-form-link" id="btn-modificar-usuario">Modificar</button></div>            
        </div>
    </div>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/controlador.js"></script>
    
    
</body>
</html>