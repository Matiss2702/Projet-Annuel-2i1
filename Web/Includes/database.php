<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=funparc', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

}catch(Exception $e){
    die('Erreur : ' . $e->getMessage()); // SI erreur, afficher le message d'erreur
}

?>
