<?php
    if($isEditable) {
    ?>
        <button type="button" class="btn btn-ybac edit <?php echo $car['car_id']; ?>" data-carid="<?php echo $car['car_id']; ?>" data-page="<?php echo $_GET['p']?>">Edit</button>
    <?php
    } else {
    ?>
        <button type="submit" class="btn btn-ybac save <?php echo $car['car_id']; ?>" data-carid="<?php echo $car['car_id']; ?>">Save</button>
    <?php
    }
