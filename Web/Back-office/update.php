
<?php
session_start();
include('includes/database.php');
include('includes/header.php');
$select ='SELECT * FROM user WHERE id =:id';
$req = $db->prepare($select);
          $req->execute(["id"=>$_GET['mail']]);
// $users = $req->fetchAll(PDO::FETCH_ASSOC);
if (isset($_GET['message']) && !empty($_GET['message'])) {
echo '<p class="alert alert-' . $_GET['type'] . '" role="alert">' . htmlspecialchars($_GET['message']) . '</p>';
}
foreach ($req as $user){
echo'
<form action="updateAdmin.php" method="POST" enctype="multipart/form-data">
          <input type="text" name="lastname" value=" ' . $user["lastname"] . '">
          <input type="text" name="firstname" value=" ' . $user["firstname"] . '">
          <input type="text" name="mail" value=" ' . $user["mail"] . '">
          <input type="text" name="password" value=" ' . $user["password"] . '">
          <input type="number" name="role" max ="3" min="1" value="' . $user["role"] . '">
          <input type="submit" value="update">
          <input type="hidden" name="id" value=" '. $_GET["mail"] .' ">
</form>';
}

?>
<?php include('includes/footer.php');?>
