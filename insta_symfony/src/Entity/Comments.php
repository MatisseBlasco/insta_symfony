<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentsRepository::class)
 */
class Comments
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
    private $id_like;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_posts;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdLike(): ?int
    {
        return $this->id_like;
    }

    public function setIdLike(int $id_like): self
    {
        $this->id_like = $id_like;

        return $this;
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

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }
}
