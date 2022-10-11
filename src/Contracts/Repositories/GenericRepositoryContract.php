<?php

namespace Untitledpng\Laravel1Password\Contracts\Repositories;

use Untitledpng\Laravel1Password\Exceptions\InvalidInputException;
use Untitledpng\Laravel1Password\Exceptions\NotFoundRequestException;
use Untitledpng\Laravel1Password\Exceptions\UnauthorizedRequestException;

interface GenericRepositoryContract
{
    /**
     * Simple "ping" endpoint to check whether server is active.
     *
     * @return int
     * @throws InvalidInputException
     * @throws NotFoundRequestException
     * @throws UnauthorizedRequestException
     */
    public function heartbeat(): int;
}
