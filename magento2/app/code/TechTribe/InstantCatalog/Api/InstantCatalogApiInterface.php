<?php

namespace TechTribe\InstantCatalog\Api;

use TechTribe\InstantCatalog\Api\Data\InstantCatalogInterface;

interface InstantCatalogApiInterface
{
    /**
     * @return InstantCatalogInterface
     * @api
     */
    public function getProductCatalog();
}
