<?php
//$apicallurl = urlencode("http://api2.sinaapp.com/recognize/picture/?appkey=0020120430&appsecert=fa6095e123cd28fd&reqtype=text&keyword=http://luvino.ca/peter.jpg");
// $apicallurl = "http://api2.sinaapp.com/recognize/picture/?appkey=0020120430&appsecert=fa6095e123cd28fd&reqtype=text&keyword=http://luvino.ca/peter.jpg";
// $pictureJsonInfo = file_get_contents($apicallurl);
// //$pictureJsonInfo = file_get_contents($apicallurl);
// //$pictureJsonInfo = file_get_contents("http://www.google.com");
// echo $pictureJsonInfo;

// $apicallurl = "http://www.qr4.nl/QR-API-Dec.aspx?key=dX/POhdGkVd5K4aFhE47jT3X+WiFKssk&Loc=http://luvino.ca/Welcome.png";
// $pictureJsonInfo = file_get_contents($apicallurl);
// echo $pictureJsonInfo;
// echo "--end";

// $test = ' </style></head><body><div id="main"><div id="header"><h1><img alt="" width="32" height="32" src="zxing-icon.png"/> Decode Succeeded</h1></div><table style="width:100%"><tr><td>Raw text</td><td><pre style="margin:0">hello</pre></td></tr><tr><td>Raw bytes</td><td><pre style="margin:0">40 56 86 56 c6 c6 f0 ec   11 ec 11 ec 11 ec 11 ec';
// $start =strpos($test,'Raw text</td><td><pre style="margin:0">');

// if ($start !== false) {
// 	$end =strpos($test,'</pre></td></tr><tr><td>Raw bytes');
// 	echo substr($test,$start+39,$end-$start-39);
// }
echo file_get_contents("5.txt");
$apicallurl = "http://zxing.org/w/decode?u="."http://luvino.ca/Welcome.jpg";
//$apicallurl = "http://zxing.org/w/decode?u=http://mmsns.qpic.cn/mmsns/Qnjw0vMwGMrubLI7jCtiaDaxdISZceveq0QrFzGW8elXMaVxcBHG4VQ/0";
//$test = file_get_contents($apicallurl);

//$input = 'http://mmsns.qpic.cn/mmsns/Qnjw0vMwGMrubLI7jCtiaDaxdISZceveq0QrFzGW8elXMaVxcBHG4VQ/0';

$input = "http://luvino.ca/Welcome.jpg";
$output = 'google.jpg';
//file_put_contents($output, file_get_contents($input));
$test = url_get_contents($apicallurl);
//echo $pictureJsonInfo;
$start =strpos($test,'Raw text</td><td><pre style="margin:0">');
if ($start !== false) {
	$end =strpos($test,'</pre></td></tr><tr><td>Raw bytes');
	$contentStr = substr($test,$start+39,$end-$start-39);
}else{
	$contentStr = "Not found";
}
echo $contentStr;
echo "--end";

function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
?>