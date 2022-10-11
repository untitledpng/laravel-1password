<?php

namespace Untitledpng\Laravel1Password\Enums;

use Untitledpng\Laravel1Password\Contracts\Enums\IsEnumContract;

enum ItemState: string implements IsEnumContract
{
    case ARCHIVED = 'ARCHIVED';
    case DELETED = 'DELETED';
}
