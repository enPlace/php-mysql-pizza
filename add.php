<?php
if(isset($_POST['submit'])){ //check to see if POST request has been made
    if(empty($_POST['email'])){
        echo 'Email required <br/>';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {//make sure email is valid
            echo 'Please enter a valid email address <br/>';
        }
    }
    if(empty($_POST['title'])){
        echo 'title required <br/>';
    } else {
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $ingredients)){
            echo'Letters and Spaces only in ingredients <br/>';
        }

    }
    if(empty($_POST['ingredients'])){
        echo 'ingredients required <br/>';
    } else {
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            echo 'Enter single ingredient or comma separated list <br/>';
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
        <input type="text" name = "email">
        <label for="pizza">Pizza Name</label>
        <input type="text" name = "title">
        <label for="ingredients">Ingredients (comma separated):</label>
        <input type="text" name = "ingredients">
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