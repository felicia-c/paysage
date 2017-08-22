<?php

namespace PaysageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="PaysageBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=255, nullable=true)
     */
    private $theme;



    /**
     * @ORM\OneToMany(targetEntity="PaysageBundle\Entity\Chantier", mappedBy="categorie")
     */
    private $chantiers;


    public function __construct()
    {
        $this->chantiers = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Categorie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set theme
     *
     * @param string $theme
     *
     * @return Categorie
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }



    /**
     * Add chantier
     *
     * @param \PaysageBundle\Entity\Chantier
     *
     * @return Categorie
     */
    public function addChantier(\PaysageBundle\Entity\Chantier $chantier)
    {
        $this->chantier[] = $chantier;

        return $this;
    }

    /**
     * Remove chantier
     *
     * @param \PaysageBundle\Entity\Chantier $chantier
     */
    public function removeChantier(\PaysageBundle\Entity\Chantier $chantier)
    {
        $this->chantiers->removeElement($chantier);
    }

    /**
     * Get chantiers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChantiers()
    {
        return $this->chantiers;
    }
}

