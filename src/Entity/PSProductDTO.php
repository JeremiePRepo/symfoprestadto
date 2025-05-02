<?php

namespace App\Entity;

class PSProductDTO
{
    private ?int $id = null;
    private ?string $reference = null;

    public function __construct(int $id, string $reference = null)
    {
        $this->id = $id;
        $this->reference = $reference;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }
}
