<?php

if (isset($_GET['id'])) {

    include("login_db.inc.php");

    $id = $_GET['id'];

    $req = sprintf("SELECT * FROM startup WHERE id = '%d'", $id);
    $result = mysqli_query($con, $req);
    $enreg = $result->fetch_assoc();

    $id = $enreg['id'];
    $nom = $enreg['nom_projet'];
    $secteur = $enreg['secteur'];
    $description = $enreg['description'];
    $date = $enreg['date_creation'];
    $email = $enreg['email_contact'];
    $logo = $enreg['logo'];
}

?>

<form method="POST" action="index.php?pg=ins" enctype="multipart/form-data">
    <input type="text" name="nom_projet" id="nom_projet" <?php if (isset($enreg)) echo "value = '$nom'"; ?> required>
    <select name="secteur" id="id" required>
        <?php if (isset($enreg)) echo "<option>$secteur</option>"; ?>
        <option>AgriTech</option>
        <option>HealthTech</option>
        <option>EdTech</option>
        <option>FinTech</option>
    </select>
    <input type="text" name="description" id="description" <?php if (isset($enreg)) echo "value = '$description'"; ?> required>
    <input type="date" name="date_creation" id="date_creation" <?php if (isset($enreg)) echo "value = '$date'"; ?> required>
    <input type="email" name="email_contact" id="email_contact" <?php if (isset($enreg)) echo "value = '$email'"; ?> required>
    <input type="file" name="logo" id="logo" <?php if (!isset($enreg)) echo "required"; ?>>
    <img id="logoPreview" <?php if (isset($enreg)) echo "src='$logo'"; ?>>

    <?php if (isset($enreg)) echo "<input type = 'hidden' name = 'id' value = '$id'>"; ?>
    <button type="submit"><?php if(isset($enreg)) echo "Modifier"; else echo "S'enregistrer"; ?></button>
</form>