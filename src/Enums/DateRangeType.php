<?php

namespace Frameck\LaravelQueryDateHelpers\Enums;

enum DateRangeType: int
{
    case INCLUSIVE = 1;
    case EXCLUSIVE = 2;
}
