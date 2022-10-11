<?php

namespace Untitledpng\Laravel1Password\Repositories;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Apis\OnePasswordApi;
use Untitledpng\Laravel1Password\Contracts\Repositories\VaultRepositoryContract;
use Untitledpng\Laravel1Password\Factories\VaultFactory;
use Untitledpng\Laravel1Password\Models\Vault;

class VaultRepository implements VaultRepositoryContract
{
    /**
     * @param  VaultFactory $vaultFactory
     */
    public function __construct(protected VaultFactory $vaultFactory)
    {
        //
    }

    /**
     * @inheritDoc
     */
    public function getAll(): Collection
    {
        return OnePasswordApi::get(
            '/v1/vaults'
        )->collect(
            //
        )->transform(
            fn (array $vault) => $this->vaultFactory->make(collect($vault))
        );
    }

    /**
     * @inheritDoc
     */
    public function getById(string $id): Vault
    {
        return $this->vaultFactory->make(
            OnePasswordApi::get("/v1/vaults/{$id}")->collect()
        );
    }
}
