<?php

    include "connection.php";

    $pdo = getPDO();

    $memberID = htmlspecialchars($_POST["memberID"]);
    $favCategoryID = htmlspecialchars($_POST["favCategoryID"]);

    if($favCategoryID != 0){
        $sql = "SELECT c.CAKE_IMAGE, c.CAKE_IMAGE_BLOB, c.CAKE_DESIGN_IMAGE_BLOB, c.CAKE_NAME, c.CAKE_NAME, c.CAKE_ID, c.CAKE_DESCRIPTION FROM CAKE c JOIN FAVORITE f on c.CAKE_ID = f. CAKE_ID JOIN FAVORITE_CATEGORY fc on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID WHERE fc.MEMBER_ID = ? and CATEGORY_ID = ?;";
    
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $memberID);
        $statement->bindValue(2, $favCategoryID);
    }else{
        $sql = "SELECT distinct c.CAKE_IMAGE, c.CAKE_IMAGE_BLOB, c.CAKE_NAME, c.CAKE_NAME, c.CAKE_ID, c.CAKE_DESCRIPTION 
        FROM CAKE c 
            JOIN FAVORITE f 
                on c.CAKE_ID = f. CAKE_ID 
            JOIN FAVORITE_CATEGORY fc 
                on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID 
        WHERE fc.MEMBER_ID = ? and fc.MEMBER_TOTAL = '1';";
        // WHERE fc.MEMBER_ID = ?;";    // 資料庫無所有收藏欄位時的舊寫法，結果和上面會一樣(如果商城同時寫入的兩處資料比照無誤的話)
    
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $memberID);
    }

    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
