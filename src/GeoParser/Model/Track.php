<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Track
{
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
     * @var integer
     */
    protected $number;

    /**
     * @var ArrayCollection<Link>
     */
    protected $links;

    /**
     * TODO : create model for extension
     * @var array
     */
    protected $extensions = array();

    /**
     * @var string
     */
    protected $type;

    /**
     * @var ArrayCollection<TrackSegment>
     */
    protected $trackSegments;

    /**
     * Track constructor
     */
    public function __construct()
    {
        $this->trackSegments = new ArrayCollection();
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
     * @return Track
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
     * @return Track
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
     * @return Track
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
     * @return Track
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param integer $number
     * @return Track
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param ArrayCollection $links
     * @return Track
     */
    public function setLinks($links)
    {
        $this->links = $links;

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
     * @return Track
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * @param string $extension
     * @return Track
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
     * @return Track
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Track
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTrackSegments()
    {
        return $this->trackSegments;
    }

    /**
     * @param ArrayCollection $trackSegments
     * @return Track
     */
    public function setTrackSegments($trackSegments)
    {
        $this->trackSegments = $trackSegments;

        return $this;
    }

    /**
     * @param TrackSegment $trackSegment
     * @return Track
     */
    public function addTrackSegment($trackSegment)
    {
        if (!$this->trackSegments->contains($trackSegment)) {
            $this->trackSegments->add($trackSegment);
        }

        return $this;
    }

    /**
     * @param TrackSegment $trackSegment
     * @return Track
     */
    public function removeTrackSegment($trackSegment)
    {
        if ($this->trackSegments->contains($trackSegment)) {
            $this->trackSegments->remove($trackSegment);
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