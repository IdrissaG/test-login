
<?php
// page.php
include "../connexion2.php";
// Démarre la session

session_start();
// Vérifie si l'utilisateur est connecté
$etudiant=false;
if(isset($_SESSION['login'])){
   $login = $_SESSION['login'];
   $req=$connexion->query("SELECT * FROM utilisateur WHERE login='$login'");
   $value=$req->fetch(PDO::FETCH_ASSOC);
   $nom_etudiant=$value['nom'];
   $prenom_etudiant=$value['prenom'];
   $req1=$connexion->query("SELECT * FROM etudiant WHERE nom='$nom_etudiant'");
   $value2=$req1->fetch(PDO::FETCH_ASSOC);
   $id_etudiant=$value2['id_etudiant'];
   $id_classe=$value2['id_classe'];
   $id_niveau=$value2['id_niveau'];
   $req2=$connexion->query("SELECT * FROM classe WHERE id_classe='$id_classe'");
   $classe=$req2->fetch(PDO::FETCH_ASSOC);
   $nom_classe=$classe['nom_classe'];
   $req3=$connexion->query("SELECT * FROM niveau WHERE id_niveau='$id_niveau'");
   $classe2=$req3->fetch(PDO::FETCH_ASSOC);
   $nom_niveau=$classe2['nom_niveau'];
   $etudiant=$connexion->query("SELECT * FROM absences WHERE id_etudiant='$id_etudiant'");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style-menu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main-section.css">
    <link rel="stylesheet" href="../css/style_affiche.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu sidebar</title>
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
            <p class="bold"><?php echo $nom_etudiant." ".$prenom_etudiant ?></p>
            <p><?php echo $nom_niveau." ".$nom_classe?></p>
            <p>Etudiant</p>
          </div> 
        </div>
        <ul>
            <li>
             <a href="Acceuil.php">
                <i class="bx bxs-grid-alt"></i>
                <span class="nav-item">Acceuil</span>
             </a>
             <span class="tooltip">Acceuil</span>
            </li>
            <li>
             <a href="paiements.php">
             <i class='bx bx-money-withdraw'></i>
                <span class="nav-item">Paiements</span>
             </a>
             <span class="tooltip">Paiements</span>
            </li>
            <li>
             <a href="notes.php">
             <i class='bx bxs-book-content'></i>
                <span class="nav-item">Notes</span>
             </a>
             <span class="tooltip">Notes</span>
            </li>
            <li>
             <a href="absences.php">
             <i class='bx bx-time-five'></i>    
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
        <table class="student-table">
	<thead>
		<tr>
            <th>Matiere</th>
			<th>Date Absence</th>
			<th>Raison</th>
		</tr>
	</thead>
    <tbody>
		<?php
        if($etudiant){ 
            
			while($ligne=$etudiant->fetch()){
                $id_matiere=$ligne['id_matiere'];
                $req32=$connexion->query("SELECT * FROM matiere WHERE id_matiere='$id_matiere'");
                $nom_matiere=$req32->fetch(PDO::FETCH_ASSOC);
		?>
		<tr>
            <td><?php echo $nom_matiere['nom_matiere']; ?></td>
            <td><?php echo $ligne['date_absence']; ?></td>
            <td><?php echo $ligne['raison']; ?></td>
		</tr>
		<?php
			}
        }
		?>
		</tbody>
	</table>
    <button class="mt-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
 onclick="window.print()">Imprimer</button>
        </div>
    </main>
     </div>
     
     
</body>
<script>
    let btn=document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');
    btn.onclick = function(){
        sidebar.classList.toggle('active');
    };
</script>
</html>