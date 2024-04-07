<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Pizza App</title>
    </head>
    <body>
        <h2>Order a Pizza</h2>


        <h3>Choose Size</h3>
        <form action="index.php" method="post">
            <input type="radio" name="size" value="small">Small</br>
            <input type="radio" name="size" value="medium">Medium</br>
            <input type="radio" name="size" value="large">Large</br>
            <br><br>
            <h3>Choose Toppings</h3>
            <input type="checkbox" name="toppings[]" value="pepperoni">Pepperoni</br>
            <input type="checkbox" name="toppings[]" value="bacon">Bacon</br>
            <input type="checkbox" name="toppings[]" value="beef">Beef</br>
            <input type="checkbox" name="toppings[]" value="italian_sausage">Italian Sausage</br>
            <input type="checkbox" name="toppings[]" value="ham">Ham</br>
            <input type="checkbox" name="toppings[]" value="green_peppers">Green Peppers</br>
            <input type="checkbox" name="toppings[]" value="onions">Onions</br>
            <input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms</br>
            <input type="checkbox" name="toppings[]" value="olives">Olives</br>
            <label>&nbsp;</label></br>
            <input type="submit" value="Place Order"/>
        </form> 
    </body>
</html>
