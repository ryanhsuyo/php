<?php

    include "connection.php";

    $pdo = getPDO();

    $CAKE_ID = htmlspecialchars($_POST["cakeID"]);
    $CAKE_DESCRIPTION = htmlspecialchars($_POST["cakeDescription"]);

    $sql = "UPDATE CAKE SET CAKE_DESCRIPTION = ? WHERE CAKE_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $CAKE_DESCRIPTION);
    $statement->bindValue(2, $CAKE_ID);
    $statement->execute();

?>
