<?php
if (isset($_GET['id'])) {
    include("login_db.inc.php");
    $id = $_GET['id'];

    $req = sprintf("SELECT * FROM startup WHERE id = '%d'", $id);
    $result = mysqli_query($con, $req);
    $enreg  = $result->fetch_assoc();

    $id = $enreg['id'];
    $nom = $enreg['nom_projet'];
    $secteur = $enreg['secteur'];
    $description = $enreg['description'];
    $date = $enreg['date_creation'];
    $email = $enreg['email_contact'];
    $logo = $enreg['logo'];
}
?>

<section>
    <h1 class="title"><?php echo isset($enreg) ? 'Modifier la startup' : 'Ajoutez votre startup'; ?></h1><br>
    <p class="description_project">Renseignez les informations de votre projet</p><br>

    <form class="startup-form" method="POST" action="index.php?pg=ins" enctype="multipart/form-data">
        <div class="form-grid">

            <div class="field full">
                <label for="nom_projet">Nom du projet</label>
                <input
                    type="text"
                    name="nom_projet"
                    id="nom_projet"
                    placeholder="Ex : AgroSmart Bénin"
                    <?php if (isset($enreg)) echo "value='$nom'"; ?>
                    required>
            </div>

            <div class="field select-wrap">
                <label for="secteur">Secteur</label>
                <select name="secteur" id="id" required>
                    <?php if (isset($enreg)) echo "<option>$secteur</option>"; ?>
                    <option>AgriTech</option>
                    <option>HealthTech</option>
                    <option>EdTech</option>
                    <option>FinTech</option>
                </select>
            </div>

            <div class="field">
                <label for="date_creation">Date de création</label>
                <input
                    type="date"
                    name="date_creation"
                    id="date_creation"
                    <?php if (isset($enreg)) echo "value='$date'"; ?>
                    required>
            </div>

            <div class="field full">
                <label for="email_contact">Email de contact</label>
                <input
                    type="email"
                    name="email_contact"
                    id="email_contact"
                    placeholder="contact@startup.bj"
                    <?php if (isset($enreg)) echo "value='$email'"; ?>
                    required>
            </div>

            <div class="field full">
                <label for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                    placeholder="Décrivez votre projet en quelques lignes…"
                    required><?php if (isset($enreg)) echo $description; ?></textarea>
            </div>

            <div class="preview-wrap">
                <img
                    id="logoPreview"
                    alt="Aperçu du logo"
                    <?php if (isset($enreg)) echo "src='$logo' style='display:block'"; ?>>
                <?php if (!isset($enreg)) : ?>
                    <span class="preview-placeholder">Aperçu du logo</span>
                <?php endif; ?>
            </div>

            <div class="upload-zone">
                <span class="upload-icon">↑</span>
                <span class="upload-label">Choisir un fichier</span>
                <span class="upload-sub">PNG, JPG, SVG — max 2 Mo</span>
                <input
                    type="file"
                    name="logo"
                    id="logo"
                    accept="image/*"
                    <?php if (!isset($enreg)) echo 'required'; ?>>
            </div>

        </div>

        <?php if (isset($enreg)) echo "<input type='hidden' name='id' value='$id'>"; ?><br>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                <?php if (isset($enreg)) echo "Modifier"; else echo "S'enregistrer"; ?>
            </button>
        </div>
    </form>
</section><br>