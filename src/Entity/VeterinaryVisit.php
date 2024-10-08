<?php

namespace App\Entity;

use App\Repository\VeterinaryVisitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeterinaryVisitRepository::class)]
class VeterinaryVisit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    #[ORM\Column(length: 50)]
    private ?string $animalCondition = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $foodProvided = null;

    #[ORM\Column]
    private ?float $foodWeight = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $animalConditionDetails = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }

    public function getAnimalCondition(): ?string
    {
        return $this->animalCondition;
    }

    public function setAnimalCondition(string $animalCondition): static
    {
        $this->animalCondition = $animalCondition;

        return $this;
    }

    public function getFoodProvided(): ?string
    {
        return $this->foodProvided;
    }

    public function setFoodProvided(string $foodProvided): static
    {
        $this->foodProvided = $foodProvided;

        return $this;
    }

    public function getFoodWeight(): ?float
    {
        return $this->foodWeight;
    }

    public function setFoodWeight(float $foodWeight): static
    {
        $this->foodWeight = $foodWeight;

        return $this;
    }

    public function getAnimalConditionDetails(): ?string
    {
        return $this->animalConditionDetails;
    }

    public function setAnimalConditionDetails(?string $animalConditionDetails): static
    {
        $this->animalConditionDetails = $animalConditionDetails;

        return $this;
    }
}
