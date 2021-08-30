<?php

namespace App\Entity;

use App\Repository\LikeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LikeRepository::class)
 * @ORM\Table(name="`like`")
 */
class Like
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=post::class, inversedBy="likes")
     */
    private $posts;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="likes")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=comments::class, inversedBy="likes")
     */
    private $comments;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosts(): ?post
    {
        return $this->posts;
    }

    public function setPosts(?post $posts): self
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

    public function getComments(): ?comments
    {
        return $this->comments;
    }

    public function setComments(?comments $comments): self
    {
        $this->comments = $comments;

        return $this;
    }
}
