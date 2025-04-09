<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Traits\IdentifierTrait;

#[ORM\Entity]
#[ORM\Table(name: "tennis_racket_models")]
class TennisRacketModel
{
    use IdentifierTrait;

    #[ORM\Column(type: "string", length: 50)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: TennisBrand::class, inversedBy: "model")]
    #[ORM\JoinColumn(nullable: false)]
    private TennisBrand $brand;

    #[ORM\OneToMany(targetEntity: TennisRacketVariant::class, mappedBy: "model", cascade: ["persist", "remove"])]
    private Collection $variants;

    public function __construct()
    {
        $this->variants = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getVariants(): Collection
    {
        return $this->variants;
    }

    public function addVariant(TennisRacketVariant $variant): self
    {
        if (!$this->variants->contains($variant)) {
            $this->variants[] = $variant;
            $variant->setModel($this);
        }
        return $this;
    }

    public function removeVariant(TennisRacketVariant $variant): self
    {
        $this->variants->removeElement($variant);
        return $this;
    }

    public function getBrand(): TennisBrand
    {
        return $this->brand;
    }

    public function setBrand(TennisBrand $brand): self
    {
        $this->brand = $brand;
        return $this;
    }
}
