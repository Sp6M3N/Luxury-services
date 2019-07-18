<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;


/**
 * Candidats
 *
 * @ORM\Table(name="candidats", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="job_candidat_category_id", columns={"job_category_id"})})
 * @ORM\Entity
 */
class Candidats
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
     * @ORM\Column(name="first_name", type="text", length=65535, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="text", length=65535, nullable=true)
     */
    private $lastName;

    /**
     * @var array
     *
     * @ORM\Column(name="gender", type="simple_array", length=0, nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", length=65535, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="text", length=65535, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="text", length=65535, nullable=true)
     */
    private $nationality;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_a_passport", type="boolean", nullable=true)
     */
    private $hasAPassport = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="passport", type="text", length=65535, nullable=true)
     */
    private $passport;

    /**
     * @var string
     *
     * @ORM\Column(name="curriculum_vitae", type="text", length=65535, nullable=true)
     */
    private $curriculumVitae;

    /**
     * @var string
     *
     * @ORM\Column(name="profil_picture", type="text", length=65535, nullable=true)
     */
    private $profilPicture;

    /**
     * @var string
     *
     * @ORM\Column(name="current_location", type="text", length=65535, nullable=true)
     */
    private $currentLocation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="datetime", nullable=true)
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="place_of_birth", type="text", length=65535, nullable=true)
     */
    private $placeOfBirth;

    /**
     * @var bool
     *
     * @ORM\Column(name="availability", type="boolean", nullable=true)
     */
    private $availability = '0';

    /**
     * @var array
     *
     * @ORM\Column(name="experience", type="simple_array", length=0, nullable=true)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="text", length=65535, nullable=true)
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", length=65535, nullable=true)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uploaded_date", type="datetime", nullable=true)
     */
    private $uploadedDate;

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
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="JobOffers", inversedBy="candidat")
     * @ORM\JoinTable(name="candidatures",
     *   joinColumns={
     *     @ORM\JoinColumn(name="candidat_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="job_offer_id", referencedColumnName="id")
     *   }
     * )
     */
    private $jobOffer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobOffer = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getGender(): ?array
    {
        return $this->gender;
    }

    public function setGender(array $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getHasAPassport(): ?bool
    {
        return $this->hasAPassport;
    }

    public function setHasAPassport(bool $hasAPassport): self
    {
        $this->hasAPassport = $hasAPassport;

        return $this;
    }

    public function getPassport(): ?string
    {
        return $this->passport;
    }

    public function setPassport(string $passport): self
    {
        $this->passport = $passport;

        return $this;
    }

    public function getCurriculumVitae(): ?string
    {
        return $this->curriculumVitae;
    }

    public function setCurriculumVitae(string $curriculumVitae): self
    {
        $this->curriculumVitae = $curriculumVitae;

        return $this;
    }

    public function getProfilPicture(): ?string
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(string $profilPicture): self
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->currentLocation;
    }

    public function setCurrentLocation(string $currentLocation): self
    {
        $this->currentLocation = $currentLocation;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(string $placeOfBirth): self
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getExperience(): ?array
    {
        return $this->experience;
    }

    public function setExperience(array $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

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

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getUploadedDate(): ?\DateTimeInterface
    {
        return $this->uploadedDate;
    }

    public function setUploadedDate(\DateTimeInterface $uploadedDate): self
    {
        $this->uploadedDate = $uploadedDate;

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

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|JobOffers[]
     */
    public function getJobOffer(): Collection
    {
        return $this->jobOffer;
    }

    public function addJobOffer(JobOffers $jobOffer): self
    {
        if (!$this->jobOffer->contains($jobOffer)) {
            $this->jobOffer[] = $jobOffer;
        }

        return $this;
    }

    public function removeJobOffer(JobOffers $jobOffer): self
    {
        if ($this->jobOffer->contains($jobOffer)) {
            $this->jobOffer->removeElement($jobOffer);
        }

        return $this;
    }

}
