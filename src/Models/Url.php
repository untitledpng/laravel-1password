<?php

namespace Untitledpng\Laravel1Password\Models;

class Url extends DataModel
{
    protected null|string $label;
    protected bool $primary;
    protected string $href;

    /**
     * @return null|string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param  null|string $label
     * @return Url
     */
    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPrimary(): bool
    {
        return $this->primary;
    }

    /**
     * @param  bool $primary
     * @return Url
     */
    public function setPrimary(bool $primary): self
    {
        $this->primary = $primary;
        return $this;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param  string $href
     * @return Url
     */
    public function setHref(string $href): self
    {
        $this->href = $href;
        return $this;
    }
}
