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
            app($builder)::macro('yesterday', fn (?string $column = null) => (
                DateService::yesterday($this, $column)
            ));

            app($builder)::macro('today', fn (?string $column = null) => (
                DateService::today($this, $column)
            ));

            app($builder)::macro('tomorrow', fn (?string $column = null) => (
                DateService::tomorrow($this, $column)
            ));

            app($builder)::macro('betweenDates', fn (?Carbon $dateStart = null, ?Carbon $dateEnd = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::betweenDates($this, $dateStart, $dateEnd, $column, $dateRangeType)
            ));

            app($builder)::macro('weekToDate', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::weekToDate($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('monthToDate', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::monthToDate($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('quarterToDate', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::quarterToDate($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('yearToDate', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::yearToDate($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastMinute', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastMinute($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastHour', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastHour($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastWeek', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastWeek($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastMonth', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastMonth($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastQuarter', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastQuarter($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastYear', fn (?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastYear($this, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastMinutes', fn (int $numberOfMinutes = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastMinutes($this, $numberOfMinutes, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastHours', fn (int $numberOfHours = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastHours($this, $numberOfHours, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastDays', fn (int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastDays($this, $numberOfDays, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastWeeks', fn (int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastWeeks($this, $numberOfWeeks, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastMonths', fn (int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastMonths($this, $numberOfMonths, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastQuarters', fn (int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastQuarters($this, $numberOfQuarters, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('lastYears', fn (int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::lastYears($this, $numberOfYears, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('thisWeek', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::thisWeek($this, $column, $dateRangeType)
            ));

            app($builder)::macro('thisMonth', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::thisMonth($this, $column, $dateRangeType)
            ));

            app($builder)::macro('thisQuarter', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::thisQuarter($this, $column, $dateRangeType)
            ));

            app($builder)::macro('thisYear', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::thisYear($this, $column, $dateRangeType)
            ));

            app($builder)::macro('nextMinute', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextMinute($this, $column, $dateRangeType)
            ));

            app($builder)::macro('nextHour', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextHour($this, $column, $dateRangeType)
            ));

            app($builder)::macro('nextWeek', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextWeek($this, $column, $dateRangeType)
            ));

            app($builder)::macro('nextMonth', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextMonth($this, $column, $dateRangeType)
            ));

            app($builder)::macro('nextQuarter', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextQuarter($this, $column, $dateRangeType)
            ));

            app($builder)::macro('nextYear', fn (?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextYear($this, $column, $dateRangeType)
            ));

            app($builder)::macro('nextMinutes', fn (int $numberOfMinutes = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextMinutes($this, $numberOfMinutes, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('nextHours', fn (int $numberOfHours = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextHours($this, $numberOfHours, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('nextDays', fn (int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextDays($this, $numberOfDays, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('nextWeeks', fn (int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextWeeks($this, $numberOfWeeks, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('nextMonths', fn (int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextMonths($this, $numberOfMonths, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('nextQuarters', fn (int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextQuarters($this, $numberOfQuarters, $date, $column, $dateRangeType)
            ));

            app($builder)::macro('nextYears', fn (int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null) => (
                DateService::nextYears($this, $numberOfYears, $date, $column, $dateRangeType)
            ));
        }
    }
}
