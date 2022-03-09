<?php

    include "connection.php";

    $pdo = getPDO();

    $memberId = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT * FROM COUPON c JOIN `MEMBER` m on c.MEMBER_ID = m.MEMBER_ID WHERE DATEDIFF(EXPIRATION_DATE, CURDATE()) > -1 and USED = '0' and c.MEMBER_ID = ? ORDER BY CREATE_DATE;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $memberId);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
