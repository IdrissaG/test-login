<?php
include "../connexion2.php";

$success = false;

if (isset($_GET['id_etudiant']) && isset($_POST['date_absence']) && isset($_POST['raison']) && isset($_GET['id_matiere'])) {
    // Récupérer les données du formulaire
    $id_etudiant = $_GET['id_etudiant'];
    $date_absence = $_POST['date_absence'];
    $raison = $_POST['raison'];
    $id_matiere=$_GET['id_matiere'];

    // Requête SQL pour insérer l'absence dans la base de données
    $req = $connexion->query("INSERT INTO absences (id_etudiant, date_absence, raison, id_matiere) VALUES ('$id_etudiant', '$date_absence', '$raison', '$id_matiere')");

    // Exécution de la requête et redirection
    if ($req) {
        $success = true;
    } else {
        echo "Erreur : ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une absence</title>
    <!-- Inclure les fichiers CSS et JS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Ajouter une absence</h2>
        <form action="" method="post" class="mt-4">
            <div class="form-group">
                <label for="date_absence">Date de l'absence :</label>
                <input type="date" id="date_absence" name="date_absence" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="raison">Raison de l'absence :</label>
                <input type="text" id="raison" name="raison" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Absence</button>
        </form>
    </div>

    <!-- Modal de succès -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Succès</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Absence ajoutée avec succès.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeButton" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var success = <?php echo json_encode($success); ?>;
            if (success) {
                $('#successModal').modal('show');
            }

            $('#closeButton').click(function() {
                window.location.href = 'gestion_absences.php';
            });
        });
    </script>
</body>
</html>
