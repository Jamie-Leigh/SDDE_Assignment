<?php
    $Basket = new Basket($Conn);
    $Car = new Car($Conn);
    $cars = $Car->getAllFilteredActiveCars($_POST);
    $attributesToHide = ["car_id", "image", "active"];
?>

<div class="container">
    <h1 class="mb-4 pb-2">Cars</h1>
    <p>Browse our wide range of cars below</p>
    <div class="row">
        <?php foreach($cars as $car) {
            require(__DIR__.'/../includes/carCard.php');
        }
        ?>
    </div>
</div>