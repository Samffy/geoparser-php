<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Model;

use Doctrine\Common\Collections\ArrayCollection;

class TrackSegment
{
    /**
     * @var ArrayCollection<Waypoint>
     */
    protected $waypoints;

    /**
     * TODO : create model for extension
     * @var array
     */
    protected $extensions = array();

    /**
     * TrackSegment constructor
     */
    public function __construct()
    {
        $this->waypoints = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getWaypoints()
    {
        return $this->waypoints;
    }

    /**
     * @param ArrayCollection $waypoints
     * @return Track
     */
    public function setWaypoints($waypoints)
    {
        $this->waypoints = $waypoints;

        return $this;
    }

    /**
     * @param Waypoint $waypoint
     * @return Track
     */
    public function addWaypoint($waypoint)
    {
        if (!$this->waypoints->contains($waypoint)) {
            $this->waypoints->add($waypoint);
        }

        return $this;
    }

    /**
     * @param Waypoint $waypoint
     * @return Track
     */
    public function removeWaypoint($waypoint)
    {
        if ($this->waypoints->contains($waypoint)) {
            $this->waypoints->remove($waypoint);
        }

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
     * @retunr string
     */
    public function __toString()
    {
        return '';
    }
}