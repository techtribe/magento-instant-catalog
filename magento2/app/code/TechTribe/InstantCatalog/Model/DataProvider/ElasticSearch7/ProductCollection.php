<?php

namespace TechTribe\InstantCatalog\Model\DataProvider\ElasticSearch7;

use Magento\Elasticsearch\Model\Adapter\FieldMapper\Product\FieldProviderInterface;
use Magento\Elasticsearch\Model\Config;
use Magento\Elasticsearch\SearchAdapter\ConnectionManager;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Elasticsearch\SearchAdapter\SearchIndexNameResolver;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface as StoreManager;
use TechTribe\InstantCatalog\Api\DataProvider\ProductCollectionInterface;

/**
 * Implementation to provide the product collection from Elasticsearch
 */
class ProductCollection implements ProductCollectionInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var ConnectionManager
     */
    private $connectionManager;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var SearchIndexNameResolver
     */
    private $searchIndexNameResolver;

    /**
     * @var StoreManager
     */
    private $storeManager;

    /**
     * @var FieldProviderInterface
     */
    private $fieldProvider;

    /**
     * Suggestions constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param Config $config
     * @param ConnectionManager $connectionManager
     * @param SearchIndexNameResolver $searchIndexNameResolver
     * @param StoreManager $storeManager
     * @param FieldProviderInterface $fieldProvider
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Config $config,
        ConnectionManager $connectionManager,
        SearchIndexNameResolver $searchIndexNameResolver,
        StoreManager $storeManager,
        FieldProviderInterface $fieldProvider
    ) {
        $this->connectionManager = $connectionManager;
        $this->scopeConfig = $scopeConfig;
        $this->config = $config;
        $this->searchIndexNameResolver = $searchIndexNameResolver;
        $this->storeManager = $storeManager;
        $this->fieldProvider = $fieldProvider;
    }

    /**
     * @inheritdoc
     */
    public function getCatalog()
    {
        $searchQuery = $this->initQuery();
        $result = $this->fetchQuery($searchQuery);
        return $result['hits']['hits'];
    }

    /**
     * Init Search Query
     *
     * @return array
     * @throws NoSuchEntityException
     */
    private function initQuery()
    {
        return [
            'index' => $this->searchIndexNameResolver->getIndexName(
                $this->storeManager->getStore()->getId(),
                Config::ELASTICSEARCH_TYPE_DEFAULT
            ),
//            'type' => Config::ELASTICSEARCH_TYPE_DEFAULT,
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            'match_all' => (object)[]
                        ]
                    ]
                ]
            ]
        ];
    }

    /**
     * Fetch Query
     *
     * @param array $query
     * @return array
     */
    private function fetchQuery(array $query)
    {
        return $this->connectionManager->getConnection()->query($query);
    }
}
