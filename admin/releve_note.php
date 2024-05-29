<?php
include "../connexion2.php";

if (isset($_GET['id_etudiant'])) {
    $id_etudiant = $_GET['id_etudiant'];

    // Sélectionner les informations de l'étudiant
    $etudiant_info = $connexion->query("
        SELECT et.nom AS nom_etudiant, et.prenom AS prenom_etudiant, cl.nom_classe, nv.nom_niveau, fil.nom_filiere
        FROM etudiant et
        JOIN classe cl ON et.id_classe = cl.id_classe
        JOIN niveau nv ON et.id_niveau = nv.id_niveau
        JOIN filiere fil ON et.id_filiere = fil.id_filiere
        WHERE et.id_etudiant = '$id_etudiant'
    ");
    if ($etudiant_info) {
        $etudiant = $etudiant_info->fetch();
        $nom_etudiant = $etudiant['nom_etudiant'];
        $prenom_etudiant = $etudiant['prenom_etudiant'];
        $nom_classe = $etudiant['nom_classe'];
        $nom_niveau = $etudiant['nom_niveau'];
        $nom_filiere = $etudiant['nom_filiere'];
    }

    // Sélectionner les notes de l'étudiant pour toutes les matières et semestres
    $result = $connexion->query("
        SELECT note.note, m.nom_matiere, m.id_matiere, s.nom_semestre
        FROM note 
        JOIN matiere m ON note.id_matiere = m.id_matiere
        JOIN semestre s ON note.id_semestre = s.id_semestre
        WHERE note.id_etudiant = '$id_etudiant'
    ");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Affichage des Notes</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Étudiant: <?php echo htmlspecialchars($nom_etudiant . " " . $prenom_etudiant); ?></h2>
    <p><strong>Classe:</strong> <?php echo htmlspecialchars($nom_classe); ?></p>
    <p><strong>Niveau:</strong> <?php echo htmlspecialchars($nom_niveau); ?></p>
    <p><strong>Filière:</strong> <?php echo htmlspecialchars($nom_filiere); ?></p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Matière</th>
                    <th>Note</th>
                    <th>Semestre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($result) && $result) {
                    while ($ligne = $result->fetch()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($ligne['nom_matiere']) . "</td>";
                        echo "<td>" . htmlspecialchars($ligne['note']) . "</td>";
                        echo "<td>" . htmlspecialchars($ligne['nom_semestre']) . "</td>";
                        echo "<td><a class='btn btn-primary btn-sm' href='editer_note.php?id_etudiant=" . htmlspecialchars($id_etudiant) . "&id_matiere=" . htmlspecialchars($ligne['id_matiere']) . "'><i class='bx bx-edit'></i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune note trouvée.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="note_classe.php" class="btn btn-primary">Retour</a>
        <button onclick="window.print()" class="btn btn-secondary">Imprimer</button>
    </div>
</div>

<!-- Bootstrap JS (optionnel, si nécessaire) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
