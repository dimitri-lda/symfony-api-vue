<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

trait IdentifierTrait
{
    #[ORM\Column(type: "integer")]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[Groups(['common'])]
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isStored(): bool
    {
        return $this->id !== null;
    }
}
