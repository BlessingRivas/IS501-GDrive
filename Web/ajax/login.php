<?php
    $respuesta['codigo'] = 1;
    $respuesta['mensaje'] = 'datos recibidos';
    $respuesta['usuario'] = $_POST['usuario'];
    echo(json_encode($respuesta));
?>

