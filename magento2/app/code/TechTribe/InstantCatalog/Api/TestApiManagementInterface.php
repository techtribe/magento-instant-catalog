<?php

namespace TechTribe\InstantCatalog\Api;

interface TestApiManagementInterface
{
    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \TechTribe\InstantCatalog\Api\Data\TestApiInterface
     */
    public function getApiData($id);
}
