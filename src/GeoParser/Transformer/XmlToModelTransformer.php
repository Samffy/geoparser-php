<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Transformer;

class XmlToModelTransformer implements TransformerInterface
{
    /**
     * @var array
     */
    private $configuration;

    /**
     * @param array $configuration
     */
    public function __construct($configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @param \DOMDocument $source
     * @return mixed
     */
    public function transform($source)
    {
        return $this->processMethods(new $this->configuration['type'](), $this->configuration['methods'], $source);
    }

    /**
     * @param mixed                 $object
     * @param array                 $methods
     * @param \DOMDocument|\DOMNode $data
     * @param string                $currentNodePath
     * @return mixed
     */
    private function processMethods($object, $methods, \DOMNode $data, $currentNodePath = null)
    {
        // Process each methods configured for current level
        foreach ($methods as $method => $config) {
            $previousNodePath = $currentNodePath;

            // Manage xml tree path with `.` separators
            if (isset($config['path'])) {
                if (!empty($currentNodePath)) {
                    $currentNodePath .= '.';
                }
                $currentNodePath .= $config['path'];
            }

            // Launch action by config type
            if ($config['type'] === 'value') {
                // Value type : retrieve value of current node path
                $value = $this->getNodeValueByPath($data, $currentNodePath);

                if (isset($config['transform'])) {
                    $value = $this->transformValue($value, $config['transform']);
                }

                $object->$method($value);
                $currentNodePath = $previousNodePath;
            } else if ($config['type'] === 'attribute') {
                // Attribute type : retrieve value from attribute of the current node path
                if (empty($currentNodePath)) {
                    $value = $data->getAttribute($config['name']);
                } else if ($element = $this->getNodeByPath($data, $currentNodePath)) {
                    $value = $element->getAttribute($config['name']);
                } else {
                    // We can't access to value, skip this method
                    continue;
                }

                if (isset($config['transform'])) {
                    $value = $this->transformValue($value, $config['transform']);
                }

                $object->$method($value);
                $currentNodePath = $previousNodePath;
            } else if (preg_match('/^Collection<(.*)>$/', $config['type'], $matches) && class_exists($matches[1])) {
                // Collection type : create a collection on required object before setting previous class method
                foreach ($data->getElementsByTagName($currentNodePath) as $element) {
                    $newObject = new $matches[1]();
                    $newObject = $this->processMethods($newObject, $config['methods'], $element, $previousNodePath);
                    $object->$method($newObject);
                }
            } else if (class_exists($config['type'])) {
                // Object type : create object and process `methods` config before setting previous class method
                $newObject = new $config['type']();
                $newObject = $this->processMethods($newObject, $config['methods'], $data, $currentNodePath);
                $object->$method($newObject);
                $currentNodePath = $previousNodePath;
            }
        }

        return $object;
    }

    /**
     * Get node value using path (with `.` as separators)
     *
     * @param \DOMNode $node
     * @param string   $path
     *
     * @return string
     */
    private function getNodeValueByPath(\DOMNode $node, $path)
    {
        if ($element = $this->getNodeByPath($node, $path)) {
            return $element->nodeValue;
        }

        return null;
    }

    /**
     * Get node using path (with `.` as separators)
     *
     * @param \DOMNode $node
     * @param string   $path
     *
     * @return string
     */
    private function getNodeByPath(\DOMNode $node, $path)
    {
        $levels = explode('.', $path);
        foreach ($levels as $nodeName) {
            if (!$node instanceof \DOMNode) {
                return null;
            }
            $node = $node->getElementsByTagName($nodeName)->item(0);
        }

        return $node;
    }

    /**
     * Type value using config
     *
     * @param string $value
     * @param string $transformer
     *
     * @return bool|\DateTime|float|int|string
     */
    private function transformValue($value, $transformer)
    {
        switch($transformer) {
            case '\Datetime':
            case 'Datetime':
                return new \DateTime(str_replace(array('T', 'Z'), '', $value));
            case 'float':
            case 'double':
                return (float) $value;
            case 'int':
            case 'integer':
                return (int) $value;
            case 'boolean':
            case 'bool':
                return (bool) $value;
        }

        return $value;
    }
}