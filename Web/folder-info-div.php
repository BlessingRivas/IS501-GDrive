<?php
    echo '<div class="container folder-info-div">
        <button type="button" class="btn btn-link" id="close-folder-info"><i class="fas fa-times"></i></button><br>
        <span class="text-center warning-message">Nombre de la carpeta:</span><br>
        <input class="form-control" type="text" id="folder-info-name"><br>
        <span class="text-center warning-message">Fecha de creación: </span><br>
        <span class="text-center warning-message" id="folder-info-fecha-creacion"></span><br><br>
        <span class="text-center warning-message">Fecha de modificación: </span><br>
        <span class="text-center warning-message" id="folder-info-fecha-modificacion"></span><br><br>
        <span class="text-center warning-message">Último acceso: </span><br>
        <span class="text-center warning-message" id="folder-info-fecha-ultimo-acceso"></span><br><br>
        <select class="custom-select" id="slc-codigo-carpeta-padre">
            <option value="">Mover a carpeta</option>';            
                $gestor = new Gestor();
                $conexion = $gestor->getConexion();

                $stmt = $conexion->prepare('SELECT CODIGO_CARPETA,NOMBRE FROM TBL_CARPETAS WHERE CODIGO_USUARIO = ? AND CODIGO_CARPETA <> ?');
                $stmt->bindParam(1,$_SESSION['codigo_usuario']);
                $stmt->bindParam(2,$_SESSION['current_folder']);

                $stmt->execute();
                while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$result['CODIGO_CARPETA'].'">'.$result['NOMBRE'].'</option>';
                }        
            echo '
        </select><br><br>       
        <button class="btn btn-secondary" type="button" id="btn-modificar-carpeta">Guardar Cambios</button>        
    </div>';
?>
