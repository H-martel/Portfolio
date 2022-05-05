<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'text')]
    private $contenu;

    #[ORM\Column(type: 'date')]
    private $dateCreation;

    #[ORM\Column(type: 'string', length: 255)]
    private $previewContenu;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienImage;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomPdf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getPreviewContenu(): ?string
    {
        return $this->previewContenu;
    }

    public function setPreviewContenu(string $previewContenu): self
    {
        $this->previewContenu = $previewContenu;

        return $this;
    }

    public function getLienImage(): ?string
    {
        return $this->lienImage;
    }

    public function setLienImage(string $lienImage): self
    {
        $this->lienImage = $lienImage;

        return $this;
    }

    public function getNomPdf(): ?string
    {
        return $this->nomPdf;
    }

    public function setNomPdf(string $nomPdf): self
    {
        $this->nomPdf = $nomPdf;

        return $this;
    }
}
