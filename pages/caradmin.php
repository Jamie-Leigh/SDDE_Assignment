<?php
    $Car = new Car($Conn);
    $cars = $Car->getAllCars($_POST);
    $attributesToHide = ["car_id", "image"];
    $isEditable = true;
    if ($_POST) {
        $Car->updateCar($_POST);
        $_POST = null;
        echo '
        <div class="savingModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Saving</h5>
                    </div>
                    <div class="modal-body">
                        <p>Saving changes - Please wait...</p>
                        <div class="spinner"></div>
                    </div>
                </div>
            </div>
        </div>
        ';
        sleep(3);
        header("Refresh:0");
    }

?>
<div class="container">
    <h1 class="mb-4 pb-2">Car Admin</h1>
    <p>You can change our current stock below. Just click Edit on the car you want to change, make the change(s) and click Save.</p>
    <div class="row">
        <?php foreach($cars as $car) {
            require(__DIR__.'/../includes/carCard.php');
        }
        ?>
    </div>
</div>