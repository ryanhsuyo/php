<?php

    include "connection.php";

    $pdo = getPDO();

    $sql = "SELECT MEMBER_ID FROM `MEMBER`;";

    $statement = $pdo->query($sql);

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
