<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;

/**
 * JobCategories
 *
 * @ORM\Table(name="job_categories")
 * @ORM\Entity
 */
class JobCategories
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
     * @ORM\Column(name="job_category", type="string", length=255, nullable=true)
     */
    private $jobCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobCategory(): ?string
    {
        return $this->jobCategory;
    }

    public function setJobCategory(string $jobCategory): self
    {
        $this->jobCategory = $jobCategory;

        return $this;
    }
}
