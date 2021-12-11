<?php
session_start();
require_once(__DIR__.'/../includes/autoloader.php');
require_once(__DIR__.'/../includes/database.php');

if($_SESSION['user_data']['user_id']) {
    $user_id = $_SESSION['user_data']['user_id'];
    if ($user_id) {
        $Basket = new Basket($Conn);
        $clear = $Basket->checkoutForUser();
        if($clear) {
            echo json_encode(array(
                "success" => true,
                "reason" => "The user's basket was emptied"
            ));
        } else {
            echo json_encode(array(
                "success" => false,
                "reason" => "The user's basket could not be emptied"
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