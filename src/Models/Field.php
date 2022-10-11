<?php

namespace Untitledpng\Laravel1Password\Models;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Enums\FieldPurpose;
use Untitledpng\Laravel1Password\Enums\FieldType;

class Field extends DataModel
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * @var string
     */
    protected string $label;

    /**
     * @var null|FieldPurpose
     */
    protected ?FieldPurpose $purpose;

    /**
     * @var null|FieldType
     */
    protected ?FieldType $type;

    /**
     * @var string
     */
    protected string $value = 'test';

    /**
     * @var bool
     */
    protected bool $generate;

    /**
     * @var null|GeneratorRecipe
     */
    protected ?GeneratorRecipe $recipe;

    /**
     * @var Section|Collection<string>
     */
    protected Section|Collection $section;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param  string $id
     * @return Field
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param  string $label
     * @return Field
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return null|FieldPurpose
     */
    public function getPurpose(): ?FieldPurpose
    {
        return $this->purpose;
    }

    /**
     * @param  null|FieldPurpose $purpose
     * @return Field
     */
    public function setPurpose(?FieldPurpose $purpose): self
    {
        $this->purpose = $purpose;
        return $this;
    }

    /**
     * @return null|FieldType
     */
    public function getType(): ?FieldType
    {
        return $this->type;
    }

    /**
     * @param  null|FieldType $type
     * @return Field
     */
    public function setType(?FieldType $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param  string $value
     * @return Field
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getGenerate(): bool
    {
        return $this->generate;
    }

    /**
     * @param  bool $generate
     * @return Field
     */
    public function setGenerate(bool $generate): self
    {
        $this->generate = $generate;
        return $this;
    }

    /**
     * @return null|GeneratorRecipe
     */
    public function getRecipe(): ?GeneratorRecipe
    {
        return $this->recipe;
    }

    /**
     * @param  null|GeneratorRecipe $recipe
     * @return Field
     */
    public function setRecipe(?GeneratorRecipe $recipe): self
    {
        $this->recipe = $recipe;
        return $this;
    }

    /**
     * @return Collection|Section
     */
    public function getSection(): Collection|Section
    {
        return $this->section;
    }

    /**
     * @param  Collection|Section $section
     * @return Field
     */
    public function setSection(Collection|Section $section): self
    {
        $this->section = $section;
        return $this;
    }
}
