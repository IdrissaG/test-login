<?php
include "../connexion2.php";

// Vérifier si un enseignant est sélectionné
if(isset($_GET['id_enseignant'])) {
    $id_enseignant = $_GET['id_enseignant'];

    // Récupérer les informations de l'enseignant depuis la base de données
    $result = $connexion->query("SELECT * FROM enseignant WHERE id_enseignant = '$id_enseignant'");
    if($result) {
        $enseignant = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Erreur: Enseignant non trouvé.";
        exit();
    }
}

// Mettre à jour les informations de l'enseignant
if(isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $lieu_naissance = $_POST['lieu_naissance'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $genre = $_POST['genre'];
    $cne = $_POST['cne'];
    $diplome = $_POST['diplome'];
    $specialite = $_POST['specialite'];
    $date_obtention = $_POST['date_obtention'];

    // Mettre à jour les informations dans la base de données
    $stmt = $connexion->query("UPDATE enseignant SET nom='$nom', prenom='$prenom', date_naissance='$date_naissance', lieu_naissance='$lieu_naissance', adresse='$adresse', telephone='$telephone', genre='$genre', cne='$cne', diplome='$diplome', specialite='$specialite', date_obtention='$date_obtention' WHERE id_enseignant='$id_enseignant'");
   //$stmt->execute([$nom, $prenom, $date_naissance, $lieu_naissance, $adresse, $telephone, $genre, $cne, $diplome, $specialite, $date_obtention, $id_enseignant]);

    // Rediriger vers une page de confirmation ou d'affichage des informations mises à jour
    header("Location: Affiche_enseignant.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Enseignant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Modifier Enseignant</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $enseignant['nom']; ?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" name="prenom" value="<?php echo $enseignant['prenom']; ?>">
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance:</label>
                <input type="date" class="form-control" name="date_naissance" value="<?php echo $enseignant['date_naissance']; ?>">
            </div>
            <div class="form-group">
                <label for="lieu_naissance">Lieu de Naissance:</label>
                <input type="text" class="form-control" name="lieu_naissance" value="<?php echo $enseignant['lieu_naissance']; ?>">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" name="adresse" value="<?php echo $enseignant['adresse']; ?>">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone:</label>
                <input type="text" class="form-control" name="telephone" value="<?php echo $enseignant['telephone']; ?>">
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select class="form-control" name="genre">
                    <option value="Homme" <?php if($enseignant['genre'] == 'Homme') echo 'selected'; ?>>Homme</option>
                    <option value="Femme" <?php if($enseignant['genre'] == 'Femme') echo 'selected'; ?>>Femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cne">CNE:</label>
                <input type="text" class="form-control" name="cne" value="<?php echo $enseignant['cne']; ?>">
            </div>
            <div class="form-group">
                <label for="diplome">Diplôme:</label>
                <input type="text" class="form-control" name="diplome" value="<?php echo $enseignant['diplome']; ?>">
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité:</label>
                <input type="text" class="form-control" name="specialite" value="<?php echo $enseignant['specialite']; ?>">
            </div>
            <div class="form-group">
                <label for="date_obtention">Date d'Obtention:</label>
                <input type="date" class="form-control" name="date_obtention" value="<?php echo $enseignant['date_obtention']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

