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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Restaurant")
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
}

