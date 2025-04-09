<?php
namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\IdentifierTrait;

#[ORM\Entity]
#[ORM\Table(name: "tennis_brands")]
class TennisBrand
{
    use IdentifierTrait;

    #[ORM\Column(type: "string", length: 10)]
    private ?string $name;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $logoUrl;

    #[ORM\Column(type: "string", length: 3)]
    private ?string $countryCode;

    #[ORM\OneToMany(targetEntity: TennisRacketModel::class, mappedBy: "brand", cascade: ["persist", "remove"])]
    private Collection $variants;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    public function setLogoUrl(string $logoUrl): self
    {
        $this->logoUrl = $logoUrl;
        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }
}
