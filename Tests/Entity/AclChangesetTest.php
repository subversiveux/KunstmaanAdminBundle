<?php

namespace Kunstmaan\AdminBundle\Tests\Entity;

use Kunstmaan\AdminBundle\Entity\AclChangeset;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-08-29 at 14:40:17.
 */
class AclChangesetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AclChangeset
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new AclChangeset;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::__construct
     */
    public function test__construct()
    {
        $object = new AclChangeset();
        $this->assertEquals(AclChangeset::STATUS_NEW, $object->getStatus());
    }

    /**
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setChangeset
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::getChangeset
     */
    public function testSetAndGetChangeset()
    {
        $changeset = array('ROLE_ADMIN' => array('ADD' => array('VIEW', 'EDIT'), 'DEL' => 'PUBLISH'));
        $this->object->setChangeset($changeset);

        $this->assertEquals($changeset, $this->object->getChangeset());
    }

    /**
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setCreated
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::getCreated
     */
    public function testSetAndGetCreated()
    {
        $currentDate = new \DateTime('now');
        $this->object->setCreated($currentDate);

        $this->assertEquals($currentDate, $this->object->getCreated());
    }

    /**
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setLastModified
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::getLastModified
     */
    public function testSetAndGetLastModified()
    {
        $currentDate = new \DateTime('now');
        $this->object->setLastModified($currentDate);

        $this->assertEquals($currentDate, $this->object->getLastModified());
    }

    /**
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setRef
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setRefId
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setRefEntityName
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::getRefId
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::getRefEntityName
     */
    public function testSetAndGetRef()
    {
        $entity = new TestEntity(1);
        $this->object->setRef($entity);
        $this->assertEquals(1, $this->object->getRefId());
        $this->assertEquals('Kunstmaan\AdminBundle\Tests\Entity\TestEntity', $this->object->getRefEntityName());
    }

    /**
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setStatus
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::getStatus
     */
    public function testSetAndGetStatus()
    {
        $yesterday = new \DateTime('yesterday');
        $this->object->setLastModified($yesterday);

        $this->assertEquals(AclChangeset::STATUS_NEW, $this->object->getStatus());

        $this->object->setStatus(AclChangeset::STATUS_RUNNING);
        $this->assertNotEquals(AclChangeset::STATUS_NEW, $this->object->getStatus());
        $this->assertEquals(AclChangeset::STATUS_RUNNING, $this->object->getStatus());
        $this->assertNotEquals($yesterday, $this->object->getLastModified());
    }

    /**
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setPid
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::getPid
     */
    public function testSetAndGetPid()
    {
        $this->object->setPid(10);
        $this->assertEquals(10, $this->object->getPid());
    }

    /**
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::setUser
     * @covers Kunstmaan\AdminBundle\Entity\AclChangeset::getUser
     */
    public function testSetAndGetUser()
    {
        $user = new \Kunstmaan\AdminBundle\Entity\User();
        $this->object->setUser($user);

        $this->assertEquals($user, $this->object->getUser());
    }

}


