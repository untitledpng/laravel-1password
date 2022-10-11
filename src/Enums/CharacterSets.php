<?php

namespace Untitledpng\Laravel1Password\Enums;

enum CharacterSets: string implements \Untitledpng\Laravel1Password\Contracts\Enums\IsEnumContract
{
    case LETTERS = 'LETTERS';
    case DIGITS = 'DIGITS';
    case SYMBOLS = 'SYMBOLS';
}
