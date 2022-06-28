<?php
    function deleteUser(){
        $db = new PDO('mysql:host=localhost;dbname=crud','admin','admin1234');
        $sql = "DELETE FROM user WHERE id = :id";
        try {
            if ($query = $db->prepare($sql)) {
                $query->bindParam(":id", $param_id);
                $param_id = $_POST["id"];
                if ($query->execute()) {
                    header('Location: ../view/admin.php');
                }
            }
        }catch(Exception $e){
            echo 'erreur:' .$e->getMessage();
        }
    }
    deleteUser();
?>