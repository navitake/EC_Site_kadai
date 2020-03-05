<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

    try {
        $dbh = new PDO(
            'mysql:host=db;dbname=webprodb',
            'myuser',
            'passward'
        );
        
    } catch (PDOException $e) {
        var_dump($e);
        exit;
    }

    function hsc($str){
        return htmlspecialchars($str);
    }

    if(isset($_GET['search_id'])){
        $search_id = $_GET['search_id'];
    }


     //SELECT文
        if(isset($search_id)){
            $stmt = $dbh->prepare(
                'SELECT * FROM students WHERE code LIKE ?'
            );
            $stmt -> execute(array('%'.$search_id.'%'));
            // $stmt = $dbh->query(
            //     'SELECT * FROM students WHERE code LIKE "%'. $search_id .'%"'
            // );
        }else(
            $stmt = $dbh->query(
                'SELECT * FROM students'
            )
        );
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="exdb2.php" method="POST">
            <label for="id">学籍番号</label>
            <input type="text" name="id"><br>
            <label for="name">氏名</label>
            <input type="text" name="name"><br>
            <label for="grade">学年</label>
            <select name="grade" id="grade">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <br>
            <input type="submit" value="送信">
        </form>
    </div>
    <hr>
        <div>
        <form action="exdb.php" method="get">
            <!-- <label for="search_grade">学年</label>
            <select name="search_id" id="search_id">
                <option value="">選択してください</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <br>
             -->
            <label for="search_id">学籍番号</label>
            <input type="text" name="search_id">
            <input type="submit" value="検索">
            <input type="button" value="リセット" onClick="location.href='exdb.php'">  
        </form>
        </div>
        <hr>
        <div>
        <table border="1">
        <tr>
        <th>学籍番号</th>
        <th>氏名</th>
        <th>学年</th>
        </tr>
        <?php     
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
            <td><?php echo hsc($row['code']) ?></td>
            <td><?php echo hsc($row['name']) ?></td>
            <td><?php echo hsc($row['grade']) ?></td>
            </tr>
        <?php
        }
        ?>
        </table>
    
    </div>
</body>
</html>

