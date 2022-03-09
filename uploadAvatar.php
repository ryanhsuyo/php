<?php

    include "connection.php";

    $pdo = getPDO();

    $IMG_BLOB = htmlspecialchars($_POST["imgBlob"]);
    $MEMBER_ID = htmlspecialchars($_POST["memberId"]);

    $sql = "UPDATE `MEMBER` SET MEMBER_IMG_BLOB = ? WHERE MEMBER_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $IMG_BLOB);
    $statement->bindValue(2, $MEMBER_ID);
    $statement->execute();

?>
