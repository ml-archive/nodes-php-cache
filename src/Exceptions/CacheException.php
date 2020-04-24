<?php

declare(strict_types=1);

namespace Nodes\Cache\Exceptions;

use Nodes\Exceptions\Exception as NodesException;

/**
 * Class CacheException.
 */
class CacheException extends NodesException
{
    /**
     * CacheException constructor.
     *
     * @param $message
     */
    public function __construct($message = 'Unexpected cache exception.')
    {
        parent::__construct($message, 500);
        $this->setStatusCode(500);
    }
}
