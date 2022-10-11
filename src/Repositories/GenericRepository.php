<?php

namespace Untitledpng\Laravel1Password\Repositories;

use Untitledpng\Laravel1Password\Apis\OnePasswordApi;
use Untitledpng\Laravel1Password\Contracts\Repositories\GenericRepositoryContract;

class GenericRepository implements GenericRepositoryContract
{
    /**
     * @inheritDoc
     */
    public function heartbeat(): int
    {
        return OnePasswordApi::get(
            '/heartbeat'
        )->status();
    }
}
