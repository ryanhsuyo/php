<?php

    include "connection.php";

    $pdo = getPDO();

    $CAKE_ID = htmlspecialchars($_POST["cakeID"]);
    $CAKE_IMG_BLOB = htmlspecialchars($_POST["cakeImgBlob"]);

    $sql = "UPDATE CAKE SET CAKE_IMAGE_BLOB = ? WHERE CAKE_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $CAKE_IMG_BLOB);
    $statement->bindValue(2, $CAKE_ID);
    $statement->execute();

?>
