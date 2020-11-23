<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class BorrowStatus extends Enum
{
    const request = 0;
    const borrowing = 1;
    const paid = 2;
    const reject = 3;
}
