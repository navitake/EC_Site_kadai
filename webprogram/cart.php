<?php

require_once 'model/product.php';
require_once 'model/cartClass.php';

session_start();

$items = new Products();
$items->openJson("json/productList.json");


$cart = $_SESSION['cart'];
$codeList = $items->codeColumn();


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Document</title>
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
        <div class="allValue">
            <div>
                <h1>小計(<?php echo $cart->numberOfProducts() ?>点)</h1>
                <p><?php echo $cart->totalPrice() ?>円</p>
            </div>
            <div>
                <button>お支払いへ</button>
            </div>
        </div>
        <div class="cartWrap">
            <h1>ショッピングカート</h1>
            <div class="cartList">
                    <?php 
                        foreach($cart->outputProducts() as $cartIndex => $item):
                            $index = array_search($item['code'],$codeList);
                            $product = $items->productList[$index];
                    ?>
                        <div class="cartItem">
                            <div class="cartImage">
                                <img src="<?php echo 'image/'.$item['code'] ?>" alt="#">
                            </div>
                            <div class="cartItemData">
                                <span>
                                    <p><?php echo $product->name?></p>
                                    <p>¥<?php echo $product->value?></p>
                                </span>
                                <span>
                                    <p><?php echo $product->code?></p>
                                    <p><?php echo $item['color']?></p>
                                    <p><?php echo $item['size']?></p>
                                </span>
                                <form action="deleteItem.php" method="POST">
                                    <input type="hidden" name="index" value="<?php echo $cartIndex?>">
                                    <button type="submit">削除</button>
                                </form>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                        unset($product);
                        unset($item);
                    ?>
                </div>
                <p>¥<?php echo $cart->totalPrice()?></p>
                <input type="button" onclick="location.href='reset.php'" value="カートを空に">
            </div>
        </div>
    </main>  
</body>
</html>