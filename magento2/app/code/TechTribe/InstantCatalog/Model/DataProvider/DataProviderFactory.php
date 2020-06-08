<?php

namespace TechTribe\InstantCatalog\Model\DataProvider;

use Exception;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Search\EngineResolverInterface;
use TechTribe\InstantCatalog\Api\DataProvider\ProductCollectionInterface;

class DataProviderFactory
{
    /**
     * @var EngineResolverInterface
     */
    private $engineResolver;

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * Array of ProductCollectionInterface class names.
     *
     * @var array
     */
    private $data;

    /**
     * @var ProductCollectionInterface
     */
    private $dataProvider;

    /**
     * SuggestedQueries constructor.
     *
     * @param EngineResolverInterface $engineResolver
     * @param ObjectManagerInterface $objectManager
     * @param array $data
     */
    public function __construct(
        EngineResolverInterface $engineResolver,
        ObjectManagerInterface $objectManager,
        array $data
    ) {
        $this->engineResolver = $engineResolver;
        $this->objectManager = $objectManager;
        $this->data = $data;
    }

    /**
     * Returns DataProvider for ProductCollection
     *
     * @return ProductCollectionInterface|ProductCollectionInterface[]
     * @throws Exception
     */
    public function getDataProvider()
    {
        if (empty($this->dataProvider)) {
            $currentEngine = $this->engineResolver->getCurrentSearchEngine();
            $this->dataProvider = $this->objectManager->create($this->data[$currentEngine]);
            if (!$this->dataProvider instanceof ProductCollectionInterface) {
                throw new \InvalidArgumentException(
                    'Data provider must implement TechTribe\InstantCatalog\Api\DataProvider\ProductCollectionInterface'
                );
            }
        }
        return $this->dataProvider;
    }
}
