<?php declare(strict_types=1);

use App\Infrastructure\Doctrine\Entity\User;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

/**
 * HashPasswordListener
 */
class HashPasswordListener implements EventSubscriber
{
    /** @var UserPasswordEncoder */
    private UserPasswordEncoder $passwordEncoder;

    public function __construct(UserPasswordEncoder $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /** @inheritDoc */
    public function getSubscribedEvents(): array
    {
        return ['prePersist'];
    }

    public function prePersist(LifecycleEventArgs $eventArgs): void
    {
        $user = $eventArgs->getEntity();

        if (!$user instanceof User) {
            return;
        }

        $encoded = $this->passwordEncoder->encodePassword(
            $user,
            $user->getPlainPassword()
        );

        $user->setPassword($encoded);
    }
}
