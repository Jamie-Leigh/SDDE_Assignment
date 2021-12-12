<?php
error_reporting(E_ALL & ~E_NOTICE);
session_set_cookie_params(0);
session_start();
require_once(__DIR__.'/includes/autoloader.php');
require_once(__DIR__.'/includes/database.php');
include_once ('./vendor/autoload.php');
if($_SESSION['user_data']) {
    $User = new User($Conn);
    $user_data = $User->getUser();
    $_SESSION['user_data'] = $user_data;
} else {
    $isVisitor = true;
}
ini_set('display_errors', 'On');
$page = $_GET['p'];
$pages = ['accessdenied', 'account', 'basket', 'car', 'caradmin', 'checkout', 'editprofileimage', 'faq', 'home', 'login', 'logout', 'results', 'search', 'useradmin'];
$isUser = ($_SESSION['user_data']['user_type'] == 'USER');
$isAdmin = ($_SESSION['user_data']['user_type'] == 'ADMIN');
$isSuper = ($_SESSION['user_data']['user_type'] == 'SUPER');

$visitor_notallowed = ['caradmin', 'useradmin', 'basket', 'account'];
$user_notallowed = ['caradmin', 'useradmin', 'login'];
$admin_notallowed = ['useradmin', 'login'];

if($isVisitor) {
    if(in_array($page, $visitor_notallowed)) {
        $page = 'accessdenied';
    }
} else if($isUser) {
    if(in_array($page, $user_notallowed)) {
        $page = 'accessdenied';
    }
} else if($isAdmin) {
    if(in_array($page, $admin_notallowed)) {
        $page = 'accessdenied';
    }
}

if(!$page){
    $page = "home";
} else if (!(in_array($page, $pages))) {
    $page = '404';
}

// assume allowed
require_once(__DIR__.'/includes/header.php');
require_once(__DIR__.'/pages/'.$page.'.php');
require_once(__DIR__.'/includes/footer.php');
