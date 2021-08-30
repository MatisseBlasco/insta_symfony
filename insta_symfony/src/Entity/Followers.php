<?php

namespace App\Entity;

use App\Repository\FollowersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FollowersRepository::class)
 */
class Followers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=users::class)
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=users::class)
     */
    private $usersFollowers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsers(): ?users
    {
        return $this->users;
    }

    public function setUsers(?users $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getUsersFollowers(): ?users
    {
        return $this->usersFollowers;
    }

    public function setUsersFollowers(?users $usersFollowers): self
    {
        $this->usersFollowers = $usersFollowers;

        return $this;
    }
}
