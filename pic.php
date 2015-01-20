<?php
#$img = escapeshellcmd("ls ./img|head -n 1");

system("ls ./img -t|grep jpg|head -n 1",$result);



?>