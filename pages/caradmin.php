<?php
    $Car = new Car($Conn);
    $cars = $Car->getAllCars($_POST);
    $attributesToHide = ["car_id", "image"];
    $isEditable = true;
    if ($_POST) {
        $update = $Car->updateCar($_POST);
        var_dump($update);
    }
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