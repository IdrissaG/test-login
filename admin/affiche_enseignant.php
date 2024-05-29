<?php
	include "../connexion2.php";
	$etudiant=$connexion->query("select * from enseignant");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu_hori.css">
    <link rel="stylesheet" href="../css/style-menu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main-section.css">
   <link rel="stylesheet" href="../css/style-inscription.css"> 
   <link rel="stylesheet" href="../css/style_affiche.css">
  
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
		<li class="lis" ><a href="inscription_en.php">Ajouter un Enseignant</a></li>
		<li class="lis" ><a class="nav_link" href="affiche_enseignant.php">Liste des Enseignants</a></li>
	</ul>
   <h1 class="h1">Liste des Enseignants</h1>
	<table class="student-table">
	<thead>
		<tr>
        <th>ID</th>
			<th>Nom</th>
			<th>Prenom</th>
         <th>Specialite</th>
			<th>Editer</th>
			<th>Supprimer</th>
		</tr>
	</thead>
    <tbody>
		<?php
			while($ligne=$etudiant->fetch()){
		?>
		<tr>
        <td><?php echo $ligne['id_enseignant']; ?></td>
			<td><?php echo $ligne['nom']; ?></td>
			<td><?php echo $ligne['prenom']; ?></td>
         <td><?php echo $ligne['specialite']; ?></td>
			<td><a href="editer_enseignant.php?id_enseignant=<?php echo $ligne['id_enseignant'];?>"><i class='bx bx-edit'></i></a></td>
			<td><a href="supprimer_enseignant.php?id_enseignant=<?php echo $ligne['id_enseignant'];?>"><i class='bx bx-trash'></i></a></td>
		</tr>
		<?php
			}
		?>
		</tbody>
	</table>
   <button class="mt-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
 onclick="window.print()">Imprimer</button>
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