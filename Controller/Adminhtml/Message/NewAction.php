<?php
namespace Sga\Message\Controller\Adminhtml\Message;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Sga\Message\Controller\Adminhtml\Message as ParentClass;

class NewAction extends ParentClass implements HttpGetActionInterface
{
    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
