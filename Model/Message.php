<?php
namespace Sga\Message\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Sga\Message\Api\Data\MessageInterface as ModelInterface;
use Sga\Message\Model\ResourceModel\Message as ResourceModel;

class Message extends AbstractModel implements IdentityInterface, ModelInterface
{
    const CACHE_TAG = 'message_message';

    protected $_eventPrefix = 'message_message';

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getMessageId()
    {
        return $this->getData(self::MESSAGE_ID);
    }

    public function setMessageId($id)
    {
        return $this->setData(self::MESSAGE_ID, $id);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($value)
    {
        return $this->setData(self::NAME, $value);
    }

    public function getText()
    {
        return $this->getData(self::TEXT);
    }

    public function setText($value)
    {
        return $this->setData(self::TEXT, $value);
    }

    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    public function setIsActive($value)
    {
        return $this->setData(self::IS_ACTIVE, $value);
    }

    public function getPosition()
    {
        return $this->getData(self::POSITION);
    }

    public function setPosition($value)
    {
        return $this->setData(self::POSITION, $value);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($value)
    {
        return $this->setData(self::CREATED_AT, $value);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($value)
    {
        return $this->setData(self::UPDATED_AT, $value);
    }


    public function getStores()
    {
        return $this->hasData('stores') ? $this->getData('stores') : $this->getData('store_id');
    }

}