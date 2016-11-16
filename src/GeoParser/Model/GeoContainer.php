<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Model;

use Doctrine\Common\Collections\ArrayCollection;

class GeoContainer
{
    /**
     * @var Metadata
     */
    protected $metadata;

    /**
     * @var ArrayCollection<Track>
     */
    protected $tracks;

    /**
     * GeoContainer constructor
     */
    public function __construct()
    {
        $this->tracks = new ArrayCollection();
    }

    /**
     * @return Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param Metadata $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }
    
    /**
     * @return ArrayCollection<Track>
     */
    public function getTracks()
    {
        return $this->tracks;
    }

    /**
     * @param ArrayCollection<Track> $tracks
     * @return GeoContainer
     */
    public function setTracks($tracks)
    {
        $this->tracks = $tracks;

        return $this;
    }

    /**
     * @param Track $track
     * @return GeoContainer
     */
    public function addTrack($track)
    {
        if (!$this->tracks->contains($track)) {
            $this->tracks->add($track);
        }

        return $this;
    }

    /**
     * @param Track $track
     * @return GeoContainer
     */
    public function removeTrack($track)
    {
        if ($this->tracks->contains($track)) {
            $this->tracks->remove($track);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'geocontainer';
    }
}