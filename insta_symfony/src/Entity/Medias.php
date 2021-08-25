<?php

namespace App\Entity;

use App\Repository\MediasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediasRepository::class)
 */
class Medias
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $url_medias;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlMedias(): ?string
    {
        return $this->url_medias;
    }

    public function setUrlMedias(?string $url_medias): self
    {
        $this->url_medias = $url_medias;

        return $this;
    }
}
