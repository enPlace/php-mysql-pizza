<?php
$errors = ['email'=> '', 'title'=>'', 'ingredients'=>'']; // to be updated if form is not entered correctly

if(isset($_POST['submit'])){ //check to see if POST request has been made
    if(empty($_POST['email'])){
        $errors['email'] = 'Email required';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {//make sure email is valid
            $errors['email'] = 'Please enter a valid email address';
        }
    }
    if(empty($_POST['title'])){
       $errors['title'] ='title required';
    } else {
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
            $errors['title']= 'Letters and Spaces only in title <br/>';
        }

    }
    if(empty($_POST['ingredients'])){
        $errors['ingredients']= 'ingredients required <br/>';
    } else {
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            $errors['ingredients']= 'Enter single ingredient or comma separated list <br/>';
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
        <div class="red-text"><?= $errors['email']?></div>
        <label for="pizza">Pizza Name</label>
        <input type="text" name = "title">
        <div class="red-text"><?= $errors['title']?></div>
        <label for="ingredients">Ingredients (comma separated):</label>
        <input type="text" name = "ingredients">
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