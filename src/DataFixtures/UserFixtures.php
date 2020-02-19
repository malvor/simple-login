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
        $users = [
            [
                'username'  => 'user',
                'email'     => 'user@test.com',
                'roles'     => ['ROLE_USER']
            ],
            [
                'username'  => 'admin',
                'email'     => 'admin@test.com',
                'roles'     => ['ROLE_ADMIN']
            ],
            [
                'username'  => 'superadmin',
                'email'     => 'superadmin@test.com',
                'roles'     => ['ROLE_SUPERADMIN']
            ]
        ];
        foreach ($users as $userToCreate) {
            $user = new User($userToCreate['username'], $userToCreate['email']);
            $password = $this->encoder->encodePassword($user, 'secret');
            $user->setPassword($password);
            $user->setRoles($userToCreate['roles']);

            $this->entityManager->persist($user);
        }
        $this->entityManager->flush();
    }
}