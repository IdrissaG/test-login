<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style-menu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main-section.css">
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
        <h1>Acceuil</h1>
        <div class="insights">
          <div class="sales">
          <i class="bx bxs-grid-alt"></i>
          <div class="middle">
            <div class="left">
                <h3>Etudiant</h3>
                <?php
                include "../connexion2.php";
                 $req=$connexion->query("SELECT COUNT(*) AS total_etudiants FROM etudiant");
                 if($req){
                    $req1 = $req->fetch(PDO::FETCH_ASSOC);
                 }
                 ?>
                <h1><?php echo $req1['total_etudiants'] ?></h1>
            </div>
          </div>
          <small class="text-muted">Derniere 24 heures</small>
          </div>
          
          <div class="expenses">
          <i class="bx bxs-grid-alt"></i>
          <div class="middle">
            <div class="left">
                <h3>Niveaux</h3>
                <h1>5</h1>
            </div>
          </div>
          <small class="text-muted">Derniere 24 heures</small>
          </div>

          <div class="income">
          <i class="bx bxs-grid-alt"></i>
          <div class="middle">
            <div class="left">
                <h3>Enseignant</h3>
                <?php 
                $req_en = $connexion->query("SELECT COUNT(*) AS total_enseignant FROM enseignant");
                if($req_en){
                $req_en2= $req_en->fetch(PDO::FETCH_ASSOC);
                }
                ?>
                <h1><?php echo $req_en2['total_enseignant'] ?></h1>
            </div>
          </div>
          <small class="text-muted">Derniere 24 heures</small>
          </div>  
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
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var totalEnseignant = document.getElementById('total_enseignant').textContent;
            var maxEnseignant = 100; // Change this to the maximum value you want to represent
            var percentage = (totalEnseignant / maxEnseignant) * 100;

            // Calculate the stroke-dasharray
            var circle = document.querySelector('.circle-fg');
            var radius = circle.r.baseVal.value;
            var circumference = 2 * Math.PI * radius;
            circle.style.strokeDasharray = `${(percentage / 100) * circumference} ${circumference}`;
            
            // Update the percentage text
            document.getElementById('percentage').textContent = `${Math.round(percentage)}%`;
        });
    </script>
</html>