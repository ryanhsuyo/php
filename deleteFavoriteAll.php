<?php

    include "connection.php";

    $pdo = getPDO();

    $cakeID = htmlspecialchars($_POST["cakeID"]);
    $memberID = htmlspecialchars($_POST["memberID"]);

    $sql = "DELETE FROM FAVORITE WHERE FAVORITE_CATEGORY_ID in (
        SELECT ID FROM(
            SELECT FAVORITE_CATEGORY_ID AS ID
            FROM FAVORITE f
                JOIN FAVORITE_CATEGORY fc
                    on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID
            WHERE MEMBER_ID = ? and CAKE_ID = ?
        ) AS a
    ) and CAKE_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $memberID);
    $statement->bindValue(2, $cakeID);
    $statement->bindValue(3, $cakeID);
    $statement->execute();

    $data = $statement->fetchAll();
    
    echo json_encode($data);

?>
