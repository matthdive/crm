<?php
    session_start();
    if($_POST['email'] && $_POST['prenom'] && $_POST['nom'] && $_POST['metier'] && $_POST['salaire']){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $metier = $_POST['metier'];
        $email = $_POST['email'];
        $salaire = $_POST['salaire'];
        $id = $_POST["id"];

        $db = new PDO('mysql:host=localhost;dbname=crud','admin','admin1234');
        $sql = "UPDATE user SET email = '$email', prenom = '$prenom', nom = '$nom', metier = '$metier', salaire = '$salaire' WHERE user.id IN ($id)";
        $query = $db->prepare($sql);
        $query->execute();
        header("Location: ../view/admin.php");
   } else {
       echo "Veuillez remplir les champs";
   }
?>