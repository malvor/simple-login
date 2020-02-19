<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder Password encoder instance
     */
    public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager)
    {
        $this->encoder = $encoder;
        $this->entityManager = $entityManager;
    }

    /**
     * @param ObjectManager $manager Object manager instance
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $user = new User('user', 'user@test.com');
        $password = $this->encoder->encodePassword($user, 'secret');
        $user->setPassword($password);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}