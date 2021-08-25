<?php

namespace App\Entity;

use App\Repository\SavedPostsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavedPostsRepository::class)
 */
class SavedPosts
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
    private $id_posts;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPosts(): ?int
    {
        return $this->id_posts;
    }

    public function setIdPosts(int $id_posts): self
    {
        $this->id_posts = $id_posts;

        return $this;
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
}
