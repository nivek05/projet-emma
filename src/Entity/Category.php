<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category 
{

    private $symfonySerializer; 
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"cat", "default"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"cat", "default"})
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Content::class, mappedBy="category")
    
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"cat", "default"})
     */
    private $Description_title;

    public function __construct()
    {
        $this->content_category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Content[]
     
     */
    public function getContentCategory(): Collection
    {
        return $this->content;
    }

    public function addContentCategory(Content $contentCategory): self
    {
        if (!$this->content->contains($contentCategory)) {
            $this->content[] = $contentCategory;
            $contentCategory->setCategory($this);
        }

        return $this;
    }

    public function removeContentCategory(Content $contentCategory): self
    {
        if ($this->content->removeElement($contentCategory)) {
            // set the owning side to null (unless already changed)
            if ($contentCategory->getCategory() === $this) {
                $contentCategory->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->getId().' - '.$this->getTitle();
    }


    public function getDescriptionTitle(): ?string
    {
        return $this->Description_title;
    }

    public function setDescriptionTitle(?string $Description_title): self
    {
        $this->Description_title = $Description_title;

        return $this;
    }
/*
    public function sendSerialiszeContent() { 
        $content = $this->getDescriptionTitle(); 
        return $this->symfonySerializer->serialize( 
          $content, 
          'json', 
          ['groups' => 'content'] 
        ); 
      }*/
}
