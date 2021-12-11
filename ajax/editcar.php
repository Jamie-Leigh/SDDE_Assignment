
<?php
session_start();
require_once(__DIR__.'/../includes/autoloader.php');
require_once(__DIR__.'/../includes/database.php');

if($_SESSION['user_data']['user_id']) {

    if ($_POST) {
        $Car = new Car($Conn);
        $update = $Car->updateCar($_POST);
        var_dump($update);
        if($update) {
            echo json_encode(array(
                "success" => true,
                "reason" => "The car was saved"
            ));
        } else {
            echo json_encode(array(
                "success" => true,
                "reason" => "The car could not be saved"
            ));
        }
    } else {
        echo json_encode(array(
            "success" => false,
            "reason" => "User ID not provided"
        ));
    }
} else {
    echo json_encode(array(
        "success" => false,
        "reason" => "User not logged in"
    ));
}