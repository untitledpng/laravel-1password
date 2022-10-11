<?php

namespace Untitledpng\Laravel1Password\Models;

use Illuminate\Support\Carbon;
use Untitledpng\Laravel1Password\Enums\VaultType;

class Vault extends DataModel
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var null|string
     */
    protected null|string $description;

    /**
     * @var int
     */
    protected int $attributeVersion;

    /**
     * @var int
     */
    protected int $contentVersion;

    /**
     * @var int
     */
    protected int $itemCount;

    /**
     * @var VaultType
     */
    protected VaultType $type;

    /**
     * @var Carbon
     */
    protected Carbon $createdAt;

    /**
     * @var Carbon
     */
    protected Carbon $updatedAt;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param  string $id
     * @return Vault
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string $name
     * @return Vault
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param  null|string $description
     * @return Vault
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttributeVersion(): int
    {
        return $this->attributeVersion;
    }

    /**
     * @param  int $attributeVersion
     * @return Vault
     */
    public function setAttributeVersion(int $attributeVersion): self
    {
        $this->attributeVersion = $attributeVersion;
        return $this;
    }

    /**
     * @return int
     */
    public function getContentVersion(): int
    {
        return $this->contentVersion;
    }

    /**
     * @param  int $contentVersion
     * @return Vault
     */
    public function setContentVersion(int $contentVersion): self
    {
        $this->contentVersion = $contentVersion;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemCount(): int
    {
        return $this->itemCount;
    }

    /**
     * @param  int $itemCount
     * @return Vault
     */
    public function setItemCount(int $itemCount): self
    {
        $this->itemCount = $itemCount;
        return $this;
    }

    /**
     * @return VaultType
     */
    public function getType(): VaultType
    {
        return $this->type;
    }

    /**
     * @param  VaultType $type
     * @return Vault
     */
    public function setType(VaultType $type): self
    {
        $this->type = $type;
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
     * @return Vault
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
     * @return Vault
     */
    public function setUpdatedAt(Carbon $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
