<?php

$total = 0;

$size = filter_input(INPUT_POST, 'size');
$toppings = filter_input(INPUT_POST, 'toppings', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

if($size == "small") {
    $total = 5;
    $topping_price = .50;
    $pizza_size = "Small";
    
} elseif($size == "medium") {
    $total = 7;
    $topping_price = 1.00;
    $pizza_size = "Medium";
    
} elseif($size == "large") {
    $total = 9;
    $topping_price = 1.50;
    $pizza_size = "Large";
}

$total += count($toppings) * $topping_price;
$toppings_list = implode(', ', $toppings);

echo "<h3>Your Order:</h3>";
echo "A $pizza_size $toppings_list pizza</br>";
echo "<b>Order Total: $$total";


