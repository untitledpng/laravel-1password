<?php

namespace Untitledpng\Laravel1Password\Repositories;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Apis\OnePasswordApi;
use Untitledpng\Laravel1Password\Contracts\Repositories\ItemRepositoryContract;
use Untitledpng\Laravel1Password\Enums\ItemCategory;
use Untitledpng\Laravel1Password\Exceptions\NotFoundRequestException;
use Untitledpng\Laravel1Password\Factories\ItemFactory;
use Untitledpng\Laravel1Password\Models\Blueprints\ItemBlueprint;
use Untitledpng\Laravel1Password\Models\Item;
use Untitledpng\Laravel1Password\Models\Vault;

class ItemRepository implements ItemRepositoryContract
{
    /**
     * @param  ItemFactory $itemFactory
     */
    public function __construct(protected ItemFactory $itemFactory)
    {
        //
    }

    /**
     * @inheritDoc
     */
    public function getAll(string|Vault $vault): Collection
    {
        try {
            return OnePasswordApi::get(
                "/v1/vaults/{$this->getVaultId($vault)}/items"
            )->collect(
                //
            )->transform(
                fn(array $item) => $this->itemFactory->make(collect($item))
            );
        } catch (NotFoundRequestException) {
            return new Collection();
        }
    }

    /**
     * @inheritDoc
     */
    public function getAllByCategory(string|Vault $vault, ItemCategory $category): Collection
    {
        try {
            return OnePasswordApi::get(
                "/v1/vaults/{$this->getVaultId($vault)}/items"
            )->collect(
                //
            )->filter(
                fn(array $item) => $item['category'] === $category->value
            )->transform(
                fn(array $item) => $this->itemFactory->make(collect($item))
            );
        } catch (NotFoundRequestException) {
            return new Collection();
        }
    }

    /**
     * @inheritDoc
     */
    public function get(string|Vault $vault, string $id): ?Item
    {
        try {
            $response = OnePasswordApi::get("/v1/vaults/{$this->getVaultId($vault)}/items/{$id}");
        } catch (NotFoundRequestException) {
            return null;
        }

        return $this->itemFactory->make(
            $response->collect()
        );
    }

    /**
     * @inheritDoc
     */
    public function add(string|Vault $vault, ItemBlueprint $item): Item
    {
        return $this->itemFactory->make(
            OnePasswordApi::post(
                "/v1/vaults/{$this->getVaultId($vault)}/items",
                $item->toArray()
            )->collect()
        );
    }

    /**
     * @inheritDoc
     */
    public function update(Item $item, null|string|Vault $vault = null): Item
    {
        return $this->itemFactory->make(
            OnePasswordApi::patch(
                "/v1/vaults/{$this->getVaultId($vault ?? $item->getVaultId())}/items/{$item->getId()}",
                $item->toJsonPatch()
            )->collect()
        );
    }

    /**
     * @param  string|Vault $vault
     * @return string
     */
    protected function getVaultId(string|Vault $vault): string
    {
        if (is_string($vault)) {
            return $vault;
        }

        return $vault->getId();
    }
}
