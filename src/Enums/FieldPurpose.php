<?php

namespace Untitledpng\Laravel1Password\Enums;

enum FieldPurpose: string implements \Untitledpng\Laravel1Password\Contracts\Enums\IsEnumContract
{
    case USERNAME = 'USERNAME';
    case PASSWORD = 'PASSWORD';
    case NOTES = 'NOTES';
}
