<?php
namespace TechTribe\InstantCatalog\Api\DataProvider;

use Magento\Framework\Exception\NoSuchEntityException;

interface ProductCollectionInterface
{
    /**
     * @return array
     * @throws NoSuchEntityException
     */
    public function getCatalog();
}
