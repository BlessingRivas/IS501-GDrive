<?php
    echo '    
    <div class="modal fade" id="shareFileModal" tabindex="-1" role="dialog" aria-labelledby="shareFileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Compartir archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                     
                    <form id="new-folder-form">
                        <input type="text" class="add-input" hidden id="txt-compartir-archivo" placeholder="Codigo del archivo">
                        <label for="txt-compartir-usuario"><i class="fas fa-user" style="font-size:2em;vertical-align:middle"></i></label>
                        <input type="text" class="add-input" id="txt-compartir-usuario" placeholder="Correo del usuario"><br><br>
                        <label for="slc-tipo-compartido"><i class="fas fa-share-alt" style="font-size:2em;vertical-align:middle"></i></label>
                        <select class="custom-select add-input" id="slc-tipo-compartido">
                          <option value="">Tipo Compartido</option>';                            
                            $gestor = new Gestor();
                            $conexion = $gestor->getConexion();

                            $stmt = $conexion->prepare('SELECT CODIGO_TIPO_COMPARTIDO,TIPO_COMPARTIDO FROM TBL_TIPOS_COMPARTIDOS');
                            $stmt->execute();

                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="'.$result['CODIGO_TIPO_COMPARTIDO'].'">'.$result['TIPO_COMPARTIDO'].'</option>';
                            }                    
                        echo '</select><br>                        
                    </form><br>
                    <span id="share-file-message" style="display:none;font-size:0.9em"></span>
                    <div class="text-center"><button type="button" class="btn btn-primary" disabled="true" id="btn-share-file">Compartir</button></div>
                </div>                        
            </div>
        </div>
    </div>';
?>