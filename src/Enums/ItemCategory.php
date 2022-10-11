<?php

namespace Untitledpng\Laravel1Password\Enums;

use Untitledpng\Laravel1Password\Contracts\Enums\IsEnumContract;

enum ItemCategory: string implements IsEnumContract
{
    case LOGIN = 'LOGIN';
    case PASSWORD = 'PASSWORD';
    case API_CREDENTIAL = 'API_CREDENTIAL';
    case SERVER = 'SERVER';
    case DATABASE = 'DATABASE';
    case CREDIT_CARD = 'CREDIT_CARD';
    case MEMBERSHIP = 'MEMBERSHIP';
    case PASSPORT = 'PASSPORT';
    case SOFTWARE_LICENSE = 'SOFTWARE_LICENSE';
    case OUTDOOR_LICENSE = 'OUTDOOR_LICENSE';
    case SECURE_NOTE = 'SECURE_NOTE';
    case WIRELESS_ROUTER = 'WIRELESS_ROUTER';
    case BANK_ACCOUNT = 'BANK_ACCOUNT';
    case DRIVER_LICENSE = 'DRIVER_LICENSE';
    case IDENTITY = 'IDENTITY';
    case REWARD_PROGRAM = 'REWARD_PROGRAM';
    case DOCUMENT = 'DOCUMENT';
    case EMAIL_ACCOUNT = 'EMAIL_ACCOUNT';
    case SOCIAL_SECURITY_NUMBER = 'SOCIAL_SECURITY_NUMBER';
    case MEDICAL_RECORD = 'MEDICAL_RECORD';
    case SSH_KEY = 'SSH_KEY';
}
