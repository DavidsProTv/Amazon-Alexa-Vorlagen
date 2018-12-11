var script = document.createElement('script');
script.src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js";
document.getElementsByTagName('head')[0].appendChild(script);
$(document).ready(function() {
  getdata();
  function getdata(){
    jQuery.get('https://meineseite.de/Browser/befehl.php', function(data) {

        if(data != "nichts"){
          if(data == "play"){
            document.getElementsByTagName("video")[0].play();
          }
          if(data == "play "){
            document.getElementsByTagName("video")[0].play();
          }
          if(data == "stop"){
            document.getElementsByTagName("video")[0].pause();
          }
          if(data == "stop "){
            document.getElementsByTagName("video")[0].pause();
          }
          console.log(data);
        }
        setTimeout(getdata(), 1000);
    });
  }

})
