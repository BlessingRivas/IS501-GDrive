<?php
    $respuesta['codigo'] = 1;
    $respuesta['mensaje'] = 'datos recibidos';
    $respuesta['nombre'] = $_POST['nombre'];
    $respuesta['apellido'] = $_POST['apellido'];
    $respuesta['nombreusuario'] = $_POST['nombreusuario'];
    $respuesta['pass'] = $_POST['pass'];
    echo(json_encode($respuesta));
?>