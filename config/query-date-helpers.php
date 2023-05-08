<?php

use Frameck\LaravelQueryDateHelpers\Enums\DateRangeType;

return [
    /**
     * If you want to exclude the current day/week/month/year etc. in the range you could use the exclusive range here as a default.
     * Note that you can also optionally specify it for almost every macro/scope directly when using it:
     * Order::lastDays(range: DateRangeType::EXCLUSIVE);
     * This will do an exclusive query, even though the global default range here is set to inclusive.
     *
     * Possible values here are: DateRangeType::INCLUSIVE or DateRangeType::EXCLUSIVE
     */
    'date_range_type' => DateRangeType::INCLUSIVE,

    /**
     * By default this package registers all the provided macros on Eloquent and Query builder.
     * If you don't want this behaviour set this value to false.
     * If you decide to not use the macros, this package provides also a trait that you can use on a specific model.
     */
    'register_macros' => true,

    /**
     * When using Eloquent the package will use the CREATED_AT column
     *
     * @link https://laravel.com/docs/10.x/eloquent#timestamps
     *
     * When using Query Builder it uses the column below
     */
    'column' => 'created_at',
];
