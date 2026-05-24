<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/hero.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/about.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/adds_projects.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/projects.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="images/ico_fb.png">
    <title>Innov_Campus</title>
</head>

<body>

    <header>
        <?php include("./components/header.inc.php"); ?>
    </header>
    <div class="formes-bg">
        <img src="images/forme_1.png" class="forme f1" alt="">
        <img src="images/forme_1.png" class="forme f2" alt="">
        <img src="images/forme_1.png" class="forme f3" alt="">
        <img src="images/forme_1.png" class="forme f4" alt="">
    </div>

    <main class="page-transition">
        <div>
            <?php include("container.inc.php"); ?>
        </div>
    </main>

    <footer>
        <?php include("./components/footer.inc.php"); ?>
    </footer>

    <script src="script.js"></script>
</body>

</html>