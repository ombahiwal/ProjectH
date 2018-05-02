<?php 
// uploadOK is a flag used to indicate errors in file uploading.
$uploadOk = 1;
// Check if the uploaded file is an Image.
if(isset($_POST["search_submit"])) {
    $target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
   // echo "<br>Sorry, file already exists.<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
   // echo "<br>Sorry, your file is too large. Must be less than 500KB<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" ) {
    //echo "<br>Sorry, only JPG files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
    $image_path = $target_dir.basename( $_FILES["fileToUpload"]["name"]);
    
if($uploadOk == 1){
    header("location:./index.php?inputpath={$image_path}&reload=1");
 echo "File Uploaded";
}else{
    echo "<h1>Could not Upload</h1>";
    
    
}

}

if(isset($_GET["path"])){
    
    echo "<img src='{$_GET['path']}'>";
}


//redirect("./result.php");
//header("location:results.php");
?>

