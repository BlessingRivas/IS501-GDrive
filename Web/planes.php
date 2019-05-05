<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Elige tu plan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body style="background-color:#e2e3e4">
        <div class="titulo">Actualízate a Google One para tener más almacenamiento</div>
        <div class="titulo2">Consigue más espacio y beneficios adicionales</div>
            <div class="container-fluid">
                <div class="container">                
                    <div class="row">
                        <div class="col-3 col-md-3 plan">
                            <p class="planes_estilo ">15 GB</p>
                            <p class="planes_estilo2">Gratis</p>
                            <button class="btn-gratis" onclick="location.href='home.php'">Plan Actual</button>
                            <br><br><br><br><br><br><hr>
                            <p class="planbajo">Incluye</p>
                            <p class="size_plan"><i class="fas fa-check icon2"></i>15 Gb de Almacenamiento</p>
                        </div>
                        <div class="col-3 col-md-3 plan borderColor">
                            <p class="planes_estilo">100 GB</p>
                            <p class="planes_estilo2"></p>
                            <button type="button" class="btn btn-primary" id="abrirmodal1" data-toggle="modal" data-target="#Modal1-plan1">
                                    USD 1.99/mes
                            </button>
                            <br><br>
                            <p>O realiza un prepago anual</p>
                            <p >(ahorra 16%):</p>
                            <p>USD 19.99/año</p> 
                            <br>

                            <hr>
                            <p class="planbajo">Google One incluye</p>
                            <p class="size_plan"><i class="fas fa-check icon1"></i>100 GB de almacenamiento</p>
                            <p class="size_plan"><i class="fas fa-check icon3"></i>Expertos de Google</p>
                            <p class="size_plan"><i class="fas fa-check icon2"></i>Opción de agregar familia</p>
                            <p class="size_plan"><i class="fas fa-check icon2"></i>Beneficios adicionales para miembros</p>
                        </div>

                        <div class="col-3 col-md-3 plan">
                            <p class="planes_estilo">200 GB</p>
                            <p class="planes_estilo2"></p>
                            <button type="button" id="abrirmodal2" class="btn btn-primary" data-toggle="modal" data-target="#Modal1-plan2">
                                    USD 2.99/mes
                            </button>
                            <br><br>
                            <p>O realiza un prepago anual</p>
                            <p >(ahorra 16%):</p>
                            <p>USD 29.99/año</p> 
                            <br>                        
                            <hr>
                            <p class="planbajo">Google One incluye</p>
                            <p class="size_plan"><i class="fas fa-check icon1" ></i>200 GB de almacenamiento</p>
                            <p class="size_plan"><i class="fas fa-check icon3" ></i>Expertos de Google</p>
                            <p class="size_plan"><i class="fas fa-check icon1"></i>Opción de agregar familia</p>
                            <p class="size_plan"><i class="fas fa-check icon1"></i>Beneficios adicionales para miembros</p>
                        </div>
                    </div>
                </div>                     
            </div>
    </div>

    <?php include('panel-modals.php');?>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    
    <script src="js/controlador.js"></script>    
    
</body>
</html>