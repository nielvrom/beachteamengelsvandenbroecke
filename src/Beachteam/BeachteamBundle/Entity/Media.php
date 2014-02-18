<?php

namespace Beachteam\BeachteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media", indexes={@ORM\Index(name="fk_media_item1_idx", columns={"item_id"})})
 * @ORM\Entity
 */
class Media
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=3, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="mimetype", type="string", length=255, nullable=false)
     */
    private $mimetype;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isexternal", type="boolean", nullable=true)
     */
    private $isexternal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Beachteam\BeachteamBundle\Entity\Item
     *
     * @ORM\ManyToOne(targetEntity="Beachteam\BeachteamBundle\Entity\Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     * })
     */
    private $item;



    /**
     * Set url
     *
     * @param string $url
     * @return Media
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Media
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set mimetype
     *
     * @param string $mimetype
     * @return Media
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;

        return $this;
    }

    /**
     * Get mimetype
     *
     * @return string 
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * Set isexternal
     *
     * @param boolean $isexternal
     * @return Media
     */
    public function setIsexternal($isexternal)
    {
        $this->isexternal = $isexternal;

        return $this;
    }

    /**
     * Get isexternal
     *
     * @return boolean 
     */
    public function getIsexternal()
    {
        return $this->isexternal;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set item
     *
     * @param \Beachteam\BeachteamBundle\Entity\Item $item
     * @return Media
     */
    public function setItem(\Beachteam\BeachteamBundle\Entity\Item $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \Beachteam\BeachteamBundle\Entity\Item 
     */
    public function getItem()
    {
        return $this->item;
    }
}
