<?php
    echo '    
    <div class="modal fade" id="newFolderModal" tabindex="-1" role="dialog" aria-labelledby="newFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear nueva carpeta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                    
                    <form id="new-folder-form">
                        <label for="txt-new-folder"><i class="fas fa-folder" style="font-size:2em;vertical-align:middle"></i></label>
                        <input type="text" class="add-input" id="txt-new-folder" placeholder="Nombre de la carpeta">
                    </form>
                    <div class="text-center"><button type="button" class="btn btn-primary" disabled="true" id="btn-add-folder">Crear carpeta</button></div>
                </div>                        
            </div>
        </div>
    </div>';
?>