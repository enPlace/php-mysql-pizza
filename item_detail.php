<?php 

include('connect.php');
if(isset($_POST['delete'])){
    $del_id = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM `pizza_pies` WHERE id = '$del_id'";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    }else {
        echo "error".mysqli_error($conn);
    }

}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM pizza_pies WHERE id = $id";
    $result = mysqli_query($conn, $sql); 
    $pizza = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    //mysqli_close($conn);
    print_r($pizza);
    echo $id;
};

?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php');?>
<body>
    <h3 class = "center">About the Pie</h3>
    <h3 class="center"><?=$pizza['title']?></h3>
    <h4 class="center">Ingredients:</h4>
    <h5 class="center"><?=$pizza['ingredients']?></h5>
    <h4 class="center">Created by:</h4>
    <h5 class="center"><?=$pizza['email']?></h5>
    <h4 class="center">Created at:</h4>
    <h5 class="center"><?=$pizza['created_at']?></h5>
    

    <form action="item_detail.php" method = "POST" class = "center">
        <input type="hidden" name = "id_to_delete" value = "<?=$pizza['id']?>">
        <input type="submit" name="delete" value = "delete" class = "btn brand z-depth-0 center">
    </form>

<?php include('templates/footer.php');?>
</body>
</html>