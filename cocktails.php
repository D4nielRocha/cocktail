
   <?php 
   
   include('./db/db_config.php');
    $name = "Cocktail Library";


    //SQL GET_COCKTAILS QUERY
    $GET_COCKTAILS = "SELECT * FROM cocktails ORDER BY created_at";

    $result = mysqli_query($dbConn, $GET_COCKTAILS);

    $cocktails = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free memory
    mysqli_free_result($result);

    //close connection
    mysqli_close($dbConn);
?>
   
   
   <?php include ('partials/header.php') ?>


<main>
    <h1>Cocktails page</h1>
                <div class="row display mx-auto">
                    <?php foreach($cocktails as $cocktail): ?>
                    <div class="col-4" >
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-cocktail"></i> <?php echo htmlspecialchars($cocktail['name']) ?>  </h5>
                                <div class="ingredients">
                                <p class="card-text">Ingredients:</p>
                                <ul>
                                    <?php foreach(explode(',', $cocktail['ingredients']) as $item): ?>
                                        <li> <?php echo $item ?> </li>
                                        <?php endforeach ?>
                                </ul>
                                </div>
                                
                                <a href="details.php?id=<?php echo $cocktail['id']?>" class="btn btn-light">See details...</a>
                            </div>
                        </div>
                    </div>  
                    <?php endforeach ?>              
                </div>   
</main>


<?php include ('partials/footer.php') ?>