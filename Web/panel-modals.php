<?php
    echo '
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
              <input type="text" hidden id="txt-codigo-plan">
              <div class="row">
                  <div class="col-md-6 mr-auto">
                      <select class="custom-select" id="txt-entidad-tarjeta">
                          <option value="">Entidad Financiera</option>';
                    include('class/class-gestor.php');
                    $gestor = new Gestor();
                    $conexion = $gestor->getConexion();

                    $stmt = $conexion->prepare('SELECT CODIGO_ENTIDAD,NOMBRE_ENTIDAD FROM TBL_ENTIDADES_FINANCIERAS');
                    $stmt->execute();

                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="'.$result['CODIGO_ENTIDAD'].'">'.$result['NOMBRE_ENTIDAD'].'</option>';
                    }                    
                  echo '</select>
                    <div class="invalid-feedback invalid-entidad-tarjeta">
                        <i class="fas fa-exclamation-circle"></i> Seleccione una entidad financiera
                    </div>
                  </div>
                  <div class="col-md-6 ml-auto">
                      <select class="custom-select" id="txt-moneda-tarjeta">
                          <option value="">Moneda</option>';                         
      
                          $stmt = $conexion->prepare('SELECT CODIGO_MONEDA,NOMBRE_MONEDA FROM TBL_MONEDAS');
                          $stmt->execute();
      
                          while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo '<option value="'.$result['CODIGO_MONEDA'].'">'.$result['NOMBRE_MONEDA'].'</option>';
                          }                    
                        
                  echo '</select>
                  <div class="invalid-feedback invalid-moneda-tarjeta">
                        <i class="fas fa-exclamation-circle"></i> Seleccione una moneda
                  </div>
                  </div>
              </div><br>
              <div class="row">                  
                  <div class="col-md-8 mr-auto">
                    <input class="form-control" type="text" id="txt-numero-tarjeta" placeholder="Número de Tarjeta">
                    <div class="invalid-feedback invalid-numero-tarjeta">
                        <i class="fas fa-exclamation-circle"></i> Ingrese su número de tarjeta
                    </div>
                  </div>
                    <div class="col-md-4 ml-auto">
                        <input type="text" class="form-control" id="txt-fecha-tarjeta" placeholder="MM/AAAA">
                        <div class="invalid-feedback invalid-fecha-tarjeta">
                            <i class="fas fa-exclamation-circle"></i> Ingrese  la fecha
                        </div>
                    </div>                                      
              </div>
              <br>
              <div class="row">
                  <div class="col-md-8 mr-auto">
                      <input type="text" class="form-control" id="txt-nombre-tarjeta" placeholder="Nombre del Cliente">
                      <div class="invalid-feedback invalid-nombre-tarjeta">
                        <i class="fas fa-exclamation-circle"></i> Ingrese nombre del cliente
                      </div>
                  </div>
                  <div class="col-md-4 mr-auto">
                      <input type="text" class="form-control" id="txt-ccv-tarjeta" placeholder="CCV">
                      <div class="invalid-feedback invalid-ccv-tarjeta">
                        <i class="fas fa-exclamation-circle"></i> Ingrese código CCV
                      </div>
                  </div>
              </div>              
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
            <button type="button" class="btn btn-primary" id="btn-registrar-tarjeta">Guardar</button>
          </div>
        </div>
      </div>
    </div>
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
    '
    ;
?>