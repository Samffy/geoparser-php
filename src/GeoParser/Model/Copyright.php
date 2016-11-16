<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Model;

class Copyright
{
    /**
     * @var Person
     */
    protected $author;

    /**
     * @var Link
     */
    protected $license;

    /**
     * @var integer
     */
    protected $year;

    /**
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Person $author
     * @return Copyright
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Link
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param Link $license
     * @return Copyright
     */
    public function setLicense($license)
    {
        $this->license = $license;

        return $this;
    }

    /**
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param integer $year
     * @return Copyright
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @retunr string
     */
    public function __toString()
    {
        return 'Copyright : ' . $$this->getAuthor();
    }
}