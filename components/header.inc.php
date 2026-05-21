<nav>
    <div class="container_header">

        <a href="index.php" class="logo_box">
            <img src="images/ic_logo.png" class="logo" alt="LOGO">
        </a>

        <div class="menu_principal">
            <a href="index.php" class="<?php if(!isset($_GET['pg'])) echo'active'?>">
                ACCUEIL
            </a>

            <a href="index.php?pg=ab" class="<?php if((isset($_GET['pg']) && $_GET['pg'] == 'ab')) echo 'active';?>">
                QUI SOMMES-NOUS ?
            </a>

            <a href="index.php?pg=pro" class="<?php if((isset($_GET['pg']) && $_GET['pg'] == 'pro')) echo 'active';?>">
                DECOUVRIR LES PROJETS
            </a>
        </div>

        <div class="menu_ajout">
            <a href="index.php?pg=reg">AJOUTEZ UN PROJET</a>
        </div>

    </div>
</nav>