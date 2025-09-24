<?php

namespace App\Enums;

enum Role: int
{
    case USER = 0;
    case CONTRIBUTOR = 1;
    case ADMINISTRATOR = 2;
}
