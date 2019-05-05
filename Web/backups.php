<?php session_start();
    include('security.php');
    include('class/class-gestor.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Copias de seguridad - Google Drive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon2.ico" type="image/x-icon">
</head>
<body style="overflow-x: hidden">
    <?php include('navbar.php')?>

    <div clas="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="container">
                    <button type="button" class="btn btn-link" id="btn-new"><i class="fas fa-plus"></i> Nuevo</button>
                    <div class="container nuevo-div new-div">
                        <?php include('menu-nuevo.php');?>                             
                    </div>
                </div>
                <div class="btn-sidebar">
                    <button type="button" class="btn btn-link" onclick="location.href='home.php'"><i class="fab fa-google-drive"></i>Mi unidad</button>
                </div>
                <div class="btn-sidebar">
                    <button type="button" class="btn btn-link" onclick="location.href='computers.php'"><i class="fas fa-laptop"></i>Ordenadores</button>
                </div>
                <div class="btn-sidebar">
                    <button type="button" class="btn btn-link" onclick="location.href='shared-with-me.php'"><i class="fas fa-users"></i>Compartido conmigo</button>
                </div>
                <div class="btn-sidebar">
                    <button type="button" class="btn btn-link" onclick="location.href='recent.php'"><i class="far fa-clock"></i>Reciente</button>
                </div>
                <div class="btn-sidebar">
                    <button type="button" class="btn btn-link" onclick="location.href='starred.php'"><i class="far fa-star"></i>Destacado</button>
                </div>
                <div class="btn-sidebar">
                    <button type="button" class="btn btn-link" onclick="location.href='trash.php'"><i class="fas fa-trash-alt"></i>Papelera</button>
                </div>
                <hr>
                <div class="btn-sidebar btn-sidebar-current">
                    <button type="button" class="btn btn-link" onclick="location.href='backups.php'"><i class="fas fa-mobile-alt"></i>Copias de seguridad</button><br>
                </div>
                <hr>
                <?php include('storage-amount.php');?>
            </div>

            <div class="col-10">
                <div class="content-div">
                    <div class="container content-header">
                        <div class="container" style="float: left;width: 50%;position: relative;">
                            <button type="button" class="btn btn-link" id="btn-folder"><b>Copias de seguridad</b></button>                            
                        </div>                        
                    </div>
                    <div class="fast-access">                        
                        <div class="row">
                            <?php
                                $gestor = new Gestor();
                                $conexion = $gestor->getConexion();

                                $stmt = $conexion->prepare('SELECT COUNT(*) AS CANTIDAD_COPIAS FROM TBL_COPIAS_DE_SEGURIDAD WHERE CODIGO_USUARIO = ?');
                                $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                $stmt->execute();

                                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                if($result['CANTIDAD_COPIAS'] == 0){
                                    echo '<span id="no-folders-found" style="color:lightslategray;margin-left:auto;margin-right:auto;font-size:1em;font-family:\'Open sans\';">¡No hay copias de seguridad!</span>';
                                } else {
                                    $stmt = $conexion->prepare('SELECT FECHA_HORA_COPIA, ARCHIVO_COPIA FROM TBL_COPIAS_DE_SEGURIDAD WHERE CODIGO_USUARIO = ?');
                                    $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                    $stmt->execute();
                                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo '
                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="folder-card" ondblclick="console.log($(this))">
                                                <div class="folder-card-text">
                                                    <i style="font-size:2em;float:left;vertical-align:middle;margin-right:10px;margin-top:8px" class="far fa-file-archive"></i><span class="file-card-name">'.$result['ARCHIVO_COPIA'].'</span><br>
                                                    <span class="file-card-name">Subido:'.$result['FECHA_HORA_COPIA'].'</span>
                                                    <i style="font-size:1.3em;float:right;vertical-align:middle;margin-right:5px;margin-top:-0.65em" class="fas fa-download"></i>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                    }
                                }
                            ?>
                        </div>                        
                    </div>                    
                </div>                
            </div>            
        </div>
    </div>
    <?php include('modal-perfil.php');
          include('modal-carpeta.php');
          include('new-file-form.php');
          include('uploaded-warning.php');
    ?>   

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
</body>
</html>