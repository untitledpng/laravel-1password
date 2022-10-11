<?php

namespace Untitledpng\Laravel1Password\Models;

class Section extends DataModel
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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param  string $id
     * @return Section
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
     * @return Section
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }
}
