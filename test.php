<?php
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
//$apicallurl = urlencode("http://api2.sinaapp.com/recognize/picture/?appkey=0020120430&appsecert=fa6095e123cd28fd&reqtype=text&keyword=http://luvino.ca/peter.jpg");
//$apicallurl = urlencode("http://api2.sinaapp.com/recognize/picture/?appkey=0020120430&appsecert=fa6095e123cd28fd&reqtype=text&keyword=http://luvino.ca/peter.jpg");
//$apicallurl = "http://api2.sinaapp.com/recognize/picture/?appkey=0020120430&appsecert=fa6095e123cd28fd&reqtype=text&keyword=http://luvino.ca/peter.jpg";

//$apicallurl = "http://www.qr4.nl/QR-API-Dec.aspx?key=dX/POhdGkVd5K4aFhE47jT3X+WiFKssk&Loc=http://luvino.ca/Welcome.png";

//$apicallurl = "http://zxing.org/w/decode?u=http://luvino.ca/images/ohArGju0mtt4p2C5uAoSsrQZd8-0.jpg";
$apicallurl = "http://zxing.org/w/decode?u=http://luvino.ca/images/wikiphoto.jpeg";
		$test = url_get_contents($apicallurl);
		if ($test == false) {
		$contentStr = "The image hasn't been processed yet. Wait few seconds and try again";
		}else{
		$contentStr = 'good';
		}
		// $start =strpos($test,'URL was not valid');
		// if ($start !== false) {
			// $contentStr = "The image hasn't been processed yet. Wait few seconds and try again";
		// }else{
			// $start =strpos($test,'Raw text</td><td><pre style="margin:0">');
			// if ($start !== false) {
				// $end =strpos($test,'</pre></td></tr><tr><td>Raw bytes');
				// $contentStr = substr($test,$start+39,$end-$start-39);
			// }else{
				// $contentStr = "QR code in this image is not found";
			// }
		// }
		echo $contentStr;
// include_once("include/QRCodeAPI.class.php");
// $api = new QRCodeAPI();
//$json = $api->decode("images/http-www-good-survey-com.png");
//echo $json
?>