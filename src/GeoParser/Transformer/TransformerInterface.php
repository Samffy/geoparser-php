<?php

namespace GeoParser\Transformer;

use GeoParser\Model\GeoContainer;

interface TransformerInterface
{
    /**
     * @param mixed $data
     *
     * @return GeoContainer
     */
    public function transform($data);
}