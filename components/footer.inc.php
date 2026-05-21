<footer class="footer">
    <div class="container_footer">
        <div>
            <h2>Entreprise et Partenaires</h2>
            <img src="" alt="logo">
            <p>description</p>
            <img src="" alt="Partners">
        </div>
        <div>
            <h2>Navigation</h2>
            <p>
                <a href="index.php" class="<?php if (!isset($_GET['pg'])) echo 'active_footer' ?>">
                    ACCUEIL
                </a>
            </p>
            <p>
                <a href="index.php?pg=ab" class="<?php if ((isset($_GET['pg']) && $_GET['pg'] == 'ab')) echo 'active_footer'; ?>">
                    QUI SOMMES-NOUS ?
                </a>
            </p>


            <p>
                <a href="index.php?pg=pro" class="<?php if ((isset($_GET['pg']) && $_GET['pg'] == 'pro')) echo 'active_footer'; ?>">
                    DECOUVRIR LES PROJETS
                </a>
            </p>

            <p>
                <a href="index.php?pg=reg" class="<?php if ((isset($_GET['pg']) && $_GET['pg'] == 'reg')) echo 'active_footer'; ?>">
                    AJOUTEZ UN PROJET</a>
            </p>
        </div>
        <div>
            <h2>Contact</h2>
            <p>Téléphone :</p>
            <p>Email : </p>
        </div>
    </div>
    <div class=" footer_bottom">
        <p>© 2026 Innov'<span style="color : #bc1823">Campus</span> - Tous droits réservés</p>
    </div>
</footer>