<?php

namespace TechTribe\InstantCatalog\Model;

use Magento\Framework\Model\AbstractModel;

class TestApi extends AbstractModel implements \TechTribe\InstantCatalog\Api\Data\TestApiInterface
{
    /**
     * Get ID.
     *
     * @return int
     */
    public function getId()
    {
        return 10;
    }

    /**
     * Set ID.
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->setEntityId($id);
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return 'this is test title';
    }

    /**
     * Set title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
    }

    /**
     * Get desc.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return 'this is test api description';
    }

    /**
     * Set Desc.
     *
     * @param string $desc
     */
    public function setDescription($desc)
    {
    }
}
