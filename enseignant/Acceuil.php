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
            <p class="bold">idy</p>
            <p>Enseignant</p>
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
             <a href="#">
                <i class="bx bx-body"></i>
                <span class="nav-item">Services</span>
             </a>
             <span class="tooltip">Services</span>
            </li>
            <li>
             <a href="#">
             <i class='bx bxs-calendar'></i>
                <span class="nav-item">Emploi</span>
             </a>
             <span class="tooltip">Emploi</span>
            </li>
            <li>
             <a href="#">
             <i class='bx bx-money-withdraw'></i>
                <span class="nav-item">Paiements</span>
             </a>
             <span class="tooltip">Paiements</span>
            </li>
            <li>
             <a href="#">
             <i class='bx bx-cog'></i>
                <span class="nav-item">Parametre</span>
             </a>
             <span class="tooltip">Parametre</span>
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
        <div class="date">
            <input type="date">
        </div>
        <div class="insights">
          <div class="sales">
          <i class="bx bxs-grid-alt"></i>
          <div class="middle">
            <div class="left">
                <h3>Etudiant</h3>
                <h1>250</h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx='38' cy='38' r='36'></circle>
                </svg>
                <div class="number">
                    <p>81%</p>
                </div>
            </div>
          </div>
          <small class="text-muted">Last 24 Hours</small>
          </div>
          
          <div class="expenses">
          <i class="bx bxs-grid-alt"></i>
          <div class="middle">
            <div class="left">
                <h3>Niveaux</h3>
                <h1>25</h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx='38' cy='38' r='36'></circle>
                </svg>
                <div class="number">
                    <p>81%</p>
                </div>
            </div>
          </div>
          <small class="text-muted">Last 24 Hours</small>
          </div>

          <div class="income">
          <i class="bx bxs-grid-alt"></i>
          <div class="middle">
            <div class="left">
                <h3>Activites</h3>
                <h1>28</h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx='38' cy='38' r='36'></circle>
                </svg>
                <div class="number">
                    <p>81%</p>
                </div>
            </div>
          </div>
          <small class="text-muted">Last 24 Hours</small>
          </div>

          <div class="income">
          <i class="bx bxs-grid-alt"></i>
          <div class="middle">
            <div class="left">
                <h3>Enseignant</h3>
                <h1>24</h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx='38' cy='38' r='36'></circle>
                </svg>
                <div class="number">
                    <p>81%</p>
                </div>
            </div>
          </div>
          <small class="text-muted">Last 24 Hours</small>
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
</html>