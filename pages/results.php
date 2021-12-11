<?php
    $Basket = new Basket($Conn);
    $Car = new Car($Conn);
    $cars = $Car->getAllFilteredActiveCars($_POST);
    $attributesToHide = ["car_id", "image", "active"];
?>

<div class="container">
    <h1 class="mb-4 pb-2">Cars</h1>
    <?php echo $cars ? '<p>Browse our wide range of cars below</p>' : ''; ?>
    <div class="row">
        <?php
        if ($cars) {
            foreach($cars as $car) {
                require(__DIR__.'/../includes/carCard.php');
            }
        } else {
            echo '<div class="noResults"><p>No results found!</p><p><a class="btn btn-ybac centralised" href="index.php">Go home</a></p></div>';
        }
        ?>
    </div>
</div>