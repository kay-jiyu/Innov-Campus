<footer class="footer">
    <div class="container_footer">
        <div>
            <img src="images/innov_campus_logo.png" class="logo_footer" alt="logo"><br>
            <p class="description_footer">Innov'Campus est une plateforme de valorisation <br>des startups étudiantes, portée par ESGIS.
            Un espace <br> dédié à l'innovation et à l'entrepreneuriat au sein du campus.</p><br>
            <img src="https://www.esgis.bj/logo-red.png" class="logo_esgis" alt="Partners"><br>
        </div>
        <div>
            <h3>Navigation</h3> <br>
            <p>
                <a href="index.php" class="menu_footer <?php if (!isset($_GET['pg'])) echo 'active_footer' ?>">
                    ACCUEIL
                </a>
            </p><br>
            <p>
                <a href="index.php?pg=ab" class="menu_footer  <?php if ((isset($_GET['pg']) && $_GET['pg'] == 'ab')) echo 'active_footer'; ?>">
                    QUI SOMMES-NOUS ?
                </a>
            </p><br>


            <p>
                <a href="index.php?pg=pro" class="menu_footer <?php if ((isset($_GET['pg']) && $_GET['pg'] == 'pro')) echo 'active_footer'; ?>">
                    DECOUVRIR LES PROJETS
                </a>
            </p>


        </div>
        <div>
            <h3>Contact</h3><br>
            <p>Email : contact@innovcampus.com </p><br><br><br><br>
        </div>
    </div>
    <div class=" footer_bottom">
        <p>© 2026 Innov'<span style="color : #bc1823">Campus</span> - Tous droits réservés</p>
    </div>
</footer>