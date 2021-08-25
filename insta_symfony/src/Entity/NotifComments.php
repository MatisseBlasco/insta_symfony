<?php

namespace App\Entity;

use App\Repository\NotifCommentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NotifCommentsRepository::class)
 */
class NotifComments
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notif_comments;

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

    public function getNotifComments(): ?string
    {
        return $this->notif_comments;
    }

    public function setNotifComments(?string $notif_comments): self
    {
        $this->notif_comments = $notif_comments;

        return $this;
    }
}
