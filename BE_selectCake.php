<?php

    include "connection.php";

    $pdo = getPDO();

    $sql = "SELECT c.CAKE_ID, c.CAKE_NAME, m.`NAME`, c.CAKE_IMAGE_BLOB, c.CAKE_DESCRIPTION FROM CAKE c JOIN VOTING v on c.VOTING_ID = v.ID JOIN `MEMBER` m on c.MEMBER_ID = m.MEMBER_ID WHERE DATEDIFF(v.START_DATE, NOW()) > 0 ORDER by START_DATE;";

    $statement = $pdo->query($sql);

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
