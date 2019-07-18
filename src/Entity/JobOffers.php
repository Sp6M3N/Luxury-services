<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * JobOffers
 *
 * @ORM\Table(name="job_offers", indexes={@ORM\Index(name="job_offer_category_id", columns={"job_category_id"}), @ORM\Index(name="client_id", columns={"client_id"})})
 * @ORM\Entity
 */
class JobOffers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="text", length=65535, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="job_title", type="text", length=65535, nullable=false)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_activated", type="boolean", nullable=false)
     */
    private $isActivated = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", length=65535, nullable=false)
     */
    private $notes;

    /**
     * @var array|null
     *
     * @ORM\Column(name="job_type", type="simple_array", length=0, nullable=true)
     */
    private $jobType;

    /**
     * @var int
     *
     * @ORM\Column(name="Salary", type="integer", nullable=false)
     */
    private $salary;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_time", type="datetime", nullable=false)
     */
    private $createdTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_time", type="datetime", nullable=false)
     */
    private $updatedTime;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \JobCategories
     *
     * @ORM\ManyToOne(targetEntity="JobCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="job_category_id", referencedColumnName="id")
     * })
     */
    private $jobCategory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Candidats", mappedBy="jobOffer")
     */
    private $candidat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->candidat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsActivated(): ?bool
    {
        return $this->isActivated;
    }

    public function setIsActivated(bool $isActivated): self
    {
        $this->isActivated = $isActivated;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getJobType(): ?array
    {
        return $this->jobType;
    }

    public function setJobType(?array $jobType): self
    {
        $this->jobType = $jobType;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getCreatedTime(): ?\DateTimeInterface
    {
        return $this->createdTime;
    }

    public function setCreatedTime(\DateTimeInterface $createdTime): self
    {
        $this->createdTime = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?\DateTimeInterface
    {
        return $this->updatedTime;
    }

    public function setUpdatedTime(\DateTimeInterface $updatedTime): self
    {
        $this->updatedTime = $updatedTime;

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getJobCategory(): ?JobCategories
    {
        return $this->jobCategory;
    }

    public function setJobCategory(?JobCategories $jobCategory): self
    {
        $this->jobCategory = $jobCategory;

        return $this;
    }

    /**
     * @return Collection|Candidats[]
     */
    public function getCandidat(): Collection
    {
        return $this->candidat;
    }

    public function addCandidat(Candidats $candidat): self
    {
        if (!$this->candidat->contains($candidat)) {
            $this->candidat[] = $candidat;
            $candidat->addJobOffer($this);
        }

        return $this;
    }

    public function removeCandidat(Candidats $candidat): self
    {
        if ($this->candidat->contains($candidat)) {
            $this->candidat->removeElement($candidat);
            $candidat->removeJobOffer($this);
        }

        return $this;
    }

}
