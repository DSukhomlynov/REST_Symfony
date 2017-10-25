<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table("itinerarys")
 * @ORM\Entity
 */
class Itinerary
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
     * @var int
     *
     * @ORM\Column(name="idroute", type="integer")
     */
    private $idroute;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=255)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lon", type="string", length=255)
     */
    private $lon;
    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer")

     */
    private $sort;

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
     * Set id
     *
     * @param int $id
     *
     * @return Itinerary
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get idroute
     *
     * @return int
     */
    public function getIdroute()
    {
        return $this->idroute;
    }

    /**
     * Set idroute
     *
     * @param int $idroute
     *
     * @return Itinerary
     */
    public function setIdroute($idroute)
    {
        $this->idroute = $idroute;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Itinerary
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }


    /**
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return Itinerary
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lon
     *
     * @return string
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set lon
     *
     * @param string $lon
     *
     * @return Itinerary
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get sort
     *
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set sort
     *
     * @param int $sort
     *
     * @return Itinerary
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }
}