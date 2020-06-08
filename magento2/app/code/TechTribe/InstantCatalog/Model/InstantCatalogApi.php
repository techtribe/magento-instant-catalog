<?php

namespace TechTribe\InstantCatalog\Model;

use Exception;
use Magento\Search\Model\QueryFactoryInterface;
use Magento\Search\Model\QueryInterface;
use TechTribe\InstantCatalog\Api\Data\InstantCatalogInterface;
use TechTribe\InstantCatalog\Api\DataProvider\ProductCollectionInterface;
use TechTribe\InstantCatalog\Api\InstantCatalogApiInterface;
use TechTribe\InstantCatalog\Model\DataProvider\DataProviderFactory;

class InstantCatalogApi implements InstantCatalogApiInterface
{

    /**
     * @var InstantCatalogInterface
     */
    protected $instantCatalog;

    /**
     * @var ProductCollectionInterface
     */
    protected $dataProviderFactory;

    /**
     * @var QueryInterface
     */
    private $query;

    /**
     * @param InstantCatalogInterface $instantCatalog
     * @param DataProviderFactory $dataProviderFactory
     * @param QueryFactoryInterface $queryFactory
     */

    public function __construct(
        InstantCatalogInterface $instantCatalog,
        DataProviderFactory $dataProviderFactory,
        QueryFactoryInterface $queryFactory
    ) {
        $this->instantCatalog = $instantCatalog;
        $this->dataProviderFactory = $dataProviderFactory;
        $this->query = $queryFactory->get();
    }

    /**
     * get test Api data.
     *
     * @return InstantCatalogInterface
     * @throws Exception
     * @api
     *
     */
    public function getProductCatalog()
    {
        $productCatalogDataProvider = $this->dataProviderFactory->getDataProvider();
        $this->instantCatalog->setCatalog($productCatalogDataProvider->getCatalog());
        return $this->instantCatalog;
    }
}
