<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FriendshipRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['post', 'patch'],
    mercure: true,
)]
#[ORM\Entity(repositoryClass: FriendshipRepository::class)]
#[ORM\Table(name: "friendship")]
class Friendship
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id;

    #[ORM\Column(name: '`userId`', type: 'integer')]
    #[Assert\NotBlank]
    private int $userId;

    #[ORM\Column(name: '`friendId`', type: 'integer')]
    #[Assert\NotBlank]
    private int $friendId;

    #[ORM\Column(name: '`initiatorId`', type: 'integer')]
    #[Assert\NotBlank]
    private int $initiatorId;

    #[ORM\Column(name: '`status`', type: 'string', length: 10)]
    #[Assert\NotBlank]
    private string $status;

    #[ORM\Column(name: '`createdAt`', type: 'datetimetz_immutable')]
    private ?DateTimeInterface $createdAt;

    #[ORM\Column(name: '`updatedAt`', type: 'datetimetz_immutable')]
    private ?DateTimeInterface $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getFriendId(): ?int
    {
        return $this->friendId;
    }

    public function setFriendId(int $friendId): self
    {
        $this->friendId = $friendId;

        return $this;
    }

    public function getInitiatorId(): ?int
    {
        return $this->initiatorId;
    }

    public function setInitiatorId(int $initiatorId): self
    {
        $this->initiatorId = $initiatorId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
