<?php

	include("includes/database.php");

			$mail = $_POST['mail'];
			$firstname = $_POST['firstname'];
			$lastname= $_POST['lastname'];
			$role = $_POST['role'];
			$verified = $_POST['verified'];
      $password = $_POST['password'];
			$id = $_POST['id'];

			$q = "UPDATE user SET  firstname =:firstname, lastname=:lastname, role=:role, mail=:mail,password=:password,verified=:verified where id=:id";
			$req = $db->prepare($q);
			$result =$req->execute([
			    'mail' => $mail,
					'firstname' => $firstname,
					'lastname' => $lastname,
					'role' => 	$role ,
					'verified'=>$verified,
         	"password" =>  hash('sha256', $password),
					 "id" => $id
 			]);

			if($result){
				header("location:admin.php?message= modification reussi &type=success");
					exit;
			}
			else{
				echo 'Votre requete n est pas bonne.';
			}

