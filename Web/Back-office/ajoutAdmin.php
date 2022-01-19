<?php
include('includes/database.php');

//Si un des champs est vide
if (!isset($_POST['mail']) || empty($_POST['mail']) || !isset($_POST['lastname'])  || empty($_POST['lastname']) || !isset($_POST['firstname']) || empty($_POST['firstname']) || !isset($_POST['password']) || empty($_POST['password'])){
  header('location:admin.php?message=Remplir tous les champs.&type=danger');
	exit;
}

// Email valide
if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
	header('location:admin.php?message=Email invalide.&type=danger');
	exit;
}


// Vérifer que l'email n'est pas déjà utilisé
$q = "SELECT COUNT(id) AS total FROM user WHERE mail = :mail";
$req = $db->prepare($q);
$req->execute(['mail' => $_POST['mail']]);
$resultat = $req->fetch(PDO::FETCH_ASSOC);
if($resultat['total'] != 0){
	header('location:admin.php?message=Cet email est déjà utilisé.&type=danger');
	exit;
}

// Ajout de l'utilisateur à la base de données
$q = "INSERT INTO user (lastname,firstname,mail,password) VALUES (:lastname, :firstname, :mail,:password)";
$req = $db->prepare($q);
$reponse = $req->execute([
	'lastname' => $_POST['lastname'],
	'firstname' => $_POST['firstname'],
  	'mail' => $_POST['mail'],
	"password" =>  hash('sha256', $password)

]);

if ($reponse){
  // Ajout du role de l'utilisateur
  $q = "INSERT INTO role (name) VALUES ('user')";
  $req = $db->prepare($q);
  $reponse = $req->execute(['id' => $_POST['id']]);
  if ($reponse){
    header('location:admin.php?message=Administrateur crée avec succès.&type=success');
    exit;
  }
}
?>
