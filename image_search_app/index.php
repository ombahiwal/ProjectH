<?php
echo "Loading... Please Wait...";
//header("location:../index.php");
//$somevar = $_GET["uid"]; 
//echo $somevar;

?>
<!doctype html>

<html>
<head>
  <meta charset="utf-8">
  <title>feature matching</title>
  <link rel="stylesheet" href="assets/demo.css">
  <script src="./build/tracking-min.js"></script>
  <script src="./node_modules/dat.gui/build/dat.gui.min.js"></script>

  <style>
  .demo-container {
    background-color: black;
      align-self: center;
  }
  #image1, #image2 {
    position: absolute;
    left: -1000px;
    top: -1000px;
  }
  #canvas {
align-content:center;    
  }
  </style>
</head>
<body>
  <div class="demo-title">
    <p id = "test"></p>
  </div>

    <br>
    <div align="center" style="float: right; color:white">
        <br>Input
    <img height="20%" width="20%"id="input"/>
        ===>
    <img height="20%" width="20%"id="result"/>
        Probable Match
    </div><br>
    <div align="center"class="demo-container">
      <img id="image1" style="display: none" />
      <img id="image2"  style="display: none"/>
      <canvas id="canvas" width="786" height="295"></canvas>
    </div>

  <script>
  window.onload = function() {
    var width = 393;
    var height = 295;
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');

    window.descriptorLength = 256;
    window.matchesShown = 50;
    window.blurRadius = 2;

    var doMatch = function(image1, image2) {
      tracking.Brief.N = window.descriptorLength;

      context.drawImage(image1, 0, 0, width, height);
      context.drawImage(image2, width, 0, width, height);
  
      var imageData1 = context.getImageData(0, 0, width, height);
      var imageData2 = context.getImageData(width, 0, width, height);
  
      var gray1 = tracking.Image.grayscale(tracking.Image.blur(imageData1.data, width, height, blurRadius), width, height);
      var gray2 = tracking.Image.grayscale(tracking.Image.blur(imageData2.data, width, height, blurRadius), width, height);
  
      var corners1 = tracking.Fast.findCorners(gray1, width, height);
      var corners2 = tracking.Fast.findCorners(gray2, width, height);
  
      var descriptors1 = tracking.Brief.getDescriptors(gray1, width, corners1);
      var descriptors2 = tracking.Brief.getDescriptors(gray2, width, corners2);
  
      var matches = tracking.Brief.reciprocalMatch(corners1, descriptors1, corners2, descriptors2);

      matches.sort(function(a, b) {
        return b.confidence - a.confidence;
      });

      for (var i = 0; i < Math.min(window.matchesShown, matches.length); i++) {
        var color = '#' + Math.floor(Math.random()*16777215).toString(16);
        context.fillStyle = color;
        context.strokeStyle = color;
        context.fillRect(matches[i].keypoint1[0], matches[i].keypoint1[1], 4, 4);
        context.fillRect(matches[i].keypoint2[0] + width, matches[i].keypoint2[1], 4, 4);

        context.beginPath();
        context.moveTo(matches[i].keypoint1[0], matches[i].keypoint1[1]);
        context.lineTo(matches[i].keypoint2[0] + width, matches[i].keypoint2[1]);
        context.stroke();
          

      }
        //
        return matches.length;
    };

      var max= [];
      var list = [];
      max[0]= 0;
      max[1] = "";
      var i =0;
      var j = 0;
      var image_count = 3;
      var products_count = 22;
            var image1 = document.getElementById('image1');
          var image2 = document.getElementById('image2');
            var list_counter = 0;
      // LOOP for cycling through Images
     image1.src = "<?php if(isset($_GET['inputpath'])){ echo $_GET['inputpath']; }?>";
    //image1.src = "../Images/Products/11/3.jpg";
      image1.src = "./uploads/3.jpg";
      document.getElementById("input").src = image1.src;
      //image1.src = document.getElementById("input").src;
      
      for(i=1;i<=image_count;i++){
          for(j=3;j<=products_count;j++){
              image2.src = "../Images/Products/"+j+"/"+i+".jpg";
          var current_match = doMatch(image1, image2);
          if(current_match >= max[0]){
              max[0] = current_match;
              max[1] = image2.src;
              if(list_counter > products_count - 4)
              {list[list_counter] = image2.src;}
              list_counter += 1;
          }}
      }
  //Fix Reload Problem and pass the Result array to the next header.  

      /*
setTimeout(function(){
    setTimeout(function(){
        window.location ="./search.php?path="+max[1];
    }, 8000);
    location.reload();
    
    
    
}, 10000);
*/

      document.getElementById("test").innerHTML = "Feature Matches= "+max[0]+"<br>Matched Image Path= "+max[1]+ " " ;
      document.getElementById("result").src = max[1];
      
      
      
      
      // Fix This Code Later
      
      //code to reload once and send query
      
           var getReload = <?php echo $_GET['reload'];?>;
      if(getReload == 1 ){
         setTimeout(function(){ window.location =  "./index.php?inputpath=<?php echo $_GET['inputpath'];?>&reload=0";}, 10*1000);
          
         
      }else{
        
          setTimeout(function(){window.location = "./search.php?path="+max[1];}, 10 * 1000);
         
      }
      
        //window.location ="./search.php?path="+max[1];
      
      
      
      
    var gui = new dat.GUI();
    gui.add(window, 'descriptorLength', 128, 512).step(32).onChange(doMatch);
    gui.add(window, 'matchesShown', 1, 100).onChange(doMatch);
    gui.add(window, 'blurRadius', 1.1, 5).onChange(doMatch);
  }
 

  </script>
</body>
</html>
