<?php

session_start();
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$password = isset($_POST['password']) ? $_POST['password']: '';
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
	// Redirection vers la page d'inscription avec un message d'erreur
	header('location:inscription.php?message=Email invalide.');
	exit; // Arrêt du code
}
include('includes/database.php');
$q = "SELECT COUNT(mail) AS total FROM user WHERE mail = :mail";
$req = $db->prepare($q);
$req->execute([
    'mail' => $_POST['mail']
]);

$resultat = $req->fetch(PDO::FETCH_ASSOC);
if($resultat['total'] != 0){
    // Redirection vers la page d'inscription avec un message d'erreur
    header('location:inscription.php?message=Cet email est déjà utilisé.&type=danger');
    exit; // Arrêt du code
}
$user= [
	"firstname" => $firstname,
	"lastname" => $lastname,
	'mail' => $mail,
  'birthdate'=>$birthdate,
	"password" =>  hash('sha256', $password)
];

$q = "INSERT INTO user (firstname,lastname,mail,birthdate,password) VALUES (:firstname,:lastname,:mail,:birthdate,:password)";
$req = $db->prepare($q);
$insert=$req->execute($user);

if ($insert){
	$hash= sha1($mail);
	$q ='SELECT id FROM user WHERE mail=:mail';
	$req = $db->prepare($q);
  $req->execute(['mail' => $mail]);
	$data=$req->fetch(PDO::FETCH_ASSOC);
	$hash=$data['id'].'-'.$hash;
	$to= $mail;
	$subject=" Email Verification";
	$headers= "From: matiss.haillouy@gmail.com"."\r\n"."MINE-VERSION: 1.0 ". "\r\n"."Content-type:text/html;charset=UTF-8"."\r\n";
	$body ="<a  href='127.0.0.1/verif_mail.php?hash=$hash'> enregistré le compte</a>";
  $success =	mail($to,$subject,$body,$headers);
	var_dump($success);
	if($success){

		header('location:index.php?msg=Vous etes connecté !');
		exit;
	}else{
		header('location:failed.php?msg= l\'email n\'a pas etais envoyé! ');
	}
}else{
	header('location:failed.php?msg= l\'adresse mail n\'exite pas! ');
}

// $q = 'SELECT role FROM user WHERE mail = :mail';
// $req = $db->prepare($q);
// $result =$req->execute([
//     'mail' => $_POST['mail']
// ]);



?>
