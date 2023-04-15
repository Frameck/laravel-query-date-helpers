# Laravel Query Date Helpers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/frameck/laravel-query-date-helpers.svg?style=flat-square)](https://packagist.org/packages/frameck/laravel-query-date-helpers)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/frameck/laravel-query-date-helpers/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/frameck/laravel-query-date-helpers/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/frameck/laravel-query-date-helpers/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/frameck/laravel-query-date-helpers/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/frameck/laravel-query-date-helpers.svg?style=flat-square)](https://packagist.org/packages/frameck/laravel-query-date-helpers)

This package provides some useful query and eloquent builder macros regarding dates.

## Installation

You can install the package via composer:

```bash
composer require frameck/laravel-query-date-helpers
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-query-date-helpers-config"
```

This is the contents of the published config file:

```php
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
];
```

## Usage
All the examples in this section assume that the date is April 14, 2023.
Every method has a `column` parameter as its last, so you can use it in two ways:
1. `Order::weekToDate(now()->subYear(), 'date')`
1. `Order::weekToDate(column: 'date')`

Column default:
- when using `QueryBuilder` is `created_at`
- when using `EloquentBuilder` it gets the `CREATED_AT` set on the model, and if it doesn't find one it defaults to `created_at`

```php
Order::yesterday(); // select * from `orders` where date(`created_at`) = '2023-04-13'
Order::today(); // select * from `orders` where date(`created_at`) = '2023-04-14'
Order::tomorrow(); // select * from `orders` where date(`created_at`) = '2023-04-15'
Order::betweenDates(now()->startOfMonth(), now()->addMonths(2)); // select * from `orders` where date(`created_at`) >= '2023-04-01' and date(`created_at`) <= '2023-06-14'
```

#### TO DATE
- `weekToDate`
- `monthToDate`
- `quarterToDate`
- `yearToDate`
```php
// all toDate methods accept the following parameters
EloquentBuilder|QueryBuilder $builder, ?Carbon $date = null, ?string $column = null

// basic usage
Order::weekToDate(); // select * from `orders` where date(`created_at`) >= '2023-04-10' and date(`created_at`) <= '2023-04-14'
// basic usage on a custom column
Order::weekToDate(column: 'date'); // select * from `orders` where date(`date`) >= '2023-04-10' and date(`date`) <= '2023-04-14'
// or you can pass a Carbon instance for a custom date
Order::weekToDate(now()->subYear(), 'date'); // select * from `orders` where date(`date`) >= '2022-04-11' and date(`date`) <= '2022-04-14'
```

#### LAST
- `lastMinute`
- `lastHour`
- `lastWeek`
- `lastMonth`
- `lastQuarter`
- `lastYear`
```php
// all last methods accept the following parameters
EloquentBuilder|QueryBuilder $builder, ?string $column = null

Order::lastHour(); // select * from `orders` where `created_at` >= '2023-04-13 23:46:45' and `created_at` <= '2023-04-14 00:46:45'
Order::lastMonth(); // select * from `orders` where date(`created_at`) >= '2023-03-01' and date(`created_at`) <= '2023-03-31'
Order::lastQuarter(); // select * from `orders` where date(`created_at`) >= '2023-01-01' and date(`created_at`) <= '2023-03-31'
```

#### LAST N
- `lastMinutes` defaults at 5 minutes
- `lastHours` defaults at 2 hours
- `lastDays` defaults at 7 days
- `lastWeeks` defaults at 2 weeks
- `lastMonths` defaults at 2 months
- `lastQuarters` defaults at 2 quarters
- `lastYears` defaults at 2 years
```php
// all last n methods accept the following parameters
EloquentBuilder|QueryBuilder $builder, int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null

// basic usage
Order::lastHours(); // select * from `orders` where `created_at` >= '2023-04-13 22:52:37' and `created_at` <= '2023-04-14 00:52:37'
Order::lastMonths(); // select * from `orders` where date(`created_at`) >= '2023-02-14' and date(`created_at`) <= '2023-04-14'
Order::lastQuarters(); // select * from `orders` where date(`created_at`) >= '2022-10-14' and date(`created_at`) <= '2023-04-14'

// more complex usage
Order::lastHours(12); // select * from `orders` where `created_at` >= '2023-04-13 13:00:52' and `created_at` <= '2023-04-14 01:00:52'
Order::lastMonths(6); // select * from `orders` where date(`created_at`) >= '2022-10-14' and date(`created_at`) <= '2023-04-14'
Order::lastQuarters(3); // select * from `orders` where date(`created_at`) >= '2022-07-14' and date(`created_at`) <= '2023-04-14'

// even more complex usage
Order::lastHours(12, now()->subYear()); // select * from `orders` where `created_at` >= '2022-04-13 13:03:30' and `created_at` <= '2022-04-14 01:03:30'
Order::lastMonths(6, now()->subYear()); // select * from `orders` where date(`created_at`) >= '2021-10-14' and date(`created_at`) <= '2022-04-14'
Order::lastQuarters(3, now()->subYear()); // select * from `orders` where date(`created_at`) >= '2021-07-14' and date(`created_at`) <= '2022-04-14'
```

