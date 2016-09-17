<?php
include "include/config.php";//连接sql
?>

<style type="text/css"> 
.btnAudio{ width:36px; height:36px; position:absolute; right:30px; top:18px; overflow:hidden; background:url("http://pan.cccyun.cn/view.php/7a1a6d1c1426c7ce866712f1c058b69d.png") left top no-repeat; z-index:100;}
.rotate1circle{-webkit-animation:rotate1circle 1s linear infinite;}
@-webkit-keyframes rotate1circle {
        0% {
                -webkit-transform-origin:center center;
                -webkit-transform:rotate(0deg);
        }
        100% {
                -webkit-transform-origin:center center;
                -webkit-transform:rotate(360deg);
        }
} 
</style>
 
<?php  
if($bfqkq == "1"){
	echo '<section class="u-audio hidden" data-src="'.$bfqdz.'"></section><div class="btnAudio" id="btnAudio"></div>';
}
?>

<script> var bg_audio_val = true;
var bg_audio = new Audio();
function audio_init(){
        var options_audio = {
                loop: true,
                preload: "auto",
                src: $('.u-audio').attr('data-src')
        }
        for (var key in options_audio) {
                bg_audio[key] = options_audio[key];
        }
        bg_audio.load();
        audio_addEvent();
        bg_audio.play();
}
function audio_addEvent(){
        $("#btnAudio").on('click', audio_control);
        $(bg_audio).on('play',function(){
                bg_audio_val = false;
                $('#btnAudio').addClass('rotate1circle');
        })
        $(bg_audio).on('pause',function(){
                $('#btnAudio').removeClass('rotate1circle');
        })
}
function audio_control(){
        if(!bg_audio_val){
                bg_audio.pause();
                bg_audio_val = true;
        }else{
                bg_audio.play();
        }
}
audio_init(); 
</script>