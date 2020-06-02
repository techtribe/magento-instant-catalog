<?php

namespace TechTribe\InstantCatalog\Model;

use Magento\Search\Model\QueryFactoryInterface;
use Magento\Search\Model\QueryInterface;
use TechTribe\InstantCatalog\Api\Data\TestApiInterface;
use TechTribe\InstantCatalog\Api\TestApiManagementInterface;
use Magento\AdvancedSearch\Model\SuggestedQueriesInterface;

class TestApiManagement implements TestApiManagementInterface
{
    protected $_testApiFactory;

    /**
     * @var SuggestedQueriesInterface
     */
    protected $_searchData;

    /**
     * @var QueryInterface
     */
    private $query;

    /**
     * @param TestApiInterface $testApiFactory
     * @param SuggestedQueriesInterface $searchData
     * @param QueryFactoryInterface $queryFactory
     */

    public function __construct(
        TestApiInterface $testApiFactory,
        SuggestedQueriesInterface $searchData,
        QueryFactoryInterface $queryFactory
    ) {
        $this->_testApiFactory = $testApiFactory;
        $this->_searchData = $searchData;
        $this->query = $queryFactory->get();
    }

    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return TestApiInterface
     */
    public function getApiData($id)
    {
        $result = $this->_searchData->getItems($this->query);
    }
}
