<?php

$before = array(135,136,137,138,139,147,150,151,152,157,158,159,178,182,183,184,187,188,198,130,131,132,155,156,145,175,176,185,186,166,133,149,153,173,177,180,181,189,199);
$count  = count($before)-1;

for ($i=0; $i < 5; $i++) { 
	$arrs[] = $before[mt_rand(0,$count)].mt_rand(10000000,99999999);
}

echo json_encode($arrs);