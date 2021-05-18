<?php 
    $name = "Cocktail Library";





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
    <title>PHP TEST</title>
    <style>
    body{
        overflow: hidden;
    }
    </style>
    <body>



            <div id="landing-header">
                <h1><?php echo htmlspecialchars($name)  ?></h1>
                <a href="cocktails.php" class="btn btn-md btn-danger">View All Cocktails</a>
            </div>
            

            <main>
            <ul class="slideshow">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            </main>


    <?php include ('partials/footer.php') ?>



