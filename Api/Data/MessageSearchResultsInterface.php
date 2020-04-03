<?php
namespace Sga\Message\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface MessageSearchResultsInterface extends SearchResultsInterface
{
    public function getItems();

    public function setItems(array $items);
}
