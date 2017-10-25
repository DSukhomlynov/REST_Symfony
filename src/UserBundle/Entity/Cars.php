<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table("cars")
 * @ORM\Entity
 */
class Cars
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
     * @ORM\Column(name="status", type="integer")

     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\Column(name="direction", type="integer")

     */
    private $direction;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_number", type="string", length=255)
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="yer", type="integer")

     */
    private $yer;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255)
     */
    private $currency;

    /**
     * @var int
     *
     * @ORM\Column(name="planting_costs", type="integer")

     */
    private $planting;

    /**
     * @var string
     *
     * @ORM\Column(name="driver_phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var int
     *
     * @ORM\Column(name="costs_per_1", type="integer")

     */
    private $costs;

    /**
     * @var string
     *
     * @ORM\Column(name="car_photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=255)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lan", type="string", length=255)
     */
    private $lan;

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
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Get direction
     *
     * @return int
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }
    /**
     * Get yer
     *
     * @return int
     */
    public function getYer()
    {
        return $this->yer;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Get planting
     *
     * @return int
     */
    public function getPlanting()
    {
        return $this->planting;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get costs
     *
     * @return int
     */
    public function getCosts()
    {
        return $this->costs;
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
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Get lan
     *
     * @return string
     */
    public function getLan()
    {
        return $this->lan;
    }


}