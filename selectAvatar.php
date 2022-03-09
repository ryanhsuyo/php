<?php

    include "connection.php";

    $pdo = getPDO();

    $MEMBER_ID = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT MEMBER_IMG_BLOB FROM `MEMBER` WHERE MEMBER_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $MEMBER_ID);
    $statement->execute();

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
