<?php declare(strict_types=1);

namespace App\Infrastructure\Doctrine\DataFixtures;

use App\Infrastructure\Doctrine\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $account = new User();
        $account->setEmail('test@example.com');
        $account->setPlainPassword('password');

        $manager->persist($account);
        $manager->flush();
    }
}
