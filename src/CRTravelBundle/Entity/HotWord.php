<?php

namespace CRTravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HotWord
 *
 * @ORM\Table(name="hot_word")
 * @ORM\Entity(repositoryClass="CRTravelBundle\Repository\HotWordRepository")
 */
class HotWord
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
     * @var Partner
     *
     * @ORM\ManyToOne(targetEntity="Partner")
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
     * Set name
     *
     * @param string $name
     *
     * @return HotWord
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
     * Set partner
     *
     * @param \CRTravelBundle\Entity\Partner $partner
     *
     * @return HotWord
     */
    public function setPartner(Partner $partner = null)
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
