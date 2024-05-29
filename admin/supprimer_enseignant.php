<?php
include "../connexion2.php";

// Vérifier si l'ID de l'étudiant est passé en paramètre
if (isset($_GET['id_enseignant'])) {
    $id_enseignant = $_GET['id_enseignant'];

    // Vérifier si le formulaire de confirmation de suppression a été soumis
    if (isset($_POST['confirm_delete'])) {
        // Requête de suppression de l'étudiant
		
        $delete_query = $connexion->query("delete from enseignant where id_enseignant=$id_enseignant");
        
        if ($delete_query->execute()) {
            // Redirection vers la page d'affichage des étudiants après suppression
            header("Location: affiche_enseignant.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de l'enseigant.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un étudiant</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php
// Si l'ID de l'étudiant est défini, afficher la boîte de dialogue de confirmation
if (isset($_GET['id_enseignant'])) {
    ?>
    <script>
        // Afficher une boîte de dialogue de confirmation
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: 'Vous ne pourrez pas annuler cette action !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer !'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, soumettre le formulaire
                document.getElementById('deleteForm').submit();
            } else {
                // Si l'utilisateur annule, rediriger vers la page d'affichage des étudiants
                window.location.href = 'Affiche_etudiant.php';
            }
        });
    </script>
    <?php
}
?>

<?php
// Vérifier si l'ID de l'étudiant est défini et afficher le formulaire de confirmation
if (isset($_GET['id_enseignant'])) {
    ?>
    <form id="deleteForm" method="post">
        <input type="hidden" name="confirm_delete" value="1">
    </form>
    <?php
}
?>
</body>
</html>
