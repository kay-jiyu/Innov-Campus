<?php
include("login_db.inc.php");

$req = "SELECT * FROM equipe";
$result = mysqli_query($con, $req);
?>

<section>
    <h1 class="title">NOTRE ÉQUIPE</h1>
    <br>

    <p class="description_project">
        Les membres derrière le développement du projet Innov'Campus
    </p>

    <div class="team-intro-line"></div>
    <br>

    <div class='team-card'>
        <div class='team-grid'>

            <?php
            if (mysqli_num_rows($result) == 0) {

                echo "<p class='empty-state'>Aucune information membre</p>";
            } else {

                while ($enreg = $result->fetch_assoc()) {

                    $nom = $enreg['nom'];
                    $prenom = $enreg['prenom'];
                    $photo = $enreg['photo'];
                    $role = $enreg['role'];

                    echo "
                    <div class='member-card'>

                        <span class='member-role'>
                            $role
                        </span>

                        <div class='member-photo'>
                            <img src='$photo' alt=''>
                        </div>

                        <div class='member-info'>

                            <p class='member-prenom'>
                                $prenom
                            </p>

                            <p class='member-nom'>
                                $nom
                            </p>

                        </div>

                    </div>
                    ";
                }
            }
            ?>

        </div>
    </div>

</section><br><br>