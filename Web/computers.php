<?php session_start();
    include('security.php');
    include('class/class-gestor.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ordenadores - Google Drive</title>
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
                <div class="btn-sidebar btn-sidebar-current">
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
                <div class="btn-sidebar">
                    <button type="button" class="btn btn-link" onclick="location.href='backups.php'"><i class="fas fa-mobile-alt"></i>Copias de seguridad</button><br>
                </div>
                <hr>
                <?php include('storage-amount.php');?>
            </div>

            <div class="col-10">
                <div class="content-div">
                    <div class="container content-header">
                        <div class="container" style="float: left;width: 50%;position: relative;">
                            <button type="button" class="btn btn-link" id="btn-folder"><b>Ordenadores</b></button>
                        </div>
                        <div class="container header-buttons" style="width: 20%">                            
                            <i class="fas fa-info-circle"></i>
                        </div>
                    </div>
                    <div class="fast-access">                        
                        <div class="row">
                            <?php
                                $gestor = new Gestor();
                                $conexion = $gestor->getConexion();

                                $stmt = $conexion->prepare('SELECT COUNT(*) AS CANTIDAD_ORDENADORES FROM TBL_ORDENADORES WHERE CODIGO_USUARIO = ?');
                                $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                $stmt->execute();

                                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                if($result['CANTIDAD_ORDENADORES'] == 0){
                                    echo '<span id="no-folders-found" style="color:lightslategray;margin-left:auto;margin-right:auto;font-size:1em;font-family:\'Open sans\';">¡No ha sincronizado ningun ordenador!</span>';
                                } else {
                                    $stmt = $conexion->prepare('SELECT A.DIRECCION_MAC,A.FECHA_REGISTRO,B.NOMBRE_SISTEMA,C.NOMBRE_VERSION FROM TBL_ORDENADORES A LEFT JOIN TBL_SISTEMAS_OPERATIVOS B ON (A.CODIGO_SISTEMA = B.CODIGO_SISTEMA) LEFT JOIN TBL_VERSIONES C ON (B.CODIGO_VERSION = C.CODIGO_VERSION)  WHERE A.CODIGO_USUARIO = ?');
                                    $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                    $stmt->execute();
                                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo '
                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="folder-card" ondblclick="console.log($(this))">
                                                <div class="text-center folder-card-text">
                                                    <i class="fas fa-laptop"></i><br><span class="folder-card-name">'.$result['DIRECCION_MAC'].'</span>
                                                    <span class="folder-card-name">Registro:'.$result['FECHA_REGISTRO'].'</span><br>
                                                    <span class="folder-card-name">SO:'.$result['NOMBRE_SISTEMA'].'</span><br>
                                                    <span class="folder-card-name">Versión:'.$result['NOMBRE_VERSION'].'</span>
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