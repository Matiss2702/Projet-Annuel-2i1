<?php
include('includes/database.php');

$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$q = 'SELECT * FROM user WHERE password = :password AND mail = :mail';
$req = $db->prepare($q);
$req->execute([
  "password" => hash('sha256',$password),
  "mail" => $mail
]);
foreach ($req as $row) {
  $id=$row['id'];
}

$q = 'SELECT * FROM user WHERE password = :password AND mail = :mail AND verified=1';
$req = $db->prepare($q);
$req->execute([
  "password" => hash('sha256',$password),
  "mail" => $mail
]);
$user = $req->fetchAll(PDO::FETCH_ASSOC);

if(count($id) == 0){
header('location: connexion.php?msg=Identifiants incorrects');
  exit();
  }
    else {
$q = 'SELECT role from user where mail =:mail';
$req = $db->prepare($q);
$req->execute([
  'mail'=> $mail
]);
$donnees = $req->fetch();
// var_dump($result);
if ($donnees['0']==3){
  session_start();

 $_SESSION["id"]=$id;
header('location: admin.php');
exit();
}

 else {
$q = 'SELECT role from user where mail =:mail';
$req = $db->prepare($q);
$req->execute([
  'mail'=> $mail
]);
$donnees = $req->fetch();
// var_dump($result);
if ($donnees['0']==2){
  session_start();

 $_SESSION["id"]=$id;
header('location: admin.php');
exit();
}
else{

session_start();

 $_SESSION["id"]=$id;
//  var_dump($_SESSION["user"]);
   header('location:index.php');
  exit(); // Arrêt du code

}
    }

  }



?>
