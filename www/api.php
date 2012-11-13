<?php
$iniData = parse_ini_file(dirname(__FILE__)."/../config/config.ini",true);
mysql_connect($iniData["dbInfos"]["dbHost"],$iniData["dbInfos"]["dbUser"],$iniData["dbInfos"]["dbPassword"]);
mysql_select_db("mytracker");
$q = "SELECT lat,lng,deviceName,MAX(insertionDate) AS lastDate FROM mt_position";
$res = mysql_query($q); 

$inf = mysql_fetch_array($res,MYSQL_ASSOC);

echo json_encode($inf);
mysql_close();
?>