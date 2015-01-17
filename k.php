<?php
$k = escapeshellcmd("head ./data/k.txt -n 1");
#system("head ./data/k.txt -n 1",$result);
passthru($k);

?>