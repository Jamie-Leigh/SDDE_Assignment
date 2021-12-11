<?php
  $Basket = new Basket($Conn);
  $Car = new Car($Conn);
  $car = $Car->getCar($_GET['id']);
  $attributesToHide = ['car_id', 'active', 'image', 'images'];
  if(count($car) <= 1) {
    header("Location:index.php?p=404");
  }
?>

<div class="container">
    <h1 class="mb-4 pb-2"><?php echo $car['make']." ".$car['model']; ?></h1>

    <div class="centralised">
        <div class="car-photos">
          <div class="car-image-main">
            <img src="./car_images_main/<?php echo $car['image']; ?>"/>
          </div>
          <div class='additional'>
              <?php foreach($car['images'] as $image) {
                    echo "<div class='car-image-additional mb-4' style='background-image: url(\"./car_images_additional/".$image['image_location']."\");'>
                      <a href='./car-images/".$image['image_location']." data-lightbox='car-imgs'></a>
                    </div>";
              }
              ?>
          </div>
        </div>
        <div class="car-details">
            <?php
             foreach($car as $detailName => $detail) {
                if ($detail) {
                  if (!in_array($detailName, $attributesToHide)) {
                    echo "<div class=".$detailName.">
                        <div class='detail-title'>".ucwords(str_replace("_", " ", $detailName))."</div>
                        <div class='detail-content'>".($detailName == 'price' ? "£".number_format($detail) : $detail)."</div>
                    </div>";
                  }
                }
              }
            ?>
          </div>
          <?php
            $isInBasket = $Basket->isInBasket($car['car_id']);
            require(__DIR__.'/../includes/addToBasket.php');
          ?>
    </div>
</div>