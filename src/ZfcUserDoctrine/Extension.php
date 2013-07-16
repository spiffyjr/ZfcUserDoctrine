<?php

namespace ZfcUserDoctrine;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Authentication\Adapter\ObjectRepository as ObjectRepositoryAdapter;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use ZfcUser\Extension\AbstractExtension;
use ZfcUser\Extension\Authentication;
use ZfcUser\Extension\Register;
use ZfcUserDoctrine\Authentication\DoctrineAdapter;

class Extension extends AbstractExtension
{
    /**
     * @var ObjectRepositoryAdapter
     */
    protected $objectRepositoryAdapter;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @return string
     */
    public function getName()
    {
        return 'doctrine';
    }

    /**
     * @param ObjectRepositoryAdapter $objectRepositoryAdapter
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectRepositoryAdapter $objectRepositoryAdapter, ObjectManager $objectManager)
    {
        $this->objectRepositoryAdapter = $objectRepositoryAdapter;
        $this->objectManager           = $objectManager;
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectManager
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(Authentication::EVENT_LOGIN_PRE, array($this, 'onLogin'));
        $this->listeners[] = $events->attach(Register::EVENT_REGISTER, array($this, 'onRegister'));
    }

    /**
     * @param EventInterface $e
     */
    public function onLogin(EventInterface $e)
    {
        /** @var \ZfcUser\Extension\Password $password */
        $password = $this->getManager()->get('password');
        $adapter  = new DoctrineAdapter($this->objectRepositoryAdapter, $password);

        /** @var \ZfcUser\Extension\Authentication $auth */
        $auth = $this->getManager()->get('authentication');
        $auth->getAdapterChain()->addAdapter($adapter);
    }

    /**
     * @param EventInterface $e
     */
    public function onRegister(EventInterface $e)
    {
        /** @var \ZfcUser\Entity\UserInterface $user */
        $user = $e->getTarget();

        $this->objectManager->persist($user);
        $this->objectManager->flush();
    }
}
