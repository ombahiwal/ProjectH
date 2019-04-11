<?php
require("database_handler.php");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

 while($row = mysqli_fetch_assoc($result)){
        echo "<br>
        <br><h2>{$row['product_title']}</h2>
        {$row['product_name']}
        <br>{$row['price']}
        <br>{$row['feature_description']}
        <br><br>
        ";}

/*


*/

?>