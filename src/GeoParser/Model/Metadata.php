<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Metadata
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Person
     */
    protected $author;

    /**
     * @var Copyright
     */
    protected $copyright;

    /**
     * @var ArrayCollection<Link>
     */
    protected $links;

    /**
     * @var \Datetime
     */
    protected $createdAt;

    /**
     * @var array
     */
    protected $keywords;

    /**
     * TODO : create model for extension
     * @var array
     */
    protected $extensions = array();

    /**
     * @var ArrayCollection<Area>
     */
    protected $areas;

    /**
     * Metadata constructor
     */
    public function __construct()
    {
        $this->links  = new ArrayCollection();
        $this->areas = new ArrayCollection();
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
     * @return Metadata
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @return Metadata
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Person $author
     * @return Metadata
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Copyright
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @param Copyright $copyright
     * @return Metadata
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    /**
     * @return ArrayCollection<Link>
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param ArrayCollection<Link> $links
     * @return Metadata
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * @param Link $link
     * @return Metadata
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
     * @return Metadata
     */
    public function removeLink($link)
    {
        if ($this->links->contains($link)) {
            $this->links->remove($link);
        }

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
     * @return Metadata
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param array $keywords
     * @return Metadata
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @param string $keyword
     * @return Metadata
     */
    public function addKeyword($keyword)
    {
        if (!in_array($keyword, $this->keywords)) {
            $this->keywords[] = $keyword;
        }

        return $this;
    }

    /**
     * @param string $keyword
     * @return Metadata
     */
    public function removeKeyword($keyword)
    {
        if (($key = array_search($keyword, $this->keywords))) {
            unset($this->keywords[$key]);
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
     * @return Metadata
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
     * @return ArrayCollection<Area>
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * @param ArrayCollection<Area> $areas
     * @return Metadata
     */
    public function setAreas($areas)
    {
        $this->areas = $areas;

        return $this;
    }

    /**
     * @param Area $bound
     * @return Metadata
     */
    public function addArea($bound)
    {
        if (!$this->areas->contains($bound)) {
            $this->areas->add($bound);
        }

        return $this;
    }

    /**
     * @param Area $bound
     * @return Metadata
     */
    public function removeArea($bound)
    {
        if ($this->areas->contains($bound)) {
            $this->areas->remove($bound);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'metadada ' . (string) $this->getName();
    }
}