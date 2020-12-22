<?php
namespace Instagram\Api\Helper;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Framework\HTTP\Client\Curl
     */
    protected $_curl;
    const XML_PATH_RSGITECH_NEWS = 'instagramapi_news/';
    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\HTTP\Client\Curl $curl
     */
    public function __construct(\Magento\Framework\App\Helper\Context $context, \Magento\Framework\HTTP\Client\Curl $curl)
    {
        $this->_curl = $curl;
        parent::__construct($context);
    }

    public function getConfigValue($field, $storeCode = null)
    {
        return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeCode);
    }

    public function getGeneralConfig($fieldid, $storeCode = null)
    {
        return $this->getConfigValue(self::XML_PATH_RSGITECH_NEWS.'general/'.$fieldid, $storeCode);
    }

    public function getStorefrontConfig($fieldid, $storeCode = null)
    {
        return $this->getConfigValue(self::XML_PATH_RSGITECH_NEWS.'storefront/'.$fieldid, $storeCode);
    }

    public function getCurlData()
    {
       $access_token = $this->getStorefrontConfig('instagramapi_link');

       // echo "$access_token";
       
       $url ="https://graph.instagram.com/me/media?fields=media_url,permalink&access_token={$access_token}";
       // echo $url;
        //get method
        $this->_curl->get($url);
        //response will contain the output of curl request
        $response = $this->_curl->getBody();
        // print_r($response);
        return $response;
    }
}
?>