<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
    $sql_cart_count = "SELECT COUNT(user_id) as total FROM cart_items WHERE user_id={$_SESSION['user_id']}";
            $res_cart_count = mysqli_query($conn, $sql_cart_count);
              $row_cart_count = mysqli_fetch_array($res_cart_count);
            if($row_cart_count['total'] == 0){
             // do this when items are zero;   
            }
}
include("header.php");
include("database_handler.php");
// to remove an Item
if(isset($_POST['remove'])){
    $remove = mysqli_query($conn, "DELETE FROM cart_items where item_id='{$_POST['item_id']}'");
}

?>
<html>
    <head>
        <link href="./bag_style.css" rel="stylesheet" type="text/css"> 
    </head>
    <body>
        <div class="lookbook">Hetvi Shopping Bag (<?php  
          if($session_set == 1){
          $sql_cart_count = "SELECT COUNT(user_id) as total FROM cart_items WHERE user_id={$_SESSION['user_id']}";
            $res_cart_count = mysqli_query($conn, $sql_cart_count);
              $row_cart_count = mysqli_fetch_array($res_cart_count);
            echo $row_cart_count['total'];}
          ?>)</div>
        
    
        <div align="center"id="main_content">
        <div class="container-fluid">
            <div class="col-sm-8">
                <?php
                $grand_total = 0;
        //fetch_prod id from sql using joins
       // $sql_fetch = "SELECT * FROM cart_items WHERE user_id='{$_SESSION['user_id']}'";
        $sql_fetch = "SELECT * FROM cart_items INNER JOIN inventory_stock ON cart_items.product_sku=inventory_stock.sku";
        //echo  $sql_fetch;
                $count = 1;
        $res_fetch = mysqli_query($conn, $sql_fetch);
        while($row_fetch = mysqli_fetch_assoc($res_fetch)){
            $sql_p = "SELECT * FROM products where product_id='{$row_fetch['prod_id']}'";
            $res_p = mysqli_query($conn, $sql_p);
            while($row_p = mysqli_fetch_assoc($res_p)){
                //fetch size from size table
                $sql_size = "SELECT size from size_table where size_id='{$row_fetch['size_id']}'";
                $res_size = mysqli_query($conn, $sql_size);
                $row_size = mysqli_fetch_assoc($res_size);
    // Cart Item Card echo
                echo "<div class=\"line\"></div>
        <div class=\"cart_item\">
        <div class=\"container-fluid\">
            <div class=\"col-sm-1 item_count\"># {$count}</div>
            <div class=\"col-sm-4\"><a href=\"./product.php?id={$row_fetch['prod_id']}\"><img class=\"img-responsive product_img\" src=\"./Images/Products/{$row_fetch['prod_id']}/1.jpg\"></a></div>
            <div align=\"left\" class=\"col-sm-6\"><div class=\"item_title\"><a href=\"./product.php?id={$row_fetch['prod_id']}\">{$row_p['product_title']}</a></div><br>{$row_p['product_name']}<br>
                Q - <select name=\"quantity\" id=\"q_selector\"><option value=\"1\">1</option>
                </select>
                <br>Size - {$row_size['size']}<br>Color - {$row_p['color']}<br>Price - &#8377; {$row_p['price']}<br>(Incl. all Taxes)<br><br>InStock</div>
<div class=\"col-sm-1 bag_btn\">
    <form action=\"./bag.php\" method=\"post\">
        <input type=\"hidden\" name=\"item_id\" value=\"{$row_fetch['item_id']}\">
        <input type=\"submit\" name=\"remove\" value=\"remove\"></form></div>
        </div>
        </div>";
                $count = $count + 1;
                $grand_total = $grand_total + $row_p['price'];
            }
           
        }
                 
        ?>
                
                
                
                
                
                
               <!-- 
                <div class="line"></div>
        <div class="cart_item">
        <div class="container-fluid">
            <div class="col-sm-1 item_count"># 12</div>
            <div class="col-sm-4"><a href="./product.php?id=13"><img class="img-responsive product_img" src="./Images/Products/13/1.jpg"></a></div>
            <div align="left" class="col-sm-6"><div class="item_title"><a href="./product.php?id=13">Title</a></div><br>Name<br>
                Q - <select id="q_selector"><option value="1">1</option>
                </select>
                <br>Size - <br>Color - <br>Price - <br><br>InStock</div>
<div class="col-sm-1 bag_btn">
    <form action="./bag.php" method="post">
        <input type="hidden" name="item_id" value="5">
        <input type="submit" name="remove" value="Remove"></form></div>
        </div>
        </div>-->
                </div>
            <div class="col-sm-4 checkout_content">
            <form action="checkout.php" method="post">
                Grand Total : &#8377;<?php echo $grand_total;?>
                <br>
                Items : <?php echo $row_cart_count['total']; ?>
                <br><br>
                <?php include("paypal.php");?>
                
                </form>
            </div>
            </div>
        
        </div>
    </body>
    
    <script>
    <?php
        if($row_cart_count['total'] == 0){
            echo"document.getElementById(\"main_content\").innerHTML = \"<div class='empty'>Your Bag is Empty :(<br><A href='./index.php'>keep shopping ...</a></div>\"";
        }
        ?>
    </script>
</html>