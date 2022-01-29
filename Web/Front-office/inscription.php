<?php include('../includes/header.php');?>

<main>
	<div class="text-center mx-auto" style="width: 300px;">
		<p>
			<?php include('../includes/message.php');?>
		</p>
		<h1>Inscription</h1>
		<form action="../back-office/verif_inscription.php" method="POST" autocomplete="off"
			class="d-grid" enctype="multipart/form-data">
			<div class="form-group mb-3">
				<input type="text" name="firstname" placeholder="Votre Prenom"
					class="form-control" required>
			</div>
			<div class="form-group mb-3">
				<input type="text" name="lastname" placeholder="Votre Nom" class="form-control" required>
			</div>
			<div class="form-group mb-3">
				<input type="date" name="birthdate"
					placeholder="Votre Date de naissance" class="form-control" required>
			</div>
			<div class="form-group mb-3">
				<input type="email" name="mail" placeholder="Votre email" class="form-control" required>
			</div>
			<div class="form-group mb-3">
				<input type="password" name="password" placeholder="Mot de passe" class="form-control"
					required>
			</div>
			<input class="btn btn-primary" type="submit" value="S'inscrire">
		</form>
	</div>
	<script src="script.js"></script>
</main>
<?php include('includes/footer.php');?>
