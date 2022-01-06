<?php 
    // connect to database
    $conn = mysqli_connect('localhost', 'enPlace', 'test1234', 'pizza_project');

    if(!$conn){
        echo 'Connection error: '.mysqli_connect_error();
    }
    //write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizza_pies ORDER BY created_at';

    //make query and get result
    $result = mysqli_query($conn, $sql);
    
    //fetch the resulting rows as an array
    $all_pies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);
    
    //close connection 
    //mysqli_close($conn);


    //print_r($all_pies)

    ?>