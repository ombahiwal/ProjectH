<html>
    <body>
    
    <form method="post" action="#">
        <h3>Insert stock and Product ID</h3>
        <br>Enter Product ID : <input type="text" name="p_id">
        <br>Insert no. of units: <input type="text" name="units1">
        <br>Size ID: <input type = "text" name="sid">
        
    <input type="submit">
        </form>
    </body>
    
    
    <?php
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
        <div class="logo_title">HETVI.com</div>
  </div>
</nav>
    
    require("database_handler.php");
    $j = 0;
    for($i = 18; $i <23;$i++){
    for($j = 1; $j<5;$j++){
        $sql_insert = "INSERT INTO inventory_stock(prod_id, stock,size_id) VALUES('{$i}',100,'{$j}')";
    $result = mysqli_query($conn, $sql_insert);
        if($result){echo "sux";}
    }
    
    }
    
    
    if(isset($_POST['units1'])){
        $p_id = $_POST['p_id'];
        $units = $_POST['units1'];
        $size_id = $_POST['sid'];
          $sql_insert = "INSERT INTO inventory_stock(prod_id, stock,size_id) VALUES('{$p_id}','{$units}','{$size_id}')";
    $result = mysqli_query($conn, $sql_insert);
        

        
    if($result){
        echo"Data Inserted Successfully";
        }else{
        echo "Could not Insert, Check values";
    }
    }
    /*
    if(isset($_POST['units2'])){
        
$p_id = $_POST['p_id'];
        $units = $_POST['units2'];
        $size_id = $_POST['sid'];
          $sql_insert = "Update inventory_stock SET stock='{$units}' WHERE prod_id='{$p_id}'";
    $result = mysqli_query($conn, $sql_insert);
        
    if($result){
        echo"Data Updated Successfully";
        }else{
        echo "Could not Update, Check values";
    }
    
        
    }
    
    
    */
    ?>
</html>