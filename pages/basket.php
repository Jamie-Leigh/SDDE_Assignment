<div class="container">
    <h1 class="mb-4 pb-2">My Basket</h1>
    <div class="row">
    <?php
        $Basket = new Basket($Conn);
        $user_basket = $Basket->getBasketForUser();
        $attributesToHide = ["car_id", "image", "active", "basket_id", "user_id"];
        $totalPrice = 0;

        if($user_basket) {
            foreach($user_basket as $car) {
                    require(__DIR__.'/../includes/carCard.php');
                    $totalPrice += $car['price'];
                }
                echo '<div class="total-price">Total price of your basket: £'.number_format($totalPrice).'</div>
                    <div class="checkoutButton">
                    <form method="post" action="index.php?p=checkout">
                        <button type="submit" class="btn btn-ybac checkout" data-userid="'.$_SESSION["user_data"]["user_id"].'">Checkout</button>
                    </form>
                  </div>';
        } else {
            echo '
                <h3>Basket is empty</h3>
                <div class="goHomeButton">
                    <form method="post" action="index.php">
                        <button type="submit" class="btn btn-ybac">Click here to find cars</button>
                    </form>
                </div>
                ';
    } ?>
    </div>
</div>