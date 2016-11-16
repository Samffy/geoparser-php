<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Model;

class Degrees
{
    /**
     * @var float
     */
    protected $minimumInclusive;

    /**
     * @var float
     */
    protected $maximumInclusive;
    /**
     * @return float
     */
    public function getMinimumInclusive()
    {
        return $this->minimumInclusive;
    }

    /**
     * @param float $minimumInclusive
     * @return Degrees
     */
    public function setMinimumInclusive($minimumInclusive)
    {
        $this->minimumInclusive = $minimumInclusive;

        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumInclusive()
    {
        return $this->maximumInclusive;
    }

    /**
     * @param float $maximumInclusive
     * @return Degrees
     */
    public function setMaximumInclusive($maximumInclusive)
    {
        $this->maximumInclusive = $maximumInclusive;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getMinimumInclusive() . ', ' . $this->getMaximumInclusive();
    }
}