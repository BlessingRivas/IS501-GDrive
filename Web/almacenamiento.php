<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Almacenamiento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>

<!---------------------------------------------------------------------PLAN 1---------------------------------------------------------------------------------------->
    <!-- boton -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1-plan1">
  USD 1.99/mes
</button>

<!-- Modal1 plan1-->
<div class="modal fade" id="Modal1-plan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-color: white">
        <h5 class="modal-title" id="exampleModalLabel">Condiciones del servicio de Google One</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="border-color: white">
      Al actualizar a un plan de Google One, 
      aceptas las <a href="#">Condiciones del servicio de Google One</a>. Nota: <a href="#">La Política de Privacidad de Google</a> describe cómo se procesan los datos en este servicio.
      </div>
      <div class="modal-footer" style="border-color: white">
        <button type="button" class="btn btn-light" data-dismiss="modal" style="color: blue">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-aceptar-modalplan1">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal2 plan1 -->
<div class="modal fade" id="Modal2-plan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" style="border-color: white">
      
      <div class="row">
            <div class="container col-md-4">
                    <img src="img/img1.png" alt="" style="width: 150px; heigth: 170px">
            </div>
            <div class="col-md-4 ml-auto">
                <h1>
                    100 GB (Google One)
                </h1>
            </div>
            <div class="col-md-4">
                <h1 style="color: #83bd53">
                    USD 1.99/mes
                </h1>
            </div>
      </div>
      <div class="row">
            <div class="col-md-4 ml-auto mr-auto">
                <i class="far fa-credit-card"><button id="btn-aceptar-modal2plan1" type="button" class="btn btn-link">Añadir tarjeta de débito o crédito</button></i>
            </div>
      </div>
      </div>
      <div class="modal-footer" style="border-color: white">
        <button type="button" class="btn btn-light" data-dismiss="modal" style="color: blue">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal3 plan1-->
<div class="modal fade" id="Modal3-plan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-color: white; background-color: #507079; border-color:#507079; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Agregar tarjeta de crédito o débito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="border-color: white">
      <div class="container">
          <div class="row">
              <div class="col-md-6 mr-auto">
                <input type="text" name="num-tarjeta-plan1" id="num-tarjeta-plan1" placeholder="Número de Tarjeta">
              </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" name="fecha-plan1" id="fecha-plan1" placeholder="Fecha">
                </div>
                <br>
                <br>
                <br>
          </div>
          <input type="text" name="nombre-cliente-plan1" id="nombre-cliente-plan1" placeholder="Nombre del Cliente">
      </div>
      <br>
      <br>
      <br>
      <p>
      Si continúa, acepta las <a href="#">Condiciones del Servicio </a>de Google Payments. 
        El <a href="#">Aviso de privacidad</a> de Google Payments describe la manera en que Google maneja la información de los pagos.
      </p>

      </div>
      <div class="modal-footer" style="border-color: white">
        <button type="button" class="btn btn-light" data-dismiss="modal" style="color: blue">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-aceptar-modalplan1">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!---------------------------------------------------------------------PLAN 2---------------------------------------------------------------------------------------->
 
    <!-- boton -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1-plan2">
        USD 2.99/mes
    </button>

    <!-- Modal1 plan2-->
<div class="modal fade" id="Modal1-plan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-color: white">
        <h5 class="modal-title" id="exampleModalLabel">Condiciones del servicio de Google One</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="border-color: white">
      Al actualizar a un plan de Google One, 
      aceptas las <a href="#">Condiciones del servicio de Google One</a>. Nota: <a href="#">La Política de Privacidad de Google</a> describe cómo se procesan los datos en este servicio.
      </div>
      <div class="modal-footer" style="border-color: white">
        <button type="button" class="btn btn-light" data-dismiss="modal" style="color: blue">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-aceptar-modalplan2">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal2 plan2 -->
<div class="modal fade" id="Modal2-plan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" style="border-color: white">
      
      <div class="row">
            <div class="container col-md-4">
                    <img src="img/img1.png" alt="" style="width: 150px; heigth: 170px">
            </div>
            <div class="col-md-4 ml-auto">
                <h1>
                    200 GB (Google One)
                </h1>
            </div>
            <div class="col-md-4">
                <h1 style="color: #83bd53">
                    USD 2.99/mes
                </h1>
            </div>
      </div>
      <div class="row">
            <div class="col-md-4 ml-auto mr-auto">
                <i class="far fa-credit-card"><button id="btn-aceptar-modal2plan2" type="button" class="btn btn-link">Añadir tarjeta de débito o crédito</button></i>
            </div>
      </div>
      </div>
      <div class="modal-footer" style="border-color: white">
        <button type="button" class="btn btn-light" data-dismiss="modal" style="color: blue">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal3 plan2-->
<div class="modal fade" id="Modal3-plan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-color: white; background-color: #507079; border-color:#507079; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Agregar tarjeta de crédito o débito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="border-color: white">
      <div class="container">
          <div class="row">
              <div class="col-md-6 mr-auto">
                <input type="text" name="num-tarjeta-plan2" id="num-tarjeta-plan2" placeholder="Número de Tarjeta">
              </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" name="fecha-plan2" id="fecha-plan2" placeholder="Fecha">
                </div>
                <br>
                <br>
                <br>
          </div>
          <input type="text" name="nombre-cliente-plan2" id="nombre-cliente-plan2" placeholder="Nombre del Cliente">
      </div>
      <br>
      <br>
      <br>
      <p>
      Si continúa, acepta las <a href="#">Condiciones del Servicio </a>de Google Payments. 
        El <a href="#">Aviso de privacidad</a> de Google Payments describe la manera en que Google maneja la información de los pagos.
      </p>

      </div>
      <div class="modal-footer" style="border-color: white">
        <button type="button" class="btn btn-light" data-dismiss="modal" style="color: blue">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-aceptar-modalplan2">Guardar</button>
      </div>
    </div>
  </div>
</div>

    
    <script src="js/jquery.min.js"></script>
    <script src="js/controlador.js"></script>
    <script src="js/validacion.js"></script>
    <script src="js/bootstrap.min.js"> </script>
</body>
</html>

