<?php

namespace Untitledpng\Laravel1Password\Contracts\Repositories;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Enums\ItemCategory;
use Untitledpng\Laravel1Password\Exceptions\NotFoundRequestException;
use Untitledpng\Laravel1Password\Exceptions\UnauthorizedRequestException;
use Untitledpng\Laravel1Password\Models\Blueprints\ItemBlueprint;
use Untitledpng\Laravel1Password\Models\Item;
use Untitledpng\Laravel1Password\Models\Vault;

interface ItemRepositoryContract
{
    /**
     * Get all items of the given vault.
     *
     * @param  string|Vault $vault
     * @return Collection
     * @throws UnauthorizedRequestException
     */
    public function getAll(string|Vault $vault): Collection;

    /**
     * Get all items of a specific category from the given vault.
     *
     * @param  string|Vault $vault
     * @param  ItemCategory $category
     * @return Collection
     * @throws UnauthorizedRequestException
     */
    public function getAllByCategory(string|Vault $vault, ItemCategory $category): Collection;

    /**
     * Get an item by its ID.
     *
     * @param  string|Vault $vault
     * @param  string $id
     * @return null|Item
     * @throws UnauthorizedRequestException
     */
    public function get(string|Vault $vault, string $id): ?Item;

    /**
     * Add a new item to 1Password.
     *
     * @param  string|Vault $vault
     * @param  ItemBlueprint $item
     * @return Item
     * @throws UnauthorizedRequestException|NotFoundRequestException
     */
    public function add(string|Vault $vault, ItemBlueprint $item): Item;

    /**
     * Update an existing item to 1Password.
     *
     * @param  Item $item
     * @param  null|string|Vault $vault
     * @return Item
     */
    public function update(Item $item, null|string|Vault $vault = null): Item;
}
