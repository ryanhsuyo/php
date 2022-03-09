<?php

    include "connection.php";

    $pdo = getPDO();

    $sql = "SELECT MEMBER_ID, EMAIL, `NAME`, NICKNAME, PHONE, BIRTHDAY, CREATEDATE, ADDRESS, MEMBER_IMG_BLOB FROM `MEMBER` WHERE MEMBER_ID != 0;";

    $statement = $pdo->query($sql);

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
