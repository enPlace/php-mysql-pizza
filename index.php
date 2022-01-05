<!DOCTYPE html>
<html lang="en">

<?php 
    include('templates/header.php');
    ?>
<section class="container grey-text">
    <h4 class="center">Add a pizza</h4>
    <form action="" class="white" method"" >
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