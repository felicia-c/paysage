<?php

namespace PaysageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use PaysageBundle\Entity\ImageChantier;
use PaysageBundle\Entity\Categorie;

use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Chantier
 *
 * @ORM\Table(name="chantier")
 * @ORM\Entity(repositoryClass="PaysageBundle\Repository\ChantierRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Chantier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="PaysageBundle\Entity\Categorie", inversedBy="chantiers")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid()
     */
    private $categorie;


    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;


    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee", type="date", nullable=true)
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
     * @var string
     *
     * @ORM\Column(name="vignette", type="string", length=255, nullable=true)
     */
    private $vignette;

    /**
     * @var string
     *
     * @ORM\Column(name="vignette_url", type="string", length=255, nullable=true)
     */
    private $vignetteUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="vignette_alt", type="string", length=255, nullable=true)
     */
    private $vignetteAlt;


    /**
     * @var file
     *
     * @Assert\File(maxSize="5000000")
     */
    private $fileVignette;

    private $tempFilename_vignette;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set categorie
     *
     * @param integer $categorie
     *
     * @return Chantier
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return int
     */
    public function getCategorie()
    {
        return $this->categorie;
    }




    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Chantier
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }




    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Chantier
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set annee
     *
     * @param \DateTime $annee
     *
     * @return Chantier
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return \DateTime
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Chantier
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Chantier
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set photoUrl
     *
     * @param string $photoUrl
     *
     * @return Chantier
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;

        return $this;
    }

    /**
     * Get photoUrl
     *
     * @return string
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * Set photoAlt
     *
     * @param string $photoAlt
     *
     * @return Chantier
     */
    public function setPhotoAlt($photoAlt)
    {
        $this->photoAlt = $photoAlt;

        return $this;
    }

    /**
     * Get photoAlt
     *
     * @return string
     */
    public function getPhotoAlt()
    {
        return $this->photoAlt;
    }


    /**
     * Set filePhoto
     *
     * @return Chantier
     */
    public function setFilePhoto(UploadedFile $filePhoto)
    {
        $this->filePhoto = $filePhoto;

        //s'il y a déjà un fichier pour cette entité
        if (null !== $this->photoUrl) {
            //on save son extension pour le supprimer plus tard
            $this->tempFilename_photo = $this->photoUrl;

            //reset la valeur de url et alt
            $this->photoUrl = null;
            $this->photoAlt = null;
        }
    }

    /**
     * Get filePhoto
     *
     * @return File
     */
    public function getFilePhoto()
    {
        $this->filePhoto;
    }


    /**
     * Set vignette
     *
     * @param string $vignette
     *
     * @return Chantier
     */
    public function setVignette($vignette)
    {
        $this->vignette = $vignette;

        return $this;
    }

    /**
     * Get vignette
     *
     * @return string
     */
    public function getVignette()
    {
        return $this->vignette;
    }

    /**
     * Set vignetteUrl
     *
     * @param string $vignetteUrl
     *
     * @return Chantier
     */
    public function setVignetteUrl($vignetteUrl)
    {
        $this->vignetteUrl = $vignetteUrl;

        return $this;
    }

    /**
     * Get vignetteUrl
     *
     * @return string
     */
    public function getVignetteUrl()
    {
        return $this->vignetteUrl;
    }

    /**
     * Set vignetteAlt
     *
     * @param string $vignetteAlt
     *
     * @return Chantier
     */
    public function setVignetteAlt($vignetteAlt)
    {
        $this->vignetteAlt = $vignetteAlt;

        return $this;
    }

    /**
     * Get vignetteAlt
     *
     * @return string
     */
    public function getVignetteAlt()
    {
        return $this->vignetteAlt;
    }

    /**
     * Set fileVignette
     *
     * @return Chantier
     */
    public function setFileVignette(UploadedFile $fileVignette)
    {
        $this->fileVignette = $fileVignette;
        //s'il y a déjà un fichier pour cette entité
        if (null !== $this->vignetteUrl) {
            //on save son extension pour le supprimer plus tard
            $this->tempFilename_vignette = $this->vignetteUrl;

            //reset la valeur de url et alt
            $this->vignetteUrl = null;
            $this->vignetteAlt = null;


        }
    }

    /**
     * Get fileVignette
     *
     * @return File
     */
    public function getFileVignette()
    {
        $this->fileVignette;
    }



//UPLOAD / REMOVE IMAGE

    public function getFullVignettePath() {
        return null === $this->vignetteUrl ? null : $this->getUploadRootDir(). $this->vignetteUrl;
    }
    /**
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     *
     */
    public function preUploadVignette() {
        if (null === $this->fileVignette) {

            return;
        }

        $this->vignetteUrl = $this->fileVignette->guessExtension();
        $this->vignetteAlt = $this->fileVignette->getClientOriginalName();

    }


    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     *
     */
    public function upload_vignette()
    {
        if(null===$this->fileVignette) {
            return;
        }

        if (null !== $this->tempFilename_vignette) {

            $oldFile_vignette = $this->getUploadRootDir().'/'.$this->id.'_vignette.'.$this->tempFilename_vignette;


            if (file_exists($oldFile_vignette)) {

                unlink($oldFile_vignette);
            }
        }

        $this->fileVignette->move(
        //repertoire de destination
            $this->getUploadRootDir(),
            //nom du fichier à créer (ici "id.extension")
            $this->id.'_vignette.'.$this->vignetteUrl
        );
        //echo 'setFileVignette ok . uploadDir: ' . $this->getUploadRootDir() . ' tempfilename ' . $this->tempFilename_vignette; exit;

    }


    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        //save temporaire du nom du fichier, car il depend de l'id

        $this->tempFilename_vignette = $this->getUploadRootDir().$this->id.'_vignette.'.$this->vignetteUrl;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        //en PostRemove, on n'a pas acces à l'id, on utilise le nom sauvegardé

        if (file_exists($this->tempFilename_vignette)) {
            //suppression du fichier
            unlink($this->tempFilename_vignette);
        }
    }

    public function getUploadDir() {
        //chemin relatif pour un nav
        return 'upload/'.$this->getId()."/";
    }

    protected function getUploadRootDir() {
        //chemin relatif vers l'image pour notre code php
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath_vignette() {
        return $this->getUploadDir().$this->getId().'_vignette.'.$this->getVignetteUrl();
    }

}
