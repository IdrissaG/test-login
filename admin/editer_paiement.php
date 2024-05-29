<?php
include "../connexion2.php";

$success = false;
$etudiant = null;

if (isset($_GET['id_etudiant'])) {
    $id_etudiant = $_GET['id_etudiant'];

    // Sélectionner les informations de l'étudiant
    $etudiant_info = $connexion->query("
        SELECT et.nom AS nom_etudiant, et.prenom AS prenom_etudiant, cl.nom_classe, fil.nom_filiere
        FROM etudiant et
        JOIN classe cl ON et.id_classe = cl.id_classe
        JOIN filiere fil ON et.id_filiere = fil.id_filiere
        WHERE et.id_etudiant = '$id_etudiant'
    ");
    if ($etudiant_info) {
        $etudiant = $etudiant_info->fetch();
    }

    if (isset($_POST['montant_paye']) && isset($_POST['date_paiement']) && isset($_POST['description_paiement'])) {
        $montant_paye = $_POST['montant_paye'];
        $date_paiement = $_POST['date_paiement'];
        $description_paiement = $_POST['description_paiement'];

        try {
            // Commencer une transaction
            $connexion->beginTransaction();

            // Insérer le paiement dans la table paiement
            $stmt = $connexion->query("INSERT INTO paiement (id_etudiant, montant_paye, date_paiement, description_paiement) VALUES ('$id_etudiant', '$montant_paye', '$date_paiement', '$description_paiement')");

            // Mettre à jour le montant dû dans la table etudiant
            $stmt = $connexion->query("UPDATE etudiant SET montant_paiement = montant_paiement - $montant_paye WHERE id_etudiant = $id_etudiant");

            // Valider la transaction
            $connexion->commit();

            $success = true;
        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            $connexion->rollBack();
            echo "Échec de l'enregistrement du paiement: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Enregistrer un paiement</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Enregistrer un paiement</h2>
        <?php if ($etudiant): ?>
            <p><strong>Nom:</strong> <?php echo htmlspecialchars($etudiant['nom_etudiant'] . " " . $etudiant['prenom_etudiant']); ?></p>
            <p><strong>Classe:</strong> <?php echo htmlspecialchars($etudiant['nom_classe']); ?></p>
            <p><strong>Filière:</strong> <?php echo htmlspecialchars($etudiant['nom_filiere']); ?></p>
        <?php else: ?>
            <p>Informations de l'étudiant non disponibles.</p>
        <?php endif; ?>
        <form action="" method="post" class="mt-4">
            <div class="form-group">
                <label for="montant_paye">Montant Payé:</label>
                <input type="number" id="montant_paye" name="montant_paye" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_paiement">Date de Paiement:</label>
                <input type="date" id="date_paiement" name="date_paiement" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description_paiement">Description:</label>
                <input type="text" id="description_paiement" name="description_paiement" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="paiement.php" class="btn btn-secondary">Retour</a>
            </div>
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
                    Paiement enregistré avec succès.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeButton" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var success = <?php echo json_encode($success); ?>;
            if (success) {
                $('#successModal').modal('show');
            }

            $('#closeButton').click(function() {
                window.location.href = 'paiement.php';
            });
        });
    </script>
</body>
</html>
