<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" /> 
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>Ivan's RasPi!</title>
<script src="./statics/jquery-1.11.1.min.js">
</script>

<script>
$(document).ready(function(){
  
}
</script>

<script>
$(document).ready(function(){
   function Cam(){      //第二个自动刷新,刷新相头
     $.post("pic.php",{bt:1},function(data){
	 $('#cam1').attr("src","./img/"+data);
	 //#$("#cam1").load(location.href+" #cam1>*","");
     	});
     }
   $.ajax({            				//载入时读取第一个开关状态
        url: './data/k.txt',
        dataType: 'text',
        error: function(xhr) { alert( xhr.responseText ); }, //如果你的url,txt有问题,将会提示
        success: function(data) {
            if (data=="0"){
                $('#led').attr("class","switch_button off");
            }
            else{
               $('#led').attr("class","switch_button on");
            }
        }
    });
   $.ajax({					//载入时读取第二个开关状态
        url: './data/bt2.txt',
        dataType: 'text',
        error: function(xhr) { alert( xhr.responseText ); }, //如果你的url,txt有问题,将会提示
        success: function(data) {
            if (data=="0"){
                $('#cam-b').attr("class","switch_button off");
            }
            else{
               $('#cam-b').attr("class","switch_button on");
	      
            }
        }
    });
   $.ajax({					//载入时读取第四个开关状态
        url: './data/bt4.txt',
        dataType: 'text',
        error: function(xhr) { alert( xhr.responseText ); }, //如果你的url,txt有问题,将会提示
        success: function(data) {
            if (data=="0"){
                $('#bt-4').attr("class","switch_button off");
	       $('#monitor').attr("style","display:none");
            }
            else{
               $('#bt-4').attr("class","switch_button on");
	      $('#monitor').attr("style","");
            }
        }
    });

   $.post("pic.php",function(data){
	 $('#cam1').attr("src","./img/"+data);
   });

   //$('#cam1').attr("src","./img/pic.jpg"); //刷新图片
   $('#v2').load('./data/c.txt');  //刷新温度
   $('#v3').load("./data/h.txt"); //刷新湿度
   $('#uptime').load('./data/uptime.txt'); //刷新数据
     
  setInterval(function() {   //第一个自动刷新
        
    $.post("py.php",function(){
    $('#v2').load('./data/c.txt');
    //#alert(data);
    $('#monitor').attr("src","http://ivanhaooray.eicp.net:7777/");
    $('#v3').load("./data/h.txt"); 
     $('#uptime').load('./data/uptime.txt');    
     });
     $.ajax({					//截入时读取第二个开关状态
        url: './data/bt2.txt',
        dataType: 'text',
        //error: function(xhr) { alert( xhr.responseText ); }, //如果你的url,txt有问题,将会提示
        success: function(data) {
            if (data=="1"){
                Cam();
            }
            else{               
            }
         }
      });     

   }, 10000);
  
 

  $("#led").click(function(){    //LED的按钮事件
    if ($(this).attr("class") != "switch_button on"){
       $(this).attr("class","switch_button on");
       $.post("py.php",{ledon:0},function(data,status){
       alert("Data: " + data + "\nStatus: " + status);
       });
     }
     else{
       $(this).attr("class","switch_button off");
       $.post("py.php",{ledon:1},function(data,status){
       alert("Data: " + data + "\nStatus: " + status);
       });
      }    
    });
     
   $("#cam-b").click(function(){    //第二个按钮事件
    if ($(this).attr("class") != "switch_button on"){
       $(this).attr("class","switch_button on");
       //#setInterval(Cam(), 3000);
       $.post("cam.php",{bt:1},function(data,status){  
       alert("Data: " + data + "\nStatus: " + status);
       });
     }
     else{
       $(this).attr("class","switch_button off");
	//#clearInterval(Cam());
       $.post("cam.php",{bt:0},function(data,status){  
       alert("Data: " + data + "\nStatus: " + status);
       });
      }    
    });
   $("#bt-3").click(function(){    //第三个按钮事件
    if ($(this).attr("class") != "switch_button on"){
       $(this).attr("class","switch_button on");
       //#setInterval(Cam(), 3000);
       $.post("1",{bt3:1},function(data,status){  
       alert("Data: " + data + "\nStatus: " + status);
       });
     }
     else{
       $(this).attr("class","switch_button off");
	//#clearInterval(Cam());
       $.post("1",{bt3:0},function(data,status){  
       alert("Data: " + data + "\nStatus: " + status);
       });
      }    
    });

    $("#bt-4").click(function(){    //第四个按钮事件
    if ($(this).attr("class") != "switch_button on"){
       $(this).attr("class","switch_button on");
       //#setInterval(Cam(), 3000);
       $.post("py.php",{bt4:1},function(data,status){  
       alert("Data: " + data + "\nStatus: " + status);
       });
	$('#monitor').attr("style","");
	//$('#monitor').load(location.href,"#monitor");
	setTimeout(function () { 
        		$('#monitor').attr("src","http://ivanhaooray.eicp.net:7777/");
    	}, 1000);
     }
     else{
       $(this).attr("class","switch_button off");
	//#clearInterval(Cam());
       $.post("py.php",{bt4:0},function(data,status){  
       alert("Data: " + data + "\nStatus: " + status);
       });
	$('#monitor').attr("style","display:none");
      }    
    });



});
</script>
<style>
a {
    font-size:0.9em;
}
.switch_button {background-image:url(./statics/switch_status.png);background-repeat:no-repeat;width:65px;height:91px;margin-bottom:15px;float:left;cursor:pointer;}
.switch_button.on {background-position:-65px 0px}
.switch_button.off {background-position:0px 0px}
.button {float:left;width:4.5em;}
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
<div style="display:-webkit-box">
<!--<a>运行时间:</a>
<a id="uptime" >
</a>-->
</div>

<div >
<a>CPU:</a>
<a>
<?php
   $t = shell_exec("cat /sys/devices/system/cpu/cpu0/cpufreq/scaling_cur_freq");
   echo sprintf("%sKHz  ", $t/1000);
   #echo sprintf("%s/1000=%sKHz", str_replace("\n", "", $t), $t/1000);
   ?>
</a>
<a>   CPU温度:</a>
<a>
<?php
   $t = shell_exec("cat /sys/class/thermal/thermal_zone0/temp");
   echo sprintf("%sC°", $t/1000);
   #echo sprintf("%s/1000=%sC°", str_replace("\n", "", $t), $t/1000);
   ?>
</a>

</div>
<div>
<a>室内温度:</a>
<a id="v2"></a>
<a>℃ ， 室内湿度:</a>
<a id="v3"></a>
<a>℃</a>
<br>
<br>

	<div class="button" >
		<a>LED开关</a><br>
		<input type="hidden" id="v1" value='' name="ledon" />
		<a id="led" class="switch_button" status="0" style="float:left;"></a>
	</div>
	<div class="button">
		<a>CAM开关</a><br>
		<input type="hidden" id="cam-b-1" value='' name="cam-b-1" />
		<a id="cam-b" class="switch_button" status="0" style="float:left;"></a>
	</div>
	<div class="button">
		<a>红外开关</a><br>
		<input type="hidden" id="bt-3-v" value='' name="bt-3-v" />
		<a id="bt-3" class="switch_button" status="0" style="float:left;"></a>
	</div>
	<div class="button">
		<a>XBMC</a><br>
		<input type="hidden" id="bt-4-v" value='' name="bt-4-v" />
		<a id="bt-4" class="switch_button" status="0" style="float:left;"></a>
	</div>
	<div class="button">
		<a>XBMC</a><br>
		<input type="hidden" id="bt-5-v" value='' name="bt-5-v" />
		<a id="bt-5" class="switch_button" status="0" style="float:left;"></a>
	</div>



</div>
<div></div>
    <div style="float:center;">
	<!--<iframe id="cam" style="width:640px;height:480px;" src="http://ivanhaooray.eicp.net:8081">
	</iframe>
	<img id="cam1" src="./img/pic.jpg" style="width:307px;height:240px;">-->
    </div>
    <div style="float:center;">
	<img id="monitor" display="none" class="shrinkToFit" alt="http://ivanhaooray.eicp.net:7777/" src="http://ivanhaooray.eicp.net:7777/" height="232" width="310">
	
    </div>
</body>
</html>
