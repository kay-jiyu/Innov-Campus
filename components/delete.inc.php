<?php
if (isset($_GET['id'])) {

    include("login_db.inc.php");

    $id = $_GET['id'];

    $req = sprintf("SELECT logo From startup WHERE id = '%d'", $id);
    $result = mysqli_query($con, $req);
    $image = $result->fetch_assoc();
    $logo = $image['logo'];

    if (file_exists($logo)) {
        unlink($logo);
    }

    $req_delete = sprintf("DELETE FROM startup WHERE id = '%d'", $id);
    mysqli_query($con, $req_delete);


    header("Location:index.php?pg=pro");
}
