<?php

namespace App\Entity;

use App\Repository\ProfessionalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessionalRepository::class)
 */
class Professional
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enterpriseName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enterpriseType;

    /**
     * @ORM\Column(type="integer")
     */
    private $financialReg;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MediaFile")
     */
    private $imageProfile;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MediaFile")
     */
    private $patentImage;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnterpriseName(): ?string
    {
        return $this->enterpriseName;
    }

    public function setEnterpriseName(string $enterpriseName): self
    {
        $this->enterpriseName = $enterpriseName;

        return $this;
    }

    public function getEnterpriseType(): ?string
    {
        return $this->enterpriseType;
    }

    public function setEnterpriseType(string $enterpriseType): self
    {
        $this->enterpriseType = $enterpriseType;

        return $this;
    }

    public function getFinancialReg(): ?int
    {
        return $this->financialReg;
    }

    public function setFinancialReg(int $financialReg): self
    {
        $this->financialReg = $financialReg;
        return $this;
    }

    public function getImageProfile(): ?MediaFile
    {
        return $this->imageProfile;
    }

    public function setImageProfile(?MediaFile $imageProfile): self
    {
        $this->imageProfile = $imageProfile;

        return $this;
    }

    public function getPatentImage(): ?MediaFile
    {
        return $this->patentImage;
    }

    public function setPatentImage(?MediaFile $patentImage): self
    {
        $this->patentImage = $patentImage;

        return $this;
    }
}
