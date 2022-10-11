<?php

namespace Untitledpng\Laravel1Password\Contracts\Repositories;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Exceptions\InvalidInputException;
use Untitledpng\Laravel1Password\Exceptions\NotFoundRequestException;
use Untitledpng\Laravel1Password\Exceptions\UnauthorizedRequestException;
use Untitledpng\Laravel1Password\Models\Vault;

interface VaultRepositoryContract
{
    /**
     * Get all available vaults that are enabled for the API token.
     *
     * @return Collection<Vault>
     * @throws UnauthorizedRequestException|InvalidInputException|NotFoundRequestException
     */
    public function getAll(): Collection;

    /**
     * Get a specific vault by its ID.
     *
     * @param  string $id
     * @return Vault
     * @throws InvalidInputException|NotFoundRequestException|UnauthorizedRequestException
     */
    public function getById(string $id): Vault;
}
