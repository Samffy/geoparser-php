<?php
/*
 * This file is part of the GeoParser PHP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GeoParser\Exception;

class ConfigurationNotFoundException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Configuration not found';

    /**
     * @var integer
     */
    protected $code = 404;
}