#### THIS
- `thisWeek`
- `thisMonth`
- `thisQuarter`
- `thisYear`
```php
// all this methods accept the following parameters
EloquentBuilder|QueryBuilder $builder, ?string $column = null

Order::thisWeek(); // select * from `orders` where date(`created_at`) >= '2023-04-10' and date(`created_at`) <= '2023-04-16'
Order::thisMonth(); // select * from `orders` where date(`created_at`) >= '2023-04-01' and date(`created_at`) <= '2023-04-30'
Order::thisQuarter(); // select * from `orders` where date(`created_at`) >= '2023-04-01' and date(`created_at`) <= '2023-06-30'
```

#### NEXT
- `nextMinute`
- `nextHour`
- `nextWeek`
- `nextMonth`
- `nextQuarter`
- `nextYear`
```php
// all next methods accept the following parameters
EloquentBuilder|QueryBuilder $builder, ?string $column = null

Order::nextHour(); // select * from `orders` where `created_at` >= '2023-04-14 01:55:57' and `created_at` <= '2023-04-14 00:55:57'
Order::nextMonth(); // select * from `orders` where date(`created_at`) >= '2023-05-01' and date(`created_at`) <= '2023-05-31'
Order::nextQuarter(); // select * from `orders` where date(`created_at`) >= '2023-07-01' and date(`created_at`) <= '2023-09-30'
```

#### NEXT N
- `nextMinutes` defaults at 5 minutes
- `nextHours` defaults at 2 hours
- `nextDays` defaults at 7 days
- `nextWeeks` defaults at 2 weeks
- `nextMonths` defaults at 2 months
- `nextQuarters` defaults at 2 quarters
- `nextYears` defaults at 2 years
```php
// all next n methods accept the following parameters
EloquentBuilder|QueryBuilder $builder, int $numberOfMinutes = 5, ?Carbon $date = null, ?string $column = null

// basic usage
Order::nextHours(); // select * from `orders` where `created_at` >= '2023-04-14 02:57:23' and `created_at` <= '2023-04-14 00:57:23'
Order::nextMonths(); // select * from `orders` where date(`created_at`) >= '2023-04-14' and date(`created_at`) <= '2023-06-14'
Order::nextQuarters(); // select * from `orders` where date(`created_at`) >= '2023-04-14' and date(`created_at`) <= '2023-10-14'

// more complex usage
Order::nextHours(12); // select * from `orders` where `created_at` >= '2023-04-14 13:06:52' and `created_at` <= '2023-04-14 01:06:52'
Order::nextMonths(6); // select * from `orders` where date(`created_at`) >= '2023-04-14' and date(`created_at`) <= '2023-10-14'
Order::nextQuarters(3); // select * from `orders` where date(`created_at`) >= '2023-04-14' and date(`created_at`) <= '2024-01-14'

// even more complex usage
Order::nextHours(12, now()->subYear()); // select * from `orders` where `created_at` >= '2022-04-14 13:07:19' and `created_at` <= '2022-04-14 01:07:19'
Order::nextMonths(6, now()->subYear()); // select * from `orders` where date(`created_at`) >= '2022-04-14' and date(`created_at`) <= '2022-10-14'
Order::nextQuarters(3, now()->subYear()); // select * from `orders` where date(`created_at`) >= '2022-04-14' and date(`created_at`) <= '2023-01-14'
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Frameck](https://github.com/Frameck)
- [All Contributors](../../contributors)
- [This tweet from Caleb Porzio](https://twitter.com/calebporzio/status/1644320994717323264?s=20)
- [Laravel Date Scopes package](https://github.com/laracraft-tech/laravel-date-scopes)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
