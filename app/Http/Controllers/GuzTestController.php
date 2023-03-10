<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;



class GuzTestController extends Controller
{
//     private $publicKey;
// 	private $appKey;
// 	private $appId;
// 	private $api;
// 	private $shortCode;
// 	private $notifyUrl;
// 	private $returnUrl;
// 	private $timeoutExpress;
// 	private $receiveName;
// 	private $totalAmount;
// 	private $subject;
//     public function __construct($publicKey,
//     $appKey,
//     $appId,
//     $api,
//     $shortCode,
//     $notifyUrl,
//     $returnUrl,
//     $timeoutExpress,
//     $receiveName,
//     $totalAmount,
//     $subject){
//         $this->publicKey = $publicKey;
// 		$this->appKey = $appKey;
// 		$this->appId = $appId;
// 		$this->api = $api;
// 		$this->shortCode = $shortCode;
// 		$this->notifyUrl = $notifyUrl;
// 		$this->returnUrl = $returnUrl;
// 		$this->timeoutExpress = $timeoutExpress;
// 		$this->receiveName = $receiveName;
// 		$this->totalAmount = $totalAmount;
// 		$this->subject = $subject;
//     }
//  public function getreq(){
//     try {
//         $client=new Client(['base_url'=>'http://ip:port/ammapi/payment/service-openup/']);
//         $headers = ['Content-Type: application/json','charset'=>'utf-8'];
//         $nonce = time();
//         $str = rand();
//         $result = md5($str);
//         $data = [
//             'outTradeNo' => $result,
//             'subject' => $this->subject,
//             'totalAmount' => $this->totalAmount,
//             'shortCode' => $this->shortCode,
//             'notifyUrl' => $this->notifyUrl,
//             'returnUrl' => $this->returnUrl,
//             'receiveName' => $this->receiveName,
//             'appId' => $this->appId,
//             'timeoutExpress' => $this->timeoutExpress,
//             'nonce' => $result,
//             'timestamp' => $nonce,
//             'appKey' => $this->appKey
//         ];

//         ksort($data);
//         $StringA = '';
// 		foreach ($data as $k => $v) {
// 			if ($StringA == '') {
// 				$StringA = $k . '=' . $v;
// 			} else {
// 				$StringA = $StringA . '&' . $k . '=' . $v;
// 			}
// 		}
// 		$StringB = hash("sha256", $StringA);

// 		$sign = strtoupper($StringB);

// 		$ussdjson = json_encode($data);
// 		$ussd = $this->encryptRSA($ussdjson,$this->publicKey);
// 		$requestMessage = [
// 			'appid' => $this->appId,
// 			'sign' => $sign,
// 			'ussd' => $ussd
// 		];
//         $resp=$client->request('POST','/toTradeWebPay',$headers,$data);

//             $data = json_encode($requestMessage);

//     } catch (ClientException $e) {
//         echo Psr7\Message::toString($e->getRequest());
//         echo Psr7\Message::toString($e->getResponse());
//     }

//  }
//  /**
// 	 * encryptRSA encrypt the data using the public key
// 	 *
// 	 * @data	the data tobe encrypted
// 	 * @public	public key from telebirr
// 	 */

//      private function encryptRSA($data, $public)
//      {
//          $pubPem = chunk_split($public, 64, "\n");
//          $pubPem = "-----BEGIN PUBLIC KEY-----\n" . $pubPem . "-----END PUBLIC KEY-----\n";
//          $public_key = openssl_pkey_get_public($pubPem);

//          if (!$public_key) {
//              die('invalid public key');
//          }
//          $crypto = '';
//          foreach (str_split($data, 117) as $chunk) {
//              $return = openssl_public_encrypt($chunk, $cryptoItem, $public_key);
//              if (!$return) {
//                  return ('fail');
//              }
//              $crypto .= $cryptoItem;
//          }
//          $ussd = base64_encode($crypto);
//          return $ussd;
//      }
public function getPyamentUrl()
	{
        $PUBLICKEY = "YOUR PUBLIC KEY";
        $APPKEY = "YOUR APP KEY";
        $APPID = "YOUR APP ID";
        $SHORTCODE = "YOUR SHORT CODE";
        $API = "YOUR WEBPAY URL";
        $NOTIFYURL = "http://YOUR/NOTIFY/URL";
        $RETURNURL = "http://YOUR/RERURN/URL";
        $TIMEOUT = '30';
        $RECIVER = "COMPANY NAME";
        $totalAmount = 3;
        $subject = "REASON FOR PAYMENT";
        $data = "DATA RECIVED FROM TEELEBIRR VIA NOTIFY URL";
        $pay1 = new TelebriiController(
            $PUBLICKEY,
            $APPKEY,
            $APPID,
            $API,
            $SHORTCODE,
            $NOTIFYURL,
            $RETURNURL,
            $TIMEOUT,
            $RECIVER,
            $totalAmount,
            $subject,
          );

          $result=new Nofity($PUBLICKEY,$data);
          return $result->getPaymentInfo();
	}
}
