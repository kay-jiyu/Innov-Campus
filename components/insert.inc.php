<?php
include("login_db.inc.php");
if (isset($_POST['id'])) {
    if ($_FILES['logo']['error'] == 0) {
        $logo = preg_replace(
            "/[^a-zA-Z0-9._-]/",
            "_",
            $_FILES['logo']['name']
        );
        $tmp = $_FILES['logo']['tmp_name'];

        $destination = __DIR__ . "/../uploads/" . $logo;

        move_uploaded_file($tmp, $destination);

        $logoPath = "uploads/" . $logo;

        $req = sprintf(
            "UPDATE startup SET nom_projet='%s', secteur='%s', description='%s', date_creation='%s', email_contact='%s', logo='%s' WHERE id='%d'",
            mysqli_real_escape_string($con, $_POST['nom_projet']),
            mysqli_real_escape_string($con, $_POST['secteur']),
            mysqli_real_escape_string($con, $_POST['description']),
            mysqli_real_escape_string($con, $_POST['date_creation']),
            mysqli_real_escape_string($con, $_POST['email_contact']),
            $logoPath,
            mysqli_real_escape_string($con, $_POST['id'])

        );
    } else {
        $req = sprintf(
            "UPDATE startup SET nom_projet='%s', secteur='%s', description='%s', date_creation='%s', email_contact='%s' WHERE id='%d'",
            mysqli_real_escape_string($con, $_POST['nom_projet']),
            mysqli_real_escape_string($con, $_POST['secteur']),
            mysqli_real_escape_string($con, $_POST['description']),
            mysqli_real_escape_string($con, $_POST['date_creation']),
            mysqli_real_escape_string($con, $_POST['email_contact']),
            mysqli_real_escape_string($con, $_POST['id'])
        );
    }
    mysqli_query($con, $req);

    header("location:index.php?pg=pro");
} else {
    $logo = preg_replace(
        "/[^a-zA-Z0-9._-]/",
        "_",
        $_FILES['logo']['name']
    );
    $tmp = $_FILES['logo']['tmp_name'];

    $destination = __DIR__ . "/../uploads/" . $logo;

    move_uploaded_file($tmp, $destination);

    $logoPath = "uploads/" . $logo;

    $req = sprintf(
        "INSERT INTO startup (nom_projet, secteur, description, date_creation, email_contact, logo) VALUES ('%s','%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($con, $_POST['nom_projet']),
        mysqli_real_escape_string($con, $_POST['secteur']),
        mysqli_real_escape_string($con, $_POST['description']),
        mysqli_real_escape_string($con, $_POST['date_creation']),
        mysqli_real_escape_string($con, $_POST['email_contact']),
        $logoPath
    );

    mysqli_query($con, $req);

    header('Location:index.php?pg=reg');

    exit();
}
