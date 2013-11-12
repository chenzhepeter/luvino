<?php
include("config.php");


$fwm=$_POST[fwm];


$sql="SELECT * FROM fwm WHERE fwm='{$fwm}'"; 
$res=mysql_query($sql,$conn);
$row=mysql_fetch_array($res);

if(is_array($row))
{
	$cxcs=$row[cxcs];
	$mes="此产品为正品，共查询:".$cxcs."次";
	$temp=$cxcs+1;
	$sql="update fwm set cxcs='{$temp}' where fwm='{$fwm}'";
	mysql_query($sql,$conn);

  	header("Location:index.php?mes={$mes}");
}else
{
	$mes="此产品并非正品！";
	header("Location:index.php?mes={$mes}");
	
}
?>