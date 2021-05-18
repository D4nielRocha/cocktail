<?php 
    
    include ('partials/header.php');
    include ('./db/db_config.php');

    $name = $email = $ingredients = $image = $history = "";
    $error=['name'=>'', 'email'=>'', 'ingredients'=>'', 'image'=>'', 'history'=>''];

    //check name

    if(isset($_POST)){
       if(empty($_POST['name'])){
           $error['name'] = "Please enter a name";
       } else {
           $name = ($_POST['name']);
           if(!preg_match('/^[a-zA-z\s]+$/', $name)){
            $error['name'] = "Please enter a valid name - Only letters and spaces";
            }
       }

       //check email

       if(empty($_POST['email'])){
           $error['email'] = "Please enter an email";
       } else {
           $email = $_POST['email'];
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email'] = "Please enter a valid email address";

           }
       }

       //check ingredients

    if(empty($_POST['ingredients'])){
        $error['ingredients'] = "Please enter your ingredients";
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $error['ingredients'] = "Plase enter comma separated ingredients, please!";
            }
        }  

        //checks image
        if(empty($_POST['image'])){
            $error['image'] = "Please enter a image";
            } else {
                $image = $_POST['image'];
                // if(!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $ingredients)){
                //     $error['ingredients'] = "Plase enter comma separated ingredients, please!";
                // }
            }

            //checks history
        if(empty($_POST['history'])){
            $error['history'] = "Please enter your history";
            } else {
                $history = $_POST['history'];
                // if(!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $history)){
                //     $error['history'] = "Plase enter a history, please!";
                // }
            }
    }


    //check error and redirect

    if(array_filter($error)){
        // echo "Erros in the form";
    } else {



        $email = mysqli_real_escape_string($dbConn, $_POST['email']);
        $name = mysqli_real_escape_string($dbConn, $_POST['name']);
        $ingredients = mysqli_real_escape_string($dbConn, $_POST['ingredients']);
        $image = mysqli_real_escape_string($dbConn, $_POST['image']);
        $history = mysqli_real_escape_string($dbConn, $_POST['history']);

        $SAVE_COCKTAIL = "INSERT INTO cocktails(name,email,ingredients,image,history) VALUES('$name','$email','$ingredients','$image','$history');";
 
        //save to db and check

        if(mysqli_query($dbConn, $SAVE_COCKTAIL)){
            header('Location: cocktails.php');
        } else {
            echo 'Error saving to DB: ' . mysqli_error($dbConn);
        }

    }
    

?>

<main>
    <h1>ADD PAGE</h1>

    <form action="add.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Cocktail Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name)?>">
            <?php if(strlen($error['name'] > 0)): ?>
                <div class="error">
                    <p><?php echo htmlspecialchars($error['name']) ?></p>
                </div>
                <?php else: ?>
                <div class="check">
                    <p><?php echo "Looks Good!" ?></p>
                </div>
                <?php endif ?>
            
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <?php if(strlen($error['email'] > 0)): ?>
                <div class="error">
                    <p><?php echo htmlspecialchars($error['email']) ?></p>
                </div>
                <?php else: ?>
                <div class="check">
                    <p><?php echo "Looks Good!" ?></p>
                </div>
                <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients:</label>
            <textarea name="ingredients" cols="5" rows="5" class="form-control" id="ingredients"><?php echo htmlspecialchars($ingredients)?></textarea> 
            <?php if(strlen($error['ingredients'] > 0)): ?>
                <div class="error">
                    <p><?php echo htmlspecialchars($error['ingredients']) ?></p>
                </div>
                <?php else: ?>
                <div class="check">
                    <p><?php echo "Looks Good!" ?></p>
                </div>
                <?php endif ?> 
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">image:</label>
            <input type="text" name="image" cols="5" rows="5" class="form-control" id="image"><?php echo htmlspecialchars($image)?></textarea> 
            <?php if(strlen($error['image'] > 0)): ?>
                <div class="error">
                    <p><?php echo htmlspecialchars($error['image']) ?></p>
                </div>
                <?php else: ?>
                <div class="check">
                    <p><?php echo "Looks Good!" ?></p>
                </div>
                <?php endif ?> 
        </div>

        <div class="mb-3">
            <label for="history" class="form-label">History:</label>
            <textarea name="history" cols="5" rows="5" class="form-control" id="history"><?php echo htmlspecialchars($history)?></textarea> 
            <?php if(strlen($error['history'] > 0)): ?>
                <div class="error">
                    <p><?php echo htmlspecialchars($error['history']) ?></p>
                </div>
                <?php else: ?>
                <div class="check">
                    <p><?php echo "Looks Good!" ?></p>
                </div>
                <?php endif ?> 
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</main>


<?php include ('partials/footer.php') ?>