<?php 


    include ('./db/db_config.php');

    session_start();

    if($_SERVER['QUERY_STRING'] == 'noname'){
        unset($_SESSION['name']);
    }

    $name = $_SESSION['name'] ?? 'Guest';


    //get cookie 

    $gender = $_COOKIE['gender'] ?? 'Unknown';


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    </head>
    <title>Cocktail Library</title>
 
    <body>

            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Cocktail Library</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="add.php">Add Cocktails</a>
                        <a class="nav-link" href="cocktails.php">Show Cocktails</a>
                        <p class=" nav-link text-white" >Logged in as: <?php echo htmlspecialchars($name)?> - <?php echo htmlspecialchars($gender) ?> </p>
                    </div>
                    
                    </div>
                </div>
            </nav>

            