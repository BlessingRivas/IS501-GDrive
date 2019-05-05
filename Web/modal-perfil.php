<?php
    echo '
    <div class="modal fade" id="profilePicModal" tabindex="-1" role="dialog" aria-labelledby="profilePicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sube una foto de perfil.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="text-align:center">
                        <img id="profilePicPreview" width="230" height="230" class="rounded-circle" src="'; echo (isset($_SESSION['foto_perfil']) ? $_SESSION['foto_perfil'] : 'data/profile_pics/generic.jpg'); echo'">
                    </div><br><br>  
                    <form id="profile-pic-form" enctype="multipart/form-data">
                        <div class="input-group mb-3" style="display: none">
                                <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
                                <input type="file" class="custom-file-input" id="profilePicInput" name="profilePic">
                                <label class="custom-file-label" for="profilePicInput" aria-describedby="inputGroupFileAddon02">Seleccionar archivo</label>                            
                        </div>      
                    </form>
                    <div class="text-center"><button type="button" class="btn btn-primary" disabled id="btn-upload-pic">Subir Foto</button></div>                    
                </div>                        
            </div>
        </div>
    </div>';

?>