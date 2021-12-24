<?php
    $Cars = new Car($Conn);
    $cars = $Cars->searchCars($_POST['query']);
?>
<div class="container">
    <h1 class="mb-4 pb-2">Search results for "<?php echo $_POST['query']; ?>"</h1>
    <div class="row">
        <?php foreach($cars as $car) { ?>
            <div class="col-md-3">
                <div class="car-card">
                    <div class="car-card-image" style="background-image: url('./car_images/<?php echo $car['image']; ?>');">
                        <a href="index.php?p=car&id=<?php echo $car['car_id']; ?>"></a>
                        <a href="index.php?p=car&id=<?php echo $car['car_id']; ?>"><h3><?php echo $car['make']; ?></h3></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>