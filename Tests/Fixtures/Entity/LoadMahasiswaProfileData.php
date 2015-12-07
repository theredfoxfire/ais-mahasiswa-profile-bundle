<?php

namespace Ais\MahasiswaProfileBundle\Tests\Fixtures\Entity;

use Ais\MahasiswaProfileBundle\Entity\MahasiswaProfile;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadMahasiswaProfileData implements FixtureInterface
{
    static public $mahasiswa_profiles = array();

    public function load(ObjectManager $manager)
    {
        $mahasiswa_profile = new MahasiswaProfile();
        $mahasiswa_profile->setTitle('title');
        $mahasiswa_profile->setBody('body');

        $manager->persist($mahasiswa_profile);
        $manager->flush();

        self::$mahasiswa_profiles[] = $mahasiswa_profile;
    }
}
