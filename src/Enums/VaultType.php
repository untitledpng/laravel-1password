<?php

namespace Untitledpng\Laravel1Password\Enums;

use Untitledpng\Laravel1Password\Contracts\Enums\IsEnumContract;

enum VaultType: string implements IsEnumContract
{
    case EVERYONE = 'EVERYONE';
    case PERSONAL = 'PERSONAL';
    case USER_CREATED = 'USER_CREATED';
}
