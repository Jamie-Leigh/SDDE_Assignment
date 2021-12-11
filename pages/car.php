<?php
  $Basket = new Basket($Conn);
  $Car = new Car($Conn);
  $car = $Car->getCar($_GET['id']);
?>

<div class="container">
    <h1 class="mb-4 pb-2"><?php echo $car['make']." ".$car['model']; ?></h1>

    <div class="row">
        <div class="col-md-6">
          <div class="car-image-main">
            <img src="./car_images_main/<?php echo $car['image']; ?>"/>
          </div>
            <div class="row">
              <?php foreach($car['images'] as $image) { ?>
                <div class="col-md-4">
                    <div class="car-image-additional mb-4" style="background-image: url('./car_images_additional/<?php echo $image['image_location']; ?>');">
                    <a href="./car-images/<?php $image['image_location'];?>" data-lightbox='car-imgs'></a>
                    </div>
                </div>
              <?php } ?>
            </div>
        </div>
        <div class="col-md-6 car-details">
          <div class="details">
            <p class="description"><?php echo $car['description']; ?></p>
            <p class="make">Make: <?php echo $car['make']; ?></p>
            <p class="model">Model: <?php echo $car['model']; ?></p>
            <?php
              if ($car['model_varient']) {
                echo '<p class="model">Model: '.$car["model_varient"].'</p>';
              }
            ?>
            <p class="mileage">Mileage: <?php echo $car['mileage']; ?></p>
            <p class="year-built">Year Built: <?php echo $car['year_built']; ?></p>
            <p class="engine">Fuel Type: <?php echo $car['fuel']; ?></p>
            <p class="colour">Transmission Type: <?php echo $car['transmission']; ?></p>
            <p class="year-built">Seats: <?php echo $car['seats']; ?></p>
            <p class="year-built">Colour: <?php echo $car['colour']; ?></p>
            <p class="year-built">Body Type: <?php echo $car['body_type']; ?></p>
            <p class="year-built">Price: <?php echo $car['price']; ?></p>
          </div>
          <?php
            $isInBasket = $Basket->isInBasket($car['car_id']);
            require(__DIR__.'/../includes/addToBasket.php');
          ?>
        </div>
    </div>
</div>