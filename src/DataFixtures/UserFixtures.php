<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setUsername('user1')
            ->setCivility(random_int(0, 1))
            ->setLastname('user1')
            ->setFirstname('user1')
            ->setPassword($this->passwordHasher->hashPassword(
            $user,
            'the_new_password'
        ));

        $manager->persist($user);
        $manager->flush();
    }
}
