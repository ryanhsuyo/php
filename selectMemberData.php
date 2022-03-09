<?php

    include "connection.php";

    $pdo = getPDO();

    $memberId = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT * FROM `MEMBER` WHERE `MEMBER_ID` = $memberId;";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
