<?php

namespace Untitledpng\Laravel1Password\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use ridvanaltun\JsonPatchGenerator\Utils;
use Untitledpng\Laravel1Password\Contracts\Repositories\ItemRepositoryContract;
use Untitledpng\Laravel1Password\Enums\FieldPurpose;
use Untitledpng\Laravel1Password\Enums\ItemCategory;
use Untitledpng\Laravel1Password\Enums\ItemState;

class Item extends DataModel
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * @var string
     */
    protected string $title;

    /**
     * @var ItemCategory
     */
    protected ItemCategory $category;

    /**
     * @var bool
     */
    protected bool $favorite;

    /**
     * @var array
     */
    protected array $tags;

    /**
     * @var null|int
     */
    protected null|int $version;

    /**
     * @var null|ItemState
     */
    protected null|ItemState $state;

    /**
     * @var null|string
     */
    protected null|string $lastEditedBy;

    /**
     * @var Collection
     */
    protected Collection $sections;

    /**
     * @var Collection
     */
    protected Collection $fields;

    /**
     * @var Collection<Url>
     */
    protected Collection $urls;

    /**
     * @var Carbon
     */
    protected Carbon $createdAt;

    /**
     * @var Carbon
     */
    protected Carbon $updatedAt;

    /**
     * @var Vault|Collection<string>
     */
    protected Vault|Collection $vault;

    public function __construct()
    {
        $this->sections = new Collection();
        $this->fields = new Collection();
    }

    /**
     * Save the item to 1Password.
     *
     * @return $this
     */
    public function save(): self
    {
        return app(
            ItemRepositoryContract::class
        )->update(
            $this
        );
    }

    /**
     * @param  FieldPurpose $purpose
     * @param  Field $field
     * @return Item
     */
    public function setField(FieldPurpose $purpose, Field $field): self
    {
        $this->fields->putFirst(
            static fn (Field $field) => $field->getPurpose() === $purpose,
            $field
        );

        return $this;
    }

    /**
     * @param  string $id
     * @return null|Field
     */
    public function getFieldById(string $id): ?Field
    {
        return $this->fields->first(
            fn (Field $field) => $field->getId() === $id
        );
    }

    /**
     * @param  string $label
     * @return null|Field
     */
    public function getFieldByLabel(string $label): ?Field
    {
        return $this->fields->first(
            fn (Field $field) => $field->getLabel() === $label
        );
    }

    /**
     * @return null|Field
     */
    public function getUsernameField(): ?Field
    {
        return $this->fields->first(
            static fn (Field $field) => $field->getPurpose() === FieldPurpose::USERNAME || $field->getId() === 'username'
        );
    }

    /**
     * @param  Field $field
     * @return $this
     */
    public function setUsernameField(Field $field): self
    {
        return $this->setField(FieldPurpose::USERNAME, $field);
    }

    /**
     * @return null|Field
     */
    public function getPasswordField(): ?Field
    {
        return $this->fields->first(
            static fn (Field $field) => $field->getPurpose() === FieldPurpose::PASSWORD || $field->getId() === 'password'
        );
    }

    /**
     * @param  Field $field
     * @return $this
     */
    public function setPasswordField(Field $field): self
    {
        return $this->setField(FieldPurpose::PASSWORD, $field);
    }

    /**
     * @inheritDoc
     */
    public function toJsonPatch(): array
    {
        $current = $this->toArray();
        $original = $this->getOriginal();

        $current['fields'] = collect(
            $current['fields']
        )->mapWithKeys(
            static fn (array $field) => [$field['id'] => $field]
        )->all();

        $original['fields'] = collect(
            $original['fields']
        )->mapWithKeys(
            static fn (array $field) => [$field['id'] => $field]
        )->all();

        return (
            new Utils()
        )->generateJsonPatch(
            currSnap: $current,
            oldSnap: $original
        );
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param  string $id
     * @return Item
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param  string $title
     * @return Item
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
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
     * @return Item
     */
    public function setCategory(ItemCategory $category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return bool
     */
    public function getFavorite(): bool
    {
        return $this->favorite;
    }

    /**
     * @param  bool $favorite
     * @return Item
     */
    public function setFavorite(bool $favorite): self
    {
        $this->favorite = $favorite;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param  array $tags
     * @return Item
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return null|int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param  null|int $version
     * @return Item
     */
    public function setVersion(?int $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return null|ItemState
     */
    public function getState(): ?ItemState
    {
        return $this->state;
    }

    /**
     * @param  null|ItemState $state
     * @return Item
     */
    public function setState(?ItemState $state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastEditedBy(): ?string
    {
        return $this->lastEditedBy;
    }

    /**
     * @param  null|string $lastEditedBy
     * @return Item
     */
    public function setLastEditedBy(?string $lastEditedBy): self
    {
        $this->lastEditedBy = $lastEditedBy;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param  Carbon $createdAt
     * @return Item
     */
    public function setCreatedAt(Carbon $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param  Carbon $updatedAt
     * @return Item
     */
    public function setUpdatedAt(Carbon $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
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
     * @return Item
     */
    public function setUrls(Collection $urls): self
    {
        $this->urls = $urls;
        return $this;
    }

    /**
     * @return Collection|Vault
     */
    public function getVault(): Vault|Collection
    {
        return $this->vault;
    }

    /**
     * @param  Vault|string $vault
     * @return Item
     */
    public function setVault(Vault|string $vault): self
    {
        if (is_string($vault)) {
            $this->vault = collect([
                'id' => $vault,
            ]);
            return $this;
        }

        $this->vault = $vault;
        return $this;
    }

    /**
     * @return string
     */
    public function getVaultId(): string
    {
        if ($this->vault instanceof Vault) {
            return $this->vault->getId();
        }

        return $this->vault->get('id');
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
     * @return Item
     */
    public function setSections(Collection $sections): self
    {
        $this->sections = $sections;
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
     * @return Item
     */
    public function setFields(Collection $fields): self
    {
        $this->fields = $fields;
        return $this;
    }
}
