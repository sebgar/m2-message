<?php
namespace Sga\Message\Model\ResourceModel\Message\Relation\Store;

use Magento\Framework\EntityManager\Operation\ExtensionInterface;
use Sga\Message\Model\ResourceModel\Message as ResourceModel;

class ReadHandler implements ExtensionInterface
{
    protected $resourceModel;

    public function __construct(
        ResourceModel $resourceModel
    ) {
        $this->resourceModel = $resourceModel;
    }

    public function execute($entity, $arguments = [])
    {
        if ($entity->getId()) {
            $stores = $this->resourceModel->lookupStoreIds((int)$entity->getId());
            $entity->setData('store_id', $stores);
            $entity->setData('stores', $stores);
        }
        return $entity;
    }
}
