<?php

    include "connection.php";

    $pdo = getPDO();

    $MEMBER_ID = htmlspecialchars($_POST["memberId"]);
    $CATEGORY_NAME = htmlspecialchars($_POST["categoryName"]);

    $sql = "INSERT INTO FAVORITE_CATEGORY (MEMBER_ID, CATEGORY_NAME) VALUES (?, ?);";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $MEMBER_ID);
    $statement->bindValue(2, $CATEGORY_NAME);

    $statement->execute();

    // echo $MEMBER_ID." ".$CATEGORY_NAME;

?>
