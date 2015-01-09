<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" /> 
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>Ivan's RasPi!</title>
<script src="./statics/jquery-1.11.1.min.js">
</script>

<script>
$(document).ready(function(){
  
};
</script>

<script>
$(document).ready(function(){
   $.post("k.php",function(data1,status){
        $('#v1').attr("value",data1);
           if (data1=="0"){
          $('#led').attr("class","switch_button on");
        }
        else{
           $('#led').attr("class","switch_button off");
        }
     });
  setInterval(function() {
     $("#v1").load(location.href+" #v1>*","");
    $("#v2").load(location.href+" #v2>*","");
    $("#v3").load(location.href+" #v3>*","");
    $.post("py.php",function(data,status){
    $('#v2').load('./data/c.txt');
    //#alert(data);
    $('#v3').load("./data/h.txt");
     //#$('#v1').load("./data/k.txt");     
     });
    
   }, 10000);
  


  $("#led").click(function(){
    if ($(this).attr("class") != "switch_button on"){
       $(this).attr("class","switch_button on");
       $.post("py.php",{ledon:1},function(data,status){
       //##alert("Data: " + data + "\nStatus: " + status);
       });
     }
     else{
       $(this).attr("class","switch_button off");
       $.post("py.php",{ledon:0},function(data,status){
       //##alert("Data: " + data + "\nStatus: " + status);
       });
      }    
    });
     
  

});
</script>
<style>
a {
    font-size:1em;
}
.switch_button {background-image:url(./statics/switch_status.png);background-repeat:no-repeat;width:65px;height:91px;margin-bottom:30px;float:left;cursor:pointer;}
.switch_button.on {background-position:-65px 0px}
.switch_button.off {background-position:0px 0px}
</style>
</head>
<body bgcolor="white" text="black" width="auto">
<center >
<div>
<a>
<a><img src="./statics/log.png" style="width:2.5em;" /></a>
<a style="font-size:2em;">Ivan's RasPi!</a>
</a>
</div>
</center>
<br>
<div>
<a>当前温度:</a>
<a id="v2"></a>
<a>℃ ， 当前湿度:</a>
<a id="v3"></a>
<a>℃</a>
<br>
<br>
<a>开关控制:</a><br>
<input type="hidden" id="v1" value='' name="ledon" />
<div id="led" class="switch_button" status="0"></div>
</div>
</body>
</html>
