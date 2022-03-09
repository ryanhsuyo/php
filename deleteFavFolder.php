<?php

    include "connection.php";

    $pdo = getPDO();

    $CATEGORY_ID = htmlspecialchars($_POST["categoryId"]);
    $MEMBER_ID = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT CAKE_ID FROM FAVORITE WHERE FAVORITE_CATEGORY_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $CATEGORY_ID);
    $statement->execute();

    $arrForCheck = $statement->fetchAll();



    $sql = "DELETE FROM FAVORITE WHERE FAVORITE_CATEGORY_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $CATEGORY_ID);
    $statement->execute();

    $sql = "DELETE FROM FAVORITE_CATEGORY WHERE CATEGORY_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $CATEGORY_ID);
    $statement->execute();

    // echo json_encode($arrForCheck);

    for($i = 0; $i < COUNT($arrForCheck); $i++){

        $sql = "SELECT COUNT(ID)
        FROM FAVORITE f
            JOIN FAVORITE_CATEGORY fc
                on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID
        WHERE CAKE_ID = ? and MEMBER_ID = ?;";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $arrForCheck[$i][0]);
        $statement->bindValue(2, $MEMBER_ID);
        $statement->execute();
        $data = $statement->fetch();

        // echo json_encode($data);

        if($data[0] == '1'){
            $sql = "SELECT ID
            FROM FAVORITE f
                JOIN FAVORITE_CATEGORY fc
                    on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID
            WHERE CAKE_ID = ? and MEMBER_ID = ?;";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $arrForCheck[$i][0]);
            $statement->bindValue(2, $MEMBER_ID);
            $statement->execute();
            $deleteID = $statement->fetch();

            echo json_encode($deleteID);

            $sql = "DELETE FROM FAVORITE WHERE ID = ?";
            
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $deleteID[0]);
            $statement->execute();
            
        }

    }

?>
