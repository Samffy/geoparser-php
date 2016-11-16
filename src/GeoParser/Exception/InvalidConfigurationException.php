<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Exception;

class InvalidConfigurationException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Configuration is invalid';

    /**
     * @var integer
     */
    protected $code = 404;
}