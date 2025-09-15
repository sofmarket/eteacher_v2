<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum DisputeStatusEnum: string
{
    use EnumToArray;

    case CLOSED = 'closed';
    case PENDING = 'pending';
    case UNDER_REVIEW = 'under_review';
    case IN_DISCUSSION = 'in_discussion';
}
