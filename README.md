<p align="center">
  <a href="https://zaimea.com/" target="_blank">
    <img src=".github/metrics.svg" alt="Metrics" width="300">
  </a>
</p>
<p align="center">
  Metrics for your Model.
<p>
<p align="center">
    <a href="https://github.com/zaimealabs/metrics/actions/workflows/metrics-tests.yml"><img src="https://github.com/zaimealabs/metrics/actions/workflows/metrics-tests.yml/badge.svg" alt="Metrics Tests"></a>
    <a href="https://github.com/zaimealabs/metrics/blob/main/LICENSE"><img src="https://img.shields.io/badge/License-Mit-brightgreen.svg" alt="License"></a>
</p>
<div align="center">
  Hey 👋 thanks for considering making a donation, with these donations I can continue working to contribute to ZaimeaLabs projects.
  
  [![Donate](https://img.shields.io/badge/Via_PayPal-blue)](https://www.paypal.com/donate/?hosted_button_id=V6YPST5PUAUKS)
</div>

## Usage
Set your enums in our config
```bash
    php artisan vendor:publish --tag=metric
```

Add HasMetrics trait to your model
```php
    use ZaimeaLabs\Metrics\HasMetrics;

    class User extends Authenticable
    {
        use HasMetrics;
    }
```

Run migrations to create matrics table in your database
```bash
    php artisan migrate
```

## With Config enums
Increment
```php
    $user->incrementMetric(config('metric.enums.Logins'), 1);
```
Decrement
```php
    $user->decrementMetric(config('metric.enums.Logins'), 1);
```
Get value
```php
    $user->metrics()->where('name', 'logins')->value('value');
```

## Or use with Enums
Create your enum
```php
    enum UserMetric: string
    {
        case Logins = 'logins';
    }
```

Increment
```php
    $user->incrementMetric(UserMetric::Logins->value, 1);
```
Decrement
```php
    $user->decrementMetric(UserMetric::Logins->value, 1);
```
Get value
```php
    $user->metrics()->where('name', 'logins')->value('value');
```

Don't increment/decrement with month,year
```php
    $user->incrementMetric(UserMetric::Logins->value, 1, /*withDate*/ false);

    $user->decrementMetric(UserMetric::Logins->value, 1, /*withDate*/ false);
```

Increment/decrement with specific month,year
```php
    $user->incrementMetric(UserMetric::Logins->value, /*withDate*/ 1, true, /*month*/ 04, /*year*/ 2023, /*day*/ 01);

    $user->decrementMetric(UserMetric::Logins->value, /*withDate*/ 1, true, /*month*/ 04, /*year*/ 2023, /*day*/ 01);
```
