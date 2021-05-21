<?php
	session_start();

	$cart = $_SESSION['cart'] = $_SESSION['cart'] ?? array();

    // $cart = [
    //     [
    //         'order_datetime' => $order_datetime,
    //         'table_name' => $table_name,
    //         'people_num' => $people_num,
    //     ]
    // ];

    $servername = "localhost";
    $db_name = 'course';
    $username = "peiching";
    $password = "admin";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=restaurants", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $people_num = $cart[0]['people_num'];
        $sql = "INSERT INTO `sales_order` (`user_id`, `people_num`, `status`)
        VALUES ('1', $people_num, '1')";
        $conn->exec($sql);
        $sales_order_id = $conn->lastInsertId();

        foreach($cart as $cart_item){
            $order_datetime = $cart_item['order_datetime'];
            $table_name = $cart_item['table_name'];
            $people_num = $cart_item['people_num'];

            $sql2 = "INSERT INTO `order_table` (`order_id`, `name`, `order_datetime`)
            VALUES ('$sales_order_id', '$table_name', '$order_datetime')";
            $conn->exec($sql2);
        }
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }