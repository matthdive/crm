<?php
if ($_POST['prenom'] && $_POST['nom'] && $_POST['email'] && $_POST['password'] && $_POST['metier'] && $_POST['salaire']) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $metier = $_POST['metier'];
    $salaire = $_POST['salaire'];
    $db = new PDO('mysql:host=localhost;dbname=crud', 'admin', 'admin1234');
    $emailQuery = $db->prepare("SELECT * FROM user WHERE email = '$email'");
    $emailQuery->execute();
    $count = $emailQuery->rowCount();

    try {
            if ($count == 0) {
                $role = "user";
                $queryUserData = "INSERT INTO user(nom, prenom, email, password, metier, salaire, role) VALUES ('$nom', '$prenom', '$email', '$password', '$metier', '$salaire', $role)";
                $insertUserData = $db->prepare($queryUserData);
                $insertUserData->execute();
                header('Location: ../view/index.php');
            } else {
            echo "Cet email est deja utilisé";
        } 
            } else {
            echo "Veuillez remplir le formulaiure";
    } catch(Exception $e) {
        echo 'erreur:' .$e->getMessage();
    }
}
?>