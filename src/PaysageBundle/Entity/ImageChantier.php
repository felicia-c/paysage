<?php

namespace PaysageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageChantier
 *
 * @ORM\Table(name="image_chantier")
 * @ORM\Entity(repositoryClass="PaysageBundle\Repository\ImageChantierRepository")
 */
class ImageChantier
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
     * @var string
     *
     * @ORM\Column(name="vignetteAlt", type="string", length=255)
     */
    private $vignetteAlt;

    /**
     * @var string
     *
     * @ORM\Column(name="vignetteUrl", type="string", length=255)
     */
    private $vignetteUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="vignette", type="string", length=255, nullable=true)
     */
    private $vignette;

    /**
     * @var string
     *
     * @ORM\Column(name="fileVignette", type="string", length=255, nullable=true)
     */
    private $fileVignette;


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
     * Set vignetteAlt
     *
     * @param string $vignetteAlt
     *
     * @return ImageChantier
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
     * Set vignetteUrl
     *
     * @param string $vignetteUrl
     *
     * @return ImageChantier
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
     * Set vignette
     *
     * @param string $vignette
     *
     * @return ImageChantier
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
     * Set fileVignette
     *
     * @param string $fileVignette
     *
     * @return ImageChantier
     */
    public function setFileVignette($fileVignette)
    {
        $this->fileVignette = $fileVignette;

        return $this;
    }

    /**
     * Get fileVignette
     *
     * @return string
     */
    public function getFileVignette()
    {
        return $this->fileVignette;
    }
}

