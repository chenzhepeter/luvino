<?php
include("config.php");

$fwm=$_GET[fwm];
$user=$_GET[cxuser];

$sql="SELECT * FROM fwm WHERE fwm='{$fwm}'"; 
$res=mysql_query($sql,$conn);
$row=mysql_fetch_array($res);

if(is_array($row))
{
	$cxcs=$row[cxcs];
	$cxtime=$row[cxtime];
    $cxuser=$row[cxuser];
    $product=$row[product];
    $temp=$cxcs+1;
    if ($temp==1){
        $mes="You bought a genuine bottle of ".$product.". You are the first user checking this code.";
        $sql="update fwm set cxcs='{$temp}',cxtime=now(),cxuser='{$user}' where fwm='{$fwm}'";
    }else{
        if ($user == $cxuser){
            $mes="You bought a genuine bottle of ".$product.". This code has been checked ".$cxcs." times. Last time you checked it at ".$cxtime;
        }else{
            $mes="This code has been checked ".$cxcs." times. Some other user checked it at ".$cxtime;
        }
        $sql="update fwm set cxcs='{$temp}',cxtime=now() where fwm='{$fwm}'";
    }
	
	mysql_query($sql,$conn);
}else
{
	$mes="Cannot authenticate this code. You might purchase a counterfeit product. Please contact us for help.";	
}
echo $mes
?>