<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\AttributeOverride;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping\Column;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User.
 *
 * @ORM\Table("fos_user")
 * @ORM\Entity
 * @AttributeOverrides({
 *      @AttributeOverride(name="usernameCanonical",
 *          column=@Column(
 *              type     = "string",
 *              length   = 155,
 *          )
 *      ),
 *      @AttributeOverride(name="emailCanonical",
 *          column=@Column(
 *              type     = "string",
 *              length   = 155,
 *          )
 *      )
 * })
 */
class User extends BaseUser
{
    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $number;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $country;

    protected $key;

    /**
     * @ORM\OneToMany(targetEntity="UserAddOnEmail", mappedBy="user", cascade={"persist"})
     */
    private $addOnEmails;

    public function __construct()
    {
        $this->addOnEmails = new ArrayCollection();
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function addEmail($email)
    {
        $addOnEmail = new UserAddOnEmail();
        $addOnEmail->setEmail($email);
        $addOnEmail->setUser($this);

        $this->addOnEmails[] = $addOnEmail;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function generateToken(){

        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < 16; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }

        $this->setConfirmationToken($string);
    }

    /**
     * @return ArrayCollection
     */
    public function getAddOnEmails()
    {
        return $this->addOnEmails;
    }
}
