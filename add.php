<?php

//connect to database 
include('connect.php');


//form variables
$email = '';
$title = '';
$ingredients = '';


//to be updated if form contains incorrect format
$errors = ['email'=> '', 'title'=>'', 'ingredients'=>''];



//check to see if POST request has been made
if(isset($_POST['submit'])){ 
    if(empty($_POST['email'])){
        $errors['email'] = 'Email required';
    } else {
        $email = htmlspecialchars($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
        }
    }
    if(empty($_POST['title'])){
       $errors['title'] ='title required';
    } else {
        $title = htmlspecialchars($_POST['title']);
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
            $errors['title']= 'Letters and Spaces only in title <br/>';
        }
    }

    if(empty($_POST['ingredients'])){
        $errors['ingredients']= 'ingredients required <br/>';
    } else {
        $ingredients = htmlspecialchars($_POST['ingredients']);
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            $errors['ingredients']= 'Enter single ingredient or comma separated list <br/>';
        }
    }

    if(!array_filter($errors)){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $incredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        //write sql
        $sql = "INSERT INTO `pizza_pies`(`email`, `title`, `ingredients`) VALUES ('$email','$title','$ingredients')";

        //save to db and check
        if(mysqli_query($conn, $sql)){
            //success
            mysqli_close($conn);
            header('Location: index.php');
        }else {
            //error
            echo 'error'.mysqli_error($conn);
        } 
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">

<?php 
    include('templates/header.php');
    ?>
<section class="container grey-text">
    <h4 class="center">Add a pizza</h4>
    <form action="add.php" class="white" method= "POST" >
        <label for="email">Your Email</label>
        <input type="text" name = "email" value = "<?= $email?>">
        <div class="red-text"><?= $errors['email']?></div>
        <label for="pizza">Pizza Name</label>
        <input type="text" name = "title" value = "<?= $title?>">
        <div class="red-text"><?= $errors['title']?></div>
        <label for="ingredients">Ingredients (comma separated):</label>
        <input type="text" name = "ingredients"  value = "<?= $ingredients?>">
        <div class="red-text"><?= $errors['ingredients']?></div>
        <div class="center">
            <input type="submit" name = "submit" value = "submit" class = "btn brand z-depth-0">
        </div>
    </form>
</section>
<?php
    include('templates/footer.php')
?>
</body>
</html>