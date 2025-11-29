---
title: How to use package
description: How to use package
github: https://github.com/zaimealabs/metrics/edit/main/docs/
onThisArticle: true
sidebar: true
rightbar: true
---

# Metrics Usage

[[TOC]]

## Introduction

Using this package you will be able to have a record of the numbers, for example: invoices are issued and a numbered record is needed for each invoice, this package fulfills exactly what you are looking for.

## Usage

Set your enums in our config (config/metrics.php)

Add HasMetrics trait to your model
```php
    use Zaimea\Metrics\HasMetrics;

    class User extends Authenticable
    {
        use HasMetrics;
    }
```

## With config enums

Increment
```php
    $user->incrementMetrics(config('metrics.enums.Logins'), 1);
```
Decrement
```php
    $user->decrementMetrics(config('metrics.enums.Logins'), 1);
```
Get value
```php
    $user->metrics()->where('name', 'logins')->value('value');
```

## Or use with Enums

Create your enum
```php
    enum UserMetrics: string
    {
        case Logins = 'logins';
    }
```

Increment
```php
    $user->incrementMetrics(UserMetrics::Logins->value, 1);
```
Decrement
```php
    $user->decrementMetrics(UserMetrics::Logins->value, 1);
```
Get value
```php
    $user->metrics()->where('name', 'logins')->value('value');
```

Don't increment/decrement with month,year
```php
    $user->incrementMetrics(UserMetrics::Logins->value, 1, /*withDate*/ false);

    $user->decrementMetrics(UserMetrics::Logins->value, 1, /*withDate*/ false);
```

Increment/decrement with specific month,year
```php
    $user->incrementMetrics(UserMetrics::Logins->value, /*withDate*/ 1, true, /*month*/ 04, /*year*/ 2023, /*day*/ 01);

    $user->decrementMetrics(UserMetrics::Logins->value, /*withDate*/ 1, true, /*month*/ 04, /*year*/ 2023, /*day*/ 01);
```
