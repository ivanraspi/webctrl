<?php
$bt = $_POST['bt'];
/////****���²�����****/////
$ab=$_REQUEST["ab"];
if(isset($_REQUEST["ab"])){
echo $ab;
}
else{
//echo "can't get param";
}
/////****���ϲ�����****/////
echo $bt;
#system("head ./data/bt2.txt",$result);


if(isset($_POST['bt'])){
$file = './data/bt2.txt';//д����ļ���
$content=$_POST['bt'];
(!$handle = fopen($file,'w')) && die("can not open file<b>$file</b>");//׷�ӷ�ʽд���ļ�
(!fwrite($handle, $content)) && die("write file<b>$file</b>failue");
echo "success!";
fclose($handle);//�ر��ļ�
}


if  ($bt == "1"){
  $CP = "sudo cp ./img/pic.jpg ./img/pic`date +%y%m%d_%H%M%S`.jpg";
  passthru($CP);
  $Fcam = escapeshellcmd("sudo fswebcam -d /dev/video0 -r 320x240  --jpeg 85 --shadow --title 'Ivans RasPiCam' --subtitle 'For Monitor' --info 'Ivan' -q --timestamp '%Y-%m-%d %H:%M:%S' --save ./img/pic.jpg");
  passthru($Fcam);
}
else {
}

?>