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
    <h1 class="title">Les startups</h1><br>
    <p class="description_project">
        Chaque startup présentée ici est née d'un constat, d'une frustration ou d'un rêve. <br>Portées par des équipes locales,
        ces initiatives couvrent l'agriculture, la santé, l'éducation et la finance.
    </p>
    <div class="team-intro-line"></div>
    <br><br>
    <div>
        <form class="filter-bar" method="POST" action="index.php?pg=pro">
            <select name="secteur_filter" id="secteur_filter">
                <option value="Tout les secteurs" <?php if (isset($secteur_filter) && $secteur_filter == 'Tout les secteurs') echo "selected"; ?>>Tous les secteurs</option>
                <option value="AgriTech" <?php if (isset($secteur_filter) && $secteur_filter == 'AgriTech')   echo "selected"; ?>>AgriTech</option>
                <option value="HealthTech" <?php if (isset($secteur_filter) && $secteur_filter == 'HealthTech') echo "selected"; ?>>HealthTech</option>
                <option value="EdTech" <?php if (isset($secteur_filter) && $secteur_filter == 'EdTech')     echo "selected"; ?>>EdTech</option>
                <option value="FinTech" <?php if (isset($secteur_filter) && $secteur_filter == 'FinTech')    echo "selected"; ?>>FinTech</option>
            </select>
            <button type="submit">Filtrer</button>
        </form>
    </div><br>

    <div class="cards-wrapper">
        <?php
        if ($result->num_rows == 0) {
            echo "<p class='empty-state'>Aucune startup dans ce secteur</p>";
        } else {

            while ($startup_info = $result->fetch_assoc()) {
                $id      = $startup_info['id'];
                $nom     = $startup_info['nom_projet'];
                $secteur = $startup_info['secteur'];
                $desc    = $startup_info['description'];
                $date    = $startup_info['date_creation'];
                $mail    = $startup_info['email_contact'];
                $logo    = $startup_info['logo'];

                echo "
        <div class='startup-card'>
          <div class='card-logo'>
            <img src='$logo' alt='Logo $nom' onerror=\"this.style.display='none'\">
          </div>
          <div class='card-info'>
            <p class='card-nom'>$nom</p>
            <span class='card-secteur'>$secteur</span>
          </div>
          <div class='card-body'>
            <div class='desc_section'>
              <p class='desc-text' id='desc_$id'>$desc</p>
              <button class='lire-suite' onclick=\"toggleDesc('desc_$id', this)\">Lire la suite</button>
            </div>
            <div class='card-meta'>
              <div class='meta-row'>Date de création : $date</div>
              <div class='meta-row'>Mail : $mail</div>
            </div>
          </div>
          <div class='card-actions'>
            <a href='index.php?pg=del&id=$id' class='action-btn btn-delete'>Supprimer</a>
            <a href='index.php?pg=reg&id=$id' class='action-btn btn-edit'>Modifier</a>
            <a href='index.php?pg=down&id=$id' class='action-btn btn-down'>Télécharger</a>
          </div>
        </div>";
            }
        }
        ?>
    </div>
</section><br><br>