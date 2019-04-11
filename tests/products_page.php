<?php
     /*
     Problem --- The problem is fetching sku from inventory_stock table and 
     seperately displaying item from products table
     */
    $id="root";$pass="root"; $db="fashiondb"; $conn=mysqli_connect('localhost',$id,$pass,$db);
    $sql = "SELECT * from inventory_stock";
    $result = mysqli_query($conn, $sql);
    
if(isset($_REQUEST['added'])){
    $add_stat = array($_REQUEST['added'], $_REQUEST['id']);}
   else{
       $add_stat = array(0,0);
   }
    
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $url = "./add_to_cart.php?product_id={$row['sku']}";

        echo $row['product_title']." <a href='".$url."'>add to cart</a>";
        if($add_stat[0] !=0 && $add_stat[1] == $row['sku']){
            echo"Item added! <br>";
           
        }else{
            echo"<br>";
        }
    }
        
}

    
    
    
    
/*  
<a href= "./cart.php?test='$productID'&test2='value2'&productid=1">add to cart </a>
$sql = "INSERT INTO user ".
               "(username,email_id, passkey) "."VALUES ".
               "('Omkar Bahiwal','ombahiwal@gmail.com','Omkar123')";
               */
               
            
/*$sql = "INSERT INTO products (product_name) VALUE ('Blue Jeans')";    
            $retval = mysqli_query($conn, $sql);
     print_r($retval);       
    if($retval){
        echo"value Inserted";
    }
    */
            

    
    
    /*// Include Fpdf library before using it.
     require("../fpdf/fpdf.php");
    $pdf = new FPDF(); $pdf->addPage();
$pdf->setFont("Arial", 'B', 16); 
    $pdf->cell(40, 10, "Hello Out There!");
$pdf->output();
    */
    ?>