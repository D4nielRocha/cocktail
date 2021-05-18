<?php 

$username = '';

if(isset($_POST['submit'])){

    setcookie('gender', $_POST['gender'], time() + 86400);

    session_start();

    $username = $_SESSION['name'] = $_POST['username'];

    header('Location: cocktails.php');

 

}
    


?>



<?php include ('partials/header.php') ?>


    <main>
        <form action=" <?php echo $_SERVER['PHP_SELF'] ?> " method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $username ?>">

            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
           

            <input class="btn btn-md btn-dark" type="submit" name="submit" value="SUBMIT">
        </form>
    </main>


<?php include ('partials/footer.php') ?>