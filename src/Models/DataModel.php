<?php

namespace Untitledpng\Laravel1Password\Models;

use Carbon\CarbonInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use JsonException;
use JsonSerializable;
use ridvanaltun\JsonPatchGenerator\Utils;
use Untitledpng\Laravel1Password\Contracts\Enums\IsEnumContract;

abstract class DataModel implements Arrayable, Jsonable, JsonSerializable
{
    /**
     * This will contain the original values of this model to
     * later compare if changes have been made.
     *
     * @var array
     */
    protected array $original = [];

    /**
     * Set all attributes as original so that changes later
     * can be compared.
     *
     * @return self
     */
    public function syncOriginal(): self
    {
        $this->original = $this->toArray();
        return $this;
    }

    /**
     * Get the original value of this model when it was filled.
     *
     * @return array
     */
    public function getOriginal(): array
    {
        return $this->original;
    }

    /**
     * See if the current model has been changed compared with
     * the values in the original property of this model.
     *
     * @return bool
     */
    public function isModified(): bool
    {
        return $this->original === $this->toArray();
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $attributes = get_object_vars($this);
        $attributes = Arr::except($attributes, [
            'original',
            'createdAt',
            'updatedAt',
        ]);

        return array_map(static function ($item) {
            if ($item instanceof CarbonInterface) {
                return $item->toDateTimeString();
            }

            if ($item instanceof Arrayable) {
                return $item->toArray();
            }

            if (is_array($item)) {
                return array_map(static function ($item) {
                    return $item instanceof Arrayable ? $item->toArray() : $item;
                }, $item);
            }

            if ($item instanceof IsEnumContract) {
                return $item->value;
            }

            return $item;
        }, $attributes);
    }

    /**
     * @inheritDoc
     * @throws JsonException
     */
    public function toJson($options = 0): string
    {
        return json_encode($this->jsonSerialize(), JSON_THROW_ON_ERROR | $options);
    }

    /**
     * Generate a JsonPatch of the differences between all attributes
     * and the data stored in the original attribute.
     *
     * @return array
     */
    public function toJsonPatch(): array
    {
        return (
            new Utils()
        )->generateJsonPatch(
            currSnap: $this->toArray(),
            oldSnap: $this->getOriginal()
        );
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
