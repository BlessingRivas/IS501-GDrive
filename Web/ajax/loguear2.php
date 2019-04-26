<?php
    $respuesta['codigo'] = 1;
    $respuesta['mensaje'] = 'datos recibidos';
    $respuesta['pais'] = $_POST['pais'];
    $respuesta['telefono'] = $_POST['telefono'];
    $respuesta['correoalterno'] = $_POST['correoalterno'];
    $respuesta['dia'] = $_POST['dia'];
    $respuesta['mes'] = $_POST['mes'];
    $respuesta['anio'] = $_POST['anio'];
    $respuesta['genero'] = $_POST['genero'];
    echo(json_encode($respuesta));
?>