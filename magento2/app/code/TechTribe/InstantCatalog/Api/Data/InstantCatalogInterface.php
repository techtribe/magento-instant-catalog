<?php

namespace TechTribe\InstantCatalog\Api\Data;

/**
 * @api
 */
interface InstantCatalogInterface
{
    /**
     * Get ID.
     *
     * @return array|null
     */
    public function getCatalog();

    /**
     * Set ID.
     *
     * @param array $catalog
     *
     * @return InstantCatalogInterface|void
     */
    public function setCatalog(array $catalog);
}
