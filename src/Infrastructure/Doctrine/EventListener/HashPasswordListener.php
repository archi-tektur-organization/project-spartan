<?php declare(strict_types=1);

namespace App\Infrastructure\Doctrine\EventListener;

use App\Infrastructure\Doctrine\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * HashPasswordListener
 */
class HashPasswordListener
{
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function prePersist(User $user, LifecycleEventArgs $eventArgs): void
    {
        $encoded = $this->passwordEncoder->encodePassword($user, $user->getPlainPassword());
        $user->setPassword($encoded);
    }
}
