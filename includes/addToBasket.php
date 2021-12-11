<?php
    if ($_SESSION['is_loggedin']) {
        if($isInBasket) {
        ?>
            <button type="button" class="btn btn-ybac addToBasket remove <?php echo $car['car_id']; ?>" data-carid="<?php echo $car['car_id']; ?>" data-page="<?php echo $_GET['p']?>">Remove from basket</button>
        <?php
        } else {
        ?>
            <button type="button" class="btn btn-ybac addToBasket add <?php echo $car['car_id']; ?>" data-carid="<?php echo $car['car_id']; ?>">Add to basket</button>
        <?php
        }
    } else {
        ?>
        <form method="post" action="index.php?p=login" class="addToBasket">
        <button id="loginBasket" type="submit" class="btn btn-ybac" >Login to add cars to your basket</button>
        </form>
        <?php
    }
