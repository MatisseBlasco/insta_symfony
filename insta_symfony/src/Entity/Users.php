<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="users", orphanRemoval=true)
     */
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity=NotifComments::class, mappedBy="users")
     */
    private $notif_comments;

    /**
     * @ORM\OneToMany(targetEntity=Subscription::class, mappedBy="users")
     */
    private $subscription;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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

    /**
     * @ORM\OneToMany(targetEntity=SavedPost::class, mappedBy="posts")
     */
    private $savedPosts;

    /**
     * @ORM\OneToMany(targetEntity=Like::class, mappedBy="users")
     */
    private $likes;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->notif_comments = new ArrayCollection();
        $this->subscription = new ArrayCollection();
        $this->savedPosts = new ArrayCollection();
        $this->likes = new ArrayCollection();
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setUsers($this);
        }

        return $this;
    }

    public function removePost(post $post): self
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getUsers() === $this) {
                $post->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|notifcomments[]
     */
    public function getNotifComments(): Collection
    {
        return $this->notif_comments;
    }

    public function addNotifComment(notifcomments $notifComment): self
    {
        if (!$this->notif_comments->contains($notifComment)) {
            $this->notif_comments[] = $notifComment;
            $notifComment->setUsers($this);
        }

        return $this;
    }

    public function removeNotifComment(notifcomments $notifComment): self
    {
        if ($this->notif_comments->removeElement($notifComment)) {
            // set the owning side to null (unless already changed)
            if ($notifComment->getUsers() === $this) {
                $notifComment->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|subscription[]
     */
    public function getSubscription(): Collection
    {
        return $this->subscription;
    }

    public function addSubscription(subscription $subscription): self
    {
        if (!$this->subscription->contains($subscription)) {
            $this->subscription[] = $subscription;
            $subscription->setUsers($this);
        }

        return $this;
    }

    public function removeSubscription(subscription $subscription): self
    {
        if ($this->subscription->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getUsers() === $this) {
                $subscription->setUsers(null);
            }
        }

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

    public function setPhoneNumber(?string $phone_number): self
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

    public function setWebsite(?string $website): self
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

    /**
     * @return Collection|SavedPost[]
     */
    public function getSavedPosts(): Collection
    {
        return $this->savedPosts;
    }

    public function addSavedPost(SavedPost $savedPost): self
    {
        if (!$this->savedPosts->contains($savedPost)) {
            $this->savedPosts[] = $savedPost;
            $savedPost->setPosts($this);
        }

        return $this;
    }

    public function removeSavedPost(SavedPost $savedPost): self
    {
        if ($this->savedPosts->removeElement($savedPost)) {
            // set the owning side to null (unless already changed)
            if ($savedPost->getPosts() === $this) {
                $savedPost->setPosts(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Like[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Like $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setUsers($this);
        }

        return $this;
    }

    public function removeLike(Like $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getUsers() === $this) {
                $like->setUsers(null);
            }
        }

        return $this;
    }
}
