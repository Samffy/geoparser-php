<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Service;

use GeoParser\Exception\ConfigurationNotFoundException;
use GeoParser\Exception\FileNotFoundException;
use GeoParser\Exception\FileNotSupportedException;
use GeoParser\Exception\ExtractorNotFoundException;
use GeoParser\Exception\InvalidConfigurationException;
use GeoParser\Exception\TransformerNotFoundException;
use GeoParser\Exception\LoaderNotFoundException;
use GeoParser\Model\GeoContainer;
use Symfony\Component\Yaml\Yaml;

class GeoParser
{
    const EXTENSION_GPX = 'gpx';

    /**
     * @var array
     */
    protected $configuration;

    /**
     * @param string $source
     * @throws ConfigurationNotFoundException
     * @throws InvalidConfigurationException
     */
    public function __construct($source)
    {
        if (!file_exists($source)) {
            throw new ConfigurationNotFoundException();
        }

        $this->configuration = Yaml::parse(file_get_contents($source));

        if (!isset($this->configuration['GeoParser'])) {
            throw new InvalidConfigurationException();
        }
    }

    /**
     * @param string $source Absolute path of source file
     * @param string $type   File type to load (only gpx is actually supported)
     * @throws FileNotFoundException
     * @throws FileNotSupportedException
     * @throws ExtractorNotFoundException
     * @throws TransformerNotFoundException
     * @throws LoaderNotFoundException
     * @return GeoContainer
     */
    public function load($source, $type = 'gpx')
    {
        if (!file_exists($source)) {
            throw new FileNotFoundException();
        }

        if (!$this->isSupportedType($type)) {
            throw new FileNotSupportedException();
        }

        $extractor = 'GeoParser\\Extractor\\' . ucfirst($type) . 'Extractor';
        if(!class_exists($extractor)) {
            throw new ExtractorNotFoundException();
        }

        $extractor = new $extractor();

        $transformer = 'GeoParser\\Transformer\\' . ucfirst($type) . 'Transformer';
        if(!class_exists($transformer)) {
            throw new TransformerNotFoundException();
        }

        $transformer = new $transformer($this->configuration);

        /*
        $loader = 'GeoParser\\Loader\\' . ucfirst($type) . 'Loader';
        if(!class_exists($loader)) {
            throw new LoaderNotFoundException();
        }

        $loader = new $loader();
        */

        $data = $extractor->extract($source);
        $geoContainer = $transformer->transform($data);

        return $geoContainer;
    }

    /**
     * @return array
     */
    protected function getSupportedType()
    {
        return array(
            self::EXTENSION_GPX,
        );
    }

    /**
     * @param string $type
     * @return bool
     */
    protected function isSupportedType($type)
    {
        return in_array(strtolower($type), $this->getSupportedType());
    }
}