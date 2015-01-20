<?php
$bt = $_POST['bt'];

if(isset($_POST['bt'])){
$file = './data/bt2.txt';//写入的文件名
$content=$_POST['bt'];
(!$handle = fopen($file,'w')) && die("can not open file<b>$file</b>");//追加方式写入文件
(!fwrite($handle, $content)) && die("write file<b>$file</b>failue");
echo "success!";
fclose($handle);//关闭文件
}


if  ($bt == "1"){
  $CP = escapeshellcmd("sudo service motion start");
  passthru($CP);
  echo "start";
  }
else {
  $CP = escapeshellcmd("sudo service motion stop");
  passthru($CP);
  echo "stop";
}

?>