
<?php 
$led = $_POST["ledon"];
$bt4 = $_POST["bt4"];
echo $bt4;
#echo $led;
if (isset($_POST["ledon"])){				//����ť��������ʱִ�У�
	$on = escapeshellcmd("sudo python ./py/ledon.py");  //��escapeshellcmd�������Ӱ�ȫ�ԣ�
	$off = escapeshellcmd("sudo python ./py/ledoff.py");
	if ($led == ""){
	}
	else if ($led != "1") {
		system($on,$result);//system�᷵�ؽ����
		echo $led;
		#passthru($on);  //passthru�����ؽ����
	} else {
		system($off,$result);
		echo $led;
		#passthru($off);
	}
}
else if (isset($bt4)){				//����ť��������ʱִ�У�
	$file = './data/bt4.txt';//д����ļ���
	$content=$bt4;
	(!$handle = fopen($file,'w')) && die("can not open file<b>$file</b>");//д���ļ�
	(!fwrite($handle, $content)) && die("write file<b>$file</b>failue");
	echo "success!";
	fclose($handle);//�ر��ļ�

	$on1 = escapeshellcmd("sudo service motion start");  //��escapeshellcmd�������Ӱ�ȫ�ԣ�
	$off1 = escapeshellcmd("sudo service motion stop");
	if ($bt4 == ""){
	}
	else if ($bt4 != "0") {
		#system($on,$result);//system�᷵�ؽ����
		passthru($on1);  //passthru�����ؽ����
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
