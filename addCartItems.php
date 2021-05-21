<?php
	session_start();

	$cart = $_SESSION['cart'] = $_SESSION['cart'] ?? array();
    
    $order_date = $_POST['order_date'];
    $order_time = $_POST['order_time'];
    $people_num = $_POST['people_num'];
    $table_list = $_POST['table'];

    // $cart = [
    //     [
    //         'order_datetime' => $order_datetime,
    //         'table_name' => $table_name,
    //         'people_num' => $people_num,
    //     ]
    // ];
    
    foreach($table_list as $table_name){
        $cart_item = [];
        $cart_item['order_datetime'] = $order_date." ".$order_time;
        $cart_item['table_name'] = $table_name;
        $cart_item['people_num'] = $people_num;
        array_push($cart, $cart_item);
    }
    
    $_SESSION['cart'] = $cart;