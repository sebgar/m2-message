<?php
namespace Sga\Message\Api;

use Sga\Message\Api\Data\MessageInterface as ModelInterface;

interface MessageRepositoryInterface
{
    public function save(ModelInterface $model);

    public function getById($id);

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    public function delete(ModelInterface $model);

    public function deleteById($id);
}
