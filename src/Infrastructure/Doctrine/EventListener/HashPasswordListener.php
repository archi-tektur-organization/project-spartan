<?php declare(strict_types=1);

namespace App\Infrastructure\Doctrine\EventListener;

use App\Infrastructure\Doctrine\Entity\User;
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

    /** @inheritDoc */
    public function prePersist(User $user): void
    {
        if ($user->getPlainPassword() !== null) {
            $encoded = $this->passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->eraseCredentials();
            $user->setPassword($encoded);
        }
    }
}
