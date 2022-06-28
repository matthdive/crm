<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=crud', 'admin', 'admin1234');
if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
}
$sqlQuery = 'SELECT * FROM user';
$query = $db->prepare($sqlQuery);
$query->execute();
$res = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
            table {
                border: 2px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
            th, td {
                text-align: left;
                padding: 15px;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRM</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CRM</a>
        </div>
    </nav>
    <div class="col-md-12">
        <br>
        <h1>Dashboard</h1>
        <hr>
        <div class="card card-body">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Metier</th>
                    <th>Salaire</th>
                    <th>#</th>
                </tr>
                <?php foreach ($res as $re) { ?>
                    <tr>
                        <td>
                            <form action="updateForm.php" method="post">
                                <input type="hidden" id="id" name="id" value="<?php echo $re['id'] ?>">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                        <td><?php echo $re['prenom']; ?></td>
                        <td><?php echo $re['nom']; ?></td>
                        <td><?php echo $re['email']; ?></td>
                        <td><?php echo $re['metier']; ?></td>
                        <td><?php echo $re['salaire']; ?> $/Year</td>
                        <td>
                            <form action="../controller/deleteUser.php" method="post">
                                <input type="hidden" id="id" name="id" value="<?php echo $re['id'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <form action="createForm.php" method="post">
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>