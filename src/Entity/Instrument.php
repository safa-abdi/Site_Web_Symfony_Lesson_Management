<?php

namespace App\Entity;

use App\Repository\InstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstrumentRepository::class)
 */
class Instrument
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Enseignant::class, mappedBy="instrument")
     */
    private $professeur;

    public function __construct()
    {
        $this->professeur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|enseignant[]
     */
    public function getProfesseur(): Collection
    {
        return $this->professeur;
    }

    public function addProfesseur(enseignant $professeur): self
    {
        if (!$this->professeur->contains($professeur)) {
            $this->professeur[] = $professeur;
            $professeur->setInstrument($this);
        }

        return $this;
    }

    public function removeProfesseur(enseignant $professeur): self
    {
        if ($this->professeur->removeElement($professeur)) {
            // set the owning side to null (unless already changed)
            if ($professeur->getInstrument() === $this) {
                $professeur->setInstrument(null);
            }
        }

        return $this;
    }
}
