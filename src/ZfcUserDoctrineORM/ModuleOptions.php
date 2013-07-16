<?php

namespace ZfcUserDoctrineORM;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $adapterService = 'doctrine.authenticationadapter.orm_default';

    /**
     * @var string
     */
    protected $objectManagerService = 'Doctrine\ORM\EntityManager';

    /**
     * @param string $adapterService
     * @return $this
     */
    public function setAdapterService($adapterService)
    {
        $this->adapterService = $adapterService;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdapterService()
    {
        return $this->adapterService;
    }

    /**
     * @param string $objectManagerService
     * @return $this
     */
    public function setObjectManagerService($objectManagerService)
    {
        $this->objectManagerService = $objectManagerService;
        return $this;
    }

    /**
     * @return string
     */
    public function getObjectManagerService()
    {
        return $this->objectManagerService;
    }
}