<?php

    include "connection.php";

    $pdo = getPDO();

    $CATEGORY_NAME = htmlspecialchars($_POST["categoryName"]);
    $CATEGORY_ID = htmlspecialchars($_POST["categoryID"]);

    $sql = "UPDATE FAVORITE_CATEGORY SET CATEGORY_NAME = ? WHERE CATEGORY_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $CATEGORY_NAME);
    $statement->bindValue(2, $CATEGORY_ID);

    $statement->execute();

?>
