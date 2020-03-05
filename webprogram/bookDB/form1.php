<?php
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
    <main>
        <form action="inputdb.php" method="POST">
            <div>
                <label for="">title:</label>
                <input type="text" name="title">
            </div>
            <div>
                <label for="">auter:</label>
                <input type="text" name="auter">
            </div>
            <div>
                <label for="">isbn:</label>
                <input type="text" name="isbn">
            </div>
            <div>
                <label for="">value:</label>
                <input type="text" name="value">
            </div>
            <div>
                <label for="">category:</label>
                <input type="text" name="category">
            </div>
            <div>
                <label for="">tag:</label>
                <input type="text" name="tag">
            </div>
            <input type="submit" value="送信">
        </form>
    </main>

</body>
</html>