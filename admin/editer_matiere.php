<?php
include "../connexion2.php";

// Vérifier si l'identifiant de la matière à éditer est passé en paramètre
if (isset($_GET['id_matiere'])) {
    $id_matiere = $_GET['id_matiere'];

    // Récupérer les informations de la matière à partir de la base de données
    $query = $connexion->prepare("SELECT * FROM matiere WHERE id_matiere = :id_matiere");
    $query->bindParam(':id_matiere', $id_matiere);
    $query->execute();
    $matiere = $query->fetch(PDO::FETCH_ASSOC);
}

// Vérifier si le formulaire d'édition est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom_matiere = $_POST['nom_matiere'];
    $id_enseignant = $_POST['id_enseignant'];
    $id_semestre = $_POST['id_semestre'];
    $reqs=$connexion->query("SELECT * FROM semestre WHERE nom_semestre='$id_semestre'");
    $rows=$reqs->fetch(PDO::FETCH_ASSOC);
    $id_semestre=$rows['id_semestre'];

    // Mettre à jour les informations de la matière dans la base de données
    $query = $connexion->prepare("UPDATE matiere SET nom_matiere = :nom_matiere, id_enseignant = :id_enseignant, id_semestre = :id_semestre WHERE id_matiere = :id_matiere");
    $query->bindParam(':nom_matiere', $nom_matiere);
    $query->bindParam(':id_enseignant', $id_enseignant);
    $query->bindParam(':id_semestre', $id_semestre);
    $query->bindParam(':id_matiere', $id_matiere);
    $query->execute();

    // Rediriger vers la page d'affichage des matières après la modification
    header("Location: afficher_matiere.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Édition de Matière</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Édition de Matière</h2>
        <form method="post">
            <div class="form-group">
                <label for="nom_matiere">Nom de la Matière</label>
                <input type="text" class="form-control" id="nom_matiere" name="nom_matiere" value="<?php echo $matiere['nom_matiere']; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_filiere">Filière</label>
                <select class="form-control" id="id_filiere" name="id_filiere" required>
                    <!-- Options de filière récupérées de la base de données -->
                    <option value="1">Ingenierie</option>
                    <option value="2">Management</option>
                    <!-- Ajoutez d'autres options de filière ici -->
                </select>
            </div>
            <div class="form-group">
                <label for="id_niveau">Niveau</label>
                <select class="form-control" id="id_niveau" name="id_niveau" required>
                    <!-- Options de niveau récupérées de la base de données -->
                    <option value="1">1ère année</option>
                    <option value="2">2ème année</option>
                    <!-- Ajoutez d'autres options de niveau ici -->
                </select>
            </div>
            <div class="form-group">
                <label for="id_classe">Classe</label>
                <select class="form-control" id="id_classe" name="id_classe" required>
                    <!-- Options de classe récupérées de la base de données -->
                    
                    <!-- Ajoutez d'autres options de classe ici -->
                </select>
            </div>
            <div class="form-group">
                <label for="id_semestre">Semestre</label>
                <select class="form-control" id="id_semestre" name="id_semestre" required>
                    <!-- Options de semestre récupérées de la base de données -->
                    
                    <!-- Ajoutez d'autres options de semestre ici -->
                </select>
                <div class="form-group">
                <label for="id_enseignant">Classe</label>
                <select class="form-control" id="id_enseeignant" name="id_enseignant" required>
                <?php
                    // Connexion à la base de données et récupération des enseignants
                    $req=$connexion->query("select * from enseignant");
                    if ($req) {
                        while($row = $req->fetch()) {
                            echo "<option value='" . $row["id_enseignant"] . "'>" . $row["nom"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>
</html>
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
                            <script>
                            // Options de semestres pour chaque niveau
var semestresParNiveau = {
    'I-1re annee': ['semestre-1', 'semestre-2'],
    'I-2eme annee': ['semestre-3', 'semestre-4'],
    'I-3eme annee': ['semestre-5', 'semestre-6'],
    'I-4eme annee': ['semestre-7', 'semestre-8'],
    'I-5eme annee': ['semestre-9'],
    'M-1re annee': ['semestre-1', 'semestre-2'],
    'M-2eme annee': ['semestre-3', 'semestre-4'],
    'M-3eme annee': ['semestre-5', 'semestre-6'],
    'M-4eme annee': ['semestre-7', 'semestre-8'],
    'M-5eme annee': ['semestre-9']
};

// Fonction pour mettre à jour dynamiquement les options de semestre en fonction du niveau sélectionné
function updateSemestres() {
    var selectedNiveau = document.getElementById('id_niveau').value;
    var semestreDropdown = document.getElementById('id_semestre');
    semestreDropdown.innerHTML = ''; // Supprime toutes les options actuelles

    var semestres = semestresParNiveau[selectedNiveau] || [];
    semestres.forEach(function(semestre) {
        var option = document.createElement('option');
        option.value = semestre;
        option.textContent = semestre;
        semestreDropdown.appendChild(option);
    });
}

// Appeler la fonction updateSemestres lorsqu'il y a un changement dans le menu déroulant du niveau
document.getElementById('id_niveau').addEventListener('change', updateSemestres);

// Appeler la fonction updateSemestres au chargement de la page pour afficher les options de semestre par défaut
updateSemestres();

                         </script>
</html>
