<?php


require_once 'model/product.php';
require_once 'model/cartClass.php';

session_start();

$items = new Products();
$items->openJson("json/productList.json");

$cart = [];
$cart = $_SESSION['cart'];

$codeList = $items->codeColumn();

// print_r($items->productList);


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>商品一覧</title>
</head>

<body>
    <header>
         <div class="headerMenu">
            <h1><a href="index.php">Title</a></h1> 
            <ul>
                <li><a href="list.php"><i class="fas fa-stream"></i>商品一覧</a></li>
                <li><a href="regist.html"><i class="fas fa-clipboard-list"></i>商品登録</a></li>
                <li><a href="cart.php"><i class="fas fa-shopping-cart"></i>カート</a></li>
            </ul>
        </div>
    </header>
    <main>
    <h1>商品一覧</h1>
    <div class="productList">
        <?php 
            foreach($items->productList as $index => $product):?>
                <div id="product<?php echo $index?>" class="productItem">                
                    <p><?php echo $product->name ?></p>
                        <div class="productImage">
                            <?php
                                if(file_exists('image/'.$product->code)){ 
                            ?>
                                <img src="<?php echo 'image/'.$product->code ?>" alt="#">
                            <?php 
                                }else{
                            ?>
                                <p>No Image</p>
                            <?php }?>
                        </div>
                        <p>¥<?php echo $product->value?></p>
                        <form action="input.php" method="POST">
                                    <input type="hidden" name="code" value="<?php echo $product->code ?>">
                                    <input type="hidden" name="value" value="<?php echo $product->value ?>">
                            <div>
                                <label for="colorSelect">カラー</label>
                                <select name="color">
                                    <?php foreach($product->color as $color):?>
                                        <option value="<?php echo $color?>"><?php echo $color?></option>
                                    <?php
                                        endforeach;
                                        unset($color);
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="sizeSelect">サイズ</label>
                                <select name="size" class="selectSize">
                                    <?php foreach($product->size as $size):?>
                                        <option value="<?php echo $size?>"><?php echo $size?></option>
                                    <?php 
                                        endforeach;
                                        unset($size);
                                    ?>
                                </select>
                            </div>
                            <div class="inputButton">
                                <button type="submit"><i class="fas fa-cart-plus"></i>カートにいれる</button>
                            </div>
                        </form>
                    </div>
        <?php
            endforeach;
            unset($product);
        ?>
    </div>
    <div class="cart">
        <div class="cartHeader">
            <h2>カート</h2>
            <button class="" id="cartToggleButton" onclick="toggleCart()">
                <!-- <span></span>
                <span></span>
                <span></span>
                <p>×</p> -->
                ×
            </button>
        </div>
        
        <div class="cartWrap">
            <div class="cartList">
                <?php 
                    foreach($cart->outputProducts() as $cartIndex => $goods):
                        $index = array_search($goods['code'],$codeList);
                        $product = $items->productList[$index];
                ?>
                    <div class="cartItem">
                        <p><?php echo $product->name?></p>
                        <p>¥<?php echo $product->value?></p>
                        <div calss="cartImage">
                            <img src="<?php echo 'image/'.$goods['code'] ?>" alt="#">
                        </div>
                        <form action="deleteItem.php" method="POST">
                            <input type="hidden" name="index" value="<?php echo $cartIndex?>">
                            <button type="submit">削除</button>
                        </form>
                    </div>
                <?php 
                    endforeach;
                    unset($product);
                ?>
            </div>
            <div class="cartButtons">
                <p>合計：¥<?php echo $cart->totalPrice();?></p>
                <button><a href="cart.php"><i class="fas fa-shopping-cart"></i>カートへ</a></button>
            </div>
        </div>
    </div>
    </main>
   <script src="js/list.js"></script>
</body>

</html>