<?php
/**
 * Elastic Log Writer
 *
 * @author    Benjamin Conrad <bc@hayloft-it.ch>
 * @link      https://github.com/hayloft/zend-log-elastic
 * @copyright Copyright (c) 2014 Hayloft-IT GmbH (http://www.hayloft-it.ch)
 */

namespace Hayloft\Log\Writer;

use Elastica\Document;
use Zend\Log\Writer\AbstractWriter;
use Elastica\Client;
use Elastica\Index;

final class Elastic extends AbstractWriter
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Index
     */
    private $index;

    /**
     * @param array $options
     */
    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->client = new Client($options);

        if (!isset($options['index'])) {
            $options['index'] = 'log';
        }
        $this->index = $this->client->getIndex($options['index']);
    }

    /**
     * @param array $event
     */
    protected function doWrite(array $event)
    {
        $document = new Document('', $event);
        $type = $this->index->getType(strtolower($event['priorityName']));
        $type->addDocument($document);
    }
}
