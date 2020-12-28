<?php
namespace Instagram\Api\Block\Widget;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class InstagramCurl extends Template implements BlockInterface
{
    protected $helper;
    protected $_template = 'Instagram_Api::widget/instagram-api.phtml';
    public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Instagram\Api\Helper\Data $helperData)
    {
        parent::__construct($context);
        $this->helper = $helperData;
    }

    public function getCurlData()
    {
        return $this->helper->getCurlData();
    }
}

?>