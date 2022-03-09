<?php

    include "connection.php";

    $pdo = getPDO();

    $memberID = htmlspecialchars($_POST["memberID"]);
    $discount = htmlspecialchars($_POST["discount"]);
    $threshold = htmlspecialchars($_POST["threshold"]);
    $expiration = htmlspecialchars($_POST["expiration"]);
    $quantity = htmlspecialchars($_POST["quantity"]);

    $sql = "INSERT INTO `COUPON` (`MEMBER_ID`, `DISCOUNT_AMOUNT`, `USE_THRESHOLD`, `EXPIRATION_DATE`) VALUES (?, ?, ?, ?);";

    for($i = 1; $i <= $quantity; $i++){
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $memberID);
        $statement->bindValue(2, $discount);
        $statement->bindValue(3, $threshold);
        $statement->bindValue(4, $expiration);
        $statement->execute();
    }

?>
