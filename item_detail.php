<?php 

include('connect.php');
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM pizza_pies WHERE id = $id";
    $result = mysqli_query($conn, $sql); 
    $pizza = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    print_r($pizza);
};

?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php');?>
<body>
    <h2 class = "center">About the Pie</h2>
    <h3 class="center"><?=$pizza['title']?></h3>
    <h4 class="center">Ingredients:</h4>
    <h5 class="center"><?=$pizza['ingredients']?></h5>
    <h4 class="center">Created by:</h4>
    <h5 class="center"><?=$pizza['email']?></h5>
    <h4 class="center">Created at:</h4>
    <h5 class="center"><?=$pizza['created_at']?></h5>
    

<?php include('templates/footer.php');?>
</body>
</html>