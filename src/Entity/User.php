<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @ORM\Column(type="string", length=128, unique=true)
	 */
	private $username;

	/**
	 * @ORM\Column(type="string", length=128, unique=true)
	 */
	private $email;

    /**
     * @ORM\Column(type="string", length=4096)
     */
    private $password;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * User constructor.
     * @param string $username
     * @param string $email
     */
    public function __construct(string $username, string $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function addRole(string $role)
    {
        if (false === in_array($role, $this->roles)) {
            $this->roles[] = $role;
        }
    }
}
