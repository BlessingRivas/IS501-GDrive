<?php
    echo '<nav class="navbar navbar-expand-lg" id="home-nav">
        <a href="#" class="navbar-brand home-brand"><img src="img/logo-drive.png" width="15%"> Drive</a>
        <div class="search-container">
            <i class="fas fa-search" id="search-icon"></i>
            <input type="text" name="" id="txt-search" placeholder="Buscar en Drive">            
        </div>
        <div class="setting-container">
            <i class="far fa-question-circle"></i>
            <button type="button" class="btn btn-link" style="padding:0px;font-size:1em;text-align:center" onclick=location.href="ajustes.php"><i class="fas fa-cog"></i></button>
        </div>
        <div class="account-container">
            <i class="fas fa-th"></i>
            <button type="button" class="btn icon-div" id="btn-user-home">'; echo (isset($_SESSION['nombre']) ? substr(strtoupper($_SESSION['nombre']),0,1) : 'U'); echo'</button>
            <div class="container menu-div" id="menu-user-home">
                <img id="home-user-img" src="';echo (isset($_SESSION['foto_perfil']) ? $_SESSION['foto_perfil'] : 'data/profile_pics/generic.jpg'); echo'" class="rounded-circle img-thumbnail" style="margin-right: 10px;float: left">
                <div>
                    <span class="home-user-title">'; echo (isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Nombre Usuario'); echo'</span><br>
                    <span class="home-user-mail">'; echo (isset($_SESSION['correo']) ? $_SESSION['correo'] : 'Nombre Usuario'); echo'</span><br>
                </div>
                <button type="button" class="btn btn-primary" id="btn-logout" onclick="location.href=\'logout.php\'">Cerrar sesión</button>
            </div>
        </div>
    </nav>';
?>