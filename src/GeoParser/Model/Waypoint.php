<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Waypoint
{
    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var float
     */
    protected $elevation;

    /**
     * @var Degrees
     */
    protected $magneticVariation;

    /**
     * @var float
     */
    protected $geoIdHeight;

    /**
     * @var \Datetime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var ArrayCollection<Link>
     */
    protected $links;

    /**
     * @var string
     */
    protected $symbol;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $fixType;

    /**
     * @var integer
     */
    protected $satellites;

    /**
     * @var float
     */
    protected $horizontalDilutionOfPrecision;

    /**
     * @var float
     */
    protected $verticalDilutionOfPrecision;

    /**
     * @var float
     */
    protected $positionDilutionOfPrecision;

    /**
     * @var float
     */
    protected $ageOfGpsData;

    /**
     * @var Station
     */
    protected $station;

    /**
     * TODO : create model for extension
     * @var array
     */
    protected $extensions = array();

    /**
     * Waypoint constructor
     */
    public function __construct()
    {
        $this->links = new ArrayCollection();
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Waypoint
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return Waypoint
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    /**
     * @param float $elevation
     * @return Waypoint
     */
    public function setElevation($elevation)
    {
        $this->elevation = $elevation;

        return $this;
    }

    /**
     * @return Degrees
     */
    public function getMagneticVariation()
    {
        return $this->magneticVariation;
    }

    /**
     * @param Degrees $magneticVariation
     * @return Waypoint
     */
    public function setMagneticVariation($magneticVariation)
    {
        $this->magneticVariation = $magneticVariation;

        return $this;
    }

    /**
     * @return float
     */
    public function getGeoIdHeight()
    {
        return $this->geoIdHeight;
    }

    /**
     * @param float $geoIdHeight
     * @return Waypoint
     */
    public function setGeoIdHeight($geoIdHeight)
    {
        $this->geoIdHeight = $geoIdHeight;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \Datetime $createdAt
     * @return Waypoint
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Waypoint
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Waypoint
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Waypoint
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return Waypoint
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return ArrayCollection<link>
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param ArrayCollection<Link> $links
     * @return Waypoint
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * @param Link $link
     * @return Waypoint
     */
    public function addLink($link)
    {
        if (!$this->links->contains($link)) {
            $this->links->add($link);
        }

        return $this;
    }

    /**
     * @param Link $link
     * @return Waypoint
     */
    public function removeLink($link)
    {
        if ($this->links->contains($link)) {
            $this->links->remove($link);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return Waypoint
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Waypoint
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getFixType()
    {
        return $this->fixType;
    }

    /**
     * @param string $fixType
     * @return Waypoint
     */
    public function setFixType($fixType)
    {
        $this->fixType = $fixType;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSatellites()
    {
        return $this->satellites;
    }

    /**
     * @param integer $satellites
     * @return Waypoint
     */
    public function setSatellites($satellites)
    {
        $this->satellites = $satellites;

        return $this;
    }

    /**
     * @return float
     */
    public function getHorizontalDilutionOfPrecision()
    {
        return $this->horizontalDilutionOfPrecision;
    }

    /**
     * @param float $horizontalDilutionOfPrecision
     * @return Waypoint
     */
    public function setHorizontalDilutionOfPrecision($horizontalDilutionOfPrecision)
    {
        $this->horizontalDilutionOfPrecision = $horizontalDilutionOfPrecision;

        return $this;
    }

    /**
     * @return float
     */
    public function getVerticalDilutionOfPrecision()
    {
        return $this->verticalDilutionOfPrecision;
    }

    /**
     * @param float $verticalDilutionOfPrecision
     * @return Waypoint
     */
    public function setVerticalDilutionOfPrecision($verticalDilutionOfPrecision)
    {
        $this->verticalDilutionOfPrecision = $verticalDilutionOfPrecision;

        return $this;
    }

    /**
     * @return float
     */
    public function getPositionDilutionOfPrecision()
    {
        return $this->positionDilutionOfPrecision;
    }

    /**
     * @param float $positionDilutionOfPrecision
     * @return Waypoint
     */
    public function setPositionDilutionOfPrecision($positionDilutionOfPrecision)
    {
        $this->positionDilutionOfPrecision = $positionDilutionOfPrecision;

        return $this;
    }

    /**
     * @return float
     */
    public function getAgeOfGpsData()
    {
        return $this->ageOfGpsData;
    }

    /**
     * @param float $ageOfGpsData
     * @return Waypoint
     */
    public function setAgeOfGpsData($ageOfGpsData)
    {
        $this->ageOfGpsData = $ageOfGpsData;

        return $this;
    }

    /**
     * @return Station
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * @param Station $station
     * @return Waypoint
     */
    public function setStation($station)
    {
        $this->station = $station;

        return $this;
    }

    /**
     * @return array
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * @param array $extensions
     * @return Waypoint
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * @param string $extension
     * @return Metadata
     */
    public function addExtension($extension)
    {
        if (!in_array($extension, $this->extensions)) {
            $this->extensions[] = $extension;
        }

        return $this;
    }

    /**
     * @param string $extension
     * @return Metadata
     */
    public function removeExtension($extension)
    {
        if (($key = array_search($extension, $this->extensions))) {
            unset($this->extensions[$key]);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '';
    }
}