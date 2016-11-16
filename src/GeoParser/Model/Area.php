<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Model;

class Area
{

    /**
     * @var float
     */
    protected $minimumLatitude;

    /**
     * @var float
     */
    protected $maximumLatitude;

    /**
     * @var float
     */
    protected $minimumLongitude;

    /**
     * @var float
     */
    protected $maximumLongitude;

    /**
     * @return float
     */
    public function getMinimumLatitude()
    {
        return $this->minimumLatitude;
    }

    /**
     * @param float $minimumLatitude
     * @return Area
     */
    public function setMinimumLatitude($minimumLatitude)
    {
        $this->minimumLatitude = $minimumLatitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumLatitude()
    {
        return $this->maximumLatitude;
    }

    /**
     * @param float $maximumLatitude
     * @return Area
     */
    public function setMaximumLatitude($maximumLatitude)
    {
        $this->maximumLatitude = $maximumLatitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getMinimumLongitude()
    {
        return $this->minimumLongitude;
    }

    /**
     * @param float $minimumLongitude
     * @return Area
     */
    public function setMinimumLongitude($minimumLongitude)
    {
        $this->minimumLongitude = $minimumLongitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumLongitude()
    {
        return $this->maximumLongitude;
    }

    /**
     * @param float $maximumLongitude
     * @return Area
     */
    public function setMaximumLongitude($maximumLongitude)
    {
        $this->maximumLongitude = $maximumLongitude;

        return $this;
    }

    /**
     * @retunr string
     */
    public function __toString()
    {
        return
            'min lat : ' . $this->getMinimumLatitude() . ', ' .
            'max lat : ' . $this->getMaximumLatitude() . ', ' .
            'min long : ' . $this->getMinimumLongitude() . ', ' .
            'max long : ' . $this->getMaximumLatitude();
    }
}