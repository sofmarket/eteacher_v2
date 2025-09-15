<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum InvoiceStatusEnum: string
{
    use EnumToArray;

    case PENDING = 'pending';
    case PAID = 'paid';
    case REFUNDED = 'refunded';
}
