<?php var_dump($_POST); ?>
<div class='col-md-12'>
    <div class="car-card">
        <div class="car-card-image" style="background-image: url('./car_images_main/<?php echo $car['image']; ?>');">
            <a href="index.php?p=car&id=<?php echo $car['car_id']; ?>"></a>
            <a class="car-card-text" href="index.php?p=car&id=<?php echo $car['car_id']; ?>"><h3><?php echo $car['make'].' '.$car['model']; ?></h3></a>
        </div>
        <?php if ($page == 'caradmin') { ?>
            <form method='post' action='index.php?p=caradmin' class="car-details">
        <?php } else { ?>
            <div class="car-details"> 
        <?php } ?>
            <?php
            foreach($car as $detailName => $detail) {
                // Filter through table's attributes, if the attribute's value does not exist,
                // or the attribute is in the $attributesToHide variable, do not create a div for it.

                if (($detail || $detailName == 'active')) {
                    // The attribute names aren't very readable as they are, so The string functions:
                    // ucwords() and str_replace() are used here to improve readability to the user.
                    // If it's displaying price, a £ symbol is added with a ternary.
                    if ($page == 'results' && !in_array($detailName, $attributesToHide)) {
                        echo "<div class=".$detailName.">
                                <div class='detail-title'>".ucwords(str_replace("_", " ", $detailName))."</div>
                                <div class='detail-content'>".($detailName == 'price' ? "£".number_format($detail) : $detail)."</div>
                            </div>";
                    }
                    if ($page == 'caradmin' && $detailName != 'image') {
                        echo "<div class=".$detailName.">
                                <div class='detail-title'>".ucwords(str_replace("_", " ", $detailName))."</div>
                                <input type='text' disabled name=".$detailName." class='detail-content ".$detailName." ".$car['car_id']."' value='".$detail."' placeholder='".($detailName == 'price' ? "£".number_format($detail) : $detail)."'></input>
                            </div>";
                    }
                }
            }
            echo "<input type='hidden'>".$car['car_id']."</input>";
                if ($Basket) {
                    $isInBasket = $Basket->isInBasket($car['car_id']);
                    require(__DIR__.'/../includes/addToBasket.php');
                } else {
                    require(__DIR__.'/../includes/editcar.php');
                }
            ?>
        <?php if ($page == 'caradmin') { ?>
            </form>
        <?php } else { ?>
            </div> 
        <?php } ?>
    </div>
</div>