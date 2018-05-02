

// Code for Background Motion.
var lFollowX = 0,
    lFollowY = 0,
    x = 0,
    y = 0,
    friction = 1 / 30;

function moveBackground() {
  x += (lFollowX - x) * friction;
  y += (lFollowY - y) * friction;
  
  translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

  $('.bg').css({
    '-webit-transform': translate,
    '-moz-transform': translate,
    'transform': translate
  });
    

  window.requestAnimationFrame(moveBackground);
}

$(window).on('mousemove click', function(e) {

  var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
  var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
  lFollowX = (30 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
  lFollowY = (20 * lMouseY) / 100;

});

moveBackground();

window.scroll({
  top: 2500, 
  left: 0, 
  behavior: 'smooth' 
});

// Scroll certain amounts from current position 
window.scrollBy({ 
  top: 100, // could be negative value
  left: 0, 
  behavior: 'smooth' 
});

// Scroll to a certain element
document.querySelector('.hello').scrollIntoView({ 
  behavior: 'smooth' 
});
// Code for background motion ends

/*
function change_hero_image() {
   
    document.getElementById("hero_image").style.background = "url('../images/bannes/jeansmj.jpg') no-repeat center center";
    document.getElementById("hero_image2").style.background = "url('../images/bannes/jeansmj.jpg') no-repeat center center";
}
change_hero_image();

setInterval(change_hero_image, 5000);
*/



function openNav_search() {
    document.getElementById("myNav_search").style.height = "100%";
}
function openNav_menu() {
    document.getElementById("myNav_menu").style.height = "100%";
}

function closeNav() {
    document.getElementById("myNav_search").style.height = "0%";
        document.getElementById("myNav_menu").style.height = "0%";

}

     var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        
        var bg_audio = document.getElementById("bg_audio"); 
       var is_audio_playing = false;
        
        // If it is a mobile phone, audio will not autoplay
        if(width < 650){
        bg_audio.pause();
            var is_audio_playing = false;
         //   document.getElementById("play_btn").style.display = "none";
         document.getElementById("play_btn").className = "glyphicon glyphicon-user glyphicon-volume-off";
        }
        
        function pauseAudio(){
            if(is_audio_playing){
            bg_audio.pause();
            document.getElementById("play_btn").className = "glyphicon glyphicon-user glyphicon-volume-off";
             is_audio_playing = false;
            }else{
                bg_audio.play();
                            document.getElementById("play_btn").className = "glyphicon glyphicon-volume-up";
               is_audio_playing = true; 
            }   
        }
    
    var img_count=0;
 var bg_urls = ["jeans_zara.jpg","mens_bg.jpg","join_zara.jpg","man_2.jpg","pdp.jpg", "womens_joe.jpg"];
        
    var bg_urls_select = ["jeans_zara.jpg","dress_zara.jpg","mens_bg.jpg","ready_zara.jpg"];
        
        function setBackgroundImg(x){
            if(img_count==bg_urls.length-1){
                img_count=0;
            }
            document.getElementById("hero_image2").style.background="url('./images/"+bg_urls[x]+"') no-repeat center center";
            document.getElementById("hero_image2").style.backgroundSize="cover";
           img_count +=1;
        }
        
        var bg_change_interval =  setInterval(function(){setBackgroundImg(img_count)}, 5000);

        function setBackground(x){
           clearInterval(bg_change_interval); document.getElementById("hero_image2").style.background="url('./images/"+bg_urls_select[x]+"') no-repeat center center";
            document.getElementById("hero_image2").style.backgroundSize="cover";
        }
        
        function resume_bg_change_interval(){
        bg_change_interval =  setInterval(function(){setBackgroundImg(img_count)},5000);
        }
