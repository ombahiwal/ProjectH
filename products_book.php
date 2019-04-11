
<?php
session_start();
include("header.php");
include("database_handler.php");

 if(isset($_REQUEST['cat_id'])){
    $p_id = 0;
    $cat_id = $_REQUEST['cat_id'];
    
    }else{
     echo "Invalid page";
     throw(e);
 }
?>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./product_book_css.css"></head>
<style>
    .snip1577 h3{
        <?php
        if($cat_id == 1){
       echo "color:dodgerblue;";
        }else{
           echo "color: palevioletred;";
        }
        ?>
 
}

</style>
<body align="center">
    <div class="lookbook"><div>Hetvi's  Lookbook</div>
    <div class="h w3-animate-fading">H</div><?php if($cat_id == 1 || $cat_id==4) echo"For Men";
        else
            echo"For Women"
                                 ?></div>
    
    <?php
    if($cat_id == 1)
    $cat2 = 4;
    else
    $cat2 = 3;
        if(!isset($_REQUEST['single'])){
        $sql_products = "SELECT * FROM products where category_id='{$cat_id}' OR category_id='{$cat2}'";}
        else{
            $sql_products = "SELECT * FROM products where category_id='{$cat_id}'";        }
   
    $res_products = mysqli_query($conn, $sql_products);

    while($rowp = mysqli_fetch_assoc($res_products)){
        $p_id= $rowp['product_id'];
    if($p_id%2 == 0){ echo "
    <!-- Product Element  Start odd-->
    <div class=\"container-fluid\" align=\"center\">
         <div class=\"col-sm-2\">
        </div> 
        <div class=\"col-sm-6\">
<figure onmouseover=\"changeIt(this, {$p_id});\" onmouseout=\"changeOut(this, {$p_id})\" class=\"snip1577\">
  <img id=\"{$p_id}\" src=\"./Images/Products/{$p_id}/1.jpg\" />
  <figcaption>
    <h3>{$rowp['product_title']}</h3>
    <h4>{$rowp['product_name']}</h4>
    <h4><div class=\"price\">&#8377;{$rowp['price']}
        </div> </h4>
  </figcaption>
  <a href=\"./product.php?id={$p_id}\"></a>
</figure>
        </div>
        <div class=\"col-sm-4\">
     
        </div>   
    </div>
    <!-- Product Element end odd-->";
    }else{
    echo "
    <!-- Product Element  Start even-->
    <div class=\"container-fluid\" align=\"center\">
         <div class=\"col-sm-5\">
        </div> 
        <div class=\"col-sm-6\">
<figure onmouseover=\"changeIt(this, {$p_id});\" onmouseout=\"changeOut(this, {$p_id})\" class=\"snip1577\">
  <img id=\"{$p_id}\" src=\"./Images/Products/{$p_id}/1.jpg\" />
  <figcaption>
    <h3>{$rowp['product_title']}</h3>
    <h4>{$rowp['product_name']}</h4>
    <h4><div class=\"price\">&#8377;{$rowp['price']}
        </div> </h4>
  </figcaption>
  <a href=\"./product.php?id={$p_id}\"></a>
</figure>
        </div>
        <div class=\"col-sm-1\">
     
        </div>   
    </div>
    <!-- Product Element end even-->
    ";}
    
    }
    ?>
    
    <div class="container-fluid bottomselector">
        <div class="col-sm-6"><a href="<?php if($cat_id == 1 || $cat_id==4) echo"./products_book.php?cat_id=4&single=1";
        else
            echo"./products_book.php?cat_id=3&single=1";?>">T-Shirts</a></div>
        <div class="col-sm-6"><a href="<?php if($cat_id == 1 || $cat_id==4) echo"./products_book.php?cat_id=1&single=1";
        else
            echo"./products_book.php?cat_id=2&single=1"
                                 ?>">Jeans</a></div>
    </div>
    <!--
 <!-- Product Element  Start odd
    <div class="container-fluid" align="center">
         <div class="col-sm-2">
        </div> 
        <div class="col-sm-6">
<figure onmouseover="changeIt(this, 14);" onmouseout="changeOut(this, 14)" class="snip1577">
  <img id="14" src="./Images/Products/14/1.jpg" alt="sample99" />
  <figcaption>
    <h3>Product Title</h3>
    <h4>Short Description</h4>
    <h4><div class="price">&#8377;1000
        </div> </h4>
  </figcaption>
  <a href="./product.php?id=14"></a>
</figure>
        </div>
        <div class="col-sm-4">
     
        </div>   
    </div>
    <!-- Product Element end odd
    
    <!-- Product Element  Start even
    <div class="container-fluid" align="center">
         <div class="col-sm-5">
     
        </div> 
        <div class="col-sm-6">
            
<figure onmouseover="changeIt(this, 15);" onmouseout="changeOut(this, 15)" class="snip1577">
  <img id="15" src="./Images/Products/15/1.jpg" alt="sample99" />
  <figcaption>
    <h3>Product Title</h3>
    <h4>Short Description</h4>
    <h4><div class="price">&#8377;1000
        </div> </h4>
  </figcaption>
  <a href="./product.php?id=15"></a>
</figure>
        </div>
        <div class="col-sm-1">
     
        </div>   
    </div>
    <!-- Product Element end even-->
    
    </body>
    
    <script>
    function changeIt(element, id){  
        document.getElementById(id).src = "./Images/Products/"+id+"/2.jpg";
       
    }
        function changeOut(element,id ){
        document.getElementById(id).src = "./Images/Products/"+id+"/1.jpg";
        }
        //change(document.getElementById())
    </script>
</html>