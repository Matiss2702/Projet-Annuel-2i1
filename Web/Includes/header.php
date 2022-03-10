<html lang="fr">

<head>
 <link rel="stylesheet" href="../CSS/bootstrap.min.css">
   <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">

<title>NAINGUI</title>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <a class="navbar-brand mx-3" href="/">
      <img src="../images/noelle.png" width="20" height="20" fill="none"
        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><a
          class="text-white" href='index.php'>
          <path
            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
          <circle cx="12" cy="13" r="4" />
        </a></img>
      <strong>NAINGUI</strong>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-3">
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../back-office/panier.php">Panier <span
              class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav d-flex justify-content-end">
        <?php  if(isset($_SESSION['id'])){
            echo '<li class="nav-item"><a class="nav-link" href="../back-office/profil.php">profil</a></li>';
            echo '<li class="nav-item"><a class="nav-link"  href="../back-office/deconnexion.php">Déconnexion</a></li>';
          }else{
            echo '<li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>';
          }?>
      </ul>
    </div>
  </nav>
</header>