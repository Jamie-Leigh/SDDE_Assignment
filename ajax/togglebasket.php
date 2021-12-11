<?php
session_start();
require_once(__DIR__.'/../includes/autoloader.php');
require_once(__DIR__.'/../includes/database.php');

if($_SESSION['user_data']) {
    $car_id = (int) $_POST['car_id'];
    if ($car_id) {
        $Basket = new Basket($Conn);
        $toggle = $Basket->toggleInBasket($_POST['car_id']);
        if($toggle) {
            echo json_encode(array(
                "success" => true,
                "reason" => "Car was added to users basket"
            ));
        } else {
            echo json_encode(array(
                "success" => true,
                "reason" => "Car was removed from users basket"
            ));
        }
    } else {
        echo json_encode(array(
            "success" => false,
            "reason" => "Car ID not provided"
        ));
    }
} else {
    echo json_encode(array(
        "success" => false,
        "reason" => "User not logged in"
    ));
}