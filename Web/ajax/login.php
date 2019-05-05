<?php
    session_start();

    include('../class/class-usuario.php');
    include('../class/class-gestor.php');

    $gestor = new Gestor();
    $conexion = $gestor->getConexion();

    $usuarioNuevo = null;    

    $respuesta['codigo'] = -1;
    $respuesta['mensaje'] = 'Sin completar';
    $respuesta['contenido'] = "";

    switch ($_POST['codigo']) {
        case 'login1':
            $parametro = $_POST['correo'];
            $stmt = $conexion->prepare("SELECT NOMBRE,USUARIO,CORREO,TELEFONO FROM TBL_USUARIOS WHERE CORREO = ?");
            $stmt->bindParam(1,$parametro);

            $stmt->execute();
            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($_POST['correo'] == $result['CORREO']){
                    $_SESSION['correo'] = $result['CORREO'];
                    $_SESSION['nombre'] = $result['NOMBRE'];
                    $respuesta['codigo'] = 1;
                    $respuesta['mensaje'] = "Usuario encontrado";
                    $respuesta['contenido'] = $result['USUARIO'];
                    break;
                }                    
            }
                        
            echo(json_encode($respuesta));            
            break;
        
        case 'login2':
            $parametro = $_POST['password'];
            $stmt = $conexion->prepare("SELECT CODIGO_USUARIO,NOMBRE,USUARIO,CONTRASENIA,FOTO_PERFIL FROM TBL_USUARIOS WHERE CONTRASENIA = ?");
            $stmt->bindParam(1,$parametro);

            $stmt->execute();

            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($_POST['password'] == $result['CONTRASENIA']){                    
                    $respuesta['codigo'] = 1;
                    $respuesta['mensaje'] = "Contraseña valida";
                    $respuesta['contenido'] = $result['USUARIO'];
                    $_SESSION['nombre'] = $result['NOMBRE'];
                    $_SESSION['codigo_usuario'] = $result['CODIGO_USUARIO'];
                    $_SESSION['foto_perfil'] = $result['FOTO_PERFIL'];
                    $_SESSION['carpeta'] = NULL;
                    break;
                }                    
            }

            echo(json_encode($respuesta));            
            break;

        case 'signin1':

            $_SESSION['nombre'] = $_POST['nombre']." ".$_POST['apellido'];
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['correo'] = $_POST['correo'];
            $_SESSION['password'] = $_POST['password'];            

            $respuesta['codigo'] = 1;
            $respuesta['mensaje'] = 'Datos guardados';
            $respuesta['contenido'] = $_POST['nombre'];

            echo(json_encode($respuesta));

            break;
        
        case 'signin2':
            $nombre = $_SESSION['nombre'];
            $usuario = $_SESSION['usuario'];
            $correo = $_SESSION['correo'];
            $password = $_SESSION['password'];
            $tipoUsuario = 1;
            $fechaNacimiento = $_POST['dia']."/".$_POST['mes']."/".$_POST['anio'];
            $telefono = $_POST['telefono'];
            $correoAlterno = $_POST['correoalterno'];
            $genero = $_POST['genero'];
            $lugar = $_POST['pais'];
            
            $usuarioNuevo = new Usuario($nombre,$usuario,$correo,$password,$tipoUsuario,$fechaNacimiento,$telefono,$correoAlterno,$genero,$lugar);
            
            try{
                $resultadoOperacion = $usuarioNuevo->registrar($conexion);                
                $respuesta['codigo'] = $resultadoOperacion['codigo'];
                $respuesta['mensaje'] = $resultadoOperacion['mensaje'];

                $getCodigo = $conexion->prepare("SELECT CODIGO_USUARIO,NOMBRE,CORREO FROM TBL_USUARIOS WHERE CORREO = ?");
                $getCodigo->bindParam(1,$correo);
                $getCodigo->execute();

                while($result = $getCodigo->fetch(PDO::FETCH_ASSOC)){
                    if($correo == $result['CORREO']){
                        $_SESSION['codigo_usuario'] = $result['CODIGO_USUARIO'];
                        $_SESSION['nombre'] = $result['NOMBRE'];
                        $_SESSION['carpeta']=NULL;
                        break;
                    }                    
                }
                
            } catch (Exception $ee){
                $respuesta['codigo'] = $ee->getMessage();
            }           
            $respuesta['contenido'] = $usuarioNuevo->toString();            

            echo(json_encode($respuesta));           

            break;

        case 'alterUser':      
            $dia = isset($_POST['dia']) ? $_POST['dia'] : NULL;
            $mes = isset($_POST['mes']) ? $_POST['mes'] : NULL;
            $anio = isset($_POST['anio']) ? $_POST['anio'] : NULL;
            $genero = isset($_POST['genero']) ? $_POST['genero'] : NULL;

            $fechaNacimiento = $dia."/".$mes."/".$anio;

             try {
                $stmt = $conexion->prepare("CALL P_MODIFICAR_USUARIO(?,?,NULL,NULL,?,NULL,NULL,?,?,?,?,?)");
                $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                $stmt->bindParam(2,$genero);                
                $stmt->bindParam(3,$_POST['nombre']);
                $stmt->bindParam(4,$_POST['telefono']);
                $stmt->bindParam(5,$_POST['correoAlterno']);
                $stmt->bindParam(6,$fechaNacimiento);                
                $stmt->bindParam(7,$codigo,PDO::PARAM_STR,4000);
                $stmt->bindParam(8,$mensaje,PDO::PARAM_STR,4000);
                $stmt->execute();                
            } catch (Exception $e) {
                $codigo = $e->getMessage();                
            }

            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;
            $respuesta['contenido'] = $_POST;

            echo(json_encode($respuesta));
            break;
        
        case 'changepic':            
            $nombre = explode('.',$_FILES['profilePic']['name']);
            $directorio = "../data/profile_pics/".$nombre[0];
            $datos = explode('/', $_FILES['profilePic']['type']);
            
            $foto = $directorio.".".($datos[1]);
            $referencia = "data/profile_pics/generic.jpg";

            if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $foto)) {
                $mensaje = "La imagen se subió con éxito.";
                $codigo = 1;
                $referencia = "data/profile_pics/".$nombre[0].".".$datos[1];
                
                try{
                    $setPicture = $conexion->prepare("CALL P_MODIFICAR_USUARIO(?,NULL,NULL,NULL,NULL,NULL,?,NULL,NULL,NULL,?,?)");                    
                    $setPicture->bindParam(1,$_SESSION['codigo_usuario']);
                    $setPicture->bindParam(2,$referencia);
                    $setPicture->bindParam(3,$codigo,PDO::PARAM_STR,4000);
                    $setPicture->bindParam(4,$mensaje,PDO::PARAM_STR,4000);
                    $setPicture->execute();
                    $_SESSION['foto_perfil'] = $referencia;
                } catch (Exception $ee){
                    $respuesta['codigo'] = $ee->getMessage();
                }
            } else {
                $mensaje = "Ocurrió un error al subir la foto";
                $codigo = 0;
            }

            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;
            $respuesta['contenido'] = $referencia;
            echo(json_encode($respuesta));

            break;
        
        case 'newfolder':
            $respuesta['codigo'] = 1;
            $respuesta['mensaje'] = "Carpeta creada exitosamente";
            $respuesta['contenido'] = $_POST["nombre_carpeta"];

            try{
                $createFolder = $conexion->prepare('CALL P_AGREGAR_CARPETA(?,NULL,?,?,?)');
                $createFolder->bindParam(1,$_SESSION['codigo_usuario']);                
                $createFolder->bindParam(2,$_POST['nombre_carpeta']);
                $createFolder->bindParam(3,$codigo,PDO::PARAM_STR,4000);
                $createFolder->bindParam(4,$mensaje,PDO::PARAM_STR,4000);
                $createFolder->execute();
            } catch (Exception $ee){
                $respuesta['codigo'] = $ee->getMessage();
            }

            echo(json_encode($respuesta));
            break;

        case 'uploadfile':
            $respuesta['codigo'] = 1;
            $respuesta['mensaje'] = $_FILES['newFile']['size'];

            $tipo = explode('/',$_FILES['newFile']['type']);
            $size = $_FILES['newFile']['size'];
            $nombre = explode('.',$_FILES['newFile']['name']);

            $codigo_tipo = 0;
            $tamanio = 0;            
            $codigo_unidad = 0;
            $descripcion = "";

            switch ($tipo[0]) {
                case 'image':
                    $codigo_tipo = 1;                    
                    break;
                    
                case 'video':
                    $codigo_tipo = 2;
                    break;
                
                case 'audio':
                    $codigo_tipo = 3;
                    break;
                
                case 'text':
                    $codigo_tipo = 5;
                    break;

                case 'application':
                    switch ($tipo[1]) {
                        case 'pdf':
                            $codigo_tipo = 4;
                            break;
                        
                        case 'vnd.openxmlformats-officedocument.wordprocessingml.document':
                            $codigo_tipo = 6;
                            break;

                        default:
                            $codigo_tipo = 7;
                            break;                        
                    }
                    break;

                default:
                    $codigo_tipo = 8;
                    break;
            }

            if($size < 1000){
                $codigo_unidad = 1;
                $tamanio = $size;
            } else {
                if($size < 1000000){
                    $codigo_unidad = 2;
                    $tamanio = $size/1000;
                }else{
                    if($size < 1000000000){
                        $codigo_unidad = 3;
                        $tamanio = $size/1000000;
                    }else{
                        $codigo_unidad = 4;
                        $tamanio = $size/1000000000;
                    }
                }
            }

            $directorio = "../data/files/".$nombre[0];
            
            $archivo = $directorio.".".($tipo[1]);
            $referencia = "data/files/".$nombre[0].".".$tipo[1];
            
            if (move_uploaded_file($_FILES['newFile']['tmp_name'], $archivo)) {
                $mensaje = "El archivo se subió con éxito.";
                $codigo = 1;
                $referencia = "data/files/".$nombre[0].".".$tipo[1];
                
                try{
                    $setFile = $conexion->prepare("CALL P_AGREGAR_ARCHIVO(?,?,?,?,?,?,?,?,?,?)");
                    $setFile->bindParam(1,$_SESSION['codigo_usuario']);
                    $setFile->bindParam(2,$_SESSION['carpeta']);
                    $setFile->bindParam(3,$codigo_unidad);
                    $setFile->bindParam(4,$codigo_tipo);
                    $setFile->bindParam(5,$_FILES['newFile']['name']);
                    $setFile->bindParam(6,$tamanio);
                    $setFile->bindParam(7,$referencia);
                    $setFile->bindParam(8,$descripcion);
                    $setFile->bindParam(9,$codigo,PDO::PARAM_STR,4000);
                    $setFile->bindParam(10,$mensaje,PDO::PARAM_STR,4000);
                    $setFile->execute();
                    //$_SESSION['foto_perfil'] = $referencia;                    
                } catch (Exception $ee){
                    $respuesta['codigo'] = $ee->getMessage();
                }
            } else {
                $mensaje = "Ocurrió un error al subir el archivo";
                $codigo = 0;
            }
            
            $stmt = $conexion->prepare('SELECT A.CODIGO_ARCHIVO,A.NOMBRE,B.ICONO FROM TBL_ARCHIVOS A INNER JOIN TBL_TIPOS_ARCHIVOS B ON (A.CODIGO_TIPO_ARCHIVO = B.CODIGO_TIPO_ARCHIVO) WHERE A.NOMBRE = ?');
            $stmt->bindParam(1,$_FILES['newFile']['name']);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $respuesta['contenido'] = $result;

            //$respuesta['contenido'] = $codigo_tipo;
            //$respuesta['contenido'] = $tipo[0] . " - " . $tipo[1] . " - " . $codigo_tipo . " - " . $_FILES['newFile']['name'];
            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;
            //$stmt = $conexion->prepare('CALL P_AGREGAR_ARCHIVO(?,NULL,?,?,?)');

            echo(json_encode($respuesta));
            break;

        case 'getFolderInfo':
            $stmt = $conexion->prepare('SELECT * FROM TBL_CARPETAS WHERE CODIGO_CARPETA = ?');
            $stmt->bindParam(1,$_POST['codigo_carpeta']);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['current_folder'] = $result['CODIGO_CARPETA'];

            $respuesta['contenido'] = $result;
            $respuesta['codigo'] = 1;
            $respuesta['mensaje'] = "Información encontrada";            
            echo(json_encode($respuesta));

            break;
        
        case 'getFolderFiles':
            $stmt = $conexion->prepare('SELECT A.CODIGO_ARCHIVO,A.NOMBRE,B.ICONO FROM TBL_ARCHIVOS A INNER JOIN TBL_TIPOS_ARCHIVOS B ON (A.CODIGO_TIPO_ARCHIVO = B.CODIGO_TIPO_ARCHIVO) WHERE A.CODIGO_CARPETA = ?');
            $stmt->bindParam(1, $_POST['codigo_carpeta']);
            $stmt->execute();
            $archivosCarpeta = array();

            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $archivosCarpeta[] = $result;
            }

            $respuesta['contenido'] = $archivosCarpeta;
            $respuesta['codigo'] = 1;
            $respuesta['mensaje'] = "Estos son los archivos de la carpeta";

            echo json_encode($respuesta);

            break;

        case 'setFolderInfo':
            $codCarPadre = isset($_POST['codigo_carpeta_padre']) ? $_POST['codigo_carpeta_padre'] : NULL;

            $stmt = $conexion->prepare('CALL P_MODIFICAR_CARPETA(?,?,?,NULL,?,?)');
            $stmt->bindParam(1,$_SESSION['current_folder']);
            $stmt->bindParam(2,$codCarPadre);
            $stmt->bindParam(3,$_POST['nombre']);
            $stmt->bindParam(4,$codigo,PDO::PARAM_STR,40000);
            $stmt->bindParam(5,$mensaje,PDO::PARAM_STR,40000);
            
            $stmt->execute();

            $respuesta['contenido'] = $_POST;
            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;

            echo json_encode($respuesta);
            break;

        case 'getFileInfo':
            $stmt = $conexion->prepare('SELECT * FROM TBL_ARCHIVOS WHERE CODIGO_ARCHIVO = ?');
            $stmt->bindParam(1,$_POST['codigo_archivo']);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['codigo_archivo'] = $_POST['codigo_archivo'];
            $_SESSION['nombre_archivo'] = $result['NOMBRE'];
            $_SESSION['descripcion'] = $result['DESCRIPCION'];
            $_SESSION['carpeta_archivo'] = $result['CODIGO_CARPETA'];

            $respuesta['contenido'] = $result;
            $respuesta['codigo'] = 1;
            $respuesta['mensaje'] = "Información encontrada";            
            echo(json_encode($respuesta));

            break;
        
        case 'setFileInfo':
            $codCarArch = isset($_POST['codigo_carpeta_archivo']) ? $_POST['codigo_carpeta_archivo'] : NULL;

            $stmt = $conexion->prepare('CALL P_MODIFICAR_ARCHIVO(?,?,?,?,NULL,?,?)');
            $stmt->bindParam(1,$_SESSION['codigo_archivo']);
            $stmt->bindParam(2,$codCarArch);
            $stmt->bindParam(3,$_POST['nombre']);
            $stmt->bindParam(4,$_POST['descripcion']);
            $stmt->bindParam(5,$codigo,PDO::PARAM_STR,40000);
            $stmt->bindParam(6,$mensaje,PDO::PARAM_STR,40000);
            
            $stmt->execute();

            $respuesta['contenido'] = $_POST;
            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;

            echo json_encode($respuesta);
            break;

        case 'deleteFile':
            $eliminar = 1;
            $stmt = $conexion->prepare('CALL P_MODIFICAR_ARCHIVO(?,NULL,NULL,NULL,?,?,?)');
            $stmt->bindParam(1,$_POST['codigo_archivo']);
            $stmt->bindParam(2,$eliminar);
            $stmt->bindParam(3,$codigo,PDO::PARAM_STR,40000);
            $stmt->bindParam(4,$mensaje,PDO::PARAM_STR,40000);

            $stmt->execute();

            $respuesta['contenido'] = $_POST;
            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;

            echo json_encode($respuesta);
            break;

        case 'unDeleteFile':
            $eliminar = 0;
            $stmt = $conexion->prepare('CALL P_MODIFICAR_ARCHIVO(?,NULL,NULL,NULL,?,?,?)');
            $stmt->bindParam(1,$_POST['codigo_archivo']);
            $stmt->bindParam(2,$eliminar);
            $stmt->bindParam(3,$codigo,PDO::PARAM_STR,40000);
            $stmt->bindParam(4,$mensaje,PDO::PARAM_STR,40000);

            $stmt->execute();

            $respuesta['contenido'] = $_POST;
            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;

            echo json_encode($respuesta);
            break;

        case 'shareFile':
            $codigoUsuario;
            
            $stmt = $conexion->prepare('SELECT CODIGO_USUARIO FROM TBL_USUARIOS WHERE CORREO = ?');
            $stmt->bindParam(1,$_POST['correo_usuario']);
            $stmt->execute();
            
            try{    
                while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $codigoUsuario = $result['CODIGO_USUARIO'];
                }
            } catch (Exception $ee){
                $mensaje = $ee->getMessage();
            }                       
            
            try{
                $stmt = $conexion->prepare('CALL P_AGREGAR_COMPARTIDO(NULL,?,?,?,?,?,?)');
                $stmt->bindParam(1,$_POST['codigo_archivo']);
                $stmt->bindParam(2,$codigoUsuario);
                $stmt->bindParam(3,$_POST['codigo_tipo_compartido']);
                $stmt->bindParam(4,$_POST['enlace_compartido']);
                $stmt->bindParam(5,$codigo,PDO::PARAM_STR,4000);
                $stmt->bindParam(6,$mensaje,PDO::PARAM_STR,4000);
                $stmt->execute();
            } catch (Exception $ee){
                $mensaje = $ee->getMessage();
            }

            $respuesta['contenido'] = $_POST;
            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;

            echo json_encode($respuesta);
            break;
        
        case 'stareFile':            
            $stmt = $conexion->prepare('SELECT COUNT(*) AS CANTIDAD_DESTACADOS FROM TBL_DESTACADOS WHERE CODIGO_ARCHIVO = ?');
            $stmt->bindParam(1,$_POST['codigo_archivo']);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['CANTIDAD_DESTACADOS'] == 0){
                try{
                    $conexion->beginTransaction();                    
                    $conexion->exec("INSERT INTO TBL_DESTACADOS (CODIGO_ARCHIVO,FECHA_DESTACADO) VALUES (".$_POST['codigo_archivo'].",SYSDATE)");
                    $conexion->commit();
                    
                    $respuesta['codigo'] = 1;
                    $respuesta['mensaje'] = "Archivo destacado exitosamente";
                } catch (Exception $e){
                    $conexion->rollback();
                    $respuesta['codigo'] = 0;
                    $respuesta['mensaje'] = $e->getMessage();
                }
            }
            $respuesta['contenido'] = $_POST;            

            echo json_encode($respuesta);
            break;

        case 'unStareFile':            
            try{
                $conexion->beginTransaction();                    
                $conexion->exec("DELETE FROM TBL_DESTACADOS WHERE CODIGO_ARCHIVO = ".$_POST['codigo_archivo']);
                $conexion->commit();
                
                $respuesta['codigo'] = 1;
                $respuesta['mensaje'] = "Archivo des-destacado exitosamente";
            } catch (Exception $e){
                $conexion->rollback();
                $respuesta['codigo'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
            
            $respuesta['contenido'] = $_POST;            

            echo json_encode($respuesta);
            break;

        case 'addCard':
            $stmt = $conexion->prepare('CALL P_AGREGAR_TARJETA(?,?,?,?,?,?,?,?,?)');
            $stmt->bindParam(1,$_POST['codigo_entidad']);
            $stmt->bindParam(2,$_POST['codigo_moneda']);
            $stmt->bindParam(3,$_SESSION['codigo_usuario']);
            $stmt->bindParam(4,$_POST['numero_tarjeta']);
            $stmt->bindParam(5,$_POST['nombre_propietario']);
            $stmt->bindParam(6,$_POST['fecha_tarjeta']);
            $stmt->bindParam(7,$_POST['codigo_tarjeta']);
            $stmt->bindParam(8,$codigo,PDO::PARAM_STR,4000);
            $stmt->bindParam(9,$mensaje,PDO::PARAM_STR,4000);
            $stmt->execute();

            $respuesta['contenido'] = $_POST;
            $respuesta['codigo'] = $codigo;
            $respuesta['mensaje'] = $mensaje;
            echo json_encode($respuesta);

            break;

        default:
            echo(json_encode($respuesta));
            # code...
            break;
    }
    
    //$respuesta['contenido'] = (isset($_POST['usuario'])) ? $_POST['usuario'] : $_POST['password'];
    //$respuesta['contenido'] = $usuarioNuevo->toString();

    //echo(json_encode($respuesta));
?>

