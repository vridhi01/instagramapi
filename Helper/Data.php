<?php

namespace Instagram\Api\Helper;

use Magento\Framework\HTTP\Client\Curl;

 
class Data extends \Magento\Framework\App\Helper\AbstractHelper 
{
/**
* @var \Magento\Framework\HTTP\Client\Curl
*/
protected $_curl;

/**
* Data constructor.
*
* @param \Magento\Framework\App\Helper\Context $context
* @param \Magento\Framework\HTTP\Client\Curl $curl
*/
public function __construct(
   \Magento\Framework\App\Helper\Context $context,
   \Magento\Framework\HTTP\Client\Curl $curl
) {
   $this->_curl = $curl;
   parent::__construct($context);
}
 
public function getCurlData() {


  $url = 'https://graph.instagram.com/me/media?fields=media_url&access_token=IGQVJVOHBxT05meHJ0NTh6M1ZAZAV05ST3RFS3RjZA0dJV0Q3MUdiZAzllZAEI1YlFHMUsxLUVUSWhyckpubjY2X1llM3lUTHh2bmV5Qk1vTzNQUkNUSE9vVTVUdTdyNHotUUVTWnhudUNPSThhU0FidWZAVVgZDZD';

	  //get method
	$this->_curl->get($url);
 
	//response will contain the output of curl request
	$response = $this->_curl->getBody();

	return $response;
 }   
  }
?>