<?php

namespace CRTravelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Partner
 *
 * @ORM\Table(name="partner")
 * @ORM\Entity(repositoryClass="CRTravelBundle\Repository\PartnerRepository")
 */
class Partner
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=500)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_server_address", type="string", length=200)
     *
    */
    private $pictureAddress;

    /**
     * @var File
     *
     * @Assert\File(maxSize = "1024k")
     */
    private $pictureAddressFile;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=4)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=4)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="horary", type="string", length=100)
     */
    private $horary;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=500)
     */
    private $comment;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_special_offer", type="boolean")
     */
    private $isSpecialOffer;

    /**
     * @var string
     *
     * @ORM\Column(name="offer", type="string", length=50)
     */
    private $offer;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="fk_location_id", referencedColumnName="id")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="trip_advisor_link", type="string", length=500)
     */
    private $tripAdvisorLink;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="PartnerType")
     * @ORM\JoinColumn(name="fk_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50)
     */
    private $country;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="partner", cascade={"all"})
     */
    private $pictures;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="HotWord", mappedBy="partner", cascade={"all"})
     */
    private $hotWords;

    /**
     * Partner constructor.
     */
    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->hotWords = new ArrayCollection();
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
     * @return Partner
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
     * Set email
     *
     * @param string $email
     *
     * @return Partner
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Partner
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
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
     * Set address
     *
     * @param string $address
     *
     * @return Partner
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
     * Set pictureAddress
     *
     * @param string $pictureAddress
     *
     * @return Partner
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
     * @return mixed
     */
    public function getPictureAddressFile()
    {
        return $this->pictureAddressFile;
    }

    /**
     * @param mixed $pictureAddressFile
     */
    public function setPictureAddressFile($pictureAddressFile)
    {
        $this->pictureAddressFile = $pictureAddressFile;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Partner
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Partner
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set horary
     *
     * @param string $horary
     *
     * @return Partner
     */
    public function setHorary($horary)
    {
        $this->horary = $horary;

        return $this;
    }

    /**
     * Get horary
     *
     * @return string
     */
    public function getHorary()
    {
        return $this->horary;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Partner
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set isSpecialOffer
     *
     * @param boolean $isSpecialOffer
     *
     * @return Partner
     */
    public function setIsSpecialOffer($isSpecialOffer)
    {
        $this->isSpecialOffer = $isSpecialOffer;

        return $this;
    }

    /**
     * Get isSpecialOffer
     *
     * @return bool
     */
    public function getIsSpecialOffer()
    {
        return $this->isSpecialOffer;
    }

    /**
     * Set offer
     *
     * @param string $offer
     *
     * @return Partner
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer
     *
     * @return string
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @return int
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param int $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Set tripAdvisorLink
     *
     * @param string $tripAdvisorLink
     *
     * @return Partner
     */
    public function setTripAdvisorLink($tripAdvisorLink)
    {
        $this->tripAdvisorLink = $tripAdvisorLink;

        return $this;
    }

    /**
     * Get tripAdvisorLink
     *
     * @return string
     */
    public function getTripAdvisorLink()
    {
        return $this->tripAdvisorLink;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Partner
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

    /**
     * @return ArrayCollection
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Add a shit in the loads of shit
     * @param Picture $picture
     */
    public function addPicture(Picture $picture)
    {
        $picture->setPartner($this);
        $this->pictures->add($picture);
    }

    public function removePicture(Picture $picture)
    {
        $this->pictures->removeElement($picture);
    }

    /**
     * @param ArrayCollection $pictures
     */
    public function setPictures($pictures)
    {
        $this->pictures = $pictures;
    }

    /**
     * @return ArrayCollection
     */
    public function getHotWords()
    {
        return $this->hotWords;
    }

    /**
     * @param HotWord $hotWord
     */
    public function addHotWord(HotWord $hotWord)
    {
        $hotWord->setPartner($this);
        $this->hotWords->add($hotWord);
    }

    public function removeHotWord(HotWord $hotWord)
    {
        $this->hotWords->removeElement($hotWord);
    }

    /**
     * @param ArrayCollection $hotWords
     */
    public function setHotWords($hotWords)
    {
        $this->hotWords = $hotWords;
    }

}
