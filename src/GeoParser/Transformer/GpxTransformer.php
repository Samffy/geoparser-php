<?php

namespace GeoParser\Transformer;

use GeoParser\Exception\InvalidConfigurationException;
use GeoParser\Model\GeoContainer;
use GeoParser\Transformer\XmlToModelTransformer;

class GpxTransformer implements TransformerInterface
{
    /**
     * @var array
     */
    private $configuration;

    /**
     * @param array $configuration
     * @throws InvalidConfigurationException
     */
    public function __construct($configuration)
    {
        if (!isset($configuration['GeoParser']) || !isset($configuration['GeoParser']['gpx'])) {
            throw new InvalidConfigurationException();
        }

        $this->configuration = $configuration['GeoParser']['gpx'];
    }

    /**
     * @param \DOMDocument $data
     *
     * @return GeoContainer
     */
    public function transform($data)
    {
        $xmlToModel = new XmlToModelTransformer($this->configuration);
        return $xmlToModel->transform($data);
    }

}