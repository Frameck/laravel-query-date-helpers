<?php

namespace Frameck\LaravelQueryDateHelpers\Services;

use Carbon\Carbon;
use Frameck\LaravelQueryDateHelpers\Enums\DateRangeType;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class DateService
{
    public static function yesterday(EloquentBuilder|QueryBuilder $builder, ?string $column = null): EloquentBuilder|QueryBuilder
    {
        return $builder->whereDate(
            $column ?? static::getCreatedAtColumn($builder),
            now()->yesterday()
        );
    }

    public static function today(EloquentBuilder|QueryBuilder $builder, ?string $column = null): EloquentBuilder|QueryBuilder
    {
        if (!$column) {
            $column = static::getCreatedAtColumn($builder);
        }

        return $builder->whereDate(
            $column ?? static::getCreatedAtColumn($builder),
            now()
        );
    }

    public static function tomorrow(EloquentBuilder|QueryBuilder $builder, ?string $column = null): EloquentBuilder|QueryBuilder
    {
        return $builder->whereDate(
            $column ?? static::getCreatedAtColumn($builder),
            now()->tomorrow()
        );
    }

    public static function betweenDates(EloquentBuilder|QueryBuilder $builder, ?Carbon $dateStart = null, ?Carbon $dateEnd = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        $column ??= static::getCreatedAtColumn($builder);

        $rangeType = $dateRangeType ?? config('query-date-helpers.date_range_type', DateRangeType::INCLUSIVE);

        return $builder
            ->whereDate(
                $column,
                '>=',
                $dateStart ?? now()
            )
            ->whereDate(
                $column,
                $rangeType === DateRangeType::INCLUSIVE ? '<=' : '<',
                $dateEnd ?? now()
            );
    }

    // TO DATE METHODS
    public static function weekToDate(EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::toDate('week', $builder, $date, $column, $dateRangeType);
    }

    public static function monthToDate(EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::toDate('month', $builder, $date, $column, $dateRangeType);
    }

    public static function quarterToDate(EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::toDate('quarter', $builder, $date, $column, $dateRangeType);
    }

    public static function yearToDate(EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::toDate('year', $builder, $date, $column, $dateRangeType);
    }

    // LAST METHODS
    public static function lastMinute(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::lastMinutes(
            $builder,
            1,
            column: $column,
            dateRangeType: $dateRangeType,
        );
    }

    public static function lastHour(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::lastHours(
            $builder,
            1,
            column: $column,
            dateRangeType: $dateRangeType,
        );
    }

    public static function lastWeek(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::weekToDate(
            $builder,
            now()->subWeek()->endOfWeek(),
            $column,
            $dateRangeType,
        );
    }

    public static function lastMonth(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::monthToDate(
            $builder,
            now()->subMonthNoOverflow()->endOfMonth(),
            $column,
            $dateRangeType,
        );
    }

    public static function lastQuarter(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::quarterToDate(
            $builder,
            now()->subQuarterNoOverflow()->endOfQuarter(),
            $column,
            $dateRangeType,
        );
    }

    public static function lastYear(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::yearToDate(
            $builder,
            now()->subYearNoOverflow()->endOfYear(),
            $column,
            $dateRangeType,
        );
    }

    // LAST N METHODS
    public static function lastMinutes(EloquentBuilder|QueryBuilder $builder, int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('sub', 'minutes', $builder, $numberOfMinutes, $date, $column, $dateRangeType);
    }

    public static function lastHours(EloquentBuilder|QueryBuilder $builder, int $numberOfHours = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('sub', 'hours', $builder, $numberOfHours, $date, $column, $dateRangeType);
    }

    public static function lastDays(EloquentBuilder|QueryBuilder $builder, int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('sub', 'days', $builder, $numberOfDays, $date, $column, $dateRangeType);
    }

    public static function lastWeeks(EloquentBuilder|QueryBuilder $builder, int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('sub', 'weeks', $builder, $numberOfWeeks, $date, $column, $dateRangeType);
    }

    public static function lastMonths(EloquentBuilder|QueryBuilder $builder, int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('sub', 'months', $builder, $numberOfMonths, $date, $column, $dateRangeType);
    }

    public static function lastQuarters(EloquentBuilder|QueryBuilder $builder, int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('sub', 'quarters', $builder, $numberOfQuarters, $date, $column, $dateRangeType);
    }

    public static function lastYears(EloquentBuilder|QueryBuilder $builder, int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('sub', 'years', $builder, $numberOfYears, $date, $column, $dateRangeType);
    }

    // THIS METHODS
    public static function thisWeek(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::weekToDate(
            $builder,
            now()->endOfWeek(),
            $column,
            $dateRangeType,
        );
    }

    public static function thisMonth(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::monthToDate(
            $builder,
            now()->endOfMonth(),
            $column,
            $dateRangeType,
        );
    }

    public static function thisQuarter(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::quarterToDate(
            $builder,
            now()->endOfQuarter(),
            $column,
            $dateRangeType,
        );
    }

    public static function thisYear(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::yearToDate(
            $builder,
            now()->endOfYear(),
            $column,
            $dateRangeType,
        );
    }

    // NEXT METHODS
    public static function nextMinute(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::nextMinutes(
            $builder,
            1,
            column: $column,
            dateRangeType: $dateRangeType,
        );
    }

    public static function nextHour(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::nextHours(
            $builder,
            1,
            column: $column,
            dateRangeType: $dateRangeType,
        );
    }

    public static function nextWeek(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::weekToDate(
            $builder,
            now()->addWeek()->endOfWeek(),
            $column,
            $dateRangeType,
        );
    }

    public static function nextMonth(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::monthToDate(
            $builder,
            now()->addMonthNoOverflow()->endOfMonth(),
            $column,
            $dateRangeType,
        );
    }

    public static function nextQuarter(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::quarterToDate(
            $builder,
            now()->addQuarterNoOverflow()->endOfQuarter(),
            $column,
            $dateRangeType,
        );
    }

    public static function nextYear(EloquentBuilder|QueryBuilder $builder, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::yearToDate(
            $builder,
            now()->addYearNoOverflow()->endOfYear(),
            $column,
            $dateRangeType,
        );
    }

    // NEXT N METHODS
    public static function nextMinutes(EloquentBuilder|QueryBuilder $builder, int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('add', 'minutes', $builder, $numberOfMinutes, $date, $column, $dateRangeType);
    }

    public static function nextHours(EloquentBuilder|QueryBuilder $builder, int $numberOfHours = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('add', 'hours', $builder, $numberOfHours, $date, $column, $dateRangeType);
    }

    public static function nextDays(EloquentBuilder|QueryBuilder $builder, int $numberOfDays = 7, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('add', 'days', $builder, $numberOfDays, $date, $column, $dateRangeType);
    }

    public static function nextWeeks(EloquentBuilder|QueryBuilder $builder, int $numberOfWeeks = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('add', 'weeks', $builder, $numberOfWeeks, $date, $column, $dateRangeType);
    }

    public static function nextMonths(EloquentBuilder|QueryBuilder $builder, int $numberOfMonths = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('add', 'months', $builder, $numberOfMonths, $date, $column, $dateRangeType);
    }

    public static function nextQuarters(EloquentBuilder|QueryBuilder $builder, int $numberOfQuarters = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('add', 'quarters', $builder, $numberOfQuarters, $date, $column, $dateRangeType);
    }

    public static function nextYears(EloquentBuilder|QueryBuilder $builder, int $numberOfYears = 2, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        return static::applySubOrAddContraints('add', 'years', $builder, $numberOfYears, $date, $column, $dateRangeType);
    }

    // HELPER METHODS
    private static function getCreatedAtColumn(EloquentBuilder|QueryBuilder $builder): string
    {
        $defaultColumn = config('query-date-helpers.column', 'created_at');

        if (!method_exists($builder, 'getModel')) {
            return $defaultColumn;
        }

        return $builder->getModel()->getCreatedAtColumn() ?? $defaultColumn;
    }

    private static function toDate(string $type, EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        $date ??= now();

        $column ??= static::getCreatedAtColumn($builder);

        $startOfType = 'startOf' . ucfirst($type);

        $dateRangeType ??= config('query-date-helpers.date_range_type', DateRangeType::INCLUSIVE);

        return $builder
            ->whereDate(
                $column,
                $dateRangeType === DateRangeType::INCLUSIVE ? '>=' : '>=',
                $date->clone()->$startOfType()
            )
            ->whereDate(
                $column,
                $dateRangeType === DateRangeType::INCLUSIVE ? '<=' : '<',
                $date
            );
    }

    private static function applySubOrAddContraints(string $operationType, string $unitType, EloquentBuilder|QueryBuilder $builder, int $number, ?Carbon $date = null, ?string $column = null, ?DateRangeType $dateRangeType = null): EloquentBuilder|QueryBuilder
    {
        $date ??= now();

        $column ??= static::getCreatedAtColumn($builder);

        $config = match ($unitType) {
            'minutes' => [
                'sub' => 'minutes',
                'add' => 'minutes',
            ],
            'hours' => [
                'sub' => 'hours',
                'add' => 'hours',
            ],
            'days' => [
                'sub' => 'days',
                'add' => 'days',
            ],
            'weeks' => [
                'sub' => 'weeks',
                'add' => 'weeks',
            ],
            'months' => [
                'sub' => 'monthsNoOverflow',
                'add' => 'monthsNoOverflow',
            ],
            'quarters' => [
                'sub' => 'quartersNoOverflow',
                'add' => 'quarters',
            ],
            'years' => [
                'sub' => 'yearsNoOverflow',
                'add' => 'years',
            ],
        };

        $method = $operationType . ucfirst($config[$operationType]);

        $dateRangeType ??= config('query-date-helpers.date_range_type', DateRangeType::INCLUSIVE);

        return $builder
            ->when(
                $operationType === 'sub',
                fn (EloquentBuilder|QueryBuilder $query) => (
                    $query
                        ->where(
                            $column,
                            '>=',
                            $date->clone()->$method($number)
                        )
                        ->where(
                            $column,
                            $dateRangeType === DateRangeType::INCLUSIVE ? '<=' : '<',
                            $date
                        )
                ),
                fn (EloquentBuilder|QueryBuilder $query) => (
                    $query
                        ->where(
                            $column,
                            '>=',
                            $date
                        )
                        ->where(
                            $column,
                            $dateRangeType === DateRangeType::INCLUSIVE ? '<=' : '<',
                            $date->clone()->$method($number)
                        )
                )
            );
    }
}
