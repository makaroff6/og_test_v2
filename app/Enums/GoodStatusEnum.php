<?php

namespace App\Enums;

enum GoodStatusEnum: string
{
    case NEW = 'new';
    case SELLING = 'selling';
    case SOLD = 'sold';
}
