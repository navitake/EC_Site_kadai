<?php 
session_start();
echo "hello,PHP";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>TOP</title>
</head>
<body>
    <ul>
    <li><a href="list.php"><i class="fas fa-stream"></i>商品一覧</a></li>
    <li><a href="regist.html"><i class="fas fa-clipboard-list"></i>商品登録</a></li> 
    <li><a href="cart.php"><i class="fas fa-shopping-cart"></i>カート</a></li>
    </ul>
</body>
</html>