<?php
    header('Location:list.php',true,301);

    require_once 'model/cartClass.php';

    session_start();
    $code = $_POST['code'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $name = $_POST['name'];
    $value = $_POST['value'];

    $input = [
        "code" => $code,
        "color" => $color,
        "size" => $size,
        "value" => $value,
    ];

    if(!isset($_SESSION['cart'])){
    $_SESSION['cart']= new Shoppingcart;
    }
    

    $_SESSION['cart']->addProduct($input);
    // echo $_SESSION['cart']->totalPrice();


    // print_r($_SESSION['cart']);
    
?>