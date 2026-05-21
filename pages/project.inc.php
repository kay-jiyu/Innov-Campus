<?php
include("login_db.inc.php");

if (isset($_POST['secteur_filter'])) {

    $secteur_filter = $_POST['secteur_filter'];

    if ($secteur_filter == 'Tout les secteurs') {
        $req = "SELECT * FROM startup";
        $result = mysqli_query($con, $req);
    } else {
        $req = sprintf("SELECT * FROM startup WHERE secteur = '%s'", $secteur_filter);
        $result = mysqli_query($con, $req);
    }
} else {
    $req = "SELECT * FROM startup";
    $result = mysqli_query($con, $req);
}

?>

<section>
    <h1 class="title">Les startup enregistré</h1>
    <p>descriptions</p>
    <div>
        <form method="POST" action="index.php?pg=pro">
            <select name="secteur_filter" id="secteur_filter">
                <option value="Tout les secteurs" <?php if (isset($secteur_filter) && $secteur_filter == 'Tout les secteurs') echo "selected"; ?>>Tous les secteurs</option>
                <option value="AgriTech" <?php if (isset($secteur_filter) && $secteur_filter == 'AgriTech') echo "selected"; ?>>AgriTech</option>
                <option value="HealthTech" <?php if (isset($secteur_filter) && $secteur_filter == 'HealthTech') echo "selected"; ?>>HealthTech</option>
                <option value="EdTech" <?php if (isset($secteur_filter) && $secteur_filter == 'EdTech') echo "selected"; ?>>EdTech</option>
                <option value="FinTech" <?php if (isset($secteur_filter) && $secteur_filter == 'FinTech') echo "selected"; ?>>FinTech</option>
            </select>
            <button type="submit">Filtrer</button>
        </form>
    </div>

    <?php
    if (empty($result->num_rows)) {
        echo "<p>Aucune startup dans ce secteur</p>";
    } else {
        while ($startup_info = $result->fetch_assoc()) {
            $id = $startup_info['id'];
            $nom = $startup_info['nom_projet'];
            $secteur = $startup_info['secteur'];
            $description = $startup_info['description'];
            $date = $startup_info['date_creation'];
            $email = $startup_info['email_contact'];
            $logo = $startup_info['logo'];

            echo "<p> Nom du Projet : $nom</p>";
            echo "<p> Secteur d'Activité : $secteur </p>";
            echo "<p> Description : $description </p>";
            echo "<p> Date de création : $date </p>";
            echo "<p> email : $email </p>";
            echo "<img src='$logo'>";
            echo "<a href ='index.php?pg=del&id=$id'><button>Supprimer</button></a>";
            echo "<a href ='index.php?pg=reg&id=$id'><button>Modifier</button></a>";
            
        }
    }

    ?>
</section>