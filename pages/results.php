<?php
    $attributesToHide = ["car_id","image", "active"];
    // sometimes the page loads before ajax/calendar.php has had a chance to set $_SESSION['date']. Added flag so it only does it once.
    if (!$_SESSION['reloaded'] && $_SESSION['date'] == null) {
        $_SESSION['postData'] = $_POST;
        $_SESSION['reloaded'] = true;
        echo '
        <div class="loadingModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Loading</h5>
                    </div>
                    <div class="modal-body">
                        <p>Loading results - Please wait...</p>
                        <div class="spinner"></div>
                    </div>
                </div>
            </div>
        </div>
        ';
        header("Refresh:0");   
    } else {
        $_SESSION['reloaded'] = false;
        $Basket = new Basket($Conn);
        $Car = new Car($Conn);
        $filterData = $_POST ? $_POST : $_SESSION['postData'];
        $cars = $Car->getAllFilteredActiveCars($filterData, $_SESSION['date'] ? $_SESSION['date'] : date("Y-m-d"));
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
            echo '<div class="noResults"><p>No results found for that date! Try removing some filters or changing the date</p><p><a class="btn btn-sevent centralised" href="index.php">Go home</a></p></div>';
        }
        ?>
    </div>
</div>