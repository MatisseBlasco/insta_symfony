<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
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
    private $id_comments;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_medias;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_users;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_like;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_hashtag;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $post_url;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdMedias(): ?int
    {
        return $this->id_medias;
    }

    public function setIdMedias(int $id_medias): self
    {
        $this->id_medias = $id_medias;

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

    public function getIdLike(): ?int
    {
        return $this->id_like;
    }

    public function setIdLike(int $id_like): self
    {
        $this->id_like = $id_like;

        return $this;
    }

    public function getIdHashtag(): ?int
    {
        return $this->id_hashtag;
    }

    public function setIdHashtag(int $id_hashtag): self
    {
        $this->id_hashtag = $id_hashtag;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPostUrl(): ?string
    {
        return $this->post_url;
    }

    public function setPostUrl(string $post_url): self
    {
        $this->post_url = $post_url;

        return $this;
    }
}
