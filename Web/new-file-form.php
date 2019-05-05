<?php
    echo '<form id="new-file-form" enctype="multipart/form-data" style="display:none">        
        <input type="hidden" name="MAX_FILE_SIZE" value="31000000">
        <input type="file" class="custom-file-input" id="newFileInput" name="newFile" style="border-color:lightslategray;border-style:solid;border-width:1px">
        <input type="button" value="Subir" class="input-group-text" id="btn-subir-archivo" style="margin-bottom: -20px; border-radius:.25rem; margin-top:10px;">            
    </form>';
?>