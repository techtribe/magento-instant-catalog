<?php

namespace TechTribe\InstantCatalog\Model;

use TechTribe\InstantCatalog\Api\Data\InstantCatalogInterface;

class InstantCatalog implements InstantCatalogInterface
{
    /**
     * @var array
     */
    protected $catalog;

    /**
     * @return array|void|null
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * @param array $catalog
     * @return InstantCatalogInterface|void
     */
    public function setCatalog(array $catalog)
    {
        $this->catalog = $catalog;
    }
}
