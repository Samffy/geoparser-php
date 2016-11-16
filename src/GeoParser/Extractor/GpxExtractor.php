<?php

namespace GeoParser\Extractor;

class GpxExtractor implements ExtractorInterface
{
    /**
     * @param string $source
     * @param array  $options
     *
     * @return mixed
     */
    public function extract($source, $options = array())
    {
        $xml = new \DOMDocument();
        $xml->load($source);

        return $xml;
    }
}