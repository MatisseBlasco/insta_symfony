<?php

namespace App\Entity;

use App\Repository\HashtagPostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HashtagPostRepository::class)
 */
class HashtagPost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=hashtag::class, mappedBy="hashtagpost")
     */
    private $hashtag;

    /**
     * @ORM\ManyToOne(targetEntity=post::class)
     */
    private $posts;

    public function __construct()
    {
        $this->hashtag = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|hashtag[]
     */
    public function getHashtag(): Collection
    {
        return $this->hashtag;
    }

    public function addHashtag(hashtag $hashtag): self
    {
        if (!$this->hashtag->contains($hashtag)) {
            $this->hashtag[] = $hashtag;
            $hashtag->setHashtagpost($this);
        }

        return $this;
    }

    public function removeHashtag(hashtag $hashtag): self
    {
        if ($this->hashtag->removeElement($hashtag)) {
            // set the owning side to null (unless already changed)
            if ($hashtag->getHashtagpost() === $this) {
                $hashtag->setHashtagpost(null);
            }
        }

        return $this;
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
}
