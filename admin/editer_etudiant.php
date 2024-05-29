<?php
include "../connexion2.php";

$success = false;

if (isset($_GET['id_etudiant'])) {
    $id_etudiant = $_GET['id_etudiant'];

    // Récupérer les informations actuelles de l'étudiant
    $result = $connexion->query("SELECT * FROM etudiant WHERE id_etudiant = '$id_etudiant'");
    if ($result) {
        $etudiant = $result->fetch();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $id_classe = $_POST['id_classe'];
        $id_filiere = $_POST['id_filiere'];
        $id_niveau = $_POST['id_niveau'];
        $req1=$connexion->query("SELECT * FROM classe WHERE nom_classe='$id_classe'");
if($req1){
    $value1=$req1->fetch();
    if($value1){ 
        $id_classe=$value1['id_classe'];
        }else{
            echo "value1 est false";
        }
}else{
    echo "1 ne sest pas executer"; 
}
$req2=$connexion->query("SELECT * FROM niveau WHERE nom_niveau='$id_niveau'");
if($req2){
    $value2=$req2->fetch();
    if($value2){ 
    $id_niveau=$value2['id_niveau'];
    }else{
        echo "value2 est:".$value2;
    }
}else{
    echo " 2 ne sest pas executer";
}

        try {
            // Mettre à jour les informations de l'étudiant
            $stmt = $connexion->prepare("UPDATE etudiant SET nom = :nom, prenom = :prenom, id_classe = :id_classe, id_filiere = :id_filiere, id_niveau = :id_niveau WHERE id_etudiant = :id_etudiant");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':id_classe', $id_classe);
            $stmt->bindParam(':id_filiere', $id_filiere);
            $stmt->bindParam(':id_niveau', $id_niveau);
            $stmt->bindParam(':id_etudiant', $id_etudiant);

            $stmt->execute();

            $success = true;
        } catch (Exception $e) {
            echo "Échec de la mise à jour des informations: " . $e->getMessage();
        }
    }
} else {
    echo "ID étudiant non fourni.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Éditer les informations de l'étudiant</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Éditer les informations de l'étudiant</h2>
        <?php if ($success): ?>
            <div class="alert alert-success">Informations mises à jour avec succès.</div>
        <?php endif; ?>
        <?php if ($etudiant): ?>
            <form action="" method="post" class="mt-4">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="id_classe">Classe:</label>
                    <select id="id_classe" name="id_classe" class="form-control" required>
                        <?php
                        $classes = $connexion->query("SELECT * FROM classe");
                        while ($classe = $classes->fetch()) {
                            $selected = ($classe['id_classe'] == $etudiant['id_classe']) ? 'selected' : '';
                            echo "<option value=\"{$classe['id_classe']}\" $selected>{$classe['nom_classe']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_filiere">Filière:</label>
                    <select id="id_filiere" name="id_filiere" class="form-control" required>
                        <?php
                        $filieres = $connexion->query("SELECT * FROM filiere");
                        while ($filiere = $filieres->fetch()) {
                            $selected = ($filiere['id_filiere'] == $etudiant['id_filiere']) ? 'selected' : '';
                            echo "<option value=\"{$filiere['id_filiere']}\" $selected>{$filiere['nom_filiere']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_niveau">Niveau:</label>
                    <select id="id_niveau" name="id_niveau" class="form-control" required>
                        <?php
                        $niveaux = $connexion->query("SELECT * FROM niveau");
                        while ($niveau = $niveaux->fetch()) {
                            $selected = ($niveau['id_niveau'] == $etudiant['id_niveau']) ? 'selected' : '';
                            echo "<option value=\"{$niveau['id_niveau']}\" $selected>{$niveau['nom_niveau']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="Affiche_etudiant.php" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        <?php else: ?>
            <p>Étudiant non trouvé.</p>
        <?php endif; ?>
    </div>
    <script>
  
  // Options de classe pour la filière Ingenierie
  var classesIngenierie = ['1GI', '2GI', '3GI', '4GI', '5GI'];
  // Options de classe pour la filière Management
  var classesManagement = ['1SIM', '2SIM', '3SIM', '4SIM', '5SIM'];
  
  // Options de niveaux pour la filière Ingenierie
  var niveauxIngenierie = ['I-1re annee', 'I-2eme annee', 'I-3eme annee', 'I-4eme annee','I-5eme annee'];
  
  // Options de niveaux pour la filière Management
  var niveauxManagement = ['M-1re annee', 'M-2eme annee', 'M-3eme annee', 'M-4eme annee','M-4eme annee'];
  
  // Fonction pour mettre à jour dynamiquement les options de classe et de niveau en fonction de la filière sélectionnée
  function updateOptions() {
      var filiere = document.getElementById('id_filiere').value;
      var classeDropdown = document.getElementById('id_classe');
      var niveauDropdown = document.getElementById('id_niveau');
      classeDropdown.innerHTML = ''; // Supprime toutes les options actuelles
      niveauDropdown.innerHTML = ''; // Supprime toutes les options actuelles
  
      var classes, niveaux;
      if (filiere === '1') {
          classes = classesIngenierie;
          niveaux = niveauxIngenierie;
      } else if (filiere === '2') {
          classes = classesManagement;
          niveaux = niveauxManagement;
      }
  
      // Mettre à jour les options de classe
      classes.forEach(function(classe) {
          var option = document.createElement('option');
          option.value = classe;
          option.textContent = classe;
          classeDropdown.appendChild(option);
      });
  
      // Mettre à jour les options de niveau
      niveaux.forEach(function(niveau) {
          var option = document.createElement('option');
          option.value = niveau;
          option.textContent = niveau;
          niveauDropdown.appendChild(option);
      });
  }
  
  // Appeler la fonction updateOptions lorsqu'il y a un changement dans le menu déroulant de la filière
  document.getElementById('id_filiere').addEventListener('change', updateOptions);
  
  // Appeler la fonction updateOptions au chargement de la page pour afficher les options de classe et de niveau par défaut
  updateOptions();
  
                         </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
