<?php

namespace Untitledpng\Laravel1Password\Models\Blueprints;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Enums\ItemCategory;
use Untitledpng\Laravel1Password\Models\DataModel;
use Untitledpng\Laravel1Password\Models\Url;
use Untitledpng\Laravel1Password\Models\Vault;

class ItemBlueprint extends DataModel
{
    /**
     * @var string
     */
    protected string $title;

    /**
     * @var Vault
     */
    protected Vault $vault;

    /**
     * @var ItemCategory
     */
    protected ItemCategory $category;

    /**
     * @var Collection<Url>
     */
    protected Collection $urls;

    /**
     * @var Collection<string>
     */
    protected Collection $tags;

    /**
     * @var Collection
     */
    protected Collection $fields;

    /**
     * @var Collection
     */
    protected Collection $sections;

    /**
     * @var bool
     */
    protected bool $favorite = false;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param  string $title
     * @return ItemBlueprint
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Vault
     */
    public function getVault(): Vault
    {
        return $this->vault;
    }

    /**
     * @param  Vault $vault
     * @return ItemBlueprint
     */
    public function setVault(Vault $vault): self
    {
        $this->vault = $vault;
        return $this;
    }

    /**
     * @return ItemCategory
     */
    public function getCategory(): ItemCategory
    {
        return $this->category;
    }

    /**
     * @param  ItemCategory $category
     * @return ItemBlueprint
     */
    public function setCategory(ItemCategory $category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getUrls(): Collection
    {
        return $this->urls;
    }

    /**
     * @param  Collection $urls
     * @return ItemBlueprint
     */
    public function setUrls(Collection $urls): self
    {
        $this->urls = $urls;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param  Collection $tags
     * @return ItemBlueprint
     */
    public function setTags(Collection $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getFields(): Collection
    {
        return $this->fields;
    }

    /**
     * @param  Collection $fields
     * @return ItemBlueprint
     */
    public function setFields(Collection $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    /**
     * @param  Collection $sections
     * @return ItemBlueprint
     */
    public function setSections(Collection $sections): self
    {
        $this->sections = $sections;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFavorite(): bool
    {
        return $this->favorite;
    }

    /**
     * @param  bool $favorite
     * @return ItemBlueprint
     */
    public function setFavorite(bool $favorite): self
    {
        $this->favorite = $favorite;
        return $this;
    }
}
