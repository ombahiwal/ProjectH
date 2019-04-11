<?php
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}  
    require("./database_handler.php");
   // $prodid = $_REQUEST['product_id'];
   /* $sql = "SELECT * from products where product_id ={$prodid}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['product_name']." Added to the cart";
    }
    }
    */
   // $sql = "INSERT into cart_items(product_sku, user_id, quantity) values('{$prodid}', 12,1) ";
   // $result = mysqli_query($conn, $sql);
echo" f";
        redirect("./products_page.php?added=1&");
//AR8t0be-U6cynWvOgSn2ZVeDhYIzRT0-xHyCJhOpGsrvx36avbZfnRoDkQI13y9w898mBepaxKPAH3Yr
    ?>