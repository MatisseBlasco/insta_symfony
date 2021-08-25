<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
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
    private $id_notif_comments;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_subscription;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_saved_posts;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $website;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnail;

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

    public function getIdNotifComments(): ?int
    {
        return $this->id_notif_comments;
    }

    public function setIdNotifComments(int $id_notif_comments): self
    {
        $this->id_notif_comments = $id_notif_comments;

        return $this;
    }

    public function getIdSubscription(): ?int
    {
        return $this->id_subscription;
    }

    public function setIdSubscription(int $id_subscription): self
    {
        $this->id_subscription = $id_subscription;

        return $this;
    }

    public function getIdSavedPosts(): ?int
    {
        return $this->id_saved_posts;
    }

    public function setIdSavedPosts(int $id_saved_posts): self
    {
        $this->id_saved_posts = $id_saved_posts;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
