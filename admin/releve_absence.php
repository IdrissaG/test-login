<?php
include "../connexion2.php";

if (isset($_GET['id_etudiant'])) {
    $id_etudiant = $_GET['id_etudiant'];

    // Sélectionner les absences de l'étudiant pour toutes les matières
    $result = $connexion->query("
        SELECT a.date_absence, m.nom_matiere, m.id_matiere, et.nom AS nom, et.prenom AS prenom
        FROM absences a
        JOIN etudiant et ON a.id_etudiant = et.id_etudiant
        JOIN matiere m ON a.id_matiere = m.id_matiere
        WHERE a.id_etudiant = '$id_etudiant'
        ORDER BY a.date_absence
    ");

    if ($result) {
        $etudiant_info = $result->fetch();
        if ($etudiant_info) {
            $nom_etudiant = $etudiant_info['nom'];
            $prenom_etudiant = $etudiant_info['prenom'];
        } else {
            echo "<script>alert('Aucune absence trouvée pour cet étudiant.');</script>";
        }
    } else {
        echo "<script>alert('Erreur de requête.');</script>";
    }
} else {
    echo "<script>alert('ID étudiant non fourni.');</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_affiche.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Relevé des Absences</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Relevé des Absences pour <?php echo isset($nom_etudiant) ? $nom_etudiant . " " . $prenom_etudiant : 'Étudiant non trouvé'; ?></h2>
    <div class="d-flex justify-content-between mb-3">
        <a href="gestion_absence2.php" class="btn btn-primary">Retour</a>
        <button onclick="window.print()" class="btn btn-primary">Imprimer</button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date d'Absence</th>
                    <th>Matière</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($result) && $result && $etudiant_info) {
                    do {
                        echo "<tr>";
                        echo "<td>{$etudiant_info['date_absence']}</td>";
                        echo "<td>{$etudiant_info['nom_matiere']}</td>";
                        echo "</tr>";
                    } while ($etudiant_info = $result->fetch());
                } else {
                    echo "<tr><td colspan='2'>Aucune absence trouvée.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS (optionnel, si nécessaire) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
