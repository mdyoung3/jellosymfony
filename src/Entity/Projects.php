<?php

namespace App\Entity;

use App\Enum\PostStatus;
use App\Repository\ProjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectsRepository::class)]
class Projects
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $featureImage = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\Column]
    private array $screenshot = [];

    #[ORM\Column(type: Types::SIMPLE_ARRAY, enumType: PostStatus::class)]
    private array $status = [];

    #[ORM\Column]
    private array $techStack = [];

    #[ORM\Column(length: 255)]
    private ?string $gitHubLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $liveUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $demoUrl = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $completedDate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdDate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'projects')]
    private ?Category $category = null;

    #[ORM\Column]
    private ?bool $featured = null;

    #[ORM\Column]
    private ?int $displayOrder = null;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getFeatureImage(): ?string
    {
        return $this->featureImage;
    }

    public function setFeatureImage(string $featureImage): static
    {
        $this->featureImage = $featureImage;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getScreenshot(): array
    {
        return $this->screenshot;
    }

    public function setScreenshot(array $screenshot): static
    {
        $this->screenshot = $screenshot;

        return $this;
    }

    /**
     * @return PostStatus[]
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    public function setStatus(array $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getTechStack(): array
    {
        return $this->techStack;
    }

    public function setTechStack(array $techStack): static
    {
        $this->techStack = $techStack;

        return $this;
    }

    public function getGitHubLink(): ?string
    {
        return $this->gitHubLink;
    }

    public function setGitHubLink(string $gitHubLink): static
    {
        $this->gitHubLink = $gitHubLink;

        return $this;
    }

    public function getLiveUrl(): ?string
    {
        return $this->liveUrl;
    }

    public function setLiveUrl(string $liveUrl): static
    {
        $this->liveUrl = $liveUrl;

        return $this;
    }

    public function getDemoUrl(): ?string
    {
        return $this->demoUrl;
    }

    public function setDemoUrl(string $demoUrl): static
    {
        $this->demoUrl = $demoUrl;

        return $this;
    }

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTime $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getCompletedDate(): ?\DateTime
    {
        return $this->completedDate;
    }

    public function setCompletedDate(\DateTime $completedDate): static
    {
        $this->completedDate = $completedDate;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeImmutable
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeImmutable $createdDate): static
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function isFeatured(): ?bool
    {
        return $this->featured;
    }

    public function setFeatured(bool $featured): static
    {
        $this->featured = $featured;

        return $this;
    }

    public function getDisplayOrder(): ?int
    {
        return $this->displayOrder;
    }

    public function setDisplayOrder(int $displayOrder): static
    {
        $this->displayOrder = $displayOrder;

        return $this;
    }
}
