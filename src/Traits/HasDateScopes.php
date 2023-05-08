<?php

namespace Frameck\LaravelQueryDateHelpers\Traits;

use Carbon\Carbon;
use Frameck\LaravelQueryDateHelpers\Enums\DateRangeType;
use Frameck\LaravelQueryDateHelpers\Services\DateService;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder yesterday(?string $column = null)
 * @method static Builder today(?string $column = null)
 * @method static Builder tomorrow(?string $column = null)
 * @method static Builder betweenDates(?Carbon $dateStart = null, ?Carbon $dateEnd = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 *
 * TO DATE METHODS
 * @method static Builder weekToDate(?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder monthToDate(?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder quarterToDate(?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder yearToDate(?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 *
 * LAST METHODS
 * @method static Builder lastMinute(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastHour(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastWeek(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastMonth(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastQuarter(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastYear(?string $column = null, ?DateRangeType $dateRangeType = null)
 *
 * LAST N METHODS
 * @method static Builder lastMinutes(int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastHours(int $numberOfHours = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastDays(int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastWeeks(int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastMonths(int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastQuarters(int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder lastYears(int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 *
 * THIS METHODS
 * @method static Builder thisWeek(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder thisMonth(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder thisQuarter(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder thisYear(?string $column = null, ?DateRangeType $dateRangeType = null)
 *
 * NEXT METHODS
 * @method static Builder nextMinute(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextHour(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextWeek(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextMonth(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextQuarter(?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextYear(?string $column = null, ?DateRangeType $dateRangeType = null)
 *
 * NEXT N METHODS
 * @method static Builder nextMinutes(int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextHours(int $numberOfHours = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextDays(int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextWeeks(int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextMonths(int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextQuarters(int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 * @method static Builder nextYears(int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null)
 */
trait HasDateScopes
{
    public function scopeYesterday(Builder $builder, ?string $column = null): Builder
    {
        return DateService::yesterday($builder, $column);
    }

    public function scopeToday(Builder $builder, ?string $column = null): Builder
    {
        return DateService::today($builder, $column);
    }

    public function scopeTomorrow(Builder $builder, ?string $column = null): Builder
    {
        return DateService::tomorrow($builder, $column);
    }

    public function scopeBetweenDates(Builder $builder, ?Carbon $dateStart = null, ?Carbon $dateEnd = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::betweenDates($builder, $dateStart, $dateEnd, $column, $dateRangeType);
    }

    // TO DATE METHODS
    public function scopeWeekToDate(Builder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::weekToDate($builder, $date, $column, $dateRangeType);
    }

    public function scopeMonthToDate(Builder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::monthToDate($builder, $date, $column, $dateRangeType);
    }

    public function scopeQuarterToDate(Builder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::quarterToDate($builder, $date, $column, $dateRangeType);
    }

    public function scopeYearToDate(Builder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::yearToDate($builder, $date, $column, $dateRangeType);
    }

    // LAST METHODS
    public function scopeLastMinute(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastMinute($builder, $column, $dateRangeType);
    }

    public function scopeLastHour(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastHour($builder, $column, $dateRangeType);
    }

    public function scopeLastWeek(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastWeek($builder, $column, $dateRangeType);
    }

    public function scopeLastMonth(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastMonth($builder, $column, $dateRangeType);
    }

    public function scopeLastQuarter(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastQuarter($builder, $column, $dateRangeType);
    }

    public function scopeLastYear(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastYear($builder, $column, $dateRangeType);
    }

    // LAST N METHODS
    public function scopeLastMinutes(Builder $builder, int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastMinutes($builder, $numberOfMinutes, $date, $column, $dateRangeType);
    }

    public function scopeLastHours(Builder $builder, int $numberOfHours = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastHours($builder, $numberOfHours, $date, $column, $dateRangeType);
    }

    public function scopeLastDays(Builder $builder, int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastDays($builder, $numberOfDays, $date, $column, $dateRangeType);
    }

    public function scopeLastWeeks(Builder $builder, int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastWeeks($builder, $numberOfWeeks, $date, $column, $dateRangeType);
    }

    public function scopeLastMonths(Builder $builder, int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastMonths($builder, $numberOfMonths, $date, $column, $dateRangeType);
    }

    public function scopeLastQuarters(Builder $builder, int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastQuarters($builder, $numberOfQuarters, $date, $column, $dateRangeType);
    }

    public function scopeLastYears(Builder $builder, int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::lastYears($builder, $numberOfYears, $date, $column, $dateRangeType);
    }

    // THIS METHODS
    public function scopeThisWeek(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::thisWeek($builder, $column, $dateRangeType);
    }

    public function scopeThisMonth(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::thisMonth($builder, $column, $dateRangeType);
    }

    public function scopeThisQuarter(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::thisQuarter($builder, $column, $dateRangeType);
    }

    public function scopeThisYear(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::thisYear($builder, $column, $dateRangeType);
    }

    // NEXT METHODS
    public function scopeNextMinute(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextMinute($builder, $column, $dateRangeType);
    }

    public function scopeNextHour(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextHour($builder, $column, $dateRangeType);
    }

    public function scopeNextWeek(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextWeek($builder, $column, $dateRangeType);
    }

    public function scopeNextMonth(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextMonth($builder, $column, $dateRangeType);
    }

    public function scopeNextQuarter(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextQuarter($builder, $column, $dateRangeType);
    }

    public function scopeNextYear(Builder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextYear($builder, $column, $dateRangeType);
    }

    // NEXT N METHODS
    public function scopeNextMinutes(Builder $builder, int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextMinutes($builder, $numberOfMinutes, $date, $column, $dateRangeType);
    }

    public function scopeNextHours(Builder $builder, int $numberOfHours = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextHours($builder, $numberOfHours, $date, $column, $dateRangeType);
    }

    public function scopeNextDays(Builder $builder, int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextDays($builder, $numberOfDays, $date, $column, $dateRangeType);
    }

    public function scopeNextWeeks(Builder $builder, int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextWeeks($builder, $numberOfWeeks, $date, $column, $dateRangeType);
    }

    public function scopeNextMonths(Builder $builder, int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextMonths($builder, $numberOfMonths, $date, $column, $dateRangeType);
    }

    public function scopeNextQuarters(Builder $builder, int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextQuarters($builder, $numberOfQuarters, $date, $column, $dateRangeType);
    }

    public function scopeNextYears(Builder $builder, int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): Builder
    {
        return DateService::nextYears($builder, $numberOfYears, $date, $column, $dateRangeType);
    }
}
