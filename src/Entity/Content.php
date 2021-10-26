<?php

namespace App\Entity;



use App\Repository\ContentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ContentRepository::class)
* @Vich\Uploadable
 * 
 */

class Content 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"content", "default"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"content", "default"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="content", cascade={"persist"})
   
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"content", "default"})
     * @var string
     */

    private $image;

    /**
     * @Vich\UploadableField(mapping="content_images", fileNameProperty="image")
     * 
     */
    private $imageFile;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    /**
     * @Groups({"content", "default"})
     */

    public function getCat()
    {
        return $this->category->getTitle();
       //return serialize($this->category, 'json');
      
    }

    public function getCategory(): ?Category 
    {
        return $this->category;
       //return serialize($this->category, 'json');
      
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
   
    public function setImageFile( $image = null)
    {
       
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile() 
    {
       
        return $this->imageFile;
    }       


    public function __toString() {
        return $this->getDescription();
    }

    
}
