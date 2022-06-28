<?php
    if($_POST['email'] && $_POST['prenom']&& $_POST['nom'] && $_POST['metier'] && $_POST['salaire'] && $_POST['password'] ){
          $prenom = $_POST['prenom'];
          $password = $_POST['password'];
          $nom = $_POST['nom'];
          $metier = $_POST['metier'];
          $email = $_POST['email'];
          $salaire = $_POST['salaire'];
          $role = "user";
          $db = new PDO('mysql:host=localhost;dbname=crud','admin','admin1234');
          $sql = "SELECT * FROM `user`";
          $result = $db->prepare($sql);
          $result->execute();
          $row=$result->fetch(PDO::FETCH_ASSOC);

          $sql = "INSERT INTO `user` (nom, prenom, email, password, metier, salaire, role) VALUES ('$nom', '$prenom', '$email', '$password', '$metier', '$salaire', '$role')";
          $query = $db->prepare($sql);
          $result = $query->execute();
          if($result){
              header('Location: ../view/admin.php');
          }else{
              echo "Erreur dans l'éxécution de la requete";
          }
      }
      else{
      echo "Veuillez remplir les champs";
    }

?>