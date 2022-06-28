<?php
session_start();
    function checkAuth(){
        if ($_POST['login'] !== '' && $_POST['password'] !== ''){
            $login = $_POST['login'];
            $password = $_POST['password'];
            try {
                $db = new PDO('mysql:host=localhost;dbname=crud', 'admin', 'admin1234');
                $sql_query = "SELECT * FROM `user` WHERE email = '$login' AND password = '$password'";
                $query = $db->prepare($sql_query);
                $query->execute();
                $res = $query->fetch(PDO::FETCH_ASSOC);
                if ($res) {
                    header('Location: ../view/index.php');
                    $_SESSION['nom']= $res['nom'];
                    $_SESSION['id']= $res['id'];
                    $_SESSION['email']= $res['email'];
                    $_SESSION['prenom']= $res['prenom'];
                    $_SESSION['metier']= $res['metier'];
                    $_SESSION['salaire']= $res['salaire'];
                    $_SESSION['role']= $res['role'];
                } else {
                    echo 'Erreur de login ou mdp';
                }
            } catch (PDOException $e){
            exit($e->getMessage()); 
        }
    }
}
checkAuth();
?>