<?php

namespace Ais\MahasiswaProfileBundle\Tests\Handler;

use Ais\MahasiswaProfileBundle\Handler\MahasiswaProfileHandler;
use Ais\MahasiswaProfileBundle\Model\MahasiswaProfileInterface;
use Ais\MahasiswaProfileBundle\Entity\MahasiswaProfile;

class MahasiswaProfileHandlerTest extends \PHPUnit_Framework_TestCase
{
    const DOSEN_CLASS = 'Ais\MahasiswaProfileBundle\Tests\Handler\DummyMahasiswaProfile';

    /** @var MahasiswaProfileHandler */
    protected $mahasiswa_profileHandler;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $om;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $repository;

    public function setUp()
    {
        if (!interface_exists('Doctrine\Common\Persistence\ObjectManager')) {
            $this->markTestSkipped('Doctrine Common has to be installed for this test to run.');
        }
        
        $class = $this->getMock('Doctrine\Common\Persistence\Mapping\ClassMetadata');
        $this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $this->repository = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
        $this->formFactory = $this->getMock('Symfony\Component\Form\FormFactoryInterface');

        $this->om->expects($this->any())
            ->method('getRepository')
            ->with($this->equalTo(static::DOSEN_CLASS))
            ->will($this->returnValue($this->repository));
        $this->om->expects($this->any())
            ->method('getClassMetadata')
            ->with($this->equalTo(static::DOSEN_CLASS))
            ->will($this->returnValue($class));
        $class->expects($this->any())
            ->method('getName')
            ->will($this->returnValue(static::DOSEN_CLASS));
    }


    public function testGet()
    {
        $id = 1;
        $mahasiswa_profile = $this->getMahasiswaProfile();
        $this->repository->expects($this->once())->method('find')
            ->with($this->equalTo($id))
            ->will($this->returnValue($mahasiswa_profile));

        $this->mahasiswa_profileHandler = $this->createMahasiswaProfileHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);

        $this->mahasiswa_profileHandler->get($id);
    }

    public function testAll()
    {
        $offset = 1;
        $limit = 2;

        $mahasiswa_profiles = $this->getMahasiswaProfiles(2);
        $this->repository->expects($this->once())->method('findBy')
            ->with(array(), null, $limit, $offset)
            ->will($this->returnValue($mahasiswa_profiles));

        $this->mahasiswa_profileHandler = $this->createMahasiswaProfileHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);

        $all = $this->mahasiswa_profileHandler->all($limit, $offset);

        $this->assertEquals($mahasiswa_profiles, $all);
    }

    public function testPost()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $mahasiswa_profile = $this->getMahasiswaProfile();
        $mahasiswa_profile->setTitle($title);
        $mahasiswa_profile->setBody($body);

        $form = $this->getMock('Ais\MahasiswaProfileBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($mahasiswa_profile));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->mahasiswa_profileHandler = $this->createMahasiswaProfileHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $mahasiswa_profileObject = $this->mahasiswa_profileHandler->post($parameters);

        $this->assertEquals($mahasiswa_profileObject, $mahasiswa_profile);
    }

    /**
     * @expectedException Ais\MahasiswaProfileBundle\Exception\InvalidFormException
     */
    public function testPostShouldRaiseException()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $mahasiswa_profile = $this->getMahasiswaProfile();
        $mahasiswa_profile->setTitle($title);
        $mahasiswa_profile->setBody($body);

        $form = $this->getMock('Ais\MahasiswaProfileBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(false));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->mahasiswa_profileHandler = $this->createMahasiswaProfileHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $this->mahasiswa_profileHandler->post($parameters);
    }

    public function testPut()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('title' => $title, 'body' => $body);

        $mahasiswa_profile = $this->getMahasiswaProfile();
        $mahasiswa_profile->setTitle($title);
        $mahasiswa_profile->setBody($body);

        $form = $this->getMock('Ais\MahasiswaProfileBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($mahasiswa_profile));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->mahasiswa_profileHandler = $this->createMahasiswaProfileHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $mahasiswa_profileObject = $this->mahasiswa_profileHandler->put($mahasiswa_profile, $parameters);

        $this->assertEquals($mahasiswa_profileObject, $mahasiswa_profile);
    }

    public function testPatch()
    {
        $title = 'title1';
        $body = 'body1';

        $parameters = array('body' => $body);

        $mahasiswa_profile = $this->getMahasiswaProfile();
        $mahasiswa_profile->setTitle($title);
        $mahasiswa_profile->setBody($body);

        $form = $this->getMock('Ais\MahasiswaProfileBundle\Tests\FormInterface'); //'Symfony\Component\Form\FormInterface' bugs on iterator
        $form->expects($this->once())
            ->method('submit')
            ->with($this->anything());
        $form->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));
        $form->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($mahasiswa_profile));

        $this->formFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($form));

        $this->mahasiswa_profileHandler = $this->createMahasiswaProfileHandler($this->om, static::DOSEN_CLASS,  $this->formFactory);
        $mahasiswa_profileObject = $this->mahasiswa_profileHandler->patch($mahasiswa_profile, $parameters);

        $this->assertEquals($mahasiswa_profileObject, $mahasiswa_profile);
    }


    protected function createMahasiswaProfileHandler($objectManager, $mahasiswa_profileClass, $formFactory)
    {
        return new MahasiswaProfileHandler($objectManager, $mahasiswa_profileClass, $formFactory);
    }

    protected function getMahasiswaProfile()
    {
        $mahasiswa_profileClass = static::DOSEN_CLASS;

        return new $mahasiswa_profileClass();
    }

    protected function getMahasiswaProfiles($maxMahasiswaProfiles = 5)
    {
        $mahasiswa_profiles = array();
        for($i = 0; $i < $maxMahasiswaProfiles; $i++) {
            $mahasiswa_profiles[] = $this->getMahasiswaProfile();
        }

        return $mahasiswa_profiles;
    }
}

class DummyMahasiswaProfile extends MahasiswaProfile
{
}
