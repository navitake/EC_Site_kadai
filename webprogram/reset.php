<?php 
    header('Location:cart.php',true,301);

    require_once 'model/cartClass.php';
    session_start();
    $_SESSION['cart'] = new ShoppingCart;
?>