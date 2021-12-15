<?php
session_start();
require_once(__DIR__.'/../includes/autoloader.php');
require_once(__DIR__.'/../includes/database.php');

// $_SESSION['startDate'] = $_POST['startDate'];
// $_SESSION['endDate'] = $_POST['endDate'];

$_SESSION['date'] = $_POST['date'];
