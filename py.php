
<?php 
$led = $_POST["ledon"];
#echo $led;
if ($led == ""){
}
else if ($led != "1") {
	system("sudo python ./py/ledon.py",$result);
} else {
	system("sudo python ./py/ledoff.py",$result);
}
#system("sudo python ./py/dht11.py",$result);
#echo $result;
#header("Location: $_SERVER['HTTP_REFERER"); 
#echo  $_SERVER['HTTP_REFERER'];
system("sudo python ./py/dht11.py",$result);

?>
