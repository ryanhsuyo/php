<?php

    include "connection.php";

    $pdo = getPDO();

    $memberId = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT * FROM FAVORITE_CATEGORY fc join `MEMBER` m on fc.MEMBER_ID = m.MEMBER_ID left join FAVORITE f on fc.CATEGORY_ID = f.FAVORITE_CATEGORY_ID left join CAKE c on f.CAKE_ID = c.CAKE_ID WHERE m. MEMBER_ID = ? and fc.MEMBER_TOTAL != '1' order by CATEGORY_ID;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $memberId);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
