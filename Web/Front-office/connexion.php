
<?php
include('../includes/database.php');
include('../includes/header.php');
?>

      <div name="connexion" class="mt-5">
				<form class="mx-auto" style="width: 300px;" action="../back-office/connexion_check.php" method="post" enctype="multipart/form-data">
					<div class="mb-3 d-grid text-center form-group">
						<label for="exampleInputemail1" class="form-label">Email address</label>
						<input class="form-control" type="email" name="mail" placeholder="Votre email" required>
						<div id="emailHelp" class="form-text"></div>
					</div>
         	<div class="mb-3 d-grid text-center form-group">
						<label for="exampleInputpassword1" class="form-label">Password</label>
						<input class="form-control" type="password" name="password" placeholder="Votre mot de passe"  required>
					</div>
					<input type="submit" class="btn btn-primary d-flex mx-auto" value="se connecter">
				</form>
				</div>
<?php
if (isset($_GET ['msg'])&&!empty($_GET['msg']))
echo $_GET['msg'];
?>
<?php include('includes/footer.php');?>


