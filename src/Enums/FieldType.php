<?php

namespace Untitledpng\Laravel1Password\Enums;

enum FieldType: string implements \Untitledpng\Laravel1Password\Contracts\Enums\IsEnumContract
{
    case STRING = 'STRING';
    case EMAIL = 'EMAIL';
    case CONCEALED = 'CONCEALED';
    case URL = 'URL';
    case OTP = 'OTP';
    case DATE = 'DATE';
    case MONTH_YEAR = 'MONTH_YEAR';
    case MENU = 'MENU';
}
