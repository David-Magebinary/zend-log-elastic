<?php
/**
 * Elastic Log Writer
 *
 * @author    Benjamin Conrad <bc@hayloft-it.ch>
 * @link      https://github.com/hayloft/zend-log-elastic
 * @copyright Copyright (c) 2014 Hayloft-IT GmbH (http://www.hayloft-it.ch)
 */

namespace Hayloft\Log\Writer;

use Zend\Log\Writer\AbstractWriter;

class Elastic extends AbstractWriter
{
    protected function doWrite(array $event)
    {
        echo '11';
    }
}
