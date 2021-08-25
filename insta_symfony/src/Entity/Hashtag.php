<?php

namespace App\Entity;

use App\Repository\HashtagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HashtagRepository::class)
 */
class Hashtag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hashtag;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHashtag(): ?string
    {
        return $this->hashtag;
    }

    public function setHashtag(?string $hashtag): self
    {
        $this->hashtag = $hashtag;

        return $this;
    }
}
