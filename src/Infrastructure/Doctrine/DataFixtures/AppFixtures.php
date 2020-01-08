<?php declare(strict_types=1);

namespace App\Infrastructure\Doctrine\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $manager->flush();
    }
}
