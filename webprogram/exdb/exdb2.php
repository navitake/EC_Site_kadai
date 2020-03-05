<?php

 function hsc($str){
    return htmlspecialchars($str);
}

 try {
     $dbh = new PDO(
         'mysql:host=db;dbname=webprodb',
         'myuser',
         'passward'
     );

    $name = $_POST['name'];
    $code = $_POST['id'];
    $grade = $_POST['grade'];
     //INSERT
     $stmt = $dbh->prepare(
         'INSERT INTO students (code, name ,grade) VALUES(?,?,?)'
     );
     $stmt -> execute(array( $code, $name, $grade));

     Header('Location: exdb.php');
 } catch (PDOException $e) {
     var_dump($e);
     exit;
 }