<?php

header('Location:'.$_SERVER['HTTP_REFERER'],true,301);
require_once 'model/cartClass.php';
session_start();

$index = $_POST['index'];
$cart = $_SESSION['cart'];

$cart->deleteProduct($index);


echo $_SERVER['HTTP_REFERER'];