<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Infrastructure\Doctrine\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $account = new User();
        $account->setEmail('test@example.com');
        $account->setPassword('password');
        $account->setRoles([]);

        $manager->persist($account);
        $manager->flush();
    }
}
