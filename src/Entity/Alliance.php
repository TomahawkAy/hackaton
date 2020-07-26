<?php

namespace App\Entity;

use App\Repository\AllianceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AllianceRepository::class)
 */
class Alliance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Professional::class)
     */
    private $professionalO;

    /**
     * @ORM\ManyToOne(targetEntity=Professional::class)
     */
    private $ProfessionalT;

    /**
     * @ORM\Column(type="float")
     */
    private $mergedSum;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSuccess;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getProfessionalO(): ?Professional
    {
        return $this->professionalO;
    }

    public function setProfessionalO(?Professional $professionalO): self
    {
        $this->professionalO = $professionalO;

        return $this;
    }

    public function getProfessionalT(): ?Professional
    {
        return $this->ProfessionalT;
    }

    public function setProfessionalT(?Professional $ProfessionalT): self
    {
        $this->ProfessionalT = $ProfessionalT;

        return $this;
    }

    public function getMergedSum(): ?float
    {
        return $this->mergedSum;
    }

    public function setMergedSum(float $mergedSum): self
    {
        $this->mergedSum = $mergedSum;

        return $this;
    }

    public function getIsSuccess(): ?bool
    {
        return $this->isSuccess;
    }

    public function setIsSuccess(bool $isSuccess): self
    {
        $this->isSuccess = $isSuccess;

        return $this;
    }
}
