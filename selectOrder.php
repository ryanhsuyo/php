<?php

    include "connection.php";

    $pdo = getPDO();

    $MEMBER_ID = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT o.ORDER_ID, CAKE_IMAGE_BLOB, CAKE_DESIGN_IMAGE_BLOB, CAKE_NAME, CAKE_DESCRIPTION, QUANTITY, p.PRICE, PAYMENT_METHOD, o.ADDRESS, DELIVER_FEE, o.CREATE_DATE, FINISHED_DATE, FINISHED, cp.DISCOUNT_AMOUNT FROM `ORDER` o JOIN `MEMBER` m on o.MEMBER_ID = m.MEMBER_ID JOIN PRODUCT p on o.ORDER_ID = p.ORDER_ID JOIN CAKE c on p.CAKE_ID = c.CAKE_ID LEFT JOIN COUPON cp on o.COUPON_ID = cp.COUPON_ID WHERE m.MEMBER_ID = ? ORDER BY FINISHED, o.ORDER_ID desc;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $MEMBER_ID);
    $statement->execute();

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
