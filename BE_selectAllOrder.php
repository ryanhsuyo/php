<?php

    include "connection.php";

    $pdo = getPDO();

    $sql = "SELECT o.ORDER_ID, o.MEMBER_ID, o.CREATE_DATE, FINISHED_DATE, SHIPPING_DATE, RECEIVER, o.PHONE, o.COUPON_ID, DISCOUNT_AMOUNT, DELIVER_FEE, o.ADDRESS, p.PRICE, NOTE, ck.CAKE_ID, ck.CAKE_NAME, p.QUANTITY, ACCESSORIES_NAME, ACCESSORIES_QUANTITY
    FROM `ORDER` o
        JOIN `MEMBER` m
            on o.MEMBER_ID = m.MEMBER_ID
        LEFT JOIN COUPON c
            on o.COUPON_ID = c.COUPON_ID
        JOIN PRODUCT p
            on o.ORDER_ID = p.ORDER_ID
        JOIN CAKE ck
            on p.CAKE_ID = ck.CAKE_ID
        LEFT JOIN PRODUCT_ACCESSORIES pa
            on p.ID = pa.PRODUCT_ID
        LEFT JOIN ACCESSORIES a
            on pa.ACCESSORIES_ID = a.ID
    ORDER BY o.ORDER_ID, p.ID;";

    $statement = $pdo->query($sql);

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
