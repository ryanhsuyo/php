<?php

    include "connection.php";

    $pdo = getPDO();

    $memberId = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT * FROM FAVORITE_CATEGORY fc join `MEMBER` m on fc.MEMBER_ID = m.MEMBER_ID;";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
