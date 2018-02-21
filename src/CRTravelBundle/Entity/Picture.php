<?php

namespace CRTravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="CRTravelBundle\Repository\PictureRepository")
 */
class Picture
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
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var File
     *
     * @Assert\File(maxSize = "1024k")
     */
    private $addressFile;

    /**
     * @var Partner
     *
     * @ORM\ManyToOne(targetEntity="Partner", inversedBy="pictures")
     * @ORM\JoinColumn(name="fk_partner_id", referencedColumnName="id")
     */
    private $partner;


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
     * Set address
     *
     * @param string $address
     *
     * @return Picture
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * @return File
     */
    public function getAddressFile()
    {
        return $this->addressFile;
    }

    /**
     * @param File $addressFile
     */
    public function setAddressFile($addressFile)
    {
        $this->addressFile = $addressFile;
    }



    /**
     * Set partner
     *
     * @param \CRTravelBundle\Entity\Partner $partner
     *
     * @return Picture
     */
    public function setPartner(\CRTravelBundle\Entity\Partner $partner = null)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Get partner
     *
     * @return \CRTravelBundle\Entity\Partner
     */
    public function getPartner()
    {
        return $this->partner;
    }
}
