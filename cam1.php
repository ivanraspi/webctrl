<?php
$bt = $_POST['bt'];

if(isset($_POST['bt'])){
$file = './data/bt2.txt';//д����ļ���
$content=$_POST['bt'];
(!$handle = fopen($file,'w')) && die("can not open file<b>$file</b>");//׷�ӷ�ʽд���ļ�
(!fwrite($handle, $content)) && die("write file<b>$file</b>failue");
echo "success!";
fclose($handle);//�ر��ļ�
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