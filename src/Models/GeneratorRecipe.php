<?php

namespace Untitledpng\Laravel1Password\Models;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Enums\CharacterSets;

class GeneratorRecipe extends DataModel
{
    /**
     * @var null|int
     */
    protected ?int $length;

    /**
     * @var null|Collection<CharacterSets>
     */
    protected ?Collection $characterSets;

    /**
     * @var null|string
     */
    protected ?string $excludeCharacters;
}
