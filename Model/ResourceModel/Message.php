<?php
namespace Sga\Message\Model\ResourceModel;

use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Store\Model\StoreManagerInterface;
use Sga\Message\Api\Data\MessageInterface as ModelInterface;

class Message extends AbstractDb
{
    protected $_storeManager;
    protected $_entityManager;
    protected $_metadataPool;

    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        EntityManager $entityManager,
        MetadataPool $metadataPool,
        $connectionName = null
    ) {
        $this->_storeManager = $storeManager;
        $this->_entityManager = $entityManager;
        $this->_metadataPool = $metadataPool;

        parent::__construct($context, $connectionName);
    }

    protected function _construct()
    {
        $this->_init('sga_message_message','message_id');
    }

    public function load(AbstractModel $object, $value, $field = null)
    {
        $this->_entityManager->load($object, (int)$value);
        return $this;
    }

    public function save(AbstractModel $object)
    {
        $this->_entityManager->save($object);
        return $this;
    }

    public function delete(AbstractModel $object)
    {
        $this->_entityManager->delete($object);
        return $this;
    }

    public function lookupStoreIds($id)
    {
        $connection = $this->getConnection();

        $entityMetadata = $this->_metadataPool->getMetadata(ModelInterface::class);
        $linkField = $entityMetadata->getLinkField();

        $select = $connection->select()
            ->from(['relation' => $this->getTable('sga_message_message_store')], 'store_id')
            ->join(
                ['main_table' => $this->getMainTable()],
                'relation.' . $linkField . ' = main_table.' . $linkField,
                []
            )
            ->where('relation.' . $entityMetadata->getIdentifierField() . ' = :message_id');

        return $connection->fetchCol($select, ['message_id' => (int)$id]);
    }

}
