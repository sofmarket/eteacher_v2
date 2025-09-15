<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum UserWithrawalStatusEnum: string
{
    use EnumToArray;
    
    case PENDING = 'pending';
    case PAID = 'paid';
    case DECLINED = 'declined';
}
