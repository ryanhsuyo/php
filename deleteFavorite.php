<?php

    include "connection.php";

    $pdo = getPDO();

    $favoriteCategoryID = htmlspecialchars($_POST["favoriteCategoryID"]);
    $cakeID = htmlspecialchars($_POST["cakeID"]);
    $memberID = htmlspecialchars($_POST["memberID"]);

    $sql = "DELETE FROM FAVORITE WHERE FAVORITE_CATEGORY_ID = ? and CAKE_ID = ?";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $favoriteCategoryID);
    $statement->bindValue(2, $cakeID);
    $statement->execute();

    $data = $statement->fetchAll();

    $sql = "SELECT * 
    FROM FAVORITE f
        JOIN FAVORITE_CATEGORY fc
            on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID
    WHERE MEMBER_TOTAL != '1' and MEMBER_ID = ? and CAKE_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $memberID);
    $statement->bindValue(2, $cakeID);
    $statement->execute();
    $result = $statement->fetchAll();

    if($result == null){
        $sql = "SELECT FAVORITE_CATEGORY_ID
        FROM FAVORITE f
            JOIN FAVORITE_CATEGORY fc
                on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID
        WHERE MEMBER_TOTAL = '1'  and MEMBER_ID = ? and CAKE_ID = ?;";
        
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $memberID);
        $statement->bindValue(2, $cakeID);
        $statement->execute();
        $index = $statement->fetch();

        $sql = "DELETE FROM FAVORITE WHERE FAVORITE_CATEGORY_ID = ? and CAKE_ID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $index[0]);
        $statement->bindValue(2, $cakeID);
        $statement->execute();
    }
    
    
    echo json_encode($data);

?>
