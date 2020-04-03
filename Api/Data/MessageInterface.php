<?php
namespace Sga\Message\Api\Data;

interface MessageInterface
{
    const MESSAGE_ID = 'message_id';
    const NAME = 'name';
    const TEXT = 'text';
    const IS_ACTIVE = 'is_active';
    const POSITION = 'position';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get message id
     *
     * @return int|null
     */
    public function getMessageId();

    /**
     * Set message id
     *
     * @param int $id
     * @return MessageInterface
     */
    public function setMessageId($id);
    
    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $value
     * @return MessageInterface
     */
    public function setName($value);
    
    /**
     * Get text
     *
     * @return string|null
     */
    public function getText();

    /**
     * Set text
     *
     * @param string $value
     * @return MessageInterface
     */
    public function setText($value);
    
    /**
     * Get is_active
     *
     * @return int|null
     */
    public function getIsActive();

    /**
     * Set is_active
     *
     * @param int $value
     * @return MessageInterface
     */
    public function setIsActive($value);
    
    /**
     * Get position
     *
     * @return int|null
     */
    public function getPosition();

    /**
     * Set position
     *
     * @param int $value
     * @return MessageInterface
     */
    public function setPosition($value);
    
    /**
     * Get created_at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     *
     * @param string $value
     * @return MessageInterface
     */
    public function setCreatedAt($value);
    
    /**
     * Get updated_at
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     *
     * @param string $value
     * @return MessageInterface
     */
    public function setUpdatedAt($value);
    
}