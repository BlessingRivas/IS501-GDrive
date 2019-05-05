<?php session_start();
    include('security.php');
    include('class/class-gestor.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reciente - Google Drive</title>
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
                <div class="btn-sidebar btn-sidebar-current">
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
                            <button type="button" class="btn btn-link" id="btn-folder"><b>Reciente</b></button>
                        </div>
                        <div class="container header-buttons" style="width: 20%">
                            <i class="far fa-list-alt"></i>
                            <i class="fas fa-info-circle"></i>
                        </div>
                    </div>                    
                    
                    <div class="folders-div">
                        <div class="container section-label">Carpetas</div>
                        <div class="row">
                            <?php
                                $gestor = new Gestor();
                                $conexion = $gestor->getConexion();

                                $stmt = $conexion->prepare('SELECT COUNT(*) AS CANTIDAD_CARPETAS FROM TBL_CARPETAS WHERE CODIGO_USUARIO = ?');
                                $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                $stmt->execute();

                                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                if($result['CANTIDAD_CARPETAS'] == 0){
                                    echo '<span id="no-folders-found" style="color:lightslategray;margin-left:auto;margin-right:auto;font-size:1em;font-family:\'Open sans\';">¡No hay carpetas que mostrar!</span>';
                                } else {
                                    $stmt = $conexion->prepare("SELECT NOMBRE,CODIGO_CARPETA FROM TBL_CARPETAS WHERE CODIGO_USUARIO = ? AND ELIMINADO = 0 AND (TO_CHAR(SYSDATE,'mm') - TO_CHAR(FECHA_ULTIMO_ACCESO,'mm')) < 6");
                                    $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                    $stmt->execute();
                                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo '
                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="folder-card" ondblclick=getFolderFiles("';echo $result['CODIGO_CARPETA'].'")>
                                                <div class="folder-card-text">
                                                    <i class="fas fa-folder"></i><span class="folder-card-name">'.$result['NOMBRE'].'</span>
                                                </div>
                                                <span class="folder-edit"><i class="fas fa-pen" onclick=getFolderInfo("'; echo $result['CODIGO_CARPETA'].'")></i></span>
                                            </div>
                                        </div>
                                        ';
                                    }
                                }
                            ?>                           
                        </div>                        
                    </div>

                    <div class="files-div">
                        <div class="container section-label">Archivos</div>
                        <div class="row">
                            <?php
                                $gestor = new Gestor();
                                $conexion = $gestor->getConexion();

                                $stmt = $conexion->prepare('SELECT COUNT(*) AS CANTIDAD_ARCHIVOS FROM TBL_ARCHIVOS WHERE CODIGO_USUARIO = ? AND ELIMINADO = 0');
                                $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                $stmt->execute();

                                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                if($result['CANTIDAD_ARCHIVOS'] == 0){
                                    echo '<span id="no-folders-found" style="color:lightslategray;margin-left:auto;margin-right:auto;font-size:1em;font-family:\'Open sans\';">¡No hay carpetas que mostrar!</span>';
                                } else {
                                    $stmt = $conexion->prepare("SELECT A.CODIGO_ARCHIVO,A.NOMBRE,B.ICONO FROM TBL_ARCHIVOS  A INNER JOIN TBL_TIPOS_ARCHIVOS B ON (A.CODIGO_TIPO_ARCHIVO = B.CODIGO_TIPO_ARCHIVO) WHERE CODIGO_USUARIO = ? AND ELIMINADO = 0 AND (TO_CHAR(SYSDATE,'mm') - TO_CHAR(FECHA_ULTIMO_ACCESO,'mm')) < 6");
                                    $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                                    $stmt->execute();
                                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo '
                                        <div class="col-12 col-md-4 col-lg-3" id="file-card-'; echo $result['CODIGO_ARCHIVO'].'">
                                            <div class="file-card">
                                                <div class="text-center file-card-img">
                                                    <img src="img/'; echo $result['ICONO']. '" width="30%" alt="">
                                                </div>
                                                <div class="file-card-text">
                                                    <span class="file-card-name">'; echo $result['NOMBRE'];echo '</span>
                                                </div>
                                                <div class="file-bar">
                                                    <span class="file-stare"><i class="fas fa-star" onclick=stareFile("'; echo $result['CODIGO_ARCHIVO'].'")></i></span>
                                                    <span class="file-share"><i class="fas fa-share-alt" onclick=shareFile("'; echo $result['CODIGO_ARCHIVO'].'")></i></span>
                                                    <span class="file-delete"><i class="fas fa-trash-alt" onclick=deleteFile("'; echo $result['CODIGO_ARCHIVO'].'")></i></span>
                                                    <span class="file-edit"><i class="fas fa-pen" onclick=getFileInfo("'; echo $result['CODIGO_ARCHIVO'].'")></i></span>                                                
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