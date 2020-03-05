<?php
 try {
     $dbh = new PDO(
         'mysql:host=db;dbname=webpro_bookDB',
         'myuser',
         'passward'
     );

    $title = $_POST['title'];
    $auter = $_POST['auter'];
    $isbn = $_POST['value'];
    $category = $_POST['category'];
    $tag = $_POST['tag'];

    
    function insert($cat,$cat_val){

        $stmt = $dbh->prepare(
        'SELECT id FROM ? WHERE name = ? '
        );
        $stmt-> execute(array($cat,$cat_val));
        $cat_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($cat_id);
        if(empty($cat_id)){
        $stmt = $dbh->prepare(
            'INSERT INTO ? (name) VALUES(?)'
        );
        $stmt -> execute(array($cat,$cat_val));
        }
        return $cat_id;
    }

    $category_id = insert('category',$category);

    //  $stmt = $dbh->prepare(
    //     'SELECT id FROM category WHERE name = ? '
    //  );
    //  $stmt-> execute(array($catgory));
    //  $category_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //  print_r($category_id);
    //  if(empty($result)){
    //  $stmt = $dbh->prepare(
    //      'INSERT INTO category (name) VALUES(?)'
    //  );
    //  $stmt -> execute(array( $catgory));
    // }

      

 } catch (PDOException $e) {
     var_dump($e);
     exit;
 }
?>