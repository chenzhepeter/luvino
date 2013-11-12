<?php
/**
 * wechat php test
 */

//define your token
define("TOKEN", "vKSJnrHrcelxk26Yuf2h6J6VzNLnMgdJ");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()
	{
		$echoStr = $_GET["echostr"];

		//valid signature , option
		if($this->checkSignature()){
			echo $echoStr;
			exit;
		}
	}

	public function responseMsg()
	{
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		$commandStr = "You can send us a photo of the QR code on the bottle then type 'verify' for verification.";
        
		//extract post data
		if (!empty($postStr)){

			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$MsgType = $postObj->MsgType;

			switch($MsgType){
				case "text":
					switch(strtolower(trim($postObj->Content))){
						case "verify":
							$resultStr = $this->decodeImage($postObj);
							break;
						default:
							$contentStr = $commandStr;
                            $resultStr = $this->transmitText($postObj, $contentStr);
					}
					echo $resultStr;
					break;
				case "image":
                    $contentStr = "You just sent an image. Please wait 10 seconds then type 'verify' for verification.";
					//$this->receiveImage($postObj);
                    $cmd = "wget -q 'http://luvino.ca/save.php?img=./images/".$postObj->FromUserName.".jpg&picurl=".$postObj->PicUrl."' > /dev/null 2>&1 &";
                    exec($cmd);
                    $resultStr = $this->transmitText($postObj, $contentStr);
                    echo $resultStr;
					break;
				case "location":
					$contentStr = "Welcome to wechat world, you sent a location!";
					$resultStr = $this->transmitText($postObj, $contentStr);
					echo $resultStr;
					break;
				case "link":
					$contentStr = "Welcome to wechat world, you sent a link!";
					$resultStr = $this->transmitText($postObj, $contentStr);
					echo $resultStr;
					break;
				default:
					echo "Input something...";
					exit;
			}

		}else {
			echo "";
			exit;
		}
	}

	private function checkSignature()
	{
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];

		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	private function transmitText($object, $content)
	{
		$textTpl = "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[text]]></MsgType>
				<Content><![CDATA[%s]]></Content>
				<FuncFlag>0</FuncFlag>
				</xml>";
		$resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content);
		return $resultStr;
	}
    private function transmitImage($object, $title, $content, $picurl, $detailurl)
	{
		$textTpl = "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[news]]></MsgType>
                <ArticleCount>1</ArticleCount>
                <Articles>
                <item>
                <Title><![CDATA[%s]]></Title> 
                <Description><![CDATA[%s]]></Description>
                <PicUrl><![CDATA[%s]]></PicUrl>
                <Url><![CDATA[%s]]></Url>
                </item>
                </Articles>
				<FuncFlag>0</FuncFlag>
				</xml>";
		$resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $title, $content, $picurl, $detailurl);
		return $resultStr;
	}
	private function decodeImage($object)
	{
        $product_title = '2011 Harvest Gold';
        $product_image = 'http://luvino.ca/product/2011_harvest_title.jpg';
        $product_detail = 'http://luvino.ca/product/2011_harvest_details.jpg';
        
		//$apicallurl = "http://zxing.org/w/decode?u=http://luvino.ca/images/".$object->FromUserName.".jpg";
        $apicallurl = "http://198.199.105.192:8080/w/w/decode?u=http://luvino.ca/images/".$object->FromUserName.".jpg";
		$test = file_get_contents($apicallurl);
		$start =strpos($test,'Bad URL');
		if ($start !== false) {
			$contentStr = "The image hasn't been processed yet. Wait few seconds and try again";
            $resultStr = $this->transmitText($object, $contentStr);
		}else{
			$start =strpos($test,'Raw text</td><td><pre style="margin:0">');
			if ($start !== false) {
				$end =strpos($test,'</pre></td></tr><tr><td>Raw bytes');
				$code = substr($test,$start+39,$end-$start-39);
				$contentStr = $this->verifyCode($object, $code);
                $start =strpos($contentStr,'counterfeit');
                if ($start !== false) {
                    $resultStr = $this->transmitImage($object, NULL, $contentStr, NULL, NULL);
                }else{
                    $resultStr = $this->transmitImage($object, $product_title, $contentStr, $product_image, $product_detail);
                }
			}else{
				$start =strpos($test,'No Barcode Found');
				if ($start !== false){
					$contentStr = "No QR code found in this image. Please try again with another photo.";
                    $resultStr = $this->transmitText($object, $contentStr);
				}
			}
		}
		return $resultStr;
	}

	private function verifyCode($object, $code){
		$apicallurl = "http://luvino.ca/database/check.php?fwm=".$code."&cxuser=".$object->FromUserName;
		$resultStr = file_get_contents($apicallurl);
		return $resultStr;
	}
	private function receiveImage($object)
	{
		$img = './images/'.$object->FromUserName.'.jpg';
        unlink($img);
		file_put_contents($img, file_get_contents($object->PicUrl));
	}
}

?>