<?php
$bt = $_POST['bt'];
/////****以下测试用****/////
$ab=$_REQUEST["ab"];
if(isset($_REQUEST["ab"])){
echo $ab;
}
else{
//echo "can't get param";
}
/////****以上测试用****/////
echo $bt;
#system("head ./data/bt2.txt",$result);


if(isset($_POST['bt'])){
$file = './data/bt2.txt';//写入的文件名
$content=$_POST['bt'];
(!$handle = fopen($file,'w')) && die("can not open file<b>$file</b>");//追加方式写入文件
(!fwrite($handle, $content)) && die("write file<b>$file</b>failue");
echo "success!";
fclose($handle);//关闭文件
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