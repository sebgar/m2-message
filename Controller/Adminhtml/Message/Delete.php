<?php
namespace Sga\Message\Controller\Adminhtml\Message;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Sga\Message\Controller\Adminhtml\Message as ParentClass;
use Sga\Message\Model\Message as Model;

class Delete extends ParentClass implements HttpPostActionInterface
{
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('message_id');
        if ($id) {
            try {
                $model = $this->_objectManager->create(Model::class);
                $model->load($id);
                $model->delete();

                $this->messageManager->addSuccessMessage(__('You deleted the message.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['message_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a message to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
