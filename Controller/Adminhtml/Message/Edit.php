<?php
namespace Sga\Message\Controller\Adminhtml\Message;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Sga\Message\Controller\Adminhtml\Message as ParentClass;

class Edit extends ParentClass implements HttpGetActionInterface
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('message_id');
        $model = $this->_modelFactory->create();
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This message no longer exists.'));

                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $resultPage = $this->_resultPageFactory->create();
        $this->initPage($resultPage)
            ->addBreadcrumb(
            $id ? __('Edit Message') : __('New Message'),
            $id ? __('Edit Message') : __('New Message')
            );
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? 'Message : #'.$model->getId() : __('New Message'));

        return $resultPage;
    }
}
