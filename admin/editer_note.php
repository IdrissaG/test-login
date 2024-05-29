<?php
include "../connexion2.php";
if(isset($_GET['id_etudiant']) && isset($_GET['id_matiere']) && isset($_POST['id_semestre'])) {
    $id_etudiant = $_GET['id_etudiant'];
    $id_matiere = $_GET['id_matiere'];
    $id_semestre = $_POST['id_semestre'];
    $req=$connexion->query("SELECT * FROM semestre WHERE nom_semestre='$id_semestre'");
    $result=$req->fetch();
    $id_semestre= $result["id_semestre"];
    // Sélectionner la note actuelle de l'étudiant pour la matière spécifiée
    $result = $connexion->query("SELECT note FROM note WHERE id_etudiant = '$id_etudiant' AND id_matiere = '$id_matiere'");
   $result2=$result->fetch();

    if($result2) {
        $note = $result2['note'];
    } else {
        // Si aucune note n'existe, initialiser à une valeur par défaut
        $note = 0;
        $connexion->query("INSERT INTO note (id_etudiant, id_matiere, note, id_semestre) VALUES ('$id_etudiant', '$id_matiere', '$note', '$id_semestre')");

    }
}

// Si le formulaire est soumis, mettre à jour la note
if(isset($_POST['submit'])) {
    $new_note = $_POST['note'];
    // Mettre à jour la note de l'étudiant pour la matière spécifiée
    $connexion->query("UPDATE note SET note = '$new_note' WHERE id_etudiant = '$id_etudiant' AND id_matiere = '$id_matiere'");
    // Rediriger vers la page d'affichage des étudiants après la mise à jour
    header("Location: notes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Editer Note</title>
</head>
<body>
<div class="container mt-5">
        <h2 class="mb-4">Editer Note</h2>
        <form method="post">
            <div class="form-group">
                <label for="id_filiere">Filière</label>
                <select class="form-control" name="id_filiere" id="id_filiere">
                    <option value="1">Ingenierie</option>
                    <option value="2">Management</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_niveau">Niveau</label>
                <select class="form-control" name="id_niveau" id="id_niveau"></select>
            </div>
            <div class="form-group">
                <label for="id_semestre">Semestre</label>
                <select class="form-control" name="id_semestre" id="id_semestre"></select>
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <input type="number" class="form-control" id="note" name="note" value="<?php echo $note; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var filiereDropdown = document.getElementById('id_filiere');
                    var niveauDropdown = document.getElementById('id_niveau');
                    var classeDropdown = document.getElementById('id_classe');
                    var matiereDropdown = document.getElementById('id_matiere');

                    var niveaux = {
                        '1': ['I-1re annee', 'I-2eme annee', 'I-3eme annee', 'I-4eme annee', 'I-5eme annee'],
                        '2': ['M-1re annee', 'M-2eme annee', 'M-3eme annee', 'M-4eme annee', 'M-5eme annee']
                    };
                    var classes = {
                        '1': ['1GI', '2GI', '3GI', '4GI', '5GI'],
                        '2': ['1SIM', '2SIM', '3SIM', '4SIM', '5SIM']
                    };

                    function updateNiveauClasseOptions() {
                        var filiere = filiereDropdown.value;
                        var selectedNiveaux = niveaux[filiere] || [];
                        var selectedClasses = classes[filiere] || [];

                        niveauDropdown.innerHTML = '';
                        selectedNiveaux.forEach(function (niveau) {
                            var option = document.createElement('option');
                            option.value = niveau;
                            option.textContent = niveau;
                            niveauDropdown.appendChild(option);
                        });

                        classeDropdown.innerHTML = '';
                        selectedClasses.forEach(function (classe) {
                            var option = document.createElement('option');
                            option.value = classe;
                            option.textContent = classe;
                            classeDropdown.appendChild(option);
                        });
                    }

                    function updateMatiereOptions() {
                        var id_classe = classeDropdown.value;
                        fetch('get_matieres.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'id_classe=' + id_classe
                        })
                        .then(response => response.json())
                        .then(data => {
                            matiereDropdown.innerHTML = '';
                            data.forEach(function (matiere) {
                                var option = document.createElement('option');
                                option.value = matiere.id_matiere;
                                option.textContent = matiere.nom_matiere;
                                matiereDropdown.appendChild(option);
                            });
                        });
                    }

                    filiereDropdown.addEventListener('change', function() {
                        updateNiveauClasseOptions();
                        updateMatiereOptions();
                    });

                    niveauDropdown.addEventListener('change', updateMatiereOptions);
                    classeDropdown.addEventListener('change', updateMatiereOptions);

                    updateNiveauClasseOptions();
                });
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
                         
</body>
</html>
