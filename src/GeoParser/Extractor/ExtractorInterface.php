<?php

namespace GeoParser\Extractor;

interface ExtractorInterface
{
    /**
     * @param string $source
     * @param array  $options
     *
     * @return mixed
     */
    public function extract($source, $options = array());
}