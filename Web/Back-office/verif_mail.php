<?php
  include('includes/database.php');

	$id= (int)substr($_GET['hash'], 0, strpos($_GET['hash'],'-'));
  $q = "UPDATE user SET  verified=1  where id=:id";
	$req = $db->prepare($q);
  $req->execute(['id'=>$id]);


?>
 <?php include('includes/header.php');?>

    <h1>Votre mail a bien été confirmé</h1>
    <a href="index.php">retour au menu </a>
<?php include('includes/footer.php');?>
