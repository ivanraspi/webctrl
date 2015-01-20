
<?php 
$led = $_POST["ledon"];
$bt4 = $_POST["bt4"];
echo $bt4;
#echo $led;
if (isset($_POST["ledon"])){				//传按钮参数进来时执行；
	$on = escapeshellcmd("sudo python ./py/ledon.py");  //用escapeshellcmd可以增加安全性；
	$off = escapeshellcmd("sudo python ./py/ledoff.py");
	if ($led == ""){
	}
	else if ($led != "1") {
		system($on,$result);//system会返回结果；
		echo $led;
		#passthru($on);  //passthru不返回结果；
	} else {
		system($off,$result);
		echo $led;
		#passthru($off);
	}
}
else if (isset($bt4)){				//传按钮参数进来时执行；
	$file = './data/bt4.txt';//写入的文件名
	$content=$bt4;
	(!$handle = fopen($file,'w')) && die("can not open file<b>$file</b>");//写入文件
	(!fwrite($handle, $content)) && die("write file<b>$file</b>failue");
	echo "success!";
	fclose($handle);//关闭文件

	$on1 = escapeshellcmd("sudo service motion start");  //用escapeshellcmd可以增加安全性；
	$off1 = escapeshellcmd("sudo service motion stop");
	if ($bt4 == ""){
	}
	else if ($bt4 != "0") {
		#system($on,$result);//system会返回结果；
		passthru($on1);  //passthru不返回结果；
	} else {
		#system($off,$result);
		passthru($off1);
	}
}


else {
	$dht = escapeshellcmd("sudo python ./py/dht11.py");
	$uptime = escapeshellcmd("uptime>./data/uptime.txt");

	passthru($dht);
	passthru($uptime);
}



?>
