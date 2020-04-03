<?php
namespace Sga\Message\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{
    protected $_scopeConfig;

    const XML_PATH_MESSAGE_ENABLED = 'messages/general/enabled';
    const XML_PATH_MESSAGE_TIME_TO_DISPLAY = 'messages/general/time_to_display';

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Context $context
    ){
        $this->_scopeConfig = $scopeConfig;

        parent::__construct($context);
    }

    public function isEnabled($store = null)
    {
        return $this->_scopeConfig->isSetFlag(
            self::XML_PATH_MESSAGE_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    public function getTimeToDisplay($store = null)
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_MESSAGE_TIME_TO_DISPLAY,
            ScopeInterface::SCOPE_STORE,
            $store
        ) * 1000;
    }
}