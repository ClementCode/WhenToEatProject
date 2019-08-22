<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpeningHour
 *
 * @ORM\Table(name="opening_hour")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OpeningHourRepository")
 */
class OpeningHour
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Restaurant", inversedBy="openingHours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurant;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Weekday")
     * @ORM\JoinColumn(nullable=false)
     */
    private $weekday;

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
     * @ORM\Column(name="hours", type="text")
     */
    private $hours;


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
     * Set hours
     *
     * @param string $hours
     *
     * @return OpeningHour
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return string
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set restaurant
     *
     * @param \AppBundle\Entity\Restaurant $restaurant
     *
     * @return OpeningHour
     */
    public function setRestaurant(\AppBundle\Entity\Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * Get restaurant
     *
     * @return \AppBundle\Entity\Restaurant
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * Set weekday
     *
     * @param \AppBundle\Entity\Weekday $weekday
     *
     * @return OpeningHour
     */
    public function setWeekday(\AppBundle\Entity\Weekday $weekday)
    {
        $this->weekday = $weekday;

        return $this;
    }

    /**
     * Get weekday
     *
     * @return \AppBundle\Entity\Weekday
     */
    public function getWeekday()
    {
        return $this->weekday;
    }
}
