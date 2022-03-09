<?php

    include "connection.php";

    $pdo = getPDO();

    $CAKE_ID = htmlspecialchars($_POST["cakeID"]);

    $sql = "SELECT * FROM CAKE c LEFT JOIN CAKE_INGREDIENT ci on c.CAKE_ID = ci.CAKE_ID LEFT JOIN INGREDIENT i on ci.INGREDIENT_ID = i.INGREDIENT_ID WHERE c.CAKE_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $CAKE_ID);
    $statement->execute();

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
