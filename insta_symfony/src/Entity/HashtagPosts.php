<?php

namespace App\Entity;

use App\Repository\HashtagPostsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HashtagPostsRepository::class)
 */
class HashtagPosts
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
    private $id_hashtag;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_posts;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdPosts(): ?int
    {
        return $this->id_posts;
    }

    public function setIdPosts(int $id_posts): self
    {
        $this->id_posts = $id_posts;

        return $this;
    }
}
