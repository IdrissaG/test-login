<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu_hori.css">
    <link rel="stylesheet" href="../css/style-menu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style_affiche.css">
    <link rel="stylesheet" href="../css/main-section.css">
    <link rel="stylesheet" href="../css/style-inscription.css">
    <link rel="stylesheet" href="../css/select_design.css">
   
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bxl-codepen"></i>
                <span>University</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="user">
          <img src="../images/user-regular-24.png" alt="image-utlisateur" class="user-img">
          <div>
            <p class="bold">Idrissa</p>
            <p>Administrateur</p>
          </div> 
        </div>
        <ul>
            <li>
             <a href="admin.php">
                <i class="bx bxs-grid-alt"></i>
                <span class="nav-item">Acceuil</span>
             </a>
             <span class="tooltip">Acceuil</span>
            </li>
            <li>
             <a href="inscription.php">
                <i class="bx bx-body"></i>
                <span class="nav-item">Etudiants</span>
             </a>
             <span class="tooltip">Etudiants</span>
            </li>
            <li>
             <a href="inscription_en.php">
             <i class='bx bx-user-plus'></i>
                <span class="nav-item">Enseignants</span>
             </a>
             <span class="tooltip">Enseignants</span>
            </li>
            <li>
             <a href="ajouter_matiere.php">
             <i class='bx bxs-book-bookmark'></i>
                <span class="nav-item">Matiere</span>
             </a>
             <span class="tooltip">Matiere</span>
            </li>
            <li>
             <a href="notes.php">
             <i class='bx bxs-graduation'></i>
                <span class="nav-item">Notes</span>
             </a>
             <span class="tooltip">Notes</span>
            </li>
            <li>
             <a href="paiement.php">
             <i class='bx bx-money-withdraw'></i>
               
                <span class="nav-item">Paiements</span>
             </a>
             <span class="tooltip">Paiements</span>
            </li>
            <li>
             <a href="gestion_absences.php">
             <i class='bx bxs-time-five'></i>
               
                <span class="nav-item">Absences</span>
             </a>
             <span class="tooltip">Absences</span>
            </li>
            <li>
             <a href="../logout.php">
             <i class="bx bx-log-out"></i>
                <span class="nav-item">Se Deconnecter</span>
             </a>
             <span class="tooltip">Se Deconnecter</span>
            </li>
        </ul>
     </div>
     
<div class="main-content">
    <main>
        <ul class="lu">
            <li class="lis"><a href="gestion_absence2.php">Recherche Etudiant</a></li>
            <li class="lis"><a class="nav_link" href="gestion_absences.php">Recherche  Classe</a></li>
        </ul>

        <div class="container1">
            <form class="form-horizontal" method="post" action="#">
                <div class="input-field">
                    <label for="id_filiere">Filière</label>
                    <select name="id_filiere" id="id_filiere">
                        <option value="1">Ingenierie</option>
                        <option value="2">Management</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="id_niveau">Niveau</label>
                    <select name="id_niveau" id="id_niveau"></select>
                </div>
                <div class="input-field">
                    <label for="id_classe">Classe</label>
                    <select name="id_classe" id="id_classe"></select>
                </div>
                <div class="input-field">
                    <label for="id_matiere">Matière</label>
                    <select name="id_matiere" id="id_matiere"></select>
                </div>
                <button type="submit">Rechercher</button>
            </form>
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
            <div class="results">
                <h3>Résultats de la recherche :</h3>
                <table class="student-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Matière</th>
                            <th>Absence</th>
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "../connexion2.php";
                        
                        $etudiant = false;
                        if (isset($_POST["id_filiere"]) && isset($_POST["id_classe"]) && isset($_POST["id_niveau"]) && isset($_POST["id_matiere"])) {
                            $id_filiere = $_POST['id_filiere'];
                            $id_classe = $_POST['id_classe'];
                            $req1 = $connexion->query("SELECT * FROM classe WHERE nom_classe='$id_classe'");
                            if ($req1) {
                                $value = $req1->fetch();
                                if ($value) {
                                    $id_classe = $value['id_classe'];
                                } else {
                                    echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
                                }
                            } else {
                                echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
                            }
                        
                            $id_niveau = $_POST['id_niveau'];
                            $req2 = $connexion->query("SELECT * FROM niveau WHERE nom_niveau='$id_niveau'");
                            if ($req2) {
                                $value = $req2->fetch();
                                if ($value) {
                                    $id_niveau = $value['id_niveau'];
                                } else {
                                    echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
                                }
                            } else {
                                echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
                            }
                        
                            $id_matiere = $_POST['id_matiere'];
                            $etudiant = $connexion->query("SELECT et.id_etudiant, et.nom, et.prenom, et.cne, m.nom_matiere, m.id_matiere, n.note 
                                                           FROM etudiant et
                                                           LEFT JOIN note n ON et.id_etudiant = n.id_etudiant AND n.id_matiere = '$id_matiere'
                                                           JOIN matiere m ON m.id_matiere = '$id_matiere'
                                                           WHERE et.id_niveau='$id_niveau' AND et.id_classe='$id_classe'");
                        }
                        
                        if ($etudiant) {
                            while ($ligne = $etudiant->fetch()) {
                                $id_etudiant = $ligne['id_etudiant'];
                        
                                // Requête pour compter les absences de l'étudiant
                                $req = $connexion->query("SELECT COUNT(*) AS total_absences FROM absences WHERE id_etudiant=$id_etudiant");
                                $r = $req->fetch();
                                ?>
                                <tr>
                                    <td><?php echo $ligne['id_etudiant']; ?></td>
                                    <td><?php echo $ligne['nom']; ?></td>
                                    <td><?php echo $ligne['prenom']; ?></td>
                                    <td><?php echo $ligne['nom_matiere']; ?></td>
                                    <td><?php echo $r['total_absences'];?></td>
                                    <td><a href="editer_absence.php?id_etudiant=<?php echo $ligne['id_etudiant']; ?>&id_matiere=<?php echo $ligne['id_matiere'];?>"><i class='bx bx-edit'></i></a></td>
                                </tr>
                                <?php
                                
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
<script>
    let btn=document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');
    btn.onclick = function(){
        sidebar.classList.toggle('active');
    };
</script>
</body>
</html>
