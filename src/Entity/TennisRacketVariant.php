<?php
namespace App\Entity;

use App\Enum\TennisRacketStringPattern;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\IdentifierTrait;

#[ORM\Entity]
#[ORM\Table(name: "tennis_racket_variants")]
class TennisRacketVariant
{
    use IdentifierTrait;

    #[ORM\Column(type: "string", length: 20, unique: true)]
    private string $articleNumber;

    #[ORM\Column(type: "string", length: 50)]
    private string $color;

    #[ORM\Column(type: "integer")]
    private int $weight;

    #[ORM\Column(type: "integer")]
    private int $headSize;

    #[ORM\Column(type: "integer")]
    private int $balance;

    #[ORM\Column(type: "string", length: 10, enumType: TennisRacketStringPattern::class)]
    private TennisRacketStringPattern $stringPattern;

    #[ORM\Column(type: "integer")]
    private int $stiffness;

    #[ORM\Column(type: "integer")]
    private int $length;

    #[ORM\Column(type: "string", length: 20)]
    private string $frameProfile;

    #[ORM\ManyToOne(targetEntity: TennisRacketModel::class, inversedBy: "variants")]
    #[ORM\JoinColumn(nullable: false)]
    private TennisRacketModel $model;

    public function getArticleNumber(): string
    {
        return $this->articleNumber;
    }

    public function setArticleNumber(string $articleNumber): self
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getHeadSize(): int
    {
        return $this->headSize;
    }

    public function setHeadSize(int $headSize): self
    {
        $this->headSize = $headSize;
        return $this;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): self
    {
        $this->balance = $balance;
        return $this;
    }

    public function getStringPattern(): TennisRacketStringPattern
    {
        return $this->stringPattern;
    }

    public function setStringPattern(TennisRacketStringPattern $stringPattern): self
    {
        $this->stringPattern = $stringPattern;
        return $this;
    }

    public function getStiffness(): int
    {
        return $this->stiffness;
    }

    public function setStiffness(int $stiffness): self
    {
        $this->stiffness = $stiffness;
        return $this;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;
        return $this;
    }

    public function getFrameProfile(): string
    {
        return $this->frameProfile;
    }

    public function setFrameProfile(string $frameProfile): self
    {
        $this->frameProfile = $frameProfile;
        return $this;
    }

    public function getModel(): TennisRacketModel
    {
        return $this->model;
    }

    public function setModel(TennisRacketModel $model): self
    {
        $this->model = $model;
        return $this;
    }
}
