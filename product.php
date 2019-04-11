<?php
session_start();
//require("database_handler.php");
echo '<div class="background_image">';
include("header.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $product_sql = "SELECT * FROM products WHERE product_id='{$id}'";
    $prod_query = mysqli_query($conn, $product_sql);
    $prod_row = mysqli_fetch_assoc($prod_query);
     //   echo "id = {$id} name={$prod_row['product_name']}";
    $bg= $prod_row['image_count'] - 1;
    /*if($bg >= 5){
    $bg = $bg-1;
    }else{
        $bg = $bg-1;
    }
    */
    if($bg == 2){
        $bg = $bg +1;
    }
}

if(isset($_POST['product_submit'])){
    
    $sql_find_sku = "SELECT sku FROM inventory_stock WHERE prod_id={$_POST['prod_id']} AND size_id={$_POST['size_id']}";
    $find_sku_res = mysqli_query($conn, $sql_find_sku);
    $sku_row = mysqli_fetch_assoc($find_sku_res);
   // echo $sql_find_sku." SKU ++==".$sku_row['sku'];
    $sql_insert_cart  = "INSERT INTO cart_items(user_id, product_sku, quantity) VALUES('{$_POST['user_id']}','{$sku_row['sku']}', '1')";
    $res_insert = mysqli_query($conn, $sql_insert_cart);
    
}


?> 
<html>
        

    <style>
        .background_image{
            background-image: url('./Images/Products/<?php echo"{$id}/".$bg;?>.jpg') ;
            background-repeat: no-repeat;
             background-attachment: fixed;
            background-size:cover;
  z-index: 1;
  display: block;
            

        } 
        
        #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
        .prod_title{
            <?php if($id<14){
       echo "color:dodgerblue;";
        }else{
           echo "color: palevioletred;";
        }?>
        }
       
    </style>
    
    <link rel="stylesheet" type="text/css" href="./product_page_style.css">

    <body>
        <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="img-responsive modal-content" id="img01">
  <div id="caption"></div>
</div>
        <img style="display:none;" id="myImg" src="./Images/SizeGuide.jpg" alt="Women's Size Guide" width="300" height="200">
        
<div class="product_wrapper">

     <div class="bg w3-animate-opacity" id="hero_image2" ></div>

      <div class="container-fluid">
        
        <div class="col-sm-3">
            <DIV align="center" class="prod_title"><?php echo "{$prod_row['product_title']}"; ?></DIV>
        </div>
           <div class="col-sm-1">
        </div>
        <div align="center" id="prod_name" class="col-sm-3">
        <?php echo "{$prod_row['product_name']}"; ?>
        </div>
        
    </div>
    
    <div class="container-fluid">
        
        <div class="col-sm-6">
            <!-- Give a Carousel Here for Images

                When Clicked, Open in large view mode

                -->
            
            <div style="background:none;" class="container-fluid">

  <div  id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php for($i=2;$i<=$prod_row['image_count'];$i++){
      echo "<li data-target='#myCarousel' data-slide-to='{$i}'></li>";}
          ?>
    </ol>

    <!-- Wrapper for slides -->
    <div  class="carousel-inner">
        
        
      <div  class="item active">
        <img style="border-radius:10px" class="img-responsive" src="./Images/Products/<?php echo"{$id}/1.jpg" ?>" alt="Los Angeles" style="width:100%;">
      </div>
        <?php
        for($i=2;$i<=$prod_row['image_count'];$i++){
            
            echo "
            <div class='item'>
        <img style='border-radius:10px'' class='img-responsive' src='./Images/Products/{$id}/{$i}.jpg' style='width:100%;'>
      </div>
            ";
        } ?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- Carousel ends -->
            
            
            
        </div>
        <div class="col-sm-6">
        <form action="./product.php?id=<?php echo"{$id}&snack=1";?>" method="post">
            <div  class="container-fluid">
            <div class="col-sm-3" id="price">&#8377; <?php echo"{$prod_row['price']}"?>
                <br><h5 style="font-family:dosis;font-size:1rem;">(Incl. all Taxes)</h5></div>
                <div class="col-sm-2 size_selector" >
                Size: <select name="size_id" id="size_selector">
                   <?php 
    $sql_sizes = "SELECT size,size_id FROM size_table WHERE size_id IN (SELECT size_id FROM inventory_stock WHERE prod_id='{$id}' AND stock !='0')";

$result_sizes = mysqli_query($conn, $sql_sizes);

if($result_sizes){
 
         while($row_sizes = mysqli_fetch_assoc($result_sizes)) {
        
             echo "
             <option value='{$row_sizes['size_id']}'> {$row_sizes['size']}</option>";
             
    }
} ?>
                    </select>
                    <br><?php if($id>13){
                    echo'<a id="size_chart" onclick="modal_display()">(Guide)</a>';
}?>
                    <br><br>
        <input type="hidden" name="user_id" value="<?php echo "{$_SESSION['user_id']}";?>">
            <input type="hidden" name="prod_id" value="<?php echo"{$id}";?>">
             <input class="btn" id="product_submit_btn" value="Add to Bag" name="product_submit" type="submit">
                <div id="snackbar">Added to Bag</div>
                    
                </div> 
                <div class="col-sm-3" id="color"><?php echo"{$prod_row['color']}";?></div>
                <div class="col-sm-4" id="description"> <?php echo "{$prod_row['feature_description']}"?></div>
            </div>
            <div class="container-fluid">
                            </div>
</form> 
        </div>
        
    </div>
    
    
    
        </div>
        <script>
            
    
        function SnackBarFunction() {
           
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
            
 <?php           
if(isset($_GET['snack'])){
   echo"SnackBarFunction();"; 
}?>
            
            // Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
function modal_display(){
    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
            
        </script>
        
</body></div>
<!--Background Div Ends -->
</html>


