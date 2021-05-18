<?php 

    include('./db/db_config.php');


    if(isset($_GET['id'])){
        $id =  mysqli_real_escape_string($dbConn, $_GET['id']);


        $GET_BY_ID = "SELECT * FROM cocktails WHERE id = $id";

        $result = mysqli_query($dbConn, $GET_BY_ID);

        $cocktail = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

        mysqli_close($dbConn);

        

    } else {
        echo "DB CONNECTION FAILED: " . mysqli_error($dbConn);
    }

    //sql query



    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($dbConn, $_POST['id_to_delete']);

        //sql
        $DELETE_COCKTAIL = "DELETE FROM cocktails WHERE id = $id";


        if(mysqli_query($dbConn, $DELETE_COCKTAIL)){
            
            header("Location: cocktails.php");



        } else {
            echo "DB ERROR: " . mysqli_error($dbConn);
        }

    }

?>




<?php include ('partials/header.php') ?>


<main class="details">
    <div class="card text-center cocktail-details">
    <div class="card-body">
        <h2 class="card-title"><i class="fas fa-cocktail"></i> <?php echo htmlspecialchars($cocktail['name'])?></h2>
        <div class="image">
            <img src="<?php echo htmlspecialchars($cocktail['image']) ?>" alt="<?php echo htmlspecialchars($cocktail['name'])?>">
        </div>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        <div class="recipe">
        <p><strong>Recipe:</strong></p>
        <ul>
            <?php foreach(explode(',', $cocktail['ingredients']) as $item): ?>
                <li> <?php echo htmlspecialchars($item) ?> </li>
                <?php endforeach ?>
        </ul>
        </div>
    </div>
    <div class="buttons">
        <form action="details.php" method="POST" >
        <input type="hidden" name="id_to_delete" value="<?php echo $cocktail['id']?>">
        <input  class="btn btn-md btn-danger mb-3" name="delete" value="Delete" id="delete" type="submit">
        </form>
        <a href="update.php?id=<?php echo $cocktail['id'] ?>" class="btn btn-md btn-info text-white mb-3">Edit</a>

    </div>
    <div class="card-footer text-muted">
        Create at: <?php echo htmlspecialchars($cocktail['created_at']) ?><br/>
        by: <?php echo htmlspecialchars($cocktail['email']); ?>

    </div>
    </div>
    <div class="history">
            <h1> <?php echo $cocktail['name'] ?> </h1>
            <p> <?php echo $cocktail['history'] ?> </p>
    </div>
</main>

<?php include ('partials/footer.php') ?>