<?php
session_start();
$titre = "Gestions_admins";
include('includes/header.php');
include('includes/database.php');
?>


<main class="admin mb-5">
<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $admin = htmlspecialchars($_GET['id']);
        $q = "DELETE FROM user WHERE id=:id";
        $req = $db->prepare($q);
        $req->execute(['id' => $admin]);
        if($req){
            $q = "DELETE FROM role WHERE name=:id";
            $req = $db->prepare($q);
            $req->execute(['id' => $admin]);
        }
    }
if(isset($_GET['id']) && !empty($_GET['id'])){
        $admin = htmlspecialchars($_GET['id']);
        $q = "DELETE FROM attraction WHERE id=:id";
        $req1 = $db->prepare($q);
        $req1->execute(['id' => $admin]);
    }
$select  = "SELECT * FROM user WHERE role = 1 or role = 2";
$req = $db->prepare($select);
          $req->execute();
// $users = $req->fetchAll(PDO::FETCH_ASSOC);
if (isset($_GET['message']) && !empty($_GET['message'])) {
echo '<p class="alert alert-' . $_GET['type'] . '" role="alert">' . htmlspecialchars($_GET['message']) . '</p>';
}
echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">lastname</th>
                <th scope="col">firstname</th>
                <th scope="col">mail</th>
                <th scope="col">password</th>
                <th scope="col">verified</th>
                <th scope="col">role</th>
                <th scope="col">action</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="ajoutAdmin.php" method="post">
                <td><input type="text" name="lastname" placeholder="lastname"></td>
                <td><input type="text" name="firstname" placeholder="firstname"></td>
                <td><input type="email" name="mail" placeholder="mail"></td>
                <td><input type="text" name="password" placeholder="password"></td>
                <td><input type="number" name="verified" placeholder="verified" max="1" min="0"></td>
                <td><input type="number" name="role" placeholder="role" max="3" min="1"></td>
                <td><input class="btn btn-primary"  type="submit" value="ajouter"></td>
                </form>';
foreach ($req as $user){
$id = $user['id'];
    echo '<tr>
        <td>' . ' <input type="text" value="' . $user['lastname'] . '">  </td>
        <td>' . ' <input type="text" value="' . $user['firstname'] . '"</td>
        <td>' . ' <input type="text" value="' . $user['mail'] . '"</td>
        <td>' . ' <input type="text" value="' . $user['password'] . '"</td>
        <td>' . ' <input type="number" max="1" min="0" value="' . $user['verified'] . '"</td>
        <td>' . ' <input type="number" max="3" min="1" value="' . $user['role'] . '"</td>
        <td>
            <a class="btn btn-danger" href="admin.php?id=' . $id .  '&message=Administrateur supprimé&type=danger" >Delete </a>
            <a  class="btn btn-success" href="update.php?mail=' . $id .'">update </a>
</td>
    </tr>';
}
echo '</tbody>
      </table>';

if (isset($_GET['message1']) && !empty($_GET['message1'])) {
echo '<p class="alert alert-' . $_GET['type'] . '" role="alert">' . htmlspecialchars($_GET['message1']) . '</p>';
}
echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">required-age</th>
                <th scope="col">reparation</th>
                <th scope="col">type</th>
                <th scope="col">image</th>
                <th scope="col">action</th>


            </tr>
        </thead>
         <tbody>
            <tr>
                <form action="ajoutAttraction.php" method="post" enctype="multipart/form-data">
                <td><input type="text" name="name" placeholder="name"></td>
                <td><input type="text" name="required_age" placeholder="required-age"></td>
                <td><input type="text" name="reparation" placeholder="reparation"></td>
                <td><input type="text" name="type" placeholder="type"></td>
                <td><input type="file" name="image" placeholder="image"></td>
                <td><input class="btn btn-primary" type="submit" value="ajouter"></td>
                </form>';
                $q = "SELECT * FROM attraction";
        $req1 = $db->prepare($q);
        $req1->execute();
                foreach ($req1 as $attraction){
$id = $attraction['id'];
    echo '<tr>
        <td>' . ' <input type="text" value="' . $attraction['name'] . '">  </td>
        <td>' . ' <input type="text" value="' . $attraction['required_age'] . '"</td>
        <td>' . ' <input type="text" value="' . $attraction['reparation'] . '"</td>
        <td>' . ' <input type="text" value="' . $attraction['type'] . '"</td>
        <td>' . ' <input type="file"' . $attraction['image'] . '"</td>
        <td>
            <a class="btn btn-danger" href="admin.php?id=' . $id .  '&message1=Attraction supprimée&type=danger" >Delete </a>
            <a class="btn btn-success" href="updateAttraction.php?name=' . $id .'">update </a>
</td>
    </tr>';
}
echo '</tbody>
      </table>';
?>
<button type='submit' class="btn btn-success"><a class="text-white" href='note.php'>avis</a></button>
<button type='submit' class="btn btn-primary"><a class="text-white" href='Billet.php'>ajout billet</a></button>
</main>

 <?php include('includes/footer.php'); ?>
