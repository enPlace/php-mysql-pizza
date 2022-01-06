<!DOCTYPE html>
<html lang="en">

<?php 
    // connect to database
    $conn = mysqli_connect('localhost', 'enPlace', 'test1234', 'pizza_project');

    if(!$conn){
        echo 'Connection error: '.mysqli_connect_error();
    }

?>
<?php 
    include('templates/header.php');
    ?>

<?php
    include('templates/footer.php')
?>
</body>
</html>