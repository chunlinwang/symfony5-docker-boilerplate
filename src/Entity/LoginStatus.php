<?php

namespace App\Entity;

use App\Repository\LoginStatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoginStatusRepository::class)
 */
class LoginStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $loginAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ClienAgent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoginAt(): ?\DateTimeImmutable
    {
        return $this->loginAt;
    }

    public function setLoginAt(\DateTimeImmutable $loginAt): self
    {
        $this->loginAt = $loginAt;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getClienAgent(): ?string
    {
        return $this->ClienAgent;
    }

    public function setClienAgent(string $ClienAgent): self
    {
        $this->ClienAgent = $ClienAgent;

        return $this;
    }
}
