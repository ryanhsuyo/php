<?php

    include "connection.php";

    $pdo = getPDO();

    $memberId = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT * FROM CAKE c join `MEMBER` m on c.MEMBER_ID = m.MEMBER_ID WHERE m.MEMBER_ID = ? ORDER BY CAKE_ID desc;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $memberId);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
