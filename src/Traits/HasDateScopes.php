<?php

namespace Frameck\LaravelQueryDateHelpers\Traits;

use Carbon\Carbon;
use Frameck\LaravelQueryDateHelpers\Enums\DateRangeType;
use Frameck\LaravelQueryDateHelpers\Services\DateService;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

trait HasDateScopes
{
    public function scopeYesterday(EloquentBuilder|QueryBuilder $builder, ?string $column = null): EloquentBuilder|QueryBuilder
    {
        return DateService::yesterday($builder, $column);
    }

    public function scopeToday(EloquentBuilder|QueryBuilder $builder, ?string $column = null): EloquentBuilder|QueryBuilder
    {
        return DateService::today($builder, $column);
    }

    public function scopeTomorrow(EloquentBuilder|QueryBuilder $builder, ?string $column = null): EloquentBuilder|QueryBuilder
    {
        return DateService::tomorrow($builder, $column);
    }

    public function scopeBetweenDates(EloquentBuilder|QueryBuilder $builder, ?Carbon $dateStart = null, ?Carbon $dateEnd = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::betweenDates($builder, $dateStart, $dateEnd, $column, $dateRangeType);
    }

    public function scopeWeekToDate(EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::weekToDate($builder, $date, $column, $dateRangeType);
    }

    public function scopeMonthToDate(EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::monthToDate($builder, $date, $column, $dateRangeType);
    }

    public function scopeQuarterToDate(EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::quarterToDate($builder, $date, $column, $dateRangeType);
    }

    public function scopeYearToDate(EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::yearToDate($builder, $date, $column, $dateRangeType);
    }

    public function scopeLastMinute(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastMinute($builder, $column, $dateRangeType);
    }

    public function scopeLastHour(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastHour($builder, $column, $dateRangeType);
    }

    public function scopeLastWeek(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastWeek($builder, $column, $dateRangeType);
    }

    public function scopeLastMonth(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastMonth($builder, $column, $dateRangeType);
    }

    public function scopeLastQuarter(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastQuarter($builder, $column, $dateRangeType);
    }

    public function scopeLastYear(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastYear($builder, $column, $dateRangeType);
    }

    public function scopeLastMinutes(EloquentBuilder|QueryBuilder $builder, int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastMinutes($builder, $numberOfMinutes, $date, $column, $dateRangeType);
    }

    public function scopeLastHours(EloquentBuilder|QueryBuilder $builder, int $numberOfHours = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastHours($builder, $numberOfHours, $date, $column, $dateRangeType);
    }

    public function scopeLastDays(EloquentBuilder|QueryBuilder $builder, int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastDays($builder, $numberOfDays, $date, $column, $dateRangeType);
    }

    public function scopeLastWeeks(EloquentBuilder|QueryBuilder $builder, int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastWeeks($builder, $numberOfWeeks, $date, $column, $dateRangeType);
    }

    public function scopeLastMonths(EloquentBuilder|QueryBuilder $builder, int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastMonths($builder, $numberOfMonths, $date, $column, $dateRangeType);
    }

    public function scopeLastQuarters(EloquentBuilder|QueryBuilder $builder, int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastQuarters($builder, $numberOfQuarters, $date, $column, $dateRangeType);
    }

    public function scopeLastYears(EloquentBuilder|QueryBuilder $builder, int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::lastYears($builder, $numberOfYears, $date, $column, $dateRangeType);
    }

    public function scopeThisWeek(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::thisWeek($builder, $column, $dateRangeType);
    }

    public function scopeThisMonth(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::thisMonth($builder, $column, $dateRangeType);
    }

    public function scopeThisQuarter(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::thisQuarter($builder, $column, $dateRangeType);
    }

    public function scopeThisYear(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::thisYear($builder, $column, $dateRangeType);
    }

    public function scopeNextMinute(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextMinute($builder, $column, $dateRangeType);
    }

    public function scopeNextHour(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextHour($builder, $column, $dateRangeType);
    }

    public function scopeNextWeek(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextWeek($builder, $column, $dateRangeType);
    }

    public function scopeNextMonth(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextMonth($builder, $column, $dateRangeType);
    }

    public function scopeNextQuarter(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextQuarter($builder, $column, $dateRangeType);
    }

    public function scopeNextYear(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextYear($builder, $column, $dateRangeType);
    }

    public function scopeNextMinutes(EloquentBuilder|QueryBuilder $builder, int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextMinutes($builder, $numberOfMinutes, $date, $column, $dateRangeType);
    }

    public function scopeNextHours(EloquentBuilder|QueryBuilder $builder, int $numberOfHours = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextHours($builder, $numberOfHours, $date, $column, $dateRangeType);
    }

    public function scopeNextDays(EloquentBuilder|QueryBuilder $builder, int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextDays($builder, $numberOfDays, $date, $column, $dateRangeType);
    }

    public function scopeNextWeeks(EloquentBuilder|QueryBuilder $builder, int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextWeeks($builder, $numberOfWeeks, $date, $column, $dateRangeType);
    }

    public function scopeNextMonths(EloquentBuilder|QueryBuilder $builder, int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextMonths($builder, $numberOfMonths, $date, $column, $dateRangeType);
    }

    public function scopeNextQuarters(EloquentBuilder|QueryBuilder $builder, int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextQuarters($builder, $numberOfQuarters, $date, $column, $dateRangeType);
    }

    public function scopeNextYears(EloquentBuilder|QueryBuilder $builder, int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return DateService::nextYears($builder, $numberOfYears, $date, $column, $dateRangeType);
    }
}
