<?php
session_start();

    if (!isset($_SESSION['email'])){
        header('Location: login.php');
    }
    elseif ($_SESSION['role'] !== 'admin') {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>createForm</title>
</head>
<body>
    <form action="../controller/createUser.php" method="post">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg "required='required'/>
                                    <label class="form-label">Email</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="prenom" class="form-control form-control-lg" required='required'/>
                                    <label class="form-label">Prenom</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="nom" class="form-control form-control-lg" required='required'/>
                                    <label class="form-label">Nom</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="metier" class="form-control form-control-lg" required='required'/>
                                    <label class="form-label">Métier</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="number" name="salaire" class="form-control form-control-lg" required='required'/>
                                    <label class="form-label">Salaire</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" required='required'/>
                                    <label class="form-label">Password</label>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>