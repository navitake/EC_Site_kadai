<?php
header('Location:index.php',true,301);

require_once 'model/product.php';

$productName = $_POST['name'];
$productValue = $_POST['value'];
$productColor = $_POST['color'];
$productCode = $_POST['code'];
$productSize = $_POST['size'];

move_uploaded_file($_FILES['uploadImage']['tmp_name'],"image/$productCode");

$item = new Product();
$productList = $item->openJson("json/productList.json");

$item->name = $productName;
$item->value = (int)$productValue;
$item->code = $productCode;
$item->color = $productColor;
$item->size = $productSize;

$item->addJson("json/productList.json");

// $json = file_get_contents("json/productList.json");
// $productList = json_decode($json,true);

// $newProduct = [
//     'name' => $productName,
//     'value' => (int)$productValue,
//     'code' => $productCode,
//     'color' => $productColor,
//     'size' => $productSize,
//     'number' => count($productList),
// ];


// array_push($productList,$item);
// $json = json_encode($productList,JSON_PRETTY_PRINT);
// file_put_contents("json/productList.json",$json);


