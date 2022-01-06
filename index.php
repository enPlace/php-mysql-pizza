<!DOCTYPE html>
<html lang="en">

<?php 
    include('connect.php');
    mysqli_close($conn);
    ?>

<?php 
    include('templates/header.php');
    ?>
<h4 class="center">Pies</h4>

<div class="container">
    <div class="row">
        <?php 
        foreach($all_pies as $pie){ ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h5><?= htmlspecialchars($pie['title'])?></h5>
                        <ul>
                            <?php 
                            $ingredients = explode(',',$pie['ingredients']);
                           // echo $ingredients;
                            foreach ($ingredients as $ingredient){?>
                                <li> <h6> <?= htmlspecialchars($ingredient) ?></h6></li>
                                <?php
                            };?>
                        </ul>



                        <!-- <h6><?= htmlspecialchars($pie['ingredients'])?></h6> -->
                        <div >
                            <a href="item_detail.php?id=<?=$pie['id']?>" class="brand-text center">More info</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        };
        ?>
    </div>
</div>
<?php
    include('templates/footer.php')
?>
</body>
</html>