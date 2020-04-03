<?php
namespace Sga\Message\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Cms\Model\Template\FilterProvider;
use Sga\Message\Model\MessageFactory;
use Sga\Message\Helper\Config;

class Message extends \Magento\Framework\View\Element\Template
{
    protected $_helperConfig;
    protected $_jsonSerializer;
    protected $_filterProvider;
    protected $_messageFactory;

    public function __construct(
        Context $context,
        Config $helperConfig,
        Json $jsonSerializer,
        FilterProvider $filterProvider,
        MessageFactory $messageFactory
    ) {
        $this->_helperConfig = $helperConfig;
        $this->_jsonSerializer = $jsonSerializer;
        $this->_filterProvider = $filterProvider;
        $this->_messageFactory = $messageFactory;

        parent::__construct($context);
    }

    public function getJsonSerializer()
    {
        return $this->_jsonSerializer;
    }

    public function getConfigHelper()
    {
        return $this->_helperConfig;
    }

    public function getMessages()
    {
        return $this->_messageFactory->create()->getCollection()
            ->addFieldToFilter('is_active', 1)
            ->addStoreFilter()
            ->addOrder('position', 'ASC')
            ->getItems();
    }

    /**
     * Parse wysiwyg text
     *
     * @param $text
     * @return mixed
     */
    public function getResponseHtml($text)
    {
        return $this->_filterProvider->getBlockFilter()->filter($text);
    }
}