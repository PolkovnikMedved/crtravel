<?php

namespace CRTravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PartnerType
 *
 * @ORM\Table(name="partner_type")
 * @ORM\Entity(repositoryClass="CRTravelBundle\Repository\PartnerTypeRepository")
 */
class PartnerType
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
     * @ORM\Column(name="name", type="string", length=75)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_address", type="string", length=500)
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
     */
    private $pictureAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50)
     */
    private $country;


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
     * @return PartnerType
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
     * Set pictureAddress
     *
     * @param string $pictureAddress
     *
     * @return PartnerType
     */
    public function setPictureAddress($pictureAddress)
    {
        $this->pictureAddress = $pictureAddress;

        return $this;
    }

    /**
     * Get pictureAddress
     *
     * @return string
     */
    public function getPictureAddress()
    {
        return $this->pictureAddress;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return PartnerType
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
}

