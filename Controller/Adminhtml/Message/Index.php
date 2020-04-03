<?php
namespace Sga\Message\Controller\Adminhtml\Message;

use Sga\Message\Controller\Adminhtml\Message as ParentClass;

class Index extends ParentClass
{
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $this->initPage($resultPage);

        return $resultPage;
    }
}
