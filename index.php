<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Modules</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
        
        <div class="row">
            <?php 
                // Inclure la page de connexion
                include_once "connexion.php";

                // Requête pour afficher la liste des modules
                $req = mysqli_query($con, "SELECT * FROM module");
                
                if(mysqli_num_rows($req) == 0){
                    // S'il n'y a pas encore de modules dans la base de données, afficher ce message :
                    echo "Il n'y a pas encore de modules ajoutés !" ;
                    
                } else {
                    // Si non, afficher la liste de tous les modules sous forme de cartes
                    while($row = mysqli_fetch_assoc($req)){
                        ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <label >Nom du module:</label>
                                        <h5 class="card-title"><?=$row['titre']?></h5>
                                    <label >Professeur:</label>
                                        <h6 class="card-subtitle mb-2 text-muted"><?=$row['professeur']?></h6>
                                    <label >Numéro du module:</label>
                                        <h6 class="card-subtitle mb-2 text-muted"><?=$row['numéro']?></h6>
                                    <label >Description:</label>
                                        <p class="card-text"><?=$row['description']?></p> 
                                    <ul class="social mb-0 list-inline mt-3">
                                        <li class="list-inline-item"><a href="modifier.php?id=<?=$row['module_id']?>" class="card-link"><i class='bx bxs-edit-alt'></i></a></li>
                                        <li class="list-inline-item"><a href="supprimer.php?id=<?=$row['module_id']?>" class="card-link"><i class='bx bxs-trash-alt'></i></a></li>
  
                                    </ul>
                                  
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
