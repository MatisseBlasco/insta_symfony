<?php

namespace App\Entity;

use App\Repository\SavedPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavedPostRepository::class)
 */
class SavedPost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="savedPosts")
     */
    private $posts;

    /**
     * @ORM\ManyToOne(targetEntity=users::class)
     */
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosts(): ?users
    {
        return $this->posts;
    }

    public function setPosts(?users $posts): self
    {
        $this->posts = $posts;

        return $this;
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
}
