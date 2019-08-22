<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RestaurantRepository")
 */
class Restaurant
{
    /*
     * Code added manually.
     */
    public function __toString() {
        return $this->name;
    }

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OpeningHour", mappedBy="restaurant")
     */
    private $openingHours;

    /*
     * Code generated automatically
     */
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
     * @ORM\Column(name="name", type="string", length=128, unique=true)
     */
    private $name;


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
     * @return Restaurant
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
     * Constructor
     */
    public function __construct()
    {
        $this->openingHours = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add openingHour
     *
     * @param \AppBundle\Entity\OpeningHour $openingHour
     *
     * @return Restaurant
     */
    public function addOpeningHour(\AppBundle\Entity\OpeningHour $openingHour)
    {
        $this->openingHours[] = $openingHour;

        return $this;
    }

    /**
     * Remove openingHour
     *
     * @param \AppBundle\Entity\OpeningHour $openingHour
     */
    public function removeOpeningHour(\AppBundle\Entity\OpeningHour $openingHour)
    {
        $this->openingHours->removeElement($openingHour);
    }

    /**
     * Get openingHours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOpeningHours()
    {
        return $this->openingHours;
    }
}
