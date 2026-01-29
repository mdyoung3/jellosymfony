<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $slug = null;

    /**
     * @var Collection<int, Posts>
     */
    #[ORM\ManyToMany(targetEntity: Posts::class, mappedBy: 'tags')]
    private Collection $agents;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Posts>
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Posts $agent): static
    {
        if (!$this->agents->contains($agent)) {
            $this->agents->add($agent);
            $agent->addTag($this);
        }

        return $this;
    }

    public function removeAgent(Posts $agent): static
    {
        if ($this->agents->removeElement($agent)) {
            $agent->removeTag($this);
        }

        return $this;
    }
}
