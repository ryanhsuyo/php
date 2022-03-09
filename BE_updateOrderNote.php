<?php

    include "connection.php";

    $pdo = getPDO();

    $orderID = htmlspecialchars($_POST["orderID"]);
    $note = htmlspecialchars($_POST["note"]);

    $sql = "UPDATE `ORDER` SET `NOTE` = ? WHERE ORDER_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $note);
    $statement->bindValue(2, $orderID);
    $statement->execute();

?>
