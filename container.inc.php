<?php

if (isset($_GET['pg'])) {
    switch ($_GET['pg']) {
        case 'reg':
            include("./pages/register.inc.php");
            break;
        case 'ins':
            include("./components/insert.inc.php");
            break;
        case 'pro':
            include("./pages/project.inc.php");
            break;
        case 'ab':
            include("./pages/about.inc.php");
            break;
        case 'del':
            include("./components/delete.inc.php");
            break;
        case 'down':
            include("./components/download.inc.php");
            break;
        default:
            include("./pages/accueil.inc.php");
            break;
    }
} else {
    include("./pages/accueil.inc.php");
}
