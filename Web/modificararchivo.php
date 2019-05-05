<?php session_start();
    include('class/class-gestor.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modifica tu Archivo</title>
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
                    <div style="font-size: 1.2em; font-weight: 600;margin-top: 10px;">Modificar Archivo</div>

                </div>
                
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="container" style="padding: 30px 0px 0px 0px">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <select name="" id="slc-carpeta-archivo" class="custom-select">
                                        <option value="">Mover a carpeta</option>
                                        <?php                                           
                                            $gestor = new Gestor();
                                            $stmt = $gestor->getConexion()->prepare('SELECT CODIGO_CARPETA,NOMBRE FROM TBL_CARPETAS WHERE CODIGO_USUARIO = ?');
                                            $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                            
                                            $stmt->execute();
                                            
                                            while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
                                                echo '<option value="'.$result['CODIGO_CARPETA'].'">'.$result['NOMBRE'].'</option>';
                                            }                                           
                                        ?>
                                    </select>                                    
                                </div><br><br><br>                              
                        
                                <div class="container">
                                    <div class="field-border">
                                        <p class="field-title">Nombre del Archivo</p>
                                        <input type="text" name="" id="txt-nombre-archivo" class="focus-field" placeholder="Nombre del Archivo" style="width:80%" value="<?php echo $_SESSION['nombre_archivo'];?>"> 

                                    </div>
                                </div>        
                                <br><br><br>
                                <div class="container">
                                    <div class="field-border">
                                        <p class="field-title">Descripcion del Archivo</p>
                                        <textarea name="" id="txt-descripcion-archivo" placeholder="Descipción del archivo" class="focus-field" cols="30" rows="5"><?php echo $_SESSION['descripcion'];?></textarea>
                                    </div>
                                </div> 

                            </div><br>



                            <div class="row">                               
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-12 col-md-5 text-center" >
                        <img src="img/file-type-logos.PNG" width="280" height="244">     ¨
                    
                    </div>

                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary login-form-link" id="btn-modificar-archivo">Modificar Archivo</button>
                <button class="btn btn-outline-primary login-form-link" id="btn-modificar-archivo-cancelar">Cancelar</button>
            </div>
            
        </div>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/controlador.js"></script>
    <!--script src="js/controlador_signin.js"></script-->
    
</body>
</html>