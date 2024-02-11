<?php
//set up Data Source Name
$dsn = 'mysql:host=localhost;dbname=stock';

//set up username and password
$username = 'stockuser';
$password = 'test';

//create PDO object
try {
    $db = new PDO($dsn, $username, $password);
    echo "<p>Database connection successful!</p>";

    $symbol = htmlspecialchars(filter_input(INPUT_POST, "symbol"));
    $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
    $current_price = filter_input(INPUT_POST, "current_price", FILTER_VALIDATE_FLOAT);
    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    if ($action == "insert" && $symbol != "" && $name != "" && $current_price != 0) {

        //create the query
        $query = "INSERT INTO stocks (symbol, name, current_price) VALUES (:symbol, :name, :current_price)";

        //prepare the query
        $statement = $db->prepare($query);
        $statement->bindValue(":symbol", $symbol);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":current_price", $current_price);

        //run the query
        $statement->execute();
        $statement->closeCursor();
        
        echo "Row inserted successfully";
        
    } elseif ($action == "update" && $symbol != "" && $name != "" && $current_price != 0) {

        //create the query
        $query = "UPDATE stocks SET name = :name, current_price = :current_price WHERE symbol = :symbol";

        //prepare the query
        $statement = $db->prepare($query);
        $statement->bindValue(":symbol", $symbol);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":current_price", $current_price);

        //run the query
        $statement->execute();
        $statement->closeCursor();
        
        echo "Row updated successfully";
        
    } elseif ($action == "delete" && $symbol != "") {
        //create the query
        $query = "DELETE FROM stocks WHERE symbol = :symbol";

        //prepare the query
        $statement = $db->prepare($query);
        $statement->bindValue(":symbol", $symbol);

        //run the query
        $statement->execute();
        $statement->closeCursor();
        
        echo "Row deleted successfully";
        
    } elseif ($action != "") {
        echo "Missing symbol, name, or current price";
    }

    //create the query
    $query = 'SELECT symbol, name, current_price, id FROM stocks';

    //prepare the query
    $statement = $db->prepare($query);

    //run the query
    $statement->execute();

    //fetch the data
    $stocks = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>Failed to connect to database: $error_message</p>";
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Current Price</th>
                <th>ID</th>
            </tr>
<?php foreach ($stocks as $stock) : ?>
                <tr>
                    <td><?php echo $stock['symbol']; ?></td>
                    <td><?php echo $stock['name']; ?></td>
                    <td><?php echo $stock['current_price']; ?></td>
                    <td><?php echo $stock['id']; ?></td>
                </tr>
<?php endforeach; ?>
        </table>
    </body>
</html>
