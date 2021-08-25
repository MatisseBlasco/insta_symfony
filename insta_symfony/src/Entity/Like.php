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
     * @ORM\Column(type="integer")
     */
    private $id_posts;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_users;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_comments;

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

    public function getIdComments(): ?int
    {
        return $this->id_comments;
    }

    public function setIdComments(int $id_comments): self
    {
        $this->id_comments = $id_comments;

        return $this;
    }
}
