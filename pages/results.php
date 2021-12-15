<?php
    $attributesToHide = ["car_id", "image", "active"];
    // sometimes the page loads before ajax/calendar.php has had a chance to set $_SESSION['dates]. Added flag so it only does it once.
    if (!$_SESSION['reloaded'] && $_SESSION['date'] == null) {
        $_SESSION['reloaded'] = true;
        echo "<div>Loading cars</div>";
        header("Refresh:0");
    } else {
        $_SESSION['reloaded'] = false;
        $Basket = new Basket($Conn);
        $Car = new Car($Conn);
        $cars = $Car->getAllFilteredActiveCars($_POST, $_SESSION['date']);
        var_dump($cars);
    }
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
            echo '<div class="noResults"><p>No results found!</p><p><a class="btn btn-sevent centralised" href="index.php">Go home</a></p></div>';
        }
        ?>
    </div>
</div>