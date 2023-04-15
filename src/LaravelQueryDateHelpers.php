<?php

namespace Frameck\LaravelQueryDateHelpers;

use Carbon\Carbon;
use Frameck\LaravelQueryDateHelpers\Enums\DateRangeType;
use Frameck\LaravelQueryDateHelpers\Services\DateService;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class LaravelQueryDateHelpers
{
    public static function registerMacros()
    {
        $builders = [
            EloquentBuilder::class,
            QueryBuilder::class,
        ];

        foreach ($builders as $builder) {
            $builder = app($builder);

            $builder::macro('yesterday', fn (?string $column = null) => (
                DateService::yesterday($this, $column)
            ));

            $builder::macro('today', fn (?string $column = null) => (
                DateService::today($this, $column)
            ));

            $builder::macro('tomorrow', fn (?string $column = null) => (
                DateService::tomorrow($this, $column)
            ));

            $builder::macro('betweenDates', fn (?Carbon $dateStart = null, ?Carbon $dateEnd = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::betweenDates($this, $dateStart, $dateEnd, $column, $dateRangeType)
            ));

            $builder::macro('weekToDate', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::weekToDate($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('monthToDate', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::monthToDate($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('quarterToDate', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::quarterToDate($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('yearToDate', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::yearToDate($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastMinute', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastMinute($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastHour', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastHour($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastWeek', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastWeek($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastMonth', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastMonth($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastQuarter', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastQuarter($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastYear', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastYear($this, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastMinutes', fn (int $numberOfMinutes = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastMinutes($this, $numberOfMinutes, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastHours', fn (int $numberOfHours = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastHours($this, $numberOfHours, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastDays', fn (int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastDays($this, $numberOfDays, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastWeeks', fn (int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastWeeks($this, $numberOfWeeks, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastMonths', fn (int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastMonths($this, $numberOfMonths, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastQuarters', fn (int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastQuarters($this, $numberOfQuarters, $date, $column, $dateRangeType)
            ));

            $builder::macro('lastYears', fn (int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastYears($this, $numberOfYears, $date, $column, $dateRangeType)
            ));

            $builder::macro('thisWeek', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::thisWeek($this, $column, $dateRangeType)
            ));

            $builder::macro('thisMonth', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::thisMonth($this, $column, $dateRangeType)
            ));

            $builder::macro('thisQuarter', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::thisQuarter($this, $column, $dateRangeType)
            ));

            $builder::macro('thisYear', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::thisYear($this, $column, $dateRangeType)
            ));

            $builder::macro('nextMinute', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextMinute($this, $column, $dateRangeType)
            ));

            $builder::macro('nextHour', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextHour($this, $column, $dateRangeType)
            ));

            $builder::macro('nextWeek', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextWeek($this, $column, $dateRangeType)
            ));

            $builder::macro('nextMonth', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextMonth($this, $column, $dateRangeType)
            ));

            $builder::macro('nextQuarter', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextQuarter($this, $column, $dateRangeType)
            ));

            $builder::macro('nextYear', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextYear($this, $column, $dateRangeType)
            ));

            $builder::macro('nextMinutes', fn (int $numberOfMinutes = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextMinutes($this, $numberOfMinutes, $date, $column, $dateRangeType)
            ));

            $builder::macro('nextHours', fn (int $numberOfHours = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextHours($this, $numberOfHours, $date, $column, $dateRangeType)
            ));

            $builder::macro('nextDays', fn (int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextDays($this, $numberOfDays, $date, $column, $dateRangeType)
            ));

            $builder::macro('nextWeeks', fn (int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextWeeks($this, $numberOfWeeks, $date, $column, $dateRangeType)
            ));

            $builder::macro('nextMonths', fn (int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextMonths($this, $numberOfMonths, $date, $column, $dateRangeType)
            ));

            $builder::macro('nextQuarters', fn (int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextQuarters($this, $numberOfQuarters, $date, $column, $dateRangeType)
            ));

            $builder::macro('nextYears', fn (int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextYears($this, $numberOfYears, $date, $column, $dateRangeType)
            ));
        }
    }
}
