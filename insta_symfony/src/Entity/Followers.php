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
     * @ORM\Column(type="integer")
     */
    private $id_users;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_users_followers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsers(): ?int
    {
        return $this->id_users;
    }

    public function setIdUsers(int $id_users): self
    {
        $this->id_users = $id_users;

        return $this;
    }

    public function getIdUsersFollowers(): ?int
    {
        return $this->id_users_followers;
    }

    public function setIdUsersFollowers(int $id_users_followers): self
    {
        $this->id_users_followers = $id_users_followers;

        return $this;
    }
}
