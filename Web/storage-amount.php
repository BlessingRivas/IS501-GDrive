<?php
    echo '<div class="container storage-div">
        <i class="fas fa-server"></i><span class="storage-label">Almacenamiento</span>
        <div class="container storage-space">                        
            <div style="width: 100%;height: 10px;background-color: lightgray">
                <div style="width: '; echo(isset($_SESSION['espacio_usado']) ? $_SESSION['espacio_usado'] : '50'); echo '%;height: 10px;background-color: #5C67D2"></div>
            </div>                        
            <p><span class="storage-space-label">'; echo(isset($_SESSION['espacio_usado']) ? $_SESSION['espacio_usado'] : '50%'); echo'</span> de 15 GB usado</p>
            <a href="planes.php" style="font-size: 0.9em;font-family: \'Open sans\'">ADQUIRIR MÁS ALMACENAMIENTO</a>
        </div>
    </div>';
?>